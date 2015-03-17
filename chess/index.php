<?php
include "./functions.php";
include "./dbconnect.php";
mysql_query("delete from `room` where '".time()."' - `time` > 30");
if(isset($_COOKIE[message]))
{
echo "<script>alert('".$_COOKIE[message]."');</script>";
setcookie(message, null);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>中国象棋online</title>
<style>
body{
font-size:15px;
}
A:visited {
	COLOR: #000000; TEXT-DECORATION: none
}
A:hover {
	COLOR: #000000; TEXT-DECORATION: underline
}
A:active {
	COLOR: #000000; TEXT-DECORATION: none
}
A:link {
	COLOR: #000000; TEXT-DECORATION: none
}
</style>
</head>

<body>
<?php if($_COOKIE["UTMPUSERID"]!="guest"&&$_COOKIE["UTMPUSERID"]!=""&&$_COOKIE["UTMPUSERID"]!=NULL) {
setcookie(username, str_replace("<", "&lt;", str_replace(">", "&gt;", $_COOKIE["UTMPUSERID"])));?>
<table>
<tr><td colspan="2"></td><td>
	<form name=form method=post action=change_name.php style="margin:0px">
	<table>
		<tr>
			<td style="display:none">
			<?php echo $_COOKIE["UTMPUSERID"];?>您好！<input style="display:none" name=name type=text value=<?php echo $_COOKIE["UTMPUSERID"];?> size=12 maxlength="12">
			</td>
		</tr>
	</table>
	</form>
	<form name="form" method="post" action="add_d.php" style="margin:0px">
	<table><tr><td>新建房间：</td><td><input type="text" name="name" size="25" value="<?php echo "".$_COOKIE["UTMPUSERID"]."的房间";?>" /> <input type=submit value=新建></td></tr></table>
	</form>
</td></tr>
<tr><td></td><td colspan="2">
<div id="rooms">loading...</div>
</td></tr>
</table>
<script>
var http_request = false;
function send_request(url) {
	http_request = false;
	if (window.XMLHttpRequest) { 
		http_request = new XMLHttpRequest();
		if (http_request.overrideMimeType) {
		http_request.overrideMimeType('text/xml');
		}
	} else if (window.ActiveXObject) { 
		try {
		http_request = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
			http_request = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	if (!http_request) {
	alert('不能创建 XMLHttpRequest 对象!');
	return false;
	}
	http_request.onreadystatechange = processRequest;
	http_request.open('GET', url, true);
	http_request.send(null);
}


//处理返回信息
function processRequest() {
	if (http_request.readyState == 1) {
	//alert('正在连接');
	//document.getELementById('network_status').innerHTML = '正在连接..';
	}
	if (http_request.readyState == 4) {
		if (http_request.status == 200) {
			document.getElementById('rooms').innerHTML = http_request.responseText;
		}
	}
}
function get_room_info(){
	send_request("get_room_info.php?time="+Math.random());
}
get_room_info();
setInterval("get_room_info()", 5000);
</script>
<?php }else{?>
<div>guest用户无法进入！</div>
<?php } ?>
</body>
</html>