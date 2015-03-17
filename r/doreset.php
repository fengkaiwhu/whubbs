<?php
require_once("../www2-funcs.php");
login_init();

//{ "uid": uid, "name": name, "xh": xuehao, "sfzh": sfzh, "email": email, "bz": bz }

init_check();

function doemailpwd()
{
	$results = array();
	$uid = $_POST['uid'];
	$email = $_POST['email'];

	$user = getbbsuser($uid);
	if($email==$user["reg_email"])
	{
		$rp = resetpassword($uid, $email);
		if($rp == "SUCCESS")
		{
			$results['success'] = "密码重置成功，请前往注册邮箱查收！";
		}
		else
		{
			$results['error'] = $rp;
		}
	}
	else 
	{
	 	$results['error'] = "邮箱不匹配！";
	}

	sendjson($results);
}

function doauthpwd()
{
	$results = array();
	$uid = $_POST['uid'];
	$email = $_POST['email'];

	if (isset($_POST['xh'])&&isset($_POST['sfzh']))
	{
		$xh = $_POST['xh'];
		$sfzh = $_POST['sfzh'];

		$row = querybbsinfo($uid, $xh, $sfzh);
		if($row)
		{
			//核对成功，可以重置密码
			$rp = resetpassword($uid, $email);
			if($rp == "SUCCESS")
			{
				$results['success'] = "密码重置成功，请前往取回邮箱查收！";
			}
			else
			{
				$results['error'] = $rp;
			}
		}
		else 
		{
		 	$results['error'] = "此ID没有认证或认证信息不正确！";
		}
	}
	else//缺少参数
	{
		$results['error'] = "参数不完整！";
	}
	sendjson($results);
}

function doreqpwd()
{
	$results = array();
	$uid = $_POST['uid'];
	
	global $currentuser;

	//database
	$con = mysql_connect("127.0.0.1","whubbs","bbswebwhu");
	if (!$con)
	{
		$results['error'] = '无法连接数据库: ' . mysql_error();
		sendjson($results);
	}

	mysql_select_db("whuinfo", $con);
	mysql_query("set names 'utf8'"); 

	$email = check_sql_input($_POST['email']);
	//'$uid','$name','$xuehao','$shenfenzheng','$email','NEW','')";
	// $uid=$_POST["userid"];
	$name = check_sql_input($_POST["name"]);
	$xuehao=check_sql_input($_POST["xh"]);
	$shenfenzheng=check_sql_input($_POST["sfzh"]);
	// $email=$_POST["email"];
	$comments=check_sql_input($_POST["bz"]);

	$rs = mysql_query("select count(*) from findpwd_info where `id`='$uid' and `email`='$email' and `status`='NEW';");
	$row = mysql_fetch_row($rs);
	if($row[0]>1)
	{
		//die("you have submitted a request.");
		$results['error'] = '您已经提交过申请。';
		sendjson($results);
	}

	$rs = mysql_query("select count(*) from findpwd_info where `id`='$uid' and `status`='NEW';");
	$row = mysql_fetch_row($rs);
	if($row[0]>=5)
	{
		//die("you have submitted too much different requests.");
		$results['error'] = '该ID提交申请次数过多。';
		sendjson($results);
	}

	$rs = mysql_query("select count(*) from findpwd_info where `email`='$email' and `status`='NEW';");
	$row = mysql_fetch_row($rs);
	if($row[0]>=5)
	{
		//die("you have submitted too much different requests.");
		$results['error'] = '该邮箱提交申请次数过多。';
		sendjson($results);
	}

	$sql = "INSERT INTO findpwd_info (`index`,`id`,`name`,`xuehao`,`shenfenzheng`,`email`,`status`,`operator`,`comments`)
	VALUES
	(0,'$uid','$name','$xuehao','$shenfenzheng','$email','NEW','','$comments')";

	if (!mysql_query($sql,$con))
	{
		//die('Error: ' . mysql_error());
		$results['error'] = '数据库发生错误：'. mysql_error();
		sendjson($results);
	}
	mysql_close($con);

	//echo "1 record added";
	//echo "<br />操作成功！点<a href='http://bbs.whu.edu.cn'>这里</a>返回BBS。";
	$results['success'] = '操作成功，审核通过后，新密码将发送到取回邮箱，请注意查收！';
	sendjson($results);

/*
mysql> select * from findpwd_info limit 1;       
+-------+-----+------+--------+--------------+-------+--------+----------+
| index | id  | name | xuehao | shenfenzheng | email | status | operator | comments
+-------+-----+------+--------+--------------+-------+--------+----------+
|     1 | 123 | 123  | 123    | 123          | 123   | NEW    | 123      | asdfasdf
+-------+-----+------+--------+--------------+-------+--------+----------+
1 row in set (0.00 sec)
*/
	
}

function doadminreset()
{
	$results = array();
	$optor = checkadminperm();

	if(!$optor)
	{
		$results['success'] = "无操作权限！";
	}
	else
	{
		//database
		$con = mysql_connect("127.0.0.1","whubbs","bbswebwhu");
		if (!$con)
		{
			$results['error'] = '无法连接数据库: ' . mysql_error();
			sendjson($results);
		}

		mysql_select_db("whuinfo", $con);
		mysql_query("set names 'utf8'"); 

		$uid = check_sql_input($_POST['uid']);
		$email = check_sql_input($_POST['email']);
		$index = check_sql_input($_POST['index']);
		$range = check_sql_input($_POST['range']);
		$op = check_sql_input($_POST['op']);
		if ($op == "rst") {
			$rp = resetpassword($uid, $email);
			if($rp == "SUCCESS")
			{
				//$results['success'] = "密码重置成功！";
				$sql = "update findpwd_info set `status`='DONE', `operator`='$optor' where `index`='$index';";//更新数据库
			}
			else
			{
				$results['error'] = $rp;
				sendjson($results);
			}
			
		}
		elseif ($op == "refuse") {
			$sql = "update findpwd_info set `status`='REFUSE', `operator`='$optor' where `index`='$index';";
		}
		elseif ($op == "clear") {
			if ($range == "all") {
				$sql = "delete from findpwd_info;";
			}else{
				$sql = "delete from findpwd_info where `status`!='NEW';";
			}
		}
		else{
			$results['error'] = "未知操作！";
			sendjson($results);
		}
		$rs = mysql_query($sql);

		if (mysql_error()) {
		    //die(mysql_error());
			$results['error'] = '数据库发生错误：'.mysql_error();
			sendjson($results);
		}
		$results['success'] = "操作成功！";
	}
	sendjson($results);
}

