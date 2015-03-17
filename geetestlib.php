<?php
/**
 * 极验行为式验证安全平台，php 网站主后台包含的库文件
 */

define("PRIVATE_KEY","9bf96071b80aa0a64b8041ccc703c0c2");

function geetest_validate($challenge, $validate) {	

	$md5_validate = substr($validate, 0, 32); //获取出真实的validate 值
	$vtime = intval(substr($validate, 32)); // 获取过期时间，如 60 ，那么同一个challenge提交到后台的有效期是 60s-120s等	
	if ($vtime == 0) {
		return false;
	}

	$vtime = intval(time() / $vtime);
	if ($md5_validate == md5(PRIVATE_KEY.'geetest'.$challenge.$vtime) || $md5_validate == md5(PRIVATE_KEY.'geetest'.$challenge.($vtime - 1)) ) {
		return true;
	} else {
		return false;
	}	
}
?>