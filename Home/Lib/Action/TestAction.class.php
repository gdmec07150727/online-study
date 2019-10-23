<?php
class TestAction extends Action{
    //自定义显示试题列表页的方法
    public function index(){
        //实例化试题库对象
        $model = M("Test");
        //用于显示在左侧的试题列表
        $this->assign("test",$model->select());
        //导入分页类
        import("ORG.Util.Page");
        //封装试题类型条件
        if (!empty($_GET['pid'])) {
            $type['id'] = array("eq",$_GET['pid']);
            $type['pid'] = array("eq",$_GET['pid']);
            $type['_logic'] = "OR";
            //查询出类型表中符合条件的所有类型的id
            $ty = M("Cat")->field("id")->where($type)->select();
            $tid = array();//存放符合条件的类型的id
            foreach ($ty as $t) {
                $tid[] = $t['id'];
            }
            if (count($tid)>0) {
                //把符合条件的所有id存进搜索条件中
                $where['tid'] = array("in",$tid);
            }
            //查询下当前类别名
            $typename = M("Cat")->field("name")->find($_GET['pid']);
            $this->assign("title",$typename["name"]);
        }
        //===============
        $count=$model->where($where)->count();//获取总数据条数
        $page=new Page($count,10);//创建分页对象
        $result = $model->where($where)->limit($page->firstRow.",".$page->listRows)->select();
        $this->assign("list",$result);
        $this->assign("showPage",$page->show());

        //执行资源分类查询
        $type = M("Cat")->where("pid=0")->limit(6)->select();
        $this->assign("typelist",$type);
              
        //查询最新试题榜
        $newlist = $model->order("addtime desc")->limit("10")->select();
        $this->assign("newlist",$newlist);
        $this->display("index");
       
    }
    //自定义显示试题详情的方法
    public function detail(){
        $mod = M("Test");
        $data = $mod->find($_GET['id']);

        //=======
        $this->assign("tid",$data['id']);
        $this->assign("title",$data['title']);

        //实例化试题详情对象
        $model = M("Quest");
        //拼装查询语句 让试题详情表中的tid等于试题表中的id
        $where['tid'] = array("eq",$_GET['id']);
        //执行查询
        $list = $model->where($where)->select();
        //将查询结果赋值给模板
        $this->assign("list",$list);

        $this->display();
    }

    //自定义计算考试试卷分数的方法
    public function score(){
        $mod=M("Quest");       
        $model=M("Score");
        foreach($_POST['test'] as $k=>$vo){
            $list= $mod->field("answer")->find("$k");
            if($list['answer']==$vo){
                $i++;
            }
        }
        $s=count($_POST['test']);
        $score=$i/$s*100;
        
        $_POST['time']=time();
        $_POST['score']=$score;
        $model->create();
        $model->add();
        $tid = $_POST['tid'];//获取所答试卷的id
        $this->assign("tid",$tid);
        $this->assign("score",$score);
        $this->display();
       
    }

    //定义显示试题正确答案的方法
    public function answer(){
        $model = M("Quest");
        $list = $model->where("tid={$_GET['tid']}")->select();
        $this->assign("list",$list);
        $this->display();
    }

    //定义查看分数的方法
    public function myscore(){
        $uid=$_SESSION[C("USER_AUTH_KEY")]['id'];
        $model=M("Score");
         //导入分页类
        import("ORG.Util.Page");
        $count=$model->where("uid={$uid}")->count();//获取总数据条数
        $page=new Page($count,10);//创建分页对象
        
        $list=$model->where("uid={$uid}")->limit($page->firstRow.",".$page->listRows)->select();
        foreach($list as &$v){
            $ob=M("Test")->find($v['tid']);
            $v['title']=$ob['title'];
        }
        $this->assign("list",$list);
        $this->assign("showPage",$page->show());        
        $this->display();
    }
}
