<?php /* Smarty version Smarty-3.1.6, created on 2019-10-23 14:20:53
         compiled from "./Home/Tpl\Note\index.html" */ ?>
<?php /*%%SmartyHeaderCode:130085daff145f02537-23143497%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f877718030ef7fc1581c208d48fd8c0f9d22c284' => 
    array (
      0 => './Home/Tpl\\Note\\index.html',
      1 => 1559715216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130085daff145f02537-23143497',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'list' => 0,
    'vo' => 0,
    'showPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5daff14634c9a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5daff14634c9a')) {function content_5daff14634c9a($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\wamp64\\www\\online-study\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>班级课程列表</title>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/x-icon" href="__PUBLIC__/images/favicon.png">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/typo.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/simple.css">

        <script type="text/javascript" src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
        <style type="text/css">
            .newlist li a:hover{
                color:blue;
                font-size:130%;
                text-decoration:none;
            }
            /**弹出层效果**/
            .raceShow{background:url("__PUBLIC__/images/103923O21-2.gif");z-index:10000;border:solid 1px #ccc;position:absolute;display:none;width:300px;height:100px;padding:30px;font-size:16px;color:red;text-align:center;}
        </style>
        <script type="text/javascript" charset="utf-8">
            $(function(){
                //弹出层
                var speed = 500;//动画速度
                $("a.please").click(function(event){//绑定事件处理
                    event.stopPropagation();
                    //var offset = $(event.target).offset();//取消事件冒泡
		            $("#racePop").css({ top:event.pageY + "px", left: event.pageX-"300" + "px" });//设置弹出层位置
                    $("#racePop").slideDown(speed);//动画显示
                    });
                $("#racePop").click(function(event) { $("#racePop").fadeOut(speed) });//单击弹出层则自身隐藏
                $(document).click(function(event) { $("#racePop").fadeOut(speed) });//单击空白区域隐藏
            });
        </script>
    </head>
    <body>
    <div id="browser"></div>

    <?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="sub-header" class="group_h">
    <div class="container">
        <div class="navbar-header col-sm-offset-1">
            <h1><a href="">课程</a></h1>
        </div>
        <div class="col-md-6">
            <ul class="navbar-left">
                <li class="active"><a href="__URL__/index">课程列表</a></li>
            </ul>
        </div>
        <div id="racePop" class="raceShow"><b>请先登录！点击此处取消...</b></div>
    </div>
</div>




<div id="main">
    <div class="container">
        <div class="home_module row">
            <div class="container">
                <div class="col-md-8">

                    <div class="m_r_list g_t_list mt5">
                        <div class="tt"><h3><?php echo (($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? "课程总览" : $tmp);?>
</h3></div>
                        <div class="m_n_item_info f12 c999">
                            <span class="g_reply_n">课程名称</span>
                            <span class="g_topic_t ml10">课程列表</span>
                        </div>
                        <ul class="list_pb20">
                            <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
                            <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
                            <li>
                                <div class="g_reply_n pull-left">
                                    <span title="">
                                        <em><img height='50' width='50' src="__PUBLIC__/Uploads/users/0/1.jpg"></em>
                                    </span>

                                </div>

                                <div class="t_ml_120">
                                    <h4><a href="__URL__/detail/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['class_name'];?>
</a></h4>

                                    <p>

                                        班级老师： <a href=""><?php echo $_smarty_tpl->tpl_vars['vo']->value['class_cre'];?>
</a> <i style="float:right;"> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</i>

                                    </p>
                                    <h4><a style="color: #9A0000;float: right;" href="__URL__/insert/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
/navTabId/listlib">加入当前班级</a></h4>
                                </div>
                            </li>
                            <?php } ?>
                            <?php }else{ ?>
                            <div class="null">资源列表暂空~</div>
                            <?php }?>
                        </ul>

                        <div class="tc">
                            <ul class="pagination">
                                <?php echo $_smarty_tpl->tpl_vars['showPage']->value;?>

                            </ul>
                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="biquu_d_placeholder mt50 mb40">
                        <a href=""><img alt="E-Sch教学网" title="E-Sch教学网" src="__PUBLIC__/images/0000dh.jpg"></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="__PUBLIC__/js/scroll.js"></script>
<script type="text/javascript" charset="utf-8">
//设置最新手记榜滚动
$(document).ready(function(){
$("#scrollDiv").Scroll({line:8,speed:1000,timer:2000});
});
</script>
<!-- 多行滚动 -->
    <?php echo $_smarty_tpl->getSubTemplate ("../Public/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</body></html>
<?php }} ?>