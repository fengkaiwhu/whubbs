<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-22 21:59:21
         compiled from "./templates/board.php" */ ?>
<?php /*%%SmartyHeaderCode:64669594549823b9b97b70-03826283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '189994a0c01e2630c0d465b9168076b421b13fb1' => 
    array (
      0 => './templates/board.php',
      1 => 1419256720,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64669594549823b9b97b70-03826283',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_549823b9bf9782_37183377',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549823b9bf9782_37183377')) {function content_549823b9bf9782_37183377($_smarty_tpl) {?><?php echo '<?php'; ?>

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

setStat($isGroup ? "�����б�" : "�����б�");

show_nav($boardName, false, $isGroup ? "" : getBoardRSS($boardName));

showUserMailBoxOrBR();
board_head_var($boardArr['DESC'],$boardName,$boardArr['SECNUM']);
<?php echo '?>'; ?>

<table cellSpacing=0 cellPadding=0 width=97% border=0 align=center>
<?php echo '<?php'; ?>

	showAnnounce(); 
<?php echo '?>'; ?>

</table>
<?php echo '<script'; ?>
 src="inc/loadThread.js"><?php echo '</script'; ?>
>
<?php echo '<?php'; ?>

	if ($isGroup) {
		showSecs(get_secname_index($boardArr['SECNUM']),$boardID,true);
	} else {
		showBoardStaticsTop($boardArr, bbs_is_bm($boardID, $currentuser["index"]));
<?php echo '?>'; ?>

<TABLE cellPadding=1 cellSpacing=1 class=TableBorder1 align=center>
<?php echo '<?php'; ?>

		showBroadcast($boardID,$boardName);
		showBoardContents($boardID,$boardName,$page);
		boardSearchAndJump($boardName, $boardID);
		showBoardSampleIcons();
<?php echo '?>'; ?>

</table>
<?php echo '<?php'; ?>

		if (ONBOARD_USERS) {
<?php echo '?>'; ?>

<?php echo '<script'; ?>
 language="JavaScript" src="board_online.php?board=<?php echo '<?php'; ?>
 echo $boardArr["NAME"]; <?php echo '?>'; ?>
&amp;js=1"><?php echo '</script'; ?>
> 
<?php echo '<?php'; ?>

		}
	}
show_footer();

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


function showBoardContents($boardID,$boardName,$page){
	$total = bbs_getThreadNum($boardID);
	if ($total<=0) {
<?php echo '?>'; ?>

<tr><td class=TableBody2 align="center" colspan="5">
	���滹û������
</td></tr>
</table>
<?php echo '<?php'; ?>

	} else {
<?php echo '?>'; ?>

<Th height=25 width=32>״̬</th>
<Th width=*>�� ��  (��<img src=pic/plus.gif align=absmiddle>����չ�������б�)</Th>
<Th width=80>�� ��</Th>
<Th width=64>�ظ�</Th>
<Th width=200>������ | �ظ���</Th></TR>
<?php echo '<?php'; ?>

		
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
<?php echo '?>'; ?>

<?php echo '<script'; ?>
 language="JavaScript">
<!--
	boardName = '<?php echo '<?php'; ?>
 echo $boardName; <?php echo '?>'; ?>
';
<?php echo '<?php'; ?>

		include("inc/whuacc.php");  //�����ʺ� wudi 2011-5-20

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
<?php echo '?>'; ?>

	origin = new Post(<?php echo '<?php'; ?>
 echo $origin['ID']; <?php echo '?>'; ?>
, '<?php echo '<?php'; ?>
 echo $origin['OWNER']; <?php echo '?>'; ?>
', '<?php echo '<?php'; ?>
 echo strftime("%Y-%m-%d %H:%M:%S", $origin['POSTTIME']); <?php echo '?>'; ?>
', '<?php echo '<?php'; ?>
 echo $origin['FLAGS'][0]; <?php echo '?>'; ?>
');
	lastreply = new Post(<?php echo '<?php'; ?>
 echo $lastreply['ID']; <?php echo '?>'; ?>
, '<?php echo '<?php'; ?>
 echo $lastreply['OWNER']; <?php echo '?>'; ?>
', '<?php echo '<?php'; ?>
 echo strftime("%Y-%m-%d %H:%M:%S", $lastreply['POSTTIME']); <?php echo '?>'; ?>
', '<?php echo '<?php'; ?>
 echo $lastreply['FLAGS'][0]; <?php echo '?>'; ?>
');
	writepost(<?php echo '<?php'; ?>
 echo $i+$start; <?php echo '?>'; ?>
, '<?php echo '<?php'; ?>
 echo addslashes(htmlspecialchars($origin['TITLE'],ENT_QUOTES)); <?php echo '?>'; ?>
 ', <?php echo '<?php'; ?>
 echo $threadNum; <?php echo '?>'; ?>
, origin, lastreply, <?php echo '<?php'; ?>
 echo ($origin['GROUPID'] == $lastreply['GROUPID'])?1:0; <?php echo '?>'; ?>
, <?php echo '<?php'; ?>
 echo ($origin['ATTACHPOS']>0)?1:0; <?php echo '?>'; ?>
);
<?php echo '<?php'; ?>

		}
<?php echo '?>'; ?>

//-->
<?php echo '</script'; ?>
>
</table>
<form method=get action="board.php">
<input type="hidden" name="name" value="<?php echo '<?php'; ?>
 echo $boardName ; <?php echo '?>'; ?>
">
<table border=0 cellpadding=0 cellspacing=3 width=97% align=center >
<tr><td valign=middle>ҳ�Σ�<b><?php echo '<?php'; ?>
 echo $page; <?php echo '?>'; ?>
</b>/<b><?php echo '<?php'; ?>
 echo $totalPages; <?php echo '?>'; ?>
</b>ҳ ÿҳ<b><?php echo '<?php'; ?>
 echo ARTICLESPERPAGE; <?php echo '?>'; ?>
</b> ������<b><?php echo '<?php'; ?>
 echo $total <?php echo '?>'; ?>
</b></td><td valign=middle ><div align=right >��ҳ��
<?php echo '<?php'; ?>

    showPageJumpers($page, $totalPages, "board.php?name=".$boardName."&amp;page=");
<?php echo '?>'; ?>

ת��:<input type=text name="page" size=3 maxlength=10  value=1><input type=submit value=Go ></div></td></tr>
</table></form>
<?php echo '<?php'; ?>

	}
}
<?php echo '?>'; ?>

<?php }} ?>
