{config_load file="test.conf" section="setup"}
{include file="base.tpl" title=foo}

{include file="header.tpl"}


{include file="left.tpl"}

{include file="right.tpl"}

<script type="text/javascript">
	function insertsmilie(smileface){
			if ((document.selection)&&(document.selection.type == "Text")) {
				var range = document.selection.createRange();
				var ch_text=range.text;
				range.text = ch_text + smileface;
			} 
			else {
				document.frmAnnounce.Content.value+=smileface;
				document.frmAnnounce.Content.focus();
			}
		}
</script>


	<div class="mcontainer">


		<div class="mmcontainer">
	
		
		{include file="ad.tpl"}


		<div class="panel panel-primary" id="votebase">
			  <div class="panel-heading"><b>发表新帖子</b></div>
			  

			  <table class="table">
			  	<tr>
			  
			  		<td>主题标题：
						 <SELECT name=font onchange=DoTitle(this.options[this.selectedIndex].value) class="dropdown">
			              <OPTION selected value="">选择话题</OPTION> <OPTION value=[原创]>[原创]</OPTION> 
			              <OPTION value=[转帖]>[转帖]</OPTION> <OPTION value=[灌水]>[灌水]</OPTION> 
			              <OPTION value=[讨论]>[讨论]</OPTION> <OPTION value=[求助]>[求助]</OPTION> 
			              <OPTION value=[推荐]>[推荐]</OPTION> <OPTION value=[公告]>[公告]</OPTION> 
			              <OPTION value=[注意]>[注意]</OPTION> <OPTION value=[贴图]>[贴图]</OPTION>
			              <OPTION value=[建议]>[建议]</OPTION> <OPTION value=[下载]>[下载]</OPTION>
			              <OPTION value=[分享]>[分享]</OPTION></SELECT>

			  		</td>

			  		<!--
					<td><b>主题标题：</b>
			  		<div class="btn-group">
					  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
					    话 题<span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
					    
					    <li><a href="#">[原创]</a></li>
					    <li><a href="#">[转帖]</a></li>
					     <li><a href="#">[灌水]</a></li>
					    
					    <li><a href="#">[求助]</a></li>
					    <li><a href="#">[下载]</a></li>
					  </ul>
					</div>
					</td>
					-->
			  		<td>
			  			<input class="form-control" width="" name="subject" value=""><font color=#ff0000><strong>*</strong></font>不得超过 25 个汉字或50个英文字符
			  			  
			  		</td>
			  	</tr>
			  	<tr>
			  		<td>文件上传</td>
			  		<td>
			  			
			  			<iframe name="ad" frameborder=0 width=100% height=24 scrolling=no src="postupload.php?board="></iframe>
			  		</td>
			  	</tr>
				<tr>
			  		<td width="20%" valign="top" class="TableBody1">
			  			<b>内容</b>
			  		</td>
			        <td width="80%">

			          <textarea title="IE中可以使用Ctrl+Enter直接提交贴子" class="FormClass" id="oArticleContent" onkeydown="ctlent()">

			          </textarea>
			        </td>
			  	</tr>
				<tr>
			  		   <td class=TableBody1 valign=top colspan=2 style="table-layout:fixed; word-break:break-all"><b>点击表情图即可在帖子中加入相应的表情</B><br>
			  		
              </td>
			  	</tr>
				<tr>
			  		<td>
			  			<b>选项</b>
			  		</td>
                	<td>&nbsp;
                	<!--
                	<select name="signature">
		                <option value="0" selected="selected">不使用签名档</option>
		                <option value="0">不使用签名档</option>
		                <option value="<?php echo $i; ?>" selected="selected">第 <?php echo $i; ?> 个</option>
		                <option value="<?php echo $i; ?>">第 <?php echo $i; ?> 个</option>
		                <option value="-1" <?php if ($currentuser["signature"] < 0) echo "selected "; ?>>随机签名档</option>
		            </select>
					<BR><BR>
					-->
					<div class="btn-group">
					  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
					    签名档 <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
					   
					    <li><a href="#">不使用</a></li>
					    <li><a href="#">使用</a></li>
					    
					  </ul>
					</div>

					</td>
			  	</tr>  

				<tr class="panel-footer">
					<td valign=middle colspan=2 align=center class=TableBody2>
					<input type=Submit value='请填写验证码后发表' name=Submit id="oSubmit" disabled = true class="btn-success"> 
					&nbsp;&nbsp;&nbsp;
					<input type="button" value='预 览' name=preview onclick=gopreview() class="btn-info">
                </td></form></tr>	

			  </table>
				
				
				</div>

			  </div>
			</div>

	
	






{include file="footer.tpl"}
