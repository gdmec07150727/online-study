<?php

//自定义视频笔记模块Action 类

class NoteAction extends CommonAction{

    //定义封装搜索条件的方法
    public function _filter(&$map){
        
        //可以通过判断在不同表中的模糊搜索显示搜索的结果
        //
        //判断是否存在搜索条件
        if (!empty($_REQUEST['content'])) {//视频名搜索
            $map['content'] = array("like","%{$_REQUEST['content']}%");
        }

        if (!empty($_REQUEST['username'])) {//用户名搜索
            $list1 = M("Users")->field("id")->where(array("username"=>array("like","%{$_REQUEST['username']}%")))->select(); 
            $uid = array();
            foreach ($list1 as $v1) {
                $uid[] = $v1['id'];
            }
            if (count($uid)>0) {
                $map['uid'] = array("in",$uid);
            }
        }

        if (!empty($_REQUEST['videoname'])) {//视频名搜索
            $list2 = M("Video")->field("id")->where(array("videoname"=>array("like","%{$_REQUEST['videoname']}%")))->select();
            $vid = array();
            foreach ($list2 as $v2) {
                $vid[] = $v2['id'];
            }
            if (count($vid)>0) {
                $map['vid'] = array("in",$vid);
            }
        }
              
    }

    //自定义魔术方法 对当前模块中查询出的数据做其他数据的追加
    public function _tigger_list(&$list){
        //自定义需要的数据表对象
        $mod1 = M("Users");
        $mod2 = M("Video");

        //遍历之前查询出的数据
        foreach ($list as &$v) {
            $ob1 = $mod1->field("username")->find($v['uid']);
            $v['username'] = $ob1['username']; 

            $ob2 = $mod2->field("videoname")->find($v['vid']);
            $v['videoname'] = $ob2['videoname'];        
        }
    } 
    //显示手记详情的页面
    public function detail(){
        $model = D("Note");
        $this->assign("vo",$model->field("content")->find($_GET['id']));
        $this->display();
    }
}
