<?php /* Smarty version Smarty-3.1.6, created on 2019-10-23 14:21:11
         compiled from "./Home/Tpl\Library\index.html" */ ?>
<?php /*%%SmartyHeaderCode:234415daff157d2fc88-33936657%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1047c039db239818cd39e9b24ff213b65eb3cdba' => 
    array (
      0 => './Home/Tpl\\Library\\index.html',
      1 => 1559638956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '234415daff157d2fc88-33936657',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'list' => 0,
    'vo' => 0,
    'showPage' => 0,
    'typelist' => 0,
    'ty' => 0,
    'newlist' => 0,
    'new' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5daff15847cf4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5daff15847cf4')) {function content_5daff15847cf4($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\wamp64\\www\\online-study\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>文库</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="icon" type="image/x-icon" href="__PUBLIC__/images/favicon.png">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/typo.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/simple.css">
        
        
        <script type="text/javascript" src="__PUBLIC__/js/jquery-1.10.2.min.js"></script> 
        <style>
		body{font-family:"Microsoft Yahei";}
            .newlist li a:hover{font-size:105%;text-decoration:none}
            .list_ib li a:hover{font-size:125%;}
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
		            $("#racePop").css({ top:event.pageY + "px", left: "500px" });//设置弹出层位置
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
            <h1><a href="">课件</a></h1>
        </div>
        <div class="col-md-6">
            <ul class="navbar-left">
                <li class="active"><a href="__URL__/index">资源浏览</a></li>
                <li>
                <?php if ($_SESSION['user']){?>
                <a href="__URL__/add">添加资源</a>
                <?php }else{ ?>
                <a href="javascript:;" class="please">添加资源</a>
                <?php }?>
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <ul class="navbar-left">
                <li>
                <?php if ($_SESSION['user']){?>
                <a href="__URL__/index/uid/<?php echo $_SESSION['user']['id'];?>
"><i class="icon-list"></i> 我上传的</a>
                <?php }else{ ?>
                <a href="javascript:;" class="please"><i class="icon-list"></i> 我上传的</a>
                <?php }?>
                </li>
                <li>
                <?php if ($_SESSION['user']){?>
                <a href="__URL__/index/collid/<?php echo $_SESSION['user']['id'];?>
"><i class="icon-list"></i> 我收藏的</a>
                <?php }else{ ?>
                <a href="javascript:;" class="please"><i class="icon-list"></i> 我收藏的</a>
                <?php }?>
                </li>
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
                        <div class="tt"><h3><?php echo (($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? "课件资源" : $tmp);?>
</h3></div>
                        <div class="m_n_item_info f12 c999">
                            <span class="g_reply_n">浏览量&nbsp;&nbsp;|&nbsp;&nbsp;被赞量</span>
                            <span class="g_topic_t ml10">教学文库资源列表</span>
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
                                        <i class="icon-eye-open icon-color-red"></i>
                                        <em><?php echo $_smarty_tpl->tpl_vars['vo']->value['clicknum'];?>
</em>
                                    </span>
                                    <span title="">
                                        <i class="icon-eye-open icon-color-red"></i>
                                        <em><?php echo $_smarty_tpl->tpl_vars['vo']->value['favonum'];?>
</em>
                                    </span>
                                </div>

                                <div class="t_ml_120">
                                    <h4><a href="__URL__/detail/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['libname'];?>
</a></h4>
                                    
                                    <p>
                                    <a href="__APP__/Users/otheredu/uid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['uid'];?>
"><img alt="<?php echo $_smarty_tpl->tpl_vars['vo']->value['username'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['vo']->value['username'];?>
" src="__PUBLIC__/Uploads/users/<?php echo $_smarty_tpl->tpl_vars['vo']->value['username'];?>
/s_<?php echo $_smarty_tpl->tpl_vars['vo']->value['picture'];?>
" class="avatar_md"></a>
                                    上传者 <a href="__APP__/Users/otheredu/uid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['uid'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['username'];?>
</a> <i style="float:right;">发布时间 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</i>
                                        
                                    </p>
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

                
                <!-- 右侧 -->
                <div class="col-md-4">
                    <div class="mb30 m_cats" style="width:200px">
                        <div class="tt">
                            <h3>资源分类</h3>
                            
                            <a href="__APP__/Cat/index" class="more">所有分类 »</a>
                            
                        </div>
                        
                        <ul class="list_ib">
                            <?php  $_smarty_tpl->tpl_vars['ty'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ty']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['typelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ty']->key => $_smarty_tpl->tpl_vars['ty']->value){
$_smarty_tpl->tpl_vars['ty']->_loop = true;
?>
                            <li><a href="__APP__/Library/index/pid/<?php echo $_smarty_tpl->tpl_vars['ty']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ty']->value['name'];?>
</a></li>
                            <?php } ?>
                            
                        </ul>
                        
                    </div>

                    
                    <div class="m_pay_list">
                        <div class="tt">
                            <h3>最新资源榜</h3>
                        </div>
                        <div id="scrollDiv" style="height:240px;overflow:hidden;">
                        <ol class="newlist">
                            <?php  $_smarty_tpl->tpl_vars['new'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['new']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['new']->key => $_smarty_tpl->tpl_vars['new']->value){
$_smarty_tpl->tpl_vars['new']->_loop = true;
?>
                            <li><span>新</span><a href="__URL__/detail/id/<?php echo $_smarty_tpl->tpl_vars['new']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['new']->value['title'];?>
</a></li>
                            <?php } ?>
                        </ol>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="__PUBLIC__/js/scroll.js"></script> 
    <script type="text/javascript" charset="utf-8">
        $(function(){
            
            //设置资源列表页的鼠标斑马线
            var bg = null;    
            $("ul.list_pb20 li").mouseover(function(){
                bg = $(this).css("background-color");
                $(this).css("background-color","#ddd");
            }).mouseout(function(){
                $(this).css("background-color",bg);      
            });
            //设置最新资源列表的鼠标斑马线
            var size=null;
            $("ol.newlist li").mouseover(function(){
                size = $(this).css("font-size");
                $(this).css("font-size","18px");
            }).mouseout(function(){
                $(this).css("font-size",size);      
            });
            //设置最新资源榜的滚动
            $("#scrollDiv").Scroll({line:8,speed:1000,timer:2000});
        })
    </script>

    <?php echo $_smarty_tpl->getSubTemplate ("../Public/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
</body></html>
<?php }} ?>