<?php
session_start();
include("../config.php");
include("../class/upload.class.php");

if($_GET["action"]!="upfile")
 die("操作有误");
if($_SESSION["jwork_upload"]=="")
 die("上传来源有误");
upload();
function upload()
{
	
	
$cname=$_FILES['photo']['name'];
preg_match("/\.[a-z0-9]{3,5}$/i",$cname,$typearray);

$filetype=$_FILES["photo"]["type"];
global  $uploadlist;
global  $uploadsize;

if(!preg_match("/{$typearray[0]}/i",$uploadlist))
error("上传文件格式不正确！");


$size=$_FILES["photo"]["size"]/1024;
if($size>$uploadsize)
error("上传文件超过$uploadsize"."K，请缩小文件！");

$filetype=strstr($cname,".");
$filetype=strstr($filetype,".");

$filename=date("ymd_His")."_".rand(10,99);
$filename=$filename.$filetype;
$path=$_REQUEST["path"];


$dir_path=$_SERVER['DOCUMENT_ROOT']."/".$path;
$target_path =$dir_path.'/'.$filename;
$target_path=str_replace("//","/",$target_path);


// 目录不存在，则创建路径
if(!is_dir($dir_path))
@mkdir($dir_path);
	
move_uploaded_file($_FILES['photo']['tmp_name'], $target_path); 

if(file_exists($target_path)) 
 sucess("文件上传成功！",$filename);
else  
 error("文件上传失败！");


} 


function error($str)
{

	echo "<script language=javascript>alert('$str');history.go(-1);</script>";
	die();
	
}

function sucess($str,$filename)
{
 echo "<script language=javascript>alert('$str');window.opener.document.getElementById('".$_REQUEST["input"]."').value='$filename';window.opener='xxx';window.close();</script>"; 
}


?>
