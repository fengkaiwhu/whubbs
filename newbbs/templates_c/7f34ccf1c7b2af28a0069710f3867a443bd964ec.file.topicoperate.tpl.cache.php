<?php /* Smarty version Smarty-3.1.18, created on 2014-12-23 16:55:44
         compiled from ".\templates\topicoperate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7295549671f3476e56-37605033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f34ccf1c7b2af28a0069710f3867a443bd964ec' => 
    array (
      0 => '.\\templates\\topicoperate.tpl',
      1 => 1419350141,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7295549671f3476e56-37605033',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_549671f347acd3_31437175',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549671f347acd3_31437175')) {function content_549671f347acd3_31437175($_smarty_tpl) {?>            <table width="100%">
                            <tbody>
                                <tr>
                                    <td width="*">
                                        <a href="queryresult.php">
                                            <img src="img/pic/find.png" border="0" title="搜索DarkTemplar在本版的所有贴子">
                                        </a>&nbsp;
                                        <a href="sendmail.php?board=WHU&amp;reID=1105563173">
                                            <img title="点击这里发送信件给DarkTemplar" border="0" src="img/pic/email.png">
                                        </a>&nbsp;
                                        <a href="editarticle.php?board=WHU&amp;reID=1105563173">
                                            <img src="img/pic/share.png" border="0" title="分享"></a>&nbsp;

                                        <a href="deletearticle.php?board=WHU&amp;ID=1105563173" onclick="return confirm('你真的要删除本文吗?')">
                                            <img src="img/pic/delete.png" border="0" title="删除"></a>&nbsp;
                                        <a href="postarticle.php?board=WHU&amp;reID=1105563173">
                                            <img src="img/pic/response.png" border="0" title="回复这个贴子">
                                        </a>
                                        &nbsp;
                                        <a href="postarticle.php?board=WHU&amp;reID=1105618537">
                                            <img src="img/pic/zan.png" border="0" title="赞贴子">
                                        </a>
                                        &nbsp;
                                        <a href="./collect.php">
                                            <img src="img/pic/collect.png" border="0" title="收藏贴子">
                                        </a>

                                    </td>
                                    <td width="50">
                                        <b>楼主</b></td>
                                </tr>
                                <tr>
                                    <td bgcolor="#D8C0B1" height="1" colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
<?php }} ?>
