<?php 
include("../config.php");
session_start();
$_SESSION["jwork_upload"]="jowrk";

if($_REQUEST["input"]=="")
 $input="photo";
else
 $input=$_REQUEST["input"]; 
 
 $repath=$_REQUEST["path"];
if(empty($repath))
 $path=$uploadpath;
else
{
 if(preg_match("/^\//",$repath))
   $path=$repath;
  else 
   $path=$uploadpath."/".$repath;
}

if(!empty($webpath)&&$webpath!="/")
 $path=$webpath."/".$path;

 $path=str_replace("//","/",$path);

?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html> 
<head> 
<title>文件上传</title> 
<meta http-equiv="Content-Type" content="text/html; charset=gbk">

<style type="text/css">
<!--
body {
	background-color: #DFF2FF;
	margin-left: 3px;
	margin-top: 3px;
	font-size:14px;
}
#container{width:98%;background:#ffffff;margin:4px auto;border:solid 2px #cccccc;padding:4px;height:73px;}
#ua{border-bottom:dotted 1px #cccccc;height:20px;padding-top:5px;}
#ub{margin-top:10px;font-size:14px;}
form{padding:0px;margin:0px;}
-->
</style>
</head> 

<body> 

<div id="container">
 
<form action="../class/upload.class.php" method="post" name="UForm" enctype="multipart/form-data"> 
  <div id="ua">请选择文件： </div>
  <div id="ub">
	 <input type="file" name="photo" style="margin-right:2px;">
	  <input type="file" name="photo2" style="margin-right:2px;">
	 <input type="submit" value="上传">
	 <input type="hidden" name="input" value="<?php echo $input ?>">
	 <input type="hidden" name="path" value="<?php echo $path ?>">
</div>
</form>
</div>

</body> 
</html>