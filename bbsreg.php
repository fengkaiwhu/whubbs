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
//check if user id already identified ---û���õ��ĺ���
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
		printf("%s","����֤��ID:");
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
		html_error_quit("�����ע�� email ��ַ!");
	
	if($password != $re_password)
		html_error_quit("������ȷ�����벻һ��! ");
		
	if(strlen($password) < 4 || strlen($password) > 39)
		html_error_quit("���벻�淶, ���볤��ӦΪ 4-39 λ! ");
	
	//////////////���ݿ���Ϣ//////////////////
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
  
   ////////���id�Ƿ�ռ��//////
   //	if(($userid!="")&&check_givenpost($userid,$xh,$sfzh)){
	//html_error_quit("���id�ѱ�ռ�ã����ܻᵼ����ʵ��ʧ�ܣ�����������һ��ID����ע�ᣡ");
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
			html_error_quit("�û����з�������ĸ�ַ��������ַ�������ĸ!");
			break;
	case 2:
			html_error_quit("�û�������Ϊ������ĸ!");
			break;
	case 3:
			html_error_quit("ϵͳ���ֻ�������!");
			break;
	case 4:
			html_error_quit("���û����Ѿ���ʹ��!");
			break;
	case 5:
			html_error_quit("�û���̫��,�12���ַ�!");
			break;
	case 6:
			html_error_quit("����̫��,�39���ַ�!");
			break;
	case 10:
			html_error_quit("ϵͳ����,����ϵͳ����ԱSYSOP��ϵ.");
			break;
	////////////add by kfeng 2014.10.23////////////////
	case 12:
			html_error_quit("��վ���ע���û����ﵽ����.");
			break;
	///////////////////////////////////////////////////
	default:
			html_error_quit("ע��IDʱ����δ֪�Ĵ���!");
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
	if(!strcmp($gender,"��"))$gender=1;
	else $gender=2;
	settype($year,"integer");
	settype($month,"integer");
	settype($day,"integer");
	settype($m_register,"bool");

	if(!$m_register)$mobile_phone="";
    

    
    
    
	$ret=@bbs_createregform($userid,$realname,$dept,$address,$gender,$year,$month,$day,$reg_email,$phone,$mobile_phone, $_POST['OICQ'], $_POST['ICQ'], $_POST['MSN'],  $_POST['homepage'], intval($_POST['face']), $_POST['myface'], intval($_POST['width']), intval($_POST['height']), intval($_POST['groupname']), $_POST['country'],  $_POST['province'], $_POST['city'], intval($_POST['shengxiao']), intval($_POST['blood']), intval($_POST['belief']), intval($_POST['occupation']), intval($_POST['marital']), intval($_POST['education']), $_POST['college'], intval($_POST['character']), FALSE);//�Զ�����ע�ᵥ
	switch($ret)
	{
	case 0:
		break;
	case 2:
		html_error_quit("���û�������!");
		break;
	case 3:
		html_error_quit("����ע�ᵥ���� ��������! ���ֹ���дע�ᵥ");
		break;
	default:
		html_error_quit("����ע�ᵥ���� δ֪�Ĵ���! ���ֹ���дע�ᵥ");
		break;
	}
	html_init("gb2312");
	
	
