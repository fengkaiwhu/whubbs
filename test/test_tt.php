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
	  	  echo "��û��Ȩ�޲�����";
	  	  echo"ps:�����ȷ��ӵ���ϴ�Ȩ�ޣ���ô�볢�����²��裺<br>";
	  	  echo"1.���������";
	  	  echo"<br>2.����bbs.whu.edu.cn��½ɽˮ";
	  	  echo"<br>3.���ϴ���������ӣ�";
	  	  exit;
	  }*/
	?>
	�ϴ���վ����(ע���ļ�������Ϊ����)��
		<form action="test_uploadpic.php" method="post" enctype="multipart/form-data" name="form">
		  ���ļ�:<input type="file" name="file">
		  <br>��վͼƬ���ӣ�
		 <input type=text name="picurl">
		 <br>
 <input type="submit" name="Submit" value="�� ��" title="��� �ϴ���ҳͼƬ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="reset" name="reset" value="�� ��"  title="��� �����ϴ�" >
 	 </form>
