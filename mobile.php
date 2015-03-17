<?php
define('TPCCNT', 10);//每页帖子数
define('ARTCNT', 20);//每帖文章数

require("www2-funcs.php");
require("www2-board.php");
require("www2-bmp.php");
login_init();

$app=@$_GET["app"];
if( $app == "" )
{
	//echo "post";
	$app = $_POST["app"];
}

switch($app) {
	case "recomm"://推荐文章
		recomm_article();
		break;
	case "poster"://校园海报
		campus_poster();
		break;
	case "hot"://获取十大热帖
		hot_topic();
		break;
	case "boards"://获取所有版面
		get_boards();
		break;
	case "articles"://获取版面文章列表(帖子和回复混在一起)
		get_board_articles();
		break;
	case "topics"://获取版面帖子列表
		get_board_topics();
		break;
	case "read"://读帖子
		read_topic();
		break;
	case "post"://发表文章,需要使用POST
		post_article();
		break;
	case "login"://登录
		mobile_login();
		break;
	case "logout"://退出
		bbs_wwwlogoff();
		cache_header("nocache");
		delete_all_cookie();
		exit;
	case "userInfo"://显示用户信息
		display_user();
		exit;
	case "favor":
		favboards();
		exit;
	case "friend":
		friend();
		exit;
	case "mail":
		mail_test();
		exit;
	case "test":
		mobile_test();
		exit;
	default:
		break;
}

?>

<?php
//登录
//bbslogin.php?mainurl=mobile.php&id=xx&passwd=xx
//需要重写，登录时标识安卓设备
//
?>

<?php
//推荐文章
function recomm_article(){
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
	
	//创建一个XML文档
	$dom=new DomDocument('1.0',"utf-8");
	//创建根节点
	$outroot=$dom->createElement('recomms');
	$dom->appendchild($outroot);
	
	# shift through the array
	while($board = array_shift($boards))
	{
		if ($board->node_type() == XML_TEXT_NODE)
			continue;
		//return undo_html_format(urldecode(get_content($node)));
		$commend_title = find_content($board, "title");//
		$commend_author = find_content($board, "author");//
		$commend_time = find_content($board, "time");//
		$commend_board = find_content($board, "board");//
		$commend_id = find_content($board, "id");//
		$commend_own = find_content($board, "owner");
		$commend_o_board = find_content($board, "o_board");//
		$commend_o_id = find_content($board, "o_id");
		$commend_o_groupid = find_content($board, "o_groupid");//
		$commend_brief = find_content($board, "brief");//

		$brdnum = bbs_getboard($commend_o_board, $brdarr);
		if ($brdnum == 0)
			continue;
		
		$brd_encode = urlencode($brdarr["NAME"]);
		
		//在根节点下创建“elm”节点
		$elm=$dom->createElement('recomm');
		$outroot->appendchild($elm);
		
		//在“elm”节点下添加值节点“title”
		$title=$dom->createElement("title",htmlspecialchars($commend_title));
		$elm->appendchild($title);
		
		//在“elm”节点下添加值节点“推荐人”
		$author=$dom->createElement("recommby",htmlspecialchars($commend_author));
		$elm->appendchild($author);
		
		//推荐时间
		$rectime=$dom->createElement("recommTime",strftime("%Y-%m-%d %H:%M:%S", $commend_time));
		$elm->appendchild($rectime);
		
		//推荐版面
		$recboardid=$dom->createElement("board",$commend_board);
		$elm->appendchild($recboardid);
		
		//推荐帖子号(推荐版面内)
		$recommGID=$dom->createElement("recommGID",$commend_id);
		$elm->appendchild($recommGID);
		
		$originAuthor=$dom->createElement("Author",$commend_own);
		$elm->appendchild($originAuthor);
		
		//在“elm”节点下添加值节点“board”
		$boardid=$dom->createElement("originBoard",$brd_encode);
		$elm->appendchild($boardid);
		
		//在“elm”节点下添加值节点“boardname”
		$boardname=$dom->createElement("originBoardName", $brdarr["DESC"]);
		$elm->appendchild($boardname);
		
		$originArticleID=$dom->createElement("originArticleID",$commend_o_id);
		$elm->appendchild($originArticleID);
		
		//在“elm”节点下添加值节点“groupid”
		$groupid=$dom->createElement("originGID",$commend_o_groupid);
		$elm->appendchild($groupid);
		
		//在“elm”节点下添加值节点“commend_brief”
		$recomm_brief=$dom->createElement("brief",htmlspecialchars($commend_brief));
		$elm->appendchild($recomm_brief);
	}
	printInfo($dom->saveXML());
}

?>

<?php
//校园海报
function campus_poster(){
	$brdarr = array();
	$brdnum = bbs_getboard("Notice", $brdarr);
	if ( ($brdnum==0) || ($brdarr["FLAG"] & BBS_BOARD_GROUP) ) 
	{
		printInfo( "当前没有海报err1");
	} 
	else 
	{
		$total = bbs_getThreadNum($brdnum);
		if ($total <= 0) 
		{
			printInfo( "当前没有海报err2");
		} 
		else 
		{
			$articles = bbs_getthreads($brdarr['NAME'], 0, 30,1); 
			if ($articles == FALSE) 
			{
				printInfo( "当前没有海报err3");
			} 
			else 
			{
				//创建一个XML文档
				$dom=new DomDocument('1.0',"utf-8");
				//创建根节点
				$outroot=$dom->createElement('posters');
				$dom->appendchild($outroot);
				
				$num=count($articles);
				$j=14;
				for ($i=0;$i<$num;$i++) 
				{
					//printInfo($i."--[flag]--".$articles[$i]['origin']['FLAGS'][0]."<br>");
					if($articles[$i]['origin']['FLAGS'][0]=='g'||
						$articles[$i]['origin']['FLAGS'][0]=='G')
					{
						if($j--<0) 
							break;
						
						//在根节点下创建“elm”节点
						$elm=$dom->createElement('poster');
						$outroot->appendchild($elm);
		
						//在“elm”节点下添加值节点“title”
						$title=$dom->createElement("title",htmlspecialchars($articles[$i]['origin']['TITLE'],ENT_QUOTES));
						$elm->appendchild($title);
		
						//在“elm”节点下添加值节点“board”
						$boardid=$dom->createElement("board",$brdarr['NAME']);
						$elm->appendchild($boardid);
						
						//在“elm”节点下添加值节点“groupid”
						$groupid=$dom->createElement("groupid",$articles[$i]['origin']['ID']);
						$elm->appendchild($groupid);
					}
				}
				printInfo($dom->saveXML());
			}
		}
	}
}
?>

