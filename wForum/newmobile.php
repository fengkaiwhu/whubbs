
<?php
define('TPCCNT', 10);//每页帖子数
define('ARTCNT', 20);//每帖文章数

require_once("inc/funcs.php");
require_once("inc/domxml-php4-to-php5.inc.php");
require_once("inc/xml.inc.php");
require_once("inc/board.inc.php");
//login_init();

$app=@$_GET["app"];
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
	case "topics"://获取版面帖子列表
		get_board_topics();
		break;
	case "read"://读帖子
		read_topic();
		break;
	case "write"://发表文章,需要使用POST
		post_article();
		break;
	case "logout"://退出
		mobile_logout();
		exit;
	default:
		break;
	case "articles"://获取版面文章列表(帖子和回复混在一起)
		get_board_articles();
		break;
}
?>

<?php
	function printInfo( $errStr ){
		if(!mb_check_encoding( $errStr, "UTF-8" ))
		{
			//echo "#||---do charset convertion!".$errStr."<br>".mb_detect_encoding( $errStr )."---||#";
			//echo mb_detect_encoding( $errStr )."<br>";
			$errStr = iconv( "gb2312","utf-8//IGNORE",$errStr);
		}
		echo $errStr; 
		//echo iconv("gb2312","utf-8//IGNORE",$errStr);
	}
?>

<?php
function mobile_logout(){
	bbs_wwwlogoff();
	cache_header("nocache");
	//delete_all_cookie
	setcookie("UTMPKEY","",time()-3600,"/");
	setcookie("UTMPNUM","",time()-3600,"/");
	setcookie("UTMPUSERID","",time()-3600,"/");
	setcookie("WWWPARAMS","",time()-3600,"/");
	setcookie("MANAGEBIDS","",time()-3600,"/");
	header("Set-KBSRC: /");
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
    	$hot_number = find_content($board, "number");
    	$hot_groupid = find_content($board, "groupid");

		$brdnum = bbs_getboard($hot_board, $brdarr);
		if ($brdnum == 0)
			continue;
		$brd_encode = urlencode($brdarr["NAME"]);

		//在根节点下创建“elm”节点
		$elm=$dom->createElement('hot');
		$outroot->appendchild($elm);
		
		//在“elm”节点下添加值节点“title”
		$title=$dom->createElement("title",$hot_title);
		$elm->appendchild($title);
		
		//在“elm”节点下添加值节点“author”
		$author=$dom->createElement("author",$hot_author);
		$elm->appendchild($author);
		
		//在“elm”节点下添加值节点“board”
		$boardid=$dom->createElement("board",$hot_board);
		$elm->appendchild($boardid);
		
		//在“elm”节点下添加值节点“boardname”
		$boardname=$dom->createElement("boardname", $brdarr["DESC"]);
		//$boardname=$dom->createElement("boardname",urlencode($brdarr["DESC"]));
		$elm->appendchild($boardname);
		
		//在“elm”节点下添加值节点“groupid”
		$groupid=$dom->createElement("groupid",$hot_groupid);
		$elm->appendchild($groupid);
		
		//在“elm”节点下添加值节点“time”
		$time=$dom->createElement("lasttime",strftime("%Y-%m-%d %H:%M:%S", $hot_time));
		$elm->appendchild($time);
		
		$number=$dom->createElement("number",$hot_number);
		$elm->appendchild($number);

		//echo $hot_title."--".$hot_author."--".$hot_board."--".$brdarr["DESC"];
	}
	printInfo($dom->saveXML());
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
		
		$title=$dom->createElement("title",$origin['TITLE']);
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

?>
