	<?php

	@$userid=$_GET["userid"];
	@$nickname=$_GET["username"];
	@$password=$_GET["password"];

   ////////���id�Ƿ�ռ��//////
   //	if(($userid!="")&&check_givenpost($userid,$xh,$sfzh)){
	//html_error_quit("���id�ѱ�ռ�ã����ܻᵼ����ʵ��ʧ�ܣ�����������һ��ID����ע�ᣡ");
	//exit;
//	}
   ///////////////////////////	
	
	echo($userid.'  '.$password.'  '.$nickname);
	//create new id
	$ret=bbs_createnewid($userid,$password,$nickname);

	switch($ret)
	{
	case 0:
			break;
	case 1:
			echo("�û����з�������ĸ�ַ��������ַ�������ĸ!");
			break;
	case 2:
			echo("�û�������Ϊ������ĸ!");
			break;
	case 3:
			echo("ϵͳ���ֻ�������!");
			break;
	case 4:
			echo("���û����Ѿ���ʹ��!");
			break;
	case 5:
			echo("�û���̫��,�12���ַ�!");
			break;
	case 6:
			echo("����̫��,�39���ַ�!");
			break;
	case 10:
			echo("error 10   contact sysadmin");
			break;
	case 11:
			echo("error 11   dir is already exists");
			break;
	case 12:
			echo("error 12   alloc id error.");
			break;
	case 13:
			echo("error 13   get user error.");
			break;			
	default:
			echo("ע��IDʱ����δ֪�Ĵ���!");
			break;
	}
	?>