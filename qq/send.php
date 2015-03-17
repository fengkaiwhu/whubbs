<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>PHP 连接 QQ Robot 发送消息演示</title>
<style type="text/css">
<!--
.style1 {color: #006600}
-->
</style>
</head>

<body>

<div>
这个PHP程序是为了演示如何在PHP中使用QQ机器人的消息发送接口。
JSP/ASP/ASP.NET 等其他所有编程语言 ，使用QQ机器人消息发送接口的原理都相同。
</div>

<hr />
<div style="color:red">
<?php 

if( !empty($_REQUEST['bSubmit']) )
{
	do{

		// 通过 socket 连接QQ Robot
		$nErr = $sErr = 0 ;
		if( !$hSock=fsockopen($_REQUEST['sHost'],$_REQUEST['bPort'],$nErr,$sErr,5) )
		{
			echo "无法连接到指定的IP:端口，请检查QQ Robot是否正常启动" ;
			break ;
		}
	
		// 向机器人发送数据
		$sData = ($_REQUEST['bQun']? '1': '0') . "\t" ;
		$sData.= $_REQUEST['sTo'] . "\t" ;
		$sData.= $_REQUEST['sMsg'] ;
		fwrite($hSock, $sData) ;
		
		// 取得机器人的回应
		$sResponse.= fread($hSock,1024) ;
		
		if($sResponse=='ok')
		{
			echo "消息已经发出。" ;
		}
		else 
		{
			echo $sResponse ;
		}
		
		fclose($hSock) ;
		
	} while(0) ;
}

?>
</div>

<form name="form1" method="post" action="">
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    	<tr align="left" valign="top">
    		<th width="120" scope="row">机器人IP</th>
    		<td><input name="sHost" type="text" id="sHost" value="<?php echo empty($_REQUEST['sHost'])? '127.0.0.1': $_REQUEST['sHost'] ; ?>" size="20"></td>
   		</tr>
    	<tr align="left" valign="top">
    		<th scope="row">机器人端口</th>
    		<td><input name="bPort" type="text" id="bPort" value="<?php echo empty($_REQUEST['nPort'])? '6363': $_REQUEST['nPort'] ; ?>" size="8"></td>
   		</tr>
    	<tr align="left" valign="top">
    		<th scope="row">接收号码</th>
    		<td><input name="sTo" type="text" size="20" value="<?php echo empty($_REQUEST['sTo'])? '': $_REQUEST['sTo'] ; ?>" />   			</td>
   		</tr>
    	<tr align="left" valign="top">
    		<th scope="row">&nbsp;</th>
    		<td><input name="bQun" type="checkbox" id="bQun" value="1" <?php if(!empty($_REQUEST['bQun'])) echo "checked" ; ?> />
   			群</td>
   		</tr>
    	<tr align="left" valign="top">
    		<th scope="row">消息内容</th>
    		<td><textarea name="sMsg" cols="60" rows="8" id="sMsg"><?php echo empty($_REQUEST['sMsg'])? '': htmlspecialchars($_REQUEST['sMsg']) ; ?></textarea></td>
   		</tr>
    	<tr>
    		<th scope="row">&nbsp;</th>
    		<td><input type="submit" name="bSubmit" value="发送"></td>
   		</tr>
    	<tr>
    		<td colspan="2" scope="row"></td>
   		</tr>
    </table>
</form>

<hr />
<h3>QQ机器人消息<span class="style1">发送</span>接口说明</h3>
通过QQ Robot向用户/群发送消息，非常简单。QQ Robot启动后会监听一个端口（默认是6363）。<br />
以 socket 方式连接到这个端口，然后发送3个参数：
<ol>
	<li>1 或 0，表示是否向群发送消息</li>
	<li>用户/群的QQ号</li>
	<li>消息内容</li>
</ol>
以上三个参数通过制表符（\t）分隔。
例如，向群123456789发送消息：“你好吗”，则在连接到QQ Robot后，向QQ Robot发送以下字符串：
<pre>1	123456789	你好吗</pre>

<hr />

<h3>QQ机器人消息<span class="style1">接收</span>接口说明</h3>
在机器人程序的qqconfig.txt文件里，给 CallbackUrl 设置一个网址，当QQ机器人接收到消息以后，会将消息（已经发送人QQ号码等信息）以 HTTP POST 方式提交到这个网址。
php-example 目录下的 Callback.php
文件，演示了在PHP中接收并处理来自用户的QQ消息（php-example/Callback.php 只是简单地将接收到的消息保存在 php-example/logs 目录内）。
<p>&nbsp;</p><p>&nbsp;</p>
<a href="jecat.cn" target="_blank">jecat.cn</a>
</body>
</html>