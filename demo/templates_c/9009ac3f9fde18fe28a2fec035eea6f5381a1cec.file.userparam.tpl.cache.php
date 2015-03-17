<?php /* Smarty version Smarty-3.1.18, created on 2014-12-21 09:56:01
         compiled from ".\templates\userparam.tpl" */ ?>
<?php /*%%SmartyHeaderCode:298154956ccc65cfe8-14758316%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9009ac3f9fde18fe28a2fec035eea6f5381a1cec' => 
    array (
      0 => '.\\templates\\userparam.tpl',
      1 => 1419152064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '298154956ccc65cfe8-14758316',
  'function' => 
  array (
  ),
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54956ccc6da006_68215813',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54956ccc6da006_68215813')) {function content_54956ccc6da006_68215813($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('title'=>'foo'), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("right.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>




<div class="votecontainer">
<?php echo $_smarty_tpl->getSubTemplate ("ad.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>



<?php echo $_smarty_tpl->getSubTemplate ("childnav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<form action="saveuserparam.php" method=POST name="theForm">
        <table cellpadding=3 cellspacing=1 border="1" align=center class="table">
            <tr> 
                  <th colspan="2" width="100%">用户个人参数</th>
             </tr> 
            <tr>
                    <td width="40%" ><B>让好友呼叫</B>：<BR>当呼叫器关闭时是否允许好友呼叫</td>   
                    <td width="60%">    
            			<input type="radio" name="user_define_6" value="1" checked >是			
                        <input type="radio" name="user_define_6" value="0"  >否        
                    </td>   
            </tr>
            <tr>
                    <td width="40%"><B>接受所有人的讯息</B>：<BR>是否允许所有人给您发短消息？</td>   
                    <td width="60%">    
            			<input type="radio" name="user_define_15" value="1" checked >是		
                        <input type="radio" name="user_define_15" value="0"  >否       
                    </td>   
            </tr>
            <tr>    
                    <td width="40%"><B>接受好友的讯息</B>：<BR>是否好友给您发短消息？</td>   
                    <td width="60%">    
            			<input type="radio" name="user_define_16" value="1" checked >是			<input type="radio" name="user_define_16" value="0"  >否        
                    </td>   
            </tr>
            <tr>
                    <td width="40%" ><B>收到讯息发出声音</B>：<BR>收到短信后是否以声音提醒您？</td>   
                    <td width="60%" >    
            			<input type="radio" name="user_define_17" value="1" checked >是			
                        <input type="radio" name="user_define_17" value="0"  >否        
                    </td>   
            </tr>
            <tr>
                    <td width="40%"><B>显示详细用户信息</B>：<BR>是否允许他人看到您的性别、生日、联系方式等资料</td>   
                    <td width="60%">    
            			<input type="radio" name="user_define_29" value="1" checked >允许		
                    	<input type="radio" name="user_define_29" value="0"  >不允许        
                    </td>   
            </tr>
            <tr>
                    <td width="40%"><B>显示真实用户信息</B>：<BR>是否允许他人看到您的真实姓名、地址等资料</td>   
                    <td width="60%">    
            			<input type="radio" name="user_define_30" value="1"  >允许	
                    	<input type="radio" name="user_define_30" value="0" checked >不允许       
                    </td>   
            </tr>
            <tr>
                    <td width="40%"><B>隐藏 IP</B>：<BR>是否发文和被查询的时候隐藏自己的 IP 信息</td>   
                    <td width="60%">    
            			<input type="radio" name="user_define1_0" value="1" checked >隐藏		
                    	<input type="radio" name="user_define1_0" value="0"  >不隐藏       
                     </td>   
            </tr>
            <tr>
                    <td width="40%"><B>发信时保存信件到发件箱</B>：<BR>是否发信时自动选择保存到发件箱</td>   
                    <td width="60%">    
            			<input type="radio" name="mailbox_prop_0" value="1" checked >保存		
                    	<input type="radio" name="mailbox_prop_0" value="0"  >不保存       
                    </td>   
            </tr>
            <tr>
                    <td width="40%" ><B>删除信件时不保存到垃圾箱</B>：<BR>是否删除信件时不保存到垃圾箱</td>   
                    <td width="60%" >    
            			<input type="radio" name="mailbox_prop_1" value="1"  >不保存	
                		<input type="radio" name="mailbox_prop_1" value="0" checked >保存      
                    </td>   
            </tr>
            <tr align="center"> 
                <td colspan="2" width="100%" class=TableBody2>
                     <input type=Submit value="更 新" name="Submit" class="btn-info"> &nbsp;
                     <input type="reset" name="Submit2" value="清 除" class="btn-danger">
                </td>
            </tr>
        </table>
</form>

</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>
<?php }} ?>
