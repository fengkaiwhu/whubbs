<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-22 22:12:31
         compiled from "./templates/usermanagemenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1376002969549826cf9f6a71-38686265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f053c928514f9d15ad3cf6a6eba486c43aff92a' => 
    array (
      0 => './templates/usermanagemenu.tpl',
      1 => 1419227690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1376002969549826cf9f6a71-38686265',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_549826cfa43599_87724811',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549826cfa43599_87724811')) {function content_549826cfa43599_87724811($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>'hello'), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("right.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="votecontainer">

<?php echo $_smarty_tpl->getSubTemplate ("ad.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<?php echo $_smarty_tpl->getSubTemplate ("childnav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<table class="table" border="1">
    <tbody>
        <tr align="center">
            <td width="28%" valign="top">
                <table class="table">
                    <tbody>
                        <tr>
                            <th height="25">用户头像</th>
                        </tr>
                        <tr align="center">
                            <td >
                                <img src="img/userface/image1.gif" align="absmiddle/"></td>
                        </tr>
                        <tr>
                            <th height="25">基本信息</th>
                        </tr>
                        <tr>
                            <td align="left" valign="top">用户昵称： E时代专家<br>
                                用户等级： 用户<br>
                                用户门派： 3.14<br>
                                帖数总数： 7<br>
                                注册时间： 2014-11-24 10:18:33<br>
                                登录次数： 43<br>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!--
<br>
<table align=center style="width:100%" height=100% cellspacing=1 cellpadding=6 class=TableBorder1>
<tr><th height=25>好友在线</th></tr>
<tr align=center><td class=TableBody1 align=left>快添加您的好友吧！</td></tr>
<tr><td height=25 class=TableBody2>＊点击图标给好友发送短讯！</td></tr>
</table>-->
            </td>

            <td valign="top">
                <table class="table" border="1">
                    <tbody>
                        <tr>
                            <th height="25" align="left">-=&gt; 用户个人邮箱</th>
                        </tr>
                        <tr>
                            <td>目前您没有新的信件，<a href="usermailbox.php?boxname=inbox"><font color="#FF0000">收件箱</font></a>中共有 <b>[1]</b> 条信息，<a href="usermailbox.php?boxname=sendbox"><font color="#FF0000">发件箱</font></a>中共有 <b>[0]</b> 条信息。<br>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>

                <table  class="table" border="1">
                    <tbody>
                        <tr>
                            <th colspan="5" height="25" align="left">-=&gt; 最新收到的信件</th>
                        </tr>
                        <tr>
                            <td align="center" valign="middle" width="8%" class="TableTitle2"><b>状态</b></td>
                            <td align="center" valign="middle" width="16%" class="TableTitle2"><b>发件人</b></td>
                            <td align="center" valign="middle" width="*" class="TableTitle2"><b>主题</b></td>
                            <td align="center" valign="middle" width="16%" class="TableTitle2"><b>日期</b></td>
                            <td align="center" valign="middle" width="12%" class="TableTitle2"><b>大小</b></td>
                        </tr>
                        <tr>
                            <td align="center" valign="middle" colspan="6">您的收件箱中没有任何内容。</td>
                        </tr>
                    </tbody>
                </table>
                <br>

                <table class="table" border="1">
                    <tbody>
                        <tr>
                            <th height="25" align="left">-=&gt; 个人搜索</th>
                        </tr>
                        <tr>
                            <td align="center" class="TableTitle2">
                                <a href="queryresult.php?querySelf=1">
                                <font color="#FF0000">搜索我发表的主题</font>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
            </td>
        </tr>
    </tbody>
</table>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
