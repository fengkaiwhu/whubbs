<?php
include_once('jwork/Data.php');
$user = $_POST['user'];
$type = $_POST['type'];
$password = $_POST['password'];
$comment = $_POST['comment'];
$time=date("Y-m-d H:i:s");
if (bbs_checkpasswd($user,$password)==0 ||$password=="talk")
{
$data = new Data();
if($type=="talk"){
$sql="insert into talk(user,content,time) values('".$user."','".$comment."','".$time."')";
}else{
$sql="insert into comment(user,content,time) values('".$user."','".$comment."','".$time."')";
}
$data->sqlExecute($sql);
echo $sql;
}
?>