<?php
	$mysql_server_name = "127.0.0.1";
	$mysql_username = "whubbs";
	$mysql_password = "bbswebwhu";
	$mysql_database = "whuinfo";

	$conn = mysql_connect($mysql_server_name, $mysql_username, $mysql_password);
	//mysql_query("set names 'utf8'", $conn);
	mysql_select_db($mysql_database);
	

	$file = fopen("2013newstu.txt", 'r');
	while(!feof($file)) {
		$sql = fgets($file);
		iconv('utf8', 'latin1', $sql);
		mysql_query($sql);
		echo $sql.'</br>';

		//mysql_query("set names 'latin1'");
		//$sql2 = "select * from stuinfo where xh = '2013202110043'";
		//$result = mysql_query($sql2);
		//$row = mysql_fetch_row($result);
		//echo $row[0];
		//echo $row[1];

		//$sql3 = "delete from stuinfo where xh = '2'";
		//mysql_query($sql3);
	}
	//mysql_query($sql);


	//$sql = "select * from stuinfo where xh = '2'";
	//$result = mysql_query($sql);
	//echo $sql;
	//while($arr = mysql_fetch_row($result)) {
	//	foreach($arr as $field) {
	//		echo $field;
	//	}
	//}
	//echo $result;
	mysql_close($conn);
?>