<?php
include("rss2_maker.php");
 //---���һ����¼��rss�ĵ��У�������Ҫһ��������title��description
 $rss2gen->addItem("item1", "item1's description", "http://www.exblog.org/?play=1", 
       "elliott", "Ĭ�Ϸ���", "����ѽ������", "֧�ֺ͸��item���йص�ý�����",
       "Ψһ����item����ϵ��һ�������������", "2005-03-12",
       "���item�������ĸ�RSS Ƶ���������item���ۺ���һ��ʱ�ǳ�����");
 $rss2gen->addItem("item2", "item2's description");
 $rss2gen->addItem("item3");
 $rss2gen->addItem("�й�");
 
$rss2gen->builder();
 //�����ϰ汾�з���
//$rss2gen->buildRssFeed();

?>