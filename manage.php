<?php 
	require("www2-funcs.php");
	login_init();
	if ($currentuser["userid"]!="dsj"&& $currentuser["userid"]!="tedy"&& $currentuser["userid"]!="davidxn")
	{	
		html_error_quit("��û��Ȩ�޲鿴��ҳ!");
	}
	else
	{
?>
�人��ѧ����ɽˮBBSվ--����ҳ��
<hr color="green">
<form method="post" name="manageid" action="managedeal.php">
ID��ѯ��:<br>
�������ѯID:<input name="searchid" type="text" size=12><br>
<input type="submit" value="�ύ"><input type="reset">
</form>
<br>
<form method="post" name="managedate" action="managedeal.php">
ʱ���ѯ��:<br>
�������ѯʱ��:<input name="searchyear" type="text" maxlength=4 size=4>��<input name="searchmonth" type="text" maxlength=2 size=2>��<input name="searchday" type="text" maxlength=2 size=2>��<br>
<input type="submit" value="�ύ"><input type="reset" value="����">
</form>
<br>
<form method="post" name="managexh" action="managedeal.php">
ѧ�Ų�ѯ:<br>
������ѧ��:<input name="searchxh" type="text" maxlength=13 size=13><br>
<input type="submit" value="�ύ"><input type="reset" value="����">
</form>
<br>
</body>
</html>
<?php
	}
?>
