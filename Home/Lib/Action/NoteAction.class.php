<?php

//自定义视频手记的模块Action类

class NoteAction extends Action{

    //显示手记列表的方法
    public function index(){
        //实例化表对象
        $model = M("Classes");

        import("ORG.Util.Page");//导入分页类
        //设置搜索分页信息
        //===========================封装搜索条件==================
        //封装搜索条件
        if (!empty($_GET['q'])) {
            $where['class_name'] = array("like","%{$_GET['q']}%");
            $this->assign("title","搜索结果");
        }
        //封装文库类型条件
        if (!empty($_GET['pid'])) {
            $type['id'] = array("eq",$_GET['pid']);
            $type['pid'] = array("eq",$_GET['pid']);
            $type['_logic'] = "OR";
            //查询出类型表中符合条件的所有类型的id
            $ty = M("Cat")->field("id")->where($type)->select();
            $tid = array();//存放符合条件的类型的id
            foreach ($ty as $t) {
                $tid[] = $t['id'];
            }
            if (count($tid)>0) {
                //把符合条件的所有id存进搜索条件中
                $where['tid'] = array("in",$tid);
            }
            //查询下当前类别名
            $typename = M("Cat")->field("name")->find($_GET['pid']);
            $this->assign("title",$typename["name"]);

        }
        //拼装搜索用户上传的资源
        if (!empty($_GET['uid'])) {
            $where['uid'] = array("eq",$_GET['uid']);
            $this->assign("title","上传列表");
        }
        //拼装用户收藏的资源条件
        if (!empty($_GET['collid'])) {
            $coll = M("Stu");
            $lids = $coll->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->field("lid")->select();
            $ids = array();
            foreach ($lids as $v) {
                $ids[] = $v['lid'];
            }
            $where['id'] = array("in",$ids);
            $this->assign("title","收藏一览");
        }

        //封装所有显示的文档
        $where['status'] = array("eq","2");
        $where['title'] = array("like","%{$_GET['q']}%");

        //===========================封装搜索条件==================
        //设置分页条件
        $total = $model->where($where)->count();//获取总数据条数
        $page = new Page($total,5);//实例化一个分页对象

        //调用查询语句
        $classid = M("Stu")->where("stu_id={$_SESSION[C('USER_AUTH_KEY')]['id']}")->field("class_id")->select();
        $cids = array();
        foreach ($classid as $v) {
            $cids[] = $v['class_id'];
        }
        $where['id'] = array("not in",$cids);
        $result = $model->where($where)->order("class_name desc")->limit($page->firstRow.",".$page->listRows)->select();

        //查询上传用户名
        //遍历上面查询出的资源信息结果 对结果集进行所需信息的追加
        foreach ($result as &$vo) {
            $ob = D("Users")->field("username,picture")->find($vo['uid']);
            $vo['username'] = $ob['username'];
            $vo['picture'] = $ob['picture'];
            //组装列表中的资源名
            $ext = array_pop(explode("/",$vo['type']));
            $vo['libname'] = $vo['title'].".".$ext;

        }

        //向模板中输出查询信息和分页信息
        //$this->assign("page",$);
        $this->assign("list",$result);
        $this->assign("showPage",$page->show());
        $this->assign("list2",$result);
        $this->assign("pageinfo2",$page->show());
        //最新资源列表
        $newlist = $model->where("status=2")->order("addtime desc")->limit(16)->select();
        $this->assign("newlist",$newlist);

        //===============================================
        //执行资源分类的查询
        $type = M("Cat")->where("pid=0")->limit(6)->select();
        $this->assign("typelist",$type);
        //===============================================
        if($_SESSION[C('USER_AUTH_KEY')]){
            //调用贴吧中的查询hfnum()方法
            R("Message/hfnum");
        }
        //输出模板
        if(!$_GET['r']){
            if($_GET['q'] && isset($_GET['pid'])){
                if($_GET['pid']=='0' && $_GET['q']){
                    $this->display();
                }
            }else if(!$_GET['pid'] && !$_GET['q']){
                $this->display();
            }else{
                if($_GET['pid']){
                    $this->display();
                }
            }
        }
    }

    //显示添加手记的页面
    public function add(){
        //实例化视频表对象查询视频信息
        $model = M("Stu");
        $list = $model->find($_GET['id']);
        $this->assign("vid",$list['id']);
        $this->assign("videoname",$list['videoname']);
        $this->display();
    }

