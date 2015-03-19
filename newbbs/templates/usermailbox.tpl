
{config_load file="test.conf" section="setup"}
{include file="base.tpl" title=foo}

{include file="header.tpl"}
{include file="left.tpl"}
{include file="right.tpl"}
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
{include file="ad.tpl"}
<br />
{include file="childnav.tpl"}
<script language="JavaScript">
<!--
	initTime(1419080923);
//-->
</script>
<br/>
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

{include file="navmenu.tpl"}

<br>
<form action="usermailoperations.php" method=post id="oForm">
	<input type="hidden" name="boxname" value="inbox">
	<table class="table" border="1">
	<tr>
		<th>已读</th>
		<th>发件人</th>
		<th>主题</th>
		<th>日期</th>
		<th>大小</th>
		<th>删除</th>
	</tr>
	<tr>
		<td>
			re
		<td>
			<a href="dispuser.php?id=deliver" target=_blank>deliver</a>
		</td>
		<td>
			<a href="usermail.php?boxname=inbox&num=0"> 致新注册用户的信 致新注册用户的信 致新注册用户的信 </a></td>
		<td>
			2014-11-24 10:18:33
		</td>
		<td>
			5341
		</td>
		<td>
			<input type="checkbox" name=num id="num" value=0>
		</td>
	</tr>
	<tr> 

		<td  align=right valign=middle colspan=6 class=TableBody2>
		您现在已使用了5K邮箱空间，共有1封信&nbsp;
		<font color=gray>[第一页]</font>
		<font color=gray>[上一页]</font>
		<font color=gray>[下一页]</font>
		<font color=gray>[最后一页]</font>
		<br>
		<input type="hidden" name="action" id="Action">
		<input type="hidden" name="nums" id="nums">

		<input type=checkbox name=chkall value=on onclick="CheckAll(this.form)">选中所有显示信件&nbsp;
		<!--<input type=button onclick="doAction('确定锁定/解除锁定选定的纪录吗?','lock');" value="锁定信件">&nbsp;-->
		<input type=button onclick="doAction('确定删除选定的纪录吗?','delete');" value="删除信件">&nbsp;
		<input type=button onclick="doAction('确定清除收件箱所有的纪录吗?','deleteAll');" value="清空收件箱">
		</td> 
	</tr>
 </table>
</form>


<table cellspacing=1 cellpadding=3 width="97%" border=0 align=center>
	<tr>
		<td align=center>
			<img src="img/pic/m_news.gif" align="absmiddle">&nbsp;未读邮件&nbsp
			<img src="img/pic/m_olds.gif" align="absmiddle">&nbsp;已读邮件&nbsp
			<img src="img/pic/m_replys.gif" align="absmiddle">&nbsp;已回复邮件&nbsp;
			<img src="img/pic/m_newlocks.gif" align="absmiddle">&nbsp;锁定的未读邮件&nbsp;
			<img src="img/pic/m_oldlocks.gif" align="absmiddle">&nbsp;锁定的已读邮件&nbsp;
			<img src="img/pic/m_lockreplys.gif" align="absmiddle">&nbsp;锁定的已回复邮件
		</td>
	</tr>
</table>

<br>
<p>
<table cellSpacing="0" cellPadding="0" border="0" align="center">
<tr>
	<!--<td align="center">
	    <a href="http://wforum.aka.cn/" target="_blank"><img border="0" src="images/wforum.gif"/></a>
		<a href="http://dev.kcn.cn/" target="_blank"><img border="0" src="images/poweredby.gif"/></a>&nbsp;&nbsp;<br/>
		<nobr>Powered by wForum Version 0.9</nobr>
	</td>-->
	
</tr>
<tr>

</div>
{include file="footer.tpl"}
