<?php
	//文件名:regidentify.php
	//功能:身份认证注册单
	//作者:cashcat
?>
<?php
	require("funcs.php");
	html_init("utf-8");
	@$bbsid=addslashes(trim($_POST["bbsid"]));
	@$swnum=addslashes(trim($_POST["swnum"]));
	@$idcard=addslashes(trim($_POST["idcard"]));
	@$name=addslashes(trim($_POST["name"]));
	@$dept=addslashes(trim($_POST["dept"]));
	@$address=addslashes(trim($_POST["address"]));
	@$phone=addslashes(trim($_POST["phone"]));
	@$regdate=addslashes(trim($_POST["regdate"]));
	
//////////////////////////////////
//delete old bbsinfo
//////////////////////////////////
	function mysql_clear($bbsid)
	{
		$sqlstr="delete from bbsinfo where bbsid='".$bbsid."'";
		mysql_query($sqlstr);
	}	
	
	
///////////////////////////////////
// check blank fields
//////////////////////////////////
	function check_fields($bbsid,$swnum,$idcard,$name,$dept,$address,$phone)
	{
		if (($bbsid=='')||($swnum=='')||($idcard=='')||($name==''))
		{
		//echo "字段不能为空"."<br>";
		show_msg("字段不能为空，请重新填写",1);
		exit;
		}
	}
	
	
//////////////////////////////////
//check mysql error
//////////////////////////////////
	function check_mysql()
	{
		if (mysql_errno()>0)
			die("<br>.MySQL error".mysql_errno().":".mysql_error());
			return;
	}

//////////////////////////////////
//show the messages
//////////////////////////////////
	function show_msg($msg,$sh)
	{
		echo "<font size=2>武汉大学珞珈山水BBS站--实名认证注册单<hr color=green></font>";
		echo "<font size=2>".$msg."</font><br><br>";
		if ($sh)
		echo "<font size=2><a href='javascript:history.go(-1)'>[返回上一页]</a></font>";
		return;
	}
	
//////////////////////////////////
//insert to bbsinfo
//////////////////////////////////
	function mysql_insert($bbsid,$swnum,$idcard,$name,$dept,$address,$phone,$regdate)
	{
		$sqlstr="delete from bbsinfo where bbsid='".$bbsid."'";
		mysql_query($sqlstr);
		$sqlstr="insert into bbsinfo values('".$bbsid."','".$swnum."','".$idcard."','".$name."','".$dept."','".$address."','".$phone."','".$regdate."')";
	if (!($result=mysql_query($sqlstr)))
		check_mysql();
	if (mysql_affected_rows()!=1){
		check_mysql();
		return 0;
		}
		return 1;
	}

//////////////////////////////////
//check if user id already identified
//////////////////////////////////
	function check_givenpost($bbsid)
	{
		$sqlstr="select * from bbsinfo where bbsid='".$bbsid."'";
		if (!($result=mysql_query($sqlstr)))
			check_mysql();
		if (($rows=mysql_num_rows($result))==1)
		{
			return 1;
		}
		else
			return 0;	
		
	}
	
//////////////////////////////////
//show identified ids
//////////////////////////////////
	function show_ids($result)
	{   //int isDead = 0;
	    //int lifeNum = 0;
		echo "<br>";
		printf("%s","已认证的ID:");
		while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
       		printf ("%s\t", $row[0]);
	   	}
	   
	}
	//add by zhaiwx1987 2010/4/12
	function DeleteDeadID($xh,$sfzh)
   {
      $sqlstr="select * from bbsinfo where swnum='".$xh."' and idcard='".$sfzh."'";
      if (!($result=mysql_query($sqlstr)))
		check_mysql();
	  while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
       		$username = $row[0];
       		echo $username;
       		if(bbs_compute_user_value($username)==0){
       			
       		    mysql_clear($username);
       		}
	  }
   }
