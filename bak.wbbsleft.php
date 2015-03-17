<?php
	require("www2-funcs.php");
	require("config.php");
	require("uc_client/client.php");
	login_init();
	
	function display_board_list()
	{
?>
<div class="b1">
<?php
		for($i = 0; $i < BBS_SECNUM; $i++)
		{
?>
<a href="javascript:wsubmenu(0,0,<?php echo $i; ?>,0,0)" target="_self">
<img id="submenuimg_brd_<?php echo $i; ?>_0" src="images/close.gif" class="pm" alt="+"
></a><a href="wForum/section.php?sec=<?php echo $i; ?>"><script type="text/javascript">putImage('kfolder1.gif','class="s16x16"');</script><?php echo constant("BBS_SECNAME".$i."_0"); ?></a><br/>
<div id="submenu_brd_<?php echo $i; ?>_0" class="lineback"></div>
<?php
		}
?>
<img src="images/open.gif" class="pm" alt="-"
><a href="bbsxmlbrd.php?flag=2"><script type="text/javascript">putImage('kfolder1.gif','class="s16x16"');</script>�¿�������</a>
</div>
<?php
	}
	
	function display_my_favorite()
	{
?>
<div class="b1">
<?php
		$select = 0; 

		if( bbs_load_favboard($select)!=-1 && $boards = bbs_fav_boards($select, 1)) 
		{
			$brd_name = $boards["NAME"]; // Ӣ����
			$brd_desc = $boards["DESC"]; // ��������
			$brd_flag = $boards["FLAG"]; 
			$brd_bid = $boards["BID"];  //�� ID ���� fav dir ������ֵ 
			$rows = sizeof($brd_name);
			
			for ($j = 0; $j < $rows; $j++)
			{
				if( $brd_bid[$j] == -1) { //���ղ�Ŀ¼
					echo "-��Ŀ¼-";
				}
				else if ($brd_flag[$j]==-1)
				{
?>
<div class="fi">
<a href="javascript:submenu(1,<?php echo $brd_bid[$j]; ?>,0,0,0)" target="_self">
<img id="submenuimg_fav_<?php echo $brd_bid[$j]; ?>" src="images/close.gif" class="pm" alt="+"
></a><a href="bbsfav.php?select=<?php echo $brd_bid[$j]; ?>&up=-1"><script type="text/javascript">putImage('kfolder1.gif','class="s16x16"');</script><?php echo $brd_desc[$j]; ?></a></div>
<div id="submenu_fav_<?php echo $brd_bid[$j]; ?>" class="lineback"></div>
<?php
				}
				else
				{
					$brd_link="wForum/board.php?name=" . urlencode($brd_name[$j]);

					if( $j != $rows - 1 )
						echo "<div class='lb'><div class='mi'><a href='".$brd_link."'>".$brd_desc[$j]."</a></div></div>";
					else
						echo "<div class='lmi'><a href='".$brd_link."'>".$brd_desc[$j]."</a></div>";
				}
			}
		}
?>
</div>
<?php 
	}
	
	function display_mail_menu($userid)
	{
?>
<div class="mi"><a href="wForum/usermailbox.php?boxname=inbox">�ռ���</a></div>
<div class="mi"><a href="wForum/usermailbox.php?boxname=sendbox">������</a></div>
<div class="mi"><a href="wForum/usermailbox.php?boxname=deleted">������</a></div>
<?php
		//custom mailboxs
		$mail_cusbox = bbs_loadmaillist($userid);
		if ($mail_cusbox != -1)
		{
			foreach ($mail_cusbox as $mailbox)
			{
				echo "<div class=\"mi\">".
					"<a href=\"bbsmailbox.php?path=".$mailbox["pathname"]."&title=".urlencode($mailbox["boxname"])."\">".htmlspecialchars($mailbox["boxname"])."</a></div>\n";
			}
		}
?>
<div class="lmi"><a href="wForum/sendmail.php">�����ʼ�</a></div>
<?php		
	}
		
	function display_blog_menu($userid,$userfirstlogin)
	{
		$db["HOST"]=bbs_sysconf_str("MYSQLBLOGHOST");
		$db["USER"]=bbs_sysconf_str("MYSQLBLOGUSER");
		$db["PASS"]=bbs_sysconf_str("MYSQLBLOGPASSWORD");
		$db["NAME"]=bbs_sysconf_str("MYSQLBLOGDATABASE");

		
		@$link = mysql_connect($db["HOST"],$db["USER"],$db["PASS"]) ;
		if (!$link) return;
		@mysql_select_db($db["NAME"],$link);
		
		$query = "SELECT `uid` FROM `users` WHERE `username` = '".$userid."' AND `createtime`  > ".date("YmdHis",$userfirstlogin)." LIMIT 0,1 ;";
		$result = mysql_query($query,$link);
		$rows = mysql_fetch_array($result);
		@mysql_free_result($result);
		global $currentuser;
		$rows = ( $currentuser["flag1"] & BBS_PCORP_FLAG );
		if(!$rows)
		{
?>
<div class="mi"><a href="pc/pcapp0.html">����BLOG</a></div>
<?php
		}
		else
		{
?>
<div class="mi"><a href="pc/index.php?id=<?php echo $userid; ?>">�ҵ�Blog</a></div>
<div class="mi"><a href="pc/pcdoc.php?userid=<?php echo $userid; ?>&tag=0">������</a></div>
<div class="mi"><a href="pc/pcdoc.php?userid=<?php echo $userid; ?>&tag=1">������</a></div>
<div class="mi"><a href="pc/pcdoc.php?userid=<?php echo $userid; ?>&tag=2">˽����</a></div>
<div class="mi"><a href="pc/pcdoc.php?userid=<?php echo $userid; ?>&tag=3">�ղ���</a></div>
<div class="mi"><a href="pc/pcdoc.php?userid=<?php echo $userid; ?>&tag=4">ɾ����</a></div>
<div class="mi"><a href="pc/pcdoc.php?userid=<?php echo $userid; ?>&tag=5">���ѹ���</a></div>
<div class="mi"><a href="pc/pcdoc.php?userid=<?php echo $userid; ?>&tag=6">�������</a></div>
<div class="mi"><a href="pc/pcdoc.php?userid=<?php echo $userid; ?>&tag=7">�����趨</a></div>
<div class="mi"><a href="pc/pcfile.php?userid=<?php echo $userid; ?>">���˿ռ�</a></div>
<div class="mi"><a href="pc/pcmanage.php?userid=<?php echo $userid; ?>&act=post&tag=0&pid=0">��������</a></div>
<?php		
		}	
	}

	cache_header("nocache");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<script type="text/javascript" src="static/www2-main.js"></script>
