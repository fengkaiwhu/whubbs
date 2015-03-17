<?php

	require("funcs.php");
	
////////////////////////////////////////////////////////////////////////////////////////////
	
//////////////////////////////////
//delete old bbsinfo
//////////////////////////////////
	function mysql_clear($bbsid)
	{
		$sqlstr="delete from bbsinfo where bbsid='".$bbsid."'";
		mysql_query($sqlstr);
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
//check if user id already identified ---没有用到的函数
//////////////////////////////////
	function check_givenpost($bbsid,$xh,$sfzh)
	{
		$sqlstr="select * from bbsinfo where bbsid='".$bbsid."' and swnum='".$xh."' and idcard='".$sfzh."'";
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
	{
		echo "<br>";
		printf("%s","已认证的ID:");
		while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
       		printf ("%s\t", $row[0]);
	   	}
	}
	
	//////////////////////
   //delete dead id! add by zhaiwx1987 2010/4/12
   /////////////////
   function DeleteDeadID($xh,$sfzh)
   {
      $sqlstr="select * from bbsinfo where bbsid='".$bbsid."' and swnum='".$xh."' and idcard='".$sfzh."'";
      if (!($result=mysql_query($sqlstr)))
		check_mysql();
	  while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
       		$username = $row[0];
       		if(bbs_compute_user_value($username)<=0){
       		    mysql_clear($username);
       		}
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
	
////////////////////////////////////////////////////////////////////////////////////////////
	
	set_fromhost();

	if (!isset($_POST["userid"])) {
		show_reg_form();
		exit;
	}
	
	@$num_auth=$_POST["num_auth"];
	@$userid=$_POST["userid"];
	@$nickname=$_POST["username"];
	@$reg_email=$_POST["reg_email"];
	@$password = $_POST["pass1"];
	@$re_password = $_POST["pass2"];
	@$xh = $_POST["xh"];
	@$sfzh = $_POST["sfzh"];
	@$passed = -1;
	
	session_start();

	
	if(!strchr($reg_email,'@'))
		html_error_quit("错误的注册 email 地址!");
	
	if($password != $re_password)
		html_error_quit("密码与确认密码不一致! ");
		
	if(strlen($password) < 4 || strlen($password) > 39)
		html_error_quit("密码不规范, 密码长度应为 4-39 位! ");
	
	//////////////数据库信息//////////////////
    $mysql_server_name = "127.0.0.1";
    $mysql_username = "whubbs";
    $mysql_password = "bbswebwhu";
    $mysql_database = "whuinfo";


    $link=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
    mysql_query("set names 'latin1_swedish_ci'"); 

    if (!$link)
	check_mysql();
    if (!mysql_select_db($mysql_database,$link))
	check_mysql();
   ///////////////////////////////////////////
  
   ////////检查id是否被占用//////
   //	if(($userid!="")&&check_givenpost($userid,$xh,$sfzh)){
	//html_error_quit("这个id已被占用，可能会导致您实名失败，建议您更换一个ID重新注册！");
	//exit;
//	}
   ///////////////////////////	
	
	//create new id
	$ret=bbs_createnewid($userid,$password,$nickname);

	switch($ret)
	{
	case 0:
			break;
	case 1:
			html_error_quit("用户名有非数字字母字符或者首字符不是字母!");
			break;
	case 2:
			html_error_quit("用户名至少为两个字母!");
			break;
	case 3:
			html_error_quit("系统用字或不雅用字!");
			break;
	case 4:
			html_error_quit("该用户名已经被使用!");
			break;
	case 5:
			html_error_quit("用户名太长,最长12个字符!");
			break;
	case 6:
			html_error_quit("密码太长,最长39个字符!");
			break;
	case 10:
			html_error_quit("系统错误,请与系统管理员SYSOP联系.");
			break;
	////////////add by kfeng 2014.10.23////////////////
	case 12:
			html_error_quit("网站最大注册用户数达到上限.");
			break;
	///////////////////////////////////////////////////
	default:
			html_error_quit("注册ID时发生未知的错误!");
			break;
	}

	$_SESSION['num_auth'] = "";
	
	@$realname=$_POST["realname"];
	@$dept=$_POST["dept"];
	@$address=$_POST["address"];
	@$year=$_POST["year"];
	@$month=$_POST["month"];
	@$day=$_POST["day"];
	@$phone=$_POST["phone"];
	@$gender=$_POST["gender"];
	$m_register = 0;
	$mobile_phone = 0;
	if(!strcmp($gender,"男"))$gender=1;
	else $gender=2;
	settype($year,"integer");
	settype($month,"integer");
	settype($day,"integer");
	settype($m_register,"bool");

	if(!$m_register)$mobile_phone="";
    

    
    
    
	$ret=@bbs_createregform($userid,$realname,$dept,$address,$gender,$year,$month,$day,$reg_email,$phone,$mobile_phone, $_POST['OICQ'], $_POST['ICQ'], $_POST['MSN'],  $_POST['homepage'], intval($_POST['face']), $_POST['myface'], intval($_POST['width']), intval($_POST['height']), intval($_POST['groupname']), $_POST['country'],  $_POST['province'], $_POST['city'], intval($_POST['shengxiao']), intval($_POST['blood']), intval($_POST['belief']), intval($_POST['occupation']), intval($_POST['marital']), intval($_POST['education']), $_POST['college'], intval($_POST['character']), FALSE);//自动生成注册单
	switch($ret)
	{
	case 0:
		break;
	case 2:
		html_error_quit("该用户不存在!");
		break;
	case 3:
		html_error_quit("生成注册单发生 参数错误! 请手工填写注册单");
		break;
	default:
		html_error_quit("生成注册单发生 未知的错误! 请手工填写注册单");
		break;
	}
	html_init("gb2312");
	
	
//////////////////////
// 检查实名认证
//////////////////////
	


	
	$sqlstr="select xm from stuinfo "."where xh='".$xh."' and sfzh='".$sfzh."' and xm='".$realname."'";
	if (!($result=mysql_query($sqlstr)))
		check_mysql();
	if (mysql_num_rows($result)>0)
	{
	    DeleteDeadID($xh,$sfzh);  //add by zhaiwx 2010/4/12
	    if(bbs_compute_user_value($userid)<=0) //add by zhaiwx1987 2010/4/12
		   mysql_clear($userid);
		
		$sqlstr="select * from bbsinfo where swnum='".$xh."'";
		if (!($result=mysql_query($sqlstr)))
			check_mysql();
		
		if (($rows=mysql_num_rows($result))>=0)
		{
			if ($rows<4)
			{      ///每个学号最多只能注册4个账号
				if(!mysql_insert($userid,$xh,$sfzh,$realname,$dept,$address,$phone,date("Ymd")))
				{
					check_myql();
						}
				else
				{
					bbs_user_ident($userid);
					$passed =0;
				}
			}
		}
	}
// utf8检查
if($passed==0)
{
mysql_query("set names 'latin1_swedish_ci'");
        $sqlstr="select xm from stuinfo "."where xh='".$xh."' and sfzh='".$sfzh."' and xm='".$realname."'";
        if (!($result=mysql_query($sqlstr)))
                check_mysql();
        if (mysql_num_rows($result)>0)
        {
            DeleteDeadID($xh,$sfzh);  //add by zhaiwx 2010/4/12
            if(bbs_compute_user_value($userid)<=0) //add by zhaiwx1987 2010/4/12
                   mysql_clear($userid);

                $sqlstr="select * from bbsinfo where swnum='".$xh."'";
                if (!($result=mysql_query($sqlstr)))
                        check_mysql();

                if (($rows=mysql_num_rows($result))>=0)
                {
                        if ($rows<4)
                        {      ///每个学号最多只能注册4个账号
                                if(!mysql_insert($userid,$xh,$sfzh,$realname,$dept,$address,$phone,date("Ymd")))
                                {
                                        check_myql();
                                                }
                                else
                                {
                                        bbs_user_ident($userid);
                                        $passed =0;
                                }
                        }
                }
        }

mysql_query("set names 'latin1_swedish_ci'");
}

require_once('geetestlib.php');

$validate_response = geetest_validate(@$_POST['geetest_challenge'], @$_POST['geetest_validate']);
if ($validate_response) {
	echo 'Yes!';
} else {
	echo 'No';
}
?>
<body>
<h1>申请ID成功</h1>
申请<?php echo BBS_FULL_NAME; ?>ID成功,
<?php if($passed){?>
你现在还没有通过身份认证, 只有最基本的权限, 不能发文, 发信, 聊天等。如果你是:<br/>
（1）武汉大学在校学生，请用注册id登录进站，点击“实名注册单”进行实名认证，通过实名认证后, 你将获得合法用户权限!如不能通过，可能是您的信息在实名认证数据库中不存在，请到宣传部网络信息管理办公室（教务部二楼）进行手工实名认证。<br/>
（2）武汉大学校友，请将毕业证、身份证扫描，发送至wlxxs@whu.edu.cn,并附上帐号信息。核实通过后，即开通相关权限。<br/>
（3）武汉大学在校教工，请您携工作证宣传部网络信息管理办公室（教务部二楼）进行手工实名认证。<br/>
（4）社会人士，请你携带身份证、单位证明到宣传部网络信息管理办公室（教务部二楼）进行手工实名认证。<br/>

<br/><br/><a href="index.html">返回首页</a>
<?php }else{?>
你的实名资料已经通过确认，并将获得合法用户权限。<a href="index.html">返回首页</a>
<?php }?>
</body>
</html>
<?php
function show_reg_form() {
	$SITENAME = BBS_FULL_NAME;
	echo <<<EOF
<html>
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=gb2312">
<link rel=stylesheet type=text/css href='bbs.css'>
<nobr><center>$SITENAME -- 新用户注册<hr color=green>
<font color=green>欢迎加入$SITENAME  (有"*"号的必须填写，一个汉字作为两个字符计算)</font>
<script type="text/javascript">
<!--
	function checkEmpty(form, fieldID, fieldName) {
		if (form[fieldID].value == "") {
			alert('请输入您的' + fieldName + '!');
			form[fieldID].focus();
			return false;
		}
		return true;
	}
	function CheckDataValid(form) 
	{
		var fID = new Array("userid", "pass1", "num_auth", "realname", "dept", "address", "reg_email", "phone");
		var fName = new Array("用户名", "密码", "验证码", "真实姓名", "学校系级或工作单位", "详细通讯地址", "注册email", "联络电话");
		var len = fID.length;
		if (!captcha_result) {
			alert('您尚未通过验证，请先通过验证后再提交表单!');
			return false;
		}
		for (i = 0; i < len; i++) {
			if (!checkEmpty(form, fID[i], fName[i])) return false;
		}
				if (form["pass1"].value != form["pass2"].value) {
			alert("你两次输入的密码不一样：（"); 
			form["pass1"].focus(); 
			return false;
		}
		return true;
	}
//-->
</script> 
<form method=post action="bbsreg.php" onsubmit="return CheckDataValid(this);" name="theForm">
<br><br><br><br><br><br><br>

<script type="text/javascript">
var captcha_result = 0;
function gt_custom_ajax(res) {
	captcha_result = res;
}
</script>
<table width=700>
	<TR>
	<TD align=right>*安全验证:</TD>
	<TD align=left><script type="text/javascript" src="http://api.geetest.com/get.php?gt=c54da03586a0ed48a03d61778d711f8a"></script></TD>
  </TR>
  <TR>
  <TD align=right></TD>
	<TD align=left>（本站采用新一代行为式验证防止机器人注册，帮助<a href="http://www.geetest.com/howtouse" target="_blank">点这里</a>查看） </TD>
  </TR>
  <TR>
	<TD align=right>*请输入代号:</TD>
	<TD align=left><INPUT maxLength=12 size=12 name=userid> (2-12字符, 
	  可用英文字母或数字，首字符必须是字母) </TD>
  </TR>
  <TR>
	<TD align=right>*请输入密码:</TD>
	<TD align=left><INPUT maxLength=39 size=12 type=password name=pass1> (4-39字符)
  </TD>
  </TR>
  <TR>
	<TD align=right>*请输入确认密码:</TD>
	<TD align=left><INPUT maxLength=39 size=12 type=password name=pass2> (4-39字符, 
	  必须和密码一致) </TD>
  </TR>
  <TR>
	<TD align=right>请输入昵称:</TD>
	<TD align=left><INPUT maxLength=32 name=username> (2-39字符, 中英文不限) </TD>
  </TR>
  <TR>
	<TD align=right>*您的真实姓名:</TD>
	<TD align=left><INPUT name=realname> (在校学生可自动实名认证，请用中文, 至少2个汉字) </TD>
  </TR>
  <TR>
	<TD align=right>您的学号:</TD>
	<TD align=left><INPUT name=xh> (在校学生可自动实名认证，请认真填写) </TD>
  </TR>
  <TR>
	<TD align=right>您的身份证号:</TD>
	<TD align=left><INPUT name=sfzh> (在校学生可自动实名认证，请认真填写) </TD>
  </TR>
  <TR>
	<TD align=right>*学校系级或工作单位:</TD>
	<TD align=left><INPUT size=40 name=dept> (至少6个字符) </TD>
  </TR>
  <TR>
	<TD align=right>&nbsp;</TD>
	<TD align=left><font color=red>(学校请具体到系，工作单位请具体到部门)</font></TD>
  </TR>
  <TR>
	<TD align=right>*您的详细住址:</TD>
	<TD align=left><INPUT size=40 name=address> (至少6个字符) </TD>
  </TR>
  <TR>
	<TD align=right>&nbsp;</TD>
	<TD align=left><font color=red>(住址请具体到宿舍或者门牌号码)</font></TD>
  </TR>
  <TR>
	<TD align=right>您的性别:</TD>
	<TD align=left><SELECT name=gender><OPTION 
		selected>男</OPTION><OPTION>女</OPTION></SELECT></TD>
  </TR>
  <TR>
	<TD align=right>您的出生年月日: </TD>
	<TD align=left><INPUT maxLength=4 size=4 name=year>年<INPUT maxLength=2 
	  size=2 name=month>月<INPUT maxLength=2 size=2 name=day>日</TD>
  </TR>
  <TR>
	<TD align=right>*您的注册Email 地址:</TD>
	<TD align=left><INPUT size=60 name=reg_email></TD>
  </TR>
  <TR>
	<TD align=right>*您的联络电话:</TD>
	<TD align=left><INPUT size=40 name=phone> </TD>
  </TR>
</table>
<hr color=green>
<input type=submit value=申请> <input type=reset value=重新填写>
</form></center>
</html>
EOF;
}
?>
