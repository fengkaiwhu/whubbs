<?php /* Smarty version Smarty-3.1.18, created on 2014-12-21 08:28:52
         compiled from ".\templates\navmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23751549676b436fa29-88487842%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35c0ab8342d9858c7148d361b681ef0046705bf4' => 
    array (
      0 => '.\\templates\\navmenu.tpl',
      1 => 1419146890,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23751549676b436fa29-88487842',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_549676b436fa20_64894959',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549676b436fa20_64894959')) {function content_549676b436fa20_64894959($_smarty_tpl) {?><table class="table" border="1">
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