    //添加手记的方法
    public function insert(){
        $model = D("Stu");
        $classid = $_GET['id'];
        $stuid = $_SESSION[C('USER_AUTH_KEY')]['id'];
        $stuname = $_SESSION[C('USER_AUTH_KEY')]['username'];
        $stunum = $_SESSION[C('USER_AUTH_KEY')]['stu_num'];
        $arr = array('stu_id'=>$stuid,'class_id'=>$classid,'stu_name'=>$stuname,'stu_num'=>$stunum);


        if ($model -> add($arr)) {

            $this->success(L("加入成功"));
        }else{
            $this->error(L("加入失败").$model->getLastSql());
        }
    }

    //定义显示手记详情的方法
    public function detail(){
        $model = M("Note");
        $note = $model->find($_GET['id']);
        $this->assign("vo",$note);//手记的详情信息数组

        //查询相关的用户名
        $user = D("Users")->field("username,picture")->find($note['uid']);
        $this->assign("username",$user['username']);//给模板赋值创建手记的用户名
        $this->assign("picture",$user['picture']);//给模板赋值创建手记的头像

        //查询视频相关的信息
        $video = D("Video")->field("id,tid,uid,videoname,picname,clicknum")->find($note['vid']);
        $this->assign("tid",$video['tid']);//视频的类别
        $videouser = D("Users")->field("username")->find($video['uid']);
        $this->assign("videouser",$videouser['username']);//上传视频的用户
        $this->assign("videoname",$video['videoname']);//视频的名字
        $this->assign("picname",$video['picname']);//视频的缩略图
        $this->assign("clicknum",$video['clicknum']);//视频的点击率
        //查询视频的类别名
        $type = M("Cat")->field("name")->find($video['tid']);
        $this->assign("typename",$type['name']);
        //查询与本视频想关的手记
        $where['vid'] = array("eq",$note['vid']);
        $where['id'] = array("neq",$_GET['id']);//不包括本手记
        $list = $model->where($where)->limit(5)->select();
        foreach ($list as &$v) {
            $ob = D("Users")->field("username,picture")->find($v['uid']);
            $v['username'] = $ob["username"];
            $v['picture'] = $ob["picture"];
        }
        $this->assign("list",$list);//本视频相关手记

        //实例化赞表和收藏表对象
        $zan = M("Zan");
        $collect = M("Collect");
        //封装搜索条件
        $map['uid'] = array("eq",$_SESSION[C('USER_AUTH_KEY')]['id']);
        $map['nid'] = array("eq",$_GET['id']);
        //查询该用户是否赞过这个资源
        $iszan = $zan->where($map)->find();
        $zannum = $zan->where("nid={$_GET['id']}")->count();//查询被赞数
        $coll = $collect->where($map)->find();
        $collnum = $collect->where("nid={$_GET['id']}")->count();//查询被收藏数
        $this->assign("iszan",$iszan);
        $this->assign("zannum",$zannum);
        $this->assign("collect",$coll);
        $this->assign("collnum",$collnum);
        //调用手记评论模块中的显示评论方法
        R("Notecom/index",array($_GET['id']));
        //显示详情页
        $this->display();
    }

    //定义手记被赞的方法
    public function favo(){
        $zan = M("Zan");//实例化赞表对象

        //封装要添加的数据
        $map['uid'] = $_SESSION[C('USER_AUTH_KEY')]['id'];
        $map['nid'] = $_POST['id'];

        //封装搜索条件
        $where['uid'] = array("eq",$_SESSION[C('USER_AUTH_KEY')]['id']);
        $where['nid'] = array("eq",$_POST['id']);

        //查询该用户是否赞过这个手记
        $his = $zan->where($where)->find();
        if ($his) {
            $zan->where($where)->delete();//删除赞数据表中的数据
            echo "no";die;
        }else{
            //往赞表中存进手记和用户的id
            $zan->add($map);//保存数据
            echo "yes";die;
        }

    }
    //定义手记被收藏的方法
    public function collect(){
        //实例化收藏表对象
        $collect = M("Stu");

        //封装搜索要添加的数据
        $map['stu_id'] = $_SESSION[C('USER_AUTH_KEY')]['id'];
        $map['stu_id'] = $_POST['id'];

        //封装搜索条件
        $where['stu_id'] = array("eq",$_SESSION[C('USER_AUTH_KEY')]['id']);
        $where['stu_id'] = array("eq",$_POST['id']);

        //查询该用户是否收藏过这个手记
        $coll = $collect->where($where)->find();
        if ($coll) {
            $collect->where($where)->delete();//删除收藏数据表中的数据
            echo "no";die;
        }else{
            //往收藏表中存进手记和用户的id
            $collect->add($map);//保存数据
            echo "yes";die;
        }
    }
}
