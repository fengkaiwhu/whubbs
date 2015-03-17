
<?php
require("../www2-funcs.php");

function getbbsuser($userid)
{
	//$user;
	$userarray=array();
	if (bbs_getuser($userid,$userarray)) 
	{
		return $userarray;
	}
	else
	{
		return false;
	}
}
$userid = $_GET['userid'];
$user = getbbsuser($userid);
echo $userid.'  '.$user['reg_email'];

?>