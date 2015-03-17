<?php
 if(empty($_FILES['top_ad_src'])||$_FILE['top_ad_src']['error'])
 {
	echo "发生错误！";
	exit;
 }
 if(empty($_FILES['mid_ad_src'])||$_FILE['mid_ad_src']['error'])
 {
	echo "发生错误！";
	exit;
 }
 $top_ad_url ="";
 $mid_ad_url="";
 if(!empty($_POST['top_ad_url'])){
 $picurl = $_POST['top_ad_url'];
 }
 if(!empty($_POST['mid_ad_url'])){
 $picurl = $_POST['mid_ad_url'];
 }
 $dst="/home/bbs/ljss/www2/test";
 $new1=$dst.$_FILES['top_ad_src']['name'];
 $new2=$dst.$_FILES['mid_ad_src']['name'];

 $indexfile ="test_mainpage.php";
 if (copy($_FILES['top_ad_src']['tmp_name'],$new1))
{	
	changeindex($_FILES['top_index_src']['name'],$indexfile,$top_ad_url);
}
 if (copy($_FILES['mid_ad_src']['tmp_name'],$new1))
{	
	changeindex($_FILES['mid_index_src']['name'],$indexfile,$mid_ad_url);
}
	
function changeindex($filename,$indexfile,$picurl){
$fp = fopen($indexfile,"r");
$content = fread($fp,filesize("test_mainpage.php"));
$content = str_replace("{{top_ad_src}}",$filename,$content);
$content = str_replace("{{top_ad_url}}",$picurl,$content);
$content = str_replace("{{mid_ad_src}}",$filename,$content);
$content = str_replace("{{mid_ad_url}}",$picurl,$content);

$files = "mainpage.php";
//chmod($dst.$files,0777);
ob_start();
echo $content;
$cont =ob_get_contents();
$fp = fopen($files,'w');
fwrite($fp,$cont);
fclose($fp);
}
	?>
