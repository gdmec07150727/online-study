<?php

//自定义分类模块Action

class CatAction extends CommonAction{
    //重写_list方法
    /**
	 * 根据表单生成查询条件
	 * 进行列表过滤
	 * @param Model $model 数据对象
	 * @param HashMap $map 过滤条件
	 * @param string $sortBy 排序
	 * @param boolean $asc 是否正序
	 */
	protected function _list($model, $map = array(), $sortBy = '', $asc = true) {
		
		//排序字段 默认为主键名
		if (!empty($_REQUEST['_order'])) {
			$order = $_REQUEST['_order'];
		} else {
			$order = !empty($sortBy)?$sortBy:$model->getPk();
		}
		
		//排序方式默认按照正序排列
		//接受 sort参数 0 表示倒序 非0都 表示正序
		if (!empty($_REQUEST['_sort'])) {
			$sort = $_REQUEST['_sort'] == 'asc'?'asc':'desc';
		} else {
			$sort = $asc ? 'asc' : 'desc';
		}
		
		//取得满足条件的记录数
		$count = $model->where($map)->count();
		
		//每页显示的记录数
		if (!empty($_REQUEST['numPerPage'])) {
			$listRows = $_REQUEST['numPerPage'];
		} else {
			$listRows = '15';
		}
		
		
		//设置当前页码
		if(!empty($_REQUEST['pageNum'])) {
			$nowPage=$_REQUEST['pageNum'];
		}else{
			$nowPage=1;
		}
		$_GET['p']=$nowPage;
		
		//创建分页对象
		import("ORG.Util.Page");
		$p = new Page($count, $listRows);
		
		
		//分页查询数据
		//$list = $model->where($map)->order($order . ' ' . $sort)->select();
		$list = $model->where($map)->order($order.' '.$sort)
						->limit($p->firstRow.','.$p->listRows)
                        ->select();
						
		//回调函数，用于数据加工，如将用户id，替换成用户名称
		if (method_exists($this, '_tigger_list')) {
			$this->_tigger_list($list);
		}
		//分页跳转的时候保证查询条件
		foreach ($map as $key => $val) {
			if (!is_array($val)) {
				$p->parameter .= "$key=" . urlencode($val) . "&";
			}
		}
	
		//分页显示
		$page = $p->show();
		//列表排序显示
		$sortImg = $sort;                                 //排序图标
		$sortAlt = $sort == 'desc' ? '升序排列' : '倒序排列';   //排序提示
		$sort = $sort == 'desc' ? 1 : 0;                  //排序方式
		
        //处理表头菜单
        if($_GET['cid']){
            $modd=D('Cat');
            $rr=$modd->field('path')->find($_GET['cid']);
            $ss=$rr['path'].$_GET['cid'].',';
            $aa=explode(',',$ss);
            array_shift($aa);
            array_pop($aa);
            foreach($aa as $v){
                $rr2[]=$modd->find($v);
            }
            $this->assign('menu',$rr2);
        }
		//模板赋值显示
		$this->assign('list', $list);
		$this->assign('sort', $sort);
		$this->assign('order', $order);
		$this->assign('sortImg', $sortImg);
		$this->assign('sortType', $sortAlt);
		$this->assign("page", $page);
		
		$this->assign("search",			$search);			//搜索类型
		$this->assign("values",			$_POST['values']);	//搜索输入框内容
		$this->assign("totalCount",		$count);			//总条数
		$this->assign("numPerPage",		$p->listRows);		//每页显多少条
        $this->assign("currentPage",	$nowPage);			//当前页码
	}
    //定义封装搜索条件的方法
    public function _filter(&$map){
        //判断是否存在搜索条件
        //
        if (!empty($_REQUEST['cid'])) {
            $map['pid'] = array("eq","{$_REQUEST['cid']}");
        }else{
            $map['pid'] = array("eq",'0');
        }
    }

    //自定义魔术方法 对当前模块中查询出的数据 做其他关联数据的追加
    public function _tigger_list(&$list){
        //实例化用户表对象
        $model = M("Users");

        //遍历查询出数据
        foreach ($list as &$v) {
            $ob = $model->field('username')->find($v['uid']);//根据当前资源表中的用户id查询对应的用户信息
            $v['username'] = $ob['username'];
        }
    }
    //重载add方法
    public function add() {
        //调用show方法
        $this->typeSelect();
		$this->display('add');
    }
    //重载edit方法
    public function edit() {
		$model = D($this->getActionName());
		$id = $_REQUEST[$model->getPk()];
        $vo = $model->find($id);
        
		$this->assign('vo', $vo);
		$this->display('edit');
	}
    //重载父类中的数据添加的方法
    public function insert(){
        //实例化表对象
        $model = D("Cat");
        $rr=$model->field('path')->find($_REQUEST['pid']);
        $path=$rr['path'].$_REQUEST['pid'].',';
        $_POST['path']=$path;
        if (false === $model->create()) {
			$this->error($model->getError());
		}
        if($model->add()){
            $this->success(L("新增成功"));
        }else{
            $this->error(L("新增失败！").$model->getLastSql());
        }
    }
    /*
    //重载父类的删除方法
    public function delete() {
        //实例化对象
        $model = M("Cat");
        //执行数据库信息的删除
        if ($model->delete($_GET['id'])) {
            //删除子分类
            $mod = M("Cat");
            $mod->where("pid={$_GET['id']}")->delete();
            $this->success(L("删除成功"));
        }else{
            $this->error(L("删除失败").$model->getLastSql());
        }
    }
     */
    //定义show方法生成分类的数组
    public function typeSelect(){
        //判断是否有类别id的传值,设置默认选中的选项
        if($_REQUEST['id']){
            $id=$_REQUEST['id'];
        }else{
            $id='0';
        }

        $mm=M('Cat');
        //查询数据库表中所有类型 order by concat(path,id) 按照类别的层次进行查询
        $res=$mm->field('id,name,path')->order("concat(path,id)")->select();
        //定义存放类别信息的数组
        $ss[]='/';
        foreach($res as $vo){
            //分割查出的每条路径为数组
            $path = explode(",",$vo['path']);
            //通过数组元素的个数分别传入不同的类别名 达到级别的分级显示
            switch (count($path)) {
                case '1':
                    $vo['name'] = $vo['name'];
                    break;
                case '2':
                    $vo['name'] = "-".$vo['name'];
                    break;
                case '3':
                    $vo['name'] = "---".$vo['name'];
                    break;
            }
            //把类别名以及对应的类别id存进数组中
            $ss[$vo['id']]=$vo['name'];
        }
        //把所有类别信息的关联数组赋给模板
        $this->assign('myOptions',$ss);
        $this->assign('mySelect',$id);//设置默认选中的option的下标值id
    }
}
