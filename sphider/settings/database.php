<?php
	$database="sphider_db";
	$mysql_user = "whubbs";
	$mysql_password = "bbswebwhu"; 
	$mysql_host = "localhost";
	$mysql_table_prefix = "";



	$success = mysql_pconnect ($mysql_host, $mysql_user, $mysql_password);
	if (!$success)
		die ("<b>不能连接到数据库，请检查用户名，密码和主机是否正确。</b>");
    $success = mysql_select_db ($database);
	if (!$success) {
		print "<b>不能连接到数据库，请检查数据库名是否正确。";
		die();
	}
?>

