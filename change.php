<?php
 $tpye = $_POST['tpye'];
 if ($tpye=='single'&&file_exists('index_single.html'))
	{	
	rename('index.html','index_multiple.html');
	rename('index_single.html','index.html');
	echo "成功修改为单进站模式！";
	}else if($tpye=='multiple'&&file_exists('index_multiple.html'))
	{
	rename('index.html','index_single.html');
	rename('index_multiple.html','index.html');
	echo "成功修改为多进站模式！";
	}
	?>
