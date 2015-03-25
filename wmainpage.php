
<?php
require("www2-funcs.php");
require("www2-board.php");
bbs_set_onboard(0,0);
login_init();
bbs_session_modify_user_mode(BBS_MODE_MMENU);

# get an attribute from a particular node
function find_attr($parent,$name,$attr)
{
    $nodes = $parent->child_nodes();
    while($node = array_shift($nodes))
        if ($node->node_name() == $name)
            return $node->get_attribute($attr);
    return "";
}

?>
<?php
function gen_hot_subjects_html()
{
# load xml doc
$hotsubject_file = BBS_HOME . "/xml/day.xml";
$doc = domxml_open_file($hotsubject_file);
	if (!$doc)
		return;

$root = $doc->document_element();
$boards = $root->child_nodes();


$brdarr = array();
?>
<!--
<div align="center">
  <table cellpadding="0" cellspacing="0" class="hot_title">
    <tr>
      <td>&nbsp;&nbsp;十大热点话题 [<a href="rssi.php?h=1" target="_blank">RSS</a>]</td>
    </tr>
  </table>
</div>
-->

  <?php
# shift through the array
$hot_cnt = 0;
while($board = array_shift($boards))
{
    if ($board->node_type() == XML_TEXT_NODE)
        continue;
    if($hot_cnt > 5)//目前只显示十大中前五个
    	break;

    $hot_title = find_content($board, "title");
    $hot_author = find_content($board, "author");
    $hot_board = find_content($board, "board");
    $hot_time = find_content($board, "time");
    $hot_number = find_content($board, "number");
    $hot_groupid = find_content($board, "groupid");

	$brdnum = bbs_getboard($hot_board, $brdarr);
	if ($brdnum == 0)
		continue;
	$brd_encode = urlencode($brdarr["NAME"]);
	$hot_cnt++;
	// if ($hot_cnt == 1) {
	//  	$brd_encode = "WHUExpress";
	//  	$brdarr["DESC"] = "武大特快";
	//  	$hot_groupid = "636672";
	//  	$hot_title = "【讲座】提升写作和在美国学术期刊上发文- Bryan Van Norden";
	//  	$hot_author = "moses2013";
	// }

?>
<div class="story-content-answer">
	<span class="vote">
		526
	</span>
	<p>
	<a class="question_link" href="wForum/disparticle.php?boardName=<?php echo $brd_encode; ?>&ID=<?php echo $hot_groupid; ?>">
		<?php echo htmlspecialchars($hot_title); ?>
	</a>
	[<a href="wForum/board.php?name=<?php echo $brd_encode; ?>">
		<?php  echo htmlspecialchars($brdarr["DESC"]); ?>
	</a>]
	</p>
</div>

<!--
  <tr>
    <td class="HotTitle">[<a href="wForum/board.php?name=<?php echo $brd_encode; ?>">
      <?php  echo htmlspecialchars($brdarr["DESC"]); ?>
      </a>]<a href="wForum/disparticle.php?boardName=<?php echo $brd_encode; ?>&ID=<?php echo $hot_groupid; ?>"><?php echo htmlspecialchars($hot_title); ?></a></td>
    <td class="HotAuthor"><a href="wForum/dispuser.php?id=<?php echo $hot_author; ?>">
      <?php  echo $hot_author; ?>
      </a>&nbsp;&nbsp;</td>
  </tr>-->
  <?php
}
?>

<?php
}

