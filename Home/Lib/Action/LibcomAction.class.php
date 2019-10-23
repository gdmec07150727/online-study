<?php

//自定义评论信息管理的Action类

class LibcomAction extends Action{

    //定义显示资源评论信息的方法
    public function index($id){
        //实例化评论表对象
        $mod = M("Libcom");

        //导入分页类
        import("ORG.Util.Page");
        //设置搜索条件
        $where['lid'] = array("eq",$id);
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
            //$cid[] = $v['id'];//把遍历出的id存进数组
        }
        $this->assign("list",$list);
        $this->assign("comTotal",$total);//赋值模板评论条数
        $this->assign("comPage",$page->show());//给模板赋值分页信息
    }
    //添加资源评论的方法
    public function addComment(){
        $model = D("Libcom");
        $list = $model->create();
        $list['content'] = htmlspecialchars($list['content']);//防止用户输入js代码或HTML标签
        $lastid = $model->add($list);
        if ($lastid) {
            $res = D("Users")->field("username,picture")->find($list['uid']);
            $res['addtime'] = date("Y-m-d H:i:s",time());
            $res['content'] = trim($list['content']);
            $res['uid'] = $list['uid'];
            echo json_encode($res);
            //$this->success("评论成功！等待审核...",U("Library/detail?id={$list['lid']}"));
        }else{
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
