<?php /* Smarty version 2.6.18, created on 2008-08-10 10:31:05
         compiled from reg.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<link href="images/<?php echo $this->_tpl_vars['template']; ?>
/alluse.css" type="text/css" rel="stylesheet">

<link href="images/<?php echo $this->_tpl_vars['template']; ?>
/index.css" type="text/css" rel="stylesheet">
<link href="images/<?php echo $this->_tpl_vars['template']; ?>
/reg.css" type="text/css" rel="stylesheet">
<meta name="keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
">
<script language="javascript" src="jwork/ajax/ajax.js">
</script>
</head>
<body>
<!-- 头部 -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "head.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- 内容部分 -->
<div id="content">
<!-- 左侧导航 -->
<div id="left">
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "left.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<!-- 注册部分 -->
  <div id="right" >
<!-- 注册的具体内容 -->
	
<!-- 将用户名单独提出 -->   

<div style="clear:both;height:1px;"></div>
   <div id="get">
	 用户名：<br>
	 密　码：<br>
	 确认密码：<br>
	 真实姓名：<br>
	 联系方式：<br>
	 QQ号码：<br>
	 Email：<br>
	 MSN：<br>
	 家庭住址：<br>
	 邮　　编：<br>
	 个人说明：<br>
	 </div>

	 <div id="meno">
	 
<!-- ajax确认用户名未被使用 -->
<form name="fomm" id="fomm" method="post" onsubmit="return checkform()" action="login.php">
 <?php echo '	 
	 <script language="javascript">
	 function getname()
	 {
	 	var username=document.getElementById("username");
        jpost("checkname.php","username="+username.value,"uname");
	 }
	 
	 function checkform()
	 {
	 	var i=0;
	 	var str="";
	    var name=document.getElementById("username");
	 	var pass1=document.getElementById("password");;
	 	var pass2=document.getElementById("password01");
	 	var realname=document.getElementById("realname");
	 	var linkwith=document.getElementById("linkwith");
	 	var address=document.getElementById("address");
	 	var uname=document.getElementById("uname");
	 	var showwrong=document.getElementById("showwrong");
        var b=pass1.value.length;
	 	if (name.value=="")
	    {
	    	i+=1;
	    	str=str+"用户名，";
	    }
	 	if (pass1.value!=pass2.value||b<6)
	 	{
	 		i+=1;
	 		str=str+"密码，";
	 	}
	    if (realname.value=="")
	    {
	    	i+=1;
	    	str=str+"真实姓名，";
	    }
	    if (linkwith.value=="")
	    {
	    	i+=1;
	    	str=str+"联系方式，";
	    }
	    if (address.value=="")
	    {
	    	i+=1;
	    	str=str+"家庭住址，";
	    }
	   if (i!=0)
	    {
	    	str=str+"填写有误！"
	   	    showwrong.innerHTML=str;
            return false;
	    }
	    return true;
	 }
	 </script>
	 '; ?>

	 <div id="uname" style="width:270px;float:right;font-size:12px;color:#000000;"></div>
	 <input type="text" name="username" id="username" onblur="getname()">*必须填写<br>
     <input type="password" name="password" id="password">*必须填写(6位以上)<br>
	 <input type="password"name="password01" id="password01">*必须填写<br>
	 <input type="text" name="realname" id="realname">*必须填写<br>
	 <input type="text" name="linkwith" id="linkwith">*必须填写<br>
	 <input type="text" id="qq" name="qq"><br>
	 <input type="text" id="email" name="email"><br />
	 <input type="text" name="msn" id="msn"><br>
	 <input type="text" name="address" id=address>*必须填写<br>
	 <input type="text" name="post" id="post"><br>
	 <textarea name="meno" id="meno" cols="25" rows="5"></textarea>

     </div>
	 <div style="clear:both;"></div>
	 <div id="showwrong" style="margin:1px auto;padding:0px;text-align:center;font-size:14px;color:#ff0000;"></div>
<div id="set"><input type="submit" value="注册" onclick="checkform()">	&nbsp;&nbsp;&nbsp;&nbsp; <input type="reset"></div>
	 </form>
  </div>
</div>
<div style="clear:both;"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "foot.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>