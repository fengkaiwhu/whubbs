<?php

 //将图片复制到本地
  $imgpath="http://img.baidu.com/img/logo-mp3.gif";
  $uppaths="UserFiles";
  $dir=date("Y_m");
  if(is_dir($uppaths)!=TRUE) mkdir($uppaths,0777);
  if(is_dir($uppaths."/".$dir)!=TRUE) mkdir($uppaths."/".$dir,0777);
  $name="333.gif"; 
  $name=$uppaths."/".$dir."/".$name.$rs[9]; 
  if(copy($imgpath,$name));
  $imgpath=$name;
?>