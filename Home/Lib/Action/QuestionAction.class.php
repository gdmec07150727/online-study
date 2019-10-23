<?php
class QuestionAction extends Action {
    public function index(){
        $this->assign("title","提问管理");
        $mod=D("Question");
        
        import("ORG.Util.Page");    //导入分页类
        //$count=$mod->where($where)->count();       //获取总数据条数
        $count=$mod->count();
        $page=new Page($count,10);  //创建分页对象

        $list1=($mod->where($where)->order('addtime desc')->limit($page->firstRow.','.$page->listRows)->select());
        $list2=($mod->where('isbest=1')->order('addtime desc')->limit(5)->select());
        foreach($list1 as &$vo){
            $model=M('Users');
            $name1=$model->field('username,name')->where("id={$vo['uid']}")->find();
            if($name1['name']!=''){
                $vo['username']=$name1['name'];
            }else{
                $vo['username']=$name1['username'];
            }
        }
        foreach($list2 as &$vo){
            $model2=M('Users');
            $name21=$model->field('username,name')->where("id={$vo['uid']}")->find();
            if($name21['name']!=''){
                $vo['username']=$name21['name'];
            }else{
                $vo['username']=$name21['username'];
            }
        }
        $this->assign('list1',$list1);
        $this->assign('list2',$list2);
        $this->assign("pageinfo",$page->show());
        $this->assign("where",$_GET);
        $this->keyword();       //调用keyword方法，显示所有非一级分类
        //调用person方法
        R("Message/person");
        //===============================================  
        if($_SESSION[C('USER_AUTH_KEY')]){
            //调用贴吧中的查询hfnum()方法
            R("Message/hfnum");
        }
        $this->display("index");
    }
    public function index2(){
        $mod=D("Question");
        //搜索条件
        if($_REQUEST['pid']){
            $where['keyword']=array(array('like',"{$_REQUEST['pid']}"),array('like',"%,{$_REQUEST['pid']}"),array('like',"{$_REQUEST['pid']},%"),array('like',"%,{$_REQUEST['pid']},%"),'or');
        }
        $where['status']=array('eq','1');

        import("ORG.Util.Page");    //导入分页类
        $count=$mod->where($where)->count();
        $page=new Page($count,15);  //创建分页对象

        $list1=($mod->where($where)->order('addtime desc')->limit($page->firstRow.','.$page->listRows)->select());
        foreach($list1 as &$vo){
            $model=M('Users');
            $name1=$model->field('username,name')->where("id={$vo['uid']}")->find();
            if($name1['name']!=''){
                $vo['username']=$name1['name'];
            }else{
                $vo['username']=$name1['username'];
            }
        }
        //返回标签名
        $kw=M("Cat")->find($_GET['pid']);
        $this->assign('kname',$kw);
        $this->assign('list1',$list1);
        $this->assign("pageinfo",$page->show());
        $this->assign("where",$_GET);
        $this->keyword();       //调用keyword方法，显示所有非一级分类
        //调用person方法
        R("Message/person");
        $this->display("index2");
    }
    //收藏
    public function like(){
        if(!$_SESSION[C('USER_AUTH_KEY')]['id']){
            if($_GET['id']){
                $this->redirect('Users/login');
            }else{
                echo false;
            }
            die;
        }
        $mod=M("Like");
        $mod->uid=$_SESSION[C('USER_AUTH_KEY')]['id'];
        $mod->qid=$_POST['qid'];
        if($_POST['vv']=='n'){
            if($result=$mod->add() ){
                echo json_encode($result);
            }else{
                $this->error("收藏失败");
            }
        }else{
            if($result=$mod->where("uid={$_SESSION[C('USER_AUTH_KEY')]['id']} and qid={$_POST['qid']}")->delete() ){
                echo json_encode($result);
            }else{
                $this->error("收藏失败");
            }
        }
    } 
    public function add(){
        if(!$_SESSION[C('USER_AUTH_KEY')]['id']){
            $this->redirect('Users/login');
            die;
        }
        //查询角色为teacher的所有用户
        $r1=M('Roles')->where('roletype="teacher"')->find();    //查询teacher的id
        $r2=M('Userrole')->where("rid='{$r1['id']}'")->select();//查询角色为teacher的所有用户id
        foreach($r2 as $v){
            $r3=M('Users')->find($v['uid']);
            if(empty($r3['name'])){
                $arr[$r3['id']]=$r3['username'];
            }else{
                $arr[$r3['id']]=$r3['name'];
            }
        }
        //拼装所有结果并返回到模板
        $this->assign('cust',$arr);
        //调用person方法
        R("Message/person");
        $this->keyword();
        $this->display("add");
    }
    public function insert(){
        $mod=D("Question");
        //自动验证判断
        if(!$mod->create()){
            $this->error($mod->getError()); //输出验证错误信息
        }
        if($_SESSION[C('USER_AUTH_KEY')]['id']){
            $mod->uid=$_SESSION[C('USER_AUTH_KEY')]['id'];
        }else{
            $this->redirect('Users/login');
            die;
        }
        $mod->keyword=trim($_POST['keyword'],',');
        $mod->addtime=time();               //添加时间
        if($result=$mod->add()){
            // 回调接口
			if (method_exists($this, '_tigger_insert')) {
				$mod->id = $result;
				$this->_tigger_insert($mod);
			}
            $this->redirect("Question/index");

        }else{
            $this->error("添加失败");
        }
        //echo $mod->getLastSql();
    }
    //信息添加的回调方法，目的处理上传图片信息
	public function _tigger_insert($mod){
		$qid = $mod->id; //获取添加成功的文章id号
		$mod2=M("Picture");
		//遍历所有上传图片
		foreach($_SESSION['article_img'] as $im){
			//使用正则来判断图片是否还存在于文章中
			if(preg_match("/{$im['picname']}/",$_POST['content'])){
				$mod2->where("id=".$im['id'])->save(array("qid"=>$qid));
			}else{
				$mod2->delete($im['id']); //删除数据
				//删除图片
				unlink('./Public/Uploads/article/'.date("Ym",$im['create_time'])."/".$im['picname']);
			}
        }
        $_SESSION['article_img']=array();//清空session中的图片数据
	}

