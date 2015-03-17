<?php
	//通用配置文件,需要在所有文件中都包含此文件
	define('SMARTY_DIR','/home/bbs/ljss/www2/libs/');
//	define('WWW_ROOT','/home/wwwroot/xForum/public/Smarty-3.1.21/demo/');
	require_once(SMARTY_DIR.'Smarty.class.php');
	$smarty = new Smarty();//建立实例化对象$smarty
	//$smarty->caching = false;//是否使用缓存，项目调试期间，不建议使用缓存。  
	$smarty->template_dir ="./templates";//设置模版目录
	$smarty->compile_dir ="./templates_c";//设置编译目录
	$smarty->cache_dir ="./cache";//缓存文件夹
?>
