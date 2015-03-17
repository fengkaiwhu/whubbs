<?php
require("inc/funcs.php");


	$boardName='test';
	$brdArr=array();
	$boardID= bbs_getboard($boardName, $brdArr);
	$boardArr=$brdArr;
	$boardName=$brdArr['NAME'];

	   $total = bbs_getThreadNum($boardID);
		$articles = bbs_getthreads($boardName, 0, 10, 1);
		$articleNum=count($articles);
		echo "<table>";
		for($i=0;$i<$articleNum;$i++){
			$origin=$articles[$i]['origin'];
			$lastreply=$articles[$i]['lastreply'];
			$threadNum=$articles[$i]['articlenum']-1;
			$title =$articles[$i]["TITLE"];
			echo "<tr><td>".$articles[$i]['origin']['TITLE']."</td></tr>";
		  }
         echo "</table>";

?>

