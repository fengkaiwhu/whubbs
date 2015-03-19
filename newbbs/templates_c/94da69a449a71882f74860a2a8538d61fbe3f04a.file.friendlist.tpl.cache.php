<?php /* Smarty version Smarty-3.1.18, created on 2014-12-21 09:52:57
         compiled from ".\templates\friendlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2503654957065361f96-88258004%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94da69a449a71882f74860a2a8538d61fbe3f04a' => 
    array (
      0 => '.\\templates\\friendlist.tpl',
      1 => 1419151971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2503654957065361f96-88258004',
  'function' => 
  array (
  ),
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_549570653d72b0_45619723',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549570653d72b0_45619723')) {function content_549570653d72b0_45619723($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('title'=>'foo'), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("right.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<script type="text/javascript">
<!--
    writeStyleSheets();
    //-->
</script>
</head>
<script language="javascript">
<!--
    var siteconf_SMS_SUPPORT = 0;
    var siteconf_BOARDS_PER_ROW = 3;
    var siteconf_SHOW_POST_UNREAD = 1;
    var siteconf_THREADSPERPAGE = 15;
    defineMenus();
    //-->
</script>


<div class="votecontainer">
    <?php echo $_smarty_tpl->getSubTemplate ("ad.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>



    <br />
    <?php echo $_smarty_tpl->getSubTemplate ("childnav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

    <script language="JavaScript">
<!--
    initTime(1419080923);
    //-->
    </script>
    <br />
    <!--
<table class="table">
<tr>
<th width=14% height=25 id=TableTitleLink><a href=usermanagemenu.php>控制面板首页</a></th>
<th width=14%  id=TableTitleLink><a href=modifyuserdata.php>基本资料修改</a></th>
<th width=14%  id=TableTitleLink><a href=changepasswd.php>昵称密码修改</a></th>
<th width=14%  id=TableTitleLink><a href=userparam.php>用户自定义参数</a></th>
<th width=14%  id=TableTitleLink><a href=usermailbox.php>用户信件服务</a></th>
<th width=14%  id=TableTitleLink><a href=friendlist.php>编辑好友列表</a></th>
<th width=14%  id=TableTitleLink><a href=modifyfavboards.php>收藏版面管理</a></th>
</tr>
</table>
-->

    <?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


    <br>
    <table cellpadding="3" cellspacing="1" align="center" class="table" border="1">
        <tr>
            <th valign="middle" width="10%" height="25">序号</th>
            <th valign="middle" width="20%">用户账号</th>
            <th valign="middle" width="*">好友说明</th>
            <th valign="middle" width="10%">操作</th>
        </tr>
        <tr>
            <td align="right" valign="middle" colspan="4" class="TableBody2">
                <font color="gray">[第一页]</font>
                <font color="gray">[上一页]</font>
                <font color="gray">[下一页]</font>
                <font color="gray">[最后一页]</font>
                <br>
                您共有 <b>0</b> 位好友。
            </td>
        </tr>
    </table>
    <form method="GET" action="friendlist.php">
        <table align="center">
            <tr>
                <td>
                    <input type="text" name="addfriend">&nbsp;<input type="submit" name="submit" value="添加好友">
                </td>
            </tr>
        </table>
    </form>


</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<?php }} ?>
