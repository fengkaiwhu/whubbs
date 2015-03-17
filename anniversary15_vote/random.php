  <?php

	//foreach($_COOKIE as $key=>$value)
	  $userid = $_COOKIE['UTMPUSERID'];
	  echo"<br><br><br>";
	  $flag =false;
	  $browseuser=array('zhaiwx1987','serenavon','kky','SYSOP','Katze','zhaoqf8829','zhangghost','tedy','sumiyixin');
	  foreach($browseuser as $user){
	  	  if($user == $userid) $flag = true;
	  }
	  if(!$flag){
		  echo "you have no such right!<br>";
	  	  exit;
	  }

	//connect server
	$select = mysql_connect('localhost','whubbs','bbswebwhu')
		or die ('connect failed:'.mysql_error());
	//select database
	if(mysql_select_db('vote',$select))
	{
	#	echo "select database success! <br>";
	}
	else
	{
		echo "'select database failed:'.mysql_error() <br>";
	}
	$array = mysql_query("SELECT user from vote")
		or die ("<br> table vote doesn't exist,select failed!".mysql_error() );
	$num = mysql_num_rows($array);

	echo "num = $num <br>";

	for($j=0;$j<$num;$j++)
	{
	
		$a = mysql_fetch_array($array);
		$users[$j] = $a[0];
	#	echo "$users[$j] <br>";
	}

	$i = 0;
	while($i < 10)
	{
		$x = mt_rand(0,$num);
	#	echo "x$i = $x <br>";
		while(strcmp($users[$x],"-1") == 0)
			$x = mt_rand(0,$num);	
		$ph = mysql_query("SELECT phone from vote where user='$users[$x]'")
			or die ("<br> table vote doesn't exist,select failed!".mysql_error() );
		$phone_num = mysql_fetch_array($ph);
		echo "$users[$x] : ";
		echo "$phone_num[0] <br>";
		$users[$x] = "-1";
		$i = $i + 1;
	}

	mysql_close($select);
?>
