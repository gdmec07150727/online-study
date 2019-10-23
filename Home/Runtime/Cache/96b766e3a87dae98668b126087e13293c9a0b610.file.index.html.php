<?php /* Smarty version Smarty-3.1.6, created on 2019-10-23 14:21:03
         compiled from "./Home/Tpl\Video\index.html" */ ?>
<?php /*%%SmartyHeaderCode:217435daff14f598bf0-15729932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96b766e3a87dae98668b126087e13293c9a0b610' => 
    array (
      0 => './Home/Tpl\\Video\\index.html',
      1 => 1414747578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '217435daff14f598bf0-15729932',
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
    'cust_ids' => 0,
    'cust_names' => 0,
    'mySelect' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5daff14ff3c11',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5daff14ff3c11')) {function content_5daff14ff3c11($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\wamp64\\www\\online-study\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\function.html_options.php';
?><!DOCTYPE html>
<html>
    <head>
        <title>教学资源浏览</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <link rel="icon" type="image/x-icon" href="__PUBLIC__/images/favicon.png">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/typo.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/simple.css">
        <!--包含进uploadify上传的css和js文件-->
        <link rel="stylesheet" type="text/css" href='__PUBLIC__/uploadify/css/uploadify.css' />
        <script type="text/javascript" src="__PUBLIC__/uploadify/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="__PUBLIC__/uploadify/js/jquery.uploadify-3.1.min.js"></script>
        <style type="text/css">
        /*ipad fix*/
        @media (min-width:992px){
            .home_module .m_cover_list li:nth-last-child(-n+3) {
                display: none;
            }
            .col-md-4{
                /*display: none;*/
            }
        }
        @media (min-width:1200px){
            .home_module .m_cover_list li:nth-last-child(-n+3) {
                *display: inline;
                display: inline-block;
                zoom:1;
            }
        }

        .content_list{
            overflow: hidden;
        }
        .content_list li img{
            height: 140px;
            width: 100px;
        }
        .content_list li{
            float: left;
            width: 100px;
            text-align: center;
            margin-right: 19px;
            margin-bottom: 20px;
        }
        .c_rating i{
            font-style: normal;
            font-size: 12px;
            vertical-align: top;
            line-height: 18px;
            /*padding-left: 10px;*/
            color: #d7b120;
        }
        .content_load{
            display: none;
            text-align: center;
        }

        
        #new_list li a:hover{font-size:125%;text-decoration:none}
        .list_ib li a:hover{font-size:125%}
        /**弹出层效果**/
        .raceShow{background:url("__PUBLIC__/images/103923O21-2.gif");z-index:10000;border:solid 1px #ccc;position:absolute;display:none;left:50%;top:50%;width:300px;height:100px;padding:30px;font-size:16px;color:red;text-align:center;}
        </style>
        
       
        <script type="text/javascript" charset="utf-8">
            $(function(){
                //设置视频菜单栏的选项卡效果
                $("#videoadd").click(function(){
                    $(".video_list").animate({
                        right:0,
                        opacity: 'hide'
                    },"slow",function(){
                        $(".video_add").slideDown(800);
                        $("#navbarli").removeClass("active");
                    });
                });
                $(".videolist").click(function(){
                     $(".video_add").animate({
                        left:0,
                        opacity: 'hide'
                    },"slow",function(){
                        $(".video_list").slideDown(800);
                    });
                });
                /*
                //设置最新视频榜的滚动
                setInterval(function(){
                    $("li.newlist:last").fadeTo(0.2).prependTo("#new_list").animate({
                        opacity: 'toggle'       
                    },1500);  
                },1500);*/
                //弹出层
                var speed = 500;//动画速度
                $("a.please").click(function(event){//绑定事件处理
                    event.stopPropagation();
                    $("#racePop").slideDown(speed);//动画显示
                    });
                $("#racePop").click(function(event) { $("#racePop").fadeOut(speed) });//单击弹出层则自身隐藏
                $(document).click(function(event) { $("#racePop").fadeOut(speed) });//单击空白区域隐藏
                //添加表单的焦点事件
                $("#f_name,#videotype,#f_info").focus(function(){
                    $(this).next("span").remove();
                    doFocusInfo(this);
                }).blur(function(){				//移除当前input后多余的span节点
                    $(this).next("span").remove();
                    //执行验证
                    doCheck(this);
                });      
            });
            //失去焦点的验证提醒
            function doCheck(ob){
                switch($(ob).attr("name")){
                    case "videoname":
                        var videoname = $(ob).val();//获取所选资源的值
                        if (videoname) {
                            $.ajax({
                                url:"__URL__/checkname",
                                type:"post",
                                async:true,
                                data:"videoname="+videoname,
                                dataType:"text",
                                success:function(data){
                                    if (data == "yes") {
                                        $(ob).after('<span style="color:red">视频名已存在！</span>');
                                        return false;
                                    }else{
                                        $(ob).after('<span style="color:green">√</span>');
                                        return true;   
                                    }
                                },
                                error:function(){
                                    alert("ajax请求失败！");
                                }
                            });
                        }else{
                            $(ob).after('<span style="color:red">怎么不填视频名呢？</span>');
                            return false;
                        }
                        
                        break;
                    case "tid":
                        if($(ob).val()==0){
                            $(ob).after('<span style="color:red;height:40px;line-height:40px">亲~没选视频类型喔、</span>');
                            return false;
                        }else{
                            $(ob).after('<span style="color:green;height:40px;line-height:40px">√</span>');
                            return true;
                        }
                        break;
                    case "descr":
                        if($(ob).val().length==0||!$(ob).val().trim()){
                            $(ob).after('<span style="color:red">描述一下啦！</span>');
                            return false;
                        }else{
                            $(ob).after('<span style="color:green">√</span>');
                            return true;
                        }
                        break;
                }
                return false;
            }   
            //获取焦点提醒的函数
            function doFocusInfo(ob){
                switch($(ob).attr("name")){
                    case "videoname":
                        $(ob).after('<span style="color:blue">给视频起个名</span>');
                        break;
                    case "tid":
                        $(ob).after('<span style="color:blue;height:40px;line-height:40px">类型选什么呢？</span>');
                        break;
                    case "descr":
                        $(ob).after('<span style="color:blue">描述很重要啊、</span>');
                        break;
                }
            }
            //表单提交的验证函数
            function doChec(){
                
                if (!$("#f_name").val().trim()) {
                    $("#f_name").next("span").remove();
                    $("#f_name").after('<span style="color:red">给视频起个名</span>');
                    return false;
                }
                if ($("#f_name").val().trim()) {
                    var videoname = $("#f_name").val().trim();//获取所选资源的值
                    $.ajax({
                        url:"__URL__/checkname",
                        type:"post",
                        async:true,
                        data:"videoname="+videoname,
                        dataType:"text",
                        success:function(data){
                            if (data == "yes") {
                                $("#f_name").next("span").remove();
                                $("#f_name").after('<span style="color:red">视频名已存在！</span>');
                                return false;
                            }else{
                                $("#f_name").next("span").remove();
                                $("#f_name").after('<span style="color:green">√</span>');
                                return true; 
                            }
                        },
                        error:function(){
                            return false;
                            alert("ajax请求失败！");
                        }
                    });
                };
                if ($("#videotype").val()==0) {
                    $("#videotype").next("span").remove();
                    $("#videotype").after('<span style="color:red;height:40px;line-height:40px">类型选什么呢？</span>');
                    return false;
                }
                if (!$("#f_info").val()||!$("#f_info").val().trim()) {
                    $("#f_info").next("span").remove();
                    $("#f_info").after('<span style="color:red">描述很重要啊、</span>');
                    return false;
                }
                //if ($("#f_name").val().trim() && $("#videotype").val() && $("#f_info").val().trim()) {return true};
                return true;
            }   
                
        </script>
        
    </head>
    <body>
    <div id="browser"></div>
    <?php echo $_smarty_tpl->getSubTemplate ("../Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        
<div id="sub-header" class="group_h">
    <div class="container">
        <div class="navbar-header col-sm-offset-1">
            <h1><a href="">视频库</a></h1>
        </div>
        <div class="col-md-6">
            <ul class="navbar-left">
                <li id="navbarli" class="active"><a href="javascript:void(0)" class="videolist">视频精选</a></li>
                <?php if ($_SESSION['user']){?>
                <li class="btn-upload-w" style="margin-left:100px"><a href="javascript:void(0)" id="videoadd" class="btn btn-default btn-upload"><i class="icon-upload-alt"></i>上传我的视频</a></li>
                <?php }else{ ?>
                <li class="btn-upload-w" style="margin-left:100px"><a href="javascript:;" class="btn btn-default btn-upload please"><i class="icon-upload-alt"></i>上传我的视频</a></li>
                <div id="racePop" class="raceShow"><b>请先登录！点击此处取消...</b></div>
                <?php }?>
            </ul>
        </div>
        <div class="col-md-4">
            <ul class="navbar-left">
                <?php if ($_SESSION['user']){?>
                <li id="usupload"><a href="__URL__/index/uid/<?php echo $_SESSION['user']['id'];?>
" ><i class="icon-list"></i> 我上传的</a></li>
                <?php }else{ ?>
                <li><a href="javascript:;" class="please"><i class="icon-list"></i> 我上传的</a></li>
                <?php }?>
                <li id="uscoll">
                <?php if ($_SESSION['user']){?>
                <a href="__URL__/index/collid/<?php echo $_SESSION['user']['id'];?>
"><i class="icon-list"></i> 我收藏的</a>
                <?php }else{ ?>
                <a href="javascript:;" class="please"><i class="icon-list"></i> 我收藏的</a>
                <?php }?>
                </li>
            </ul>
        </div>
    </div>
</div>



<!--浏览视频列表代码块-->
<div id="main" class="video_list">
    <div class="container">
        <div class="home_module row">
            <div class="container">
                
                <div class="col-md-8 oh">

                    <div class="tt">
                        <h3><?php echo (($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? "精选教学视频" : $tmp);?>
</h3>
                    </div>

                    <ul class="content_list" style="margin-left:6%">
                        <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
                        <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
                        <li style="width:160px;margin-left:1px">
                            <div class="item_cover" style="width:150px">
                                <img alt="<?php echo $_smarty_tpl->tpl_vars['vo']->value['videoname'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['vo']->value['videoname'];?>
" style="width:150px" src="__PUBLIC__/Uploads/videopic/<?php echo $_smarty_tpl->tpl_vars['vo']->value['picname'];?>
">
                                <a class="m_cover_item_info" href="__URL__/play/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
" title="点击播放" style="width:150px">
                                    <span class="play-item"><i class="icon-play"></i></span>
                                    <em>点击率 <?php echo $_smarty_tpl->tpl_vars['vo']->value['clicknum'];?>
</em>
                                </a>
                            </div>
                            <span class="title" style="font-size:12px"><a href="__URL__/detail/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
/tid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['tid'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['videoname'];?>
</a></span>
                            <div class="c_rating" style="width:150px">
                                <i><?php echo $_smarty_tpl->tpl_vars['vo']->value['favonum'];?>
人赞</i>
                            </div>
                            <a href="__URL__/detail/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
/tid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['tid'];?>
" class="btn btn-primary btn-sm">查看详情</a>
                        </li>
                        <?php } ?>
                        <?php }else{ ?>
                        <div class="null">视频列表暂为空~</div>
                        <?php }?>
                    </ul>
                    <br>
                    <div class="" align="center"><?php echo $_smarty_tpl->tpl_vars['showPage']->value;?>
</div>                  

                </div>


                <!-- 右侧 -->
                <div class="col-md-4">
                    <div class="mb30 m_cats" style="width:200px">
                        <div class="tt">
                            <h3>视频分类</h3>
                            
                            <a href="__APP__/Cat/index" class="more">所有分类 »</a>
                            
                        </div>
                        
                        <ul class="list_ib">
                            <?php  $_smarty_tpl->tpl_vars['ty'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ty']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['typelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ty']->key => $_smarty_tpl->tpl_vars['ty']->value){
$_smarty_tpl->tpl_vars['ty']->_loop = true;
?>
                            <li><a href="__APP__/Video/index/pid/<?php echo $_smarty_tpl->tpl_vars['ty']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ty']->value['name'];?>
</a></li>
                            <?php } ?>
                            
                        </ul>
                        
                    </div>

                    
                    <div class="m_pay_list">
                        <div class="tt">
                            <h3>最新视频榜</h3>
                        </div>
                        <div id="scrollDiv" style="height:240px;overflow:hidden;">
                        <ol id="new_list">
                            <?php  $_smarty_tpl->tpl_vars['new'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['new']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['new']->key => $_smarty_tpl->tpl_vars['new']->value){
$_smarty_tpl->tpl_vars['new']->_loop = true;
?>
                            <li class="newlist"><span>新</span><a href="__URL__/detail/id/<?php echo $_smarty_tpl->tpl_vars['new']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['new']->value['videoname'];?>
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
<!--浏览视频列表代码块-->
<script type="text/javascript" charset="utf-8">
//设置最新视频榜滚动
$(document).ready(function(){
$("#scrollDiv").Scroll({line:8,speed:1000,timer:2000});
});
</script>
<!-- 多行滚动 -->  

<!--上传资源信息代码块-->
<div id="main" class="video_add" style="display:none">
    <div class="container">
        <div class="home_module m_movie">
            <div class="container">
                <!-- 左侧 -->
                <div class="col-md-8">

                    <!-- 我购买的 -->
                    <div class="tt col-sm-offset-3">
                        <h3>上传我的作品</h3>
                    </div>


                    <div class="ui three large steps col-md-offset-3 col-md-8 p0 mb20 row" style="float:none">
                        <div class="ui  active step">填写信息</div>
                        <div class="ui disabled step">上传视频</div>
                        <div class="ui disabled step">等待审核</div>
                    </div>

                    
                    <form id="film-upload-form" class="mt30 form-horizontal" autocomplete="off" action="__URL__/insert" method="POST" onsubmit="return doChec()">
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">视频名称</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-3 input-lg" id="f_name" name="videoname" size="30" type="text" regexp="^\w{6,8}$">
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">视频类型</label>
                            <div class="col-md-8">
                                <select name="tid" class="form-control col-md-3 input-lg" id="videotype" style="width:200px;height:50px;font-size:18px;">
                                    <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['cust_ids']->value,'output'=>$_smarty_tpl->tpl_vars['cust_names']->value,'selected'=>$_smarty_tpl->tpl_vars['mySelect']->value),$_smarty_tpl);?>

                                </select>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">视频简介</label>
                            <div class="col-md-8">
                                <textarea class="form-control col-md-3 input-lg" rows="3" id="f_info" name="descr" size="30"></textarea>
                                
                            </div>
                        </div>
                        <div class="form-group pt20">
                            <div class="col-md-8  col-md-offset-3">
                                <hr>
                            </div>
                        </div>
                        <div class="form-group pt20">
                            <div class="col-md-8  col-md-offset-3 tc">
                                <button id="submit" type="submit" class="btn btn-primary btn-lg btn-block">提 交</button>
                            </div>
                        </div>
                    </form>
                    
                    
                </div>

                <!-- 右侧 -->
                <div class="col-md-4">
                    <div class="bg_f5 p20 mt40 f12">
                        上传资源，即表示您已同意<a data-toggle="modal" href="#myModal">教学网上传服务条款</a>，请勿上传垃圾等不合理资源。
                        <br/>
                        <i>如资源上传失败,请与我们管理员联系 help@esch.com</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="2" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">教学网上传服务条款</h4>
            </div>
            <div class="modal-body">
                教学网郑重提醒您:<br><br>
                为响应国家九部委联合开展深入整治互联网和在线教学的号召，营造一个健康便捷的网络教学环境，给大家一个和谐的家园。<br>
                <ul class="list_pb5 f12 p10">
                    <li>不得上传任何有违国家法律法规的资源。</li>
                    <li>不得上传具有色情内容的资源。</li>
                    <li>不得上传内容低俗，格调不高的资源。</li>
                    <li>不得上传具有色情诱导性内容的资源。</li>
                    <li>不得在标题、简介和标签中出现任何具有低俗色情含义的字眼。</li>
                    <li>不含有涉及版权问题的资源。</li>
                </ul>
                如果您上传了这些内容，我们将一律予以删除，我们希望我们最珍贵的网友们，理解并监督我们。
            </div>
            
        </div>
    </div>
</div>
<!--上传资源信息代码块-->

    <?php echo $_smarty_tpl->getSubTemplate ("../Public/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        
    
</body></html>
<?php }} ?>