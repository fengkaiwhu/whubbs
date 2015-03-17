<?php 
require("www2-funcs.php");
login_init();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link rel="stylesheet" href="tablecloth/tablecloth.css" type="text/css" media="screen" />
    <script type="text/javascript" src="tablecloth/tablecloth.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>珞珈山水2011站衫订购</title>
<style type="text/css">
html {
	height: 100%;
	overflow: hidden;
}
#flashcontent {
	height: 100%;
}
body {
	height: 100%;
	margin: 0;
	padding: 0;
}
a, a:active {
	color:#53A924;
}
</style>
<script>
function isChinese()
{
var Chinese = /[\u4E00-\u9FA5]/g;
var name = document.getElementById('lname').value;
if(Chinese.test(name))
{
}else{
alert('亲耐滴童鞋，请输入您的中文大名好吗？谢谢合作！');
document.getElementById('lname').value="";
}
}

function click1()
{
document.getElementById("lsize").innerHTML="<input type=\"radio\" name=\"size\" value=\"M\" id=\"size_0\" checked=\"checked\"/>M";
document.getElementById("lsize_0").innerHTML="<input type=\"radio\" name=\"size\" value=\"L\" id=\"size_0\" />L";
document.getElementById("lsize_1").innerHTML="<input type=\"radio\" name=\"size\" value=\"XL\" id=\"size_0\" />XL";
document.getElementById("lsize_2").innerHTML="<input type=\"radio\" name=\"size\" value=\"2XL\" id=\"size_0\" />2XL";
document.getElementById("lsize_3").innerHTML="<input type=\"radio\" name=\"size\" value=\"3XL\" id=\"size_0\" />3XL";
document.getElementById("lsize_4").innerHTML="<input type=\"radio\" name=\"size\" value=\"4XL\" id=\"size_0\" />4XL";
}
function click2()
{
document.getElementById("lsize").innerHTML="<input type=\"radio\" name=\"size\" value=\"S\" id=\"size_0\" checked=\"checked\"/>S";
document.getElementById("lsize_0").innerHTML="<input type=\"radio\" name=\"size\" value=\"M\" id=\"size_0\" />M";
document.getElementById("lsize_1").innerHTML="<input type=\"radio\" name=\"size\" value=\"L\" id=\"size_0\" />L";
document.getElementById("lsize_2").innerHTML="<input type=\"radio\" name=\"size\" value=\"XL\" id=\"size_0\" />XL";
document.getElementById("lsize_3").innerHTML="";
document.getElementById("lsize_4").innerHTML="";
}
function click4()
{
document.getElementById("printlabel").innerHTML="";
document.getElementById("lpayway_0").innerHTML="<input type=\"radio\" name=\"payway\" value=\"支付宝(￥27元)\" id=\"payway_0\" onclick=\"click_zfb()\" checked=\"checked\"/>支付宝(￥27元)";
document.getElementById("lpayway_1").innerHTML="<input type=\"radio\" name=\"payway\" value=\"线下支付(￥28元)\" id=\"payway_1\" onclick=\"click_xx()\" />线下支付(￥28元)";
click_zfb();
}
function click3()
{
document.getElementById("printlabel").innerHTML="<input id=\"printid\" name=\"printid\" type=\"text\" value=\"\"/>";
document.getElementById("lpayway_0").innerHTML="<input type=\"radio\" name=\"payway\" value=\"支付宝(￥28元)\" id=\"payway_0\" onclick=\"click_zfb()\" checked=\"checked\"/>支付宝(￥28元)";
document.getElementById("lpayway_1").innerHTML="<input type=\"radio\" name=\"payway\" value=\"线下支付(￥29元)\" id=\"payway_1\" onclick=\"click_xx()\" />线下支付(￥29元)";
click_zfb();
}
function click_zfb()
{
document.getElementById("lpay_0").innerHTML="您已选择支付宝支付方式，打款地址为：ljssbbs@yahoo.cn，打款附注请注明您的Id";
document.getElementById("lpay_1").innerHTML="";
document.getElementById("lpay_2").innerHTML="";
document.getElementById("lpay_3").innerHTML="";
document.getElementById("lpay_4").innerHTML="";
document.getElementById("lpay_5").innerHTML="";
}
function click_xx()
{
document.getElementById("lpay_0").innerHTML="";
document.getElementById("lpay_1").innerHTML="<input type=\"radio\" name=\"payaddress\" value=\"工学部2舍\" id=\"payaddress_1\" checked=\"checked\"/>工学部2舍";
document.getElementById("lpay_2").innerHTML="<input type=\"radio\" name=\"payaddress\" value=\"梅园6舍\" id=\"payaddress_2\" />梅园6舍";
document.getElementById("lpay_3").innerHTML="<input type=\"radio\" name=\"payaddress\" value=\"武测4栋\" id=\"payaddress_3\" />武测4栋";
document.getElementById("lpay_4").innerHTML="<input type=\"radio\" name=\"payaddress\" value=\"湖滨十舍\" id=\"payaddress_4\" />湖滨十舍";
document.getElementById("lpay_5").innerHTML="<input type=\"radio\" name=\"payaddress\" value=\"三环FB栋\" id=\"payaddress_5\" />三环FB栋";
}
</script>
</head>
<body>
<?php
  if($_GET["cancel"] != NULL)
  {
	 	$mysql_server_name = "127.0.0.1";
        $mysql_username = "whubbs";
        $mysql_password = "bbswebwhu";
        $mysql_database = "whuinfo";
        
       
		$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
		mysql_select_db($mysql_database);
	
			$sql = "delete from book where num=".$_GET["cancel"]." and id=\"";
			$sql = $sql.$currentuser["userid"]."\"";
			$result = mysql_query($sql);
			mysql_close($conn);
  }
  if ($_POST["phonenum"] != NULL && $_POST["name"] != NULL)
  {
	 	$mysql_server_name = "127.0.0.1";
        $mysql_username = "whubbs";
        $mysql_password = "bbswebwhu";
        $mysql_database = "whuinfo";
        
       
		$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
		mysql_select_db($mysql_database);
	if($currentuser["userid"] !="guest")
	{
			$sql = "insert into book values (\"";
			$sql = $sql.$_POST["name"]."\",\"";
			$sql = $sql.$_POST["phonenum"]."\",\"";
			$sql = $sql.$_POST["address"]."\",\"";
			$sql = $sql.$_POST["gender"]."\",\"";
			$sql = $sql.$_POST["size"]."\",\"";
			$sql = $sql.$_POST["haveid"]."\",\"";
			$sql = $sql.$_POST["printid"]."\",\"";
			$sql = $sql.$_POST["payway"]."\",\"";
			$sql = $sql.$_POST["payaddress"]."\",\"";
			$sql = $sql.$currentuser["userid"]."\",\"\",\"处理中\",\"\")";
			$result = mysql_query($sql);
			}
			mysql_close($conn);
  }
  ?>
