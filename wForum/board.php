<?php
require("inc/funcs.php");
require("inc/user.inc.php");
require("inc/board.inc.php");
require("inc/conn.php");
require("../new_add_file.php");

<script type="text/javascript" src="../js/smartpaginator.js"></script>
<link href="../css/smartpaginator.css" rel="stylesheet" type="text/css" />

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
?>	
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
                    <img src="../img/pic/team2.gif" align="absmiddle">
                    <?php 
		$bms=split(' ',$boardArr['BM']);
			foreach($bms as $bm) {
		?>
		<a href="dispuser.php?id=<?php echo $bm; ?>" title="点击查看该版主资料"><?php echo $bm; ?></a>
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
            <?php   
                $total = bbs_getThreadNum($boardID);
                if($total<=0) { ?>
                	<table><tr><td class=TableBody2 align="center" colspan="5">
	本版还没有文章
</td></tr>
</table>
<?php
	} else {
?>
<?php 
		$totalPages=ceil($total/ARTICLESPERPAGE);
		if (($page>$totalPages)) {
			$page=$totalPages;
		} else if ($page<1) {
			$page=1;
		}
		$start=($page-1)* ARTICLESPERPAGE;
		$num=ARTICLESPERPAGE;

		$articles = bbs_getthreads($boardName, $start, $num, 1);
		$articleNum=count($articles);
?>
<?php 
		include("inc/whuacc.php");//部门帐号
		for($i=0;$i<$articleNum;$i++){
			$origin=$articles[$i]['origin'];
			//$lastreply=$articles[$i]['lastreply'];
			if(isset($accwhu[$origin['OWNER']])){
				$origin['OWNER']=$accwhu[$origin['OWNER']];
			}
			if(isset($accwhu[$lastreply['OWNER']])){
				$lastreply['OWNER']=$accwhu[$lastreply['OWNER']];
			}
			$threadNum=$articles[$i]['articlenum']-1;//表示除了原帖之外回复帖子的数量
?> 
  	
                    <!--1-->
                    <div class="WB_cardwrap WB_feed_type S_bg2">
                        <div class="WB_feed_detail clearfix">
                           <?php $user=array();
                           	 $user_num = bbs_getuser($origin['OWNER'],$user);
                           	 if($user_num == 0)
                           	 	$user = false;
                           	 else if($origin['POSTTIME'] < $user['firstlogin'])
                           	 	$user = false;
                           	 if($user !== false){
                           	 	if ($user['userface_img'] == -1) {
						$user_pic = htmlEncode($user['userface_url']);
						$has_size = true;
					} else {
						$user_pic = 'userface/image'.$user['userface_img'].'.gif';
						$has_size = false;
					}
					//$str = "<img src=\"".$user_pic."\"";
                           	 }
                            ?>
                            <div class="WB_face W_fl">
                                <div class="face">
                                    <a  class="W_face_radius" href="./dispuser.php?id=<?php echo $origin['OWNER']; ?>"　 title="点击访问用户中心">
                                        <img title="点击访问用户中心" alt="" width="50" height="50" src="<?php echo $user_pic;?>" class="W_face_radius">
                                    </a>//显示发帖人的头像
                                </div>
                            </div>
                            <div class="WB_detail">
                                <div class="WB_info">
                                    <a  class="W_f14 W_fb S_txt1" title="点击访问用户中心" href="./dispuser.php?id=<?php echo $origin['OWNER']; ?>"> <?php echo $origin['OWNER']； ?> </a>//显示发帖人名称

                                      <span class="W_icon_level icon_level_c3">
                                            <span class="txt_out">
                                            <span class="txt_in">
                                                  <span title="用户身份">//显示用户对应的山水身份
                                                  <?php echo bbs_getuserlevel($origin['OWNER']); ?>
                                                  </span>
                                                  <?php //显示BBS年度评选称号
                                                  	include("inc/annu_Selection.php");
                                                  	if(isset($bbsSelect[$origin['OWNER']])){?>
                                                  	<span> <?php $select = "&nbsp;&nbsp;<font color='red'><b>".$bbsSelect[$origin['OWNER']]."</b></font>"; echo $select;?>
                                                  	</span>	
                                                  <?php	} ?>
                                                  
                                            </span>
                                            </span>
                                       </span>

                                </div>

                                <div class="WB_text W_f14">
                                <a href="./disparticle.php?boardName=<?php echo $boardName; ?>&ID=<?php echo $origin['ID']; ?>&pos=<?php $i+$start; ?>">//显示帖子的标题
                                 <?php echo addslashes(htmlspecialchars($origin['TITLE'],ENT_QUOTES)); ?>
                                </a>        
                                 </div>
                                <div class="WB_tag clearfix S_txt2">
                                    <span class="W_fr">
                                    发布于 <?php echo strftime("%Y-%m-%d %H:%M:%S", $origin['POSTTIME']); ?>
                                    &nbsp;
                                    <a href="./board.php?name=<?php echo $boardArr["NAME"]; ?>">
                                        [<?php echo htmlspecialchars($boardArr["DESC"]); ?>]
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
                                            回复(<?php echo (($origin['GROUPID'] == $lastreply['GROUPID'])?1:0)+$threadNum; ?>)
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
		<?php } //for循环结束
		?>

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
 <!-- search start 搜索当前版块文章标题含有某关键字的帖子列表-->
 <table class="table">
        <tbody>
            <tr>
                <form method="GET" action="queryresult.php">
                <input type="hidden" name="boardNames" value="<?php echo $boardArr["NAME"]; ?>">

                <td class="boardsearch">
                     
                     <div class="col-lg-6">
                        <div class="input-group">
                            
                              <input type="text" class="form-control" name="title" placeholder="搜索相关内容">
                              <span class="input-group-btn">
                                 <button class="btn btn-default" type="button">Go!</button>
                            </span>
                             </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                     
                     </div>
                </td>
                </form>

            </tr>
        </tbody>
    </table>

    <!-- search end-->
</div>


<script type="text/javascript">
        $(document).ready(function () {

          $('#skyblue').smartpaginator({ totalrecords: <?php echo $total; ?>, recordsperpage: <?php ARTICLESPERPAGE; ?>, length: 4, next: '下一页', prev: '前一页', first: '首页', last: '尾页', theme: 'skyblue', controlsalways: true, onchange: onPageChange
            });

        });
        function onPageChange(newPageValue){
		window.location.href="./board.php?name= <?php echo $boardArr["NAME"];?>&page=newPageValue";
        }
</script>

<?php
//		if (ONBOARD_USERS) {
?>
<!--
<script language="JavaScript" src="board_online.php?board=<?php echo $boardArr["NAME"]; ?>&amp;js=1"></script> 
-->
<?php
//		}
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
?>
