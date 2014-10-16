<?php /* Smarty version Smarty-3.1.12, created on 2013-02-09 23:22:57
         compiled from "E:\lamp\apache\htdocs\SmartyMVC\Tpl\Index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30185511669d139afe8-66922718%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e29cc454933c412ee9b5076a3591486c6aeba51' => 
    array (
      0 => 'E:\\lamp\\apache\\htdocs\\SmartyMVC\\Tpl\\Index\\index.tpl',
      1 => 1360423067,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30185511669d139afe8-66922718',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
    'i' => 0,
    'vo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_511669d14a8236_28186707',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511669d14a8236_28186707')) {function content_511669d14a8236_28186707($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>shopp管理系统</title>
<link rel="stylesheet" type="text/css" href="templates/admin/css/basic.css" />
<link rel="stylesheet" type="text/css" href="templates/admin/css/admin.css" />
<script type="text/javascript" src="templates/admin/js/iframe.js" ></script>
<script type="text/javascript" src="templates/admin/js/channel.js" ></script>

</head>
<body>

<form method="post" action="">
	<input type="text" name="user" /> 
	<br />
	<input type="text" name="pass" /> <input type="text" name="level" /> 
	<br />
	<input type="submit" value="提交" /> 
	
</form>

<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['content']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['vo']->key;
?> 
<p><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</p>
<p><?php echo $_smarty_tpl->tpl_vars['vo']->value->id;?>
</p>
<p><?php echo $_smarty_tpl->tpl_vars['vo']->value->user;?>
</p>
<?php } ?>



</body>
</html><?php }} ?>