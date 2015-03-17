<?php
include "./dbconnect.php";
include "../www2-funcs.php";

$insertsql = "";
if ($_POST[name] && $_POST[password] && ($_POST[name]!="guest") && bbs_checkpasswd($_POST[name],$_POST[password])==0)
{
	$sql = mysql_query("select count(*) as num from user_ddz where name = '".$_POST[name]."'");
	if(@mysql_result($sql, 0, num)==0)
	{	
		$insertsql = "INSERT INTO `user_ddz` (`ID`, `name`, `password`, `time`, `face`, `win`, `lost`, `run`, `score`) VALUES (NULL, '".$_POST[name]."', '".md5($_POST[password])."', 0, 1, 0, 0, 0, 0);";
		$query = mysql_query($insertsql);
	}
}

if($_POST[name] && $_POST[password])
{
	$sql = mysql_query("select count(*) as num from user_ddz where name = '".$_POST[name]."' and password = '".md5($_POST[password])."'");
	if(@mysql_result($sql, 0, num))
	{
		setcookie(player_name, $_POST[name]);
		setcookie(player_password, md5($_POST[password]));
		header("location:hall.php");
	}else
	message("帐号/密码不正确！", "index.php");
}else
message("请把资料填写完整！", "index.php");
?>