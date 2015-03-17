<?php

require("inc/funcs.php");
require("inc/user.inc.php");
require("inc/board.inc.php");
require("inc/ubbcode.php");
require("menpai.php");
require("inc/userdatadefine.inc.php");
require("inc/treeview.inc.php");
require_once("inc/myface.inc.php");

if (isset($_GET["js"])) {
    output_js();
    exit;
}

global $boardArr;
global $boardID;
global $boardName;
global $articles;
global $groupID;
global $start; /*�ڼ�ƪ��ʼ 0-based */
global $listType;
global $isbm;
global $total; /* ����һ����ƪ */
global $num; /* һ����ʾ��ƪ */
global $pos; /*�������� .WEBTHREAD �е�λ�ã�0-based��-1 ��ʾû�������Ϣ */
global $is_tex;

setStat("�����Ķ�");

preprocess();

setStat(htmlspecialchars($articles[0]['TITLE'] ,ENT_QUOTES) . " " );

show_nav($boardName,$is_tex,getBoardRSS($boardName));

showUserMailBoxOrBR();
board_head_var($boardArr['DESC'],$boardName,$boardArr['SECNUM']);
showArticleThreads($boardName,$boardID,$groupID,$articles,$start,$listType,$total,$num,$pos);

show_footer();

function generate_thread_jump($boardID, $boardName, $isNext, $pos, $groupID) {
	$total = bbs_getThreadNum($boardID);
	if ($pos <= 0 && !$isNext) return;
	if (($pos >= $total - 1) && $isNext) return;
	$min = $pos;
	if (!$isNext) $min--;
	$articles = bbs_getthreads($boardName, $min, 2, 1);
	if ($articles === false || count($articles) != 2) {
		foundErr("��ȡ����ʧ��");
	}
	$now = $articles[$isNext ? 0 : 1];
	if ($now['lastreply']['GROUPID'] != $groupID) {
		foundErr("�������������仯�����������·��ġ�<a href=\"board.php?name=".$boardName."\">�����ﷵ�ذ���</a>");
	}
	$mt = $articles[$isNext ? 1 : 0];
	$pos = $pos + ($isNext ? 1 : -1);
	$groupID = $mt['lastreply']['GROUPID'];
	header("Location: disparticle.php?boardName=".$boardName."&ID=".$groupID."&pos=".$pos);
	exit;
}

function preprocess(){
	global $boardID;
	global $boardName;
	global $currentuser;
	global $boardArr;
	global $articles;
	global $groupID;
	global $dir_modes;
	global $listType;
	global $start;
	global $isbm;
	global $total;
	global $num;
	global $pos;
	global $is_tex;
	if (!isset($_GET['boardName'])) {
		foundErr("δָ�����档");
	}
	$boardName=$_GET['boardName'];
	$brdArr=array();
	$boardID= bbs_getboard($boardName,$brdArr);
	$boardArr=$brdArr;
	$boardName=$brdArr['NAME'];
	if ($boardID==0) {
		foundErr("ָ���İ��治����");
	}
	$usernum = $currentuser["index"];
	if (bbs_checkreadperm($usernum, $boardID) == 0) {
		foundErr("����Ȩ�Ķ�����");
	}
	if (!isset($_GET['ID'])) {
		foundErr("��ָ�������²����ڣ�");
	} else {
		$groupID=intval($_GET['ID']);
	}

	$pos = -1;
	if (isset($_GET['pos'])) {
		$pos = @intval($_GET['pos']);
	}
	if (($pos != -1) && isset($_GET['mt'])) { //ԭ���ϣ�$pos == -1 �Ļ����Դ� .WEBTHREAD �����β��ң���������...
		$mt = @intval($_GET['mt']);
		generate_thread_jump($boardID, $boardName, ($mt == 1), $pos, $groupID);
	}

	$listType=0;
	if(isset($_GET['listType'])) {
		if ($_GET['listType']=='1')
			$listType=1;
	}
	if ($listType == 0) {
		if (isset($_GET['page'])) {
			$start = THREADSPERPAGE * (intval($_GET['page']) - 1);
		} else {
			$start = 0;
		}
	} else {
		if (!isset($_GET['start'])) {
			$start=0;
		} else {
			$start=intval($_GET['start']);
		}
	}

	$isbm = bbs_is_bm($boardID, $usernum);
	
	bbs_set_onboard($boardID,1);
	
	$articles = array();
	$num = bbs_get_threads_from_gid($boardID, $groupID, $groupID, $articles, $haveprev );
	if ($num==0) {
		foundErr("��ָ�������²����ڣ�");
	}
	if ($start < 0) $start = 0;
	if ($start >= $num) $start = $num - 1;

	$total=count($articles);
	/*����guest�ʻ��Ķ�1��ǰ�� by zhaiwx1987*/
    $time1 = strftime('%Y-%m-%d %H:%M:%S', intval($articles[0]['POSTTIME']));
    $time2 = date("Y-m-d H:i:s",time());
    $diff=(strtotime($time2)-strtotime($time1))/(60*60*24);
    $user_IP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
    $user_IP = ($user_IP) ? $user_IP : $_SERVER["REMOTE_ADDR"];
    if($user_IP!='218.197.148.4'){
    if($diff>365&&$currentuser["userid"] =="guest"){
    foundErr("guest�û�����Ȩ���Ķ�һ��ǰ�����ӣ������Ե�¼�����Ķ�");
    }}
    	
	$num=THREADSPERPAGE;
	if ($start<0) {
		$start=0;
	} elseif ($start>=$total) {
		$start=$total-1;
	}
	if (($start+$num)>$total) {
		$num=$total-$start;
	}
	if ($listType==1) {
		$num=1;
	}
	
	$is_tex = 0;
	if (SUPPORT_TEX) {
		for($i=0;$i<$num;$i++) {
			if ($articles[$i+$start]["IS_TEX"]) {
				$is_tex = 1;
				break;
			}
		}
	}
	
	return true;
}

