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
&nbsp;&nbsp;&nbsp;<b>�𾴵�<?php echo $currentuser["userid"]; ?>�����ã���ӭ����<?php echo BBS_FULL_NAME; ?></b>
<br />
&nbsp;&nbsp;&nbsp;��վ���û�����ʵ������,ֻ��ͨ��ʵ����֤���û����з���Ȩ��,δʵ����֤���û�ֻ�������ʵ���������£�
<br /><br />
<ol>
<?php
	if (defined("HAVE_ACTIVATION")) {
?>
<li>�����ʻ���������������ע�������ڣ��������δ�յ���վ�����ļ����룬��<a href="bbssendacode.php">����˴����·��ͼ�����</a>��</li>
<li>��Ϥһ�±�վ�Ļ������� <?php echo MIN_REG_TIME; ?> Сʱ����дע�ᵥ��</li>
<?php
	}
?>
<li>����ʵ����֤���з�Χ: ��Уѧ��(��ͨ���������о���)��</li>
</li>
<li>webʵ��:���½��վ,�����"���˲�������"���е�"ʵ����֤"����ʵ��д����,ѧ��,���֤��,ϵͳ�����������������Զ�����ʵ����֤��<a href="bbsidentify.php"><font color="red">������д</font></a></li>
<li>telnetʵ��:ʹ��telnet���ߵ�½��վ���ڹ���������дע�ᵥ����ʵ����
<li>δ��ͨ������ʵ����֤��ͬѧ������й�֤��(ѧ��֤)ǰ���������ѧ��÷԰һ���¥������Ϣ����칫��, ����ʵ��������
</li>
</ol>
&nbsp;&nbsp;&nbsp;�������Ҫ��������������<a href="bbsdoc.php?board=BBShelp">BBSʹ������</a>��������<br /><br />
<?php
html_normal_quit();
?>
