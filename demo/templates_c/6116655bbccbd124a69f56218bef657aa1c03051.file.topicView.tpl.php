<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-19 19:26:15
         compiled from "./templates/topicView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76779580054940b57ac37e1-30943254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6116655bbccbd124a69f56218bef657aa1c03051' => 
    array (
      0 => './templates/topicView.tpl',
      1 => 1418987858,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76779580054940b57ac37e1-30943254',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54940b57aefdb6_59671502',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54940b57aefdb6_59671502')) {function content_54940b57aefdb6_59671502($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>'foo'), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<?php echo $_smarty_tpl->getSubTemplate ("left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("right.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



	<div id="tv-content">

      <?php echo $_smarty_tpl->getSubTemplate ("left_authorInfo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


                    <span>发信人：<span>kiki1010</span>  信区：<span>Digital</span></span>
                      <br />
                    <span>发信站：<span> 珞珈山水 (Wed Dec  3 17:58:51 2014)</span><span>，站内</span></span>
                    <br />
                    <span class="opset">
                    <span>
                        <a href="javascript:void(0);" title="回复">回 复</a>
                    </span>   
                    <span>
                        <a href="javascript:void(0);" title="点赞">点 赞</a>
                    </span> 
                    <span>  
                        <a href="javascript:void(0);" title="收藏">收 藏</a>
                    </span> 
                    <span>
                        <a href="javascript:void(0);" title="分享">分 享</a>
                    </span>  
                    </span>
                </div>
    
               <?php echo $_smarty_tpl->getSubTemplate ("topicContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



        <div id="commentArea">
            <div id="commentHeader">
                
            </div>

            <div id="commentBody">
                
            </div>

            <div id="commentFooter">
                
            </div>
        </div>
    </div>

<?php echo '<script'; ?>
 src="js/jquery.popover.js"><?php echo '</script'; ?>
>

  <?php echo '<script'; ?>
 type="text/javascript">
            $(function(){
                $('.fm_popovercard').each(function(){
                    $(this).popovercard({
                    });
                });
            });
            
        <?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
