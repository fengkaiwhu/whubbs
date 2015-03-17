<?php


function stemcn($mydata)
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

    // segment
    while ($res = $cws->get_result())
    {
        foreach ($res as $tmp)
        {
                echo $tmp['word'];
echo ",";
        }
    }
}

?>