function article_bar($boardName,$boardID,$groupID,$article,$startNum,$listType,$pos){
	global $dir_modes;
?>
<table cellpadding="2" cellspacing="0" border="0" width="97%" align="center">
	<tr><td width="2"> </td>
	<td align="left" valign="middle" style="height:27"><table cellpadding="0" cellspacing="0" border="0" ><tr>
	<td width="110"><a href="postarticle.php?board=<?php echo $boardName; ?>"><div class="buttonClass1" border="0" title="������"></div></a></td>
<!--	<td width="110"><a href="#" onclick="alert('���������ڿ����У�')"><div class="buttonClass2" border="0" title="������ͶƱ"></div></a></td>-->
	<td width="110"><a href="postarticle.php?board=<?php echo $boardName; ?>&amp;reID=<?php echo $article['ID']; ?>"><div class="buttonClass4" border="0" title="�ظ�������"></div></a></td>
	</tr></table>
	</td>
	<td align="right" valign="middle">
<?php
	if ($pos != -1 && $pos != 0) {
?>
	<a href="disparticle.php?boardName=<?php echo $boardName; ?>&amp;ID=<?php echo $groupID; ?>&amp;pos=<?php echo $pos; ?>&amp;mt=-1"><img src="pic/prethread.gif" border="0" title="�����һƪ����" width="52" height="12"/></a>&nbsp;
<?php
	}
?>
	<a href="javascript:this.location.reload()"><img src="pic/refresh.gif" border="0" title="ˢ�±�����" width="40" height="12"/></a> &nbsp;
<?php
	if ($listType==1) {
?>
	<a href="disparticle.php?boardName=<?php echo $boardName; ?>&amp;ID=<?php echo $groupID; ?>&amp;page=<?php echo ceil(($startNum+1)/THREADSPERPAGE); ?>&amp;pos=<?php echo $pos; ?>&amp;listType=0"><img src="pic/flatview.gif" width="40" height="12" border="0" title="ƽ����ʾ����"/></a>
<?php
	} else {
?>
	<a href="disparticle.php?boardName=<?php echo $boardName; ?>&amp;ID=<?php echo $groupID; ?>&amp;start=<?php echo $startNum; ?>&amp;pos=<?php echo $pos; ?>&amp;listType=1"><img src="pic/treeview.gif" width="40" height="12" border="0" title="������ʾ����"/></a>
<?php
	}
	if ($pos != -1) { //���һƪ�Ծ���ʾ
?>
	��<a href="disparticle.php?boardName=<?php echo $boardName; ?>&amp;ID=<?php echo $groupID; ?>&amp;pos=<?php echo $pos; ?>&amp;mt=1"><img src="pic/nextthread.gif" border="0" title="�����һƪ����" width="52" height="12"/></a>
<?php
	}
?>
	</td>
	</tr>
</table>
<?php
}

