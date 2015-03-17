<?php
define('TPCCNT', 10);//ÿҳ������
define('ARTCNT', 20);//ÿ��������

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
	case "recomm"://�Ƽ�����
		recomm_article();
		break;
	case "poster"://У԰����
		campus_poster();
		break;
	case "hot"://��ȡʮ������
		hot_topic();
		break;
	case "boards"://��ȡ���а���
		get_boards();
		break;
	case "articles"://��ȡ���������б�(���Ӻͻظ�����һ��)
		get_board_articles();
		break;
	case "topics"://��ȡ���������б�
		get_board_topics();
		break;
	case "read"://������
		read_topic();
		break;
	case "post"://��������,��Ҫʹ��POST
		post_article();
		break;
	case "login"://��¼
		mobile_login();
		break;
	case "logout"://�˳�
		bbs_wwwlogoff();
		cache_header("nocache");
		delete_all_cookie();
		exit;
	case "userInfo"://��ʾ�û���Ϣ
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
//��¼
//bbslogin.php?mainurl=mobile.php&id=xx&passwd=xx
//��Ҫ��д����¼ʱ��ʶ��׿�豸
//
?>

<?php
//�Ƽ�����
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
	
	//����һ��XML�ĵ�
	$dom=new DomDocument('1.0',"utf-8");
	//�������ڵ�
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
		
		//�ڸ��ڵ��´�����elm���ڵ�
		$elm=$dom->createElement('recomm');
		$outroot->appendchild($elm);
		
		//�ڡ�elm���ڵ������ֵ�ڵ㡰title��
		$title=$dom->createElement("title",htmlspecialchars($commend_title));
		$elm->appendchild($title);
		
		//�ڡ�elm���ڵ������ֵ�ڵ㡰�Ƽ��ˡ�
		$author=$dom->createElement("recommby",htmlspecialchars($commend_author));
		$elm->appendchild($author);
		
		//�Ƽ�ʱ��
		$rectime=$dom->createElement("recommTime",strftime("%Y-%m-%d %H:%M:%S", $commend_time));
		$elm->appendchild($rectime);
		
		//�Ƽ�����
		$recboardid=$dom->createElement("board",$commend_board);
		$elm->appendchild($recboardid);
		
		//�Ƽ����Ӻ�(�Ƽ�������)
		$recommGID=$dom->createElement("recommGID",$commend_id);
		$elm->appendchild($recommGID);
		
		$originAuthor=$dom->createElement("Author",$commend_own);
		$elm->appendchild($originAuthor);
		
		//�ڡ�elm���ڵ������ֵ�ڵ㡰board��
		$boardid=$dom->createElement("originBoard",$brd_encode);
		$elm->appendchild($boardid);
		
		//�ڡ�elm���ڵ������ֵ�ڵ㡰boardname��
		$boardname=$dom->createElement("originBoardName", $brdarr["DESC"]);
		$elm->appendchild($boardname);
		
		$originArticleID=$dom->createElement("originArticleID",$commend_o_id);
		$elm->appendchild($originArticleID);
		
		//�ڡ�elm���ڵ������ֵ�ڵ㡰groupid��
		$groupid=$dom->createElement("originGID",$commend_o_groupid);
		$elm->appendchild($groupid);
		
		//�ڡ�elm���ڵ������ֵ�ڵ㡰commend_brief��
		$recomm_brief=$dom->createElement("brief",htmlspecialchars($commend_brief));
		$elm->appendchild($recomm_brief);
	}
	printInfo($dom->saveXML());
}

?>

