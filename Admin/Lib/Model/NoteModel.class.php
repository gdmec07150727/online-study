<?php

//自定义笔记model类

class NoteModel extends Model{

    //设置数据的自动处理功能 
    protected $_auto = array(
        array("addtime","time",1,"function"),//设置添加时间用函数time()
    );
}