function gen_sec_hot_subjects_html($secid)
{
	# load xml doc
	$boardrank_file = BBS_HOME . sprintf("/xml/day_sec%d.xml", $secid);
	$doc = domxml_open_file($boardrank_file);
	if (!$doc)
		return;


	$root = $doc->document_element();
	$boards = $root->child_nodes();
?>
<?php
	$brdarr = array();
	# shift through the array
	$cnt = 0;
	while($board = array_shift($boards))
	{
	    if ($board->node_type() == XML_TEXT_NODE)
		continue;
	    if($cnt > 5)
	    	break;
	    $hot_title = find_content($board, "title");
	    $hot_author = find_content($board, "author");
	    $hot_board = find_content($board, "board");
	    $hot_time = find_content($board, "time");
	    $hot_number = find_content($board, "number");
	    $hot_groupid = find_content($board, "groupid");

		$brdnum = bbs_getboard($hot_board, $brdarr);
		if ($brdnum == 0)
			continue;
		$brd_encode = urlencode($brdarr["NAME"]);
		//if($brd_encode=="KingKiller") continue;
        // if($brd_encode == 'PartTimeJob' && $hot_groupid == '35138')
        //         continue;
?>

<div class="story-content-answer">
	<span class="vote">
		526
	</span>
	<p>
		<a class="question_link" href="wForum/disparticle.php?boardName=<?php echo $brd_encode; ?>&ID=<?php echo $hot_groupid; ?>">
			<?php echo htmlspecialchars($hot_title); ?>
		</a>
		[<a href="wForum/board.php?name=<?php echo $brd_encode; ?>">
    			<?php  echo htmlspecialchars($brdarr["DESC"]); ?>
    		</a>]
	</p>
</div>
<!--
<tr>
  <td class="SectionItem">[<a href="wForum/board.php?name=<?php echo $brd_encode; ?>">
    <?php  echo htmlspecialchars($brdarr["DESC"]); ?>
    </a>]<a href="wForum/disparticle.php?boardName=<?php echo $brd_encode; ?>&ID=<?php echo $hot_groupid; ?>"><?php echo htmlspecialchars($hot_title); ?></a>&nbsp;&nbsp;</td>
    <td class="HotSecAuthor"><a href="wForum/dispuser.php?id=<?php  echo $hot_author; ?>"><?php  echo $hot_author; ?></a></td>
</tr>-->
<?php
	}
}


function gen_sections_html()
{

# load xml doc
$boardrank_file = BBS_HOME . "/xml/board.xml";
$doc = domxml_open_file($boardrank_file);
	if (!$doc)
		return;


$root = $doc->document_element();
$boards = $root->child_nodes();

$sec_boards = array();
$sec_boards_num = array();
for ($i = 0; $i < BBS_SECNUM; $i++)
{
	$sec_boards[$i] = array();
	$sec_boards_num[$i] = 0;
}
$t = array(); // 分区序号变换表
for ($i = 0; $i < BBS_SECNUM - 2; $i++)
	$t[$i] = $i + 2;
$t[$i] = 0;
$t[$i+1] = 1;

# shift through the array
while($board = array_shift($boards))
{
    if ($board->node_type() == XML_TEXT_NODE)
        continue;

    $ename = find_content($board, "EnglishName");
    if(urlencode($ename)=="KingKiller") continue;
    $cname = find_content($board, "ChineseName");
    $visittimes = find_content($board, "VisitTimes");
    $staytime = find_content($board, "StayTime");
    $secid = find_content($board, "SecId");
	$sec_boards[$secid][$sec_boards_num[$secid]]["EnglishName"] = $ename;
	$sec_boards[$secid][$sec_boards_num[$secid]]["ChineseName"] = $cname;
	$sec_boards[$secid][$sec_boards_num[$secid]]["VisitTimes"] = $visittimes;
	$sec_boards[$secid][$sec_boards_num[$secid]]["StayTime"] = $staytime;
	$sec_boards_num[$secid]++;
}
?>
<div align="center">
  <table cellpadding="0" cellspacing="0" class="type_title">
    <tr>
      <td>&nbsp;&nbsp;分类精彩讨论区</td>
    </tr>
  </table>
</div>
<table border="0" cellpadding="0" cellspacing="0" class="SecTable" align="center">
  <?php
// 改变讨论区排列顺序
	$m = array();
	$m[0] = 8;
	$m[1] = 6;
	$m[2] = 0;
	$m[3] = 4;
	$m[4] = 2;
	$m[5] = 1;
	$m[6] = 5;
	$m[7] = 3;
	$m[8] = 7;	

	for ($j = 0; $j < BBS_SECNUM; $j++)
	{
		$i=$m[$j];
		if (defined("SITE_NEWSMTH") && ($t[$i]==0 || $t[$i]==1)) continue;
?>
  <tr>
    <td colspan="2" valign="top" class="SectionTitle"><script type="text/javascript">putImage("section.gif","");</script>
      &nbsp;<span class="SectionName"><a href="wForum/section.php?sec=<?php echo $t[$i]; ?>"><?php echo htmlspecialchars(constant("BBS_SECNAME".$t[$i]."_0")); ?></a></span>&nbsp;&nbsp;<span class="SectionList">
      <?php
		$brd_count = $sec_boards_num[$t[$i]] > 5 ? 5 : $sec_boards_num[$t[$i]];
		for ($k = 0; $k < $brd_count; $k++)
		{
?>
      <a href="wForum/board.php?name=<?php echo urlencode($sec_boards[$t[$i]][$k]["EnglishName"]); ?>"><?php echo $sec_boards[$t[$i]][$k]["ChineseName"]; ?></a>,
      <?php
		}
?>
      <a href="rssi.php?h=2&s=<?php echo $t[$i]; ?>" target="_blank">[RSS]</a><a href="wForum/section.php?sec=<?php echo $t[$i]; ?>">[更多]</a></span></td>
  </tr>
  <?php
		gen_sec_hot_subjects_html($t[$i]);
?>
  </tr>
  <?php
		if (BBS_SECNUM - $j > 1)
		{
?>
  <tr>
    <td height="1" class="SecLine"></td>
  </tr>
  <?php
		}
	}
?>
</table>
<?php
}
function gen_system_vote_html()
{
$vote_file = BBS_HOME."/vote/sysvote.html";
if(!file_exists($vote_file)) return;
include($vote_file);
?>
<br />
<?php
}

