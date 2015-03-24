<?php
require("inc/funcs.php");
require("inc/user.inc.php");
require("inc/board.inc.php");
require("inc/conn.php");
require("../new_add_file.php");

global $boardArr;
global $boardID;
global $boardName;
global $page;
global $isGroup = 0;

preprocess();

setStat($isGroup ? "版面列表" : "文章列表");

//show_nav($boardName, false, $isGroup ? "" : getBoardRSS($boardName));

//showUserMailBoxOrBR();
//board_head_var($boardArr['DESC'],$boardName,$boardArr['SECNUM']);//显示路径及服务器时间
?>

//<table cellSpacing=0 cellPadding=0 width=97% border=0 align=center>
//<?php
//	showAnnounce(); 
//?>
//</table>

<script src="inc/loadThread.js"></script>
<?php
	if ($isGroup) {
		showSecs(get_secname_index($boardArr['SECNUM']),$boardID,true);
	} else {
	
		<div class="usermailcontainer">
  <table class="table" align="center" >
        <tbody>
            <tr class="success">
                <th height="25" width="100%" align="left" id="TableTitleLink" style="font-weight: normal">本版当前共有<b><?php echo $boardArr['CURRENTUSERS'];?></b>人在线。今日帖子<?php 
	$ff = bbs_get_today_article_num($boardArr['NAME'] ); echo ($ff < 0) ? 0 : $ff; ?>。
              
                
               [<a href="favboard.php?bname=<?php echo $boardArr["NAME"]; ?>" title="收藏本版面到收藏夹顶层目录"> 收藏本版</a>]
               &nbsp;[<a href="doclear.php?boardName=<?php echo $boardArr["NAME"]; ?>" title="将本版所有文章标记成已读">清除未读</a>]
                    //<span id="onboard_users"></span></th>
            </tr>
        </tbody>
   </table>
   
<!--*********************发帖及显示版主*********************************************-->
    <div class="topicListcontainer">
    <table class="table listtable">
        <tbody>
            <tr class="active">
                <td width="110px">
                    <a href="postarticle.php?board=<?php echo $boardArr["NAME"]; ?>">
                        <div class="buttonClass1"  title="发新帖">
                        </div>
                    </a>
                </td>
                <td align="right">
                    <img src="img/pic/team2.gif" align="absmiddle">
                    <?php 
		$bms=split(' ',$boardArr['BM']);
			foreach($bms as $bm) {
		?>
		<a href="dispuser.php?id=<?php echo $bm; ?>" target=_blank title="点击查看该版主资料"><?php echo $bm; ?></a>
		<?php
			}
		?>
                 </td>
            </tr>

        </tbody>
    </table>
<!--*********************发帖及显示版主结束*********************************************-->

<!--**********************************************帖子列表*********************************-->
    
    <div id="v6_pl_content_myfavoriteslist">
            <div>
                <div class="WB_feed">
              
               
         
                    <!--1-->
                    <div class="WB_cardwrap WB_feed_type S_bg2">
                        <div class="WB_feed_detail clearfix">
                           
                            <div class="WB_face W_fl">
                                <div class="face">
                                    <a target="_blank" class="W_face_radius" href="" title="Eexpert">
                                        <img title="srender 晨旭" alt="" width="50" height="50" src="./img/userface/image123.gif" class="W_face_radius"></a>//显示发帖人的头像
                                </div>
                            </div>
                            <div class="WB_detail">
                                <div class="WB_info">
                                    <a target="_blank" class="W_f14 W_fb S_txt1" title="Eexpert" href="./dispuser.php">Eexpert</a>//显示发帖人名称
                                    <a  target="_blank" href="">
                                      <span class="W_icon_level icon_level_c3">
                                            <span class="txt_out">
                                            <span class="txt_in">
                                                  <span title="山水等级">//显示用户对应的山水身份
                                                  版主
                                                  </span>
                                            </span>
                                            </span>
                                       </span>
                                    </a>
                                </div>

                                <div class="WB_text W_f14">
                                <a href="./disparticle.php">//显示帖子的标题
                                 年终了，大家评评哪个武大哪个食堂最差？哪个食堂最好？
                                </a>        
                                 </div>
                                <div class="WB_tag clearfix S_txt2">
                                    <span class="W_fr">
                                    发布于 2014.02.10
                                    &nbsp;
                                    <a href="">
                                        [版面名称]
                                    </a>
                                    </span>
                                </div>                            
                            </div>
                        </div>
                        <div class="WB_feed_handle">
                            <div class="WB_handle">
                                <ul class="WB_row_line WB_row_r4 clearfix S_line2">
                                    <li>
                                        <a class="S_txt2" href="javascript:void(0);"><span class="pos"><span class="line S_line1">//回复帖子功能，可以显示已经有的回复的数量
                                            回复
                                        </span></span></a>
                                    </li>
                                    <li>
                                        <a class="S_txt2" href="javascript:void(0);">//对应收藏帖子功能，尚未开发
                                            <span class="pos">
                                                <span class="line S_line1">收藏
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                 </ul>
                            </div>
                            <div class="WB_feed_repeat S_bg1" style="display: none;"></div>
                        </div>
                    </div>
                    <!--1 end-->


                </div>
            </div>
        </div>

    </div>

    <!--Pager-->
  <div id="wrapper">
        
            <div id="skyblue" style="margin: auto;">
            </div>
        </div>
    <!--Pager End-->


<!--***************************************帖子列表结束*******************************************************-->
		showBoardStaticsTop($boardArr, bbs_is_bm($boardID, $currentuser["index"]));//用来显示本版在线人数以及今日新帖数目
?>
<TABLE cellPadding=1 cellSpacing=1 class=TableBorder1 align=center>
<?php
		showBroadcast($boardID,$boardName);
		showBoardContents($boardID,$boardName,$page);
		boardSearchAndJump($boardName, $boardID);
		showBoardSampleIcons();
?>
</table>
<?php
		if (ONBOARD_USERS) {
?>
<script language="JavaScript" src="board_online.php?board=<?php echo $boardArr["NAME"]; ?>&amp;js=1"></script> 
<?php
		}
	}
