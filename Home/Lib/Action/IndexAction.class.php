<?php
// 首页导入Action类
class IndexAction extends Action {
    public function index(){
        //echo U("Index/demo");
        $this->assign("title","E-Sch在线教学网站模块");
        //统计网站的访问量
        $webclicknum = M("Clicknum")->find(1);
        $webclicknum['clicknum']++;//访问量加一
        $webclicknum['clicktime'] = time();
        M("Clicknum")->save($webclicknum);
        //实例化公告表对象
        $notice = D("Notice");
		$this->assign("notice",$notice->order("addtime desc")->limit("6")->select());
		
        //===========================军火库=============================
        //查询最新的三篇资源
        $newlib = M("Library")->order("addtime desc")->limit(3)->select();
        foreach ($newlib as &$new) {
            $us = D("Users")->field("username")->find($new['uid']);
            $new['username'] = $us['username'];
        }
        $this->assign("newlib",$newlib);

        //实例化首页的资源表对象
        $lib = D("Library")->order("dwloadnum desc")->limit(10)->select();//查询资源表结果集
        foreach ($lib as &$vo) {
            $ob = D("Users")->field("username")->find($vo['uid']);
            $vo['username'] = $ob['username'];
        }
        //查询资源的活跃用户榜
        //拼装上传资源数排序的用户
        $hotuser = M()->query("select uid,count(*) num from edu_library group by uid order by num desc limit 8");
        //dump($hotuser);exit;
        foreach ($hotuser as &$hot) {
            $userob = M("Users")->field("username,picture")->find($hot['uid']);
            //查询用户的粉丝
            $fansnum = M("Friend")->where("uid={$hot['uid']}")->count();
            $hot['fansnum'] = $fansnum;
            $hot['username'] = $userob['username'];
            $hot['picture'] = $userob['picture'];
        }
        $this->assign("hotuser",$hotuser);//将活跃用户数组赋值给模板
        //将结果集输出到模板中
        $this->assign("library",$lib);
        //============================视频区=============================
        //实例化视频表对象 查询精选视频
        $video = M("Video");
        //查询视频的最新三个
        $this->assign("newvideo",$video->order("addtime desc")->limit(3)->select());

        //赋值模板
        $this->assign("video",$video->where("status=2")->order("favonum desc")->limit(8)->select());
        //查询视频点击榜信息
        $this->assign("clickvideo",$video->where("status=2")->order("clicknum desc")->limit(10)->select());
        //查询视频的热门分类
        $this->assign("videocat",M("Cat")->field("id,name")->where("pid=0")->limit(6)->select());
        //查询首页顶部的视频 最新的5个（按添加时间排名）
        $this->assign("threeVideo",$video->where("status=2")->order("addtime desc")->limit(5)->select());
        //============================手记篇==============================
        //根据被赞数量倒序查询资源
        $notebest = M()->query("select nid,count(*) num from edu_zan where nid<>0 group by nid order by num desc limit 3");
        //遍历数组信息 进行视频和用户名信息的追加
        foreach ($notebest as &$note) {
            $noteinfo = M("Note")->find($note['nid']);
            $note['title'] = $noteinfo['title'];
            $note['vid'] = $noteinfo['vid'];
            $note['content'] = $noteinfo['content'];
            $user = D("Users")->field("username")->find($noteinfo['uid']);//追加创建用户名
            $note['username'] = $user['username'];
            $note['uid'] = $noteinfo['uid'];
            $video = D("Video")->field("videoname")->find($noteinfo['vid']);//追加用户评论的视频名
            $note['videoname'] = $video['videoname'];   
        }
        $this->assign("bestnote",$notebest);//将赞数最多的三篇手记显示在主页
        //查询热门创作人前十名
        $notehotuser = M()->query("select uid,count(*) num from edu_note group by uid order by num desc limit 8");
        //dump($notehotuser);exit;
        foreach ($notehotuser as &$notehot) {
            $hotuserob = M("Users")->field("username,picture")->find($notehot['uid']);
            $notehot['username'] = $hotuserob['username'];
            $notehot['picture'] = $hotuserob['picture'];
        }
        $this->assign("notehotuser",$notehotuser);//将创作活跃用户数组赋值给模板
        //============================贴吧模块============================
        //随机查询贴吧的六个标签
        $cc=D('Cat');
        $res=$cc->field('id,name')->where('pid!=0')->select();
        $this->assign('kw',$res);
        shuffle($res);
        for($i=0;$i<6;$i++){
            $rr[]=$res[$i];
        } 
        //对每个标签进行查询帖子信息
        foreach($rr as &$v){
            $mod=D("Message");
            //搜索条件
            $where['keyword']=array(array('like',"{$v['id']}"),array('like',"%,{$v['id']}"),array('like',"{$v['id']},%"),array('like',"%,{$v['id']},%"),'or');
            $where['status']=array('eq','1');
            $list=$mod->where($where)->field('id,title')->order('addtime desc')->limit(3)->select();
            $count=$mod->where($where)->count();
            $v['mess']=$list;
            $v['count']=$count;
            $where=array();     //清空搜索条件
        }
        //将结果集输出到模板中
        $this->assign('cat',$rr);
        //****************************************************************

        //============================问题模块============================
        //查询问题的最新五个
        $qq=D('Question');
        $where=array();     //清空搜索条件
        $where['status']=array('eq','1');
        $where['isbest']=array('eq','1');
        $where['replay']=array('neq','');
        $ques=$qq->field('id,uid,content')->where($where)->order('addtime desc')->limit(6)->select();
        for($i=0;$i<count($ques);$i++){
            $ques[$i]['content']=strip_tags($ques[$i]['content']);
            $uu=M('Users')->field('username,name')->find($ques[$i]['uid']);
            if($uu['name']!=''){
                $ques[$i]['username']=$uu['name'];
            }else{
                $ques[$i]['username']=$uu['username'];
            }
        }
        //将结果集输出到模板中
        $this->assign('ques',$ques);
        //****************************************************************
        //调用友情链接表中的查询select()方法
        R("Flink/select");
        if($_SESSION[C('USER_AUTH_KEY')]){
            //调用贴吧中的查询hfnum()方法
            R("Message/hfnum");
        }
        $this->display();
        
    }    
}