function dispArticleTitle($boardName,$boardID,$groupID,$article, $startNum){
?>
<table cellPadding="0" cellSpacing="1" align="center" class="TableBorder1">
	<tr align="middle"> 
	<td align="left" valign="middle" width="100%" height="25">
		<table width="100%" cellPadding="0" cellSpacing="0" border="0">
		<tr>
		<th align="left" valign="middle" width="73%" height="25">
		&nbsp;* �������⣺ <?php echo htmlspecialchars($article['TITLE'],ENT_QUOTES); ?>  
<?php /* ���������⣬������ 
<script language="JavaScript">
<!--
	var flags = "<?php echo $article['FLAGS'][0]; ?>";
	if (article_is_zhiding(flags)) {
		document.write("[�̶�]");
	} else if(article_is_noreply(flags)) {
		document.write("[����]");
	} else if(article_is_digest(flags)) {
		document.write("[����]");
	}
//-->
</script>
*/ ?>
		</th>
		<th width="37%" align="right">
<?php
/*
		<a href=# onclick="alert('��������δʵ��');"><img src="pic/saveas.gif" border=0 title=�����ҳΪ�ļ�></a>&nbsp;
		<a href=# onclick="alert('��������δʵ��');"><img src="pic/report.gif" title=���汾�������� border=0></a>&nbsp;
		<a href=# onclick="alert('��������δʵ��');"><img src="pic/printpage.gif" title=��ʾ�ɴ�ӡ�İ汾 border=0></a>&nbsp;
		<a href=# onclick="alert('��������δʵ��');"><img src="pic/pag.gif" border=0 title=�ѱ�������ʵ�></a>&nbsp;
		<a href=# onclick="alert('��������δʵ��');"><IMG SRC="pic/fav_add.gif" BORDER=0 title=�ѱ���������̳�ղؼ�></a>&nbsp;
		<a href=# onclick="alert('��������δʵ��');"><img src="pic/emailtofriend.gif" border=0 title=���ͱ�ҳ�������></a>&nbsp;
*/
?>
		<a href="#" onClick="window.external.AddFavorite(location.href, document.title);"><img src="pic/fav_add1.gif" border="0" width="15" height="15" title="�ѱ�������IE�ղؼ�"/></a>&nbsp;
		</th>
		</tr>
		</table>
	</td>
	</tr>
</table>
<?php
}

function showArticleThreads($boardName,$boardID,$groupID,$articles,$start,$listType,$total,$num,$pos) {
	global $dir_modes;
	$totalPages=ceil(($total)/THREADSPERPAGE);
	$page=ceil(($start+1)/THREADSPERPAGE);
	article_bar($boardName,$boardID,$groupID, $articles[0], $start, $listType,$pos);
	dispArticleTitle($boardName,$boardID,$groupID,$articles[0],$start);
?>
<table cellPadding="5" cellSpacing="1" align="center" class="TableBorder1" style=" table-layout:fixed;word-break:break-all">
<?php
	for($i=0;$i<$num;$i++) {
		showArticle($boardName,$boardID,$i+$start,$articles[$i+$start]['ID'],$articles[$i+$start],$i%2);
	}
?>
</table>
<table cellpadding="0" cellspacing="3" border="0" width="97%" align="center"><tr><td valign="middle" nowrap="nowarp">����������<b><?php echo $total; ?></b>
<?php
	if ($listType!=1) {
?>
&nbsp;&nbsp;��ҳ��
<?php
		showPageJumpers($page, $totalPages, "disparticle.php?boardName=".$boardName."&amp;ID=".$groupID."&amp;pos=".$pos."&amp;page=");
	}
?></td><td valign="middle" nowrap="nowrap" align="right">
<?php 
	boardJump();
?></td></tr></table>
<br/>
<?php
	if ($listType==1) {
?>
<table cellpadding="3" cellspacing="1" class="TableBorder1" align="center">
<tr><th align="left" width="90%" valign="middle"> &nbsp;*����Ŀ¼</th>
<th width="10%" align="right" valign="middle" height="24" id="TableTitleLink"> <a href="#top"><img src="pic/gotop.gif" border="0"/>����</a>&nbsp;</th></tr>
<?php
		showTree($boardName,$groupID,$articles,"showTreeItem", TREEVIEW_MAXITEM, $start);
?>
</table>
<?php
	}
}

