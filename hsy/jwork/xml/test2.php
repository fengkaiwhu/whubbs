<?php
require_once "xml.php";

$test = new JworkXmlParser(); 
$test->parse("test.xml"); 
$dom = $test->getJworkXml();
print_r($dom->getSaveXml());
echo "<hr><font color=red>"; 
echo "������ͨ��getNode()����������ĳһ�������µ�������Ʒ����Ϣ"; 
echo "</font><hr>"; 
$obj = $dom->getNode("cat_food"); 
$nodeList = $obj->getNode(); 
foreach($nodeList as $node){ 
    $data = $node->getValue(); 
    echo "<font color=red>��Ʒ����".$data[name]."</font><br>"; 
    print_R($data); 
    print_R($node->getAttribute()); 
}
echo "<hr><font color=red>"; 
echo "������ͨ��findNodeByPath()����������ĳһ��Ʒ����Ϣ"; 
echo "</font><hr>"; 
$obj = $dom->findNodeByPath("cat_food|goods_food11"); 
if(!is_object($obj)){ 
    echo "����Ʒ������"; 
}else{ 
    $data = $obj->getValue(); 
    echo "<font color=red>��Ʒ����".$data[name]."</font><br>"; 
    print_R($data); 
    print_R($obj->getAttribute()); 
}
echo "<hr><font color=red>"; 
echo "������ͨ��setValue()����������Ʒ\"food11\"�������, Ȼ����ʾ��Ӻ�Ľ��"; 
echo "</font><hr>"; 
$obj = $dom->findNodeByPath("cat_food|goods_food11"); 
$obj->setValue("leaveword", array("value"=>"�����Ʒ����", "attrs"=>array("author"=>"hahawen", "date"=>date('Y-m-d')))); 
echo htmlspecialchars($dom->getSaveXml());
echo "<hr><font color=red>"; 
echo "������ͨ��removeValue()/removeAttribute()����������Ʒ\"food11\"�ı��ɾ������, Ȼ����ʾ������Ľ��"; 
echo "</font><hr>"; 
$obj = $dom->findNodeByPath("cat_food|goods_food12"); 
$obj->setValue("name", "new food12"); 
$obj->removeValue("desc"); 
echo htmlspecialchars($dom->getSaveXml());
echo "<hr><font color=red>"; 
echo "������ͨ��createNode()�����������Ʒ, Ȼ����ʾ��Ӻ�Ľ��"; 
echo "</font><hr>"; 
$obj = $dom->findNodeByPath("cat_food"); 
$newObj = $obj->createNode("goods", array("id"=>"food13")); 
$newObj->setValue("name", "food13"); 
$newObj->setValue("price", 100); 
echo htmlspecialchars($dom->getSaveXml());
echo "<hr><font color=red>"; 
echo "������ͨ��removeNode()������ɾ����Ʒ, Ȼ����ʾɾ����Ľ��"; 
echo "</font><hr>"; 
$obj = $dom->findNodeByPath("cat_food"); 
$obj->removeNode("goods_food12"); 
echo htmlspecialchars($dom->getSaveXml());

?>