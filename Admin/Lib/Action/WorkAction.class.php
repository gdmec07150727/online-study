<?php
class WorkAction extends CommonAction{
    //定义封装搜索条件的方法
    public function _filter(&$map){
        //判断是否存在搜索条件
        if (!empty($_REQUEST['title'])) {
            $map['title'] = array("like","%{$_REQUEST['title']}%");
        }
    }

    public function detail(){
        $model=D("Work");
        $where['ID'] = array("eq",$_GET['ID']);
        $list = $model->where($where)->find();
        $this->assign("list",$list);
        $this->display();
    }

    public function add(){
        $list = M("Users")->where("id={$_SESSION[C('USER_AUTH_KEY')]['id']}")->select();
        $list2 = M("Classes")->where("cre_id={$_SESSION[C('USER_AUTH_KEY')]['id']}")->select();
        $this->assign("list",$list);
        $this->assign("list2",$list2);
        $this->display();
    }

}