function getbbsuser($userid)
{
	//$user;
	$userarray=array();
	if (bbs_getuser($userid,$userarray)) 
	{
		//var_dump($userarray);
		//$user = $userarray;
		return $userarray;
	}
	else
	{
		//echo "不存在此ID！";
		return false;
	}
}

function querybbsinfo($userid, $xuehao, $shenfenzheng)
{
	$con = mysql_connect("127.0.0.1","whubbs","bbswebwhu");
	if (!$con)
	{
		$rst = array('error' => '无法连接数据库: ' . mysql_error());
		sendjson($rst);
	}
	mysql_select_db("whuinfo", $con);
	mysql_query("set names 'latin1_swedish_ci'"); 

	$xuehao = check_sql_input($xuehao);
	$shenfenzheng = check_sql_input($shenfenzheng);
	$rs = mysql_query("select * from bbsinfo where bbsid='$userid' and swnum='$xuehao' and idcard='$shenfenzheng' limit 1;");
	$row = mysql_fetch_assoc($rs);
	//mysql_close($con);

	return $row;
}

function sendjson($value)
{
	header("Content-type:charset=utf-8");//text/html
	//header("Content-type:application/json; charset=utf-8");//text/html
	$json = json_encode($value);
	$code = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $json);
	echo $code;
	// echo json_encode($value);
	exit();
}

function checkadminperm()
{
	global $currentuser;

	if($currentuser["userid"]!="davidxn" && $currentuser["userid"]!="SYSOP")
	{
		return false;
	}
	return $currentuser["userid"];
}

function resetpassword($userid,$newmail)
{
	$newpwd = create_password(8);
	$ret = bbs_setpassword($userid,$newpwd);


	$message = "您的新密码为：【".$newpwd."】。<br /><br />本邮件由系统自动生成，请勿回复！" ;
	
	require_once('mail/class.phpmailer.php');
	require_once("mail/class.smtp.php"); 
	$mail  = new PHPMailer(); 

	$mail->CharSet    ="UTF-8";
	$mail->IsSMTP();                            // 设定使用SMTP服务
	$mail->SMTPAuth   = true;                   // 启用 SMTP 验证功能
	//$mail->SMTPSecure = "ssl";                  // SMTP 安全协议
	$mail->Host       = "smtp.whu.edu.cn";       // SMTP 服务器
	$mail->Port       = 25;                    // SMTP服务器的端口号
	$mail->Username   = "bbs";  // SMTP服务器用户名
	$mail->Password   = "wudayinghua2011";        // SMTP服务器密码
	$mail->SetFrom('bbs@whu.edu.cn', '珞珈山水BBS');    // 设置发件人地址和名称
	$mail->Subject    = '珞珈山水BBS重置密码'; // 设置邮件标题
	$mail->MsgHTML($message); // 设置邮件内容
	$mail->AddAddress($newmail, "");
	//$mail->AddAttachment("images/phpmailer.gif"); // 附件 
	if(!$mail->Send()) {
		return "发送失败：" . $mail->ErrorInfo;
	}else{
		return "SUCCESS";
	}

}

function create_password($pw_length)
{  
/*	$randpwd = '';  
	for ($i = 0; $i < $pw_length; $i++)  
	{  
		$randpwd .= chr(mt_rand(48, 122));  
	}  
	return $randpwd;  */
	
    $str = substr(md5(time()), 0, $pw_length);
    return $str;
}

function check_sql_input($value)
{
	// 去除斜杠
	if (get_magic_quotes_gpc())
	{
		$value = stripslashes($value);
	}
	// 如果不是数字则加引号
	if (!is_numeric($value))
	{
		$con = mysql_connect("127.0.0.1","whubbs","bbswebwhu");
		if (!$con)
		{
			$results['error'] = '无法连接数据库: ' . mysql_error();
			sendjson($results);
		}
		$value = mysql_real_escape_string($value);
	}
	return $value;
}

// tgt,uid,email   
function init_check()
{
	$results = array();

	if ($_POST['tgt']=="adminreset") 
	{
		doadminreset();
		return;
	}
	if(isset($_POST['tgt']) && isset($_POST['uid']) && isset($_POST['email']) )
	{
		$uid = $_POST['uid'];
		$user = getbbsuser($uid);
		if (!$user) 
		{
			$results['error'] = "不存在此ID！";
			sendjson($results);
		}
		else
		{
			$appid = $_POST['tgt'];
			if ($appid=="emailpwd") 
			{
				doemailpwd();
			}
			elseif ($appid=="authpwd") 
			{
				doauthpwd();
			}
			elseif ($appid=="reqpwd") //reqpwd
			{
				doreqpwd();
			}
			else
			{
				$results['error'] = "操作不匹配！";
				sendjson($results);
			}
		}
	}
	else//缺少参数
	{
		$results['error'] = "参数不完整！";
		sendjson($results);
	}
}

?>
