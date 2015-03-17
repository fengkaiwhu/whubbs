<?php
require("inc/funcs.php");
require("inc/user.inc.php");
require("inc/board.inc.php");
require("inc/conn.php");

global $boardArr;
global $boardID;
global $boardName;
global $page;
global $isGroup;

preprocess();


function preprocess(){
	global $boardID;
	global $boardName;
	global $currentuser;
	global $boardArr;
	global $page;
	global $isGroup;
	if (!isset($_GET['name'])) {
		foundErr("δָ�����档");
	}
	$boardName=$_GET['name'];
	$brdArr=array();
	$boardID= bbs_getboard($boardName, $brdArr);
	$boardArr=$brdArr;
	$boardName=$brdArr['NAME'];
	if ($boardID==0) {
		foundErr("ָ���İ��治����");
	}
	$usernum = $currentuser["index"];
	if (bbs_checkreadperm($usernum, $boardID) == 0) {
		foundErr("����Ȩ�Ķ�����");
	}
	if (!isset($_GET['page'])) {
		$page=-1;
	} else {
		$page=intval($_GET['page']);
	}
	$isGroup = ($boardArr['FLAG'] & BBS_BOARD_GROUP );
	
	bbs_set_onboard($boardID,1);
	$boardID= bbs_getboard($boardName, $brdArr);/*add by zhaiwx2010.2.27 �����˼�¼�����������ظ���¼������*/
	$boardArr=$brdArr;
	return true;
}


?>
<script src="inc/_loadThread.js"></script>
<TABLE width=100% border=1>
<?php
		showBoardContents($boardID,$boardName,$page);
function showBoardContents($boardID,$boardName,$page){
	include("inc/whuacc.php");
	$total = bbs_getThreadNum($boardID);
	if ($total<=0) {
?>
<tr><td class=TableBody2 align="center" colspan="5">
	���滹û������
</td></tr>
</table>
<?php
	} else {
?>
<Th>���</th>
<Th>ID</th>
<Th>����</Th>
<Th>����ʱ��</Th>
<Th>�ظ�</Th>
<Th>����</Th>
<Th>�ظ�����</Th>
<Th>�ظ�</Th></TR>
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

		$articles = bbs_getthreads($boardName, 1, $total, 1);
		$articleNum=count($articles);
		

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
			$num = bbs_get_threads_from_gid($boardID, $origin['ID'], $origin['ID'] , $rearticles , $haveprev );
?>
<tr>
	<td><?php echo $i; ?></td><td><?php echo $origin['ID']; ?></td><td><?php echo $origin['OWNER']; ?></td><td><?php echo strftime("%Y-%m-%d %H:%M:%S", $origin['POSTTIME']); ?></td>
	<td><?php echo addslashes(htmlspecialchars($origin['TITLE'],ENT_QUOTES)); ?><td><a target =_blank href='<?php echo 'http://bbs.whu.edu.cn/wForum/disparticle.php?boardName='.$boardName.'&ID='.$origin['ID']; ?>'>����</a></td></td><td><?php echo $threadNum; ?></td>
	
	<td><?php showTreeItem($rearticles);?></td><td>
	
</tr>
<?php
		}
	}
}

function showTreeItem($rearticle){
		include("inc/whuacc.php");  //�����ʺ� wudi 2011-5-20
	echo '<div>';
	if ($rearticle == null) {
		echo ' ... <span style="color:red">���и���</span> ...';
	} else {
		for($i=0;$i<count($rearticle);$i++){
			if(isset($accwhu[$rearticle[$i]['OWNER']])){
				$rearticle[$i]['OWNER']=$accwhu[$rearticle[$i]['OWNER']];
			}
			$x = mb_strlen($rearticle[$i]['OWNER'],'gb2312');
			$y = strlen($rearticle[$i]['OWNER']);
			if ($x!=$y){
				echo '<td>['.$rearticle[$i]['OWNER']."(".strftime("%Y-%m-%d %H:%M:%S", $rearticle[$i]['POSTTIME']).")]</td>";
			}
		}
	}
	echo '</div>';
}
?>
</table>
