<?php /* Smarty version 2.6.18, created on 2008-08-14 00:02:41
         compiled from left.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'left.html', 7, false),)), $this); ?>
 <div id="form">
   <div style="margin-top:10px;"></div>
     新闻公告
     <div style="padding:3px;font-size:12px;color:#666666;text-align:left;">
     <ul style="margin:3px;padding:0px;list-style-type:none;">
     <?php $_from = $this->_tpl_vars['leftnews']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
     <li><a href="?news-list-<?php echo $this->_tpl_vars['row']['id']; ?>
.html" style="font-size:12px;"><img src="images/<?php echo $this->_tpl_vars['template']; ?>
/squire.gif" align="absmiddle" style="margin-right:4px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['news_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 12, "..") : smarty_modifier_truncate($_tmp, 12, "..")); ?>
</a></li>
     <?php endforeach; endif; unset($_from); ?>
    </ul>
    </div>

    </div>
<!--品牌-->
　　 <div id="left02" >
    <div id="zhan" style="height:45px;text-align:center;margin:0px auto;padding:0px;">
     <div style="margin-top:13px;"></div>
      品牌展示
    </div>
<!-- 传来大类的名称 -->
      <?php $_from = $this->_tpl_vars['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
        <a href="?goods-<?php echo $this->_tpl_vars['row']['class_id']; ?>
.html"><img src="upload/products/<?php echo $this->_tpl_vars['row']['class_photo']; ?>
" border="0" width=180 height=60></a><br>
      <?php endforeach; endif; unset($_from); ?>
    </div>