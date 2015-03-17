<h2>网友讨论</h2>
<?php
include_once('jwork/Data.php');
$data = new Data();
if($_GET['id'])
	$sql="select * from comment where id>".$_GET['id']." order by id desc ";
else 
	$sql="select * from comment order by id desc";
$array=$data->sqlArray($sql);
while (list($rid,$row)=each($array)) {
?>

    <p class="green"><?php echo $row['user']; ?></p>
    <p><?php echo $row['content']; ?></p>
    <p class="green">[<?php echo $row['time']; ?>]</p>
    <div class="bg"></div>
<?php } ?>
<?php
$sql="select max(id) from comment order by id desc limit 20"; 
$count=$data->sqlValue($sql);
echo "<script>comment=$count;</script>"
?>