<?php
//十大
function hot_topic(){
	# load xml doc
	$hotsubject_file = BBS_HOME . "/xml/day.xml";
	$doc = domxml_open_file($hotsubject_file);
	if (!$doc)
		return;

	$root = $doc->document_element();
	$boards = $root->child_nodes();

	$brdarr = array();

	//创建一个XML文档
	$dom=new DomDocument('1.0',"utf-8");
	//创建根节点
	$outroot=$dom->createElement('hots');
	$dom->appendchild($outroot);
	
	while($board = array_shift($boards)){
    	if ($board->node_type() == XML_TEXT_NODE)
       		continue;

   		$hot_title = find_content($board, "title");
    	$hot_author = find_content($board, "author");
    	$hot_board = find_content($board, "board");
   		$hot_time = find_content($board, "time");
    	//$hot_number = find_content($board, "number");
    	$hot_groupid = find_content($board, "groupid");

		$brdnum = bbs_getboard($hot_board, $brdarr);
		if ($brdnum == 0)
			continue;
		$brd_encode = urlencode($brdarr["NAME"]);

		$articles=array();
		$replynum=bbs_get_threads_from_gid($brdnum,$hot_groupid,0,$articles,$haveprev);
		
		//在根节点下创建“elm”节点
		$elm=$dom->createElement('hot');
		$outroot->appendchild($elm);
		
		addXMLElement($dom, $elm, "title", $hot_title);
		addXMLElement($dom, $elm, "author", $hot_author);
		addXMLElement($dom, $elm, "board", $hot_board);
		addXMLElement($dom, $elm, "bid", $brdnum);
		addXMLElement($dom, $elm, "boardname", $brdarr["DESC"]);
		addXMLElement($dom, $elm, "groupid", $hot_groupid);
		addXMLElement($dom, $elm, "lasttime", strftime("%Y-%m-%d %H:%M:%S", $hot_time));
		addXMLElement($dom, $elm, "number", $replynum);
		//addXMLElement($dom, $elm, "oldnumber", $hot_number);
	}
	//printInfo($dom->saveXML());
	echo $dom->saveXML();
}
?>

<?php
//版面
function get_boards(){
	printInfo( "<?xml version=\"1.0\" encoding=\"utf-8\"?>");
	printInfo( "<Sections>");
	for($i = 0; $i < BBS_SECNUM; $i++){
		printInfo( "<Section name=\"".constant("BBS_SECNAME".$i."_0")."\">"); 

		get_sub_boards($i,0);
		printInfo( "</Section>");
	}
	printInfo( "</Sections>");
}

function get_sub_boards( $g1,$g2 ){
		$yank = 0;
		if ($yank) $yank = 1;
		$subMenu = "submenu_brd_".$g1."_".$g2;
		$boards = bbs_getboards(constant("BBS_SECCODE".$g1), $g2, $yank | 2);
		$brd_name = $boards["NAME"]; // 英文名
		$brd_desc = $boards["DESC"]; // 中文描述
		$brd_flag = $boards["FLAG"]; //flag
		$brd_bid = $boards["BID"]; //flag
		$brd_num = sizeof($brd_name);

		for($j=0;$j<$brd_num;$j++){
			printInfo( "<board num=\"".$brd_bid[$j]."\"  name=\"".$brd_desc[$j]."\"  id=\"".$brd_name[$j]."\"");
			if ($brd_flag[$j]&BBS_BOARD_GROUP){
				printInfo( "   hasChildren=true >");
				get_sub_boards($g1,$brd_bid[$j]);
				printInfo( "</board>");
			}
			else
				printInfo( " />");
		}
}
?>

<?php
//获取文章列表
function get_board_topics(){
	//board-----版面名称
	if (!isset($_GET['board'])) {
		printInfo( "未指定版面！");
		return;
	} else {
		$board=$_GET['board'];
	}
	
	$brdArr=array();
	$boardID= bbs_getboard($board, $brdArr);
	$board=$brdArr['NAME'];

	//page----页码，从1开始
	if (!isset($_GET['page'])) {
		$page=-1;
	} else {
		$page=intval($_GET['page']);
	}

	$total = bbs_getThreadNum($boardID);
	if ($total<=0) {
		printInfo( "该版没有文章！");
		return;
	}
	else{
		$totalPages=ceil($total/TPCCNT);
		if (($page>$totalPages)) {
			$page=$totalPages;
		} else if ($page<1) {
			$page=1;
		}
	}
	$start=($page-1)* TPCCNT;
	$num=TPCCNT;

	//创建一个XML文档
	$dom=new DomDocument('1.0',"utf-8");
	//创建根节点
	$outroot=$dom->createElement('topics');
	$outroot->setAttribute("board",$board);
	//$outroot->setAttribute("boardID",$boardID);
	$outroot->setAttribute("page",$page);
	$outroot->setAttribute("totalPages",$totalPages);
	$dom->appendchild($outroot);
	
	//echo "第".$page."页<br />";
	$articles = bbs_getthreads($board, $start, $num, 1);
	$articleNum=count($articles);
	
	for($i=0;$i<$articleNum;$i++){
		$origin=$articles[$i]['origin'];
		$lastreply=$articles[$i]['lastreply'];
		$threadNum=$articles[$i]['articlenum']-1;
		
		//在根节点下创建“elm”节点
		$elm=$dom->createElement('topic');
		$outroot->appendchild($elm);
		
		$number=$dom->createElement("number",($i+$start+1));
		$elm->appendchild($number);
		
		$threadId=$dom->createElement("GID",$origin['ID']);
		$elm->appendchild($threadId);
		
		$title=$dom->createElement("title");
		$newtext=$dom->createTextNode($origin['TITLE']);
		$title->appendchild($newtext);
		$elm->appendchild($title);
		
		$threadAuthor=$dom->createElement("author",$origin['OWNER']);
		$elm->appendchild($threadAuthor);
		
		$threadTime=$dom->createElement("posttime",strftime("%Y-%m-%d %H:%M:%S", $origin['POSTTIME']));
		$elm->appendchild($threadTime);
		
		$replyNum=$dom->createElement("replyNum",$threadNum);
		$elm->appendchild($replyNum);
		
		$lastReplyId=$dom->createElement("lastReplyID",$lastreply['ID']);
		$elm->appendchild($lastReplyId);
		
		$lastReplyAuthor=$dom->createElement("lastReplyAuthor",$lastreply['OWNER']);
		$elm->appendchild($lastReplyAuthor);
		
		$lastReplyTime=$dom->createElement("lastReplyTime",strftime("%Y-%m-%d %H:%M:%S", $lastreply['POSTTIME']));
		$elm->appendchild($lastReplyTime);
		
		$flag=$origin['FLAGS'][0];
		if($flag == "d" || $flag == "D"){
			$flag="TOP";
		}
		elseif('M' == $flag || 'B' == $flag || 'G' == $flag ||
			   'm' == $flag || 'b' == $flag || 'g' == $flag){
			$flag="DIGEST";
		}elseif($num>10){
			$flag="HOT";
		}
		elseif('O' == $flag || 'U' == $flag || '8' == $flag || ';' == $flag ){
			$flag="LOCK";
		}else{
			$flag="NORMAL";
		}
		$flags=$dom->createElement("flag",$flag);
		$elm->appendchild($flags);
		
/* 		echo "序号:".($i+$start+1);
		echo "    帖子标题:".$origin['TITLE'];
		echo "    帖子文章号:".$origin['ID'];  
		echo "<br />发帖人:".$origin['OWNER'];
		echo "    发帖时间:".strftime("%Y-%m-%d %H:%M:%S", $origin['POSTTIME']); 
		echo "    回复数:".$threadNum;
		// echo "----状态标志:".$origin['FLAGS'][0]; 
		echo "<br />最后回复人:".$lastreply['OWNER'];
		echo "    最后回复时间:".strftime("%Y-%m-%d %H:%M:%S", $lastreply['POSTTIME']);
		echo "    最后回复文章号:".$lastreply['ID'];
		// echo "----状态标志:".$lastreply['FLAGS'][0]; 
		echo "<br /><br />";
		// echo ":".($origin['ATTACHPOS']>0)?1:0;//附件 */
	}
	printInfo($dom->saveXML());
}