$gbms = array();
function get_boards222($userbm){
	$ret = "";
	for($i = 0; $i < BBS_SECNUM; $i++){
		$str = get_sub_boards($i,0,$userbm);
		if($str != "")
			$ret .= $str;
	}
	return $ret;
}

function get_sub_boards( $g1,$g2,$userbm ){
	$ret = "";
	$yank = 0;
	if ($yank) $yank = 1;
	$boards = bbs_getboards(constant("BBS_SECCODE".$g1), $g2, $yank | 2);
	$brd_name = $boards["NAME"]; // Ӣ����
	$brd_desc = $boards["DESC"]; // ��������
	$brd_flag = $boards["FLAG"]; //flag
	$brd_bid = $boards["BID"]; //flag
	$brd_bm = $boards["BM"]; //flag
	$brd_num = sizeof($brd_name);

	for($j=0;$j<$brd_num;$j++){
		if ($brd_flag[$j]&BBS_BOARD_GROUP){
			get_sub_boards($g1,$brd_bid[$j],$userbm);
		}else{
			$bms=split(' ',$brd_bm[$j]);
			foreach($bms as $bm) {
				if( $bm == $userbm){
					$ret .= $brd_desc[$j].',';
					break;
				}

			}
		}
	}
	return $ret;
}
function output_js() {
    global $loginok;
    global $currentuser;

	if (!isset($_GET["bid"])) die;
	$brdnum = $_GET["bid"] ;
    settype($brdnum,"integer");
   	if (!isset($_GET["id"])) die;
	$id = $_GET["id"];
	settype($id, "integer");

	if ( $brdnum == 0 ) die;
	$board = bbs_getbname($brdnum);
	if( !$board ) die;
	$brdarr = array();
	if ( $brdnum != bbs_getboard($board, $brdarr) ) die;

    $isnormalboard=bbs_normalboard($board);
	if($loginok == 1) $usernum = $currentuser["index"];
	if (!$isnormalboard && bbs_checkreadperm($usernum, $brdnum) == 0) die;

	$articles = array ();
	$num = bbs_get_records_from_id($brdarr["NAME"], $id, $dir_modes["NORMAL"], $articles);
    if ($num == 0) die;
	$filename = bbs_get_board_filename($brdarr["NAME"], $articles[1]["FILENAME"]);
    if ($isnormalboard) {
        if (cache_header("public",filemtime($filename),300)) return;
    }
    $articleContents = getArticleContents($brdnum, $filename, $articles[1], $id, '');
    echo "document.write('" . addcslashes($articleContents, "\'\\") . "');";
}

function getArticleContents($boardID, $filename, $article, $articleID, $fgstyle) {
	/* �������ݴ������� */
	$is_tex = SUPPORT_TEX && $article["IS_TEX"];
	$articleContents = bbs_printansifile($filename,1,'bbscon.php?bid='.$boardID.'&amp;id='.$articleID,$is_tex,0);
	if (0) { /* �ⲿ�ָ�վ��������ж��ƣ��������һ��ʾ�� */
		/* ȥ����һ�� */
		$chit = strpos( $articleContents, "��&nbsp;&nbsp;��:" );
		if ($chit !== false) $articleContents = substr($articleContents, $chit);
		
		/* ����ͷ��ȥ�� */
		$sf = "<br />  <br />";
		$chit = strpos( $articleContents, $sf );
		if ($chit !== false) $articleContents = substr($articleContents, $chit + strlen($sf));
	
		/* ȥ��������Դ */
		$search=array("'<font class=\"f[0-9]+\">��&nbsp;��Դ:��.+\[FROM:&nbsp;[^\]]+\]</font><font class=\"f000\"> <br />'");
        $replace=array("");
        $articleContents = preg_replace($search,$replace,$articleContents);
        
        /* ��ʾ����ʱ�� */
		$articleContents = "<b>������: ".strftime('%Y-%m-%d %H:%M:%S', intval($article['POSTTIME']))."</b><br /><br />".$articleContents;
	}
	$articleContents = str_replace("&nbsp;", " ", $articleContents);
	$articleContents = str_replace("  ", " &nbsp;", $articleContents);
	$articleContents = DvbTexCode($articleContents,0,$fgstyle,$is_tex);
	/* �������ݴ�����������ʱ $articleContents Ӧ�����ܹ�ֱ����������� */
	return $articleContents;
}

