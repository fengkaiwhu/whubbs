<?php /* Smarty version Smarty-3.1.18, created on 2014-12-21 11:45:17
         compiled from ".\templates\preview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:51845496a4b16d6756-85807241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c63c5cc88445914080bb36eae79b835822ec0a2' => 
    array (
      0 => '.\\templates\\preview.tpl',
      1 => 1419158715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '51845496a4b16d6756-85807241',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5496a4b174ba74_39618947',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5496a4b174ba74_39618947')) {function content_5496a4b174ba74_39618947($_smarty_tpl) {?>
<?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('title'=>'foo'), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("right.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<div class="usermailcontainer">


<?php echo $_smarty_tpl->getSubTemplate ("ad.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>



<table class="table">
    <tbody>
        <tr>
            <th height="25">帖子预览</th>
        </tr>
        <tr>
            <td class="TableBody1" height="24"><b>Re: 我们居然捡到了Iphone！！！！ </b></td>
        </tr>
    </tbody>
</table>


<table class="table">
    <tbody>
        <tr>
            <td>点个赞
 <br>
                <img src="img/emot/em07.gif" border="0" align="middle"></td>
        </tr>
    </tbody>
</table>


</div>


<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>
<?php }} ?>
