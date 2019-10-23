<?php

//自定义友情链接管理的Action类

class FlinkAction extends CommonAction{
    //定义封装搜索条件的方法
    public function _filter(&$map){
        //判断是否存在搜索条件
        //执行链接的搜索
        if (!empty($_REQUEST['webname'])) {
            $map['webname'] = array("like","%{$_REQUEST['webname']}%");
        }
    
        //执行链接描述的搜索
        if (!empty($_REQUEST['descr'])) {
            $map['descr'] = array("like","%{$_REQUEST['descr']}%");
        }       
        
    }
}
