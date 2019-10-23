<?php

//自定义资源管理类

class UsersModel extends Model{
    //设置数据表的字段
    protected $fields = array(
        "id","username","userpass","name","sex","age","email","class","picture","level","point","addtime","introduce","_pk"=>"id","_autoinc"=>true
    );

    //设置数据的自动处理功能 
    protected $_auto = array(
        array("addtime","time",1,"function"),//设置添加时间用函数time()
        array("userpass","mypass",1,"callback"),
    );
    protected function mypass(){
        return md5($_POST['userpass']);
    }

    protected $_validate = array(
        array("username","","用户名已存在！",0,"unique",1),
    );
}