<?php
//У԰����
function campus_poster(){
	$brdarr = array();
	$brdnum = bbs_getboard("Notice", $brdarr);
	if ( ($brdnum==0) || ($brdarr["FLAG"] & BBS_BOARD_GROUP) ) 
	{
		printInfo( "��ǰû�к���err1");
	} 
	else 
	{
		$total = bbs_getThreadNum($brdnum);
		if ($total <= 0) 
		{
			printInfo( "��ǰû�к���err2");
		} 
		else 
		{
			$articles = bbs_getthreads($brdarr['NAME'], 0, 30,1); 
			if ($articles == FALSE) 
			{
				printInfo( "��ǰû�к���err3");
			} 
			else 
			{
				//����һ��XML�ĵ�
				$dom=new DomDocument('1.0',"utf-8");
				//�������ڵ�
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
						
						//�ڸ��ڵ��´�����elm���ڵ�
						$elm=$dom->createElement('poster');
						$outroot->appendchild($elm);
		
						//�ڡ�elm���ڵ������ֵ�ڵ㡰title��
						$title=$dom->createElement("title",htmlspecialchars($articles[$i]['origin']['TITLE'],ENT_QUOTES));
						$elm->appendchild($title);
		
						//�ڡ�elm���ڵ������ֵ�ڵ㡰board��
						$boardid=$dom->createElement("board",$brdarr['NAME']);
						$elm->appendchild($boardid);
						
						//�ڡ�elm���ڵ������ֵ�ڵ㡰groupid��
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
//ʮ��
function hot_topic(){
	# load xml doc
	$hotsubject_file = BBS_HOME . "/xml/day.xml";
	$doc = domxml_open_file($hotsubject_file);
	if (!$doc)
		return;

	$root = $doc->document_element();
	$boards = $root->child_nodes();

	$brdarr = array();

	//����һ��XML�ĵ�
	$dom=new DomDocument('1.0',"utf-8");
	//�������ڵ�
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
		
		//�ڸ��ڵ��´�����elm���ڵ�
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
//����
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
		$brd_name = $boards["NAME"]; // Ӣ����
		$brd_desc = $boards["DESC"]; // ��������
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
//��ȡ�����б�
function get_board_topics(){
	//board-----��������
	if (!isset($_GET['board'])) {
		printInfo( "δָ�����棡");
		return;
	} else {
		$board=$_GET['board'];
	}
	
	$brdArr=array();
	$boardID= bbs_getboard($board, $brdArr);
	$board=$brdArr['NAME'];

	//page----ҳ�룬��1��ʼ
	if (!isset($_GET['page'])) {
		$page=-1;
	} else {
		$page=intval($_GET['page']);
	}

	$total = bbs_getThreadNum($boardID);
	if ($total<=0) {
		printInfo( "�ð�û�����£�");
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

	//����һ��XML�ĵ�
	$dom=new DomDocument('1.0',"utf-8");
	//�������ڵ�
	$outroot=$dom->createElement('topics');
	$outroot->setAttribute("board",$board);
	//$outroot->setAttribute("boardID",$boardID);
	$outroot->setAttribute("page",$page);
	$outroot->setAttribute("totalPages",$totalPages);
	$dom->appendchild($outroot);
	
	//echo "��".$page."ҳ<br />";
	$articles = bbs_getthreads($board, $start, $num, 1);
	$articleNum=count($articles);
	
	for($i=0;$i<$articleNum;$i++){
		$origin=$articles[$i]['origin'];
		$lastreply=$articles[$i]['lastreply'];
		$threadNum=$articles[$i]['articlenum']-1;
		
		//�ڸ��ڵ��´�����elm���ڵ�
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
		
/* 		echo "���:".($i+$start+1);
		echo "    ���ӱ���:".$origin['TITLE'];
		echo "    �������º�:".$origin['ID'];  
		echo "<br />������:".$origin['OWNER'];
		echo "    ����ʱ��:".strftime("%Y-%m-%d %H:%M:%S", $origin['POSTTIME']); 
		echo "    �ظ���:".$threadNum;
		// echo "----״̬��־:".$origin['FLAGS'][0]; 
		echo "<br />���ظ���:".$lastreply['OWNER'];
		echo "    ���ظ�ʱ��:".strftime("%Y-%m-%d %H:%M:%S", $lastreply['POSTTIME']);
		echo "    ���ظ����º�:".$lastreply['ID'];
		// echo "----״̬��־:".$lastreply['FLAGS'][0]; 
		echo "<br /><br />";
		// echo ":".($origin['ATTACHPOS']>0)?1:0;//���� */
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
		echo "��������Ŀǰû������";
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
		echo "��ȡ�����б�ʧ��";
		return;
	}

	echo "��ǰҳ��:".($page-1)."<br />";

	$html="";
	foreach ($articles as $article)	{
		$title = $article["TITLE"];
		if (strncmp($title, "Re: ", 4) != 0)
			$title = "�� " . $title;

		$flags = $article["FLAGS"];

		if (!strncmp($flags,"D",1)||!strncmp($flags,"d",1)) {
			$html .= " [��ʾ] ";
		} else {
			$html .= sprintf("%5d ", ($start+$i));
			if ($flags[0] == 'N' || $flags[0] == '*'){
				$html .= " "; //$flags[0];  //��Ҫδ����� windinsn
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
//������
function read_article( $board, $id ){
	$ftype=0;
	$articles = array ();
	$num = bbs_get_records_from_id($board, $id, $ftype, $articles);
	if ($num <= 0) {
		return "��������º�,ԭ�Ŀ����Ѿ���ɾ��";
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
		printInfo( "δָ�����档");
		return;
	}
	$board=$_GET['board'];
	
	$brdArr=array();
	$boardID= bbs_getboard($board,$brdArr);
	$board=$brdArr['NAME'];
	
	if ($boardID==0) {
		printInfo( "ָ���İ��治����");
		return;
	}
	
	global $currentuser;
	$usernum = $currentuser["index"];
	if (bbs_checkreadperm($usernum, $boardID) == 0) {
		printInfo( "����Ȩ�Ķ�����");
		return;
	}
	if (!isset($_GET['GID'])) {
		printInfo( "δָ�����£�");
		return;
	} else {
		$groupID=intval($_GET['GID']);
	}
	////////////////////////////

	//page----ҳ�룬��1��ʼ
	if (!isset($_GET['page'])) {
		$page=1;
	} else {
		$page=intval($_GET['page']);
	}

	$articles = array();
	$num = bbs_get_threads_from_gid($boardID, $groupID, $groupID, $articles, $haveprev );
	if ($num==0) {
		printInfo( "��ָ�������²����ڣ�");
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
	
	//����guest�ʻ��Ķ�1��ǰ��
	$time1 = strftime('%Y-%m-%d %H:%M:%S', intval($articles[0]['POSTTIME']));
    $time2 = date("Y-m-d H:i:s",time());
    $diff=(strtotime($time2)-strtotime($time1))/(60*60*24);
    $user_IP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
    $user_IP = ($user_IP) ? $user_IP : $_SERVER["REMOTE_ADDR"];
    if($user_IP!='218.197.148.4'){
		if($diff>365&&$currentuser["userid"] =="guest"){
			printInfo( "guest�û�����Ȩ���Ķ�һ��ǰ�����ӣ������Ե�¼�����Ķ�");
			return;
		}
	}
	
	//����һ��XML�ĵ�
	$dom=new DomDocument('1.0', 'utf-8');
	//�������ڵ�
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
	
	//echo "��".$page."ҳ<br>";
	for($i=0;$i<$num;$i++) {
		$lc="";
		if(($i+$start)==0)
			$lc = "¥��";
		else
			$lc = ($i+$start)."¥";

		$s=read_article($board,$articles[$i+$start]["ID"]);

		//�ڸ��ڵ��´�����elm���ڵ�
		$elm=$dom->createElement('article');
		$outroot->appendchild($elm);
		
		//�ڡ�elm���ڵ������ֵ�ڵ㡰floor��
		$floor=$dom->createElement("floor",$lc);
		$elm->appendchild($floor);
		
		//�ڡ�elm���ڵ������ֵ�ڵ㡰id��
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
		
		//�ڡ�elm���ڵ������ֵ�ڵ㡰content��
		$content=$dom->createElement("content",$s);
		$elm->appendchild($content);
	}
	printInfo($dom->saveXML());
}
?>

<?php
//������
function post_article(){
	global $currentuser;
	
	if (!isset($_POST['board'])) {
		echo "δָ�����档";
		return;
	}
	$boardName=$_POST['board'];
	$brdArr=array();
	$boardID= bbs_getboard($boardName,$brdArr);
	$boardArr=$brdArr;
	$boardName=$brdArr['NAME'];
	if ($boardID==0) {
		echo "ָ���İ��治����";
		return;
	}
	$usernum = $currentuser["index"];
	if (bbs_checkreadperm($usernum, $boardID) == 0) {
		echo "����Ȩ�Ķ�����";
		return;
	}
	if (bbs_is_readonly_board($boardArr)) {
		echo "����Ϊֻ����������";
		return;
	}
	if (bbs_checkpostperm($usernum, $boardID) == 0) {
		echo "����Ȩ�Ķ�����";
		return;
	}
	if (!isset($_POST['subject'])) {
		echo "û��ָ�����±��⣡";
		return;
	}
	if (!isset($_POST['Content'])) {
		echo "û��ָ���������ݣ�";
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
			echo "����� Re �ı��";
			return;
		}
		if ($articles[1]["FLAGS"][2] == 'y') {
			echo "���Ĳ��ɻظ�!";
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
			echo ("���ĳɹ��������Ŀ��ܺ��в������ݣ��辭��˷��ɷ��������ĵȴ�վ����Ա����ˣ���Ҫ��γ��Է�������¡�");
		case -1:
			echo ("��������������ơ�");
		case -2:
			echo ("����Ϊ����Ŀ¼�棡");
		case -3:
			echo ("����Ϊ�ա�");
		case -4:
			echo ("����������Ψ����, ����������Ȩ���ڴ˷������¡�");
		case -5:
			echo ("�ܱ�Ǹ, �㱻������Աֹͣ�˱����postȨ����");
		case -6:
			echo ("���η���/�ż������, ����Ϣ��������ԡ�");
		case -7:
			echo ("�޷���ȡ�����ļ�����Ѹ��֪ͨվ����Ա��лл��");
		case -8:
			echo ("���Ĳ��ɻأ�");
		case -9:
			echo ("ϵͳ�ڲ�������Ѹ��֪ͨվ����Ա��лл��");
	}
}
?>

<?php
function display_user(){
	
	if (!isset($_GET['userId']) || $_GET['userId'] == "") 
	{
		printInfo( "δָ���û�Id��");
		return;
	}

	$user;
	$user_num;
	$userarray=array();
	if (($user_num=bbs_getuser($_GET['userId'],$userarray))==0) 
	{
		printInfo("�����û�����ʧ�ܣ�");
	}
	$user=$userarray;
	
	$dom=new DomDocument('1.0',"utf-8");
	$outroot=$dom->createElement('user');
	//$outroot->setAttribute("board",$board);
	$dom->appendchild($outroot);
	
	if ($user['userdefine0']) 
	{
		//��������
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
		$sex=$dom->createElement("sex",chr($user['gender'])=='M'?'��':'Ů');
		$outroot->appendchild($sex);
		//echo get_astro($user['birthmonth'],$user['birthday']);//����
		$OICQ=$dom->createElement("OICQ",$user['OICQ']);
		$outroot->appendchild($OICQ);
		$ICQ=$dom->createElement("ICQ",$user['ICQ']);
		$outroot->appendchild($ICQ);
		$MSN=$dom->createElement("MSN",$user['MSN']);
		$outroot->appendchild($MSN);
		$homepage=$dom->createElement("homepage",htmlspecialchars(trim($user['homepage']),ENT_QUOTES));
		$outroot->appendchild($homepage);
		
		//��̳����
		$userlevel=$dom->createElement("userlevel",bbs_getuserlevel($user['userid']));
		$outroot->appendchild($userlevel);
		$numposts=$dom->createElement("numposts",$user['numposts']);
		$outroot->appendchild($numposts);
		
		$arr = getgroupinfo($user['userid']);//����
		$menpai;
		if($arr[1]!='') 
			$menpai = $arr[1].' '.$arr[2]; 
		else 
			$menpai = '��������';
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
		else $usermodestr= "Ŀǰ����վ��";
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
			$plans="��λͬѧ�ܵ͵����Ӳ�ǩ����";
		}
		/*
		$fp = @fopen ($filename, "r");
		if ($fp!=false) { //ToDo: �õ�һ��������
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
		printInfo("��λͬѧ�书���������������ֹ����̽�����ĸ�����Ϣ��");
	}
	
	
	if (false&&SHOW_REGISTER_TIME && ($user['userdefine0'] & BBS_DEF_SHOWREALUSERDATA)) 
	{
		//�û���ϸ����
		//�ԣ�����
		echo $character[$user['character']]; 
		//���˼�飺
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
			echo "<font color=gray>����һ������ʲôҲû������^_^</font>";
		}

		//��ʵ������
		echo showIt($user['realname']);	
		//�������ң�
		echo showIt($user['country']); 
		//�� ����
		if ( ($user['birthyear']!=0) && ($user['birthmonth']!=0) && ($user['birthday']!=0)) 
		{
			echo '19'.$user['birthyear'].'��'.$user['birthmonth'].'��'.$user['birthday'].'��';
		} else 
		{
			echo "<font color=gray>δ֪</font>";
		}
		//ʡ�����ݣ�
		echo showIt($user['province']);
		//�ǡ����У�
		echo showIt($user['city']);
		//��ϵ�绰��
		echo showIt($user['telephone']);
		//ͨ�ŵ�ַ��
		echo showIt($user['address']);
		//�ţ���죺
		$reg_email=htmlspecialchars(trim($user['reg_email']),ENT_QUOTES);
		if ($reg_email!='') 
		{
			echo '<a href=mailto:'.$reg_email.'>'.$reg_email.'</a>'; 
		} 
		else 
		{
			echo "<font color=gray>δ֪</font>";
		}

		//������Ф��
		echo showIt($shengxiao[$user['shengxiao']]);
		//Ѫ�����ͣ�
		echo showIt($bloodtype[$user['bloodtype']]);
		//�š�������
		echo showIt($religion[$user['religion']]);
		//ְ����ҵ��
		echo showIt($profession[$user['profession']]);
		//����״����
		echo showIt($married[$user['married']]);
		//���ѧ����
		echo showIt($education[$user['education']]);
		//��ҵԺУ��
		echo showIt($user['graduateschool']);
		//ע�����ڣ�
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
	if(mysql_num_rows($record)==1)//����Ϣ
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
			printInfo("ͬѧ���鿴�ղؼ�����Ҫ��¼�ģ�");
			return;
		}
		
		if (isset($_GET["select"]))
			$select = $_GET["select"];
		else
			$select = 0;
		settype($select, "integer");
		
		if ($select < 0){
			printInfo("����Ĳ���");
			return;
		}
		
		if(bbs_load_favboard($select)==-1){
			printInfo("����Ĳ���");
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
			$brd_name = $boards["NAME"]; // Ӣ����
			$brd_desc = $boards["DESC"]; // ��������
			$brd_flag = $boards["FLAG"]; 
			$brd_bid = $boards["BID"];  //�� ID ���� fav dir ������ֵ 
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
				if( $brd_bid[$j] == -1) { //���ղ�Ŀ¼
					//printInfo("��Ŀ¼");
					//do nothing
				}
				else if ($brd_flag[$j]==-1)
				{
					//Ŀ¼
					$dir = addXMLElement($dom, $outroot, "FavDir", "");
					addXMLAttribute($dir,"select",$brd_bid[$j]);
					addXMLAttribute($dir,"name",$brd_name[$j]);
					addXMLAttribute($dir,"desc",$brd_desc[$j]);
					addXMLAttribute($dir,"flag",$brd_flag[$j]);
					addXMLAttribute($dir,"class","Ŀ¼");
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
			printInfo("ͬѧ���鿴��������Ҫ��¼�ģ�");
			return;
		}
		
		if (isset($_GET["list"]))//�����б�
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
					echo "<td>������...</td>";
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
		
		if (isset($_GET["add"]))//��Ӻ���
		{
			$addname = $_GET["add"];
			$ret = bbs_add_friend( $addname ,"" );
			if($ret == -1) {
				printInfo("��û��Ȩ���趨���ѻ��ߺ��Ѹ�����������");
			} else if($ret == -2) {
				printInfo("$friend ����������ĺ���������");
			} else if($ret == -3) {
				printInfo("ϵͳ����");
			} else if($ret == -4) {
				printInfo("$friend �û�������");
			} else{
				printInfo("$friend �����ӵ����ĺ���������");
			}
			return;
		}
		
		if (isset($_GET["delete"]))//ɾ������
		{
			$delname = $_GET["delete"];
			$ret = bbs_delete_friend( $delname );
			if ($ret == 1) {
				printInfo("��û���趨�κκ���");
			} else if($ret == 2) {
				printInfo("$friend �����Ͳ�����ĺ���������");
			} else if($ret == 3) {
				printInfo("ɾ��ʧ��");
			} else {
				printInfo("$friend �Ѵ����ĺ���������ɾ��");
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
			printInfo("ͬѧ���շ��ʼ�����Ҫ��¼�ģ�");
			return;
		}
		
		if (isset($_POST['destid']))//���ʼ�
		{
		
			if (!bbs_can_send_mail()) 
			{
				printInfo("��û��д��Ȩ��!");
				return;
			}
			if (strchr($_POST['destid'], '@') || strchr($_POST['destid'], '|')
				|| strchr($_POST['destid'], '&') || strchr($_POST['destid'], ';')) 
			{
				printInfo("������������ʺ�");
				return;
			}
			
			$ret=bbs_postmail($_POST['destid'],trim($_POST['title']),$_POST['content'],intval($_POST['signature']), isset($_POST['backup'])?1:0);
			
			switch ($ret) {
				case -1:
					printInfo("�޷�������ʱ�ļ�");
					return;
				case -2:
					printInfo("����ʧ��:�޷������ļ���");
					return;
				case -3:
					printInfo("�Է���������ʼ���");
					return;
				case -4:
					printInfo("�Է���������");
					return;
				case -5:
					printInfo("���η���/�ż������,����Ϣ��������!");	
					return;
				case -6:
					printInfo("����ʼ��б����");
					return;
				case -7:
					printInfo("�ʼ����ͳɹ�����δ�ܱ��浽������");
					return;
				case -8:
					printInfo("�Ҳ������ظ���ԭ�š�");
					return;
				case -100:
					printInfo("������ռ���ID");
					return;
			}
			printInfo("�ż��ѳɹ����ͣ�");

			return;
		}
		
		if (isset($_GET["friendlist"]))//ͨѶ¼
		{
			return;
		}
		
		if (!isset($_GET["boxname"]))
		{
			printInfo("boxnameΪ�գ���ָ�����䣡");
			return;
		}
		
		$name = $_GET["boxname"];
		if ($name=='sendbox') 
		{
			$path = ".SENT";
			$desc = "������";
		}
		elseif ($name=='deleted')
		{
			$path = ".DELETED";
			$desc = "�ϼ���";
		}
		else//$name=='inbox'
		{
			$path = ".DIR";
			$desc = "�ռ���";
		}
		
		if (isset($_GET["read"]))//����
		{
			$readnum = $_GET["read"];
			$dir = bbs_setmailfile($currentuser["userid"],$path);
			if( filesize( $dir ) <= 0 )
			{
				printInfo("����ָ�������䲻���ڣ�");
				return;
			}
			
			$articles = array ();
			if( bbs_get_records_from_num($dir, $readnum, $articles) ) 
			{
				$file = $articles[0]["FILENAME"];
			}
			else
			{
				printInfo("����ָ�����ż������ڣ�");
				return;
			}
			
			$filename = bbs_setmailfile($currentuser["userid"],$file);
			if(! file_exists($filename))
			{
				printInfo("����ָ�����ż������ڣ�");
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
		
		if (isset($_GET["delete"]))//ɾ��
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
		
		if (isset($_GET["list"]))//�ʼ��б�
		{
			$page = $_GET["list"];//1-based mail page
			if($page<=0)
				$page = 1;
			$mail_fullpath = bbs_setmailfile($currentuser["userid"],$path);
			$mail_num = bbs_getmailnum2($mail_fullpath);
			if($mail_num < 0 || $mail_num > 30000)
			{
				printInfo("�ʼ������쳣!");
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
				printInfo("��ȡ�ʼ�����ʧ��!");
				return;
			}
			
			if($mail_num == 0)
			{
				printInfo("�ļ�����Ŀǰû���ʼ�");
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
		printInfo("����ָ�����ż������ڡ�");
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

	printInfo("�ʼ�ɾ���ɹ���");
}

function deleteAllMails($boxName, $boxPath) {
	global $currentuser;
	$dir = bbs_setmailfile($currentuser["userid"],$boxPath);
	$mailnum = bbs_getmailnum2($dir);
	if( $mailnum <= 0 ){
		printInfo("�ʼ��ѳɹ�ɾ����");
		return;
	}
	$articles=bbs_getmails($dir, 0, $mailnum);
	for ($i=0;$i<$mailnum;$i++) {
		if (strtoupper($articles[$i]["FLAGS"][0])!='M') {
			bbs_delmail($boxPath,$articles[$i]["FILENAME"]);
		}
	}
	printInfo("�ʼ��ѳɹ�ɾ����");
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
		printInfo("�û�������Ϊ��!");
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
		printInfo("�Բ��𣬵�ǰλ�ò������¼��ID��");
		return;
	case 2:
		printInfo("�� ID ����ӭ���Ը� IP ���û���");
		return;
	case 3:
		printInfo("�û�������������µ�¼��");
		return;
	}
	
	if (($id!="guest")&&bbs_checkpasswd($id,$passwd)!=0) {
		printInfo("�û�������������µ�¼��");
		return;
	}

	if( isset( $_POST["device"] ) )
	{
		$deviceName = $_POST["device"];
		if ($deviceName == 0) 
			$deviceName = "Android�ͻ���";
		else
			$deviceName = "iPhone�ͻ���";
	} 
	else 
	{
		$deviceName = "Android�ͻ���";
	}
	
	//$kick_multi,$fromhost,$fullfromhost
	$error=bbs_wwwlogin(1, $deviceName, $deviceName);
	switch($error) {
		case -1:
			//prompt_multilogin();
			//printInfo("�Ѿ������ϣ�");
			//return;
		case 0:
		case 2:
			//normal
			break;
		case 3:
			printInfo("���ʺ���ͣ�������ڽ���");
			return;
		case 5:
			printInfo("��¼����Ƶ��");
			return;
		case 1:
			printInfo("�Բ���ϵͳæµ�����Ժ��ٳ��Ե�¼");
			return;
		default:
			printInfo("��¼���󣬴���ţ�" . $error);
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
	
	printInfo("��¼�ɹ���");
}

	
	
function mobile_test()
{


}

?>
