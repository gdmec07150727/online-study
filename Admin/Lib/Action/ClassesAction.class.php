<?php
class ClassesAction extends CommonAction{
    //定义封装搜索条件的方法
    public function _filter(&$map){
        //判断是否存在搜索条件
        if (!empty($_REQUEST['class_name'])) {
            $map['class_name'] = array("like","%{$_REQUEST['class_name']}%");
        }
    }

    public function detail(){
        $model=D("Classes");
        $where['ID'] = array("eq",$_GET['ID']);
        $list = $model->where($where)->find();
        $this->assign("list",$list);
        $this->display();
    }

    public function add(){
        $list = M("Users")->where("id={$_SESSION[C('USER_AUTH_KEY')]['id']}")->select();
            $this->assign("list",$list);
            $this->display();
    }

    public function myindex(){

        $list = M("Classes")->where("cre_id={$_SESSION[C('USER_AUTH_KEY')]['id']}")->select();
        $this->assign("list",$list);
        $this->display();
        return;
    }

}
