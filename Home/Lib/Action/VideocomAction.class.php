<?php

//自定义视频评论信息管理的Action类

class VideocomAction extends Action{

    
    //定义显示视频评论信息的方法4
    public function index($id){
        //实例化评论表对象
        $mod = M("Videocom");
        //导入分页类
        import("ORG.Util.Page");
        //设置搜索条件
        $where['vid'] = array("eq",$id);
        //$where['status'] = array("eq",2);
        
        //设置分页条件
        $total = $mod->where($where)->count();//获取总数据条数
        $page = new Page($total,5);//实例化一个分页对象
        //查询评论信息
        $list = $mod->where($where)->order("addtime desc")->limit($page->firstRow.",".$page->listRows)->select();
        //循环遍历查询结果集执行用户名追加
        //$cid = array();//定义该资源所有评论的id
        foreach ($list as &$v) {
            $ob = D("Users")->field("username,picture")->find($v['uid']);
            $v['username'] = $ob['username'];
            $v['picture'] = $ob['picture'];
        }
        $this->assign("comment",$list);
        $this->assign("comTotal",$total);//赋值模板评论条数
        $this->assign("comPage",$page->show());//给模板赋值分页信息
    }
    
    //添加视频短评的方法
    public function addvideocom(){
        $model = D("Videocom");
        $list = $model->create();
        $list['content'] = trim(htmlspecialchars($list['content']));//防止用户输入js代码或HTML标签
        $lastid = $model->add($list);
        if ($lastid) {
            $res = D("Users")->field("username,picture")->find($list['uid']);
            $res['addtime'] = date("Y-m-d H:i:s",time());
            $res['content'] = $list['content'];
            $res['uid'] = $list['uid'];
            echo json_encode($res);
            //$this->success("评论成功！等待审核...",U("Video/detail?id={$list['vid']}"));
        }else{
            //echo $model->getLastSql();exit;
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
