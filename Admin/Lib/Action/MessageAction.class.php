<?php
//帖子信息控制Action类
class MessageAction extends CommonAction{
    
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
        if (!empty($_REQUEST['title'])) {
            $map['title'] = array("like","%{$_REQUEST['title']}%");
        }
        if (!empty($_REQUEST['pid'])) {
            $map['keyword'] = array(array('like',"{$_REQUEST['pid']}"),array('like',"%,{$_REQUEST['pid']}"),array('like',"{$_REQUEST['pid']},%"),array('like',"%,{$_REQUEST['pid']},%"),'or');
        }
        if (!empty($_REQUEST['isbest'])) {
            $map['isbest'] = array("eq",'1');
        }
        if (!empty($_REQUEST['ishot'])) {
            $map['ishot'] = array("eq",'1');
        }
        if (!empty($_REQUEST['status'])) {
            $map['status'] = array("eq",$_REQUEST['status']);
        }
    }
    //自定义魔术方法，对当前模块中查询出的数据，做其他关联数据的追加
    public function _tigger_list(&$list){
        foreach($list as &$v){
            //获取users表的操作对象
            $ob=M("Users")->field('username')->find($v['uid']);
            $v['username']=$ob['username'];
            //获取每个帖子评论数
            $ob2=D('Comm')->where("mid={$v['id']}")->count();
            $v['plnum']=$ob2;
            //获取标签名
            $arr=explode(',',$v['keyword']);
            $str='';
            foreach($arr as $ll){
                $ob3=M("Cat")->find($ll);
                $str.=$ob3['name'].',';
            }
            $v['key']=rtrim($str,',');
        }
    }
    //定义一个处理编辑器的上传内容
	public function doupload(){
		$res = array("err"=>"","msg"=>"");//定义一个响应信息
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->savePath = './Public/Uploads/editor/'.date('Ym',time()).'/';// 设置附件上传目录
		//执行上传
		if($upload->upload()){ 
			$info =  $upload->getUploadFileInfo();
			$res["msg"]=__ROOT__."/Public/Uploads/editor/".date('Ym',time()).'/'.$info[0]['savename'];  //上传成功！
		}else{
			$res['err']=$upload->getErrorMsg(); //失败
		}
		echo json_encode($res);
	}
}
