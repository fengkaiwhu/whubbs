<?php /* Smarty version 2.6.18, created on 2008-08-13 23:50:02
         compiled from goods.html */ ?>
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
    <div class="left">产品展示</div>
    <div class="right">
     <img src="images/<?php echo $this->_tpl_vars['template']; ?>
/icon_search.gif" align="absmiddle">请输入产品名称：<input type="text" name="title"><input type="submit" value="查询" class="mybutton">
    </div>
    </form>
   </div>
   <div style="margin:5px auto;">
   <?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['class']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
   <?php $this->assign('row', $this->_tpl_vars['class'][$this->_sections['c']['index']]); ?>
   <?php $this->assign('total', $this->_sections['c']['total']); ?>
    <a href="?goods-<?php echo $this->_tpl_vars['row']['class_id']; ?>
.html" title="查看 <?php echo $this->_tpl_vars['row']['class_name']; ?>
"><img src="upload/products/<?php echo $this->_tpl_vars['row']['class_photo']; ?>
" width="100" height="50" /></a>
   <?php endfor; endif; ?>
   
   <?php if ($this->_tpl_vars['total'] > 0): ?>
     <div style="border-bottom:1px dashed #ccc;margin:0px 5px;"></div>
   <?php endif; ?>
   </div>
   
    <div class="rcontent2" style="border:none;">
    
   <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
   <?php $this->assign('row', $this->_tpl_vars['list'][$this->_sections['i']['index']]); ?>
   <?php $this->assign('index', $this->_sections['i']['index']); ?>
   <?php $this->assign('total', $this->_sections['i']['total']); ?>
    <div style="width:380px;float:left;margin:3px;">
     <table width="385" border="0">
      <tr>
        <td width="152" bordercolor="#FFFFFF"><a href="?goods-show-<?php echo $this->_tpl_vars['row']['id']; ?>
.html"><img style="border:1px solid #ccc;padding:2px;" src="upload/goods_image/<?php echo $this->_tpl_vars['row']['goods_photo']; ?>
" width="140" height="100"  /></a></td>
        <td width="182" bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="line-height:22px;"> 货名：<span style="color:blue;font-size:14px;font-weight:bold;"><?php echo $this->_tpl_vars['row']['goods_name']; ?>
</span><br />
          货号：<?php echo $this->_tpl_vars['row']['goods_id']; ?>
<br />
          价格：<?php echo $this->_tpl_vars['row']['goods_price1']; ?>
元<br />
          规格：<?php echo $this->_tpl_vars['row']['goods_style']; ?>
<br />
         <input type="button" class="buttonshow" value="查看详情" onclick="javascript:location.href('?goods-show-<?php echo $this->_tpl_vars['row']['id']; ?>
.html');">
         </td>
      </tr>
    </table>
   </div>
   <?php endfor; endif; ?>
    <?php if ($this->_tpl_vars['total'] == 0): ?>
      <span style="color:red">暂无内容！</span>
    <?php endif; ?>
  </div>
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