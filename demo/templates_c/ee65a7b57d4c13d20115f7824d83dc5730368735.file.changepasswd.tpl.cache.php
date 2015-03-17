<?php /* Smarty version Smarty-3.1.18, created on 2014-12-21 09:53:49
         compiled from ".\templates\changepasswd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18681549567ce8d5763-92992309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee65a7b57d4c13d20115f7824d83dc5730368735' => 
    array (
      0 => '.\\templates\\changepasswd.tpl',
      1 => 1419151923,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18681549567ce8d5763-92992309',
  'function' => 
  array (
  ),
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_549567ce94aa73_72932471',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549567ce94aa73_72932471')) {function content_549567ce94aa73_72932471($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('title'=>'foo'), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("right.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>




<div class="votecontainer">
    <?php echo $_smarty_tpl->getSubTemplate ("ad.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>



<?php echo $_smarty_tpl->getSubTemplate ("childnav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


    <form action="dochangepasswd.php" method="POST" name="theForm">
        <table cellpadding="3" cellspacing="1" align="center" class="table" border="1">
            <tr>
                <th colspan="2" width="100%">用户昵称
                </th>
            </tr>
            <tr>
                <td width="40%" align="right"><b>您的昵称：</b>
                <td width="60%">
                    <input type="text" name="nick" value="E时代专家" size="24">
                    &nbsp; &nbsp;
      <input type="checkbox" value="1" name="chkTmp">临时修改昵称（在线用户列表中有效）
                </td>
            </tr>
            <tr align="center">
                <td colspan="2" width="100%" class="TableBody2">
                    <input type="Submit" value="修 改" class="btn-info">
                </td>
            </tr>

        </table>
    </form>
    <br>

    <form action="dochangepasswd.php" method="POST" name="theForm">
        <table cellpadding="3" cellspacing="1" align="center" class="table" border="1">
            <tr>
                <th colspan="2" width="100%">用户密码资料
                </th>
            </tr>
            <tr>
                <td width="40%"><b>旧密码确认</b>：<br>
                    如要修改请输入旧密码进入确认</td>
                <td width="60%">
                    <input type="password" name="oldpsw" value="" size="30" maxlength="13">
                </td>
            </tr>
            <tr>
                <td width="40%"><b>新密码</b>：<br>
                    如要修改请直接输入新密码进入更新</td>
                <td width="60%">
                    <input type="password" name="psw" value="" size="30" maxlength="13">
                </td>
            </tr>
            <tr>
                <td width="40%"><b>新密码确认</b>：<br>
                    再输一次新密码防止输入错误</td>
                <td width="60%">
                    <input type="password" name="psw2" value="" size="30" maxlength="13">
                </td>
            </tr>
            <tr align="center">
                <td colspan="2" width="100%">
                    <input type="Submit" value="更 新" name="Submit" class="btn-success">
                    &nbsp; 
            <input type="reset" name="Submit2" value="清 除" class="btn-danger">
                </td>
            </tr>

        </table>
    </form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>
<?php }} ?>
