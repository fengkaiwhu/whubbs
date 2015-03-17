<?php /* Smarty version 2.6.18, created on 2008-08-13 01:18:10
         compiled from news.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'news.html', 42, false),)), $this); ?>
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
   <div class="rcontent">
   <form action="?news.html" method="post">
    <div class="left">新闻</div>
    <div class="right">
     <img src="images/<?php echo $this->_tpl_vars['template']; ?>
/icon_search.gif" align="absmiddle">请输入标题：<input type="text" name="title"><input type="submit" value="查询" class="mybutton">
    </div>
    </form>
   </div>
   
   <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
   <div class="rcontent2">
    <div style="width:770px;margin:5px;padding-top:5px;padding-left:5px;background:#f2f2f2;color:#333;height:24px;">
     <span style="float:left;">
     <a href=?news-list-<?php echo $this->_tpl_vars['row']['id']; ?>
.html><?php echo $this->_tpl_vars['row']['news_title']; ?>
</a></span>
     <span style="float:right"><?php echo $this->_tpl_vars['row']['news_time']; ?>
</span></div>
    <div style="font-size:12px;color:#666;margin:5px auto;word-wrap: break-word; word-break: break-all; ">
    <pre><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['news_meno'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 400, "..") : smarty_modifier_truncate($_tmp, 400, "..")); ?>
</pre> 
   </div>
   </div>
   <?php endforeach; endif; unset($_from); ?>
 
  <div class="rcontent2"><?php echo $this->_tpl_vars['foot']; ?>
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