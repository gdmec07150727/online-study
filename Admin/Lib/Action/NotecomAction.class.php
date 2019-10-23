<?php

//定义评论管理的Action类

class NotecomAction extends CommonAction{
    
    //定义封装搜索条件的方法
    public function _filter(&$map){
        
        //可以通过判断在不同表中的模糊搜索显示搜索的结果
        //
        //判断是否存在搜索条件
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
        if (!empty($_REQUEST['title'])) {//资源文件名搜索
            $list2 = M("Library")->field("id")->where(array("title"=>array("like","%{$_REQUEST['title']}%")))->select();
            $lid = array();
            foreach ($list2 as $v2) {
                $lid[] = $v2['id'];
            }
            if (count($lid)>0) {
                $map['lid'] = array("in",$lid);
            }
        }
        if (!empty($_REQUEST['videoname'])) {//视频名搜索
            $list3 = M("Video")->field("id")->where(array("videoname"=>array("like","%{$_REQUEST['videoname']}%")))->select();
            $vid = array();
            foreach ($list3 as $v3) {
                $vid[] = $v3['id'];
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
        $mod2 = M("Note");

        //遍历之前查询出的数据
        foreach ($list as &$v) {
            $ob1 = $mod1->field("username")->find($v['uid']);
            $v['username'] = $ob1['username'];

            $ob2 = $mod2->field("title")->find($v['nid']);
            $v['title'] = $ob2['title'];
            
        }
    }

    //定义分表显示评论信息的公共方法
    public function comm(){
        //实例化评论表对象
        $model = M("Comment");
        $comid = null; //定义存放资源id的变量
        $comtab = null;//定义存放资源表的变量
        $comfield = null;//定义存放资源字段的变量
        $comtpl = null;//定义存放资源显示模板的变量
        //根据所传参数的值分别进行变量赋值
        switch ($_GET['param']) {
            case 'video':
                $comid = "vid";
                $comtab = "Video";
                $comfield = "videoname";
                $comtpl = "videocom";
                break;

            case 'lib':
                $comid = "lid";
                $comtab = "Library";
                $comfield = "title";
                $comtpl = "libcom";
                break;

            case 'note':
                $comid = "nid";
                $comtab = "Note";
                $comfield = "title";
                $comtpl = "notecom";
                break;
        }
        //查询响应的资源
        $list = $model->where("{$comid} <> 0")->select();//查询视频id不为0的数据
        
        //遍历查询结果进行字段信息的追加
        foreach ($list as &$v) {
            $video = D("{$comtab}")->field("{$comfield}")->find($v[$comid]);
            $v["{$comfield}"] = $video["{$comfield}"];

            $user = D("Users")->field("username")->find($v['uid']);
            $v['username'] = $user['username'];
        }
        //模板赋值
        $this->assign("list",$list);
        //显示模板
        $this->display("Comment/{$comtpl}");
    }
    
    
}
