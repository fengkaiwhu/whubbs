{config_load file="test.conf" section="setup"}
{include file="base.tpl" title=foo}

{include file="header.tpl"}


{include file="left.tpl"}

{include file="right.tpl"}

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

	






{include file="footer.tpl"}
