<?php 
require_once "xml.php";

$test = new JworkXmlParser(); 
$test->parse("news.xml"); 
$dom = $test->getJworkXml();
echo "<pre>";
echo "<hr><font color=red>"; 
echo "������ͨ������getSaveData()���ص�����xml���ݵ�����"; 
echo "</font><hr>"; 
print_r($dom->getSaveData());
echo "<hr><font color=red>"; 
echo "������ͨ��setValue()�������������ڵ������Ϣ����Ӻ���ʾ�����xml�ļ�������"; 
echo "</font><hr>"; 
$dom->setValue("telphone", "123456789"); 
$dom->setValue("leaveword", array("value"=>"�����Ʒ����", "attrs"=>array("author"=>"hahawen", "date"=>date('Y-m-d'))));
echo htmlspecialchars($dom->getSaveXml());

?> 
