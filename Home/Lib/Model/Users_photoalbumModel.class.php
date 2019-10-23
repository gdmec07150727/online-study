<?php

//自定义资源管理类

class Users_photoalbumModel extends Model{
    //设置数据表的字段
    protected $fields = array(
		"albumname","uid","desc","addtime","state","_pk"=>"id","_autoinc"=>true
    );

    //设置数据的自动处理功能 
    protected $_auto = array(
        array("addtime","time",1,"function"),//设置添加时间用函数time()
    );

    protected $_validate = array(
        array("albumname","","相册名已存在！",0,"unique",1),
    );
}
