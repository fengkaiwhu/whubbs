<?php
include_once('jwork/Data.php');
$data = new Data();

if($_GET['id'])
	$sql="select * from talk where id>".$_GET['id']." order by id desc ";
else 
	$sql="select * from talk order by id desc";
$array=$data->sqlArray($sql);
while (list($rid,$row)=each($array)) {
?>
<p id=<?php echo $row['id']; ?>><strong>[<?php echo $row['user']; ?>]</strong>
  <?php echo $row['content']; ?></p>
<p><a class="green"><?php echo $row['time'];?></a></p>
<div class="bg"></div>
<?php
}
?>