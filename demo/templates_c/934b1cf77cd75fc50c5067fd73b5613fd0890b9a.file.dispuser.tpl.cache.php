<?php /* Smarty version Smarty-3.1.18, created on 2014-12-21 11:25:01
         compiled from ".\templates\dispuser.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1612454969d2a9a2487-77667932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '934b1cf77cd75fc50c5067fd73b5613fd0890b9a' => 
    array (
      0 => '.\\templates\\dispuser.tpl',
      1 => 1419157220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1612454969d2a9a2487-77667932',
  'function' => 
  array (
  ),
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54969d2aa13918_78338172',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54969d2aa13918_78338172')) {function content_54969d2aa13918_78338172($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('title'=>'foo'), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>



<?php echo $_smarty_tpl->getSubTemplate ("left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("right.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<div class="votecontainer">

<?php echo $_smarty_tpl->getSubTemplate ("ad.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<table class="table">
    <tbody>
        <tr>
            <td>
                <img src="img/userface/image0.gif" align="absmiddle/"><b>qhylyh</b>
            </td>
            <td align="right">
                <b>
                    <a href="sendmail.php?receiver=qhylyh" title="给该用户发信">发信问候</a> | 
                    <a href="friendlist.php?addfriend=qhylyh" title="将该用户添加到好友列表">加为好友</a>
                </b>
            </td>
        </tr>
    </tbody>
</table>

<table class="table" border="1">
    <colgroup>
        <col width="20%">
        <col width="*">
        <col width="40%">
    </colgroup>
    <tbody>
        <tr>
            <th colspan="2" align="left" height="25">基本资料</th>
            <td rowspan="8" align="center"  width="40%" valign="top">
                <font color="gray">无</font></td>
        </tr>
        <tr>
            <td  width="20%" align="right">昵 称：</td>
            <td >samuel </td>
        </tr>

        <tr>
            <td  width="20%" align="right">性 别：</td>
            <td >男 </td>
        </tr>
        <tr>
            <td  width="20%" align="right">星 座：</td>
            <td >
                <img src="img/star/z10.gif" alt="魔羯座">
                魔羯座</td>
        </tr>
        <tr>
            <td  width="20%" align="right">Ｑ Ｑ：</td>
            <td >
                <font color="gray">未知</font></td>
        </tr>
        <tr>
            <td  width="20%" align="right">ＩＣＱ：</td>
            <td >
                <font color="gray">未知</font></td>
        </tr>
        <tr>
            <td width="20%" align="right">ＭＳＮ：</td>
            <td >
                <font color="gray">未知</font></td>
        </tr>
        <tr>
            <td width="20%" align="right">主 页：</td>
            <td >
                <font color="gray">未知</font></td>
        </tr>
    </tbody>
</table>


<table class="table" border="1">
    <tbody>
        <tr>
            <th align="left" colspan="6" height="25">论坛属性</th>
        </tr>
        <tr>
            <td  width="15%" align="right">论坛职务：</td>
            <td width="35%" ><b>站务总监 </b></td>
            <td width="15%" align="right" >帖子总数：</td>
            <td width="35%" ><b>1115</b> 篇</td>
        </tr>
        <tr>
            <td  width="15%" align="right">门  派：</td>
            <td width="35%" ><b>无门无派 </b></td>
            <td  width="15%" align="right">登录次数：</td>
            <td width="35%" ><b>1592</b>
            </td>
        </tr>
        <tr>
            <td  width="15%" align="right">经验值：</td>
            <td width="35%" ><b>4560 </b></td>
            <td  width="15%" align="right">经验等级：</td>
            <td width="35%" ><b>本站元老</b>
            </td>
        </tr>
        <tr>
            <td  width="15%" align="right">生命力：</td>
            <td width="35%" ><b>999</b></td>
            <td width="15%" align="right" >上次登录：</td>
            <td width="35%" ><b>2014-12-19 17:29:02</b></td>
        </tr>
        <tr>
            <td  width="15%" align="right">同门：</td>
            <td width="35%"  colspan="3"><b>
                <a href="dispuser.php?id=0">0</a>&nbsp;&nbsp;&nbsp;<a href="dispuser.php?id="></a>&nbsp;&nbsp;&nbsp;<a href="dispuser.php?id="></a>&nbsp;&nbsp;&nbsp; </b></td>
        </tr>
        <tr>
            <td width="50%"  colspan="2" align="center"><b>目前不在站上</b></td>
            <td width="15%" align="right" >最后来访IP：</td>
            <td width="35%" ><b>202.114.74.*</b></td>
        </tr>
    </tbody>
</table>


<form method="GET" action="dispuser.php">
    <table class="table dispusertablesearch" >
        <tbody>
            <tr>
                <td>请输入用户名:
                    <input type="text" name="id">&nbsp;<input type="submit" value="查询用户" class="btn-info">
                </td>
            </tr>
        </tbody>
    </table>
</form>





</div><?php }} ?>