<script type="text/javascript"><!--
	writeCssLeft();
	top.document.title = '��ӭݰ��<?php echo BBS_FULL_NAME; ?>';
//-->
</script>
<script src="wForum/bbsleft.js" language="JavaScript"></script>
<script type="text/javascript" src="static/bbsleft.js"></script>
<script language="JavaScript">
<!--
    colsDefine = top.document.getElementById('mainframe').cols;
//-->
</script>
<!--[if IE]>
<style type="text/css">
.t2,.logo {
	width: 167px;
}
</style>
<![endif]-->
<base target="main" />
</head>
<body>
<iframe id="hiddenframe" name="hiddenframe" width="0" height="0" src="images/img.gif" frameborder="0" scrolling="no"></iframe>

<!--վ���־-->
<!--<?php if (defined("SITE_NEWSMTH")) { ?>
<script type="text/javascript">putImage('t1.gif','class="pm"');</script>
<?php } else { ?>
<center style="padding: 0.3em;font-weight:bold;font-size:120%;"><?php echo BBS_FULL_NAME; ?></center>
<?php } ?>-->
<img src="images/whubbslogo4.gif" border="0"/>

<?php
		if($currentuser["userid"]=="guest")
		{
?>
<div class="t2">
<form action="bbslogin.php" method="post" name="form1" target="_top" onSubmit="return fillf3(this);" class="m0">
<nobr><script type="text/javascript">putImage('u1.gif','alt="��¼�û���" class="pm"');</script>
<input type="text" class="upinput" LENGTH="10" onMouseOver="this.focus()" onFocus="this.select()" name="id" onKeyPress="return input_okd(this, event);" /></nobr><br/>

<nobr><script type="text/javascript">putImage('u3.gif','alt="�û�����" class="pm"');</script>
<input type="password" class="upinput" LENGTH="10" name="passwd" maxlength="39" onKeyPress="return input_okd(this, event);" /></nobr><br />
<input style="display:none;" checked="true" type="radio" name="webtype" id="wforum" value="wforum" onClick="setType('wforum')" />
<div class="m9">
<nobr><a href="javascript:form1.submit();">
<script type="text/javascript">putImage('l1.gif','alt="��¼��վ" class="m10" onClick="form1.submit();"');</script></a>
<a href="bbsreg0.html" target="_top">
<script type="text/javascript">putImage('l3.gif','alt="ע�����û�" class="m10"');</script></a></nobr>
</div>
</form>
<?php
		}
		else
		{
?>
<div class="t2">
<nobr><script type="text/javascript">putImage('u1.gif','alt="��¼�û���" class="pm"');</script>
&nbsp;&nbsp;<?php echo $currentuser["userid"]; ?></nobr><br/>
<?php
		}
