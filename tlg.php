<?php
require("fs.php");
require("encrypt.php");
require("config.php");
set_fromhost();
cache_header("nocache");

echo '--------------tlg.php-----------------------';
$id = 'davidxn';
$passwd = '19786603';


$ret = bbs_check_ban_ip($id, $fromhost);
switch($ret) {
case 1:
    error_alert("�Բ��𣬵�ǰλ�ò������¼��ID��");
    break;
case 2:
    error_alert("�� ID ����ӭ���Ը� IP ���û���");
    break;
}

if (($id!="guest")&&bbs_checkpasswd($id,$passwd)!=0) error_alert("�û�������������µ�¼��");
$error=bbs_wwwlogin(1, $fromhost, $fullfromhost);
switch($error) {
	case 0:
	case 2:
		//normal
		break;
	case -1:
		prompt_multilogin();
		exit;
	case 3:
		error_alert("���ʺ���ͣ�������ڽ���");
	case 5:
		error_alert("��¼����Ƶ��");
	case 1:
		error_alert("�Բ���ϵͳæµ�����Ժ��ٳ��Ե�¼");
	default:
		error_alert("��¼���󣬴���ţ�" . $error);
}

$data = array();
$num=bbs_getcurrentuinfo($data);

setcookie("UTMPKEY",$data["utmpkey"],time()+600,"/");
setcookie("UTMPNUM",$num,time()+600,"/");
setcookie("USERID",$data["userid"],time()+600);

echo $fromhost. 'hashkey'. $error;
echo "<br>num:";
echo $num;
echo "<br>data:";
print_r($data);
echo "<br> cookie:";
print_r($_COOKIE);

$_COOKIE["UTMPKEY"]=$data["utmpkey"];
$_COOKIE["UTMPNUM"]=$num;
$_COOKIE["UTMPUSERID"]=$data["userid"];
//login_init();
?>
