<?php /* Smarty version Smarty-3.1.6, created on 2019-10-23 14:20:38
         compiled from "./Home/Tpl\Users\myclass.html" */ ?>
<?php /*%%SmartyHeaderCode:46165daff1362b9550-07735167%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf381cfd66ff7f81f12723b07f020423970d27b4' => 
    array (
      0 => './Home/Tpl\\Users\\myclass.html',
      1 => 1560240289,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46165daff1362b9550-07735167',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'classes' => 0,
    'vo' => 0,
    'showPage' => 0,
    'videonum' => 0,
    'classnum' => 0,
    'libnum' => 0,
    'mymes1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5daff13691d26',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5daff13691d26')) {function content_5daff13691d26($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\wamp64\\www\\online-study\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../Public/head2.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<div id="sub-header" class="bq_h">
    <div class="container">
        <div class="navbar-header ">
            <h1><a href="__APP__/Index/index">个人中心</a></h1>
        </div>
        <div class="col-md-6" style="width:80%;">
            <ul class="navbar-left">
                <li><a href="__APP__/Users/myheart">心情</a></li>
                <li><a href="__APP__/Users/myedu">我的收藏</a></li>
                <li class="active"><a href="__APP__/Users/myclass">我的班级</a></li>

                <li><a href="__APP__/Test/myscore">我的考试</a></li>
                <li><a href="__APP__/Users/settings">修改资料</a></li>
                <!--<li><a href="__APP__/Users/photoalbum">我的相册</a></li>
                <li><a href="__APP__/Users/stranger">查看陌生人</a></li><li><a href="__APP__/Homework/index">我的作业</a></li>-->

            </ul>
        </div>
    </div>
</div>
<style type="text/css">
    .m_r_list h4{cursor:pointer;height:30px}
</style>
<script type="text/javascript" charset="utf-8">
    //设置用户收藏的资源动态效果
    $(function(){
        $("div.m_r_list h4").click(
                function(){
                    switch($(this).attr("class")) {
                        case 'video':
                            $("ul.videolist").slideToggle("slow");
                            break;
                        case 'note':
                            $("ul.notelist").slideToggle("slow");
                            break;
                        case 'library':
                            $("ul.liblist").slideToggle("slow");
                            break;
                        case 'mynote':
                            $("ul.mynotelist").slideToggle("slow");
                            break;
                    }
                }
        );
    });
</script>

<div id="main">
    <div class="container">
        <div class="home_module row">
            <div class="container">

                <div class="col-md-8">

                    <!--秀波的-->

                    <div class="m_r_list g_t_list mt5">
                        <div class="tt"><h3><?php echo (($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? "我加入的课程" : $tmp);?>
</h3></div>
                        <div class="m_n_item_info f12 c999">
                            <span class="g_reply_n">课程名称</span>
                            <span class="g_topic_t ml10">课程列表</span>
                        </div>
                        <ul class="list_pb20">
                            <?php if ($_smarty_tpl->tpl_vars['classes']->value){?>
                            <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['classes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                                    <h4><a href="__APP__/Homework/index/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['class_name'];?>
</a></h4>

                                    <p>
                                        班级老师：<?php echo $_smarty_tpl->tpl_vars['vo']->value['class_cre'];?>

                                    </p>
                                    <p>
                                        <a href="__URL__/delete/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
/navTabId/listlib" style="color: #9A0000">退出当前班级</a>
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


                <div class="col-md-4">


                    <div class="u_card">
                        <div class="u_card_name"><?php echo $_SESSION['user']['username'];?>
</div>
                        <div class="u_card_info">
                            <img src="<?php if ($_SESSION['user']['picture']=='1.jpg'){?>__PUBLIC__/uploads/users/0/1.jpg<?php }else{ ?>__PUBLIC__/uploads/users/<?php echo $_SESSION['user']['username'];?>
/<?php echo $_SESSION['user']['picture'];?>
<?php }?>" class="avatar_bg">

                        </div>
                        <div class="u_card_intro">

                            <p class="c666"><?php echo $_SESSION['user']['introduce'];?>
</p>
                            <p><span><?php echo smarty_modifier_date_format($_SESSION['user']['addtime'],"%Y-%m-%d");?>
加入</span></p>
                        </div>
                        <div class="u_card_data">
                            <ul class="list_ib">
                                <li>
                                    <a href="__APP__/Video/index/uid/<?php echo $_SESSION['user']['id'];?>
">视频<span><?php echo $_smarty_tpl->tpl_vars['videonum']->value;?>
</span></a>
                                </li>
                                <li>
                                    <a href="__APP__/Note/index/uid/<?php echo $_SESSION['user']['id'];?>
">班级<span><?php echo $_smarty_tpl->tpl_vars['classnum']->value;?>
</span></a>
                                </li>
                                <li>
                                    <a href="__APP__/Library/index/uid/<?php echo $_SESSION['user']['id'];?>
">课件<span><?php echo $_smarty_tpl->tpl_vars['libnum']->value;?>
</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="mt30">
                        <div class="tt tt_normal">
                            <h4 class="pb10">今日心情</h4>

                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['mymes1']->value){?>
                        <?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mymes1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
                        <div class="null" style="color:green;">
                            <?php echo $_smarty_tpl->tpl_vars['vo']->value['content'];?>

                        </div>
                        <?php } ?>
                        <?php }else{ ?>
                        <div class="null">
                            还没有今日心情，去 <a href="__APP__/Users/myheart">发布</a> 吧
                        </div>
                        <?php }?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('../Public/foot2.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>