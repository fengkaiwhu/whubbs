<?php
session_start();
// 生成随机图片，rand为session的名称。

$session_name=$_GET["s"];
if(empty($session_name))
 checkImage("rand");
else 
 checkImage($session_name);


function checkImage($rand)
{
	$str=getRand(4);
    $_SESSION[$rand]=$str;
    createimage($str);	
}

//生成一个随机数
function getRand($num)
{
	$str="";
	$arrlist=array('A','B','C','D','E','F','G','H','I','J','K','M','N','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9');
	$len=count($arrlist)-1;
	for($i=0;$i<$num;$i++)
	{
		$str.=$arrlist[rand(0,$len)];
		
	}
	return $str;	
}

function createimage($str)
{
//创建画布
$im=imagecreate(50,20);
$bj=imagecolorallocate($im,0xff,0xff,0xff);

////画矩形
$color2=imagecolorallocate($im,33,33,33);
imagerectangle($im,0,0,50-1,20-1,$color2); 


for($i=0;$i<strlen($str);$i++)
imagestring($im,3,5+($i*10),2,$str[$i],$color2);


imagejpeg($im);
imagedestroy($im);
//指定文档输出类型
header("content-type:image/jpeg");
}
?>