<?php /* Smarty version Smarty-3.1.6, created on 2019-05-30 17:04:32
         compiled from "./Admin/Tpl\Stu\add.html" */ ?>
<?php /*%%SmartyHeaderCode:316225cef8c1f61d3f3-92441305%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04776894e65c4a57c77420245b2be0da3affb588' => 
    array (
      0 => './Admin/Tpl\\Stu\\add.html',
      1 => 1559205821,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '316225cef8c1f61d3f3-92441305',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5cef8c1f66b71',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cef8c1f66b71')) {function content_5cef8c1f66b71($_smarty_tpl) {?>
<div class="pageContent">
	<form method="post" action="__URL__/insert/navTabId/listflink/callbackType/closeCurrent"  class="pageForm required-validate" 
		onsubmit="return validateCallback(this,dialogAjaxDone);"><<?php ?>?php  //窗体组件采用这个 iframeCallback(this, navTabAjaxDone); ?<?php ?>>
        <div class="pageFormContent" layoutH="60">
			<dl>
				<dt>ID</dt>
				<dd><input type="text" class="required" style="width:100%" name="stu_id"/></dd>
			</dl>
			<dl>
				<dt>班级ID</dt>
				<dd><input type="text" class="required"  style="width:100%" name="class_id"/></dd>
			</dl>
			<dl>
				<dt>姓名</dt>
				<dd><input type="text" class="required"  style="width:100%" name="stu_name"/></dd>
            </dl>
			<dl>
				<dt>学号</dt>
				<dd><input type="text" class="required" style="width:100%" name="stu_num"/></dd>
			</dl>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div>


<?php }} ?>