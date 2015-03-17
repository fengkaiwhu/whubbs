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
    error_alert("对不起，当前位置不允许登录该ID。");
    break;
case 2:
    error_alert("该 ID 不欢迎来自该 IP 的用户。");
    break;
}

if (($id!="guest")&&bbs_checkpasswd($id,$passwd)!=0) error_alert("用户密码错误，请重新登录！");
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
		error_alert("本帐号已停机或正在戒网");
	case 5:
		error_alert("登录过于频繁");
	case 1:
		error_alert("对不起，系统忙碌，请稍候再尝试登录");
	default:
		error_alert("登录错误，错误号：" . $error);
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
