<?php /* Smarty version Smarty-3.1.18, created on 2014-12-19 17:22:53
         compiled from ".\templates\answer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19545491affeb3bed7-48214133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab6fa0a9198c5c25bee58e174ca63fb64c5add99' => 
    array (
      0 => '.\\templates\\answer.tpl',
      1 => 1419006168,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19545491affeb3bed7-48214133',
  'function' => 
  array (
  ),
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5491affecd61b8_76420166',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5491affecd61b8_76420166')) {function content_5491affecd61b8_76420166($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('title'=>'foo'), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>



<?php echo $_smarty_tpl->getSubTemplate ("left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("right.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<br />
	<div class="mcontainer">
		<div class="mmcontainer">

		<div class="panel panel-primary" id="votebase">
			  <div class="panel-heading"><b>发表新帖子</b></div>
			  

			  <table class="table">
			  	<tr>
			  	<!--
			  		<td>主题标题：
						 <SELECT name=font onchange=DoTitle(this.options[this.selectedIndex].value) class="dropdown">
			              <OPTION selected value="">选择话题</OPTION> <OPTION value=[原创]>[原创]</OPTION> 
			              <OPTION value=[转帖]>[转帖]</OPTION> <OPTION value=[灌水]>[灌水]</OPTION> 
			              <OPTION value=[讨论]>[讨论]</OPTION> <OPTION value=[求助]>[求助]</OPTION> 
			              <OPTION value=[推荐]>[推荐]</OPTION> <OPTION value=[公告]>[公告]</OPTION> 
			              <OPTION value=[注意]>[注意]</OPTION> <OPTION value=[贴图]>[贴图]</OPTION>
			              <OPTION value=[建议]>[建议]</OPTION> <OPTION value=[下载]>[下载]</OPTION>
			              <OPTION value=[分享]>[分享]</OPTION></SELECT>

			  		</td>

			  		-->
					<td><b>主题标题：</b>
			  		<div class="btn-group">
					  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
					    话 题<span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
					    
					    <li><a href="#">[原创]</a></li>
					    <li><a href="#">[转帖]</a></li>
					     <li><a href="#">[灌水]</a></li>
					    
					    <li><a href="#">[求助]</a></li>
					    <li><a href="#">[下载]</a></li>
					  </ul>
					</div>
					</td>

			  		<td>
			  			<input class="form-control" width="" name="subject" value=""><font color=#ff0000><strong>*</strong></font>不得超过 25 个汉字或50个英文字符
			  			  
			  		</td>
			  	</tr>
			  	<tr>
			  		<td>文件上传</td>
			  		<td>
			  			
			  			<iframe name="ad" frameborder=0 width=100% height=24 scrolling=no src="postupload.php?board="></iframe>
			  		</td>
			  	</tr>
				<tr>
			  		<td width="20%" valign="top" class="TableBody1">
			  			<b>内容</b>
			  		</td>
			        <td width="80%" class="TableBody1">

			          <textarea class="smallarea" cols="95" name="Content" id="oArticleContent" rows="12" wrap="VIRTUAL" title="IE中可以使用Ctrl+Enter直接提交贴子" class="FormClass" resize="none" onkeydown="ctlent()">

			          </textarea>
			        </td>
			  	</tr>
				<tr>
			  		   <td class=TableBody1 valign=top colspan=2 style="table-layout:fixed; word-break:break-all"><b>点击表情图即可在帖子中加入相应的表情</B><br>

              </td>
			  	</tr>
				<tr>
			  		<td valign=top class=TableBody1>
			  			<b>选项</b>
			  		</td>
                	<td valign=middle class=TableBody1>&nbsp;
                	<!--
                	<select name="signature">
		                <option value="0" selected="selected">不使用签名档</option>
		                <option value="0">不使用签名档</option>
		                <option value="<<?php ?>?php echo $i; ?<?php ?>>" selected="selected">第 <<?php ?>?php echo $i; ?<?php ?>> 个</option>
		                <option value="<<?php ?>?php echo $i; ?<?php ?>>">第 <<?php ?>?php echo $i; ?<?php ?>> 个</option>
		                <option value="-1" <<?php ?>?php if ($currentuser["signature"] < 0) echo "selected "; ?<?php ?>>>随机签名档</option>
		            </select>
					<BR><BR>
					-->
					<div class="btn-group">
					  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
					    签名档 <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
					   
					    <li><a href="#">不使用</a></li>
					    <li><a href="#">使用</a></li>
					    
					  </ul>
					</div>

					</td>
			  	</tr>  

				<tr class="panel-footer">
					<td valign=middle colspan=2 align=center class=TableBody2>
					<input type=Submit value='请填写验证码后发表' name=Submit id="oSubmit" disabled = true class="btn-success"> 
					&nbsp;&nbsp;&nbsp;
					<input type="button" value='预 览' name=preview onclick=gopreview() class="btn-info">
                </td></form></tr>	

			  </table>
				
				
				</div>

			  </div>
			</div>

	
	






<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php }} ?>
