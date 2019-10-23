<?php

//自定义文库模块Action类

class LibraryAction extends Action{

    //加载资源浏览页
    public function index(){
        
        //实例化表对象
        $model = M("Library");

        import("ORG.Util.Page");//导入分页类
        //设置搜索分页信息
        //===========================封装搜索条件==================
        //封装搜索条件
        if (!empty($_GET['q'])) {
            $where['title'] = array("like","%{$_GET['q']}%");
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
            $coll = M("collect");
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
        $result = $model->where($where)->order("clicknum desc")->limit($page->firstRow.",".$page->listRows)->select();
        
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
    
    //定义准备添加页面的方法
    public function add(){
        //调用类别Action中显示分类下拉菜单的方法
        R("Cat/typeSelect");
        $this->display();
    }
    //定义验证用户所选资源格式的Ajax方法
    public function checktype(){
        $filename = $_POST['filename'];
        $ext = array_pop(explode(".",$filename));
        if ($ext == "pdf") {
            echo "yes";
        }else{
            echo "no";
        }
    }
    //定义数据添加的方法
    public function insert(){

        //导入文件上传类
        import("ORG.Net.UploadFile");
        $upload = new UploadFile();
        //$upload->maxSize = "";//设置附件上传大小
        $upload->allowExts = array("pdf");//设置附件上传类型
        $upload->savePath = "./Public/Uploads/library/";//设置上传目录
        if (!$upload->upload()) {
            $this->error($upload->getErrorMsg());
        }else{
            $info = $upload->getUploadFileInfo();
        }
        //实例化对象
        $model = D("Library");

        //把要添加的数据通过create()方法保存到一个数组变量中
        if(!$model->create()){
            $this->error($model->getError());
        }
        //获取一下上传文件的尺寸和随机文件名
        $model->size = $_FILES['lib']['size'];
        $model->type = $_FILES['lib']['type'];
        $model->name = $info[0]['savename'];

        //执行数据添加
        $list = $model->add();
        if ($list != false) {

            //==============================执行资源格式的转换==========================================
            //执行上传资源的类型转换 pdf转为swf格式
            //首先获取上传资源所在目录的绝对路径
            $dir = explode("\\",rtrim(THINK_PATH,"/"));//删除路径最后的"/"
            array_pop($dir);
            $dir = implode("\\",$dir);//当前项目所在的目录
            $reslibdir = $dir."\\Public\\Uploads\\library\\";//拼装上传资源所在的目录
            $dstlibdir = $dir."\\Public\\Uploads\\library_swf\\";//拼装上传资源转成的swf文件存放的目录

            $resFile = $reslibdir.$info[0]['savename'];//上传资源路径+文件名
            $randname = substr($info[0]['savename'],0,strpos($info[0]['savename'],"."));//获取资源名的随机数字
            $dstFile = $dstlibdir.$randname.".swf";//转换成swf格式后的资源路径+文件名

            //调用函数exec()调用dos命令 将pdf格式的文件转swf格式
            //$arr返回执行的结果数组 $status为请求结果 0表示成功 1表示失败
            exec("{$dir}\\Public\\SWFTools\\pdf2swf.exe -t {$resFile} -s flashversion=9 -o {$dstFile}");

            //==============================执行资源格式的转换==========================================

            $this->display("Library/succ");//调用添加成功页面的方法
        }else{
            $this->error("数据添加失败！");
        }

    }

    //显示信息添加成功的页面
    public function succ(){
        $this->display();
    }

    
    //定义资源信息查询方法 详情页
    public function detail(){
        //实例化
        $model = D("Library");
        $vo = $model->find($_GET['id']);
        
        $model->clicknum += 1;;//执行资源的浏览量加一的操作
        $model->save();
        //查询资源表中uid对应的用户名追加到资源结果集中
        $user = D("Users")->find($vo['uid']);
        $vo['username'] = $user['username'];
        $vo['picture'] = $user['picture'];
        //执行资源类别名搜索追加到结果集
        $type = M("Cat")->field("name")->find($vo['tid']);
        $vo['typename'] = $type['name'];

        //组装资源swf格式的文件名
        $randname = substr($vo['name'],0,strpos($vo['name'],"."));
        $vo['swfname'] = $randname.".swf";//将文件名追加进结果数组

        $this->assign("vo",$vo);
        $type = array_pop(explode("/",$vo['type']));
        $this->assign("type",$type);
        
        //调用CommentActin类中的显示评论index()方法 通过R方法
        R("Libcom/index",array($_GET['id']));

        //实例化赞表和收藏表对象
        $zan = M("Zan");
        $collect = M("Collect");
        //封装搜索条件
        $where['uid'] = array("eq",$_SESSION[C('USER_AUTH_KEY')]['id']);
        $where['lid'] = array("eq",$_GET['id']);
        //查询该用户是否赞过这个资源
        $iszan = $zan->where($where)->find();
        $coll = $collect->where($where)->find();
        $collnum = $collect->where($where)->count();//查询被收藏数
        $this->assign("iszan",$iszan);
        $this->assign("collect",$coll);
        $this->assign("collnum",$collnum);
        //你可能还喜欢
        $tuilist = $model->where("status=2")->order("favonum desc")->limit(10)->select();
        $this->assign("tuilist",$tuilist);

        $this->display();
    }
    
    
    //定义资源被赞的方法
    public function favo(){
        //实例化资源表对象
        $model = D("Library");
        $zan = M("Zan");//实例化赞表对象
        //查询相应的资源
        $model->find($_POST['id']);
        //封装要添加的数据
        $map['uid'] = $_SESSION[C('USER_AUTH_KEY')]['id'];
        $map['lid'] = $_POST['id'];
        
        //封装搜索条件
        $where['uid'] = array("eq",$_SESSION[C('USER_AUTH_KEY')]['id']);
        $where['lid'] = array("eq",$_POST['id']);

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
    //定义资源被收藏的方法
    public function collect(){
        //实例化收藏表对象
        $collect = M("Collect");
        
        //封装搜索要添加的数据
        $map['uid'] = $_SESSION[C('USER_AUTH_KEY')]['id'];
        $map['lid'] = $_POST['id'];

        //封装搜索条件
        $where['uid'] = array("eq",$_SESSION[C('USER_AUTH_KEY')]['id']);
        $where['lid'] = array("eq",$_POST['id']);

        //查询该用户是否收藏过这个资源
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

    //资源下载的方法
    public function dwload(){
        $model = M("Library");
        $res = $model->find($_GET['id']);

        //资源下载量加一
        $res['dwloadnum']+=1;
        $model->save($res);
        //获取资源的类型
        $type = $res['type'];
        
        //执行资源下载
        header("Content-Type:{$type}");
        header("Content-Disposition:attachment;filename={$res['name']}");
        header("Content-Length:{$res['size']}");

        readfile("./Public/Uploads/library/{$res['name']}");
        
    }

    /*
    //定义数据删除的方法
    public function del($id){
        if (!empty($id)) {
            $model = M("Library");
            $res = $model->delete($id);
            if ($res != false) {
                $this->success("删除成功！",U("Library/index"),3);
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
            $model = M("Library");
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
        $model = M("Library");
        if ($vo = $model->create()) {
            $res = $model->save();
            if ($res != false) {
                $this->success("修改成功！",U("Library/index"),3);
            }else{
                $this->error("没有更新任何数据！");
            }
        }else{
            $this->error($model->getError());
        }
    }
     */
}
