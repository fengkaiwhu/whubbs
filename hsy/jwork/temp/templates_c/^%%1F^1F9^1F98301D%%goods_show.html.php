<?php /* Smarty version 2.6.18, created on 2008-08-15 22:53:23
         compiled from goods_show.html */ ?>
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
   <div class="rcontenti" style="text-align:left;height:52px;">  
   <?php unset($this->_sections['img']);
$this->_sections['img']['name'] = 'img';
$this->_sections['img']['loop'] = is_array($_loop=$this->_tpl_vars['imglist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['img']['show'] = true;
$this->_sections['img']['max'] = $this->_sections['img']['loop'];
$this->_sections['img']['step'] = 1;
$this->_sections['img']['start'] = $this->_sections['img']['step'] > 0 ? 0 : $this->_sections['img']['loop']-1;
if ($this->_sections['img']['show']) {
    $this->_sections['img']['total'] = $this->_sections['img']['loop'];
    if ($this->_sections['img']['total'] == 0)
        $this->_sections['img']['show'] = false;
} else
    $this->_sections['img']['total'] = 0;
if ($this->_sections['img']['show']):

            for ($this->_sections['img']['index'] = $this->_sections['img']['start'], $this->_sections['img']['iteration'] = 1;
                 $this->_sections['img']['iteration'] <= $this->_sections['img']['total'];
                 $this->_sections['img']['index'] += $this->_sections['img']['step'], $this->_sections['img']['iteration']++):
$this->_sections['img']['rownum'] = $this->_sections['img']['iteration'];
$this->_sections['img']['index_prev'] = $this->_sections['img']['index'] - $this->_sections['img']['step'];
$this->_sections['img']['index_next'] = $this->_sections['img']['index'] + $this->_sections['img']['step'];
$this->_sections['img']['first']      = ($this->_sections['img']['iteration'] == 1);
$this->_sections['img']['last']       = ($this->_sections['img']['iteration'] == $this->_sections['img']['total']);
?>
    <?php $this->assign('r', $this->_tpl_vars['imglist'][$this->_sections['img']['index']]); ?>
    <?php if ($this->_sections['img']['index'] == 0): ?>
    <?php $this->assign('photo', $this->_tpl_vars['r']['goods_photo']); ?>
    <?php endif; ?>
    
   <img src="upload/goods_image/<?php echo $this->_tpl_vars['r']['goods_photo']; ?>
" width=70 height=50 alt="点击看大图" style="cursor:pointer" onclick="showimage('<?php echo $this->_tpl_vars['r']['goods_photo']; ?>
')">
   <?php endfor; endif; ?> 
   <?php if ($this->_sections['img']['total'] == 0): ?>
    <?php $this->assign('photo', "no.gif"); ?>
    <?php endif; ?> 
   </div>

   <div style="border:1px solid #ccc;border-top:none;padding:4px;">
     <img src="upload/goods_image/<?php echo $this->_tpl_vars['photo']; ?>
" width=770 height=500 id="photoshow" name="photoshow">
   </div>

 
   <div style="border:1px solid #ccc;padding:4px;margin:5px auto">
   <div style="font-size:18px;color:blue;border-bottom:1px solid #F0AE34;float:left;padding:3px;margin-left:30px;"><?php echo $this->_tpl_vars['row']['goods_name']; ?>
</div>
    <div style="font-size:14px;color:#333333;clear:left;line-height:24px;">
    <pre>
    <span style="color:#999">货号：</span><?php echo $this->_tpl_vars['row']['goods_id']; ?>

    <span style="color:#999">规格：</span><?php echo $this->_tpl_vars['row']['goods_style']; ?>
   
    <span style="color:#999">价格：</span><?php echo $this->_tpl_vars['row']['goods_price1']; ?>

    <a href="?about-buy-43.html" style="color:blue;">购买流程</a></pre>
    </div>
    <div style="font-size:14px;color:#666666;border-top:1px solid #ccc;clear:left;padding:3px;margin-left:26px;width:700px;">
    <?php echo $this->_tpl_vars['row']['goods_meno']; ?>

    </div>
 </div>
 
 
</div>
<!-- right结束 -->

<div style="clear:both;"></div>
<script language="javascript">
<?php echo '
 function showimage(photo)
 {
   var img=document.getElementById("photoshow");
   img.src="upload/goods_image/"+photo;
 }
 '; ?>

</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "foot.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>