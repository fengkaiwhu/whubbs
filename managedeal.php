<?php
	require("www2-funcs.php");
	login_init();
	@$id=addslashes(trim($_POST["searchid"]));
	@$year=addslashes(trim($_POST["searchyear"]));
	@$month=addslashes(trim($_POST["searchmonth"]));
	@$day=addslashes(trim($_POST["searchday"]));
	@$xh=addslashes(trim($_POST["searchxh"]));
function checktime($year,$month,$day)
{
	if (is_numeric($year) && is_numeric($month) && is_numeric($day))
  	{
		if ((strlen($year)!=4) || (strlen($month)!=2) || (strlen($day)!=2) || (intval($month)>12) || (intval($day)>31))
		{
		show_msg("��ʽ����(��:2005 09 18)",1);
		exit;
		}
	}
	else
	{
		show_msg("����д����(��:2005 09 18)",1);
		exit;
	}
}
function check_mysql()
{
	if (mysql_error()>0)
		die("<br>.Mysql error".mysql_errno().":".mysql_error());
		return;
}
function show_msg($msg,$sh)
{
	echo "<font size=2>�人��ѧ����ɽˮBBSվ--��ѯ����<hr color=green></font>";
	echo "<font size=2>".$msg."</font><br><br>";
	if ($sh)
	echo "<font size=2><a href='javascript:history.go(-1)'>[������һҳ]</a></font>";
	return;
}
?>
<?php

	$hostname="localhost";
	$username="whubbs";
	$password="bbswebwhu";
	$link=mysql_connect($hostname,$username,$password);	
	mysql_query("set names 'latin1_swedish_ci'"); 
	if (!$link)
		check_mysql();
	if(!mysql_select_db("whuinfo",$link))
		check_mysql();
	if($id!='')
	{
		show_msg("",0);
		$sqlstr="select * from bbsinfo where bbsid='".$id."'";
		if (!($result=mysql_query($sqlstr)))
		check_mysql();
		$row=mysql_fetch_array($result,MYSQL_NUM);
	        ?>
		<table cellspacing="0" cellpadding="0" width=100% border=1>
		<tr>
		<td align="center">bbs�û���</td>
		<td align="center">ѧ��/���ʺ�</td>
		<td align="center">���֤����</td>
		<td align="center">����</td>
		<td align="center">���ڲ���</td>
		<td align="center">ͨѶ��ַ</td>
		<td align="center">��ϵ�绰</td>
		</tr>
		<tr>
		<?php
			for ($i=0;$i<7;$i++)
			echo "<td align=center>".$row[$i]."</td>";
		?>
		</tr>
		</table>
	<?php	
	}
	elseif ($xh!='')
	{
		//����ѧ�Ų�ѯ
		show_msg("",0);
		$sqlstr="select * from bbsinfo where swnum='".$xh."'";
		if (!($result=mysql_query($sqlstr)))
		check_mysql();
		//$row=mysql_fetch_array($result,MYSQL_NUM);
	        ?>
		<table cellspacing="0" cellpadding="0" width=100% border=1>
		<tr>
		<td align="center">bbs�û���</td>
		<td align="center">ѧ��/���ʺ�</td>
		<td align="center">���֤����</td>
		<td align="center">����</td>
		<td align="center">���ڲ���</td>
		<td align="center">ͨѶ��ַ</td>
		<td align="center">��ϵ�绰</td>
		</tr>
		<?php
			while ($row=mysql_fetch_array($result,MYSQL_NUM))
			{
				echo "<tr>";
				for ($i=0;$i<7;$i++)
				echo "<td align=center>".$row[$i]."</td>";
				echo "</tr>";
				}
		?>
		</table>
		<?php
		
	}
	else
	{
	   checktime($year,$month,$day);	
	   $date=$year.$month.$day;
	   $sqlstr="select * from bbsinfo where regdate='".$date."'";
	   show_msg("",0);
	   if (!($result=mysql_query($sqlstr)))
	     check_mysql();
		?>
		<table cellspacing="0" cellpadding="0" width=100% border=1>
		<tr>
		<td align="center">bbs�û���</td>
		<td align="center">ѧ��/���ʺ�</td>
		<td align="center">���֤����</td>
		<td align="center">����</td>
		<td align="center">���ڲ���</td>
		<td align="center">ͨѶ��ַ</td>
		<td align="center">��ϵ�绰</td>
		<td align="center">��֤ʱ��</td>
		</tr>
		<?php
		while ($row=mysql_fetch_array($result,MYSQL_NUM))
		{
			echo "<tr>";
			for ($i=0;$i<8;$i++)
			echo "<td align=center>".$row[$i]."</td>";
			echo "</tr>";
		}
		?>
		</table>	
	<?php } ?>

