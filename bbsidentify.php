<?php
	//文件名:bbsidentify.php
	//功能:实名验证
	//作者:邹旭军
?>
<?php
require("funcs.php");
login_init();
if ($currentuser["userid"]=="guest")
	html_error_quit("guest 用户不能认证，请登陆id");
if  ($currentuser["userlevel"]&BBS_PERM_LOGINOK)
	html_error_quit("你已经通过认证!");	
html_init("gb2312","","",1);
?>
武汉大学珞珈山水BBS站 -- 实名认证注册单
<hr color=green>
<?php echo $currentuser["userid"];?>你好, 请如实详细填写以下各项内容, 经审阅通过后即可获得本站注册用户的各项权限.注意：如果已经实名该ID，请不要重复实名，以免失去您的信息<br /><br />

<table border="0" style="font-size:12px">
<form method=post action=regidentify.php><tr><td>
  *真实姓名:</td><td>
  <input name="name" type=text maxlength=8 size=8 value='<?php echo $currentuser["realname"];?>'>
  (请用中文)</td></tr><tr><td>
  *学号: </td><td>
  <input name="swnum" size=32>
  (请输入您的学生证号)</td></tr><tr><td>
  *身份证号:</td><td>
  <input name="idcard" size=32>
  (请输入您的身份证号)</td></tr><tr><td>
  <!--*认证密码: <input name="regpass" size=32 type="password"> (此密码为验证身份用,第一次认证设置)<br>-->
  学校系级:</td><td>
  <input name="dept" type=text maxlength=32 size=32>
  (请填写学校、系别、年级)</td></tr><tr><td>
  居住地址:</td><td>
  <input name="address" type=text maxlength=32 size=32 value=''>
  (请详细填写您的居住地址, 包括寝室或门牌号码)</td></tr><tr><td>
  联络电话:</td><td>
  <input name="phone" type=text maxlength=32 size=32>
  (可以联络的电话)</td></tr><tr><td colspan="2">
  <input name="bbsid" type=hidden value=<?php echo $currentuser["userid"]; ?>>
  <input name="regdate" type=hidden value=<?php echo date("Ymd"); ?>>

  <input type=submit value="提交">
  <input type=reset></td></tr>
</form>
</table>
<br>
<br>
<a href="regfaq.html">实名注册FAQ</a>
<?php
html_normal_quit();
?>
