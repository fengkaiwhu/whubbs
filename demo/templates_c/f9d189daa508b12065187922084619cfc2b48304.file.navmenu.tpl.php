<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-16 20:47:16
         compiled from "./templates/navmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17807913635506d0d4639724-41226365%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9d189daa508b12065187922084619cfc2b48304' => 
    array (
      0 => './templates/navmenu.tpl',
      1 => 1419227690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17807913635506d0d4639724-41226365',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5506d0d464dcd0_68904608',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5506d0d464dcd0_68904608')) {function content_5506d0d464dcd0_68904608($_smarty_tpl) {?><table class="table" border="1">
	<TBODY>
		<tr>
			<td align=center>
				<a href="usermailbox.php?boxname=inbox">
				<img src="img/pic/m_inbox.gif" border=0 title=收件箱>
			</a> &nbsp; 
				<a href="usermailbox.php?boxname=sendbox">
				<img src="img/pic/m_outbox.gif" border=0 title=发件箱>
			</a> &nbsp; 
				<a href="usermailbox.php?boxname=deleted">
				<img src="img/pic/m_recycle.gif" border=0 title=废件箱>
			</a>&nbsp;
				<a href="friendlist.php">
				<img src="img/pic/m_address.gif" border=0 title=地址簿>
				</a>&nbsp;
				<a href="sendmail.php">
				<img src="img/pic/m_write.gif" border=0 title=发送消息>
			</a>
			</td>
	</tr>
	</TBODY>
</table><?php }} ?>
