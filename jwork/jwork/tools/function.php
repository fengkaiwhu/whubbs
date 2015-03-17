<?php

/**
 * 返回上个页面的网址
 *
 * @return 上页网址
 */
function refer()
{
 return $_SERVER["HTTP_REFERER"];	
}

 /**
  * Enter description here...
  *js，弹出返回
  * @param unknown_type $string
  * @param unknown_type $url
  */
 function jsurl($string,$url)
 {
 	echo "<script language=javascript>alert('$string');location.href('$url');</script>";
 	
 }
 
 /**
  * 提示及后退
  *
  * @param unknown_type $string
  * @param unknown_type $i
  */
 function jsgo($string,$i=-1)
 {
 		echo "<script language=javascript>alert('$string');history.go($i);</script>"; 	
 }
 
 /**
  * 提供信息前一部分字符
  *
  * @param 原字符 $str
  * @param 取得长度 $len
  * @param 开始位置 $start
  * @return 字符类型
  */
 function jsubstring($str, $len,$start=0) {
    $tmpstr = "";
    $strlen = $start + $len;
    for($i = 0; $i < $strlen; $i++) {
        if(ord(substr($str, $i, 1)) > 0xa0) {
            $tmpstr .= substr($str, $i, 2);
            $i++;
        } else
            $tmpstr .= substr($str, $i, 1);
    }
    return $tmpstr;
}

?>