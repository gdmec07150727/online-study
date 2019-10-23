<?php
class TestAction extends CommonAction{

    //调用回调函数执行搜索
    public function _filter(&$map){
        //判断是否存在搜索条件
        if (!empty($_REQUEST['title'])) {
            $map['title'] = array("like","%{$_REQUEST['title']}%");
        }
        //=====================================================================
        //执行资源类型的搜索
        if (!empty($_REQUEST['pid'])) {
            //搜索类型表中pid等于$_REQUEST['pid']的和本身id等于$_REQUEST['pid']的所有类别的id
            //封装搜索条件 where pid=$_REQUEST['pid'] OR id=$_REQUEST['pid']
            $where['pid'] = array("eq",$_REQUEST['pid']);
            $where['id'] = array("eq",$_REQUEST['pid']);
            $where['_logic'] = 'OR';
            //执行查询
            $type = M("Cat")->field("id")->where($where)->select();
            $tid = array();
            foreach ($type as $vo) {
                $tid[] = $vo['id'];
            }
            if (count($tid)>0) {
                $map['tid'] = array("in",$tid);
            }
        }
        //=====================================================================
     }
    
    //自定义魔术方法 对当前模块中查询出的数据做其他数据的追加
    public function _tigger_list(&$list){
        //自定义需要的数据表对象
        $type = M("Cat");//类别表
        
        //遍历之前查询出的数据
        foreach ($list as &$v) {
           
            //===============================================
            //执行资源类型名的追加
            $ty = $type->field("name")->find($v['tid']);
            $v['typename'] = $ty['name'];
            //===============================================        
        }
    }
    
    
    //重载父类中添加的方法
    public function add(){
        //调用CatAction类中显示类别下拉菜单的方法
        R("Cat/typeSelect");
        $this->display();
    }

    //重载父类中编辑的方法
    public function edit(){
        //查询需要编辑的信息
        $model=M("Test");
        //调用CatAction类中显示类别下拉菜单的方法
        R("Cat/typeSelect");
        $this->assign("vo",$model->find($_GET['id']));
        $this->display();
    }
    
    //显示添加试题的页面
    public function addquest(){
        $this->assign("tid",$_GET['tid']);
        $this->display();
    }
    //执行试题的添加
    public function insertquest(){
        $model=D("Quest");
        $list = $model->create();
        //dump($list);exit;
        
        //遍历数组循环添加数据
        $id = array();//定义存放添加数据id的数组
        $data = array();//定义存放添加数据的数组
        
        $data['tid'] = $list['tid'];//将试卷的id放进数组中
        $data['addtime'] = $list['addtime'];//将添加时间放进数组
        
        $m=0;//用于计算添加数据的条数
        foreach ($list['aA'] as $k=>$val) {
            //将遍历出的数据添加进数组
            $data['aA'] = $val;
            $data['aB'] = $list['aB'][$k];
            $data['aC'] = $list['aC'][$k];
            $data['aD'] = $list['aD'][$k];
            $data['content'] = $list['content'][$k];
            $data['quescore'] = $list['quescore'][$k];
            $data['answer']= $list['answer'][$k];
            //执行数据添加 将返回的添加数据id号存进数组$id中
            $id[] = $model->add($data);
            $m++;
        }
        //通过判断数组id元素个数和变量$m的相等关系
        if(count($id)==$m){
            $this->success(L("成功添加{$m}道题！"));
        }else{
            $this->error(L("添加失败"));
        }
    }
    public function detail(){
        $model=D("Quest");
        $where['tid'] = array("eq",$_GET['id']);
        $list = $model->where($where)->select();
        $this->assign("list",$list);
        $this->display();
    }
    
}
