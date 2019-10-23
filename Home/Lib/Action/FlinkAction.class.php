<?php

//自定义友情链接的Action

class FlinkAction extends Action{
    
    //定义查询友情链接的方法
    public function select(){
        
        $model = M("Flink");
        
        $this->assign("flink",$model->where("status=2")->select());
    }
}