function gen_notice_html()
{
		$brdarr = array();
		$brdnum = bbs_getboard("Notice", $brdarr);
		if ( ($brdnum==0) || ($brdarr["FLAG"] & BBS_BOARD_GROUP) ) {
			echo '"当前没有海报","",';
		} else {
			$total = bbs_getThreadNum($brdnum);
			if ($total <= 0) {
				echo '"当前没有海报","",';
			} else {
				$articles = bbs_getthreads($brdarr['NAME'], 0, 30,1); 
				if ($articles == FALSE) {
					echo '"当前没有海报","",';
				} else {
					$num=count($articles);
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helpert">
  <tr>
    <td class="helpert_left"></td>
    <td class="helpert_middle">海报栏</td>
    <td class="helpert_right"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helper">
  <tr>
    <td width="100%" class="MainContentText"><ul style="margin: 5px 0px 0px 15px; padding: 0px;">
        <?php
					$j=14;
					for ($i=0;$i<$num;$i++) {
					if($articles[$i]['origin']['FLAGS'][0]=='g'){
						if($j--<0) break;
?>
        <li class="default"><?php echo "<a href=\"wForum/disparticle.php?boardName=".$brdarr['NAME']."&amp;ID=".$articles[$i]['origin']['ID']."&amp;pos=".$i."\">" .htmlspecialchars($articles[$i]['origin']['TITLE'],ENT_QUOTES) . "</a>";?></li>
        <?php          }
					}
				}
			}
		}
?>
      </ul></td>
  </tr>
</table>
<br>
<?php
}

function gen_search_html()
{
		$brdarr = array();
		$brdnum = bbs_getboard("Search", $brdarr);
		if ( ($brdnum==0) || ($brdarr["FLAG"] & BBS_BOARD_GROUP) ) {
			echo '"当前没有失物招领","",';
		} else {
			$total = bbs_getThreadNum($brdnum);
			if ($total <= 0) {
				echo '"当前没有失物招领","",';
			} else {
				$articles = bbs_getthreads($brdarr['NAME'], 0, 30,1); 
				if ($articles == FALSE) {
					echo '"当前没有失物招领","",';
				} else {
					$num=count($articles);
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helpert">
  <tr>
    <td class="helpert_left"></td>
    <td class="helpert_middle">失物招领</td>
    <td class="helpert_right"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helper">
  <tr>
    <td width="100%" class="MainContentText"><ul style="margin: 5px 0px 0px 15px; padding: 0px;">
        <?php
					$j=7;
					for ($i=0;$i<$num;$i++) {
					if($articles[$i]['origin']['FLAGS'][0]=='g'){
						if($j--<0) break;
?>
        <li class="default"><?php echo "<a href=\"wForum/disparticle.php?boardName=".$brdarr['NAME']."&amp;ID=".$articles[$i]['origin']['ID']."&amp;pos=".$i."\">" .htmlspecialchars($articles[$i]['origin']['TITLE'],ENT_QUOTES) . "</a>";?></li>
        <?php          }
					}
				}
			}
		}
?>
      </ul></td>
  </tr>
</table>
<br>
<?php
}

