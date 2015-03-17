<?php

//建立帮派
function creategroups($name, $id){  

	$mysql_server_name = "127.0.0.1";
	$mysql_username = "whubbs";
	$mysql_password = "bbswebwhu";
	$mysql_database = "whuinfo";   
	
	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
	mysql_select_db($mysql_database);
	
	$sql = "select * from groups where name=\"".$name."\"";
	$record = mysql_query($sql, $conn);
	if(mysql_num_rows($record)!=0)//无门派
	{
		return;
	}
		
	$sql = "select * from groups where id='".$id."'";
	$record = mysql_query($sql, $conn);
	if(mysql_num_rows($record)==0)//无门派
	{
		if(bbs_getuserexp($id)>7500 || $id=='tedy')
		{
			$sql = "insert into groups values('".$id."','".$name."','1','')";	
			mysql_query($sql);
		}
	}
	else
	{
		$arr = mysql_fetch_array($record);
		$sql = "select * from groups where id='".$id."' and head=1";//是老大
		$record = mysql_query($sql);
		if(mysql_num_rows($record)!=0){
			$sql = "update groups set name='".$name."' where name='".$arr[1]."'";	
			mysql_query($sql);
		}
		
		if(bbs_getuserexp($id)>7500 || $id=='tedy')
		{
			$sql = "select * from groups where id='".$id."' and head=0";//是小弟
			$record = mysql_query($sql);
			if(mysql_num_rows($record)!=0){
				$sql = "update groups set name='".$name."', head=1 where id='".$id."'";	
				mysql_query($sql);
			}
		}
	}
	mysql_close($conn);
}


//加入帮派
function joingroups($name, $id){  

	$mysql_server_name = "127.0.0.1";
	$mysql_username = "whubbs";
	$mysql_password = "bbswebwhu";
	$mysql_database = "whuinfo";   
	
	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
	mysql_select_db($mysql_database);
	
	if($name!='')
	{
		$sql = "select id from groups where name='".$name."' and head=1";
		$record = mysql_query($sql, $conn);
		if(mysql_num_rows($record)==1)//检查门派人数上限
		{
			$arr = mysql_fetch_array($record);
			$exp = bbs_getuserexp($arr[0]);
			$sql = "select count(*) from groups where name='".$name."'";
			$record = mysql_query($sql, $conn);
			$arr = mysql_fetch_array($record);
			$count=intval($arr[0]);
			if($exp/500 < $count)
			{
				return;//门派人数已满
			}
		}
	}
		
	$sql = "select * from groups where id=\"".$id."\"";
	$record = mysql_query($sql, $conn);
	if(mysql_num_rows($record)==0)//无门派，可以加入
	{
		$sql = "insert into groups values ('".$id."','".$name."',0,'')";
		mysql_query($sql);
	}
	else //有门派，需要修改
	{
		$sql = "select * from groups where id='".$id."' and head = 1";
		$record = mysql_query($sql, $conn);
		if(mysql_num_rows($record)==0)//不是老大，可以修改
		{
			$sql = "update groups set name='".$name."' where id='".$id."'";
			mysql_query($sql);
		}
	}
	mysql_close($conn);
}



//解散帮派
function releasegroup($id){  
	
	$mysql_server_name = "127.0.0.1";
	$mysql_username = "whubbs";
	$mysql_password = "bbswebwhu";
	$mysql_database = "whuinfo";   
	
	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
	mysql_select_db($mysql_database);
		
	$sql = "select name from groups where id='".$id."' and head=1";
	$record = mysql_query($sql, $conn);
	while ($arr = mysql_fetch_array($record))
	{
		$sql = "delete from groups where name='".$arr[0]."'";
		mysql_query($sql);
	}
	mysql_close($conn);
}

//设置头衔
function settitle($id,$title,$leader){  
	
	$mysql_server_name = "127.0.0.1";
	$mysql_username = "whubbs";
	$mysql_password = "bbswebwhu";
	$mysql_database = "whuinfo";   
	
	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
	mysql_select_db($mysql_database);
	
	$sql = "select name from groups where id='".$leader."' and head=1";
	$record = mysql_query($sql, $conn);
	if(mysql_num_rows($record)==1)//掌门权限
	{
		$arr = mysql_fetch_array($record);
		$sql = "update groups set title='".$title."' where id='".$id."' and name='".$arr[0]."'";
		$record = mysql_query($sql, $conn);
	}
	mysql_close($conn);
}

function getgroupinfo($id){  
	
	$mysql_server_name = "127.0.0.1";
	$mysql_username = "whubbs";
	$mysql_password = "bbswebwhu";
	$mysql_database = "whuinfo";   
	
	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
	mysql_select_db($mysql_database);
	
	$sql = "select head, name, title from groups where id='".$id."'";
	$record = mysql_query($sql, $conn);
	if(mysql_num_rows($record)==1)//有信息
	{
		$arr = mysql_fetch_array($record);
		return $arr;
	}
	else 
	{
		$arr=array(0,'','');
		return $arr;
	}
	mysql_close($conn);
}

function getgroupmember($name){  
	
	$mysql_server_name = "127.0.0.1";
	$mysql_username = "whubbs";
	$mysql_password = "bbswebwhu";
	$mysql_database = "whuinfo";   
	
	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
	mysql_select_db($mysql_database);
	
	$sql = "select id from groups where name='".$name."'";
	$record = mysql_query($sql, $conn);
	if(mysql_num_rows($record)>0)//有信息
	{
		$members = array();
		while ($arr = mysql_fetch_array($record))
		{
			array_push( $members, $arr[0]);
		}
		return $members;
	}
	else 
	{
		return NULL;
	}
	mysql_close($conn);
}

function quitegroup($id){  
	
	$mysql_server_name = "127.0.0.1";
	$mysql_username = "whubbs";
	$mysql_password = "bbswebwhu";
	$mysql_database = "whuinfo";   
	
	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
	mysql_select_db($mysql_database);
	
	$sql = "delete from groups where id='".$id."'";
	$record = mysql_query($sql, $conn);
	mysql_close($conn);
}
?>
