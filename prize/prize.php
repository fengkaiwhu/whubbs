<?php 
require("../www2-funcs.php");
login_init();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../tablecloth/tablecloth.css" type="text/css" media="screen" />
<title>蔡康永说话之道高校巡回演讲赠票领取</title>
<style type="text/css">
html {
}
#flashcontent {
}
body {
	font-family: verdana, arial, sans-serif;
	margin: 0;
	/* [disabled]padding: 0; */
}
a, a:active {
	color:#53A924;
}
a:hover {
}
a:active {
}
#flashError {
	padding: 20px;
	font-family:"方正姚体", Tahoma, "黑体", "宋体";
}
</style>
</head>
<body>
  
  <?php
		  function right4($orig)
		  {
			  return substr($orig,-4,4);
		  }
  
  		  // 生成随机数
		  function gencode($source)
		  {
			  if(strlen($source)<1)
			  return '';
			  $left=md5($source);
			  return strtoupper(right4($left)).right4($source);
		  }
  
	 	$mysql_server_name = "localhost";
        $mysql_username = "whubbs";
        $mysql_password = "bbswebwhu";
        $mysql_database = "whuinfo";
        
       
		$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
		mysql_query("set names 'UTF-8'"); 
		mysql_select_db($mysql_database);
		
			//检查实名
			$sql = "select idcard from bbsinfo where bbsid='".$currentuser["userid"]."'";
			$record = mysql_query($sql);
			$real=false;
			while ($arr = mysql_fetch_array($record))
			{
				if(strlen($arr[0])>5){
					$real=true; //实名过
					$sfzh=$arr[0];
				}
			}
		
			//检查马甲
			$sql = "select majia from prize where id='".$currentuser["userid"]."'";
			$record = mysql_query($sql);
			while ($arr = mysql_fetch_array($record))
			{
				
				$can=true; //可以领奖
				if($arr[0]=='true')
				{
					$re=true;  //马甲
					$can=false;
				}
			}
		
			$sql = "select * from prize where id='".$currentuser["userid"]."'";
			$record = mysql_query($sql);
			while ($arr = mysql_fetch_array($record))
			{
				if(strlen($arr[3])>0)
					$code=$arr[3]; //得到旧验证码
				if($arr[2]=='false')
					$noshiming=true;
					$majiashiming=$arr[4];
			}
			
			
		if($_POST['bbsid']==$currentuser["userid"]){
			if($re)
				echo "<script>alert('朋友，别以为你披个马甲我就不认识你了(*^__^*) ');</script>";
			else if($real&&$can){ //实名过
				if($sfzh==$_POST['sfzh']) {//验证通过
					echo "<script>alert('验证通过，您的领奖号码为".gencode($sfzh)."');</script>";
					$sql = "update prize set sfzh='".$sfzh."' where id='".$currentuser["userid"]."'";
					$record = @mysql_query($sql);
				}else{
					echo "<script>alert('验证不通过，请检查信息是否填写正确');</script>";
				}
			}else if(!$real &&$can){
					$sfzh=$_POST['sfzh'];
					if($noshiming)
					echo "<script>alert('验证通过，您的领奖号码为".gencode($majiashiming)."');</script>";
					else
					echo "<script>alert('验证通过，您的领奖号码为".gencode($_POST['sfzh'])."');</script>";
					$sql = "update prize set sfzh='".$_POST['sfzh']."', majia='false',shiming='".$_POST['sfzh']."' where id='".$currentuser["userid"]."' and shiming is null";
					$record = @mysql_query($sql);
			}
		}
		
		
			$sql = "select sfzh from prize where id='".$currentuser["userid"]."'";
			$record = mysql_query($sql);
			while ($arr = mysql_fetch_array($record))
			{
				$can=true; //检查是否可以领取
				if(strlen($arr[3])>0){
					$code=$arr[3];
					$havecode=true;
				}
			}
	?>
<table class="jstable">
  <tr>
    <td colspan="5">说明：<BR><BR>
    本页面将用于领取您的"蔡康永说话之道高校巡回演讲"门票验证码，点击领奖按钮将验证您的注册资料，以保证每人最多只能领取一张门票。  <BR>
    由于为防止冒领，活动开始使用新验证码，新验证码包含您身份证最后四位信息以及部分加密信息，领票时请<font color="red">务必带上身份证（不需要学生证）</font><br>
    旧验证码不再有效，同时本站承诺保证对您的注册资料保密。<BR>
    如果您对您的注册资料有安全顾虑，请不要填写任何信息并离开此页面。否则视为您同意我们使用您的注册资料进行验证。<BR>
该说明最终解释权归本站所有。
    <BR>
    </td>
  </tr>
  <tr>
    <td colspan="5">您的ID为<?php echo $currentuser["userid"]; ?>，您<?php if(!$can) echo "不"; ?>可以领奖。<?php if($can) {?><form method="post"><input type="hidden" name="bbsid" value="<?php echo $currentuser["userid"]; ?>"><br>身份证号码：<br><input name='sfzh' type="text" maxlength="20"><BR><BR><input type="submit" value="领奖"></form><?php } ?></td>
  </tr>
  <tr>
    <th>序号</th>
    <th>BBS ID</th>
    <th>领取码</th>
    <th>批次</th>
  </tr>
  <?php
	 	$mysql_server_name = "127.0.0.1";
        $mysql_username = "whubbs";
        $mysql_password = "bbswebwhu";
        $mysql_database = "whuinfo";
        
       
		$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
		mysql_query("set names 'UTF-8'"); 
		mysql_select_db($mysql_database);
		
			$sql = "select * from prize order by num";
			$record = mysql_query($sql);
			$index=1;
			while ($arr = mysql_fetch_array($record))
			{
				if($arr[2]=='true') $str=" style='color=red' ";
				else if($arr[2]=='false' &&($currentuser["userid"]=='tedy'||$currentuser["userid"]=='kxklt')) $str=" style='color=blue' ";
				else $str="";
				if($index<=200)
				$oldcode="【".$arr[3]."】";
				else 
				$oldcode='';
				if($currentuser["userid"]=='tedy'||$currentuser["userid"]=='kxklt'||$currentuser["userid"]=='Katze')
				if(strlen($arr[4])>1){
					echo "<tr".$str."><td>".$index++."</td><td>".$arr[0]."</td><td>".gencode($arr[4]).$oldcode."</td><td>第".$arr[5]."批</td></tr>";
				}else {
					echo "<tr".$str."><td>".$index++."</td><td>".$arr[0]."</td><td>".gencode($arr[1]).$oldcode."</td><td>第".$arr[5]."批</td></tr>";
				}
				else 
				{
					echo "<tr".$str."><td>".$index++."</td><td>".$arr[0]."</td><td>";
					if($arr[2]!='true') echo "********";
					else echo "未通过公平检验";
					echo"</td><td>第".$arr[5]."批</td></tr>";
				}
			}
			mysql_close($conn);
?>
</table>
</body>
</html>
