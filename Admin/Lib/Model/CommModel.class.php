<?php

//自定义资源管理类

class CommModel extends Model{
    protected $trueTableName = 'bbs_comm';
    //设置数据的自动处理功能 
    protected $_auto = array(
        array("addtime","time",1,"function"),               //设置添加时间用函数time()
        array("uid","getId",1,'callback'),                  //用回调方法设置添加用户id
    );
    protected function getId(){
        return $_SESSION[C("USER_AUTH_KEY")]['id'];         //返回session中存在的用户id号
    }
}
