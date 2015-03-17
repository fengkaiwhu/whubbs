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

    <p  id=<?php echo $row['id']; ?> class="green"><b>[<?php echo $row['user']; ?>]</b>&nbsp;<?php echo $row['content']; ?></p>
    <p class="green">[<?php echo $row['time']; ?>]</p>
    <div class="bg"></div>
<?php } ?>