function get_board_articles(){
	$brd=@$_GET["brd"];
	$url = "?app=article&board=" . $brd . "&id=";
	$mobile_ftype=0;
	$isnormalboard = bbs_normalboard($brd);
	if ($isnormalboard && (isset($_GET["page"])||$mobile_ftype) ) {
		$dotdirname = bbs_get_board_index($brd, $mobile_ftype);
		if (cache_header("public",@filemtime($dotdirname),$mobile_ftype?300:10)) return;
	}

	$brdarr = array();
	$mobile_brdnum = bbs_getboard($brd, $brdarr);
	$total = bbs_countarticles($mobile_brdnum, $mobile_ftype);
	if ($total <= 0) {
		echo "本讨论区目前没有文章";
		return;
	}

	$page = isset($_GET["page"]) ? @intval($_GET["page"]) : 0;
	if (isset($_GET["start"])) {
		$page = (@intval($_GET["start"]) + ARTCNT - 1) / ARTCNT;
	}
	settype($page, "integer");
	$start = ($page > 0) ? ($page - 1) * ARTCNT + 1 : 0;
	if ($start == 0 || $start > ($total - ARTCNT + 1))
	{
		if ($total <= ARTCNT)
		{
			$start = 1;
			$page = 1;
		}
		else
		{
			$start = ($total - ARTCNT + 1);
			$page = ($start + ARTCNT - 1) / ARTCNT + 1;
		}
	}
	else
		$page = ($start + ARTCNT - 1) / ARTCNT;
	settype($page, "integer");
	$articles = bbs_getarticles($brd, $start, ARTCNT, $mobile_ftype);
	if ($articles == FALSE){
		echo "读取文章列表失败";
		return;
	}

	echo "当前页数:".($page-1)."<br />";

	$html="";
	foreach ($articles as $article)	{
		$title = $article["TITLE"];
		if (strncmp($title, "Re: ", 4) != 0)
			$title = "● " . $title;

		$flags = $article["FLAGS"];

		if (!strncmp($flags,"D",1)||!strncmp($flags,"d",1)) {
			$html .= " [提示] ";
		} else {
			$html .= sprintf("%5d ", ($start+$i));
			if ($flags[0] == 'N' || $flags[0] == '*'){
				$html .= " "; //$flags[0];  //不要未读标记 windinsn
			} else{
				$html .= $flags[0];
			}
			$html .= " ";
		}
		$html .= sprintf("%-12.12s ", $article["OWNER"]);
		$html .= strftime("%b %e ", $article["POSTTIME"]);
		$html .= $flags[3];
		$articleurl = "?app=article&board=".$brd."&id=".$article["ID"];
		if ($mobile_ftype) {
			$articleurl .= "&ftype=" . $mobile_ftype . "&num=" . ($start+$i);
		}
		$html .= "<a href='".$articleurl."'>".htmlspecialchars($title)." </a><br/>";
		$i++;
	}
	$html .= "</pre>";
	echo $html;
}
?>

<?php
//读文章
function read_article( $board, $id ){
	$ftype=0;
	$articles = array ();
	$num = bbs_get_records_from_id($board, $id, $ftype, $articles);
	if ($num <= 0) {
		return "错误的文章号,原文可能已经被删除";
	}
	$article = $articles[1];

	//echo $article["ID"]."--".$article["GROUPID"]."--".$article["OWNER"]."--".$article["POSTTIME"];
	$filename = bbs_get_board_filename($board, $article["FILENAME"]);
	$s = bbs2_readfile($filename);
	if (!is_string($s))
	    $s="";
	return $s;

}

function read_topic(){
	//////////////////////////////////
	if (!isset($_GET['board'])) {
		printInfo( "未指定版面。");
		return;
	}
	$board=$_GET['board'];
	
	$brdArr=array();
	$boardID= bbs_getboard($board,$brdArr);
	$board=$brdArr['NAME'];
	
	if ($boardID==0) {
		printInfo( "指定的版面不存在");
		return;
	}
	
	global $currentuser;
	$usernum = $currentuser["index"];
	if (bbs_checkreadperm($usernum, $boardID) == 0) {
		printInfo( "您无权阅读本版");
		return;
	}
	if (!isset($_GET['GID'])) {
		printInfo( "未指定文章！");
		return;
	} else {
		$groupID=intval($_GET['GID']);
	}
	////////////////////////////

	//page----页码，从1开始
	if (!isset($_GET['page'])) {
		$page=1;
	} else {
		$page=intval($_GET['page']);
	}

	$articles = array();
	$num = bbs_get_threads_from_gid($boardID, $groupID, $groupID, $articles, $haveprev );
	if ($num==0) {
		printInfo( "您指定的文章不存在！");
		return;
	}

	$total=count($articles);
	$totalpage = ceil($total*1.0/ARTCNT);
	if($page>$totalpage)
		$page = $totalpage;
	
	$num=ARTCNT;
	$start=($page-1)*ARTCNT;
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
	
	//限制guest帐户阅读1年前贴
	$time1 = strftime('%Y-%m-%d %H:%M:%S', intval($articles[0]['POSTTIME']));
    $time2 = date("Y-m-d H:i:s",time());
    $diff=(strtotime($time2)-strtotime($time1))/(60*60*24);
    $user_IP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
    $user_IP = ($user_IP) ? $user_IP : $_SERVER["REMOTE_ADDR"];
    if($user_IP!='218.197.148.4'){
		if($diff>365&&$currentuser["userid"] =="guest"){
			printInfo( "guest用户暂无权限阅读一年前的帖子，您可以登录后再阅读");
			return;
		}
	}
	
	//创建一个XML文档
	$dom=new DomDocument('1.0', 'utf-8');
	//创建根节点
	$outroot=$dom->createElement('page');
	$outroot->setAttribute("GID",$groupID);
	$outroot->setAttribute("num",$page);
	$outroot->setAttribute("total",$totalpage);
	$outroot->setAttribute("replynum",$total-1);
	$dom->appendchild($outroot);
	
	$flag=$articles[0]["FLAGS"];
	if($flag == "d" || $flag == "D"){
		$flag="TOP";
	}
	elseif('M' == $flag || 'B' == $flag || 'G' == $flag ||
		   'm' == $flag || 'b' == $flag || 'g' == $flag){
		$flag="DIGEST";
	}elseif($num>10){
		$flag="HOT";
	}
	elseif('O' == $flag || 'U' == $flag || '8' == $flag || ';' == $flag ){
		$flag="LOCK";
	}else{
		$flag="NORMAL";
	}
	$outroot->setAttribute("flag",$flag);
	
	//echo "第".$page."页<br>";
	for($i=0;$i<$num;$i++) {
		$lc="";
		if(($i+$start)==0)
			$lc = "楼主";
		else
			$lc = ($i+$start)."楼";

		$s=read_article($board,$articles[$i+$start]["ID"]);

		//在根节点下创建“elm”节点
		$elm=$dom->createElement('article');
		$outroot->appendchild($elm);
		
		//在“elm”节点下添加值节点“floor”
		$floor=$dom->createElement("floor",$lc);
		$elm->appendchild($floor);
		
		//在“elm”节点下添加值节点“id”
		$artid=$dom->createElement("id",$articles[$i+$start]["ID"]);
		$elm->appendchild($artid);
		
		//var_dump($articles[$i+$start]);
		//return;
		
		$artowner = $articles[$i+$start]["OWNER"];
		addXMLElement($dom, $elm, "author", $artowner);
		
		$user_pic;
		$userarray=array();
		if (bbs_getuser($artowner,$userarray)) 
		{
			$user=$userarray;
			if ($user['userface_img'] == -1) 
			{
				$user_pic = $user['userface_url'];
			} 
			else 
			{
				$user_pic = 'userface/image'.$user['userface_img'].'.gif';
			}
		}
		//addXMLAttribute($friendnode,"userface_img",$user_pic);
		$friendnode = addXMLElement($dom, $elm, "userface_img", "wForum/".$user_pic);
		
		//在“elm”节点下添加值节点“content”
		$content=$dom->createElement("content",$s);
		$elm->appendchild($content);
	}
	printInfo($dom->saveXML());
}
?>

