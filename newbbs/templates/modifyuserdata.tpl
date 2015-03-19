{config_load file="test.conf" section="setup"}
{include file="base.tpl" title=foo}

{include file="header.tpl"}
{include file="left.tpl"}
{include file="right.tpl"}


<script type="text/javascript">
<!--
	writeStyleSheets();
//-->
</script>

<script language="javascript">
<!--
	var siteconf_SMS_SUPPORT = 0;
	var siteconf_BOARDS_PER_ROW = 3;
	var siteconf_SHOW_POST_UNREAD = 1;
	var siteconf_THREADSPERPAGE = 15;
	defineMenus();
//-->
</script>

<script language="JavaScript">
<!--
	initTime(1419083091);
//-->
</script>

<script language="JavaScript">
	function setimg(i) {
		o = document.images['imgmyface'];
		o.src = 'img/userface/image' + (i + 1) + '.gif';
		o.width = 32;
		o.height = 32;
		getRawObject('myface').value = '';
	}
</script>
<div class="usermailcontainer">

{include file="ad.tpl"}


{include file="childnav.tpl"}


<!--
	<table class="table" border="1" position="fixed">
		<tr>
			<th width=14%  height=25 id=TableTitleLink><a href=usermanagemenu.php>控制面板首页</a></th>
			<th width=14%  id=TableTitleLink><a href=modifyuserdata.php>基本资料修改</a></th>
			<th width=14%  id=TableTitleLink><a href=changepasswd.php>昵称密码修改</a></th>
			<th width=14%  id=TableTitleLink><a href=userparam.php>用户自定义参数</a></th>
			<th width=14%  id=TableTitleLink><a href=usermailbox.php>用户信件服务</a></th>
			<th width=14%  id=TableTitleLink><a href=friendlist.php>编辑好友列表</a></th>
			<th width=14%  id=TableTitleLink><a href=modifyfavboards.php>收藏版面管理</a></th>
		</tr>
	</table>
-->

<br>