function gen_announce_html()
{
		$brdarr = array();
		$brdnum = bbs_getboard("Announce", $brdarr);
		if ( ($brdnum==0) || ($brdarr["FLAG"] & BBS_BOARD_GROUP) ) {
			echo '"当前没有公告","",';
		} else {
			$total = bbs_getThreadNum($brdnum);
			if ($total <= 0) {
				echo '"当前没有公告","",';
			} else {
				$articles = bbs_getthreads($brdarr['NAME'], 0, 10,1); 
				if ($articles == FALSE) {
					echo '"当前没有公告","",';
				} else {
					$num=count($articles);
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helpert">
  <tr>
    <td class="helpert_left"></td>
    <td class="helpert_middle">公告栏</td>
    <td class="helpert_right"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helper">
  <tr>
    <td width="100%" class="MainContentText"><ul style="margin: 5px 0px 0px 15px; padding: 0px;">
        <?php		$j=4;
					for ($i=0;$i<$num;$i++) {
					if($articles[$i]['origin']['FLAGS'][0]=='g'){
						if($j--<0) break;
?>
        <li class="default"><?php echo "<a href=\"wForum/disparticle.php?boardName=".$brdarr['NAME']."&amp;ID=".$articles[$i]['origin']['ID']."&amp;pos=".$i."\">" .htmlspecialchars($articles[$i]['origin']['TITLE'],ENT_QUOTES) . "</a>"; ?></li>
        <?php			}
					}
				}
			}
		}
?>
      </ul></td>
  </tr>
</table>
<br>
<?php
}

function gen_new_boards_html()
{
# load xml doc
$newboard_file = BBS_HOME . "/xml/newboards.xml";
$doc = domxml_open_file($newboard_file);
	if (!$doc)
		return;


$root = $doc->document_element();
$boards = $root->child_nodes();
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helpert">
  <tr>
    <td class="helpert_left"></td>
    <td class="helpert_middle">新开版面</td>
    <td class="helpert_right"></td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helper">
  <tr>
    <td width="100%" class="MainContentText"><ul style="margin: 5px 0px 0px 15px; padding: 0px;">
        <?php
	$brdarr = array();
	$j = 0;
	# shift through the array
	while($board = array_shift($boards))
	{
		if($j > 9)
			break;
		
		if ($board->node_type() == XML_TEXT_NODE)
			continue;

		$ename = find_content($board, "filename"); // EnglishName
		$brdnum = bbs_getboard($ename, $brdarr);
		if ($brdnum == 0)
			continue;
		$brd_encode = urlencode($brdarr["NAME"]);
		$j ++ ;
?>
        <li class="default"><a href="wForum/board.php?name=<?php echo $brd_encode; ?>"><?php echo htmlspecialchars($brdarr["DESC"]); ?></a></li>
        <?php
	}
?>
      </ul>
      <?php
	if($j > 9)
	{
?>
      <p align="right"><a href="bbsxmlbrd.php?flag=2">&gt;&gt;更多</a></p>
      <?php
	}
?></td>
  </tr>
</table>
<br>
<?php
}

function gen_recommend_boards_html()
{
# load xml doc
$boardrank_file = BBS_HOME . "/xml/rcmdbrd.xml";
$doc = domxml_open_file($boardrank_file);
	if (!$doc)
		return;


$root = $doc->document_element();
$boards = $root->child_nodes();
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helpert">
  <tr>
    <td class="helpert_left"></td>
    <td class="helpert_middle">推荐版面</td>
    <td class="helpert_right"></td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helper">
  <tr>
    <td width="100%" class="MainContentText"><ul style="margin: 5px 0px 0px 15px; padding: 0px;">
        <?php
	$brdarr = array();
	# shift through the array
	while($board = array_shift($boards))
	{
		if ($board->node_type() == XML_TEXT_NODE)
			continue;

		$ename = find_content($board, "EnglishName");
		//if(urlencode($ename)=="KingKiller") continue;
		$brdnum = bbs_getboard($ename, $brdarr);
		if ($brdnum == 0)
			continue;
		$brd_encode = urlencode($brdarr["NAME"]);
?>
        <li class="default"><a href="wForum/board.php?name=<?php echo $brd_encode; ?>"><?php echo htmlspecialchars($brdarr["DESC"]); ?></a></li>
        <?php
	}
?>
      </ul></td>
  </tr>
</table>
<br>
<?php
}


function gen_3guo_html()
{
	
	 	$mysql_server_name = "127.0.0.1";
        $mysql_username = "whubbs";
        $mysql_password = "bbswebwhu";
        $mysql_database = "3guo";
        
       
		$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
		mysql_select_db($mysql_database);
		$sql='select p_nickname from player_info order by p_grade desc,p_score desc limit 0,10;';
		$record = mysql_query($sql);
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helpert">
  <tr>
    <td class="helpert_left"></td>
    <td class="helpert_middle">逐鹿三国</td>
    <td class="helpert_right"></td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helper">
  <tr>
    <td width="100%" class="MainContentText"><ul style="margin: 5px 0px 0px 15px; padding: 0px;">
        <?php
		while ($arr = mysql_fetch_array($record))
		{
?>
        <li class="default"><a href="3guo/index.php" target="_blank"><?php echo $arr[0]; ?></a></li>
        <?php
	}
?>
      </ul></td>
  </tr>
</table>
<br>
<?php
}