<?php
//发文章
function post_article(){
	global $currentuser;
	
	if (!isset($_POST['board'])) {
		echo "未指定版面。";
		return;
	}
	$boardName=$_POST['board'];
	$brdArr=array();
	$boardID= bbs_getboard($boardName,$brdArr);
	$boardArr=$brdArr;
	$boardName=$brdArr['NAME'];
	if ($boardID==0) {
		echo "指定的版面不存在";
		return;
	}
	$usernum = $currentuser["index"];
	if (bbs_checkreadperm($usernum, $boardID) == 0) {
		echo "您无权阅读本版";
		return;
	}
	if (bbs_is_readonly_board($boardArr)) {
		echo "本版为只读讨论区！";
		return;
	}
	if (bbs_checkpostperm($usernum, $boardID) == 0) {
		echo "您无权阅读本版";
		return;
	}
	if (!isset($_POST['subject'])) {
		echo "没有指定文章标题！";
		return;
	}
	if (!isset($_POST['Content'])) {
		echo "没有指定文章内容！";
		return;
	}
	if (isset($_POST["reID"])) {
		$reID = $_POST["reID"];
	} else {
		$reID = 0;
	}
	settype($reID, "integer");
	$articles = array();
	if ($reID > 0)	{
	$num = bbs_get_records_from_id($boardName, $reID,$dir_modes["NORMAL"],$articles);
		if ($num == 0)	{
			echo "错误的 Re 文编号";
			return;
		}
		if ($articles[1]["FLAGS"][2] == 'y') {
			echo "该文不可回复!";
			return;
		}
	}
	
	if (bbs_is_outgo_board($boardArr)) $outgo = intval($_POST["outgo"]);
	else $outgo = 0;
	$ret=bbs_postarticle($boardName,trim($_POST['subject']),$_POST['Content'],
	                     intval($_POST['signature']), $reID,$outgo,intval($_POST['anonymous']),
	                     ($reID>0)?0:intval($_POST['emailflag']),SUPPORT_TEX?intval($_POST['texflag']):0);
	switch ($ret) {
		case -10:
			echo ("发文成功，但本文可能含有不当内容，需经审核方可发表。请耐心等待站务人员的审核，不要多次尝试发表此文章。");
		case -1:
			echo ("错误的讨论区名称。");
		case -2:
			echo ("本版为二级目录版！");
		case -3:
			echo ("标题为空。");
		case -4:
			echo ("此讨论区是唯读的, 或是您尚无权限在此发表文章。");
		case -5:
			echo ("很抱歉, 你被版务人员停止了本版的post权力。");
		case -6:
			echo ("两次发文/信间隔过密, 请休息几秒后再试。");
		case -7:
			echo ("无法读取索引文件！请迅速通知站务人员，谢谢！");
		case -8:
			echo ("本文不可回！");
		case -9:
			echo ("系统内部错误！请迅速通知站务人员，谢谢！");
	}
}
?>