?>
</div>

<div class="b1 m4">
	<img src="images/open.gif" class="pm" alt="-"
	><a href="wmainpage.html"><script type="text/javascript">putImage('i_main.gif','class="sfolder"');</script>��ҳ����</a><br/>
	
	<img src="images/open.gif" class="pm" alt="-"
	><a href="/frames.html" target="_top"><script type="text/javascript">putImage('i_main.gif','class="sfolder"');</script>����ģʽ</a><br/>

	<img src="images/open.gif" class="pm" alt="-"
	><a href="/sphider/search.php"><script type="text/javascript">putImage('i_main.gif','class="sfolder"');</script>ȫվ����</a><br/>
	
<?php
if($data = uc_get_user($currentuser["userid"])) {
list($uid, $username, $email) = $data;
echo uc_user_synlogin($uid);

?>
        <img src="images/open.gif" class="pm" alt="-"
        ><a style="color:red" href="/home/home/index.php" target="_blank"><script type="text/javascript">putImage('i_main.gif','class="sfolder"');</script>�ҵĿռ�</a><img src="images/new.gif"><br/>
        <img src="images/open.gif" class="pm" alt="-"
        ><a style="color:red" href="http://weibo.com/p/1002062431218852/home?from=page_100206&mod=TAB#place" target="_blank"><script type="text/javascript">putImage('i_main.gif','class="sfolder"');</script>ɽˮ΢��</a><img src="images/new.gif"><br/>
<?php
}
?>	
	<img src="images/open.gif" class="pm" alt="-"
	><a href="wForum/elite.php"><script type="text/javascript">putImage('i_ann.gif','class="sfolder"');</script>������</a><br/>
	
	<a href='javascript:changemn("board");' target="_self"><img id="imgboard" src="images/close.gif" class="pm" alt="+"
	></a><a href="wForum/index.php"><script type="text/javascript">putImage('i_board.gif','class="sfolder"');</script>����������</a><br/>
	<div class="pp" id="divboard">
<?php
	display_board_list();
?>
	</div>
<!--
	<img src="images/open.gif" class="pm" alt="-"><a href="bbsfav.php?x"><script type="text/javascript">putImage('i_newsec.gif','class="sfolder"');</script>�·���������</a><br />
-->
	
	<div><form action="wbbssel.php" method="get" class="m0"><nobr
		><img src="images/open.gif" class="pm" alt="-"><script type="text/javascript">putImage('i_search.gif','class="sfolder"');</script><input name="board" type="text" class="f2" value="����������" size="10" onMouseOver="this.focus()" onFocus="this.select()" /> 
		<input name="submit" type="submit" value="GO" class="sgo" />
		</nobr>
	</form></div>
