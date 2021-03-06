<?php

//自定义文档资源模块Action

class JiafenAction extends CommonAction{

    //定义封装搜索条件的方法
    public function index()
    {
        $classid = M("jiafen")->field("class_id")->select();
        $jiafen = M("jiafen")->select();
        $cids = array();
        foreach ($classid as $v) {
            $cids[] = $v['class_id'];
        }
        $where['id'] = array("in",$cids);
        //$class = M("Classes")->where($where)->select();
        $classes = M("Classes")->where($where)->limit(1)->select();
        $this->assign("jiafen",$jiafen);
        $this->assign("classes",$classes);
        $this->display();
    }

    public function _filter(&$map){
        //判断是否存在搜索条件
        //执行资源名的搜索
        if (!empty($_REQUEST['title'])) {
            $map['title'] = array("like","%{$_REQUEST['title']}%");
        }
        //执行上传用户的搜索
        if (!empty($_REQUEST['username'])) {
            $list = M("Users")->field("id")->where(array("username"=>array("like","%{$_REQUEST['username']}%")))->select();
            $uid = array();
            foreach ($list as $vo) {
                $uid[] = $vo['id'];
            }
            if (count($uid)>0) {
                $map['uid'] = array("in",$uid);
            }
        }
        //=====================================================================
        //执行资源类型的搜索
        if (!empty($_REQUEST['pid'])) {
            //搜索类型表中pid等于$_REQUEST['pid']的和本身id等于$_REQUEST['pid']的所有类别的id
            //封装搜索条件 where pid=$_REQUEST['pid'] OR id=$_REQUEST['pid']
            $where['pid'] = array("eq",$_REQUEST['pid']);
            $where['id'] = array("eq",$_REQUEST['pid']);
            $where['_logic'] = 'OR';
            //执行查询
            $type = M("Cat")->field("id")->where($where)->select();
            $tid = array();
            foreach ($type as $vo) {
                $tid[] = $vo['id'];
            }
            if (count($tid)>0) {
                $map['tid'] = array("in",$tid);
            }
        }
        //=====================================================================

    }

    //自定义魔术方法 对当前模块中查询出的数据 做其他关联数据的追加
    public function _tigger_list(&$list){
        //实例化表对象
        $model = M("Users");
        $type = M("Cat");
        //dump($list);exit;
        //遍历查询出数据
        foreach ($list as &$v) {
            $ob = $model->field('username')->find($v['uid']);//根据当前资源表中的用户id查询对应的用户信息
            $v['username'] = $ob['username'];

            //===============================================
            //执行资源类型名的追加
            $ty = $type->field("name")->find($v['tid']);
            $v['typename'] = $ty['name'];
            //===============================================
        }
    }

    /*
    //重载父类中的数据添加的方法
    public function insert(){

        //执行资源文档的上传
        //导入文件上传类
        import("ORG.Net.UploadFile");
        $upload = new UploadFile();
        $upload->maxSize = "1000000000";//设置附件上传大小
        $upload->allowExts = "";//设置附件上传类型
        $upload->savePath = "./Public/Uploads/library/";//设置上传目录
        if (!$upload->upload()) {
            $this->error($upload->getErrorMsg());
        }else{
            $info = $upload->getUploadFileInfo();
        }

        //实例化表对象
        $model = D("Library");

        if (false === $model->create()) {
			$this->error($model->getError());
		}
        $model->uid = $_SESSION[C("USER_AUTH_KEY")]['id'];//取得上传者的id
        $model->type = $_FILES['lib']['type'];
        $model->size = $_FILES['lib']['size'];

        $model->name = $info[0]['savename'];//取得上传完成保存的文件名
        if($model->add()){
            //echo $model->getLastSql();exit;
            $this->success(L("新增成功"));
        }else{
            $this->error(L("新增失败！").$model->getLastSql());
        }
    }
    */

    //重载父类的删除方法
    public function add(){
        $classid = $_GET['id'];
        $this->assign("classid",$classid);
        $this->display();
    }


}
