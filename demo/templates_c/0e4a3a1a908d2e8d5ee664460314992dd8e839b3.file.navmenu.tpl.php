<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-22 14:00:46
         compiled from "./templates/navmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4748096325497aab8868795-76699814%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e4a3a1a908d2e8d5ee664460314992dd8e839b3' => 
    array (
      0 => './templates/navmenu.tpl',
      1 => 1419227690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4748096325497aab8868795-76699814',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5497aab886ae60_83934436',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5497aab886ae60_83934436')) {function content_5497aab886ae60_83934436($_smarty_tpl) {?><table class="table" border="1">
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
