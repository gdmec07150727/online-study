<?php

//自定义资源管理类

class MessageModel extends Model{
    protected $trueTableName = 'bbs_message';

    protected $_validate = array(
        array("title","","标题名已存在！",0,"unique",1),
        array("title","require","标题名不能为空！"),
        array("content","require","内容不能为空！"),
    );
}
