<?php

	require("funcs.php");
	
	@$xuehao = $_GET['xh'];
	@$shenfen = $_GET['idnum'];
	@$xm_name = $_GET['xingming'];
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
//check if user id already identified
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
		show_reg_form($xuehao,$shenfen,$xm_name);
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
	@$passed =-1;
	
	session_start();

	
	if(!isset($_SESSION['num_auth']))
		html_error_quit("��ȴ�ʶ���ͼƬ��ʾ���!");
	if(strcasecmp($_SESSION['num_auth'],$num_auth))
		html_error_quit("ͼƬ�ϵ��ַ���ʶ�����!�ѵ����ǻ����ˣ�");

	
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
	if (mysql_num_rows($result)>0){
	    DeleteDeadID($xh,$sfzh);  //add by zhaiwx 2010/4/12
	    if(bbs_compute_user_value($userid)<=0) //add by zhaiwx1987 2010/4/12
		   mysql_clear($userid);
		
		$sqlstr="select * from bbsinfo where swnum='".$xh."'";
		if (!($result=mysql_query($sqlstr)))
			check_mysql();
		
		if (($rows=mysql_num_rows($result))>=0){
			if ($rows<4)
			{
				if(!mysql_insert($userid,$xh,$sfzh,$realname,$dept,$address,$phone,date("Ymd")))
				check_mysql();
				else{
					bbs_user_ident($userid);
					$passed =1;
				}
			}
			else
				$passed = 0;
		}
}

?>
<body>
<h1>����ID�ɹ�����ʹ���������bbs ID���е�¼��</h1>
����<?php echo BBS_FULL_NAME; ?>ID�ɹ�,
<?php if($passed == -1){?>
�����ڻ�û��ͨ��������֤, ֻ���������Ȩ��, ���ܷ���, ����, ����ȡ��������:<br/>
��1���人��ѧ��Уѧ��������ע��id��¼��վ�������ʵ��ע�ᵥ������ʵ����֤��ͨ��ʵ����֤��, �㽫��úϷ��û�Ȩ��!�粻��ͨ����������������Ϣ��ʵ����֤���ݿ��в����ڣ��뵽������������Ϣ�����칫�ң����񲿶�¥�������ֹ�ʵ����֤��<br/>
��2���人��ѧУ�ѣ��뽫��ҵ֤������֤ɨ�裬������wlxxs@whu.edu.cn,�������ʺ���Ϣ����ʵͨ���󣬼���ͨ���Ȩ�ޡ�<br/>
��3���人��ѧ��У�̹�������Я����֤������������Ϣ�����칫�ң����񲿶�¥�������ֹ�ʵ����֤��<br/>
��4�������ʿ������Я������֤����λ֤����������������Ϣ�����칫�ң����񲿶�¥�������ֹ�ʵ����֤��<br/>

<br/><br/>��<br/><a href="index.html">������ҳ</a>
<?php }else if($passed == 1){?>
���ʵ�������Ѿ�ͨ��ȷ�ϣ���ʹ���������bbs ID���е�¼��������úϷ��û�Ȩ�ޡ�<a href="index.html">������ҳ</a>
<?php }else if($passed == 0){?>
���Ƿǳ���Ǹ�����ʵ����֤����������ÿ����Ϣֻ����֤4��id��<br/>
��ղ�ע���id����ʹ�ã�����û��ͨ��������֤��ֻ���������Ȩ�ޣ����ܷ��ġ����š�����ȡ�<br/>
<a href="index.html">������ҳ</a>
<?php }?>
</body>
</html>

<?php
function show_reg_form($xuehao,$shenfen,$xm_name) {
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
	var fID = new Array("userid", "pass1", "num_auth", "realname" );
	var fName = new Array("�û���", "����", "��֤��", "��ʵ����");
	var len = fID.length;
	for (i = 0; i < len; i++) 
	{
		if (!checkEmpty(form, fID[i], fName[i])) return false;
	}
	if (form["pass1"].value != form["pass2"].value) 
	{
		alert("��������������벻һ������"); 
		form["pass1"].focus(); 
		return false; 
	}
	return true;
}
-->
</script> 
<form method=post action="bbsnewreg.php" onsubmit="return CheckDataValid(this);" name="theForm">
<img src="img_rand/img_rand.php">
<table width=700>
  <TR>
	<TD align=right>*����ͼƬ�е��ַ���:</TD>
	<TD align=left><INPUT size=5 name=num_auth>(Ϊ�˷�ֹ������ע�ᡣ������ϲ��壬�ɰ�F5 ��ˢ�±�ҳ��)</TD> 
  </TR>
  <TR>
	<TD align=right>*���������������BBS ID:</TD>
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
	<TD align=right>*������ʵ����:</TD>
	<TD align=left><INPUT name=realname value="$xm_name"> (��Уѧ�����Զ�ʵ����֤����������, ����2������) </TD>
  </TR>
  <TR>
	<TD align=right>����ѧ��:</TD>
	<TD align=left><INPUT name=xh value="$xuehao"> (��Уѧ�����Զ�ʵ����֤����������д) </TD>
  </TR>
  <TR>
	<TD align=right>��������֤��:</TD>
	<TD align=left><INPUT name=sfzh value="$shenfen"> (��Уѧ�����Զ�ʵ����֤����������д) </TD>
  </TR>
</table>
<hr color=green>
<input type=submit value=����> <input type=reset value=������д>
</form></center>
</html> 
EOF;
}
?>