<form action="saveuserdata.php" method=POST name="theForm">
	<table cellpadding=3 cellspacing=1 align="center" class="table" border="1">
		<tr> 
	      <th colspan="2" width="100%" >基本设置选项</th>
	    </tr> 
			<tr> 
			<td width="40%"><B>性&nbsp;&nbsp;&nbsp;&nbsp;别</B>：<br />请选择您的性别</td>
			<td width="60%"> <input type="radio" checked value="1" name="gender">
			<IMG  src="img/pic/Male.gif" align=absMiddle>男孩 &nbsp;&nbsp;&nbsp;&nbsp; 
			<input type=radio value=2  name=gender>
			<img  src="img/pic/Female.gif" align=absMiddle>女孩</font></td>
			</tr>
			<tr>    
			<td width=40%  class=TableBody1><B>生日</B><BR>如不想填写，请全部留空</td>   
			<td width=60%  class=TableBody1 valign=center>
			<input maxlength="4" size="4" name="year" value="1993" /> 年 <input maxlength="2" size="2" name="month" value="8"/> 月 <input size="2" maxlength="2" name="day" value="16"/> 日
			</td>   
		</tr>

	 <tr> 
	<td width="40%"><B>头像</B>：<BR>选择的头像将出现在您的资料和发表的帖子中，您也可以选择下面的自定义头像</TD>
	<td width="60%"> 
		<select name=face id=face size=1 onChange="setimg(selectedIndex)" style="BACKGROUND-COLOR: #99CCFF; BORDER-BOTTOM: 1px double; BORDER-LEFT: 1px double; BORDER-RIGHT: 1px double; BORDER-TOP: 1px double; COLOR: #000000">
			<option value="1" selected >image1.gif</option>
			<option value="2">image2.gif</option>
			<option value="3">image3.gif</option>
			<option value="4">image4.gif</option>
			<option value="5">image5.gif</option>
			<option value="6">image6.gif</option>
			<option value="7">image7.gif</option>
			<option value="8">image8.gif</option>
			<option value="9">image9.gif</option>
			<option value="10">image10.gif</option>
			<option value="11">image11.gif</option>
			<option value="12">image12.gif</option>
			<option value="13">image13.gif</option>
			<option value="14">image14.gif</option>
			<option value="15">image15.gif</option>
		</select>
		&nbsp;<a href="showallfaces.php" target="_blank">查看所有头像</a>
	</tr>

	<tr> 
		<td width="40%" valign="top" class="TableBody1">
			<b>自定义头像</b>：<br/>如果图像位置中有连接图片将以自定义的为主
		</td>
		<td width="60%" class="TableBody1">

		<iframe name="ad" frameborder="0" width="100%" height="24" scrolling="no" src="postface.php"></iframe>
		<table width="100%">
		<tr>
				<td>
				图像位置： 
				<input type="text" name="myface" id="myface" size="60" maxlength="100" value="" />
				&nbsp;完整Url地址<br>
				宽&nbsp;&nbsp;&nbsp;&nbsp;度： 
				<input type="text" name="width" id="width" size="3" value="0" />
				0---120的整数<br>
				高&nbsp;&nbsp;&nbsp;&nbsp;度： 
				<input type="text" name="height" id="height" size="3" value="0" />
				0---120的整数<br>
				</td>
				<td align="right"><img src="userface/image1.gif" id="imgmyface"/></td>
		</tr>
		</table>
		</td>
	</tr>
	<tr>    
		<td width="40%" class="TableBody1"><b>个人照片</b>：<br/>如果您有照片在网上，请输入网页地址。此项可选</td>   
		<td width="60%" class="TableBody1">    
			<input type="text" name="userphoto" value=" " size="30" maxlength="100"/>   
		</td>   
	</tr>   
	<tr> 
	<td width="40%" class="TableBody1"><b>门派</b>：<br/>您可以自由选择要加入的门派，选择无门无派即可退出门派。</td>
	<td width="60%" class="TableBody1"> 
		<select name="groupname">
			<option value="3.14">3.14</option>
			<option value="狼帮">狼帮</option>
			<option value="蒙奇奇家族">蒙奇奇家族</option>
			<option value="老鬼么">老鬼么</option>
			<option value="小星星帮">小星星帮</option>
			<option value="小灰灰帮">小灰灰帮</option>
			<option value="深圳帮">深圳帮</option>
			<option value="睡觉派">睡觉派</option>
			<option value="山水老流氓">山水老流氓</option>
			<option value="山海">山海</option>
			<option value="土匪">土匪</option>
			<option value="仙剑酒馆">仙剑酒馆</option>
			<option value="天蝎家族">天蝎家族</option>
			<option value="我信爱情">我信爱情</option>
			<option value="我为熊狂">我为熊狂</option>
			<option value="我很优秀">我很优秀</option>
			<option value="武侠英雄寨">武侠英雄寨</option>
			<option value="武大帅哥帮">武大帅哥帮</option>
			<option value="弯弓射猴禽">弯弓射猴禽</option>
			<option value="维希家族">维希家族</option>
			<option value="无门无派" selected >无门无派</option>
			<option value="无奈派">无奈派</option>
			<option value="巡山派">巡山派</option>
			<option value="野人部落">野人部落</option>
			<option value="蘑菇派">蘑菇派</option>
			<option value="猪头帮">猪头帮</option>
			<option value="白兔会">白兔会</option>
			<option value="不清白派系">不清白派系</option>
			<option value="吃货派">吃货派</option>
			<option value="单身穷人">单身穷人</option>
			<option value="蛋黄派">蛋黄派</option>
			<option value="独立个体">独立个体</option>
			<option value="独眼奇侠">独眼奇侠</option>
			<option value="飞熊入梦">飞熊入梦</option>
			<option value="番茄鸡蛋帮">番茄鸡蛋帮</option>
			<option value="反猴禽集团">反猴禽集团</option>
			<option value="弗罗夏姆">弗罗夏姆</option>
			<option value="国家电网">国家电网</option>
			<option value="海带丝^^">海带丝^^</option>
			<option value="灰太狼">灰太狼</option>
			<option value="虎头帮">虎头帮</option>
			<option value="计科男人">计科男人</option>
			<option value="咖啡茶馆">咖啡茶馆</option>
			<option value="醉圣K寺">醉圣K寺</option>
			<option value="丐帮">丐帮</option>
	</select>
		<input type="checkbox" name="confirmgroup" value="confirm"/>确认加入
	</td>
	</tr>
	<tr> 
		<td width="40%" class="TableBody1"><b>自立门派</b>：<br/>满足特定条件即可创建门派，掌门人实力越强能够接收的徒弟越多</td>
		<td width="60%" class="TableBody1"> 
		<INPUT maxLength=5 size=44 name=creategroup value="">
		</td>
	</tr>
	<tr> 
		<td width="40%" class="TableBody1"><b>解散门派</b>：<br/>帮主可以解散自己的门派</td>
		<td width="60%" class="TableBody1"> 
		<INPUT maxLength=20 size=44 name=releasegroup value="请在该文本框内输入金盘洗手四个汉字">
		</td>
	</tr>
	<tr> 
		<td width="40%" class="TableBody1"><b>授予称号</b>：<br/>帮主可以给自己的弟子奖励个称号哦</td>
		<td width="60%" class="TableBody1"> 
		<input maxLength="5" size="44" name="grouptitle" value="">&nbsp;&nbsp;弟子的id：
		<input maxLength="20" size="10" name="groupmember" value="">
		</td>
	</tr>
	<tr> 
		<td width="40%"><B>OICQ号码</B>：
		<BR>填写您的QQ地址，方便与他人的联系</td>
		<td width="60%"> 
		<input maxLength=20 size=44 name=OICQ value="">
		</td>
	</tr>
	<tr> 
		<td width="40%"><B>ICQ号码</B>：<BR>填写您的ICQ地址，方便与他人的联系</font></TD>
		<td width="60%"> 
		<input maxLength="20" size="44" name="ICQ" value="">
	</td>
	</tr>
	<tr > 
	<td width="40">
	<B>MSN</B>：<BR>填写您的MSN地址，方便与他人的联系</TD>
	<TD width=60%  > 
	<INPUT maxLength="70" size="44" name="MSN" value="">
	</td>
	</TR>
	<TR > 
	<TD width=40% ><B>主页</B>：<BR>填写您的个人主页地址，展示您的网上风采</TD>
	<TD width=60% > 
	<INPUT maxLength="70" size="44" name="homepage" value="">
	</TD>
	</TR>
	<TR> 
	<TD width=40%><B>Email</B>：<BR>您的有效电子邮件地址</TD>
	<TD width=60% > 
	<input name="email" size="40" value=""></TD>
	</TR>
	      <tr>    
	        <td valign=top width="40%"><B>签&nbsp;&nbsp;&nbsp;&nbsp;名</B>：<BR>不能超过 250 个字符   
	          <br>   
	          文字将出现在您发表的文章的结尾处。</td>   
	        <td width="60%">    
	          <textarea name="Signature" rows=5 cols=60 wrap=PHYSICAL class="singnature">
			</textarea>   
	        </td>   
	      </tr>
	<tr>
	<th height=25 align=left valign=middle colspan=2 align="center">&nbsp;个人真实信息（以下内容建议填写）</th>
	</tr>
	<tr>
	<td valign=top width=40%> 　<b>真实姓名：</b>
	<input type=text name=realname size=18 value="叶晨旭">
	</td>
	<td height=71 align=left valign=top  class=TableBody1 rowspan=14 width=60% >
	<table width="100%" border="0" cellspacing="0" cellpadding="5" class="table">
	<tr>
		<td><b>性　格： &nbsp; </b>
		<br>
				<input type="radio" name="character" value="1"  >多重性格
				<input type="radio" name="character" value="2"  >乐天达观
				<input type="radio" name="character" value="3"  >成熟稳重
				<input type="radio" name="character" value="4"  >幼稚调皮
				<input type="radio" name="character" value="5"  >温柔体贴<br>
				<input type="radio" name="character" value="6"  >活泼可爱
				<input type="radio" name="character" value="7"  >普普通通
				<input type="radio" name="character" value="8"  >内向害羞
				<input type="radio" name="character" value="9"  >外向开朗
				<input type="radio" name="character" value="10"  >心地善良<br>
				<input type="radio" name="character" value="11"  >聪明伶俐
				<input type="radio" name="character" value="12"  >善解人意
				<input type="radio" name="character" value="13"  >风趣幽默
				<input type="radio" name="character" value="14"  >思想开放
				<input type="radio" name="character" value="15"  >积极进取<br>
				<input type="radio" name="character" value="16"  >小心谨慎
				<input type="radio" name="character" value="17"  >郁郁寡欢
				<input type="radio" name="character" value="18"  >正义正直
				<input type="radio" name="character" value="19"  >悲观失意
				<input type="radio" name="character" value="20"  >好吃懒做<br>
				<input type="radio" name="character" value="21"  >处事洒脱
				<input type="radio" name="character" value="22"  >疑神疑鬼
				<input type="radio" name="character" value="23"  >患得患失
				<input type="radio" name="character" value="24"  >异想天开
				<input type="radio" name="character" value="25"  >多愁善感<br>
				<input type="radio" name="character" value="26"  >淡泊名利
				<input type="radio" name="character" value="27"  >见利忘义
				<input type="radio" name="character" value="28"  >瞻前顾后
				<input type="radio" name="character" value="29"  >循规蹈矩
				<input type="radio" name="character" value="30"  >热心助人<br>
				<input type="radio" name="character" value="31"  >快言快语
				<input type="radio" name="character" value="32"  >少言寡语
				<input type="radio" name="character" value="33"  >爱管闲事
				<input type="radio" name="character" value="34"  >追求刺激
				<input type="radio" name="character" value="35"  >豪放不羁<br>
				<input type="radio" name="character" value="36"  >狡猾多变
				<input type="radio" name="character" value="37"  >贪小便宜
				<input type="radio" name="character" value="38"  >见异思迁
				<input type="radio" name="character" value="39"  >情绪多变
				<input type="radio" name="character" value="40"  >水性扬花<br>
				<input type="radio" name="character" value="41"  >重色轻友
				<input type="radio" name="character" value="42"  >胆小怕事
				<input type="radio" name="character" value="43"  >积极负责
				<input type="radio" name="character" value="44"  >勇敢正义
				<input type="radio" name="character" value="45"  >聪明好学<br>
				<input type="radio" name="character" value="46"  >实事求是
				<input type="radio" name="character" value="47"  >务实实际
				<input type="radio" name="character" value="48"  >老实巴交
				<input type="radio" name="character" value="49"  >圆滑老练
				<input type="radio" name="character" value="50"  >脾气暴躁<br>
				<input type="radio" name="character" value="51"  >慢条斯理
				<input type="radio" name="character" value="52"  >诚实坦白
				<input type="radio" name="character" value="53"  >婆婆妈妈
				<input type="radio" name="character" value="54"  >急性子 
		</td>
	</tr>
	<tr>
		<td><b>个人简介： &nbsp;</b><br>
			<textarea name="personal"  cols="90%" class="personIntro" >
			</textarea>
		</td>
	</tr>