//////////////////////////////////
//check the initpass
//////////////////////////////////
		function check_initpass($swnum,$regpass)
	{
		$sqlstr="select * from tsinfo where swnum='".$swnum."' and initpass='".$regpass."'";
		//echo $sqlstr;
		if (!($result=mysql_query($sqlstr)))
			check_mysql();
		if (($rows=mysql_num_rows($result))==1)
		{
			return 1;
		}
		else
			return 0;	
		
	}
	
	check_fields($bbsid,$swnum,$idcard,$name,$dept,$address,$phone);
	
	
	 	$mysql_server_name = "127.0.0.1";
        $mysql_username = "whubbs";
        $mysql_password = "bbswebwhu";
        $mysql_database = "whuinfo";



	$link=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
	if (!$link)
		check_mysql();
	if (!mysql_select_db($mysql_database,$link))
		check_mysql();
	
	$sqlstr="select xm from stuinfo "."where xh='".$swnum."' and sfzh='".$idcard."'";
    //echo $sqlstr;
	if (!($result=mysql_query($sqlstr)))
		check_mysql();
	if (mysql_num_rows($result)>0){
		$arr = mysql_fetch_array($result);
	}
	else{
	       show_msg("非常抱歉，我们的数据库中没有你的学号等信息，若有问题,请到<a href=bbsdoc.php?board=SYSOP>SYSOP</a>版发文询问",1);
	       exit;

	}
	
	mysql_clear($bbsid);//既然能注册此ID，证明该ID是可用的或者已经饿死了，可以在这里从数据库中删除
	
	DeleteDeadID($swnum,$idcard);
	
	$sqlstr="select * from bbsinfo where swnum='".$swnum."'";
	if (!($result=mysql_query($sqlstr)))
		check_mysql();
		
		
	if (($rows=mysql_num_rows($result))>0){
		
		if ($rows<4)
		{                 
			//check already give post
			if (check_givenpost($bbsid)==1)
				{
					show_msg("不要再试了，你已经实名！Attention:如果您依旧无法拥有发文权限，可能您在试图实名一个已经饿死的ID，这个饿死的ID只有其拥有者才能重新实名，建议您换一个ID重新注册！",1);
					exit;
				}
				else
				{
					///若没有填院系信息，则从stuinfo中取出学院信息填入，其他的没填则为空
					if($dept=='')
					{
					$sqlstr="select fy from stuinfo "."where xh='".$swnum."' and sfzh='".$idcard."' and xm='".$name."'";
					if (!($result1=mysql_query($sqlstr)))
						check_mysql();
					$row1 = mysql_fetch_array($result1,MYSQL_NUM);
					$dept = $row1[0];
					if($address == '')
						$address = $row1[0];
					}
					if(!mysql_insert($bbsid,$swnum,$idcard,$name,$dept,$address,$phone,$regdate))
						check_mysql();
					else
					{
						show_msg("恭喜你，已经成功实名！",0);
						bbs_user_ident($bbsid);
						show_ids($result);
						exit;
					}
				}
			
		}
		else
		{
			
			show_msg("非常遗憾，你的实名次数已满，每个信息只能认证4个id",0);
			show_ids($result);
			exit;
		}
	}
	else
	{
			mysql_clear($bbsid);
			///若没有填院系信息，则从stuinfo中取出学院信息填入，其他的没填则为空
			if($dept=='')
			{
				$sqlstr="select fy from stuinfo "."where xh='".$swnum."' and sfzh='".$idcard."' and xm='".$name."'";
				if (!($result1=mysql_query($sqlstr)))
					check_mysql();
				$row1 = mysql_fetch_array($result1,MYSQL_NUM);
				$dept = $row1[0];
				if($address == '')
					$address = $row1[0];
			}

			if(!mysql_insert($bbsid,$swnum,$idcard,$name,$dept,$address,$phone,$regdate))
				check_mysql();
			else
			{
				show_ids($result);
				show_msg("恭喜你，已经成功实名,请重新登陆以获得权限！",1);
				bbs_user_ident($bbsid);
				exit;
			}
	}
	
?> 
