<?php /* Smarty version Smarty-3.1.6, created on 2019-10-23 14:20:37
         compiled from "./Home/Tpl\Users\index.html" */ ?>
<?php /*%%SmartyHeaderCode:70835daff135713c37-07718058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69b97ade90a25858ccad3747410006eb9957dae3' => 
    array (
      0 => './Home/Tpl\\Users\\index.html',
      1 => 1558538446,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70835daff135713c37-07718058',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5daff136028d5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5daff136028d5')) {function content_5daff136028d5($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <title>注册_教学网</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="__PUBLIC__/images/favicon.png">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/typo.css">
        <link rel="stylesheet" type="text/css" href=".__PUBLIC__/css/simple.css">
        <script type="text/javascript" src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="__PUBLIC__/js/Validform_v5.3.2_min.js"></script>
         
<style type="text/css">
    .from_sina{
        background: #FB575B;
        color: #fff;
        padding:5px;
        margin: 0 5px 0 0;
        border-radius: 5px;
    }
    .from_qq{
        background: #00ABCE;
        color: #fff;
        padding:5px;
        margin: 0 5px 0 0;
        border-radius: 5px;
    }
</style>

    <script type="text/javascript" charset="utf-8">
        $(function(){
            // 导航搜索框
            $('#header .navbar-form input').focus(function(){
                $(this).attr('placeholder', '视频、资源、手记、帖子')
                //$(this).parents('.navbar-form').eq(0).addClass('search_opend')
                $(this).animate({width: '+170px'}, "slow");
                $("#userinfo").fadeOut("fast");
            }).blur(function(){
                $(this).attr('placeholder', '搜索')
                //$(this).parents('.navbar-form').eq(0).removeClass('search_opend')
                $(this).animate({width: '60px'}, "slow");
                $("#userinfo").show(1000);
            })       
        
        })
    </script>
    </head>
    <body style="">
    <div id="browser"></div>
    
        <div id="header">
            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">切换导航</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="__APP__/Index/index"><img src="__PUBLIC__/images/logo-bq.png"></a>
                    </div>

                    <div class="collapse navbar-collapse navbar-ex1-collapse" style="height:50px;line-height:50px">

                        <ul class="nav navbar-nav g_nav" style="margin-top:15px">
                            <li><a href="__APP__/Video/index">视频</a></li>
                            <li><a href="__APP__/Users/myclass">个人</a></li>
                            <li><a href="__APP__/Note/index">班级</a></li>
                            <li><a href="__APP__/Library/index">课件</a></li>
                            <?php if ($_SESSION['user']){?>
                            <li><a href="">考试</a></li>
                            <?php }else{ ?>
                            <li><a href="javascript:alert('请先登录！')">考试</a></li>
                            <?php }?>
                        </ul>

                        
                        <ul class="nav navbar-nav navbar-right" id="userinfo" style="margin-top:15px">

                            <?php if ($_SESSION['user']){?>
                            <li><a href="__APP__/Message/mynews">提醒(<?php echo $_SESSION['user']['hfnum'];?>
)</a></li>
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
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
       
<div id="main" class="u_s_page">
    <div class="container">

    
        <div class="col-md-6 col-md-offset-1">
            <div class="simple_page_inner bg_fff">
                <form id="signup_form" class="form-horizontal" role="form" action="__APP__/Users/insert" method="post">
                    <input id="csrf_token" name="csrf_token" type="hidden" value="None">

                    <legend class="tc f30 mb20">欢迎注册教学网</legend>

                    

                    <div class="form-item">
                        <label class="control-label" for="name">用户名</label>
                        <div class="form-item-in">
                            <input class="form-control input-lg username_input" onblur="checkName()" id="name" name="username" size="30" type="text" value="" placeholder="用户名" datatype="name" errormsg="3-10个字母、数字、下划线组合" nullmsg="用户名不能为空">
                            <span id="tishi1" class="Validform_checktip">3-10个字母、数字、下划线组合</span>
                        </div>
                    </div>
					

                    
                        <div class="form-item">
                            <label class="control-label" for="email">邮箱地址</label>
                            <div class="form-item-in">
                                <input class="form-control input-lg email_input" id="email" name="email" size="30" type="email" datatype="e" nullmsg="请填写邮箱" errormsg="请检查邮箱格式" placeholder="邮箱地址">
                                <span class="Validform_checktip"></span>
                            </div>
                        </div>
                    

                    <div class="form-item">
                        <label class="control-label" for="pass">密码</label>
                        <div class="form-item-in">
                            <input class="form-control input-lg" id="pass" name="userpass" size="30" type="password" placeholder="密码" datatype="*6-16" nullmsg="请填写密码" errormsg="密码范围在6~16位之间" plugin="userpassStrength">
                            <span class="Validform_checktip">6-16个字符</span>
                            <div class="userpassStrength" style="display:none;"><b>密码强度：</b> <span>弱</span><span>中</span><span class="last">强</span></div>
                        </div>
                    </div>
                    <div class="form-item">
                        <label class="control-label" for="repass">重复密码</label>
                        <div class="form-item-in">
                            <input class="form-control input-lg" id="repass" name="reuserpass" size="30" type="password" placeholder="重复密码" datatype="*6-16" recheck="userpass" nullmsg="请再输入一次密码" errormsg="两次输入的密码不一致" plugin="userpassStrength">
                            <span class="Validform_checktip"></span>
                        </div>
                    </div>
                    <div class="form-item">
                        <div class="form-item-in">
                            <button type="submit" id="sub1" class="btn btn-primary btn-lg btn-block">注 册</button>
                            <span class="help-block pt10 f12 cccc">注册即表示您已同意我们的 <a href="" class="cccc">服务条款</a></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-4">
            <div class="simple_page_inner bg_fff">
                <p class="mb30">
                    如果已经注册，请直接 <br>
                    <a href="__APP__/Users/login" class=" mt10 btn btn-lg btn-success">登 录</a>
                </p>
            </div>
        </div>
        
        <script type="text/javascript">
        $(function(){


            // 验证邮箱是否已注册
            $('.email_input').blur(function(){

                $this = $(this)
                var email = $(this).val();

                $.post('__APP__/Users/checkemail',{'email':email},function(data){

                    var json = $.parseJSON( data );
                    if(json.state == 'ok')
                    {
                        $this.parent().find('.Validform_checktip').addClass('Validform_wrong').html('此邮箱已经存在');
                        $this.addClass('Validform_error');
                    }


                });
				

            });

            // 验证用户名是否已注册
            $('.username_input').blur(function(){

                $this = $(this)
                var username = $(this).val();

                $.post('/auth_username',{'username':username},function(data){

                    var json = $.parseJSON( data );
                    if(json.state == 'ok')
                    {
                        $this.parent().find('.Validform_checktip').addClass('Validform_wrong').html('此用户名已注册');
                        $this.addClass('Validform_error');
                    }


                });

            });



            $("#signup_form").Validform({
                postonce:true,
                datatype       : {
                    "name": /^[\w\u4e00-\u9fcb\u3400-\u4db5_]{3,15}$/
                },

                tiptype:function(msg,o,cssctl){
                    var objtip=o.obj.siblings(".Validform_checktip");
                    cssctl(objtip,o.type);
                    objtip.text(msg);

                },

                // beforeSubmit:function(curform){
                //     $('#loadingWraper').show();
                //     curform.find('.btn').addClass('disabled').attr('disabled','disabled').html('请稍等...')
                // },

                usePlugin:{
                    userpassstrength:{
                        minLen:6,//设置密码长度最小值，默认为0;
                        maxLen:16,//设置密码长度最大值，默认为30;
                        trigger:function(obj,error){
                            if(error){
                                obj.siblings(".Validform_checktip").show();
                                obj.siblings(".userpassStrength").hide();
                            }else{
                                obj.siblings(".Validform_checktip").hide();
                                obj.siblings(".userpassStrength").show();   
                            }
                        }
                    }
                }
            });
        })
        </script>
		
    

    </div>
</div>


     
<a id="goTop" href="javascript:void(0)" title="返回顶部" style="display: none;"><i class="icon-angle-up"></i></a>
        <div id="footer">
            <div class="container">
                <div class="col-md-7" style="margin-top:10px;width:500px">
                    <a href="">关于我们</a>
                    <a href="">联系我们</a>
                    <a href="">免责声明</a>
                    <a href="">作品授权</a>
                    <a href="">意见反馈</a>
                </div>
                <div class="col-md-5" style="float:right;font-size:13px;width:500px;margin-top:5px">
                    © 2014 Eschool.com. all rights reserved. 京公网安备11010802012355号
                </div>
            </div>
        </div>

        <div class="modal fade" id="sys-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="__PUBLIC__/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="__PUBLIC__/js/application.js"></script>
        <script type="text/javascript" src="__PUBLIC__/js/retina.js"></script>
		<script>
			function checkName(){
				var name = $("#name").val();
				if(name.match(/[a-zA-Z0-9]{1,10}$/)==null || name.length>10){
					$("#name").css("background","#e76e66");
					$("#tishi1").text("用户名输入错误！");
					$("#tishi1").css("color","#e76e66");
					$("#sub1").attr("disabled",'1');
				}else{
					$("#name").css("background","#fff");
					$("#tishi1").text("输入正确！");
					$("#tishi1").css("color","#999");
					$("#sub1").attr("disabled",null);
				}
			}
		</script>
        
</body></html>

<?php }} ?>