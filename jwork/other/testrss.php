<?php
include("rss2_maker.php");
 //---添加一条记录到rss文档中，至少需要一个参数，title或description
 $rss2gen->addItem("item1", "item1's description", "http://www.exblog.org/?play=1", 
       "elliott", "默认分类", "描述呀描述。", "支持和该项（item）有关的媒体对象",
       "唯一与该项（item）联系在一起的永久性链接", "2005-03-12",
       "该项（item）来自哪个RSS 频道，当把项（item）聚合在一起时非常有用");
 $rss2gen->addItem("item2", "item2's description");
 $rss2gen->addItem("item3");
 $rss2gen->addItem("中国");
 
$rss2gen->builder();
 //兼容老版本中方法
//$rss2gen->buildRssFeed();

?>