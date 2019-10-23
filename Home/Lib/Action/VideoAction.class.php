<?php

//自定义视频模块的Action类

class VideoAction extends Action{

    //加载视频资源浏览页
    public function index(){
        
        //实例化表对象
        $model = M("Video");

        import("ORG.Util.Page");//导入分页类
        //设置搜索分页信息
        //===========================封装搜索条件==================
        //封装搜索条件
        if (!empty($_GET['q'])) {
            $where['videoname'] = array("like","%{$_GET['q']}%");
            $this->assign("title","搜索结果——{$_GET['q']}");
        }
        //封装视频类型条件
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
        //拼装搜索用户上传的视频
        if ($_GET['uid']) {
            $where['uid'] = array("eq",$_GET['uid']);
            $this->assign("title","我上传的");
        }
        //拼装搜索用户收藏视频的id
        if (!empty($_GET['collid'])) {
            //拼装用户收藏视频的条件
            $coll = M("collect");
            $vids = $coll->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->field("vid")->select();
            $ids = array();
            foreach ($vids as $v) {
                $ids[] = $v['vid'];
            }
            $where['id'] = array("in",$ids);
            $this->assign("title","收藏视频列表");
        }
        $where['status'] = array("eq","2");
        /*怎么拼装搜索方法啊？=========================？？？
        if (count($where)>2) {
            $map['_complex'] = $where;
            $map['status'] = array("eq","2");
            $where = $map;
        }*/
        //===========================封装搜索条件==================
        //设置分页条件
        $total = $model->where($where)->count();//获取总数据条数
        $page = new Page($total,9);//实例化一个分页对象
        
        //调用查询语句
        $result = $model->where($where)->limit($page->firstRow.",".$page->listRows)->order("clicknum desc")->select();

        
        //向模板中输出查询信息和分页信息
        //$this->assign("page",$);
        $this->assign("list",$result);
        $this->assign('list1',$result);
        //查询最新视频榜
        $this->assign("newlist",$model->where("status=2")->order("addtime desc")->limit(16)->select());
        $this->assign("showPage",$page->show());
        $this->assign("pageinfo1",$page->show());

        //===============================================
        //执行视频分类的查询
        $type = M("Cat")->where("pid=0")->limit(6)->select();
        $this->assign("typelist",$type);
        //===============================================
        
        //调用类别Action中显示分类下拉菜单的方法
        R("Cat/typeSelect");
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
    /*
    //定义准备添加页面的方法
    public function add(){
        $this->display();
    } 
     */
    //定义Ajax验证视频名是否存在的方法
    public function checkname(){
        $videoname = $_POST['videoname'];
        $res = M("Video")->where("videoname='{$videoname}'")->select();
        if ($res) {
            echo "yes";
        }else{
            echo "no";
        }
    }
    //定义上传视频的方法
    public function insert(){
        //首先将视频的基本信息存进SESSION中
        $_SESSION[C("USER_AUTH_KEY")]['video'] = $_POST;  
        //dump($_SESSION[C("USER_AUTH_KEY")]);exit;
        $this->display("Video/upload");
    }
    
    //执行视频的上传
    public function fileupload(){
        //执行视频的上传
        //导入上传类
        import("ORG.Net.UploadFile");
        $upload = new UploadFile();
        $upload->maxSize = "100000000000";//设置附件上传大小
        $upload->allowExts = array("mp4","flv");//设置附件上传类型
        $upload->savePath = "./Public/Uploads/video/";//设置上传目录
        if (!$upload->upload()) {
            $error = $upload->getErrorMsg();
            echo $error;
            //$this->error($upload->getErrorMsg());
        }else{
            $info = $upload->getUploadFileInfo();

            //================取得视频文件的缩略图=================
            //需要生成视频图片的大小分别为 200*140 首页的大图需要1024*450的
            //利用ffmpeg命令取得缩略图
            //首先获取上传视频所在目录的绝对路径
            $dir = explode("\\",rtrim(THINK_PATH,"/"));//删除路径最后的"/"
            array_pop($dir);
            $dir = implode("\\",$dir);//当前项目所在的目录
            $reslibdir = $dir."\\Public\\Uploads\\video\\";//拼装上传视频所在的目录
            $dstlibdir = $dir."\\Public\\Uploads\\videopic\\";//把视频的缩略图放进该目录

            $resFile = $reslibdir.$info[0]['savename'];//上传资源路径+文件名
            $randname = substr($info[0]['savename'],0,strpos($info[0]['savename'],"."));//获取资源名的随机数字
            $dstFile1 = $dstlibdir.$randname.".jpg";//生成缩略图后的路径加图片名
            //$dstFile2 = $dstlibdir."l_".$randname.".jpg";//生成1024*450的缩略图
            //调用函数exec()调用dos命令
            //$arr返回执行的结果数组 $status为请求结果 0表示成功 1表示失败
            //获取视频的缩略图
            exec("{$dir}\\Public\\ffmpeg\\bin\\ffmpeg -i {$resFile} -y -f mjpeg -ss 5 -t 0.01 -s 200*140 {$dstFile1}"); //小图
            //exec("{$dir}\\Public\\ffmpeg\\bin\\ffmpeg -i {$resFile} -y -f mjpeg -ss 100 -t 0.01 -s 1024*450 {$dstFile2}");//大图
            //================取得视频文件的缩略图=================

            $file['name'] = $info[0]['savename'];
            $file['size'] = $_FILES['Filedata']['size'];//取得文件的大小
            $fileinfo = pathinfo($_FILES['Filedata']['name']);
            $file['type'] = $fileinfo['extension'];//取得文件的类型
            $file['picname'] = $randname.".jpg";//视频的缩略图
            echo json_encode($file);
        }
    }
    //定义添加视频数据的方法
    public function addvideo(){
        $model = D("Video");
        $list = $model->create();
        //dump($list);exit;
        if ($model->add()) {
            $this->display("Video/succ");
        }else{
            $this->error("上传失败！");
        }
        
    }

    //定义显示视频详情的方法‘
    public function detail(){
        //执行视频浏览量的加一
        //实例化视频表对象查询相应的视频信息
        $model = D("Video");
        $list = $model->find($_GET['id']);
        $this->assign("vo",$list);
        //实例化资源表对象 查询相关资源
        $lib = M("Library");
        $this->assign("lib",$lib->where("tid={$_GET['tid']}")->order("clicknum desc")->limit(8)->select());
        
        //查询资源所属的类别名
        $type = D("Cat")->field("name")->find($list['tid']);
        $this->assign("typename",$type['name']);

        //查询该视频用户自己的创建的笔记列表
        $where['uid'] = array("eq",$_SESSION[C('USER_AUTH_KEY')]['id']);
        $where['vid'] = array("eq",$_GET['id']);
        $notenum = M("Note")->where($where)->count();//统计自己创建该视频的手记数量
        $note = M("Note")->where($where)->limit(5)->order("addtime desc")->select();
        $this->assign("notenum",$notenum);
        $this->assign("note",$note);
        //查询收藏表中 统计该视频被收藏的次数
        $coll = M("collect");
        $collnum = $coll->where("vid={$_GET['id']}")->count();
        $this->assign("collnum",$collnum);
        //调用评论表中显示视频评论的方法
        R("Videocom/index",array($_GET['id']));
        //$this->assign("resUrl",$_SERVER["HTTP_REFERER"]);//把当前页的URL地址赋给模板
        $this->display();
    }

    //定义视频播放的方法
    public function play(){
        //实例化视频表对象
        $model = M("Video");
        $vo = $model->find($_GET['id']);
        $model->clicknum += 1;;//执行视频的点击率加一
        $model->save();

        //查询该视频的笔记列表
        $note = M("Note")->where("vid={$_GET['id']}")->limit(5)->select();
        $notenum = M("Note")->where("vid={$_GET['id']}")->count();
        $this->assign("note",$note);
        $this->assign("notenum",$notenum);
        //调用评论表中显示视频评论的方法
        R("Videocom/index",array($_GET['id']));
        
        //实例化赞表和收藏表对象
        $zan = M("Zan");
        $collect = M("Collect");
        //封装搜索条件
        $where['uid'] = array("eq",$_SESSION[C('USER_AUTH_KEY')]['id']);
        $where['vid'] = array("eq",$_GET['id']);
        //查询该用户是否赞过这个资源
        $iszan = $zan->where($where)->find();
        $coll = $collect->where($where)->find();
        $this->assign("iszan",$iszan);
        $this->assign("collect",$coll);
        /*
        //首先判断该用户是否登录 未登录则不做记录
        if ($_SESSION[C('USER_AUTH_KEY')]['id']) {
            //记录用户的观看视频记录
            $history = M("Vhistory");
            $map["uid"] = $_SESSION[C('USER_AUTH_KEY')]['id'];
            $map['vid'] = $_GET['id'];
            //首先判断该用户是否看过这个视频，若看过只更新数据表时间
            $res = $history->where($where)->find();
            if ($res) {
                $res['addtime'] = time();
                $history->where($where)->save($res);//更新时间
            }else{
                $map['addtime'] = time();
                $history->add($map);//保存记录
            }
        }
         */
        //根据用户所看视频的类别id查询其他相应的视频 猜你喜欢模块
        //$like = $model->where("tid={$vo['tid']}")->limit(6)->select();
        //查询点击率前六位的视频
        $like = $model->where("id<>{$_GET['id']}")->order("clicknum desc")->limit(6)->select();
        $this->assign("like",$like);

        $this->assign("vo",$vo);
        $this->display();
    }

    //定义视频被赞的方法
    public function favo(){
        //实例化资源表对象
        $model = D("Video");
        $zan = M("Zan");//实例化赞表对象
        //查询相应的资源
        $model->find($_POST['id']);
        //封装要添加的数据
        $map['uid'] = $_SESSION[C('USER_AUTH_KEY')]['id'];
        $map['vid'] = $_POST['id'];
        
        //封装搜索条件
        $where['uid'] = array("eq",$_SESSION[C('USER_AUTH_KEY')]['id']);
        $where['vid'] = array("eq",$_POST['id']);

        //查询该用户是否赞过这个资源
        $his = $zan->where($where)->find();
        if ($his) {
            $model->favonum -= 1;//让资源的被赞量减一
            $model->save();
            $zan->where($where)->delete();//删除赞数据表中的数据
            echo "no";die;
        }else{
            $model->favonum += 1;//赞数加一
            $model->save();
            //往赞表中存进资源和用户的id
            $zan->add($map);//保存数据
            echo "yes";die; 
        }     
       
    }
    //定义视频被收藏的方法
    public function collect(){
        //实例化收藏表对象
        $collect = M("Collect");
        
        //封装搜索要添加的数据
        $map['uid'] = $_SESSION[C('USER_AUTH_KEY')]['id'];
        $map['vid'] = $_POST['id'];

        //封装搜索条件
        $where['uid'] = array("eq",$_SESSION[C('USER_AUTH_KEY')]['id']);
        $where['vid'] = array("eq",$_POST['id']);

        //查询该用户是否收藏过这个视频
        $coll = $collect->where($where)->find();
        if ($coll) {
            $collect->where($where)->delete();//删除收藏数据表中的数据
            echo "no";die;
        }else{
            //往收藏表中存进视频和用户的id
            $collect->add($map);//保存数据
            echo "yes";die; 
        }     
    }
    //定义添加笔记的方法
    public function addNote(){
        $model = D("Note");
        $list = $model->create();
        if ($model->add($list)) {
            $this->success("创建成功！",U("Video/detail?{$list['vid']}"));
        }else{
            $this->error("创建失败！");
        }
    }


    /*
    //定义数据删除的方法
    public function del($id){
        if (!empty($id)) {
            $model = M("Video");
            $res = $model->delete($id);
            if ($res != false) {
                $this->success("删除成功！",U("Video/index"));
            }else{
                $this->error("删除失败！");
            }
        }else{
            $this->error("ID错误！");
        }
    }

    //定义准备编辑页面的方法
    public function edit($id){
        if (!empty($id)) {
            $model = M("Video");
            $vo = $model->find($id);
            if ($vo) {
                $this->assign("vo",$vo);
                $this->display();
            }else{
                $this->error("数据不存在！");
            }
        }else{
             $this->error("ID错误！");
        }
    }
    //定义更新数据的方法
    public function update(){
        $model = M("Video");
        if ($vo = $model->create()) {
            $res = $model->save();
            if ($res != false) {
                $this->success("修改成功！",U("Video/index"));
            }else{
                $this->error("没有更新任何数据！");
            }
        }else{
            $this->error($model->getError());
        }
    }
     */
}
