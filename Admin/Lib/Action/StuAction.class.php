<?php
class StuAction extends CommonAction{
    //定义封装搜索条件的方法
    public function _filter(&$map){
        //判断是否存在搜索条件
        if (!empty($_REQUEST['stu_num'])) {
            $map['stu_num'] = array("like","%{$_REQUEST['stu_num']}%");
        }
    }

    public function detail(){
        $model=D("Stu");
        $where['stu_id'] = array("eq",$_GET['stu_id']);
        $list = $model->where($where)->find();
        $this->assign("list",$list);
        $this->display();
    }
    public function kao() {
        //列表过滤器，生成查询Map对象 $map 是用来封装搜索条件的 _search()方法是封装搜索条件的方法
        $map = $this->_search();
        if(method_exists($this, '_filter')) {
            $this->_filter($map);
        }
        //判断采用自定义的Model类
        if(!empty($_POST["actionName"])){
            $model = D($_POST["actionName"]);
        }else{
            $model = D($this->getActionName());
        }

        if (!empty($model)) {
            $this->_list($model, $map);
        }
        $this->display();
        return;
    }

    public function gai(){
        $model=M("Stu");
        $id = $_GET['id'];
        $statue = $_GET['statue'];
        $data['statue'] = $statue;
        $model->where("stu_id={$id}")->save($data);

    }

}