function gen_weibo_html()
{
	
	 $mysql_server_name = "127.0.0.1";
        $mysql_username = "whubbs";
        $mysql_password = "bbswebwhu";
        $mysql_database = "weibo";
        
       
		$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
		mysql_query("SET NAMES 'gb2312'"); 
		mysql_select_db($mysql_database);
		$sql="SELECT DISTINCT(`tag_id`) AS `tag_id`, COUNT(item_id) AS `count` FROM `jishigou_topic_tag` WHERE dateline>='".($timestamp - 86400*20)."' GROUP BY `tag_id` ORDER BY `count` DESC LIMIT 10;";
		$record = mysql_query($sql);
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helpert">
  <tr>
    <td class="helpert_left"></td>
    <td class="helpert_middle">微博热门话题</td>
    <td class="helpert_right"></td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helper">
  <tr>
    <td width="100%" class="MainContentText"><ul style="margin: 5px 0px 0px 15px; padding: 0px;">
        <?php
		$i=0;
		$index=array();
		while ($arr = mysql_fetch_array($record))
		{
			$index[$i++]=$arr[0];
		}
		for($j=0;$j<$i;$j++){
			$sql="SELECT name from jishigou_tag where id=".$index[$j];$record = mysql_query($sql);
			while ($arr = mysql_fetch_array($record))
			{
			?>
			<li class="default"><a target="_blank" href="/w/index.php?mod=tag&code=<?php echo $arr[0]; ?>"><?php echo $arr[0]; ?></a></li>
			<?php
		}
	}
?>
      </ul></td>
  </tr>
</table>
<br>
<?php
}


