<?php
class NoticeAction extends CommonAction{
     //定义封装搜索条件的方法
    public function _filter(&$map){
        //判断是否存在搜索条件
        if (!empty($_REQUEST['title'])) {
            $map['title'] = array("like","%{$_REQUEST['title']}%");
        }
    }
    public function detail(){
        $model=D("Notice");
        $where['id'] = array("eq",$_GET['id']);
        $list = $model->where($where)->find();
        $this->assign("list",$list);
        $this->display();
    }
	
}
