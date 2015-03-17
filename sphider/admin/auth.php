<?php 
	error_reporting(E_ERROR | E_PARSE);	
	$admin = "whubbs";
	$admin_pw = "bbswebwhu";

	session_start();
	
if (isset($_POST['user']) && isset($_POST['pass'])) {

	$username = $_POST['user'];
	$password = $_POST['pass'];
	if (($username == $admin) && ($password ==$admin_pw)) {
		$_SESSION['admin'] = $username;
		$_SESSION['admin_pw'] = $password;
	}
	header("Location: admin.php");
} elseif ((isset($_SESSION['admin']) && isset($_SESSION['admin_pw']) &&$_SESSION['admin'] == $admin && $_SESSION['admin_pw'] == $admin_pw ) || (getenv("REMOTE_ADDR")=="")) {

} else {
	
	?>
	<html>
	<head>
	<title>Sphider 管理登陆入口</title>
		<LINK REL=STYLESHEET HREF="admin.css" TYPE="text/css">
	</head>

	<body>
	<center>
	<br><br>
	
	<fieldset style="width:30%;"><legend><b>Sphider 管理登陆入口</b></legend>
	<form action="auth.php" method="post">
	
	<table>
	<tr><td>管理帐号</td><td><input type="text" name="user"></td></tr>
	<tr><td>管理密码</td><td><input type="password" name="pass"></td></tr>
	<tr><td></td><td><input type="submit" value="登陆" id="submit"></td>
	</tr></table>
	</form>
	</fieldset>
	</center>
	</body>
	</html>
	<?php 
	exit();
}


$settings_dir = "../settings";
include "$settings_dir/database.php";

?>