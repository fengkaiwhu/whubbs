<?php 
	require("www2-funcs.php");
	login_init();
	if ($currentuser["userid"]!="dsj"&& $currentuser["userid"]!="tedy"&& $currentuser["userid"]!="davidxn")
	{	
		html_error_quit("你没有权限查看该页!");
	}
	else
	{
?>
武汉大学珞珈山水BBS站--管理页面
<hr color="green">
<form method="post" name="manageid" action="managedeal.php">
ID查询表:<br>
请输入查询ID:<input name="searchid" type="text" size=12><br>
<input type="submit" value="提交"><input type="reset">
</form>
<br>
<form method="post" name="managedate" action="managedeal.php">
时间查询表:<br>
请输入查询时间:<input name="searchyear" type="text" maxlength=4 size=4>年<input name="searchmonth" type="text" maxlength=2 size=2>月<input name="searchday" type="text" maxlength=2 size=2>日<br>
<input type="submit" value="提交"><input type="reset" value="重置">
</form>
<br>
<form method="post" name="managexh" action="managedeal.php">
学号查询:<br>
请输入学号:<input name="searchxh" type="text" maxlength=13 size=13><br>
<input type="submit" value="提交"><input type="reset" value="重置">
</form>
<br>
</body>
</html>
<?php
	}
?>
