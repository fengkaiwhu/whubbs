<?php

	@$id=$_GET["userid"];
	@$nickname=$_GET["username"];
	@$passwd=$_GET["password"];
$r = bbs_checkpasswd($id,$passwd);

echo($r);
return;


if (($id!="guest")&&bbs_checkpasswd($id,$passwd)!=0) error_alert("�û�������������µ�¼��");
$error=bbs_wwwlogin(($kick_multi!="") ? 1 : 0, $fromhost, $fullfromhost);
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

?>