function showArticle($boardName,$boardID, $startNum, $articleID,$article,$type){
	global $loginok;
	global $isbm;

		
		
	$bgstyle='TableBody'.($type+1);
	$fgstyle='TableBody'.(2-$type);

	if ($loginok) {
		bbs_brcaddread($boardName, $articleID);
	}
    if (ARTICLE_USE_JS) {
        $articleContents = "<script language=\"JavaScript\" src=\"disparticle.php?js=1&amp;bid=$boardID&amp;id=$articleID\"></script>";
    } else {
        $filename = bbs_get_board_filename($boardName, $article["FILENAME"]);
        $articleContents = getArticleContents($boardID, $filename, $article, $articleID, $fgstyle);
    }

	$user=array();
	include("inc/whuacc.php");  //�����ʺ� wudi 2011-5-20
		
		$user_num=bbs_getuser($article['OWNER'],$user);
	if ($user_num == 0) {
		$user = false;
	} else if ($article['POSTTIME'] < $user['firstlogin']) {
		$user = false; //ǰ�˷�������
	}
?>
<tr><td class="<?php echo $bgstyle ;?>" valign="top" width="175" >
<a name="a<?php echo $startNum; ?>"></a>
<table width="100%" cellpadding="2" cellspacing="0" >
<tr><td width="*" valign="middle" style="filter:glow(color=#9898BA,strength=2)" >&nbsp;
<?php
	if(isset($accwhu[$article['OWNER']])) $str = "<font color=\"#000099\"><b>" . $accwhu[$article['OWNER']]. "</b></font>";
	else $str = "<font color=\"#990000\"><b>" . $article['OWNER']. "</b></font>";
	if ($user !== false) {
		$str = "<a href=\"dispuser.php?id=" . $article['OWNER']. "\" target=\"_blank\" title=\"�鿴" . $article['OWNER'] . "�ĸ�������\" style=\"TEXT-DECORATION: none;\">" . $str . "</a>";
		if ($isbm) {
			$str .= "&nbsp;[<a href=\"bmdeny.php?board=".$boardName."&amp;userid=".$article['OWNER']."\" title=\"�����������\"><font color=\"red\">��</font></a>]";
		}
	}
	echo "<nobr>".$str."</nobr>";
?>
</td>
<td width="25" valign="middle">
<?php
	if ($user !== false) {
		$is_online = bbs_isonline($article['OWNER']);
		$show_detail = ($user['userdefine0'] & BBS_DEF_SHOWDETAILUSERDATA);
		if(isset($accwhu[$article['OWNER']])){
					$c = "���Źٷ��ʺ�";
					if ($is_online) {
						$img = "pic/favicon.gif";
					} else {
						$img = "pic/offfavicon.gif";
					}
		}else{
			if ($show_detail) {
				if ( chr($user['gender'])=='M' ){
					$c = "˧��Ӵ";
					if ($is_online) {
						$img = "pic/Male.gif";
					} else {
						$img = "pic/ofmale.gif";
					}
				} else {
					$c = "��ŮӴ";
					if ($is_online) {
						$img = "pic/Female.gif";
					} else {
						$img = "pic/offemale.gif";
					}
				}
			} else {
				$c = "�Ա���Ӵ";
				if ($is_online) {
					$img = "pic/online1.gif";
				} else {
					$img = "pic/offline1.gif";
				}
			}
		}
		if ($loginok && $is_online) {
			echo '<a href="javascript:replyMsg(\''.$article['OWNER'].'\')"><img src="'.$img.'" border="0" title="'.$c.'�����ߣ�����������"/></a>';
		} else {
			echo '<img src="'.$img.'" border="0" title="'.$c.'��'.($is_online?'����':'����').'"/>';
		}
	} else {
		echo '<img src="pic/offline1.gif" border="0" title="δ֪�û�"/>';
	}
?>
</td>
<td width="10" valign="middle"></td></tr></table>
<?php
	if ($user !== false) {
?>
&nbsp;&nbsp;<?php echo get_myface($user); ?><br/>

<?php
 include("inc/annu_Selection.php");  //bbs�����ѡ by kfeng 2015-2-2
 if(isset($bbsSelect[$article['OWNER']])){
	$select = "&nbsp;&nbsp;<font color='red'><b>" . $bbsSelect[$article['OWNER']]. "</b></font> <br/>";
	echo "<nobr>".$select."</nobr>";
 }
 if($article['OWNER'] == 'zhu'){
	$select = "&nbsp;&nbsp;<font color='red'><b>" . '2014�������ˮ��' . "</b></font> <br/>";
	echo "<nobr>".$select."</nobr>";
 }
?>
 
<?php if(bbs_getgroup($article['OWNER'])==1){ $groupinf = getgroupinfo($article['OWNER']);
?>

&nbsp;&nbsp;���ɣ�<?php echo $groupinf[1]; ?>&nbsp<?php echo $groupinf[2]; ?><br/><?php }?>
&nbsp;&nbsp;���ݣ�<?php 

$sf = bbs_getuserlevel($article['OWNER']); 
if( $sf === '����' ){
	if($gbms[$article['OWNER']])
		$bms = $gbms[$article['OWNER']];
	else{
		$bms = get_boards222($article['OWNER']);
		if($bms[strlen($bms)-1]==',')
			$bms = substr($bms, 0, strlen($bms)-1);
		$gbms[] = array( $article['OWNER'] => $bms);
	}
	echo "<font color='red'>[$bms] $sf</font>";
}
else{
	echo $sf;
}

?><br/>
&nbsp;&nbsp;�ȼ���<?php echo bbs_getexplevel($article['OWNER']); ?><br/>

<?php
	if($whuacc[$article['OWNER']])
?>
<?php
		if (SHOW_REGISTER_TIME) {
?>
&nbsp;&nbsp;ע�᣺<?php echo strftime('%Y-%m-%d',$user['firstlogin']); ?><br/>
<?php
		}
		if ($show_detail) {
?>
&nbsp;&nbsp;������<?php echo get_astro($user['birthmonth'],$user['birthday']); ?>
<?php
		}
	}
?>
</td>

<td class="<?php echo $bgstyle ;?>" valign="top" width="*">

<table width="100%" ><tr><td width="*">
<a href="queryresult.php?userid=<?php echo $article['OWNER']; ?>&amp;boardNames=<?php echo $boardName; ?>"><img src="pic/find.gif" border="0" title="����<?php echo $article['OWNER']; ?>�ڱ������������"/></a>&nbsp;
<a href="sendmail.php?board=<?php echo $boardName; ?>&amp;reID=<?php echo $articleID; ?>"><img title="������﷢���ż���<?php echo $article['OWNER']; ?>" border="0" src="pic/email.gif"/></a>&nbsp;
<a href="editarticle.php?board=<?php echo $boardName; ?>&amp;reID=<?php echo $articleID; ?>"><img src="pic/edit.gif" border="0" title="�༭"/></a>&nbsp;

<?php
//added by davidxn  2013.11.28 У����¥
if( $boardName=="WHUCelebration" && !($currentuser["userlevel"]&BBS_PERM_SYSOP )  )
{
	//do nothing
}
else
{
?>
<a href="deletearticle.php?board=<?php echo $boardName; ?>&amp;ID=<?php echo $articleID; ?>" onclick="return confirm('�����Ҫɾ��������?')"><img src="pic/delete.gif" border="0" title="ɾ��"/></a>&nbsp;
<?php
}//added by davidxn  2013.11.28 У����¥
?>
<?php
	if (!OLD_REPLY_STYLE && ENABLE_UBB) {
?>
<a href="postarticle.php?board=<?php echo $boardName; ?>&amp;reID=<?php echo $articleID; ?>&amp;quote=1"><img src="pic/reply.gif" border="0" title="���ûظ��������"/></a>&nbsp;
<?php
	}
?>
<a href="postarticle.php?board=<?php echo $boardName; ?>&amp;reID=<?php echo $articleID; ?>"><img src="pic/reply_a.gif" border="0" title="�ظ��������"/></a>
</td>
<td width="50">
<b><?php echo $startNum==0?'¥��':'��<font color="#ff0000">'.$startNum.'</font>¥'; ?></b></td></tr><tr><td bgcolor="#D8C0B1" height="1" colspan="2"></td></tr>
</table>

<table border="0" width="98%" style=" table-layout:fixed;word-break:break-all"><tr><td width="100%" style="font-size:9pt;line-height:12pt;padding: 0px 5px;"><?php echo $articleContents; ?></td></tr></table>
</td>

</tr>
<?php

/*
<tr>
<td class=<?php echo $bgstyle ;?> valign=middle align=center width=175><a href=# onclick="alert('��������δʵ��');" target=_blank><img align=absmiddle border=0 width=13 height=15 src="pic/ip.gif" title="����鿴�û���Դ������<br>����IP��*.*.*.*"></a> <?php echo strftime("%Y-%m-%d %H:%M:%S",$article['POSTTIME']); ?></td>
<td class=<?php echo $bgstyle ;?> valign=middle width=*>
<table width=100% cellpadding=0 cellspacing=0><tr>
  <td align=left valign=middle> &nbsp;&nbsp;<a href=# onclick="alert('��������δʵ��');" title="ͬ������۵㣬����һ���ʻ�����������5���Ǯ"><img src=pic/xianhua.gif border=0>�ʻ�</a>(<font color=#FF0000>0</font>)&nbsp;&nbsp;<a href=# onclick="alert('��������δʵ��');" title="��ͬ������۵㣬����һ����������������5���Ǯ"><img src=pic/jidan.gif border=0>����</a>(<font color=#FF0000>0</font>)</td><td align=right nowarp valign=bottom width=200></td>
  <td align=right valign=bottom width=4><a href="bmmanage.php?board=<?php echo $boardName; ?>&ID=<?php echo $articleID; ?>"><img src="pic/jing.gif" border=0 title=�л�����</a></td>
</tr></table>
</td></tr>
<?php
	*/
}

