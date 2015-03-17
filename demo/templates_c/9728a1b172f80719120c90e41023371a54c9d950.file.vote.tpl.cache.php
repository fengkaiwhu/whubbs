<?php /* Smarty version Smarty-3.1.18, created on 2014-12-21 10:13:54
         compiled from ".\templates\vote.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81255489a8d0a57ca2-72246020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9728a1b172f80719120c90e41023371a54c9d950' => 
    array (
      0 => '.\\templates\\vote.tpl',
      1 => 1419153203,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81255489a8d0a57ca2-72246020',
  'function' => 
  array (
  ),
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5489a8d0af7f56_82030887',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5489a8d0af7f56_82030887')) {function content_5489a8d0af7f56_82030887($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('title'=>'foo'), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>



<?php echo $_smarty_tpl->getSubTemplate ("left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("right.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


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

	






<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php }} ?>
