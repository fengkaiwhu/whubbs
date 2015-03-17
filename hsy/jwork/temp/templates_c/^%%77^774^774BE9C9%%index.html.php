<?php /* Smarty version 2.6.18, created on 2008-09-05 15:53:24
         compiled from index.html */ ?>
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
<title>	欧姆潮流  www.oumuchaoliu.com</title>
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
   <div class="rcontenti" style="height:210px">
     <div id="indexad" style="margin-left:2px;margin-top:4px;">
     <a href="?goods.html"><img src="upload/ad01.gif" /></a></div> 
   </div>
   
   
  <div style="clear:both;height:8px;"></div>
   <div class="rcontenti">
   <form action="?news.html" method="post">
    <div class="left">产品展示</div>
    <div class="right">
     <a href="?goods.html">&lt;&lt; 查看更多</a>
    </div>
    </form>
   </div>
   
  
   <?php unset($this->_sections['a']);
$this->_sections['a']['name'] = 'a';
$this->_sections['a']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['a']['show'] = true;
$this->_sections['a']['max'] = $this->_sections['a']['loop'];
$this->_sections['a']['step'] = 1;
$this->_sections['a']['start'] = $this->_sections['a']['step'] > 0 ? 0 : $this->_sections['a']['loop']-1;
if ($this->_sections['a']['show']) {
    $this->_sections['a']['total'] = $this->_sections['a']['loop'];
    if ($this->_sections['a']['total'] == 0)
        $this->_sections['a']['show'] = false;
} else
    $this->_sections['a']['total'] = 0;
if ($this->_sections['a']['show']):

            for ($this->_sections['a']['index'] = $this->_sections['a']['start'], $this->_sections['a']['iteration'] = 1;
                 $this->_sections['a']['iteration'] <= $this->_sections['a']['total'];
                 $this->_sections['a']['index'] += $this->_sections['a']['step'], $this->_sections['a']['iteration']++):
$this->_sections['a']['rownum'] = $this->_sections['a']['iteration'];
$this->_sections['a']['index_prev'] = $this->_sections['a']['index'] - $this->_sections['a']['step'];
$this->_sections['a']['index_next'] = $this->_sections['a']['index'] + $this->_sections['a']['step'];
$this->_sections['a']['first']      = ($this->_sections['a']['iteration'] == 1);
$this->_sections['a']['last']       = ($this->_sections['a']['iteration'] == $this->_sections['a']['total']);
?>
   <?php $this->assign('row', $this->_tpl_vars['list'][$this->_sections['a']['index']]); ?>
   <?php $this->assign('index', $this->_sections['a']['index']); ?>
   <?php $this->assign('total', $this->_sections['a']['total']); ?>
   
   <?php if ($this->_tpl_vars['index'] == 0): ?>
    <div class="rcontent2">
    <table width="770" border="0">
    <tr>
   <?php endif; ?>
    <td align="center">
    <a href="?goods-show-<?php echo $this->_tpl_vars['row']['id']; ?>
.html">
    <img src="upload/goods_image/<?php echo $this->_tpl_vars['row']['goods_photo']; ?>
" width="140" height="100" style="border:solid 1px #666;margin-bottom:3px;"/><br />
    <?php echo $this->_tpl_vars['row']['goods_name']; ?>

     </a>
    </td>
    <?php if ($this->_tpl_vars['index'] != 0 && $this->_tpl_vars['index'] != ( $this->_tpl_vars['totle']-1 ) && ( $this->_tpl_vars['index']+1 ) % 5 == 0): ?>
    </tr>
    </table>
    </div>
     <div class="rcontent2">
     <table width="770" border="0">
    <tr>
    <?php endif; ?>
    
   <?php if ($this->_tpl_vars['index'] == ( $this->_tpl_vars['total']-1 )): ?>
    </tr>
    </table>
    </div>
    <?php endif; ?>
  
   <?php endfor; endif; ?>
 
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