//////////////////////
// ���ʵ����֤
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
			{      ///ÿ��ѧ�����ֻ��ע��4���˺�
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
// utf8���
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
                        {      ///ÿ��ѧ�����ֻ��ע��4���˺�
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
<h1>����ID�ɹ�</h1>
����<?php echo BBS_FULL_NAME; ?>ID�ɹ�,
<?php if($passed){?>
�����ڻ�û��ͨ��������֤, ֻ���������Ȩ��, ���ܷ���, ����, ����ȡ��������:<br/>
��1���人��ѧ��Уѧ��������ע��id��¼��վ�������ʵ��ע�ᵥ������ʵ����֤��ͨ��ʵ����֤��, �㽫��úϷ��û�Ȩ��!�粻��ͨ����������������Ϣ��ʵ����֤���ݿ��в����ڣ��뵽������������Ϣ�����칫�ң����񲿶�¥�������ֹ�ʵ����֤��<br/>
��2���人��ѧУ�ѣ��뽫��ҵ֤������֤ɨ�裬������wlxxs@whu.edu.cn,�������ʺ���Ϣ����ʵͨ���󣬼���ͨ���Ȩ�ޡ�<br/>
��3���人��ѧ��У�̹�������Я����֤������������Ϣ�����칫�ң����񲿶�¥�������ֹ�ʵ����֤��<br/>
��4�������ʿ������Я������֤����λ֤����������������Ϣ�����칫�ң����񲿶�¥�������ֹ�ʵ����֤��<br/>

<br/><br/><a href="index.html">������ҳ</a>
<?php }else{?>
���ʵ�������Ѿ�ͨ��ȷ�ϣ�������úϷ��û�Ȩ�ޡ�<a href="index.html">������ҳ</a>
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
<nobr><center>$SITENAME -- ���û�ע��<hr color=green>
<font color=green>��ӭ����$SITENAME  (��"*"�ŵı�����д��һ��������Ϊ�����ַ�����)</font>
<script type="text/javascript">
<!--
	function checkEmpty(form, fieldID, fieldName) {
		if (form[fieldID].value == "") {
			alert('����������' + fieldName + '!');
			form[fieldID].focus();
			return false;
		}
		return true;
	}
	function CheckDataValid(form) 
	{
		var fID = new Array("userid", "pass1", "num_auth", "realname", "dept", "address", "reg_email", "phone");
		var fName = new Array("�û���", "����", "��֤��", "��ʵ����", "ѧУϵ��������λ", "��ϸͨѶ��ַ", "ע��email", "����绰");
		var len = fID.length;
		if (!captcha_result) {
			alert('����δͨ����֤������ͨ����֤�����ύ����!');
			return false;
		}
		for (i = 0; i < len; i++) {
			if (!checkEmpty(form, fID[i], fName[i])) return false;
		}
				if (form["pass1"].value != form["pass2"].value) {
			alert("��������������벻һ������"); 
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
	<TD align=right>*��ȫ��֤:</TD>
	<TD align=left><script type="text/javascript" src="http://api.geetest.com/get.php?gt=c54da03586a0ed48a03d61778d711f8a"></script></TD>
  </TR>
  <TR>
  <TD align=right></TD>
	<TD align=left>����վ������һ����Ϊʽ��֤��ֹ������ע�ᣬ����<a href="http://www.geetest.com/howtouse" target="_blank">������</a>�鿴�� </TD>
  </TR>
  <TR>
	<TD align=right>*���������:</TD>
	<TD align=left><INPUT maxLength=12 size=12 name=userid> (2-12�ַ�, 
	  ����Ӣ����ĸ�����֣����ַ���������ĸ) </TD>
  </TR>
  <TR>
	<TD align=right>*����������:</TD>
	<TD align=left><INPUT maxLength=39 size=12 type=password name=pass1> (4-39�ַ�)
  </TD>
  </TR>
  <TR>
	<TD align=right>*������ȷ������:</TD>
	<TD align=left><INPUT maxLength=39 size=12 type=password name=pass2> (4-39�ַ�, 
	  ���������һ��) </TD>
  </TR>
  <TR>
	<TD align=right>�������ǳ�:</TD>
	<TD align=left><INPUT maxLength=32 name=username> (2-39�ַ�, ��Ӣ�Ĳ���) </TD>
  </TR>
  <TR>
	<TD align=right>*������ʵ����:</TD>
	<TD align=left><INPUT name=realname> (��Уѧ�����Զ�ʵ����֤����������, ����2������) </TD>
  </TR>
  <TR>
	<TD align=right>����ѧ��:</TD>
	<TD align=left><INPUT name=xh> (��Уѧ�����Զ�ʵ����֤����������д) </TD>
  </TR>
  <TR>
	<TD align=right>��������֤��:</TD>
	<TD align=left><INPUT name=sfzh> (��Уѧ�����Զ�ʵ����֤����������д) </TD>
  </TR>
  <TR>
	<TD align=right>*ѧУϵ��������λ:</TD>
	<TD align=left><INPUT size=40 name=dept> (����6���ַ�) </TD>
  </TR>
  <TR>
	<TD align=right>&nbsp;</TD>
	<TD align=left><font color=red>(ѧУ����嵽ϵ��������λ����嵽����)</font></TD>
  </TR>
  <TR>
	<TD align=right>*������ϸסַ:</TD>
	<TD align=left><INPUT size=40 name=address> (����6���ַ�) </TD>
  </TR>
  <TR>
	<TD align=right>&nbsp;</TD>
	<TD align=left><font color=red>(סַ����嵽����������ƺ���)</font></TD>
  </TR>
  <TR>
	<TD align=right>�����Ա�:</TD>
	<TD align=left><SELECT name=gender><OPTION 
		selected>��</OPTION><OPTION>Ů</OPTION></SELECT></TD>
  </TR>
  <TR>
	<TD align=right>���ĳ���������: </TD>
	<TD align=left><INPUT maxLength=4 size=4 name=year>��<INPUT maxLength=2 
	  size=2 name=month>��<INPUT maxLength=2 size=2 name=day>��</TD>
  </TR>
  <TR>
	<TD align=right>*����ע��Email ��ַ:</TD>
	<TD align=left><INPUT size=60 name=reg_email></TD>
  </TR>
  <TR>
	<TD align=right>*��������绰:</TD>
	<TD align=left><INPUT size=40 name=phone> </TD>
  </TR>
</table>
<hr color=green>
<input type=submit value=����> <input type=reset value=������д>
</form></center>
</html>
EOF;
}
?>