    //定义edit方法编译edit模板修改问题
    public function edit(){
        if($_SESSION[C('USER_AUTH_KEY')]['id']!=$_GET['uid']){
            $this->error('没有权限！');
            die;
        }
        //调用person方法
        R("Message/person");
        $this->assign("title","提问管理");
        $mod=D("Question");
        $list=$mod->find($_GET['id']);
            
        $rr=explode(',',$list['keyword']);
        $c2=D('Cat');
        foreach($rr as $vo){
            $r2=$c2->find($vo);
            $list['cname'].=$r2['name'].',';
        }
        //查询角色为teacher的所有用户
        $r1=M('Roles')->where('roletype="teacher"')->find();    //查询teacher的id
        $r2=M('Userrole')->where("rid='{$r1['id']}'")->select();//查询角色为teacher的所有用户id
        foreach($r2 as $v){
            $r3=M('Users')->find($v['uid']);
            if(empty($r3['name'])){
                $arr[$r3['id']]=$r3['username'];
            }else{
                $arr[$r3['id']]=$r3['name'];
            }
        }
        //拼装所有结果并返回到模板
        $this->assign('cust',$arr);
        $this->assign('select',$list['tid']);       //默认选中项
        $this->assign("list",$list);
        $this->keyword();
        $this->display("edit");
    }
    //执行修改问题的方法
    public function update(){
        $mod=D("Question");
        $mod->create();
        $mod->keyword=trim($_POST['keyword'],',');
        if($mod->save()){
            $this->redirect("Question/show?id={$_POST['id']}");
        }else{
            $this->error("修改失败");
        }
        //echo $mod->getLastSql();
    }
    //执行问题的删除方法
    public function delete(){
        $mod=D("Question");
        $res=$mod->where("id='{$_GET['id']}'")->find();
        //检索用户id
        if($_SESSION[C('USER_AUTH_KEY')]['id']!=$res['uid']){
            $this->error('没有权限！');
            die;
        }
        if($mod->delete($_GET['id'])){
            //删除该问题被收藏中的数据
            M("Like")->where("qid='{$_GET['id']}'")->delete();
            $this->success("删除成功",$_SERVER['HTTP_REFERER']);
        }else{
            $this->error("删除失败");
        }
    }
    public function show(){
        $mod=D("Question");
        //标记该问题为已读
        if($_GET['r']){
            $mod->where("id='{$_GET['id']}'")->data("remind=0")->save();
        }
        $aa=$mod->find($_GET['id']);
        $data['scan']=$aa['scan']+1;
        $mod->where("id={$_GET['id']}")->save($data);

        $list=($mod->find($_GET['id']));
        $model=M('Users');
        $name1=$model->field('username,name')->where("id={$list['uid']}")->find();
        $name2=$model->field('username,name')->where("id={$list['tid']}")->find();
            if($name1['name']!=''){
                $list['username']=$name1['name'];
            }else{
                $list['username']=$name1['username'];
            }
            if($name2['name']!=''){
                $list['tname']=$name2['name'];
            }else{
                $list['tname']=$name2['username'];
            }
        $rr=explode(',',$list['keyword']);
        $c2=D('Cat');
        foreach($rr as $vo){
            $r2=$c2->find($vo);
            $ll.=$r2['name'].',';
        }
        $res=M('Like')->where("qid={$list['id']} and uid='{$_SESSION[C('USER_AUTH_KEY')]['id']}'")->select();
        if(!empty($res)){
            $list['like']='y';
        }else{
            $list['like']='n';
        }
        $list['cname']=rtrim($ll,',');
        $this->assign('list',$list);
        $this->keyword();       //调用keyword方法，显示所有非一级分类
        //调用person方法
        R("Message/person");
        //===============================================  
        if($_SESSION[C('USER_AUTH_KEY')]){
            //调用贴吧中的查询hfnum()方法
            R("Message/hfnum");
        }
        $this->display('show');
    }
    //定义一个处理编辑器的上传内容
	public function doupload(){
		$res = array("err"=>"","msg"=>"");//定义一个响应信息
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath = './Public/Uploads/editor/'.date('Ym',time()).'/';// 设置附件上传目录
		//执行上传
		if($upload->upload()){ 
			$info =  $upload->getUploadFileInfo();
            $res["msg"]=__ROOT__."/Public/Uploads/editor/".date('Ym',time()).'/'.$info[0]['savename'];  //上传成功！
            //添加图片信息
			$mod = M("Picture");
			$data['tbname']='article';
			$data['tid']=0;
			$data['picname']=$info[0]['savename'];
			$data['create_time']=$time;
			$data['id']=$mod->add($data);
			//将上传成功的图片信息存放到session数组中
            $_SESSION['article_img'][]=$data;

		}else{
			$res['err']=$upload->getErrorMsg(); //失败
        }
		echo json_encode($res);
    }
    //随机查询六个标签
    public function keyword(){
        $cc=D('Cat');
        $res=$cc->field('id,name')->where('pid!=0')->select();
        $this->assign('kw',$res);
        shuffle($res);
        for($i=0;$i<6;$i++){
            $rr[]=$res[$i];
        }
        $this->assign('cat',$rr);
    }
}
