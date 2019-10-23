<?php

//自定义文库模块Action类

class HomeworkAction extends Action{

    //加载资源浏览页
    public function index(){
        $classid = M("Classes")->where("id={$_GET['id']}")->select();
        $work = M("Work")->where("class_id={$_GET['id']}")->select();
        $this->assign("classid",$classid);
        $this->assign("work",$work);


        $this->display();

    }

    //定义准备添加页面的方法
    public function add(){
        $work_id = $_GET['id'];
        $home = M("Homework")->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']} and work_id={$work_id}")->select();
        $this->assign("home",$home);
        $this->assign("work_id",$work_id);
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
        $upload->savePath = "./Public/Uploads/homework/";//设置上传目录
        if (!$upload->upload()) {
            $this->error($upload->getErrorMsg());
        }else{
            $info = $upload->getUploadFileInfo();
        }
        //实例化对象
        $model = D("Homework");

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

            $this->display("Homework/succ");//调用添加成功页面的方法
        }else{
            $this->error("数据添加失败！");
        }

    }

    //显示信息添加成功的页面
    public function succ(){
        $this->display();
    }

    public function detail(){
        //实例化
        $model = D("Homework");
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
}
