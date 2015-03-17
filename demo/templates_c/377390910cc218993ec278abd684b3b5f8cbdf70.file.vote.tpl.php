<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-22 13:56:53
         compiled from "./templates/vote.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198990247454940b7bbed9e1-96589347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '377390910cc218993ec278abd684b3b5f8cbdf70' => 
    array (
      0 => './templates/vote.tpl',
      1 => 1419227690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198990247454940b7bbed9e1-96589347',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54940b7bc14051_08066704',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54940b7bc14051_08066704')) {function content_54940b7bc14051_08066704($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>'foo'), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<?php echo $_smarty_tpl->getSubTemplate ("left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("right.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<div class="votecontainer">

	<h2>创建投票</h2>
	<hr />
	
	

		<div class="panel panel-primary" id="votebase">
			  <div class="panel-heading">投票基本设置</div>
			  <div class="panel-body">
			   <div class="input-group">
					  <span class="input-group-addon">投票标题</span>
					  <input type="text" class="form-control txtwidth" placeholder="请在这儿输入投票标题">
				</div>
				<br />
				<div class="input-group">
					  <span class="input-group-addon">投票类型</span>
					  <div class="leftspace4">
					  <input type="radio" name="votetype" value="single" checked="checked"  />单选
					  <input type="radio" name="votetype" value="multi" />多选
					  </div>		
				</div>
				
						
			  </div>
			</div>

	<div class="panel panel-primary overview" >
		<div class="panel-heading">投票选项</div>
			  <br />
		<div id="voteitem" class="voteitem">		
			<div class="input-group topspace">
				  <span class="input-group-addon">1</span>
				  <input type="text" class="form-control txtwidth">
			</div>

			<div class="input-group topspace">
				  <span class="input-group-addon">2</span>
				  <input type="text" class="form-control txtwidth">
		    </div>

			<button type="button" class="btn btn-primary">增加选项</button>

			<br />

		    <div class="input-group topspace">
				  <span class="input-group-addon">其他</span>
				  <input type="text" class="form-control">
				    <span class="input-group-addon othertxt">
			        	<input type="checkbox">启用其他选项
			      	</span>
		    </div>

		    
		</div>	

		
	</div>
		<button type="button" class="btn btn-primary" >创建投票</button>	


	</div>

	






<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
