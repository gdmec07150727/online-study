<?php
//节点信息管理Action

class NodeAction extends CommonAction{

public function _filter(&$map){
        //判断是否有搜索条件
		
		if (!empty($_REQUEST['name'])) {//视频名搜索
            $map['name'] = array("like","%{$_REQUEST['name']}%");
        }
    }


}