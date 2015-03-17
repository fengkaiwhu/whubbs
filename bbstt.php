<?php
	//foreach($_COOKIE as $key=>$value)
	  $userid = $_COOKIE['UTMPUSERID'];
	  echo"<br><br><br>";
	  $flag =false;
          //加了三个id：nobodyelse,winnersvicto,davidxn    -- 2013.07.15 by davidxn
	  //yubaoriyue, amigo  -- 2014.06.08 by davidxn
	  $uploaduser=array('jiangyou','zhl2007','BabyBlue','SYSOP','tedy','siximu','SUPERKING','nobodyelse','winnersvicto','davidxn','yubaoriyue','amigo');
	  foreach($uploaduser as $user){
	  	  if($user == $userid) $flag = true;
	  }
	  if(!$flag){
		echo $userid;
	  	  echo "您没有权限操作！";
	  	  echo"ps:如果您确定拥有进站管理权限，那么请尝试以下步骤：<br>";
	  	  echo"1.重启浏览器";
	  	  echo"<br>2.进入bbs.whu.edu.cn登陆山水";
	  	  echo"<br>3.打开上传界面的链接！";
	  	  exit;
	  }
	?>
	修改进站模式：
	<form action="change.php" method="post" enctype="multipart/form-data" name="form">
		<input type="radio" name="tpye" value = "single">单进站图片模式<br>
		<br><input type="radio" name="tpye" value = "multiple">多进站图片模式<br><br>
        <input type="submit" name="Submit" value="确 认" title="确认修改">
 	</form>
	<br>
	<a href="indexpages/now/tt.php">单进站模式进站上传</a>
	<br><br>
	<a href="indexpages/now/tt2.php">多进站模式进站上传</a>
	
