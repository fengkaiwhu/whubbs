<?php
	require("www2-funcs.php");
	login_init();
	assert_login();
	page_header("ɾ������");
	$board = $_GET["board"];
	$id = $_GET["id"];

	global $currentuser;//added by davidxn before double eleven of 2012
	if( $borad=="single" && !($currentuser["userlevel"] & BBS_PERM_SYSOP ) ){
		html_error_quit("You don't have the right to delete this article.Please contact the system manager!");
		return;
	}
	$ret = bbs_delpost($board,$id); // 0 success -1 no perm  -2 wrong parameter
	switch($ret)
	{
	case -1:
		html_error_quit("����Ȩɾ������!");
		break;
	case -2:
		html_error_quit("����İ����������º�!");
		break;
	default:
		html_success_quit("ɾ���ɹ�.<br><a href=\"bbsdoc.php?board=" . $board . "\">���ر�������</a>");
	}
?>
