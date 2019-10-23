<?php

//自定义资源管理类

class NoteModel extends Model{
    //设置数据表的字段
    /*
    protected $fields = array(
        "id","tid","uid","title","name","type","size","addtime","keyword","favonum","clicknum","dwloadnum","status","_pk"=>"id","_autoinc"=>true
    );
    */
    
    //设置数据的自动处理功能 
    protected $_auto = array(
        array("addtime","time",1,"function"),//设置添加时间用函数time()
    );

    
    
}
