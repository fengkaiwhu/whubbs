<?php
	//�ļ���:bbsidentify.php
	//����:ʵ����֤
	//����:�����
?>
<?php
require("funcs.php");
login_init();
if ($currentuser["userid"]=="guest")
	html_error_quit("guest �û�������֤�����½id");
if  ($currentuser["userlevel"]&BBS_PERM_LOGINOK)
	html_error_quit("���Ѿ�ͨ����֤!");	
html_init("gb2312","","",1);
?>
�人��ѧ����ɽˮBBSվ -- ʵ����֤ע�ᵥ
<hr color=green>
<?php echo $currentuser["userid"];?>���, ����ʵ��ϸ��д���¸�������, ������ͨ���󼴿ɻ�ñ�վע���û��ĸ���Ȩ��.ע�⣺����Ѿ�ʵ����ID���벻Ҫ�ظ�ʵ��������ʧȥ������Ϣ<br /><br />

<table border="0" style="font-size:12px">
<form method=post action=regidentify.php><tr><td>
  *��ʵ����:</td><td>
  <input name="name" type=text maxlength=8 size=8 value='<?php echo $currentuser["realname"];?>'>
  (��������)</td></tr><tr><td>
  *ѧ��: </td><td>
  <input name="swnum" size=32>
  (����������ѧ��֤��)</td></tr><tr><td>
  *���֤��:</td><td>
  <input name="idcard" size=32>
  (�������������֤��)</td></tr><tr><td>
  <!--*��֤����: <input name="regpass" size=32 type="password"> (������Ϊ��֤�����,��һ����֤����)<br>-->
  ѧУϵ��:</td><td>
  <input name="dept" type=text maxlength=32 size=32>
  (����дѧУ��ϵ���꼶)</td></tr><tr><td>
  ��ס��ַ:</td><td>
  <input name="address" type=text maxlength=32 size=32 value=''>
  (����ϸ��д���ľ�ס��ַ, �������һ����ƺ���)</td></tr><tr><td>
  ����绰:</td><td>
  <input name="phone" type=text maxlength=32 size=32>
  (��������ĵ绰)</td></tr><tr><td colspan="2">
  <input name="bbsid" type=hidden value=<?php echo $currentuser["userid"]; ?>>
  <input name="regdate" type=hidden value=<?php echo date("Ymd"); ?>>

  <input type=submit value="�ύ">
  <input type=reset></td></tr>
</form>
</table>
<br>
<br>
<a href="regfaq.html">ʵ��ע��FAQ</a>
<?php
html_normal_quit();
?>
