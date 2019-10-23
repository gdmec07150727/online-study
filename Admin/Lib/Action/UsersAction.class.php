<?php
class UsersAction extends CommonAction{
    //添加搜索方法
	public function _filter(&$map){
        //判断是否有搜索条件
        if(!empty($_REQUEST['username'])){
            $list=M("Users")->field('id')->where(array('username'=>array('like',"%{$_REQUEST['username']}%")))->select();
            //echo $mod->getLastSql();
            $uid=array();
            foreach($list as $vo){
                $uid[]=$vo['id'];
            }
            if(count($uid)>0){
                $map['uid']=array('in',$uid);
            }
        }
       
    }
	
	
    //显示添加用户的页面
    public function adduser(){
        $this->assign("tid",$_GET['tid']);
        $this->display();
    }
    //执行用户的添加
    //重写父类中的方法
    public function insert(){
       // dump($_POST);
        //die();

        import("ORG.Net.UploadFile");//导入文件上传类 执行文件上传
        $upload=new UploadFile();
        $upload->maxSize=3145728;
        $upload->allowExts=array('jpg','gif','png','jpeg');
        $upload->savePath="./Public/Uploads/users/{$_POST['username']}/";
        if(!$upload->upload()){
            $this->error($upload->getErrorMsg());
        }else{
            $info=$upload->getUploadFileInfo();

        }
        //实例化表对象
        $model=D("Users"); 
        if(false === $model->create()){
            unlink("./Public/Uploads/users/{$_POST['username']}/{$info[0]['savename']}");
            
            $this->error($model->getError());
        }
        $model->picture=$info[0]['savename'];
        $id = $model->add();
        
        
        //判断数据是否添加成功
        if($id){
            $this->success(L("添加成功"));
        }else{
            unlink("./Public/Uploads/users/{$_POST['username']}/{$info[0]['savename']}");
            
            $this->error(L("添加失败"));
        }

    }
    public function detail(){
        $model=D("Users");

        $where['id'] = array("eq",$_GET['id']);
        $list = $model->where($where)->select();
        $this->assign("list",$list);
        $this->display();
    }

    

     public function update(){
        //实例化表对象
        $model=D("Users");
		$id=$_POST['id'];
		
        if(false === $model->create()){
            $this->error($model->getError());
        }
		$r=$model->where("id='$id'")->select();
		$model->picture=$r[0]['picture'];
        //判断数据是否修改成功
        if($model->save()){
            
            $this->success(L("修改成功"));

        }else{

            $this->error("修改失败".$model->getLastSql());
        }

    }
    
    
    public function delete() {
		//删除指定记录
		$model = D($this->getActionName());
		if (!empty($model)) {
			$pk = $model->getPk();
            $id = $_REQUEST[$pk];
            $where['id']=$id;
            $list=$model->where($where)->select();
			if (isset($id)) {
				$condition = array($pk => array('in', explode(',', $id)));
                if (false !== $model->where($condition)->delete()) {
                    if($list[0]['picture']!='1.jpg'){
                        unlink("./Public/Uploads/users/{$_POST['username']}/{$list[0]['picture']}");
                    }
					//删除用户和角色关系表
					$model1=M("userrole");
					$model1->where("uid='$id'")->delete();
                    $this->success(L("删除成功"));
					//删除用户上传头像和个人相册
					unlink("./Public/Uploads/users/{$_POST['username']}");
				} else {
					$this->error(L('删除失败'));
				}
			} else {
				$this->error('非法操作');
			}
		}
	}
	
    
}