function showTreeItem($boardName,$groupID,$article,$startNum,$level, $lastflag){
	global $start; //������˼�����ȫ�ֱ��� - atppp
	global $pos;
	echo '<tr><td class="TableBody'.($start==$startNum?1:2).'" width="100%" height="22" colspan="2">';
	for ($i=0;$i<$level;$i++) {
		if ($lastflag[$i]) {
			if ($i == $level - 1) echo '<img src="pic/treenode2.gif"/>'; // |-
			else echo '<img src="pic/treenode.gif"/>';                   // |
		} else {
			if ($i == $level - 1) echo '<img src="pic/treenode1.gif"/>'; // \
			else echo "&nbsp;&nbsp;";                               // nothing
		}
	}
	if ($article == null) {
		echo ' ... <a href="disparticle.php?boardName='.$boardName.'&amp;ID='.$groupID.'&amp;start='.$startNum.'&amp;pos='.$pos.'&amp;listType=1"><span style="color:red">���и���</span></a> ...';
	} else {
		echo '<img src="face/face1.gif" height="16" width="16"/>  <a href="disparticle.php?boardName='.$boardName.'&amp;ID='.$groupID.'&amp;start='.$startNum.'&amp;pos='.$pos.'&amp;listType=1">';
		if ($start==$startNum) echo "<font color=\"red\">";
		echo htmlspecialchars($article['TITLE'],ENT_QUOTES);
		if ($start==$startNum) echo "</font>";
		echo ' </a><i><font color="gray">(';
		if ($article["EFFSIZE"] < 1000) echo $article["EFFSIZE"];
		else {
			printf("%.1f",$article["EFFSIZE"]/1000.0); echo "k";
		}
		echo '��)</font> �� <a href="dispuser.php?id='.$article['OWNER'].'" target="_blank" title="��������"><font color="gray">'.$article['OWNER'].'</font></a>��'.strftime("%Y��%m��%d�� %T",$article['POSTTIME']);
		echo '</i>';
	}
	echo '</td></tr>';	
}
?>