<div>
  <form method="post" action="book.php" id='voteform'><table class="jstable">
    <tr><th width="200px">订购者姓名:</th><td>
      <input type="text" name="name" value="" id="lname"/>
      </td></tr>
    <tr><th>联系电话:</th><td>
    <input name="phonenum" type="text" value="" onclick="isChinese()"/>
     </td></tr>
     <tr><th>订购款式:</th><td>
      <label>
      <input name="gender" type="radio" id="gender_0" value="男" checked="checked"  onclick="click1()"/>
男</label>
      <label>
      <input type="radio" name="gender" value="女" id="gender_1" onclick="click2()" />
女</label>
      </td></tr>
     <tr><th>订购尺码:</th><td>
      <label id="lsize">
      <input type="radio" name="size" value="M" id="size" checked="checked"/>
M</label>
      <label id="lsize_0">
      <input type="radio" name="size" value="L" id="size_0" />
L</label>
      <label id="lsize_1">
      <input type="radio" name="size" value="XL" id="size_1" />
XL</label>
      <label id="lsize_2">
      <input type="radio" name="size" value="2XL" id="size_2" />
2XL</label>
      <label id="lsize_3">
      <input type="radio" name="size" value="3XL" id="size_3" />
3XL</label>
      <label id="lsize_4">
      <input type="radio" name="size" value="4XL" id="size_4" />
4XL</label>
      </td></tr><tr><th>尺码对照:</th>
      <td>男:M-165&nbsp;&nbsp;L-170&nbsp;&nbsp;XL-175&nbsp;&nbsp;2XL-180&nbsp;&nbsp;3XL-185&nbsp;&nbsp;4XL-190<br />
        女:S-155&nbsp;&nbsp;M-160&nbsp;&nbsp;L-165&nbsp;&nbsp;XL-170</td>
      </tr>
   <tr><th>是否加印ID(加印ID需要一元钱)</th><td>
   	  <label>
			<input type="radio" name="haveid" value="是" id="haveid_0" onclick="click3()" /> 
是</label>
      <label>
      <input name="haveid" type="radio" id="haveid_1" value="否" checked="checked" onclick="click4()" />