<?php
	if($currentuser["userid"]!="guest"){
?>
	<a href='javascript:changemn("fav");' target="_self"><img id="imgfav" src="images/close.gif" class="pm" alt="+"></a
	><a href="wForum/favboard.php"><script type="text/javascript">putImage('i_fav.gif','class="sfolder"');</script>�ҵ��ղؼ�</a><br/>

	<div class="pp" id="divfav">
<?php
		display_my_favorite();
?>
	</div>

<?php
	}
	if (0)//(defined("BBS_HAVE_BLOG"))
	{
?>
	<a href='javascript:changemn("pc");' target="_self"><img id="imgpc" src="images/close.gif" class="pm" alt="+"
	></a><a href='pc/index.html'><script type="text/javascript">putImage('i_blog.gif','class="sfolder"');</script><?php echo BBS_NICKNAME; ?>Blog</a><br/>
	<div class="pp" id="divpc">
<?php
		if($currentuser["userid"]!="guest")
			display_blog_menu($currentuser["userid"],$currentuser["firstlogin"]);
?>
		<div class="mi"><a href="pc/index.html">Blog��ҳ</a></div>
		<div class="mi"><a href="pc/pc.php">�û��б�</a></div>
		<div class="mi"><a href="pc/pcreco.php">�Ƽ�����</a></div>
		<div class="mi"><a href="pc/pclist.php">��������</a></div>
		<div class="mi"><a href="pc/pcsec.php">����Ŀ¼</a></div>
		<div class="mi"><a href="pc/pcnew.php">������־</a></div>
		<div class="mi"><a href="pc/pcnew.php?t=c">��������</a></div>
		<div class="mi"><a href="pc/pcsearch2.php">��������</a></div>
		<div class="mi"><a href="pc/pcnsearch.php">��־����</a></div>
<?php
		@include("pc/pcconf.php");
		if (isset($pcconfig["BOARD"])) {
?>
		<div class="mi"><a href="wForum/board.php?name=<?php echo $pcconfig["BOARD"]; ?>">Blog��̳</a></div>
<?php
		}
		if ($currentuser && $currentuser["index"]) { //blog manage menu
			if (isset($pcconfig["BOARD"])) {
				$brdarr = array();
				$pcconfig["BRDNUM"] = bbs_getboard($pcconfig["BOARD"], $brdarr);
				if (bbs_is_bm($pcconfig["BRDNUM"], $currentuser["index"])) {
?>
		<div class="mi"><a href="pc/pcadmin_rec.php">Blog����</a></div>
<?php
		}}} //blog manage menu
?>
		<div class="lmi"><a href="pc/index.php?id=SYSOP">��������</a></div>
		</div>
<?php
	} // defined(BBS_HAVE_BLOG)

	if($currentuser["userid"]!="guest"){
?>
	<a href='javascript:changemn("mail");' target="_self"><img id="imgmail" src="images/close.gif" class="pm" alt="+"
	></a><a href="wForum/usermailbox.php?boxname=inbox"><script type="text/javascript">putImage('i_mail.gif','class="sfolder"');</script>�ҵ�����</a><br/>

	<div class="pp" id="divmail">
<?php
		display_mail_menu($currentuser["userid"]);
?>					
	</div>
<?php
	}
?>
<?php 
	if ($currentuser["userid"]=="dsj")
	{	
?>
	<img src="images/open.gif" class="pm" alt="-" 	 
	><a href="manage.php"><script type="text/javascript">putImage('i_style.gif','class="sfolder"');</script><font color="red">ʵ������</font></a><br/> 	
 <?php
}
?>   
	<a href='javascript:changemn("chat");' target="_self"><img id="imgchat" src="images/close.gif" class="pm" alt="+"
	><script type="text/javascript">putImage('i_talk.gif','class="sfolder"');</script≯��˵��</a><br/>
	<div class="pp" id="divchat">

<?php
	if($currentuser["userid"]!="guest"){
?>
                        <div class="mi"><a href="wForum/showmsgs.php" target="main">�쿴���߶���</a></div>
                        <div class="mi"><a href="javascript:sendMsg()" target="main">������</a></div>
<?php
    if (false) {
?>
                        <div class="mi"><a href="javascript:sendSMSMsg()" target="main">�����ֻ�����</a></div>
<?php
    }
?>
                        <div class="mi"><a href="wForum/friendlist.php" target="main">�༭�����б�</a></div>
                        <div class="mi"><a href="wForum/showonlinefriend.php" target="main">���ߺ���</a></div>
<?php
	}
?>
    					<div class="mi"><a href="wForum/showonlineuser.php" target="main">�����û�</a></div>
	    				<div class="lmi"><a href="wForum/dispuser.php" target="main">��ѯ�û�</a></div>
    
    
	</div>
<?php
	if($currentuser["userid"]!="guest")
	{
?>
	<a href='javascript:changemn("tool");' target="_self"><img id="imgtool" src="images/close.gif" class="pm" alt="+"
	><script type="text/javascript">putImage('i_config.gif','class="sfolder"');</script>���˲�������</a><br/>

	<div class="pp" id="divtool">
<?php
		if(!($currentuser["userlevel"]&BBS_PERM_LOGINOK) ||
			((defined("SITE_NEWSMTH")) && (!($currentuser["flag1"]&BBS_ACTIVATED_FLAG))) )
		{
?>
		<div class="mi"><a href="bbsnew.php">���û���֪</a></div>
<?php
}
?>
                    <div class="mi"><a href="wForum/usermanagemenu.php">�û��������</a></div>
                    <div class="mi"><a href="wForum/modifyuserdata.php">���������޸�</a></div>
    				<div class="mi"><a href="wForum/userparam.php">�û��Զ������</a></div>
	    			<div class="mi"><a href="wForum/bbssig.php">�û�ǩ����</a></div>
	    			<div class="mi"><a href="wForum/changepasswd.php">�޸��ǳ�����</a></div>
					<div class="lmi"><a href="wForum/friendlist.php">�趨����</a></div>
	</div>
<?php
	}
