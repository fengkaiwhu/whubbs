<?php


function stemcn($mydata,$limit=1000)
{
dl("scws.so");

$cws = scws_new();
$cws->set_charset('gbk');
$cws->set_rule('/usr/local/scws/etc/rules.ini');
$cws->set_dict('/usr/local/scws/etc/dict.xdb');

//
// use default dictionary & rules
//

$cws->set_ignore(true);

$cws->send_text($mydata);
$list = $cws->get_tops($limit, $xattr);
settype($list, 'array');

$result=array();
$i=0;
    // segment
        foreach ($list as $tmp)
        {		
                $result[$i][1]=$tmp['word'];
                $result[$i][2]=$tmp['times'];
				print($i." ".$tmp['word']."---");flush();
				$i++;
        }
					print('-----!!#-'.count($result));flush();
return  $result;
}
?>