<?php /* Smarty version Smarty-3.1.6, created on 2019-10-23 14:20:54
         compiled from "D:\wamp64\www\online-study\Home\Tpl\Public\head.html" */ ?>
<?php /*%%SmartyHeaderCode:130015daff1465093c3-83108329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a6db228bf0822f2f97036ccca7f7f49cba2c984' => 
    array (
      0 => 'D:\\wamp64\\www\\online-study\\Home\\Tpl\\Public\\head.html',
      1 => 1559624429,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130015daff1465093c3-83108329',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5daff14675cc8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5daff14675cc8')) {function content_5daff14675cc8($_smarty_tpl) {?>        <div id="header" style="font-family:'Microsoft Yahei';">
            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">切换导航</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="__APP__/Index/index">E-Sch</a>
                    </div>

                    <div class="collapse navbar-collapse navbar-ex1-collapse">

                        <ul class="nav navbar-nav g_nav">
                            <li><a href="__APP__/Video/index">教学视频</a></li>
                            <li><a href="__APP__/Users/myclass">个人中心</a></li>
                            <li><a href="__APP__/Note/index">班级课程</a></li>
                            <li><a href="__APP__/Library/index">教学课件</a></li>
                            <!--<li><a href="__APP__/Message/index">贴吧</a></li>-->
                            <?php if ($_SESSION['user']){?>
                            <li><a href="__APP__/Test/index">考试</a></li>
                            <?php }else{ ?>
                            <li><a href="javascript:alert('请先登录！')">考试</a></li>
                            <?php }?>
                        </ul>

                        <form class="navbar-form navbar-right" role="search" action="__APP__/Cat/show" method="GET" autocompelte="off">
                            <div class="form-group">
                                <input type="text" name="q" class="form-control" placeholder="搜索">
                            </div>
                            <button type="submit" class="btn btn-default"><i class="icon-search"></i></button>
                        </form>

                        <ul class="nav navbar-nav navbar-right" id="userinfo">

                            <?php if ($_SESSION['user']){?>
                            <li><a href="__APP__/Message/mynews">提醒(<?php if ($_SESSION['user']['hfnum']){?><?php echo $_SESSION['user']['hfnum'];?>
<?php }else{ ?>0<?php }?>)</a></li>
                            <li class="navbar-nav-user">
                                <a class="user-avatar" href="__APP__/Users/myedu">
                                    <img alt="<?php echo $_SESSION['user']['username'];?>
" title="<?php echo $_SESSION['user']['username'];?>
" <?php if ($_SESSION['user']['picture']=='1.jpg'){?>src="__PUBLIC__/Uploads/users/0/0.jpg"<?php }else{ ?>src="__PUBLIC__/Uploads/users/<?php echo $_SESSION['user']['username'];?>
/s_<?php echo $_SESSION['user']['picture'];?>
"<?php }?> class="avatar_sm">　<?php echo $_SESSION['user']['username'];?>
</a>
                                </a>
                                <div class="dropdown">
                                    <a href="__APP__/Users/settings"><i class="icon-wrench"></i> 设置</a>
                                    <a href="__APP__/Users/loginout"><i class="icon-signout"></i> 退出</a>
                                </div>
                            </li>
                            <?php }else{ ?>
                            <li><a href="__APP__/Index/index">首页</a></li>
                            <li><a href="__APP__/Users/login">登录</a></li>
                            <li><a href="__APP__/Users/index">注册</a></li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

         <script type="text/javascript">
            $(function(){
                // 导航搜索框
                $('#header .navbar-form input').focus(function(){
                    $(this).attr('placeholder', '视频、资源、手记、帖子')
                    //$(this).parents('.navbar-form').eq(0).addClass('search_opend')
                    $(this).animate({width: '+250px'}, "fast");
                    $("#userinfo").fadeOut("fast");
                }).blur(function(){
                    $(this).attr('placeholder', '搜索')
                    //$(this).parents('.navbar-form').eq(0).removeClass('search_opend')
                    $(this).animate({width: '70px'}, "fast");
                    $("#userinfo").show(1000);
                })       
                //设置头部的图片滚动
                
            })
        </script>
<?php }} ?>