?>
<img src="images/open.gif" class="pm" alt="-" 	 
	><a href="telnet:bbs.whu.edu.cn"><script type="text/javascript">putImage('i_telnet.gif','class="sfolder"');</script>Telnet��¼</a><br/> 	 
<?php
if((!($currentuser["userlevel"]&BBS_PERM_LOGINOK))&&$currentuser["userid"]!="guest") {
?>
<img src="images/open.gif" class="pm" alt="-"
	><a href="bbsfillform.html"><script type="text/javascript">putImage('i_ann.gif','class="sfolder"');</script><font color="red">ʵ��ע�ᵥ</font></a><br/>
<?php
}
?>
	<a href='javascript:changemn("ser");' target="_self"><img id="imgser" src="images/close.gif" class="pm" alt="+"
	><script type="text/javascript">putImage('i_down.gif','class="sfolder"');</script>����������</a><br/>

	<div class="pp" id="divser">
		<div class="mi"><a href="ddz/index.php">������</a></div>
		<div class="mi"><a href="five/index.php">������</a></div>
		<div class="mi"><a href="games/index.html">С��Ϸ</a></div>
		<div class="mi"><a href="chess/index.php">�й�����</a></div>
		<div class="mi"><a href="3guo/index.php" target="_blank">��¹����</a></div>
		<div class="mi"><a href="ogame/login.php">���ӵ۹�</a></div>
		<div class="lmi"><a href="download.php" target="main">�Ƽ�����</a></div>
	</div>
		
<?php
	//�ϴ���վ��add by zhaiwx 2010/3/13
	  $upflag =false;
          //��������id:nobodyelse,winnersvicto,davidxn   --2013.07.15  davidxn
	  //yubaoriyue, amigo  -- 2014.06.08 by davidxn
	  $uploaduser=array('jiangyou','zhl2007','BabyBlue','SYSOP','tedy','kky','zhaoqf8829','siximu','SUPERKING','sumiyixin','nobodyelse','winnersvicto','davidxn','yubaoriyue','amigo');
	  foreach($uploaduser as $user){
	  	  if($user == $currentuser["userid"]) $upflag = true;
	  }
	  if($upflag){
       ?>
	   <img src="images/open.gif" class="pm" alt="-">
	   <a href="bbstt.php"><script type="text/javascript">putImage('i_ann.gif','class="sfolder"');</script>��վ����</a><br/>
	   <?php
	  }
	
?>		
<?php
	//�ϴ���棬add by zhaiwx 2010/3/13
	  $upflag2 =false;
	  //d���������� davidxn,YYM  - by davidxn 2013.09.16
	  $uploaduser2=array('SYSOP','tedy','kky','zhaoqf8829','jiangyou','siximu','sumiyixin','SUPERKING','sumiyixin','davidxn','YYM','xusheng');
	  foreach($uploaduser2 as $user2){
	  	  if($user2 == $currentuser["userid"]) $upflag2 = true;
	  }
	  if($upflag2){
       ?>
	   <img src="images/open.gif" class="pm" alt="-">
	   <a href="http://bbs.whu.edu.cn/ad/bbsad.php"><script type="text/javascript">putImage('i_ann.gif','class="sfolder"');</script>������</a><br/>
	   <?php
	  }
	
?>		
<?php
	if($currentuser["userid"]!="guest"){
?>
	<img src="images/open.gif" class="pm" alt="-"
	><a href="bbslogout.php" id="kbsrc_logout" target="_top"><script type="text/javascript">putImage('i_exit.gif','class="sfolder"');</script>�뿪��վ</a><br/><div id="kbsrcInfo">menu</div>
<?php
	}
?>
</div>
<div>
<br/><script type="text/javascript" src="bbsleftad130409.js"></script><br/>
</div>
<div>
</div>
</body>
</html>