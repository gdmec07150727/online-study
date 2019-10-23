<?php

//自定义视频model类

class VideoModel extends Model{

    //设置数据的自动处理功能 
    protected $_auto = array(
        array("addtime","time",1,"function"),//设置添加时间用函数time()
    );
}