//show_footer();

function preprocess(){
	global $boardID;
	global $boardName;
	global $currentuser;
	global $boardArr;
	global $page;
	global $isGroup;
	if (!isset($_GET['name'])) {
		foundErr("未指定版面。");
	}
	$boardName=$_GET['name'];
	$brdArr=array();
	$boardID= bbs_getboard($boardName, $brdArr);
	$boardArr=$brdArr;
	$boardName=$brdArr['NAME'];
	if ($boardID==0) {
		foundErr("指定的版面不存在");
	}
	$usernum = $currentuser["index"];
	if (bbs_checkreadperm($usernum, $boardID) == 0) {
		foundErr("您无权阅读本版");
	}
	if (!isset($_GET['page'])) {
		$page=-1;
	} else {
		$page=intval($_GET['page']);
	}
	$isGroup = ($boardArr['FLAG'] & BBS_BOARD_GROUP );
	
	bbs_set_onboard($boardID,1);
	$boardID= bbs_getboard($boardName, $brdArr);/*add by zhaiwx2010.2.27 修正了记录在线人数，重复记录的问题*/
	$boardArr=$brdArr;
	return true;
}


function showBoardContents($boardID,$boardName,$page){
	$total = bbs_getThreadNum($boardID);
	if ($total<=0) {
?>
<tr><td class=TableBody2 align="center" colspan="5">
	本版还没有文章
</td></tr>
</table>
<?php
	} else {
?>
<Th height=25 width=32>状态</th>
<Th width=*>主 题  (点<img src=pic/plus.gif align=absmiddle>即可展开贴子列表)</Th>
<Th width=80>作 者</Th>
<Th width=64>回复</Th>
<Th width=200>最后更新 | 回复人</Th></TR>
<?php
		
		$totalPages=ceil($total/ARTICLESPERPAGE);
		if (($page>$totalPages)) {
			$page=$totalPages;
		} else if ($page<1) {
			$page=1;
		}
	/*
		$start=$total-$page* ARTICLESPERPAGE+1;
		$num=ARTICLESPERPAGE;
		if ($start<=0) {
			$num+=$start-1;
			$start=1;
		}
    */
		$start=($page-1)* ARTICLESPERPAGE;
		$num=ARTICLESPERPAGE;

		$articles = bbs_getthreads($boardName, $start, $num, 1);
		$articleNum=count($articles);
?>
<script language="JavaScript">
<!--
	boardName = '<?php echo $boardName; ?>';
<?php
		include("inc/whuacc.php");  //部门帐号 wudi 2011-5-20

		for($i=0;$i<$articleNum;$i++){
			$origin=$articles[$i]['origin'];
			$lastreply=$articles[$i]['lastreply'];
			if(isset($accwhu[$origin['OWNER']])){
				$origin['OWNER']=$accwhu[$origin['OWNER']];
			}
			if(isset($accwhu[$lastreply['OWNER']])){
				$lastreply['OWNER']=$accwhu[$lastreply['OWNER']];
			}
			$threadNum=$articles[$i]['articlenum']-1;
?>
	origin = new Post(<?php echo $origin['ID']; ?>, '<?php echo $origin['OWNER']; ?>', '<?php echo strftime("%Y-%m-%d %H:%M:%S", $origin['POSTTIME']); ?>', '<?php echo $origin['FLAGS'][0]; ?>');
	lastreply = new Post(<?php echo $lastreply['ID']; ?>, '<?php echo $lastreply['OWNER']; ?>', '<?php echo strftime("%Y-%m-%d %H:%M:%S", $lastreply['POSTTIME']); ?>', '<?php echo $lastreply['FLAGS'][0]; ?>');
	writepost(<?php echo $i+$start; ?>, '<?php echo addslashes(htmlspecialchars($origin['TITLE'],ENT_QUOTES)); ?> ', <?php echo $threadNum; ?>, origin, lastreply, <?php echo ($origin['GROUPID'] == $lastreply['GROUPID'])?1:0; ?>, <?php echo ($origin['ATTACHPOS']>0)?1:0; ?>);
<?php
		}
?>
//-->
</script>
</table>
<form method=get action="board.php">
<input type="hidden" name="name" value="<?php echo $boardName ; ?>">
<table border=0 cellpadding=0 cellspacing=3 width=97% align=center >
<tr><td valign=middle>页次：<b><?php echo $page; ?></b>/<b><?php echo $totalPages; ?></b>页 每页<b><?php echo ARTICLESPERPAGE; ?></b> 主题数<b><?php echo $total ?></b></td><td valign=middle ><div align=right >分页：
<?php
    showPageJumpers($page, $totalPages, "board.php?name=".$boardName."&amp;page=");
?>
转到:<input type=text name="page" size=3 maxlength=10  value=1><input type=submit value=Go ></div></td></tr>
</table></form>
<?php
	}
}
?>
