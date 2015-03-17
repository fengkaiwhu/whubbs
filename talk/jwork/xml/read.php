<?php 
require_once "xml.php";

$test = new JworkXmlParser(); 
$test->parse("news.xml"); 
$dom = $test->getJworkXml();
echo "<pre>";
echo "<hr><font color=red>"; 
echo "下面是通过函数getSaveData()返回的整个xml数据的数组"; 
echo "</font><hr>"; 
print_r($dom->getSaveData());
echo "<hr><font color=red>"; 
echo "下面是通过setValue()函数，给给根节点添加信息，添加后显示出结果xml文件的内容"; 
echo "</font><hr>"; 
$dom->setValue("telphone", "123456789"); 
$dom->setValue("leaveword", array("value"=>"这个商品不错", "attrs"=>array("author"=>"hahawen", "date"=>date('Y-m-d'))));
echo htmlspecialchars($dom->getSaveXml());

?> 
