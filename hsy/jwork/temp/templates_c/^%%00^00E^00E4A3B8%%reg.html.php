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
<!-- ͷ�� -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "head.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- ���ݲ��� -->
<div id="content">
<!-- ��ർ�� -->
<div id="left">
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "left.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<!-- ע�Ჿ�� -->
  <div id="right" >
<!-- ע��ľ������� -->
	
<!-- ���û���������� -->   

<div style="clear:both;height:1px;"></div>
   <div id="get">
	 �û�����<br>
	 �ܡ��룺<br>
	 ȷ�����룺<br>
	 ��ʵ������<br>
	 ��ϵ��ʽ��<br>
	 QQ���룺<br>
	 Email��<br>
	 MSN��<br>
	 ��ͥסַ��<br>
	 �ʡ����ࣺ<br>
	 ����˵����<br>
	 </div>

	 <div id="meno">
	 
<!-- ajaxȷ���û���δ��ʹ�� -->
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
	    	str=str+"�û�����";
	    }
	 	if (pass1.value!=pass2.value||b<6)
	 	{
	 		i+=1;
	 		str=str+"���룬";
	 	}
	    if (realname.value=="")
	    {
	    	i+=1;
	    	str=str+"��ʵ������";
	    }
	    if (linkwith.value=="")
	    {
	    	i+=1;
	    	str=str+"��ϵ��ʽ��";
	    }
	    if (address.value=="")
	    {
	    	i+=1;
	    	str=str+"��ͥסַ��";
	    }
	   if (i!=0)
	    {
	    	str=str+"��д����"
	   	    showwrong.innerHTML=str;
            return false;
	    }
	    return true;
	 }
	 </script>
	 '; ?>

	 <div id="uname" style="width:270px;float:right;font-size:12px;color:#000000;"></div>
	 <input type="text" name="username" id="username" onblur="getname()">*������д<br>
     <input type="password" name="password" id="password">*������д(6λ����)<br>
	 <input type="password"name="password01" id="password01">*������д<br>
	 <input type="text" name="realname" id="realname">*������д<br>
	 <input type="text" name="linkwith" id="linkwith">*������д<br>
	 <input type="text" id="qq" name="qq"><br>
	 <input type="text" id="email" name="email"><br />
	 <input type="text" name="msn" id="msn"><br>
	 <input type="text" name="address" id=address>*������д<br>
	 <input type="text" name="post" id="post"><br>
	 <textarea name="meno" id="meno" cols="25" rows="5"></textarea>

     </div>
	 <div style="clear:both;"></div>
	 <div id="showwrong" style="margin:1px auto;padding:0px;text-align:center;font-size:14px;color:#ff0000;"></div>
<div id="set"><input type="submit" value="ע��" onclick="checkform()">	&nbsp;&nbsp;&nbsp;&nbsp; <input type="reset"></div>
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