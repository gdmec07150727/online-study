<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    public function index(){
        $model = M("Users");
        $id = $_SESSION[C('USER_AUTH_KEY')]['id'];
        $list = $model->find($id);
        $this->assign("addtime",$list['addtime']);//将用户的注册时间赋值模板中
        $this->assign("loginnum",$list['loginnum']);//登录次数
        $this->assign("logintime",$list['logintime']);//上次登录时间
        //计算用户的身份过期时间
        $cha = $_SESSION[C('USER_AUTH_KEY')]['logintime'] - $list['logouttime'];//计算两次时间戳的差值
        $day = floor($cha/3600/24);//天数
        $tmp = $cha - $day*3600*24;
        $hour = floor($tmp/3600);//小时
        $tmp = $tmp - $hour*3600;
        $min = floor($tmp/60);//分数
        $tmp = $tmp - $min*60;
        $sec = $tmp;//秒数
        $timecha = $day."天".$hour."时".$min."分".$sec."秒";
        $this->assign("timecha",$timecha);//身份过期时间
        //计算网站的新增会员数
        //查询在管理员本次登录的时间减去上次登出时的时间段内的会员数量
        $where['addtime'] = array("between","{$list['logouttime']},{$_SESSION[C('USER_AUTH_KEY')]['logintime']}");
        $adduser = $model->where($where)->count();
        $this->assign("adduser",$adduser);//新增会员数

        //查询未审核的视频数
        $this->assign("notvideo",M("Video")->where("status=1")->count());
        //查询未审核的文档数
        $this->assign("notlib",M("Library")->where("status=1")->count());

        //查询网站的访问量
        $clickinfo = M("Clicknum")->find(1);
        $this->assign("clicknum",$clickinfo['clicknum']);//网站的访问量
        $this->assign("clicktime",$clickinfo['clicktime']);//最近访问时间
        $this->display();
    }
}
