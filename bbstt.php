<?php
	//foreach($_COOKIE as $key=>$value)
	  $userid = $_COOKIE['UTMPUSERID'];
	  echo"<br><br><br>";
	  $flag =false;
          //��������id��nobodyelse,winnersvicto,davidxn    -- 2013.07.15 by davidxn
	  //yubaoriyue, amigo  -- 2014.06.08 by davidxn
	  $uploaduser=array('jiangyou','zhl2007','BabyBlue','SYSOP','tedy','siximu','SUPERKING','nobodyelse','winnersvicto','davidxn','yubaoriyue','amigo');
	  foreach($uploaduser as $user){
	  	  if($user == $userid) $flag = true;
	  }
	  if(!$flag){
		echo $userid;
	  	  echo "��û��Ȩ�޲�����";
	  	  echo"ps:�����ȷ��ӵ�н�վ����Ȩ�ޣ���ô�볢�����²��裺<br>";
	  	  echo"1.���������";
	  	  echo"<br>2.����bbs.whu.edu.cn��½ɽˮ";
	  	  echo"<br>3.���ϴ���������ӣ�";
	  	  exit;
	  }
	?>
	�޸Ľ�վģʽ��
	<form action="change.php" method="post" enctype="multipart/form-data" name="form">
		<input type="radio" name="tpye" value = "single">����վͼƬģʽ<br>
		<br><input type="radio" name="tpye" value = "multiple">���վͼƬģʽ<br><br>
        <input type="submit" name="Submit" value="ȷ ��" title="ȷ���޸�">
 	</form>
	<br>
	<a href="indexpages/now/tt.php">����վģʽ��վ�ϴ�</a>
	<br><br>
	<a href="indexpages/now/tt2.php">���վģʽ��վ�ϴ�</a>
	
