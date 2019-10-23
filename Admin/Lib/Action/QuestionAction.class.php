<?php
//用户信息控制Action类
class QuestionAction extends CommonAction{
    public function update() {
        $_POST['rtime']=time();
		$model = D($this->getActionName());
		/*
		//用于事件处理
		if(in_array($this->getActionName(),$this->eventlist)){
			//保留一下原始数据
			$_POST["jsoninfo"]=$model->where("id=".$_POST['id'])->find();
			$_POST["jsoninfo"]["actionname"]=$this->getActionName();
		}
		*/
		if(false === $model->create()) {
			$this->error($model->getError());
		}
        // 更新数据
		if(false !== $model->save()) {
			// 回调接口
			if (method_exists($this, '_tigger_update')) {
				$this->_tigger_update($model);
            }
			//成功提示
			$this->success(L('更新成功'));
		} else {
			//错误提示
			$this->error(L('更新失败'));
        }
	}
    public function replay() {
		$model = D($this->getActionName());
		$id = $_REQUEST[$model->getPk()];
		$vo = $model->find($id);
		$this->assign('vo', $vo);
		$this->display('replay');
	}
    //自定义魔术方法，对当前模块中查询出的数据，做其他关联数据的追加
    public function _tigger_list(&$list){
        $mod=M("Users");    //获取users表的操作对象
        foreach($list as &$v){
            $ob1=$mod->field('username')->find($v['uid']);
            $v['username']=$ob1['username'];
            $ob2=$mod->field('username')->find($v['tid']);
            $v['tname']=$ob2['username'];
            //获取标签名
            $arr=explode(',',$v['keyword']);
            $str='';
            foreach($arr as $ll){
                $ob3=M("Cat")->find($ll);
                $str.=$ob3['name'].',';
            }
            $v['key']=rtrim($str,',');
        }
    }
    //添加搜索方法
	public function _filter(&$map){
        //判断是否有搜索条件
        if(!empty($_REQUEST['username'])){
            //根据名字条件获取对应的学生id
            $list=M("Users")->field('id')->where(array('username'=>array('like',"%{$_REQUEST['username']}%")))->select();
            //echo $mod->getLastSql();
            $uid=array();
            foreach($list as $vo){
                $uid[]=$vo['id'];
            }
            if(count($uid)>0){
                $map['uid']=array('in',$uid);
            }
        }
        if(!empty($_REQUEST['tname'])){
            //根据名字条件获取对应的教师id
            $list=M("Users")->field('id')->where(array('username'=>array('like',"%{$_REQUEST['tname']}%")))->select();
            //echo $mod->getLastSql();
            $tid=array();
            foreach($list as $vo){
                $tid[]=$vo['id'];
            }
            if(count($tid)>0){
                $map['tid']=array('in',$tid);
            }
        }
        //对我的问题
        if($_SESSION[C('USER_AUTH_KEY')]['username']!=C('SUPERMAN')){
            $map['tid']=array('eq',$_SESSION[C('USER_AUTH_KEY')]['id']);
        }
        if (!empty($_REQUEST['content'])) {
            $map['content'] = array("like","%{$_REQUEST['content']}%");
        }
        if (!empty($_REQUEST['pid'])) {
            $map['keyword'] = array(array('like',"{$_REQUEST['pid']}"),array('like',"%,{$_REQUEST['pid']}"),array('like',"{$_REQUEST['pid']},%"),array('like',"%,{$_REQUEST['pid']},%"),'or');
        } 
        if (!empty($_REQUEST['ss'])) {
            //根据回复内容确定是否已回复
            $list=D("Question")->field('id,replay')->select();
            $yid=array();
            $nid=array();
            foreach($list as $vo){
                if(!empty($vo['replay'])){
                    $yid[]=$vo['id'];
                }else{
                    $nid[]=$vo['id'];
                }
            }
            if($_REQUEST['ss']=='1'){
                $map['id']=array('in',$yid);
            }else{
                $map['id']=array('in',$nid);
            }
        }
    }
    //定义一个处理编辑器的上传内容
	public function doupload(){
		$res = array("err"=>"","msg"=>"");//定义一个响应信息
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->savePath = './Public/Uploads/editor/'.date('Ym',time()).'/';// 设置附件上传目录
		//执行上传
		if($upload->upload()){ 
			$info =  $upload->getUploadFileInfo();
			$res["msg"]=__ROOT__."/Public/Uploads/editor/".date('Ym',time()).'/'.$info[0]['savename'];  //上传成功！
		}else{
			$res['err']=$upload->getErrorMsg(); //失败
		}
		echo json_encode($res);
	}
}
