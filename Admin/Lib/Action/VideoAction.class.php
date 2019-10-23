<?php

//自定义视频模块Action类

class VideoAction extends CommonAction{

    //定义封装搜索条件的方法
    public function _filter(&$map){
        
        //可以通过判断在不同表中的模糊搜索显示搜索的结果
        //
        //判断是否存在搜索条件
        if (!empty($_REQUEST['videoname'])) {//视频名搜索
            $map['videoname'] = array("like","%{$_REQUEST['videoname']}%");
        }

        if (!empty($_REQUEST['username'])) {//用户名搜索
            $list1 = M("Users")->field("id")->where(array("username"=>array("like","%{$_REQUEST['username']}%")))->select(); 
            $uid = array();
            foreach ($list1 as $v1) {
                $uid[] = $v1['id'];
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

    //自定义魔术方法 对当前模块中查询出的数据做其他数据的追加
    public function _tigger_list(&$list){
        //自定义需要的数据表对象
        $mod = M("Users");
        $type = M("Cat");//类别表
        
        //遍历之前查询出的数据
        foreach ($list as &$v) {
            $ob = $mod->field("username")->find($v['uid']);
            $v['username'] = $ob['username']; 
            
            //===============================================
            //执行资源类型名的追加
            $ty = $type->field("name")->find($v['tid']);
            $v['typename'] = $ty['name'];
            //===============================================        
        }
    }
    
    
    //重载父类中的insert方法
    public function insert(){
        //包含进上传图片的类
        import("ORG.Net.UploadFile");
        $upload = new UploadFile();
        $upload->maxSize = "1000000000";//设置附件上传大小
        $upload->allowExts = array("jpg","gif","png","jpeg");//设置附件上传类型
        $upload->savePath = "./Public/Uploads/videopic/";//设置上传目录
        if (!$upload->upload()) {
            $this->error($upload->getErrorMsg());
        }else{
            $info = $upload->getUploadFileInfo();
        }
        //实例化表对象
        $model = M("Video");
        $model->create();
        //添加表单中没有的视频信息
        
        $model->picname = $info[0]['savename'];
        if($model->add()){
            $this->success(L("新增成功"));
        }else{
            $this->error(L("新增失败").$model->getLastSql());
        }
    } 

    //重载父类的删除方法
    public function delete() {

        //实例化对象
        $model = M("Video");
        $list = $model->field("name,picname")->find($_GET['id']);//查询该条数据的服务器资源名

        //执行数据库信息的删除
        if ($model->delete($_GET['id'])) {
            //删除服务器上无用的资源
            unlink("./Public/Uploads/video/{$list['name']}");
            unlink("./Public/Uploads/videopic/{$list['picname']}");//删除视频的截图

            //删除评论表中相关的评论信息
            $mod = M("Videocom");
            $mod->where("vid={$_GET['id']}")->delete();

            $this->success(L("删除成功"));
        }else{
            $this->error(L("删除失败").$model->getLastSql());
        }
         
    }
}
