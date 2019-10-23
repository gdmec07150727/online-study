<?php
	session_start();
	class UsermessageAction extends Action{
		public function addusermessage(){
			//dump($_POST);die('dddd');
			$id=$_POST['myid'];
			$mod=D("Users");
			$res=$mod->where("id='$id'")->find();
			$date['vid']=$_POST['vid'];
			$date['myid']=$_POST['myid'];
			$date['content']=strip_tags($_POST['message']);
			$date['myname']=$res['username'];
			$date['visitor']=$_POST['visitor'];
			$date['upic']=$_SESSION[C('USER_AUTH_KEY')]['picture'];
			$date['addtime']=time();
			$m=M("Usermessage");
			$m->create($date);
			$m->add();
			//echo $m->getLastSql();
			die("ok");
		}
		
	}
?>