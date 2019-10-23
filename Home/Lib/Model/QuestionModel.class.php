<?php

//自定义资源管理类

class QuestionModel extends Model{
    protected $trueTableName = 'bbs_question';
    protected $_validate = array(
        array("content","","问题已存在！",0,"unique",1),
        array("content","require","问题不能为空！"),
    );
}
