<?php
class NoticeAction extends Action{
	public function index(){
        $mod = D("Notice");
		$this->assign("notice",$mod->limit("8")->select());
		$this->display("Index/index");
    }

    public function datail(){
        $model=D("Notice");
        $this->assign("notice",$model->order("addtime desc")->limit("10")->select());
        $list = $model->find($_GET['id']);
        $this->assign("list",$list);

        

        $this->display();


    }

}