<?php
function display_user(){
	
	if (!isset($_GET['userId']) || $_GET['userId'] == "") 
	{
		printInfo( "未指定用户Id。");
		return;
	}

	$user;
	$user_num;
	$userarray=array();
	if (($user_num=bbs_getuser($_GET['userId'],$userarray))==0) 
	{
		printInfo("查找用户数据失败！");
	}
	$user=$userarray;
	
	$dom=new DomDocument('1.0',"utf-8");
	$outroot=$dom->createElement('user');
	//$outroot->setAttribute("board",$board);
	$dom->appendchild($outroot);
	
	if ($user['userdefine0']) 
	{
		//基本资料
		if ($user['userface_img'] == -1) 
		{
			$user_pic = $user['userface_url'];
			$has_size = true;
		} 
		else 
		{
			$user_pic = 'userface/image'.$user['userface_img'].'.gif';
			$has_size = false;
		}
		
		$userface_img=$dom->createElement("userface_img","wForum/".$user_pic);
		$outroot->appendchild($userface_img);
		if ($has_size)
		{
			$userface_img->setAttribute("width",$user['userface_width']);
			$userface_img->setAttribute("height",$user['userface_height']);
		}
		$photo_url=$dom->createElement("photo_url",htmlspecialchars(trim($user['photo_url']),ENT_QUOTES));
		$outroot->appendchild($photo_url);
		$nickname=$dom->createElement("nickname",htmlspecialchars($user['username'],ENT_QUOTES));
		$outroot->appendchild($nickname);
		$sex=$dom->createElement("sex",chr($user['gender'])=='M'?'男':'女');
		$outroot->appendchild($sex);
		//echo get_astro($user['birthmonth'],$user['birthday']);//星座
		$OICQ=$dom->createElement("OICQ",$user['OICQ']);
		$outroot->appendchild($OICQ);
		$ICQ=$dom->createElement("ICQ",$user['ICQ']);
		$outroot->appendchild($ICQ);
		$MSN=$dom->createElement("MSN",$user['MSN']);
		$outroot->appendchild($MSN);
		$homepage=$dom->createElement("homepage",htmlspecialchars(trim($user['homepage']),ENT_QUOTES));
		$outroot->appendchild($homepage);
		
		//论坛属性
		$userlevel=$dom->createElement("userlevel",bbs_getuserlevel($user['userid']));
		$outroot->appendchild($userlevel);
		$numposts=$dom->createElement("numposts",$user['numposts']);
		$outroot->appendchild($numposts);
		
		$arr = getgroupinfo($user['userid']);//门派
		$menpai;
		if($arr[1]!='') 
			$menpai = $arr[1].' '.$arr[2]; 
		else 
			$menpai = '无门无派';
		$menpai=$dom->createElement("menpai",$menpai);
		$outroot->appendchild($menpai);
		
		$numlogins=$dom->createElement("numlogins",$user['numlogins']);
		$outroot->appendchild($numlogins);
		$userexp=$dom->createElement("userexp",bbs_getuserexp($user['userid']));
		$outroot->appendchild($userexp);
		$explevel=$dom->createElement("explevel",bbs_getexplevel($user['userid']));
		$outroot->appendchild($explevel);
		$uservalue=$dom->createElement("uservalue",bbs_compute_user_value($user['userid']));
		$outroot->appendchild($uservalue);
		$lastlogin=$dom->createElement("lastlogin",strftime("%Y-%m-%d %H:%M:%S", $user['lastlogin']));
		$outroot->appendchild($lastlogin);

		$usermodestr = bbs_getusermode($user["userid"]);
		if( $usermodestr!="" && $usermodestr{1} != "")
			$usermodestr= substr($usermodestr, 1);
		else $usermodestr= "目前不在站上";
		$usermodestr=$dom->createElement("usermode",$usermodestr);
		$outroot->appendchild($usermodestr);

		$lasthost=$dom->createElement("lasthostIP",$user['lasthost']);
		$outroot->appendchild($lasthost);
		
		$plans="";
		$filename=bbs_sethomefile($user["userid"],"signatures");
		
		if (is_file($filename)) 
		{
			$plans = bbs_printansifile($filename);
			//$plans=htmlspecialchars_decode($plans);
			//var_dump($plans);
		} 
		
		if($plans=="-1" || trim($plans)==""){
			$plans="这位同学很低调，从不签名！";
		}
		/*
		$fp = @fopen ($filename, "r");
		if ($fp!=false) { //ToDo: 用单一函数来做
		while (!feof ($fp)) {
				$buffer = fgets($fp, 300);
				//echo htmlspecialchars($buffer);
				$plans.=htmlspecialchars($buffer);
			}
			fclose ($fp);
		}
		*/
		
		$sigcontent=$dom->createElement("sigcontent");
		$newtext=$dom->createTextNode($plans);
		$sigcontent->appendchild($newtext);
		$outroot->appendchild($sigcontent);
		
		printInfo($dom->saveXML());
	}
	else
	{
		printInfo("这位同学武功盖世、内力深厚，阻止我们探测他的个人信息。");
	}
	
	
	if (false&&SHOW_REGISTER_TIME && ($user['userdefine0'] & BBS_DEF_SHOWREALUSERDATA)) 
	{
		//用户详细资料
		//性格：
		echo $character[$user['character']]; 
		//个人简介：
		$filename=bbs_sethomefile($user["userid"],"plans");
		if (is_file($filename)) 
		{
			$plans = bbs_printansifile($filename);
			$v_plans = split ( "<br />", $plans );
			$num = count ( $v_plans );

			$plans = "";

			for ( $i=0; $i<$num && $i<20 ; $i++ )
			{
				$plans .= $v_plans[$i];
				$plans .= "<br />";
			}
			echo dvbcode($plans,0);
		} 
		else 
		{
			echo "<font color=gray>这个家伙很懒，什么也没有留下^_^</font>";
		}

		//真实姓名：
		echo showIt($user['realname']);	
		//国　　家：
		echo showIt($user['country']); 
		//出 生：
		if ( ($user['birthyear']!=0) && ($user['birthmonth']!=0) && ($user['birthday']!=0)) 
		{
			echo '19'.$user['birthyear'].'年'.$user['birthmonth'].'月'.$user['birthday'].'日';
		} else 
		{
			echo "<font color=gray>未知</font>";
		}
		//省　　份：
		echo showIt($user['province']);
		//城　　市：
		echo showIt($user['city']);
		//联系电话：
		echo showIt($user['telephone']);
		//通信地址：
		echo showIt($user['address']);
		//Ｅｍａｉｌ：
		$reg_email=htmlspecialchars(trim($user['reg_email']),ENT_QUOTES);
		if ($reg_email!='') 
		{
			echo '<a href=mailto:'.$reg_email.'>'.$reg_email.'</a>'; 
		} 
		else 
		{
			echo "<font color=gray>未知</font>";
		}

		//生　　肖：
		echo showIt($shengxiao[$user['shengxiao']]);
		//血　　型：
		echo showIt($bloodtype[$user['bloodtype']]);
		//信　　仰：
		echo showIt($religion[$user['religion']]);
		//职　　业：
		echo showIt($profession[$user['profession']]);
		//婚姻状况：
		echo showIt($married[$user['married']]);
		//最高学历：
		echo showIt($education[$user['education']]);
		//毕业院校：
		echo showIt($user['graduateschool']);
		//注册日期：
		echo strftime("%Y-%m-%d %H:%M:%S", $user['firstlogin']);
	}
	
	
}
?>

<?php
function getgroupinfo($id)
{  
	$mysql_server_name = "127.0.0.1";
	$mysql_username = "whubbs";
	$mysql_password = "bbswebwhu";
	$mysql_database = "whuinfo";   
	
	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
	mysql_select_db($mysql_database);
	
	$sql = "select head, name, title from groups where id='".$id."'";
	$record = mysql_query($sql, $conn);
	if(mysql_num_rows($record)==1)//有信息
	{
		$arr = mysql_fetch_array($record);
		return $arr;
	}
	else 
	{
		$arr=array(0,'','');
		return $arr;
	}
	mysql_close($conn);
}

?>

