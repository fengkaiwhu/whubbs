<?php
	//foreach($_COOKIE as $key=>$value)
	  $userid = $_COOKIE['UTMPUSERID'];
	  echo"<br><br><br>";
	  $flag =false;
	  $uploaduser=array('zhaiwx1987','BabyBlue','afc163','SYSOP','Katze','kky','sumiyixin');
	  foreach($uploaduser as $user){
	  	  if($user == $userid) $flag = true;
	  }
/*	  if(!$flag){
	  	  echo "您没有权限操作！";
	  	  echo"ps:如果您确定拥有上传权限，那么请尝试以下步骤：<br>";
	  	  echo"1.重启浏览器";
	  	  echo"<br>2.进入bbs.whu.edu.cn登陆山水";
	  	  echo"<br>3.打开上传界面的链接！";
	  	  exit;
	  }*/
	?>
	上传进站画面(注意文件名不能为中文)：
		<form action="test_uploadpic.php" method="post" enctype="multipart/form-data" name="form">
		  打开文件:<input type="file" name="file">
		  <br>进站图片链接：
		 <input type=text name="picurl">
		 <br>
 <input type="submit" name="Submit" value="上 传" title="点击 上传主页图片">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="reset" name="reset" value="重 置"  title="点击 重新上传" >
 	 </form>
