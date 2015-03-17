	<?php

	@$userid=$_GET["userid"];
	@$nickname=$_GET["username"];
	@$password=$_GET["password"];

   ////////检查id是否被占用//////
   //	if(($userid!="")&&check_givenpost($userid,$xh,$sfzh)){
	//html_error_quit("这个id已被占用，可能会导致您实名失败，建议您更换一个ID重新注册！");
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
			echo("用户名有非数字字母字符或者首字符不是字母!");
			break;
	case 2:
			echo("用户名至少为两个字母!");
			break;
	case 3:
			echo("系统用字或不雅用字!");
			break;
	case 4:
			echo("该用户名已经被使用!");
			break;
	case 5:
			echo("用户名太长,最长12个字符!");
			break;
	case 6:
			echo("密码太长,最长39个字符!");
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
			echo("注册ID时发生未知的错误!");
			break;
	}
	?>