<?php
	function printInfo( $errStr ){
		echo iconv("gb2312","utf-8//IGNORE",$errStr);
	}
	
	function is_utf8($str) {
		$c=0; $b=0;
		$bits=0;
		$len=strlen($str);
		for($i=0; $i<$len; $i++){
			$c=ord($str[$i]);
			if($c > 128){
				if(($c >= 254)) return false;
				elseif($c >= 252) $bits=6;
				elseif($c >= 248) $bits=5;
				elseif($c >= 240) $bits=4;
				elseif($c >= 224) $bits=3;
				elseif($c >= 192) $bits=2;
				else return false;
				if(($i+$bits) > $len) return false;
				while($bits > 1){
					$i++;
					$b=ord($str[$i]);
					if($b < 128 || $b > 191) return false;
					$bits--;
				}
			}
		}
		return true;
	}

	function convCharset($str) 
	{ 
		// $chset=mb_detect_encoding($str,"utf-8, gb2312");
		// if( $chset!="utf-8" ) 
		// { 
			// echo $str."      ".$chset."<br>";
			// return  iconv("gb2312","utf-8//IGNORE",$str); 
		// } 
		// else 
		// {
			// //echo $str."      ".$chset."<br>";
			// return $str; 
		// } 

		return  iconv("gb2312","utf-8//IGNORE",$str); 
		//return $str;
	} 
	
	function addXMLAttribute($node, $attribute, $value){
		$attribute=convCharset($attribute);
		$value=convCharset($value);
		$node->setAttribute($attribute,$value);
	}
	
	function addXMLElement($dom, $parent, $title, $content){
		$addElem=$dom->createElement($title);
		$parent->appendchild($addElem);
		
		if($content!=""){
			$newtext=$dom->createTextNode(convCharset($content));
			$addElem->appendchild($newtext);
		}
		
		return $addElem;
	}
	
	function favboards(){
		global $currentuser;
		//var_dump($currentuser);
		//return;
		login_init();
		bbs_session_modify_user_mode(BBS_MODE_SELECT);
		//assert_login();
		
		if($currentuser["userid"]=="guest")
		{
			printInfo("同学，查看收藏夹是需要登录的！");
			return;
		}
		
		if (isset($_GET["select"]))
			$select = $_GET["select"];
		else
			$select = 0;
		settype($select, "integer");
		
		if ($select < 0){
			printInfo("错误的参数");
			return;
		}
		
		if(bbs_load_favboard($select)==-1){
			printInfo("错误的参数");
			return;
		}
		
		if (isset($_GET["delete"]))
		{
			$delete_s=$_GET["delete"];
			settype($delete_s,"integer");
			bbs_del_favboard($select,$delete_s);
		}
		
		if (isset($_GET["deldir"]))
		{
			$delete_s=$_GET["deldir"];
			settype($delete_s,"integer");
			bbs_del_favboarddir($select,$delete_s);
		}
		
		if (isset($_GET["dname"]))
		{
			$add_dname=trim($_GET["dname"]);
			if ($add_dname)
				bbs_add_favboarddir($add_dname);
		}
		
		if (isset($_GET["bname"]))
		{
			$add_bname=trim($_GET["bname"]);
			if ($add_bname)
				$sssss=bbs_add_favboard($add_bname);
		}
		
		$dom=new DomDocument('1.0',"utf-8");
		$outroot=$dom->createElement('FavDir');
		//$outroot->setAttribute("board",$board);
		$dom->appendchild($outroot);
		
		if( bbs_load_favboard($select)!=-1 && $boards = bbs_fav_boards($select, 1)) 
		{
			$brd_name = $boards["NAME"]; // 英文名
			$brd_desc = $boards["DESC"]; // 中文描述
			$brd_flag = $boards["FLAG"]; 
			$brd_bid = $boards["BID"];  //版 ID 或者 fav dir 的索引值 
			$brd_bm = $boards["BM"]; 
			$brd_artcnt = $boards["ARTCNT"]; 
			//$brd_unread = $boards["UNREAD"]; 
			//$brd_zapped = $boards["ZAPPED"]; 
			//$brd_position = $boards["POSITION"]; 
			//$brd_npos = $boards["NPOS"]; 
			$brd_users = $boards["CURRENTUSERS"]; 
			$fav_class=$boards["CLASS"]; 
			$rows = sizeof($brd_name);
			
			//var_dump($boards);
			//return;
			
			for ($j = 0; $j < $rows; $j++)
			{
				if( $brd_bid[$j] == -1) { //空收藏目录
					//printInfo("空目录");
					//do nothing
				}
				else if ($brd_flag[$j]==-1)
				{
					//目录
					$dir = addXMLElement($dom, $outroot, "FavDir", "");
					addXMLAttribute($dir,"select",$brd_bid[$j]);
					addXMLAttribute($dir,"name",$brd_name[$j]);
					addXMLAttribute($dir,"desc",$brd_desc[$j]);
					addXMLAttribute($dir,"flag",$brd_flag[$j]);
					addXMLAttribute($dir,"class","目录");
				}
				else
				{
					$favbrd = addXMLElement($dom, $outroot, "FavBrd", "");
					addXMLAttribute($favbrd,"bid",$brd_bid[$j]);
					addXMLAttribute($favbrd,"name",$brd_name[$j]);
					addXMLAttribute($favbrd,"desc",$brd_desc[$j]);
					addXMLAttribute($favbrd,"flag",$brd_flag[$j]);
					addXMLAttribute($favbrd,"class",$fav_class[$j]);
					addXMLAttribute($favbrd,"bm",$brd_bm[$j]);
					addXMLAttribute($favbrd,"articles",$brd_artcnt[$j]);
					addXMLAttribute($favbrd,"users",$brd_users[$j]);
				}
			}
		}
		echo $dom->saveXML();
	}

	function friend()
	{
		global $currentuser;
		login_init();
		bbs_session_modify_user_mode(BBS_MODE_FRIEND);
		
		if($currentuser["userid"]=="guest")
		{
			printInfo("同学，查看好友是需要登录的！");
			return;
		}
		
		if (isset($_GET["list"]))//好友列表
		{
			$liststat = $_GET["list"];
			if($liststat == "online")
			{
				$friends = bbs_getonlinefriends();
				if ($friends == 0)
					$num = 0;
				else
					$num = count($friends);
				
				$dom = new DomDocument('1.0',"utf-8");
				$outroot=$dom->createElement('Friends');
				$outroot->setAttribute("Type","online");
				$dom->appendchild($outroot);
				for($i = 0; $i < $num; $i++)
				{
					if(!$friends[$i]["invisible"]) 
					{
						$friendnode = addXMLElement($dom, $outroot, "Friend", "");
						addXMLAttribute($friendnode,"userid",$friends[$i]["userid"]);
						addXMLAttribute($friendnode,"username",$friends[$i]["username"]);
						addXMLAttribute($friendnode,"userfrom",$friends[$i]["userfrom"]);
						addXMLAttribute($friendnode,"idle",$friends[$i]["idle"]);
						if ($friends[$i]["pid"] == 1)
							addXMLAttribute($friendnode,"mode",$friends[$i]["mode"]);
						
						$user_pic;
						$userarray=array();
						if (bbs_getuser($friends[$i]["userid"],$userarray)) 
						{
							$user=$userarray;
							if ($user['userface_img'] == -1) 
							{
								$user_pic = $user['userface_url'];
							} 
							else 
							{
								$user_pic = 'userface/image'.$user['userface_img'].'.gif';
							}
						}
						addXMLAttribute($friendnode,"userface_img","wForum/".$user_pic);
						//addXMLAttribute($friendnode,"time",strftime("%Y-%m-%d %H:%M:%S", $friends[$i]["POSTTIME"]));
					}
				}
			}
			else//$liststat == "all"
			{
				$total_friends = bbs_countfriends($currentuser["userid"]);
				if( isset( $_GET["start"] ) )
				{
					$startNum = $_GET["start"];
					if ($startNum >= $total_friends) $startNum = $total_friends - 20;
					if ($startNum < 0) $startNum = 0;
				} 
				else 
				{
					$startNum = 0;
				}
				
				$friends = bbs_getfriends($currentuser["userid"], $startNum);
				
				if ($friends == 0)
					$num = 0;
				else
					$num = count($friends);
				
				$dom = new DomDocument('1.0',"utf-8");
				$outroot=$dom->createElement('Friends');
				$outroot->setAttribute("Type","all");
				$outroot->setAttribute("Total",$total_friends);
				$dom->appendchild($outroot);
				for($i = 0; $i < $num; $i++)
				{
					$friendnode = addXMLElement($dom, $outroot, "Friend", "");
					addXMLAttribute($friendnode,"experience",$friends[$i]["EXP"]);
					addXMLAttribute($friendnode,"ID",$friends[$i]["ID"]);
					
					$user_pic;
					$userarray=array();
					if (bbs_getuser($friends[$i]["ID"],$userarray)) 
					{
						$user=$userarray;
						if ($user['userface_img'] == -1) 
						{
							$user_pic = $user['userface_url'];
						} 
						else 
						{
							$user_pic = 'userface/image'.$user['userface_img'].'.gif';
						}
					}
					addXMLAttribute($friendnode,"userface_img","wForum/".$user_pic);
				}
			}
			/*
				var_dump($friends[$i]);
				echo "<br>";
				if($friends[$i]["invisible"]) 
					echo "C";
				else
					echo " ";
				
				echo $friends[$i]["userid"];
				
				if($friends[$i]["invisible"]) 
					echo "<td>隐身中...</td>";
				else 
				{
					$mode = $friends[$i]["mode"];
					if ($friends[$i]["pid"] == 1) $mode = "<span class='blue'>" . $mode . "</span>";
					echo "<td>" . $mode . "</td>";
				}
				
				if($friends[$i]["idle"] == 0) 
					echo "<td> </td>";
				else
					echo "<td>" . $friends[$i]["idle"] . "</td>";
					
				-----------------------------------------
				
				define("USERSPERPAGE", 20); //ToDo: USERSPERPAGE should always be 20 here because of phplib - atppp
				$total_friends = bbs_countfriends($currentuser["userid"]);
				if( isset( $_GET["start"] ) ){
					$startNum = $_GET["start"];
					if ($startNum >= $total_friends) $startNum = $total_friends - USERSPERPAGE;
					if ($startNum < 0) $startNum = 0;
				} else {
					$startNum = 0;
				}
				$friends_list = bbs_getfriends($currentuser["userid"], $startNum);
				
				if ($friends_list === FALSE) {
					$count = $total_friends = 0;
				} else {
					$count = count ( $friends_list );
				
					$i = 0;
					foreach($friends_list as $friend) {
						$i++;
				*/

			echo $dom->saveXML();
			
			return;
		}
		
		if (isset($_GET["add"]))//添加好友
		{
			$addname = $_GET["add"];
			$ret = bbs_add_friend( $addname ,"" );
			if($ret == -1) {
				printInfo("您没有权限设定好友或者好友个数超出限制");
			} else if($ret == -2) {
				printInfo("$friend 本来就在你的好友名单中");
			} else if($ret == -3) {
				printInfo("系统出错");
			} else if($ret == -4) {
				printInfo("$friend 用户不存在");
			} else{
				printInfo("$friend 已增加到您的好友名单中");
			}
			return;
		}
		
		if (isset($_GET["delete"]))//删除好友
		{
			$delname = $_GET["delete"];
			$ret = bbs_delete_friend( $delname );
			if ($ret == 1) {
				printInfo("您没有设定任何好友");
			} else if($ret == 2) {
				printInfo("$friend 本来就不在你的好友名单中");
			} else if($ret == 3) {
				printInfo("删除失败");
			} else {
				printInfo("$friend 已从您的好友名单中删除");
			}
			return;
		}
		
	}
	
	function mail_test()
	{
		global $currentuser;
		login_init();
		bbs_session_modify_user_mode(BBS_MODE_MAIL);
		
		if($currentuser["userid"]=="guest")
		{
			printInfo("同学，收发邮件是需要登录的！");
			return;
		}
		
		if (isset($_POST['destid']))//发邮件
		{
		
			if (!bbs_can_send_mail()) 
			{
				printInfo("您没有写信权力!");
				return;
			}
			if (strchr($_POST['destid'], '@') || strchr($_POST['destid'], '|')
				|| strchr($_POST['destid'], '&') || strchr($_POST['destid'], ';')) 
			{
				printInfo("错误的收信人帐号");
				return;
			}
			
			$ret=bbs_postmail($_POST['destid'],trim($_POST['title']),$_POST['content'],intval($_POST['signature']), isset($_POST['backup'])?1:0);
			
			switch ($ret) {
				case -1:
					printInfo("无法创建临时文件");
					return;
				case -2:
					printInfo("发信失败:无法创建文件！");
					return;
				case -3:
					printInfo("对方拒收你的邮件。");
					return;
				case -4:
					printInfo("对方信箱满。");
					return;
				case -5:
					printInfo("两次发文/信间隔过密,请休息几秒再试!");	
					return;
				case -6:
					printInfo("添加邮件列表出错");
					return;
				case -7:
					printInfo("邮件发送成功，但未能保存到发件箱");
					return;
				case -8:
					printInfo("找不到所回复的原信。");
					return;
				case -100:
					printInfo("错误的收件人ID");
					return;
			}
			printInfo("信件已成功发送！");

			return;
		}
		
		if (isset($_GET["friendlist"]))//通讯录
		{
			return;
		}
		
		if (!isset($_GET["boxname"]))
		{
			printInfo("boxname为空，请指定信箱！");
			return;
		}
		
		$name = $_GET["boxname"];
		if ($name=='sendbox') 
		{
			$path = ".SENT";
			$desc = "发件箱";
		}
		elseif ($name=='deleted')
		{
			$path = ".DELETED";
			$desc = "废件箱";
		}
		else//$name=='inbox'
		{
			$path = ".DIR";
			$desc = "收件箱";
		}
		
		if (isset($_GET["read"]))//读信
		{
			$readnum = $_GET["read"];
			$dir = bbs_setmailfile($currentuser["userid"],$path);
			if( filesize( $dir ) <= 0 )
			{
				printInfo("您所指定的信箱不存在！");
				return;
			}
			
			$articles = array ();
			if( bbs_get_records_from_num($dir, $readnum, $articles) ) 
			{
				$file = $articles[0]["FILENAME"];
			}
			else
			{
				printInfo("您所指定的信件不存在！");
				return;
			}
			
			$filename = bbs_setmailfile($currentuser["userid"],$file);
			if(! file_exists($filename))
			{
				printInfo("您所指定的信件不存在！");
				return;
			}
			
			@$attachpos=$_GET["ap"];//pointer to the size after ATTACHMENT PAD
			if ($attachpos!=0) {
				bbs_file_output_attachment($filename, $attachpos);
				exit;
			}
			
			//printInfo( bbs_printansifile($filename,1,"mobile.php?" . $_SERVER['QUERY_STRING']));
			
			$s = bbs2_readfile($filename); 
			if (!is_string($s))
			{
				//printInfo($s);
				$s = " ";
			}
			
			$dom = new DomDocument('1.0',"utf-8");
			$mailnode = addXMLElement($dom, $dom, "Mail", $s);
			addXMLAttribute($mailnode,"num",$readnum);
			addXMLAttribute($mailnode,"sender",$articles[0]["OWNER"]);
			addXMLAttribute($mailnode,"isnew",$articles[0]["FLAGS"]);
			addXMLAttribute($mailnode,"title",$articles[0]["TITLE"]);
			addXMLAttribute($mailnode,"size",$articles[0]["EFFSIZE"]);
			addXMLAttribute($mailnode,"time",strftime("%Y-%m-%d %H:%M:%S", $articles[0]["POSTTIME"]));

			echo $dom->saveXML();
			
			/* js
			function prints(s) {
				strPrint += s;
				s = s.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
				s = s.replace(/\r[\[\d;]+[a-z]/gi, "");
				s = s.replace(/\x20\x20/g, " &nbsp;").replace(/\n /g, "\n&nbsp;");
				s = s.replace(/\n(: [^\n]*)/g, "<br/><span class=\"f006\">$1</span>");
				if (gKon && s.length > 0) {
					s = s.split("\n").join("<br/>");
				} else {
					s = s.replace(/\n/g, "<br/>");
				}
				if (!gIE5) {
					var urlmatch = new RegExp("((?:http|https|ftp|mms|rtsp)://(&(?=amp;)|[A-Za-z0-9\./=\?%_~@#,:;\+\-])+)", "ig");
					s = s.replace(urlmatch, "<a target=\"_blank\" href=\"$1\">$1</a>");
				}
				strArticle += s;
				if (!divArtCon) w(s);
			}
			*/
			
			bbs_setmailreaded($dir,$num);
			return;
		}
		
		if (isset($_GET["delete"]))//删信
		{
			$delnum = $_GET["delete"];
			
			if ($delnum=='all') 
			{
				deleteAllMails($name, $path);
			} 
			else
			{
				$nums=split(',',$delnum);
				deleteMails($name, $path, $nums);
			}
			
			return;
		}
		
		if (isset($_GET["list"]))//邮件列表
		{
			$page = $_GET["list"];//1-based mail page
			if($page<=0)
				$page = 1;
			$mail_fullpath = bbs_setmailfile($currentuser["userid"],$path);
			$mail_num = bbs_getmailnum2($mail_fullpath);
			if($mail_num < 0 || $mail_num > 30000)
			{
				printInfo("邮件数量异常!");
				return;
			}
			
			$mpp = 20; //mails per page
			
			$totalpage = (int)($mail_num/$mpp) + 1;
			if($page > $totalpage)
				$page = $totalpage;
			
			$start = ($page - 1) * $mpp;
			$end = $start + $mpp - 1;
			if($end > $mail_num - 1)
				$end = $mail_num - 1;
			
			$num = $end - $start + 1;
			$maildata = bbs_getmails($mail_fullpath,$start,$num);
			if ($maildata == FALSE)
			{
				//echo "page:".$page."    mail_num:".$mail_num."     start:".$start."    end:".$end."    num:".$num;
				printInfo("读取邮件数据失败!");
				return;
			}
			
			if($mail_num == 0)
			{
				printInfo("文件夹中目前没有邮件");
				return;
			}
			else
			{
				/*
				var_dump($maildata);
				return;
				$bgcs = false;
				for ($i = 0; $i < $num; $i++)
				{
					$bgcs = !$bgcs;
					if(stristr($maildata[$i]["FLAGS"],"N"))
						$newmail = true;
					else
						$newmail = false;
				}
				*/
				$dom=new DomDocument('1.0',"utf-8");
				$outroot=$dom->createElement('Mails');
				$outroot->setAttribute("Page",$page);
				$outroot->setAttribute("TotalPage",$totalpage);
				$dom->appendchild($outroot);
				
				for ($i = $start; $i <= $end; $i++)
				{
					//printInfo($maildata[$i]["TITLE"]."<br>");
					$mailnode = addXMLElement($dom, $outroot, "Mail", $maildata[$i]["TITLE"]);
					addXMLAttribute($mailnode,"num",$i);
					addXMLAttribute($mailnode,"sender",$maildata[$i]["OWNER"]);
					addXMLAttribute($mailnode,"isnew",$maildata[$i]["FLAGS"]);
					addXMLAttribute($mailnode,"size",$maildata[$i]["EFFSIZE"]);
					addXMLAttribute($mailnode,"time",strftime("%Y-%m-%d %H:%M:%S", $maildata[$i]["POSTTIME"]));
				}
				echo $dom->saveXML();
			}
			
			return;
		}
	}
	
