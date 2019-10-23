<?php

//自定义资源分类的Action

class CatAction extends Action{
    //查询所有的类别
    public function index(){
        $model = M("Cat");
        //查询出所有的一级类别
        $list = $model->where("pid = 0")->select();
        //定义存放响应子类的类别id数组
        $ids = array();
        foreach ($list as $v) {
            $type = $model->field("id")->where("pid={$v['id']}")->select();
            foreach ($type as $k) {
                $ids[] = $k['id'];
            }
        }
        //查询子类类别名
        $where['id'] = array("in",$ids);
        $zilist = $model->where($where)->select();
        //赋值模板
        $this->assign("list",$list);
        $this->assign("zilist",$zilist);
        //颜色随机
        //$color = "#".rand(180,255).rand(180,255);
        //$this->assign("color",$color);
        $this->display();
    }
    //定义显示分类下拉菜单的方法
    //定义show方法生成分类的数组
    public function typeSelect(){
        //设置默认选中的选项
        //判断是否有类别id的传值
        if($_REQUEST['id']){
            $id=$_REQUEST['id'];
        }else{
            $id='0';
        }
        $mm=M('Cat');
        //查询数据库表中所有类型 order by concat(path,id) 按照类别的层次进行查询
        $res=$mm->field('id,name,path')->order("concat(path,id)")->select();
        
        
        $cust_ids[] = 0;//定义存放类别id的数组
        $cust_names[] = "..";//定义存放类别信息的数组
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
            $cust_ids[] = $vo['id'];//对应的类别id存进数组中
            $cust_names[]=$vo['name'];//把对应的类型名存进数组
        }
        //把所有类别信息的id数组以及类别名数组赋值给模板
        $this->assign('cust_ids',$cust_ids);
        $this->assign('cust_names',$cust_names);
        
        $this->assign('mySelect',$id);//设置默认选中的option的下标值id
    }
    //根据传递的id或pid搜索资源
    public function show(){
        R("Video/index");
        R("Library/index");
        R("Message/index2");
        //分类名
        if(!$_GET['q']){
            if($_GET['id']){
                $res=M('Cat')->find($_GET['id']);
            }else{
                $res=M('Cat')->find($_GET['pid']);
            }
            $this->assign('cname',$res['name']);
        }
        $this->display();
    } 
}
