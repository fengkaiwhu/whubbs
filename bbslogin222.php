<?php

	@$id=$_GET["userid"];
	@$nickname=$_GET["username"];
	@$passwd=$_GET["password"];
$r = bbs_checkpasswd($id,$passwd);

echo($r);
return;


if (($id!="guest")&&bbs_checkpasswd($id,$passwd)!=0) error_alert("ÓÃ»§ÃÜÂë´íÎó£¬ÇëÖØÐÂµÇÂ¼£¡");
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
		error_alert("±¾ÕÊºÅÒÑÍ£»ú»òÕýÔÚ½äÍø");
	case 5:
		error_alert("µÇÂ¼¹ýÓÚÆµ·±");
	case 1:
		error_alert("¶Ô²»Æð£¬ÏµÍ³Ã¦Âµ£¬ÇëÉÔºòÔÙ³¢ÊÔµÇÂ¼");
	default:
		error_alert("µÇÂ¼´íÎó£¬´íÎóºÅ£º" . $error);
}

$data = array();
$num=bbs_getcurrentuinfo($data);

?>
