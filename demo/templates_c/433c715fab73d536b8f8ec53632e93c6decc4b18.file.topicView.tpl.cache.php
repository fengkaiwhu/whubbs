<?php /* Smarty version Smarty-3.1.18, created on 2014-12-21 11:04:01
         compiled from ".\templates\topicView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3039754894d75e66575-70813313%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '433c715fab73d536b8f8ec53632e93c6decc4b18' => 
    array (
      0 => '.\\templates\\topicView.tpl',
      1 => 1419143964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3039754894d75e66575-70813313',
  'function' => 
  array (
  ),
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54894d75edf717_39277422',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54894d75edf717_39277422')) {function content_54894d75edf717_39277422($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('title'=>'foo'), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>



<?php echo $_smarty_tpl->getSubTemplate ("left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("right.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>



	<div id="tv-content">

      <?php echo $_smarty_tpl->getSubTemplate ("left_authorInfo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

            
             <div id="topicArea">
                <div id="topicTitle">
                    <h2>你遇见的事都是因你而生，你遇见的人都是为你而来（文/百无禁忌的理想）</h2>
                </div>

                <div id="topicTool">

                    <!-- 自适应效果 -->
                    <div id="auther">
                        <div id="authorImg"> 
                            <img src="img/two.jpg" >
                        </div>

                        <div id="authorName">
                            <a target="_blank" href="javascript:void(0);" title="kiki1010" >
                                <h3>kiki1010</h3>
                            </a>
                        </div>
                    </div>

                    
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
    
               <?php echo $_smarty_tpl->getSubTemplate ("topicContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


               <?php echo $_smarty_tpl->getSubTemplate ("comment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

        

<script src="js/jquery.popover.js"></script>

  <script type="text/javascript">
            $(function(){
                $('.fm_popovercard').each(function(){
                    $(this).popovercard({
                    });
                });
            });
            
        </script>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php }} ?>
