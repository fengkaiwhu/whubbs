<?php /* Smarty version Smarty-3.1.18, created on 2014-12-21 11:26:27
         compiled from ".\templates\sendemail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1847549674d5c24ad2-48175791%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b4e3e3cc8a36fd1c69205aa066315c28ec6484b' => 
    array (
      0 => '.\\templates\\sendemail.tpl',
      1 => 1419157584,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1847549674d5c24ad2-48175791',
  'function' => 
  array (
  ),
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_549674d5c95f78_83802642',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549674d5c95f78_83802642')) {function content_549674d5c95f78_83802642($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('title'=>'foo'), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("right.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<div class="usermailcontainer">

<?php echo $_smarty_tpl->getSubTemplate ("ad.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>



<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>



<form action="dosendmail.php" method="post" name="messager" id="messager" onkeydown="if(event.keyCode==13 &amp;&amp; event.ctrlKey){ obj=getRawObject('messager');obj.submit();} ">
    <table class="table" border="1">
        <tbody>
            <tr >
                <th colspan="3" class="emailth">
                    回复信件
                </th>
            </tr>
            <tr>
                <td class="TableBody1" valign="middle"><b>收件人:</b></td>
                <td class="TableBody1" valign="middle">
                    <input name="destid" maxlength="12" value="DarkTemplar" size="12" readonly="">
                </td>
            </tr>
            <tr>
                <td class="TableBody1" valign="top" width="15%"><b>标题：</b></td>
                <td class="TableBody1" valign="middle">
                    <input name="title" maxlength="50" size="50" value="Re: 著名谣言和非谣言列表（已更新） ">
                </td>
            </tr>
            <tr>
                <td class="TableBody1" valign="top" width="15%"><b>内容：</b></td>
                <td class="TableBody1" valign="middle">
                    <textarea class="emailcontent" name="content">
                 
                    </textarea>
                </td>
            </tr>
            <tr>
                <td valign="top" class="TableBody1"><b>选项：</b></td>
                <td valign="middle" class="TableBody1">&nbsp;<select name="signature">
                    <option value="0" selected="selected">不使用签名档</option>
                </select>
                    [<a target="_balnk" href="bbssig.php">查看签名档</a>]<br>
                    <input type="checkbox" name="backup" checked="checked">备份到发件箱中
                </td>
            </tr>
            <tr>
                <td class="TableBody2" valign="middle" colspan="2" align="center">&nbsp;
              <input type="Submit" value="发送信件" name="Submit" class="btn-info">
                </td>
            </tr>

        </tbody>
    </table>
</form>

</div>


<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>
<?php }} ?>