function deleteMails($boxName, $boxPath, $nums){
	global $currentuser;
	$dir = bbs_setmailfile($currentuser["userid"],$boxPath);

	$total = filesize( $dir ) / 256 ;
	if( $total <= 0 ){
		printInfo("您所指定的信件不存在。");
		return;
	}
	$mailnum=count($nums);

	for ($i=0;$i<$mailnum;$i++) {
		if( $articles=bbs_getmails($dir, intval($nums[$i]), 1) ) {
			if (strtoupper($articles[0]["FLAGS"][0])!='M') {
				$ret = bbs_delmail($boxPath, $articles[0]["FILENAME"]);
			}
		}
	}

	printInfo("邮件删除成功！");
}

function deleteAllMails($boxName, $boxPath) {
	global $currentuser;
	$dir = bbs_setmailfile($currentuser["userid"],$boxPath);
	$mailnum = bbs_getmailnum2($dir);
	if( $mailnum <= 0 ){
		printInfo("邮件已成功删除！");
		return;
	}
	$articles=bbs_getmails($dir, 0, $mailnum);
	for ($i=0;$i<$mailnum;$i++) {
		if (strtoupper($articles[$i]["FLAGS"][0])!='M') {
			bbs_delmail($boxPath,$articles[$i]["FILENAME"]);
		}
	}
	printInfo("邮件已成功删除！");
}

