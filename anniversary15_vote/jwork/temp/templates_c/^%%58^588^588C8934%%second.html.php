<?php /* Smarty version 2.6.18, created on 2008-08-13 01:48:52
         compiled from second.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<link href="images/<?php echo $this->_tpl_vars['template']; ?>
/alluse.css" type="text/css" rel="stylesheet">
<link href="images/<?php echo $this->_tpl_vars['template']; ?>
/index.css" type="text/css" rel="stylesheet">
<link href="images/<?php echo $this->_tpl_vars['template']; ?>
/second.css" type="text/css" rel="stylesheet">
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

<!-- 右侧开始 -->
  <div id="right" style="border:0px;">

<div style="clear:both;height:1px;"></div>
   <div class="rcontent" style="text-align:center">
    <div class="title"><?php echo $this->_tpl_vars['row']['class_name']; ?>
</div> 
   </div>
    <div style="font-size:14px;color:#666;margin:5px auto;word-wrap: break-word; word-break: break-all; ">
     <?php echo $this->_tpl_vars['row']['class_meno']; ?>

   </div>
   </div>
 
 
  
	
</div>
<!-- right结束 -->
<div style="clear:both;"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "foot.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>