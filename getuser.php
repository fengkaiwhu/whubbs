<?php
require("www2-funcs.php");
require("www2-board.php");
require("www2-bmp.php");
login_init();
// require("inc/funcs.php");
// $u = bbs_getuser("davidxn");
// header('http-equiv="Content-Type" content="text/html; charset=UTF-8"');


// $boardID= bbs_getboard($boardName, $brdArr);
// if ($boardID==0) {
// 	foundErr("not exist");
// }
// $boardArr=$brdArr;


$userarray=array();
if (($user_num=bbs_getuser("bbdd08",$userarray))==0) {
	die("no found");
}
$user=$userarray;
print_r($user);
exit();

echo bbs_getuserlevel("bbdd08");
get_boards();
//版面
function get_boards(){
	for($i = 0; $i < BBS_SECNUM; $i++){
		get_sub_boards($i,0);
	}
}

function get_sub_boards( $g1,$g2 ){

	$yank = 0;
	if ($yank) $yank = 1;
	$boards = bbs_getboards(constant("BBS_SECCODE".$g1), $g2, $yank | 2);
	$brd_name = $boards["NAME"]; // 英文名
	$brd_desc = $boards["DESC"]; // 中文描述
	$brd_flag = $boards["FLAG"]; //flag
	$brd_bid = $boards["BID"]; //flag
	$brd_bm = $boards["BM"]; //flag
	$brd_num = sizeof($brd_name);

	for($j=0;$j<$brd_num;$j++){
		if ($brd_flag[$j]&BBS_BOARD_GROUP){
			get_sub_boards($g1,$brd_bid[$j]);
		}else{
			$bms=split(' ',$brd_bm[$j]);
			foreach($bms as $bm) {
				if( $bm == "bbdd08"){
					echo $brd_desc[$j];
					break;
				}

			}
		}
	}
}
?>