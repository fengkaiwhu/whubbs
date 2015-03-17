<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-22 20:10:21
         compiled from "./templates/sendemail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5577570565497aab87e1539-18192520%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd295b9212491c857249785af84facf0bf5412b0b' => 
    array (
      0 => './templates/sendemail.tpl',
      1 => 1419227690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5577570565497aab87e1539-18192520',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5497aab8861be4_55472383',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5497aab8861be4_55472383')) {function content_5497aab8861be4_55472383($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>'foo'), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("right.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="usermailcontainer">

<?php echo $_smarty_tpl->getSubTemplate ("ad.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<?php echo $_smarty_tpl->getSubTemplate ("navmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



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


<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
