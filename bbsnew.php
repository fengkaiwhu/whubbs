<?php
require("funcs.php");
login_init();

if ($loginok != 1)
{
	html_nologin();
	exit();
}
cache_header("nocache");
if(!strcmp($currentuser["userid"],"guest"))
{
	header("Location: ".MAINPAGE_FILE);
	exit();
}

if($currentuser["userlevel"]&BBS_PERM_LOGINOK )
{
	header("Location: ".MAINPAGE_FILE);
	exit();
}

html_init("gb2312","","",1);
?>
<br /><br /><br />
&nbsp;&nbsp;&nbsp;<b>尊敬的<?php echo $currentuser["userid"]; ?>，您好！欢迎来到<?php echo BBS_FULL_NAME; ?></b>
<br />
&nbsp;&nbsp;&nbsp;本站对用户进行实名管理,只有通过实名认证的用户才有发帖权限,未实名认证的用户只能浏览。实名方法如下：
<br /><br />
<ol>
<?php
	if (defined("HAVE_ACTIVATION")) {
?>
<li>激活帐户，激活码在您的注册信箱内，如果您还未收到本站发出的激活码，请<a href="bbssendacode.php">点击此处重新发送激活码</a>。</li>
<li>熟悉一下本站的环境，在 <?php echo MIN_REG_TIME; ?> 小时后填写注册单。</li>
<?php
	}
?>
<li>网上实名认证试行范围: 在校学生(普通本科生、研究生)；</li>
</li>
<li>web实名:请登陆进站,在左边"个人参数设置"栏中的"实名认证"中如实填写姓名,学号,身份证号,系统将根据这三项资料自动进行实名认证；<a href="bbsidentify.php"><font color="red">立刻填写</font></a></li>
<li>telnet实名:使用telnet工具登陆进站后在工具箱中填写注册单进行实名；
<li>未能通过网上实名认证的同学，请带有关证件(学生证)前往武大文理学部梅园一舍二楼网络信息管理办公室, 办理实名手续。
</li>
</ol>
&nbsp;&nbsp;&nbsp;如果您需要更多帮助，请进入<a href="bbsdoc.php?board=BBShelp">BBS使用求助</a>讨论区。<br /><br />
<?php
html_normal_quit();
?>
