<?php
$page = $_GET['page'];
if($page == null) $page = 1;
// var_dump($page);
?>

<input type = "textfield" id = "search" />
<input type = "button" value = "search" onclick = "search();"><br>
<script type="text/javascript">
function search() {
	var userid = document.getElementById("search").value;
	window.location.href="http://bbs.whu.edu.cn/hsy/search.php?userid="+userid;
}
</script>
<input type = "button" value = "next page" onclick = "window.location.href='http://bbs.whu.edu.cn/hsy/hsy.php?page=<?php echo $page+1?>'">
<br>


<?php
include_once('jwork/Data.php');
require("../www2-funcs.php");


$biye = getBiYe();
foreach ($biye as $v) {
	$userid = $v['bbsid'];
	$user = getbbsuser($userid);
	// var_dump($user);
	echo $userid."    ";
	echo $user['reg_email'];
	echo '<br>';
}


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

function getBiYe() {
	global $page;
	$sql="select bbsid from bbsinfo b where b.swnum in (select xh from stuinfo where rxnf+xz=2014) limit 100 offset ".(($page-1)*100);
	// var_dump($page);
	$data = new Data();
	$result=$data->sqlArray($sql);
	return $result;
}

?>