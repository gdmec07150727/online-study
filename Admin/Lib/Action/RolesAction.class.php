<?php
//角色信息管理Action

class RolesAction extends CommonAction{


	//浏览当前角色的节点信息
	public function nodelist(){
		//1. 获取当前角色信息
		$rid = $_GET['rid'];
		$role = M("Roles")->find($rid); 
		$this->assign("role",$role);
		
		//2. 获取所有节点信息
		$list = M("Node")->select();
		$this->assign("list",$list);
		
		//3. 获取当前角色的节点信息
		$nodelist = M("Role_node")->where("rid={$rid}")->select();
		//对获取的结果进行处理
		$mynode=array();
		foreach($nodelist as $v){
			$mynode[]=$v['nid'];
		}
		$this->assign("mynode",$mynode);
		
		$this->display("nodelist");
	}
	
	//执行角色信息的保存
	public function savenode(){
		//获取被操作的角色信息
		$rid = $_POST['rid'];
		//删除当前角色的所有节点信息
		$m = M("Role_node");
		$m->where("rid={$rid}")->delete();
		
		//将当前选择的节点信息添加上去
		if(!empty($_POST['nid'])){
			foreach($_POST['nid'] as $nid){
				$data['rid']=$rid;
				$data['nid']=$nid;
				$m->add($data);
			}
		}
		$this->success("修改成功！");
	}
}