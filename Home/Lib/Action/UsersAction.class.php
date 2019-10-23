<?php
session_start();
//自定义用户操作模块Action类

class UsersAction extends Action{

    //加载资源浏览页
    public function index(){
		if($_SESSION[C('USER_AUTH_KEY')]['username']){
			$this->display('Index/index');
		}
        //===============================================  
        if($_SESSION[C('USER_AUTH_KEY')]){
            //调用贴吧中的查询hfnum()方法
            R("Message/hfnum");
        }
        $this->display('index');
    }

    public function myclass(){
        if(!$_SESSION[C('USER_AUTH_KEY')]['username']){
            $this->display('Users/index');
        }
        $m=M("Uservisit");
        $vid=$_SESSION[C('USER_AUTH_KEY')]['id'];
        $vit=$m->where("vid='$vid' and uid!='$vid'")->limit(4)->order("visittime desc")->select();
        $vit1=$m->where("uid='$vid' and vid!='$vid'")->limit(4)->order("visittime desc")->select();
        //dump($vit1);
        $num=count($vit);
        $num1=count($vit);
        $this->assign("number",$num);
        $this->assign("number1",$num1);
        $this->assign("visitor",$vit);
        $this->assign("visitor1",$vit1);

        //查询用户加入的班级
        $classid = M("Stu")->where("stu_id={$_SESSION[C('USER_AUTH_KEY')]['id']}")->field("class_id")->select();
        //$class = M("Stu")->where("stu_id={$_SESSION[C('USER_AUTH_KEY')]['id']}")->select();

        $classnum = M("Stu")->where("stu_id={$_SESSION[C('USER_AUTH_KEY')]['id']} and class_id<>0")->field("class_id")->count();
        $cids = array();
        foreach ($classid as $v) {
            $cids[] = $v['class_id'];
        }
        $where['id'] = array("in",$cids);
        //$class = M("Classes")->where($where)->select();
        $classes = M("Classes")->where($where)->limit(5)->select();
        $this->assign("classes",$classes);
        $this->assign("classnum",$classnum);
        //$this->assign("class",$class);

        //查询用户加入班级数量
        $video = M("Stu");
        $this->assign("classnum",$video->where("stu_id={$_SESSION[C('USER_AUTH_KEY')]['id']}")->count());
        //查询上传课件数量
        $lib = M("Library");
        $this->assign("libnum",$lib->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']} AND status=2")->count());

        $mod=M("Usermessage");
        $mes=$mod->where("myid='$vid' and vid!='$vid'")->limit(3)->order("addtime desc")->select();
        $mess=array_reverse($mes);
        $this->assign("umessage",$mess);
        $res1=$mod->where("myid='$vid' and vid='$vid'")->order('addtime desc')->limit(1)->select();
        $this->assign("mymes1",$res1);
        $this->display('myclass');
        if($class_id = $_GET['class_id'])
        {
            M("Stu")->where("class_id={$_SESSION['class_id']} AND stu_id={$_SESSION[C('USER_AUTH_KEY')]['id']}")->delete();
            $this->display('myclass');
        }

    }

    public function delete() {
        //实例化对象
        $model = M("Stu");
        $class_id = $_GET['id'];
        $list = $model->field("stu_id")->find($_GET['id']);//查询该条数据的服务器资源名
        //执行数据库信息的删除
        if ($model->where("class_id={$_GET['id']} and stu_id={$_SESSION[C('USER_AUTH_KEY')]['id']}")->delete()) {

            $this->success(L("退出成功"));
        }else{
            $this->error(L("退出失败").$model->getLastSql());
        }
    }

    public function myedu(){
		if(!$_SESSION[C('USER_AUTH_KEY')]['username']){
			$this->display('Users/index');
		}
        $this->assign("title","E-Sch___个人中心");
		$m=M("Uservisit");
		$vid=$_SESSION[C('USER_AUTH_KEY')]['id'];
		$vit=$m->where("vid='$vid' and uid!='$vid'")->limit(4)->order("visittime desc")->select();
		$vit1=$m->where("uid='$vid' and vid!='$vid'")->limit(4)->order("visittime desc")->select();
		//dump($vit1);
		$num=count($vit);
        $num1=count($vit);
        $this->assign("number",$num);
		$this->assign("number1",$num1);
		$this->assign("visitor",$vit);
		$this->assign("visitor1",$vit1);

        //查询用户个人中心的数据条数
        //查询用户上传视频数量
        $video = M("Video");
        $this->assign("videonum",$video->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']} AND status=2")->count());

        //查询用户加入班级数量
        $video = M("Stu");
        $this->assign("classnum",$video->where("stu_id={$_SESSION[C('USER_AUTH_KEY')]['id']}")->count());
        //查询用户上传的文库资源数量
        $lib = M("Library");
        $this->assign("libnum",$lib->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']} AND status=2")->count());
        //查询用户收藏的视频
        $vids = M("Collect")->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->field("vid")->select();
        $collnum = M("Collect")->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']} and vid<>0")->field("vid")->count();
        $ids = array();
        foreach ($vids as $v) {
            $ids[] = $v['vid'];
        }
        $where['id'] = array("in",$ids);
        $collect = M("Video")->where($where)->limit(5)->select();
        $this->assign("collect",$collect);
        $this->assign("collnum",$collnum);


        //查询用户收藏的文库资源
        $lids = M("Collect")->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->field("lid")->select();
        $libnum = M("Collect")->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']} and lid<>0")->field("lid")->count();
        $libids = array();
        foreach ($lids as $l) {
            $libids[] = $l['lid'];
        }
        $libmap['id'] = array("in",$libids);
        $libcoll = M("Library")->where($libmap)->limit(5)->select();
        $this->assign("libcoll",$libcoll);
        $this->assign("libcollnum",$libnum);

        
		$mod=M("Usermessage");
		$mes=$mod->where("myid='$vid' and vid!='$vid'")->limit(3)->order("addtime desc")->select();
		$mess=array_reverse($mes);
		$this->assign("umessage",$mess);
		$res1=$mod->where("myid='$vid' and vid='$vid'")->order('addtime desc')->limit(1)->select();
		$this->assign("mymes1",$res1);
        $this->display('myedu');
    }



    public function settings(){
		$this->assign("title","个人中心___资料设置");
        $this->display('settings');
    }


    public function avatar(){
		$this->assign("title","个人中心___修改头像");
        $this->display('avatar');
    }
    //定义数据添加的方法
    public function insert(){
        //实例化对象
        $model = D("Users");

        //把要添加的数据通过create()方法保存到一个数组变量中
        if(!$model->create()){
            $this->error($model->getError());
        }
        //执行数据添加
        //$model->addtime=time();
        $list = $model->add();
        //echo $model->getLastSql();
        if ($list != false) {
            //查询刚注册用户的信息 存进SESSION中
            $userInfo = $model->find($list);
            $_SESSION[C("USER_AUTH_KEY")] = $userInfo;
            $this->redirect("Index/index");//注册成功直接跳到首页
            //$this->display("Users/succ");//调用添加成功页面的方法
        }else{
            echo $model->getLastSql();exit;
            //$this->error("数据添加失败！");
        }
        
    }

    //显示信息添加成功的页面
    public function succ(){
        $this->display();
    }
   

    //用户登陆
    //登陆验证
    public function dologin(){
        $model=D('Users');
        $where['username']=$_POST['email'];
        $where['email']=$_POST['email'];
        $where['_logic']="OR";
        $list=$model->where($where)->select();
        if($list){
            if($list[0]['userpass']==md5($_POST['password'])){
                $_SESSION[C('USER_AUTH_KEY')]=$list[0];
                R("Message/hfnum");
                //$this->success("登陆成功！",U("Index/index"));
                $this->redirect("Index/index");
            }else{
                $this->error("密码错误！");
            }
        }else{
            $this->error("用户不存在！");
        }
    }


    public function loginout(){
        $_SESSION[C('USER_AUTH_KEY')]='';
        $this->redirect("Index/index");
    }
    //加载登陆页面
    public function login(){

        $this->display('login');
    }


    //个人中心



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
		$date['upicname']=$_POST["picture"];
		$date1['vpicname']=$_POST["picture"];
		$id=$_POST['id'];
        $model = D("Users");
        if ($vo = $model->create()) {
            $res = $model->save();
            if ($res != false) {
				$model1=M("Uservisit");
				$model1->where("uid='{$id}'")->save($date);
				$model1->where("vid='{$id}'")->save($date1);
				//修改成功以后，删除原头像
				unlink("./Public/Uploads/users/{$_SESSION[C('USER_AUTH_KEY')]['username']}/{$_SESSION[C('USER_AUTH_KEY')]['picture']}");
				unlink("./Public/Uploads/users/{$_SESSION[C('USER_AUTH_KEY')]['username']}/s_{$_SESSION[C('USER_AUTH_KEY')]['picture']}");
				$_SESSION[C('USER_AUTH_KEY')]['picture']=$_POST["picture"];
                //$this->success("修改成功！",U("Users/settings"),3);
				$this->redirect("Users/settings");
            }else{
				unlink("./Public/Uploads/users/{$_SESSION[C('USER_AUTH_KEY')]['username']}/{$_POST['picture']}");
				unlink("./Public/Uploads/users/{$_SESSION[C('USER_AUTH_KEY')]['username']}/s_{$_POST['picture']}");
				$this->error("没有更新任何数据！");
            }
        }else{
			unlink("./Public/Uploads/users/{$_SESSION[C('USER_AUTH_KEY')]['username']}/{$_POST['picture']}");
				unlink("./Public/Uploads/users/{$_SESSION[C('USER_AUTH_KEY')]['username']}/s_{$_POST['picture']}");
            $this->error($model->getError());
			
        }
    }

//图片上传显示裁剪
public function uploadpic(){
    import("ORG.Net.UploadFile");
    $picfile=$_POST['picfile'];
            $upload=new UploadFile();
            $upload->maxSize  = 3145728 ;// 设置附件上传大小
		    $upload->allowExts  = array('jpg', 'gif','bmp' ,'png', 'jpeg');// 设置附件上传类型
		    $upload->savePath =  "./Public/Uploads/users/$picfile/";// 设置附件上传目录
            if(!$upload->upload()){
                die("上传文件失败".$upload->getErrorMsg());
            }else{
                $info=$upload->getUploadFileInfo();
            }
			$picsrc=$info[0]['savename'];
			$path="./Public/Uploads/users/$picfile/";
			//调用图片缩放
			$this->updateImage($picsrc,$path,"",140,'');
			$this->updateImage($picsrc,$path,"s_",50,50);
			
            die("<script>window.parent.showpic('{$info[0]['savename']}');</script>");
           //echo "<script>showpic();</script>";

}

        public function doJcrop(){
            $picname=$_POST['pic'];
            $sx=$_POST['x'];
            $sy=$_POST['y'];
            $sw=$_POST['w'];
            $sh=$_POST['h'];
            $path="./Public/Uploads/users/{$_SESSION[C('USER_AUTH_KEY')]['username']}";
            cropImage($picname,$path,$sx,$sy,$sw,$sh,$prix="");
            die('ok');
        }



//图片缩放
public function updateImage($picname,$path,$prix="s_",$maxwidth=104,$maxheight=104){
	//1. 定义获取基本信息
	$path = rtrim($path,"/"); //去除后面多余的"/"
	$info = getimagesize($path."/".$picname);  //获取图片文件的属性信息
	$width = $info[0]; //原图片的宽度
	$height = $info[1]; //原图片的高度

	//2. 计算压缩后的尺寸
	//if(($maxwidth/$width)<($maxheight/$height)){
		$w=$maxwidth;//新图片的宽度
		$h=($maxwidth/$width)*$height;//新图片的高度
	//}else{
		//$h=$maxheight;//新图片的宽度
		//$w=($maxheight/$height)*$width;//新图片的高度
	//}


	//3. 创建图像源
	dump($info);
	$newim =imagecreateTrueColor($w,$h); //新图片源
	//根据原图片类型来创建图片源
	switch($info[2]){
		case 1: //gif格式
			$srcim = imageCreateFromgif($path."/".$picname);
			break;
		case 2: //jpeg格式
			$srcim = imageCreateFromjpeg($path."/".$picname);
			break;
		case 3: //png格式
			$srcim = imageCreateFrompng($path."/".$picname);
			break;
		case 6: //bmp格式
			$srcim = imageCreateFrompng($path."/".$picname);
			break;
		default :
			exit("无效的图片格式!");
			break;
	}

	//4. 执行缩放处理
	imagecopyresampled($newim,$srcim,0,0,0,0,$w,$h,$width,$height);


	//5. 输出保存绘画
	//header("Content-Type:".$info['mime']); //设置响应类型为图片格式
	//根据原图片类型来保存新图片
	switch($info[2]){
		case 1: //gif格式
			imagegif($newim,$path."/".$prix.$picname); //保存
			//imagegif($newim);//输出
			break;
		case 2: //jpeg格式
			imagejpeg($newim,$path."/".$prix.$picname);
			//imagejpeg($newim);
			break;
		case 3: //png格式
			imagepng($newim,$path."/".$prix.$picname);
			//imagepng($newim);
			break;
		case 6: //bmp格式
			imagebmp($newim,$path."/".$prix.$picname);
			break;
	}

	//6. 销毁资源
	imageDestroy($newim);
	imageDestroy($srcim);
}


public function updateImage1($picname,$path,$prix="s_",$maxwidth=104,$maxheight=104){
	//1. 定义获取基本信息
	$path = rtrim($path,"/"); //去除后面多余的"/"
	$info1 = getimagesize($path."/".$picname);  //获取图片文件的属性信息
	$width = $info1[0]; //原图片的宽度
	$height = $info1[1]; //原图片的高度
	
	//2. 计算压缩后的尺寸
	if(($maxwidth/$width)<($maxheight/$height)){
		$w=$maxwidth;//新图片的宽度
		$h=($maxwidth/$width)*$height;//新图片的高度
	}else{
		$h=$maxheight;//新图片的宽度
		$w=($maxheight/$height)*$width;//新图片的高度
	}


	//3. 创建图像源
	$newim =imagecreateTrueColor($w,$h); //新图片源
	//根据原图片类型来创建图片源
	switch($info1[2]){
		case 1: //gif格式
			$srcim = imageCreateFromgif($path."/".$picname);
			break;
		case 2: //jpeg格式
			$srcim = imageCreateFromjpeg($path."/".$picname);
			break;
		case 3: //png格式
			$srcim = imageCreateFrompng($path."/".$picname);
			break;
		case 6: //bmp格式
			$srcim = imageCreateFrompng($path."/".$picname);
			break;
		default:
			exit("无效的图片格式!");
			break;
	}

	//4. 执行缩放处理
	imagecopyresampled($newim,$srcim,0,0,0,0,$w,$h,$width,$height);


	//5. 输出保存绘画
	//header("Content-Type:".$info['mime']); //设置响应类型为图片格式
	//根据原图片类型来保存新图片
	switch($info1[2]){
		case 1: //gif格式
			imagegif($newim,$path."/".$prix.$picname); //保存
			//imagegif($newim);//输出
			break;
		case 2: //jpeg格式
			imagejpeg($newim,$path."/".$prix.$picname);
			//imagejpeg($newim);
			break;
		case 3: //png格式
			imagepng($newim,$path."/".$prix.$picname);
			//imagepng($newim);
			break;
		case 6: //bmp格式
			imagebmp($newim,$path."/".$prix.$picname);
			break;
	}

	//6. 销毁资源
	imageDestroy($newim);
	imageDestroy($srcim);
}




 public function showpic(){
	      $pid = $_GET['pid'];    		//把相册的id带入页面
		  $uid = $_GET['uid'];          //把相册的uid带入照片页面
		  $des =$_GET['desc'];
		  //查询照片 
		  $photo = D("Userphotos");
		  //$album =D("Users_photoalbum");
		  
		  $res = $photo->where("uid='{$uid}' and pid='{$pid}'")->select();
          //echo $photo->getLastSql();
		  $this->assign("list",$res);
          $this->assign("pid",$pid);
          $this->assign("desc",$des);
          $this->assign("title","个人中心___我的照片墙");
		  $this->assign("uid",$uid);
	      $this->display("showpic");
	  }
	  public function showotherpic(){
	      $pid = $_GET['pid'];    		//把相册的id带入页面
		  $uid = $_GET['uid'];          //把相册的uid带入照片页面
		  $des =$_GET['desc'];
		  //查询照片 
		  $photo = D("Userphotos");
		  //$album =D("Users_photoalbum");
		  
		  $res = $photo->where("uid='{$uid}' and pid='{$pid}'")->select();
          //echo $photo->getLastSql();
		  $this->assign("list",$res);
          $this->assign("pid",$pid);
          $this->assign("desc",$des);
          $this->assign("title","个人中心___我的照片墙");
		  $this->assign("uid",$uid);
	      $this->display("showotherpic");
	  }

public function photoalbum(){
	$uid=$_SESSION[C('USER_AUTH_KEY')]['id'];
	$album=D("Users_photoalbum");
	$res=$album->where("uid='{$uid}'")->select();
	$count=count($res);
	if($res){
		$this->assign("countphoto",$count);
		$this->assign("list",$res);
	}else{
		$this->assign("countphoto",'0');
	}
	
	//从myedu导入
		$this->assign("title","个人中心___我的相册");
		$m=M("Uservisit");
		$vid=$_SESSION[C('USER_AUTH_KEY')]['id'];
		$vit=$m->where("vid='$vid' and uid!='$vid'")->limit(4)->order("visittime desc")->select();
		$vit1=$m->where("uid='$vid' and vid!='$vid'")->limit(4)->order("visittime desc")->select();
		//dump($vit1);
		$num=count($vit);
		$num1=count($vit);
		$this->assign("visitor",$vit);
		$this->assign("visitor1",$vit1);

        //===================================贴吧======================================
        //帖子数统计
        $mnum=D('Message')->where("uid='{$_SESSION[C('USER_AUTH_KEY')]['id']}'")->count();
        $this->assign("messnum",$mnum);
        //我的关注
        $mod=M("Friend");
        $mod2=M("Users");
        $res=$mod->where("uid='{$_SESSION[C('USER_AUTH_KEY')]['id']}'")->limit(5)->select();
        //统计我关注的人数
        $myfrinum=$mod->where("uid='{$_SESSION[C('USER_AUTH_KEY')]['id']}'")->count();
        //统计关注我的人数
        $myfsnum=$mod->where("fid='{$_SESSION[C('USER_AUTH_KEY')]['id']}'")->count();
        foreach($res as &$v){
            $uu=$mod2->field('username,picture')->find($v['fid']);
            $v['username']=$uu['username'];
            $v['picture']=$uu['picture'];
        }
        $this->assign('myfri',$res);        //取四个我关注的人并赋值
        $this->assign('myfrinum',$myfrinum);//我关注的人总数
        $this->assign('myfsnum',$myfsnum);  //关注我的人总数
        //************************************************************************

        //查询用户个人中心的数据条数
        //查询用户上传视频数量
        $video = M("Video");
        $this->assign("videonum",$video->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->count());
        //查询用户创建的手记以及数量
        $note = M("Note");
        $this->assign("note",$note->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->limit(5)->select());
        $this->assign("notenum",$note->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->count());
        //查询用户上传的文库资源数量
        $lib = M("Library");
        $this->assign("libnum",$lib->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->count());
        //查询用户收藏的视频
        $vids = M("Collect")->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->field("vid")->select();
        $collnum = M("Collect")->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']} and vid<>0")->field("vid")->count();
        $ids = array();
        foreach ($vids as $v) {
            $ids[] = $v['vid'];
        }
        $where['id'] = array("in",$ids);
        $collect = M("Video")->where($where)->limit(4)->select();
        $this->assign("collect",$collect);
        $this->assign("collnum",$collnum);
       
        
        $this->assign("number",$num);
		$this->assign("number1",$num1);
		
		
		
		$mod=M("Usermessage");
		$mes=$mod->where("myid='$vid'")->limit(3)->order("addtime desc")->select();
		$mess=array_reverse($mes);
		$this->assign("umessage",$mess);
		$res1=$mod->where("myid='$vid' and vid='$vid'")->order('addtime desc')->limit(1)->select();
		$this->assign("mymes1",$res1);
	
	
	
	
	$this->display("photoalbum");
}

public function addalbum(){
	$uid=$_SESSION[C('USER_AUTH_KEY')]['id'];
	$model=D("Users_photoalbum");
	if(!$model->create()){
            $this->error($model->getError());
        }
        //执行数据添加
        $model->uid=$uid;
        
        $list = $model->add();
        //;hecho $model->getLastSql();
        if ($list != false) {
			$this->photoalbum();
        }else{
		//echo $modle->getLastSql();
            $this->error("数据添加失败！");
        }
}
public function photos(){
	$uid=$_SESSION[C('USER_AUTH_KEY')]['id'];
	$pid=$_GET['pid'];	
	$des=$_GET['desc'];
	$model=D("Userphotos");
	$res=$model->where("uid='$uid' and pid='$pid'")->select();
	$count=count($res);
	if($res){
		$this->assign("countphoto",$count);
		$this->assign("list",$res);
		$this->assign('desc',$des);
		
	}else{
		$this->assign("countphoto",'0');
	}
	
	//从myedu导入
		$this->assign("title","个人中心___照片浏览");
		$m=M("Uservisit");
		$vid=$_SESSION[C('USER_AUTH_KEY')]['id'];
		$vit=$m->where("vid='$vid' and uid!='$vid'")->limit(4)->order("visittime desc")->select();
		$vit1=$m->where("uid='$vid' and vid!='$vid'")->limit(4)->order("visittime desc")->select();
		//dump($vit1);
		$num=count($vit);
		$num1=count($vit);
		$this->assign("visitor",$vit);
		$this->assign("visitor1",$vit1);

        //===================================贴吧======================================
        //帖子数统计
        $mnum=D('Message')->where("uid='{$_SESSION[C('USER_AUTH_KEY')]['id']}'")->count();
        $this->assign("messnum",$mnum);
        //我的关注
        $mod=M("Friend");
        $mod2=M("Users");
        $res=$mod->where("uid='{$_SESSION[C('USER_AUTH_KEY')]['id']}'")->limit(5)->select();
        //统计我关注的人数
        $myfrinum=$mod->where("uid='{$_SESSION[C('USER_AUTH_KEY')]['id']}'")->count();
        //统计关注我的人数
        $myfsnum=$mod->where("fid='{$_SESSION[C('USER_AUTH_KEY')]['id']}'")->count();
        foreach($res as &$v){
            $uu=$mod2->field('username,picture')->find($v['fid']);
            $v['username']=$uu['username'];
            $v['picture']=$uu['picture'];
        }
        $this->assign('myfri',$res);        //取四个我关注的人并赋值
        $this->assign('myfrinum',$myfrinum);//我关注的人总数
        $this->assign('myfsnum',$myfsnum);  //关注我的人总数
        //************************************************************************

        //查询用户个人中心的数据条数
        //查询用户上传视频数量
        $video = M("Video");
        $this->assign("videonum",$video->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->count());
        //查询用户创建的手记以及数量
        $note = M("Note");
        $this->assign("note",$note->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->limit(5)->select());
        $this->assign("notenum",$note->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->count());
        //查询用户上传的文库资源数量
        $lib = M("Library");
        $this->assign("libnum",$lib->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->count());
        //查询用户收藏的视频
        $vids = M("Collect")->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->field("vid")->select();
        $collnum = M("Collect")->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']} and vid<>0")->field("vid")->count();
        $ids = array();
        foreach ($vids as $v) {
            $ids[] = $v['vid'];
        }
        $where['id'] = array("in",$ids);
        $collect = M("Video")->where($where)->limit(4)->select();
        $this->assign("collect",$collect);
        $this->assign("collnum",$collnum);
       
        
        $this->assign("number",$num);
		$this->assign("number1",$num1);
		
		
		
		$mod=M("Usermessage");
		$mes=$mod->where("myid='$vid'")->limit(3)->order("addtime desc")->select();
		$mess=array_reverse($mes);
		$this->assign("umessage",$mess);
		$res1=$mod->where("myid='$vid' and vid='$vid'")->order('addtime desc')->limit(1)->select();
		$this->assign("mymes1",$res1);
	
	
	
	
	$this->display("photos");
}


//查看别人照片


public function otherphotos(){
	$uid=$_GET['uid'];
	$pid=$_GET['pid'];	
	$des=$_GET['desc'];
	$model=D("Userphotos");
	$res=$model->where("uid='$uid' and pid='$pid'")->select();
	$count=count($res);
	if($res){
		$this->assign("countphoto",$count);
		$this->assign("list",$res);
		$this->assign('desc',$des);
		
	}else{
		$this->assign("countphoto",'0');
	}
	
	//otheredu导入
		$m=M("Uservisit");
		$vid=$_GET['uid'];
		$vit=$m->where("vid='$vid' and uid!='$vid'")->limit(4)->order("visittime desc")->select();
		$vit1=$m->where("uid='$vid' and vid!='$vid'")->limit(4)->order("visittime desc")->select();
		//dump($vit1);
		$num=count($vit);
		$num1=count($vit);
		$this->assign("visitor",$vit);
		$this->assign("visitor1",$vit1);

        //===================================贴吧======================================
        //帖子数统计
        $mnum=D('Message')->where("uid='$vid'")->count();
        $this->assign("messnum",$mnum);
        //我的关注
        $mod=M("Friend");
        $mod2=D("Users");
        $res=$mod->where("uid='vid'")->limit(5)->select();
        //统计我关注的人数
        $myfrinum=$mod->where("uid='$vid'")->count();
        //统计关注我的人数
        $myfsnum=$mod->where("fid='$vid'")->count();
        foreach($res as &$v){
            $uu=$mod2->field('username,picture')->find($v['fid']);
            $v['username']=$uu['username'];
            $v['picture']=$uu['picture'];
        }
        $this->assign('myfri',$res);        //取四个我关注的人并赋值
        $this->assign('myfrinum',$myfrinum);//我关注的人总数
        $this->assign('myfsnum',$myfsnum);  //关注我的人总数
        //************************************************************************

        //查询用户个人中心的数据条数
        //查询用户上传视频数量
        $video = M("Video");
        $this->assign("videonum",$video->where("uid='$vid'")->count());
        //查询用户创建的手记以及数量
        $note = M("Note");
        $this->assign("note",$note->where("uid='$vid'")->limit(5)->select());
        $this->assign("notenum",$note->where("uid='$vid'")->count());
        //查询用户上传的文库资源数量
        $lib = M("Library");
        $this->assign("libnum",$lib->where("uid='$vid'")->count());
        //查询用户收藏的视频
        $vids = M("Collect")->where("uid='$vid'")->field("vid")->select();
        $collnum = M("Collect")->where("uid='$vid' and vid<>0")->field("vid")->count();
        $ids = array();
        foreach ($vids as $v) {
            $ids[] = $v['vid'];
        }
        $where['id'] = array("in",$ids);
        $collect = M("Video")->where($where)->limit(4)->select();
        $this->assign("collect",$collect);
        $this->assign("collnum",$collnum);
       
        
        $this->assign("number",$num);
		$this->assign("number1",$num1);
		
		
		//留言
		$mod=M("Usermessage");
		$mes=$mod->where("myid='$vid'")->limit(3)->order("addtime desc")->select();
		$mess=array_reverse($mes);
		$this->assign("umessage",$mess);
		$res1=$mod->where("myid='$vid' and vid='$vid'")->order('addtime desc')->limit(1)->select();
		$this->assign("mymes1",$res1);
		
		

        //是否关注
        $rr=M("Friend")->where("uid='{$_SESSION[C('USER_AUTH_KEY')]['id']}' and fid='{$vid}'")->find();
        if($rr){
            $_SESSION['otheruser']['like']='y';
        }else{
            $_SESSION['otheruser']['like']='n';
        }
		
	
	$this->display("otherphotos");
}








//照片多文件上传
public function uploadphoto(){
		//$upload=null;
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize= 31457288 ;// 设置附件上传大小
		$upload->allowExts= array('jpg','gif','png','jpeg');// 设置附件上传类型
		$upload->savePath="./Public/Uploads/users/{$_SESSION[C('USER_AUTH_KEY')]['username']}/{$_GET['pid']}/";// 设置附件上传目录			
	    if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
			}else{      // 上传成功 获取上传文件信息
			$uploadinfo =  $upload->getUploadFileInfo();
            //$this->assign("list",$info);
            }
			//die("1111");
			//把照片上传到数据库
		 for($i=0;$i<count($uploadinfo);$i++){
			$picsrc=$uploadinfo["$i"]['savename'];
			$path="./Public/Uploads/users/{$_SESSION[C('USER_AUTH_KEY')]['username']}/{$_GET['pid']}/";
			$this->updateImage1($picsrc,$path,"s_",100,80);
			$this->updateImage1($picsrc,$path,"m_",500,500);

		    $_POST['picname']=$uploadinfo[$i]['savename'];//原图片的名字
			$_POST['oldname']=$uploadinfo[$i]['name'];//缩略图的图片名
            $_POST['addtime']=time();		      //时间
		    $_POST['uid']=$_GET['uid'];           //用户的ID
		    $_POST['pid']=$_GET['pid'];           //相册的ID
			$_POST['desc']=$_GET['desc'];        //相册的desc
			$m = D("Userphotos");
		    $m->create();
			$m->add();

            }
         //die("{$_POST['uid']}");
		 //echo "<script>alert('添加成功');</script>";
            //$this->success("添加成功！",U("Users/photos?uid={$_POST['uid']}&pid={$_POST['pid']}&desc={$_POST['desc']}"));
			$this->redirect("Users/photos?uid={$_POST['uid']}&pid={$_POST['pid']}&desc={$_POST['desc']}");
	  }

public function updatecover(){
	$model=M("Users_photoalbum");
	$model->create();
	
	$model->save();
	die("ok");
}
//用户密码修改
//用户密码修改
public function updatepassword(){
		if($_SESSION[C('USER_AUTH_KEY')]['userpass']==md5($_POST['password'])){
			$model=D("Users");
			$date['userpass']=md5($_POST['new_password']);
			$date['id']=$_SESSION[C('USER_AUTH_KEY')]['id'];
			$model->create($date);
			$res = $model->save();
            if ($res != false) {
                $id=$_SESSION[C('USER_AUTH_KEY')]['id'];
				$aa=$model->find($id);
				$_SESSION[C('USER_AUTH_KEY')]=$aa;
                //$this->success("修改成功！",U("Users/settings"),3);
				$this->redirect("Users/settings");
            }else{
                $this->error("没有更新任何数据！");
            }
		}else{
			$this->error("原密码输入错误！");
		}
	}

	public function deluserphoto(){
		$id=$_POST['id'];
		$model=M("Userphotos");
		$model->where("id='{$id}'")->delete();
		die("ok");
	}
	
	public function delalbum(){
		$id=$_POST['id'];
		$username=$_POST['username'];
		$model=M("Users_photoalbum");
		
		$model->where("id='{$id}'")->delete();
		$this->dirDel("./Public/Uploads/users/{$username}/{$id}");
		die("ok");
	}
	public function dirDel($dir){
		//1. 打开目录
		$dd = opendir($dir);
		
		//2. 遍历目录并删除里面的文件
		while($f = readdir($dd)){
			//排除特殊目录
			if($f=="." || $f==".."){
				continue;
			}
			$ff = $dir."/".$f; //加上路径
			if(is_file($ff)){
				unlink($ff);
			}
			//判断是否是子目录，若是则做递归删除
			if(is_dir($ff)){
				dirDel($ff);
			}
		}	
		//3. 关闭目录
		closedir($dd);
		
		//4. 删除当前目录
		rmdir($dir);
	}
	
    public function otheredu(){
        if(!$_SESSION[C('USER_AUTH_KEY')]['username']){
			$this->display('Users/index');
		}
        $this->assign("title","E-Sch___个人中心");
		$m=M("Uservisit");
		$vid=$_GET['uid'];
		if($vid==$_SESSION[C('USER_AUTH_KEY')]['id']){
			$this->redirect("Users/myedu");
		}
		$m=M("Uservisit");
		$visd=$_SESSION[C('USER_AUTH_KEY')]['id'];
		$vit=$m->where("vid='$visd' and uid!='$visd'")->limit(4)->order("visittime desc")->select();
		$vit1=$m->where("uid='$visd' and vid!='$visd'")->limit(4)->order("visittime desc")->select();
		//dump($vit1);
		$num=count($vit);
        $num1=count($vit);
        $this->assign("number",$num);
		$this->assign("number1",$num1);
		$this->assign("visitor",$vit);
		$this->assign("visitor1",$vit1);
	

        //===================================贴吧======================================
        //帖子数统计
        $mnum=D('Message')->where("uid='$vid'")->count();
        $this->assign("messnum",$mnum);
        //我的关注
        $mod=M("Friend");
        $mod2=D("Users");
        $res10=$mod->where("uid='$vid'")->limit(5)->select();
        //统计我关注的人数
        $myfrinum=$mod->where("uid='$vid'")->count();
        //统计关注我的人数
        $myfsnum=$mod->where("fid='$vid'")->count();
        foreach($res10 as &$v){
            $uu=$mod2->field('username,picture')->find($v['fid']);
            $v['username']=$uu['username'];
            $v['picture']=$uu['picture'];
        }
        $this->assign('myfri',$res10);        //取四个我关注的人并赋值
        $this->assign('myfrinum',$myfrinum);//我关注的人总数
        $this->assign('myfsnum',$myfsnum);  //关注我的人总数
        //************************************************************************
	
        //查询用户个人中心的数据条数
        //查询用户上传视频数量
        $video = M("Video");
        $this->assign("videonum",$video->where("uid='$vid'")->count());
        //查询用户创建的手记以及数量
        $note = M("Note");
        $this->assign("note",$note->where("uid='$vid'")->limit(5)->select());
        $this->assign("notenum",$note->where("uid='$vid'")->count());
        //查询用户上传的文库资源数量
        $lib = M("Library");
        $this->assign("libnum",$lib->where("uid='$vid'")->count());
        //查询用户收藏的视频
        $vids = M("Collect")->where("uid='$vid'")->field("vid")->select();
        $collnum = M("Collect")->where("uid='$vid' and vid<>0")->field("vid")->count();
        $ids = array();
        foreach ($vids as $v) {
            $ids[] = $v['vid'];
        }
        $where['id'] = array("in",$ids);
        $collect = M("Video")->where($where)->limit(4)->select();
        $this->assign("collect",$collect);
        $this->assign("collnum",$collnum);
       
        
        $this->assign("number",$num);
		$this->assign("number1",$num1);
		
		
		
		$mod=M("Usermessage");
		$mes=$mod->where("myid='$vid' and vid!='$vid'")->limit(3)->order("addtime desc")->select();
		$mess=array_reverse($mes);
		$this->assign("umessage",$mess);
		$res1=$mod->where("myid='$vid' and vid='$vid'")->order('addtime desc')->limit(1)->select();
		$this->assign("mymes1",$res1);
		
		//浏览次数控制
		$id2=$_SESSION[C('USER_AUTH_KEY')]['id'];
		$model1=M("Uservisit");
		$res1=$model1->where("uid='$vid' and vid='$id2'")->find();
		$res7=$mod2->where("id='$vid'")->find();
		
				

		if($res1){
			$date['id']=$res1['id'];
			$date['number']=$res1['number']+1;
			$date['visittime']=time();
			$date['upicname']=$res7['picture'];
			$date['vpicname']=$_SESSION[C('USER_AUTH_KEY')]['picture'];
			$model1->save($date);
		}else{
			$date['uid']=$vid;
			$date['vid']=$_SESSION[C('USER_AUTH_KEY')]['id'];
			$date['visitor']=$_SESSION[C('USER_AUTH_KEY')]['username'];
			$date['visittime']=time();
			$date['uname']=$res7['username'];
			$date['upicname']=$res7['picture'];
			$date['vpicname']=$_SESSION[C('USER_AUTH_KEY')]['picture'];
			$model1->create($date);
			$model1->add();
		}

		$res6=$mod2->where("id='$vid'")->find();
		$_SESSION['otheruser']=$res6;
		

        //是否关注
        $rr=M("Friend")->where("uid='{$_SESSION[C('USER_AUTH_KEY')]['id']}' and fid='{$vid}'")->find();
        if($rr){
            $_SESSION['otheruser']['like']='y';
        }else{
            $_SESSION['otheruser']['like']='n';
        }

        $this->display('otheredu');
    }
	
	
	//查看其他人相册
	public function otheralbum(){
	$uid=$_GET['uid'];
	$album=D("Users_photoalbum");
	$res=$album->where("uid='{$uid}' and state='1'")->select();
	$count=count($res);
	if($res){
		$this->assign("countphoto",$count);
		$this->assign("list",$res);
	}else{
		$this->assign("countphoto",'0');
	}

	//otheredu导入
		$m=M("Uservisit");
		$vid=$_GET['uid'];
		$vit=$m->where("vid='$vid' and uid!='$vid'")->limit(4)->order("visittime desc")->select();
		$vit1=$m->where("uid='$vid' and vid!='$vid'")->limit(4)->order("visittime desc")->select();
		//dump($vit1);
		$num=count($vit);
		$num1=count($vit);
		$this->assign("visitor",$vit);
		$this->assign("visitor1",$vit1);

        //===================================贴吧======================================
        //帖子数统计
        $mnum=D('Message')->where("uid='$vid'")->count();
        $this->assign("messnum",$mnum);
        //我的关注
        $mod=M("Friend");
        $mod2=D("Users");
        $res=$mod->where("uid='vid'")->limit(5)->select();
        //统计我关注的人数
        $myfrinum=$mod->where("uid='$vid'")->count();
        //统计关注我的人数
        $myfsnum=$mod->where("fid='$vid'")->count();
        foreach($res as &$v){
            $uu=$mod2->field('username,picture')->find($v['fid']);
            $v['username']=$uu['username'];
            $v['picture']=$uu['picture'];
        }
        $this->assign('myfri',$res);        //取四个我关注的人并赋值
        $this->assign('myfrinum',$myfrinum);//我关注的人总数
        $this->assign('myfsnum',$myfsnum);  //关注我的人总数
        //************************************************************************

        //查询用户个人中心的数据条数
        //查询用户上传视频数量
        $video = M("Video");
        $this->assign("videonum",$video->where("uid='$vid'")->count());
        //查询用户创建的手记以及数量
        $note = M("Note");
        $this->assign("note",$note->where("uid='$vid'")->limit(5)->select());
        $this->assign("notenum",$note->where("uid='$vid'")->count());
        //查询用户上传的文库资源数量
        $lib = M("Library");
        $this->assign("libnum",$lib->where("uid='$vid'")->count());
        //查询用户收藏的视频
        $vids = M("Collect")->where("uid='$vid'")->field("vid")->select();
        $collnum = M("Collect")->where("uid='$vid' and vid<>0")->field("vid")->count();
        $ids = array();
        foreach ($vids as $v) {
            $ids[] = $v['vid'];
        }
        $where['id'] = array("in",$ids);
        $collect = M("Video")->where($where)->limit(4)->select();
        $this->assign("collect",$collect);
        $this->assign("collnum",$collnum);


        $this->assign("number",$num);
		$this->assign("number1",$num1);


		//留言
		$mod=M("Usermessage");
		$mes=$mod->where("myid='$vid' and vid!='$vid'")->limit(3)->order("addtime desc")->select();
		$mess=array_reverse($mes);
		$this->assign("umessage",$mess);
		$res1=$mod->where("myid='$vid' and vid='$vid'")->order('addtime desc')->limit(1)->select();
		$this->assign("mymes1",$res1);



        //是否关注
        $rr=M("Friend")->where("uid='{$_SESSION[C('USER_AUTH_KEY')]['id']}' and fid='{$vid}'")->find();
        if($rr){
            $_SESSION['otheruser']['like']='y';
        }else{
            $_SESSION['otheruser']['like']='n';
        }

	$this->display("otheralbum");
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//显示留言板
	public function mymessage(){
		$model=M("Usermessage");
		$id=$_SESSION[C('USER_AUTH_KEY')]['id'];
		$res=$model->where("myid='$id' and vid!='$id'")->order('addtime desc')->select();
		$this->assign("mymes",$res);
		$res1=$model->where("myid='$id' and vid='$id'")->order('addtime desc')->limit(1)->select();
		$this->assign("mymes1",$res1);
		$this->assign("title","个人中心___我的留言板");
		$this->display("mymessage");
	}
	public function myheart(){
		$model=M("Usermessage");
		$id=$_SESSION[C('USER_AUTH_KEY')]['id'];
		$res=$model->where("myid='$id' and vid='$id'")->order('addtime')->select();
		$this->assign("mymes",$res);
		$res1=$model->where("myid='$id' and vid='$id'")->order('addtime desc')->limit(1)->select();
		$this->assign("mymes1",$res1);
		$this->assign("title","个人中心___我的心情");
		
		$m=M("Uservisit");
		$vid=$_SESSION[C('USER_AUTH_KEY')]['id'];
		$vit=$m->where("vid='$vid' and uid!='$vid'")->limit(4)->order("visittime desc")->select();
		$vit1=$m->where("uid='$vid' and vid!='$vid'")->limit(4)->order("visittime desc")->select();
		//dump($vit1);
		$num=count($vit);
        $num1=count($vit);
        $this->assign("number",$num);
		$this->assign("number1",$num1);
		$this->assign("visitor",$vit);
		$this->assign("visitor1",$vit1);

        //===================================贴吧======================================
        //帖子数统计
        $mnum=D('Message')->where("uid='{$_SESSION[C('USER_AUTH_KEY')]['id']}'")->count();
        $this->assign("messnum",$mnum);
        //我的关注
        $mod=M("Friend");
        $mod2=M("Users");
        $res=$mod->where("uid='{$_SESSION[C('USER_AUTH_KEY')]['id']}'")->limit(5)->select();
        //统计我关注的人数
        $myfrinum=$mod->where("uid='{$_SESSION[C('USER_AUTH_KEY')]['id']}'")->count();
        //统计关注我的人数
        $myfsnum=$mod->where("fid='{$_SESSION[C('USER_AUTH_KEY')]['id']}'")->count();
        foreach($res as &$v){
            $uu=$mod2->field('username,picture')->find($v['fid']);
            $v['username']=$uu['username'];
            $v['picture']=$uu['picture'];
        }
		//dump($res);die();
        $this->assign('myfri',$res);        //取四个我关注的人并赋值
        $this->assign('myfrinum',$myfrinum);//我关注的人总数
        $this->assign('myfsnum',$myfsnum);  //关注我的人总数
        //************************************************************************

        //查询用户个人中心的数据条数
        //查询用户上传视频数量
        $video = M("Video");
        $this->assign("videonum",$video->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']} AND status=2")->count());
        //查询用户创建的手记以及数量
        $note = M("Note");
        $this->assign("note",$note->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->limit(5)->select());
        $this->assign("notenum",$note->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->count());
        //查询用户上传的文库资源数量
        $lib = M("Library");
        $this->assign("libnum",$lib->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']} AND status=2")->count());
        //查询用户收藏的视频
        $vids = M("Collect")->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->field("vid")->select();
        $collnum = M("Collect")->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']} and vid<>0")->field("vid")->count();
        $ids = array();
        foreach ($vids as $v) {
            $ids[] = $v['vid'];
        }
        $where['id'] = array("in",$ids);
        $collect = M("Video")->where($where)->limit(5)->select();
        $this->assign("collect",$collect);
        $this->assign("collnum",$collnum);

        //查询用户收藏的手记
        $nids = M("Collect")->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->field("nid")->select();
        $notenum = M("Collect")->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']} and nid<>0")->field("nid")->count();
        $noteids = array();
        foreach ($nids as $n) {
            $noteids[] = $n['nid'];
        }
        $map['id'] = array("in",$noteids);
        $notecoll = M("Note")->where($map)->limit(5)->select();
        $this->assign("notecoll",$notecoll);
        $this->assign("notecollnum",$notenum);
        
        //查询用户收藏的文库资源
        $lids = M("Collect")->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']}")->field("lid")->select();
        $libnum = M("Collect")->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']} and lid<>0")->field("lid")->count();
        $libids = array();
        foreach ($lids as $l) {
            $libids[] = $l['lid'];
        }
        $libmap['id'] = array("in",$libids);
        $libcoll = M("Library")->where($libmap)->limit(5)->select();
        $this->assign("libcoll",$libcoll);
        $this->assign("libcollnum",$libnum);

        
		
		
		
		$this->display("myheart");
	}
	
	public function updateset(){
		//dump($_POST);die();
        $model = D("Users");
        if ($vo = $model->create()) {
            $res = $model->save();
            if ($res != false) {
				$id=$_SESSION[C('USER_AUTH_KEY')]['id'];
				$aa=$model->find($id);
				$_SESSION[C('USER_AUTH_KEY')]=$aa;
                //$this->success("修改成功！",U("Users/settings"),3);
				$this->redirect("Users/settings");
            }else{
                $this->error("没有更新任何数据！");
            }
        }else{
            $this->error($model->getError());
        }
    }

    //定义显示查询用户提醒模块的方法
    public function remind(){
        
        
        $this->display();
    }
	
	
	public function stranger(){
        $m=D("Users");
		$res1=$m->field('id')->select();
		$r=array();
		foreach($res1 as $v){
			$r[]=$v['id'];
		}
		shuffle($r);
		$res=array();
		$num=count($r);
		for($i=0;$i<27;$i++){
			$res[]=$m->field("id,username,picture")->where("id = {$r[$i]}")->select();
		}
		
		$this->assign("list",$res);
		$this->display("stranger");
    }
	
	public function checkname(){
		$name=$_POST['name'];
		$m=D("Users");
		$res=$m->where("username = '$name' or email='$name'")->find();
		if($res){
			die("ok");
		}
	}
	
	public function checkpass(){
	//dump($_POST);
		$name=$_POST['name'];
		$pass=md5($_POST['pass']);
		$m=D("Users");
		$res=$m->where("username = '$name' or email='$name'")->find();
		if($res['userpass']==$pass){
			die("ok");
		}
	}
	
	
	public function editcheckpass(){
	//dump($_POST);
		$username=$_SESSION[C('USER_AUTH_KEY')]['username'];
		$pass=md5($_POST['pass']);
		$m=D("Users");
		$res=$m->where("username = '$username'")->find();
		if($res['userpass']==$pass){
			die("ok");
		}
	}
	
	
	
	
	
	
	
	

}
