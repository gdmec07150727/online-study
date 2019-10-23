<?php
class LimitAction extends CommonAction{
public function _filter(&$map){
        //判断是否有搜索条件
		
		if (!empty($_REQUEST['username'])) {//视频名搜索
            $map['username'] = array("like","%{$_REQUEST['username']}%");
        }
    }

    public function index(){
		$map = $this->_search();
		if(method_exists($this, '_filter')) {
			$this->_filter($map);
		}
		//判断采用自定义的Model类
		
		$model=D("Users");
		
		$model2=M("Userrole");
        $model3=M("Roles");
		$res1=$model->select();
		//dump($res1);
		$res1=$this->assign('list',$res1);
		
		$res2=$model2->select();
		$this->assign("userrole",$res2);
		//dump($res2);
		$res3=$model3->select();
		$this->assign("role",$res3);
		if (!empty($model)) {
			$this->_list($model, $map);
        }
		$this->display(index);return;
	}
	
	public function edit(){
		$model1=D("Users");
		$uid=$_GET['id'];
		//dump($uid);die();
		$model2=M("Userrole");		
		$model3=M("Roles");
        $model4=M("Rolelimit");
        $model5=M("Userlimit");
		$res1=$model2->where("uid='{$uid}'")->select();
		//dump($res1);die();
		$username=$model1->find($uid);
		$res2=$model3->select();
		$this->assign("role",$res2);
		$this->assign("userrole",$res1);
		$this->assign("uid",$uid);
		$this->assign("uname",$username['username']);
		$this->display(edit);
	}
    

     public function update(){
        //获取被操作的角色信息
		//dump($_POST);die();
		$uid=$_POST['id'];
		$rid = $_POST['rid'];
		//删除当前角色的所有节点信息
		$model2=M("Userrole");		
		$model2->where("uid={$uid}")->delete();
		
		
		foreach($rid as $v){
			$rid=$v;
			$data['rid']=$v;
			$data['uid']=$uid;
			$model2->add($data);
		}
			$this->success("修改成功！");
        }

		
		
		
		
		
}
    