function gen_commend_html()
{
# load xml doc
$commend_file = BBS_HOME . "/xml/commend.xml";
if( ! file_exists($commend_file) )
	return;
$doc = domxml_open_file($commend_file);
	if (!$doc)
		return;

$root = $doc->document_element();
$boards = $root->child_nodes();


$brdarr = array();
?>


  <?php
# shift through the array
$cnt = 0;
while($board = array_shift($boards))
{
    if ($board->node_type() == XML_TEXT_NODE)
        continue;
    if($cnt > 5)
    	break;

    $commend_title = find_content($board, "title");
    $commend_author = find_content($board, "author");
    $commend_o_board = find_content($board, "o_board");
    $commend_o_id = find_content($board, "o_id");
    $commend_id = find_content($board, "id");
    $commend_o_groupid = find_content($board, "o_groupid");
    $commend_brief = find_content($board, "brief");

	$brdnum = bbs_getboard($commend_o_board, $brdarr);
	if ($brdnum == 0)
		continue;
	$brd_encode = urlencode($brdarr["NAME"]);
        if($commend_id=='4637')
                continue;
        $cnt++;
?>

<div class="story-content-answer">
	<span class="vote">
		526
	</span>
	<p>
		<a class="question_link" href="wForum/disparticle.php?boardName=Recommend&ID=<?php echo $commend_id;?>">
			<?php echo htmlspecialchars($commend_title);?>
		</a>
		[<a href="wForum/board.php?name=<?php echo $brd_encode;?>"><?php echo htmlspecialchars($brdarr["DESC"]);?></a>]	
	</p>
</div>

<?php
}

function gen_board_rank_html()
{
# load xml doc
$boardrank_file = BBS_HOME . "/xml/board.xml";
$doc = domxml_open_file($boardrank_file);
	if (!$doc)
		return;


$root = $doc->document_element();
$boards = $root->child_nodes();

?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helpert">
  <tr>
    <td class="helpert_left"></td>
    <td class="helpert_middle">人气排名</td>
    <td class="helpert_right"></td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helper">
<tr>
    <td width="100%" class="MainContentText"><ul style="margin: 5px 0px 0px 0px; padding: 0px;">
  <?php
$i = 0;
# shift through the array
while($board = array_shift($boards))
{
	if ($board->node_type() == XML_TEXT_NODE)
		continue;

	$ename = find_content($board, "EnglishName");
	$cname = find_content($board, "ChineseName");
	if(urlencode($ename)=="KingKiller") continue;

	if ($i == 0) {
		$ename = 'WHUConnection';
		$cname = '部门直通车';
	}else if ($i == 1) {
		$ename = 'WHUExpress';
		$cname = '武大特快';
	}
?>
  <li class="default" style="list-style-type:none;"><?php echo $i+1; ?>.<a href="wForum/board.php?name=<?php echo urlencode($ename); ?>"><?php echo htmlspecialchars($cname); ?></a></li>
  <?php
	$i++;
	if ($i == 15)
		break;
}
?>
</ul>
</td></td>
</table>
<br>
<?php
}

function gen_blessing_list_html()
{
# load xml doc
$hotsubject_file = BBS_HOME . "/xml/bless.xml";
$doc = domxml_open_file($hotsubject_file);
	if (!$doc)
		return;

$root = $doc->document_element();
$boards = $root->child_nodes();

?>
<a name="todaybless"></a>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helpert">
  <tr>
    <td class="helpert_left"></td>
    <td class="helpert_middle">今日祝福</td>
    <td class="helpert_right"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="helper">
  <tr>
    <td class="MainContentText"><ul style="margin: 5px 0px 0px 15px; padding: 0px;">
        <?php
# shift through the array
while($board = array_shift($boards))
{
    if ($board->node_type() == XML_TEXT_NODE)
        continue;

    $hot_title = find_content($board, "title");
    $hot_board = find_content($board, "board");
    $hot_groupid = find_content($board, "groupid");
	if(!strstr($hot_title,"“赢”新年")){
?>
        <li class="default"><a href="wForum/disparticle.php?boardName=<?php echo $hot_board; ?>&ID=<?php echo $hot_groupid; ?>"><?php echo htmlspecialchars($hot_title); ?></a></li>
        <?php
}}
?>
      </ul></td>
  </tr>
</table>
<?php
}
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script src="static/www2-main.js"></script>
<script src="bbsad.js"></script>
<script src="bbsadtop.js"></script>
<script src="bbsadmid.js"></script>
<script type="text/javascript">writeCssMainpage();</script>
<link rel="stylesheet" type="text/css" href="wForum/css/ansi.css"/>
<link rel="stylesheet" type="text/css" href="wForum/css/common.css"/>
<link rel="stylesheet" type="text/css" href="static/randomad.css"/>

<?php include("./new_add_file.php"); ?>

</head>
<body>
<script src="static/randomad.js"></script>
<!--引用自bootstrap的图片的轮播-->
<div class="indexcontainer" id="indexcarousel">
	<div id="bbsCarousel" class="carousel  carousel-fade carouselindex" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#bbsCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#bbsCarousel" data-slide-to="1"></li>
        <li data-target="#bbsCarousel" data-slide-to="2"></li>
      </ol>
    <div class="carousel-inner" style="text-align:center">
        <div class="item active">
          <img alt="First slide" src="img/1.jpg" ></img>
          <div class="carousel-caption">
              <h1>珞珈山水</h1>
              <p>珞珈山水是武汉大学的官方学生BBS/论坛，成立于1996年，现为中国众多高校知名BBS之一。</p>
          </div>
        </div>
        <div class="item">
          <img alt="Second slide" src="img/2.jpg" ></img>
           <div class="carousel-caption">
              <h1>“武汉大学”</h1>
              <p>本版区主要面向武大校园内，话题集中在学习、校园热点、学生活动、校园生活等方面。下设“武大特快”、“皇皇吾大”、“研究生之家”、“大一新生”、“校园海报栏”等版块。</p>
              </div>
        </div>
        <div class="item">
          <img alt="Third slide" src="img/3.jpg"  ></img>
           <div class="carousel-caption">
              <h1>珞珈山水系统</h1>
              <p>主程序为目前国内比较通用的KBS BBS系统，武汉大学另一学生BBS--自强茶馆BBS采用的是discuz系统。</p>
           </div>
        </div>
      </div>
      
      <a class="left carousel-control" href="#bbsCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"><i class="icon-glass"></i></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#bbsCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->

</div>
<!--图片的轮播的结束-->

<!--仿知乎界面-->

<div class="mcontainer" id="index-content-bottom">
    <!-- container begin-->
				
	<div class="wrapper index-content-wrapper"  id="indexshow">
    	<div class="bottom">
    		<div class="inner-wrapper" >
    			<div class="stories">
    				<div class="reps clearfix" id="reps">

   						<a target="_blank" href="./board.php" class="rep current repspecial" id="foucs_tab_1" data-type="topic" data-token="" title="十大话题">
						    <span class="info-card">十大话题</span>
						    <img src="img/one.jpg" >
						</a>

					    <a target="_blank" href="./wForum/board.php?name=Recommend" class="rep repspecial" id="foucs_tab_2" data-type="topic" data-token="" title="推荐文章" >
					    	<span class="info-card">推荐文章</span>
					 		<img src="img/two.jpg" >
					    </a>

					    <a target="_blank" href="./board.php" class="rep repspecial" id="foucs_tab_3" data-type="topic" data-token="" title="今日新帖">
					    	<span class="info-card">今日新帖</span>
					        <img src="img/three.jpg" >
					    </a>


					    <a target="_blank" href="./wForum/section.php?sec=1" class="rep" id="foucs_tab_4" data-type="topic" data-token="" title="武汉大学">
					    	<span class="info-card">武汉大学</span>
					    	<img src="img/four.jpg" >
					    </a>

					    <a target="_blank" href="./wForum/section.php?sec=8" class="rep" id="foucs_tab_5" data-type="topic" data-token="" title="社会信息">
					    	<span class="info-card">社会信息</span>
					    	<img src="img/five.jpg" >
					    </a>

					    <a target="_blank" href="./wForum/section.php?sec=2" class="rep" id="foucs_tab_6" data-type="topic" data-token="" title="乡情校谊">
					    	<span class="info-card">乡情校谊</span>
					    	<img src="img/eight.jpg" >
					    </a>

					    <a target="_blank" href="./wForum/section.php?sec=6" class="rep" id="foucs_tab_7" data-type="topic" data-token="" title="休闲娱乐">
					    	<span class="info-card">休闲娱乐</span>
							<img src="img/seven.jpg" >
					    </a>

					    <a target="_blank" href="./wForum/section.php?sec=4" class="rep" id="foucs_tab_8" data-type="topic" data-token="" title="科学技术">
					    	<span class="info-card">科学技术 </span>
							<img src="img/six.jpg" >
					    </a>

					    <a target="_blank" href="./wForum/section.php?sec=3" class="rep" id="foucs_tab_9" data-type="topic" data-token="" title="电脑网络">
					    	<span class="info-card">电脑网络</span>
					  		<img src="img/night.jpg" >
					    </a>


					     <a target="_blank" href="./wForum/section.php?sec=7" class="rep" id="foucs_tab_10" data-type="topic" data-token="" title="体育健身">
					    	<span class="info-card">体育健身 </span>
							<img src="img/seven.jpg" >
					    </a>

					    <a target="_blank" href="./wForum/section.php?sec=5" class="rep" id="foucs_tab_11" data-type="topic" data-token="" title="文学艺术">
					    	<span class="info-card">文学艺术</span>
							<img src="img/eight.jpg" >
					    </a>

					    <a target="_blank" href="./wForum/section.php?sec=0" class="rep" id="foucs_tab_12" data-type="topic" data-token="" title="本站系统">
					    	<span class="info-card">本站系统</span>
					  		<img src="img/night.jpg" >
					    </a>

					   
    				</div>

					<!--右栏重复出现12次，-->

    				<div class="single-story" id="foucs_con_1">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/one.jpg">
		    				<div class="story-title">
		    					<div>
		    						<a class="name" href="./board.php" target="_blank">十大话题</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">

							<?php  gen_hot_subjects_html();?>
							    
						    </div>
						 
						</div>
		    		</div>

		    		<div class="single-story undisplay" id="foucs_con_2">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/two.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="./wForum/board.php?name=Recommend" >推荐文章</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  <?php gen_commend_html(); ?>

							  
							    
						    </div>
						</div>
		    		</div>

		    		<div class="single-story undisplay" id="foucs_con_3">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/three.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="./board.php" target="_blank">今日新帖</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	526
								    </span>
								     <p>
								     <a class="question_link" target="_blank" href="./disparticle.php">
								     	吐槽一下本期跑男
								     </a>
									<a href="./board.php">
										[武大特快]
									</a>
								     </p>
							    </div>
							  
							    
						    </div>
						</div>
		    		</div>

		    		<div class="single-story undisplay" id="foucs_con_4">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/four.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="./wForum/section.php?sec=1">武汉大学</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
<?php gen_sec_hot_subjects_html(0);?>
							  
							    
						    </div>
						</div>
		    		</div>

		    		<div class="single-story undisplay" id="foucs_con_5">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/five.jpg">
		    					<div class="story-title">
		    					<div>
		    						<a class="name" href="./wForum/section.php?sec=8">社会信息</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
<?php gen_sec_hot_subjects_html(1);?>
							  
							    
						    </div>
						</div>
		    		</div>

		    		<div class="single-story undisplay" id="foucs_con_6">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/six.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="./wForum/section.php?sec=2">乡情校谊</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
<?php gen_sec_hot_subjects_html(2);?>
							  
							    
						    </div>
						</div>
		    		</div>

		    		<div class="single-story undisplay" id="foucs_con_7">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/seven.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="./wForum/section.php?sec=6">休闲娱乐</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
<?php gen_sec_hot_subjects_html(3);?>
							  
							    
						    </div>
						</div>
		    		</div>

		    		<div class="single-story undisplay" id="foucs_con_8">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/six.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="./wForum/section.php?sec=4">科学技术</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
<?php gen_sec_hot_subjects_html(4);?>
							  
							    
						    </div>
						</div>
		    		</div>

		    		<div class="single-story undisplay" id="foucs_con_9">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/night.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="./wForum/section.php?sec=3">电脑网络</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
<?php gen_sec_hot_subjects_html(5);?>
							  
							    
						    </div>
						</div>
		    		</div>


		    			<div class="single-story undisplay" id="foucs_con_10">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/night.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="./wForum/section.php?sec=7">体育健身</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
<?php gen_sec_hot_subjects_html(6);?>
							  
							    
						    </div>
						</div>
		    		</div>

				

					<div class="single-story undisplay" id="foucs_con_11">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/night.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="./wForum/section.php?sec=5">文学艺术</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
<?php gen_sec_hot_subjects_html(7);?>
							  
							    
						    </div>
						</div>
		    		</div>


					<div class="single-story undisplay" id="foucs_con_12">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/night.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="./wForum/section.php?sec=0">本站系统</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
<?php gen_sec_hot_subjects_html(8);?>
							  
							    
						    </div>
						</div>
		    		</div>

		  		<!--*****************-->
				</div>
			</div>
		</div>

<!--Container and wrapper-->
	</div>
</div>
<!--仿知乎界面结束-->

<!--
<center style="padding: 0.5em;font-weight:bold;font-size:150%;display:none">
  <?php echo BBS_FULL_NAME; ?>
</center>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <form action="wForum/searchboard.php" method="get">
    <tr>
      <td height="18" width="84" class="header" align="center"><a href="wForum/board.php?name=Announce">系统公告</a></td>
      <td width="84" class="header" align="center"><a href="wForum/board.php?name=Recommend">推荐文章</a></td>
      <td width="100" class="header" align="center"><a href="wForum/index.php">分类讨论区</a></td>
      <td width="79" class="header" align="center"><a href="#todaybless">本日祝福</a></td>
      <td width="79" class="header" align="center"><a href="wForum/favboard.php">我的收藏</a></td>
      <td width="79" class="header" align="center"><a href="wForum/usermailbox.php?boxname=inbox">我的信箱</a></td>
      <td width="79" class="header" align="center"><a href="wForum/usermanagemenu.php">控制面板</a></td>
      <td width="79" class="header" align="center"><?php
	if(!defined("BBS_HAVE_BLOG"))
	{
?>
        <a href="/pc/pcmain.php"><?php echo BBS_NICKNAME; ?>BLOG</a>
        <?php
	}
?></td>
      <td class="header"></td>
      <td class="header" align="right" width="315"><input type="text" name="board" size="12" maxlength="30" value="版面搜索" class="text">
        <input type="submit" size="15" value="GO" class="button"></td>
    </tr>
  </form>
</table> 
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td colspan="5" height="8"></td>
  </tr>
  <tr>
    <td valign="top">
<center>
	<script>showTopAd();</script>
</center>
    
    <br>
	<?php
	gen_commend_html();
?>

<center>
	<script>showMidAd();</script>
</center>
      <br>
      <?php
	gen_hot_subjects_html();

	gen_sections_html();
?></td>


  </tr>
</table>

<?php if (defined("SITE_NEWSMTH")) { ?>
<hr class="smth">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" class="smth">版权所有 <span style="font-family: Arial,sans-serif;">&copy;</span> <?php echo BBS_FULL_NAME; ?> 2005 [<a href="mailto:SYSOP@bbs.whu.edu.cn">合作联系</a>]</td>
  </tr>
</table>
<?php } ?>
<br>-->
<!-- <script src="tcscript.js" charset="utf-8"></script> -->
</body>
</html>
