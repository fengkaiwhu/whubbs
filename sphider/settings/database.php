<?php
	$database="sphider_db";
	$mysql_user = "whubbs";
	$mysql_password = "bbswebwhu"; 
	$mysql_host = "localhost";
	$mysql_table_prefix = "";



	$success = mysql_pconnect ($mysql_host, $mysql_user, $mysql_password);
	if (!$success)
		die ("<b>�������ӵ����ݿ⣬�����û���������������Ƿ���ȷ��</b>");
    $success = mysql_select_db ($database);
	if (!$success) {
		print "<b>�������ӵ����ݿ⣬�������ݿ����Ƿ���ȷ��";
		die();
	}
?>