否</label>
      </td></tr>
   <tr><th>请填写所印ID</th><td>
        <label id="printlabel"></label>（仅限字母和数字，15个字符以内）
     </td></tr>
 
     <tr><th>支付方式(请尽量使用支付宝)</th><td>
			<label id="lpayway_0">
      <input name="payway" type="radio" id="payway_0" value="支付宝(￥27元)" checked="checked" onclick="click_zfb()" />
支付宝(￥27元)</label>
      <label id="lpayway_1">
			<input type="radio" name="payway" value="线下支付(￥28元)" id="payway_1" onclick="click_xx()" /> 
线下支付(￥28元)</label>
      </td></tr>
     
     <tr><th>线下支付地点</th><td>
     	<label id="lpay_0"></label>
     	<label id="lpay_1"></label>
     	<label id="lpay_2"></label>
     	<label id="lpay_3"></label>
     	<label id="lpay_4"></label>
     	<label id="lpay_5"></label>
     <!-- <label id="lpay_0">
      <input name="payaddress" type="radio" id="payaddress_0" value="工学部2舍" checked="checked" />
工学部2舍</label>
      <label id="lpay_1">
      <input type="radio" name="payaddress" value="梅园6舍" id="payaddress_2" />
梅园6舍</label>
      <label id="lpay_2">
      <input type="radio" name="payaddress" value="武测4栋" id="payaddress_3" />
武测4栋</label>
      <label id="lpay_3">
      <input type="radio" name="payaddress" value="湖滨十舍" id="payaddress_4" />
湖滨十舍</label>
      <label id="lpay_4">
      <input type="radio" name="payaddress" value="三环FB栋" id="payaddress_5" />
三环FB栋</label>-->
     </td></tr>
     <tr><th>校内送货区域</th><td>
      <label>
      <input name="address" type="radio" id="address_0" value="樱园" checked="checked" />
樱园</label>
			<label>
      <input name="address" type="radio" id="address_1" value="桂园" />
桂园</label>
			<label>
      <input name="address" type="radio" id="address_2" value="梅园" />
梅园</label>
      <label>
      <input type="radio" name="address" value="工学部" id="address_3" />
工学部</label>
      <label>
      <input type="radio" name="address" value="信息学部" id="address_4" />
信息学部</label>
      <label>
      <input type="radio" name="address" value="枫园" id="address_5" />
枫园</label>
			<label>
      <input type="radio" name="address" value="湖滨" id="address_6" />
湖滨</label>
      <label>
      <input type="radio" name="address" value="三环" id="address_7" />
三环</label>
      <label>
      <input type="radio" name="address" value="医学部" id="address_8" />
医学部</label>
      <label>
      <input type="radio" name="address" value="宏博公寓" id="address_9" />
宏博公寓</label>
      <label>
      <input type="radio" name="address" value="外地" id="address_10" />
外地</label>
     </td></tr>
     <tr><th></th><td>
      <?php if ($currentuser["userid"]!='guest') 
      echo "<input type=\"submit\" value=\"订购\"/>";
      else echo "guest用户无法订购<a href='http://bbs.whu.edu.cn'>返回登录页面</a>"; ?>
</td></table>
  </form>
</div>
<table class="jstable"><tr><th>订单编号</th><th>订购者姓名</th><th>联系电话</th><th>校内送货区域</th><th>款式</th><th>尺码</th><th>是否加印ID</th><th>所印ID</th><th>支付方式</th><th>线下支付地点</th><th>取消订购</th><th>处理信息</th></tr>
  <?php
	 	$mysql_server_name = "127.0.0.1";
        $mysql_username = "whubbs";
        $mysql_password = "bbswebwhu";
        $mysql_database = "whuinfo";
        
       
		$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
		mysql_select_db($mysql_database);
		
			$sql = "select * from book where id=\"".$currentuser["userid"]."\"";
			$record = mysql_query($sql);
			while ($arr = mysql_fetch_array($record))
			{
			echo "<tr><td>".$arr[10]."</td><td>".$arr[0]."</td><td>".$arr[1]."</td><td>".$arr[2]."</td><td>".$arr[3]."</td><td>".$arr[4]."</td><td>".$arr[5]."</td><td>".$arr[6]."</td><td>".$arr[7]."</td><td>".$arr[8]."</td><td>";
			if($arr[11]!='accept')
			{
			echo "<a href='book.php?cancel=".$arr[10]."'>取消订购</a>";
			}
			else
			{
			echo "订单已接受";
			}
			echo "</td><td>".$arr[11]."</td></tr>";
			}
			mysql_close($conn);
?>
</table>
</body>
</html>