</table>
</td>
	</tr>
		<tr>
			<td valign=top width=40%>　<b>国　　家：</b>
			<b>
			<input type="text" name="country" size="18" value="">
			</b> 
			</td>
		</tr>
		<tr>
			<td valign=top width=40% >　<b>省　　份：</b>
			<input type="text" name="province" size="18" value="">
			</td>
		</tr>
	<tr>
		<td valign=top width="40%">　<b>城　　市：</b>
			<input type="text" name="city" size="18" value="">
		</td>
	</tr>
	<tr>
		<td valign=top width=40%>　<b>联系电话：</b>
		<b>
			<input type="text" name="userphone" size="18" value="13164635432">
		</b> 
		</td>
	</tr>
	<tr>
		<td valign=top width=40%>　<b>通信地址：</b>
		<b>
			<input type="text" name="address" size="18" value="">
		</b>
	 	</td>
	</tr>
	<tr>
		<td valign=top width=40%>　<b>生　　肖：
		</b>
			<select size="1" name="shengxiao">
				<option value="0" selected ></option>
				<option value="1">鼠</option>
				<option value="2">牛</option>
				<option value="3">虎</option>
				<option value="4">兔</option>
				<option value="5">龙</option>
				<option value="6">蛇</option>
				<option value="7">马</option>
				<option value="8">羊</option>
				<option value="9">猴</option>
				<option value="10">鸡</option>
				<option value="11">狗</option>
				<option value="12">猪</option>
			</select>
		</td>
	</tr>
	<tr>
	<td valign=top width=40% >　<b>血　　型：</b>
		<select size=1 name=blood>
			<option value="0" selected ></option>
			<option value="1">A</option>
			<option value="2">B</option>
			<option value="3">O</option>
			<option value="4">AB</option>
			<option value="5">其他</option>
		</select>
	</td>
	</td>
	</tr>
	<tr>
		<td valign=top width=40% >　<b>信　　仰：</b>
			<select size=1 name=belief>
				<option value="0" selected ></option>
				<option value="1">佛教</option>
				<option value="2">道教</option>
				<option value="3">基督教</option>
				<option value="4">天主教</option>
				<option value="5">回教</option>
				<option value="6">无神论者</option>
				<option value="7">共产主义者</option>
				<option value="8">其他</option>
			</select>
		</td>
	</tr>
	<tr>
		<td valign=top width=40%>　<b>职　　业： </b>
			<select name=occupation>
			<option value="0" selected ></option>
			<option value="1">学生</option>
			<option value="2">财会/金融</option>
			<option value="3">工程师</option>
			<option value="4">顾问</option>
			<option value="5">计算机相关行业</option>
			<option value="6">家庭主妇</option>
			<option value="7">教育/培训</option>
			<option value="8">客户服务/支持</option>
			<option value="9">零售商/手工工人</option>
			<option value="10">退休</option>
			<option value="11">无职业</option>
			<option value="12">销售/市场/广告</option>
			<option value="13">研究和开发</option>
			<option value="14">一般管理/监督</option>
			<option value="15">政府/军队</option>
			<option value="16">执行官/高级管理</option>
			<option value="17">制造/生产/操作</option>
			<option value="18">专业人员</option>
			<option value="19">自雇/业主</option>
			<option value="20">其他</option>
		</select>
		</td>
	</tr>
		<tr>
		<td valign=top width=40% >　<b>婚姻状况：</b>
			<select size=1 name=marital>
			<option value="0" selected ></option><option value="1">未婚</option>
			<option value="2">已婚</option><option value="3">离异</option>
			<option value="4">丧偶</option>
			</select>
		</td>
		</tr>
	<tr>
	<td valign=top width=40%>　<b>最高学历：</b>
		<select size=1 name=education>
			<option value="0" selected ></option>
			<option value="1">小学</option>
			<option value="2">初中</option><option value="3">高中</option>	
			<option value="4">大学</option><option value="5">研究生</option>
			<option value="6">博士</option>
		</select>
		</td>
	</tr>
	<tr>
		<td valign=top width=40% >　<b>毕业院校：</b>
		<input type="text" name="college" size="18" value=""></td>
	</tr>
	<tr align="center"> 
		<td colspan="2" width="100%">
		<input type="Submit" value="更 新" name="Submit" id="oSubmit" class="btn-success"> &nbsp; 
		<input type="reset" name="Submit2" value="清 除" id="oSubmit2" class="btn-danger">
	</td>
	</tr>  
</table>
</form>
	
</div>

{include file="footer.tpl"}

