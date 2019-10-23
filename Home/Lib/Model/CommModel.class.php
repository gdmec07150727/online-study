<?php

//自定义资源管理类
class CommModel extends Model{
    protected $trueTableName = 'bbs_comm';
    protected $_validate = array(
        array("content","require","内容不能为空！"),
    );
}