function mobile_login()
{
	global $currentuser;
	//bbs_setfromhost(trim($fromhost),trim($fullfromhost));
	//bbs_session_modify_user_mode(BBS_MODE_MMENU);
	
	set_fromhost();
	cache_header("nocache");
	
	
	@$id = $_POST["id"];
	@$passwd = $_POST["passwd"];
	
	if ($id=="") 
	{
		printInfo("用户名不能为空!");
		return;
	}
	
	if( $id != "guest" && bbs_isonline($id) )
	{
		bbs_wwwlogoff();
		delete_all_cookie();
		cache_header("nocache");
	}
	
	$ret = bbs_check_ban_ip($id, $fromhost);
	switch($ret) {
	case 1:
		printInfo("对不起，当前位置不允许登录该ID。");
		return;
	case 2:
		printInfo("该 ID 不欢迎来自该 IP 的用户。");
		return;
	case 3:
		printInfo("用户密码错误，请重新登录！");
		return;
	}
	
	if (($id!="guest")&&bbs_checkpasswd($id,$passwd)!=0) {
		printInfo("用户密码错误，请重新登录！");
		return;
	}

	if( isset( $_POST["device"] ) )
	{
		$deviceName = $_POST["device"];
		if ($deviceName == 0) 
			$deviceName = "Android客户端";
		else
			$deviceName = "iPhone客户端";
	} 
	else 
	{
		$deviceName = "Android客户端";
	}
	
	//$kick_multi,$fromhost,$fullfromhost
	$error=bbs_wwwlogin(1, $deviceName, $deviceName);
	switch($error) {
		case -1:
			//prompt_multilogin();
			//printInfo("已经在线上！");
			//return;
		case 0:
		case 2:
			//normal
			break;
		case 3:
			printInfo("本帐号已停机或正在戒网");
			return;
		case 5:
			printInfo("登录过于频繁");
			return;
		case 1:
			printInfo("对不起，系统忙碌，请稍候再尝试登录");
			return;
		default:
			printInfo("登录错误，错误号：" . $error);
			return;
	}
	
	//bbs_session_modify_user_mode(BBS_MODE_MMENU);
	$data = array();
	$num=bbs_getcurrentuinfo($data);

	if ($data["userid"] != "guest") {
		$wwwparameters = bbs_getwwwparameters();
		setcookie("WWWPARAMS",$wwwparameters,0,"/");
		//$currentuser_num=bbs_getcurrentuser($currentuser);
		//if(!($currentuser["userlevel"]&BBS_PERM_LOGINOK )) {
		//	$mainurl = "bbsnew.php";
		//}
		$mbids = bbs_bm_get_manageable_bids();
		if ($mbids) {
			setcookie("MANAGEBIDS", $mbids,0,"/");
		}
	}
	setcookie("UTMPKEY",$data["utmpkey"],0,"/");
	setcookie("UTMPNUM",$num,0,"/");
	setcookie("UTMPUSERID",$data["userid"],0,"/");
	
	printInfo("登录成功。");
}

	
	
function mobile_test()
{


}

?>
