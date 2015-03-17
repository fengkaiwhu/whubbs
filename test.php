<?php
require("www2-funcs.php");
require("www2-board.php");

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


?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script src="static/www2-main.js"></script>
<script type="text/javascript">writeCssMainpage();</script>
<link rel="stylesheet" type="text/css" href="wForum/css/ansi.css"/>
<link rel="stylesheet" type="text/css" href="wForum/css/common.css"/>
<link rel="stylesheet" type="text/css" href="static/randomad.css"/>
</head>
<body leftmargin="5" topmargin="0" marginwidth="0" marginheight="0">




	<?php
	//gen_system_vote_html();
	//gen_new_boards_html();
	gen_announce_html();


?>


<br>
</body>
</html>
