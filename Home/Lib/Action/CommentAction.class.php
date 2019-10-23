<?php

//自定义评论信息管理的Action类

class CommentAction extends Action{

    //定义显示资源评论信息的方法
    public function show($id){
        //实例化评论表对象
        $mod = M("Comment");
        $where['lid'] = array("eq",$id);
        $where['status'] = array("eq",2);
        $list = $mod->where($where)->select();
        //循环遍历查询结果集执行用户名追加
        //$cid = array();//定义该资源所有评论的id
        foreach ($list as &$v) {
            $ob = D("Users")->field("username")->find($v['uid']);
            $v['username'] = $ob['username'];
            //$cid[] = $v['id'];//把遍历出的id存进数组
        }
        $this->assign("list",$list);
        /*
        //实例化评论回复表对象
        $reply = D("Commentreply");
        foreach ($cid as $c) {
            $where['lid'] = array("eq",$id);
            $where['cid'] = $c;
            $relist = $reply->where($where)->select();
        }
        $this->assign("relist",$relist);
         */
    }
    //添加资源评论的方法
    public function addComment(){
        $model = D("Comment");
        $list = $model->create();
        if ($model->add($list)) {
            $this->success("评论成功！等待审核...",U("Library/detail?id={$list['lid']}"));
        }else{
            $this->error("评论失败！");
        }
    }
    
    //定义显示视频评论信息的方法4
    public function videocomshow($id){
        //实例化评论表对象
        $mod = M("Comment");
        $where['vid'] = array("eq",$id);
        $where['status'] = array("eq",2);
        $list = $mod->where($where)->select();
        //循环遍历查询结果集执行用户名追加
        //$cid = array();//定义该资源所有评论的id
        foreach ($list as &$v) {
            $ob = D("Users")->field("username")->find($v['uid']);
            $v['username'] = $ob['username'];
        }
        $this->assign("comment",$list);
    }
    
    //添加视频短评的方法
    public function addvideocom(){
        $model = D("Comment");
        //dump($_POST);exit;
        $list = $model->create();
        if ($model->add($list)) {
            $this->success("评论成功！等待审核...",U("Video/detail?id={$list['vid']}"));
        }else{
            echo $model->getLastSql();exit;
            $this->error("评论失败！");
        }
    }

    

    //定义评论回复的方法
    public function commentReply(){
        $model = D("Commentreply");
        $model->create();
        $model->lid = $_GET['lid'];
        if ($model->add()) {
            $this->success("回复成功",U("Library/detail?id={$_GET['lid']}"));
        }
    }
}
