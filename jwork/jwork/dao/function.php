<?php

/**
 * �����ϸ�ҳ�����ַ
 *
 * @return ��ҳ��ַ
 */
function refer()
{
 return $_SERVER["HTTP_REFERER"];	
}

 /**
  * Enter description here...
  *js����������
  * @param unknown_type $string
  * @param unknown_type $url
  */
 function jsurl($string,$url)
 {
 	echo "<script language=javascript>alert('$string');location.href('$url');</script>";
 	
 }
 
 /**
  * ��ʾ������
  *
  * @param unknown_type $string
  * @param unknown_type $i
  */
 function jsgo($string,$i=-1)
 {
 		echo "<script language=javascript>alert('$string');history.go($i);</script>"; 	
 }
 
 /**
  * �ṩ��Ϣǰһ�����ַ�
  *
  * @param ԭ�ַ� $str
  * @param ȡ�ó��� $len
  * @param ��ʼλ�� $start
  * @return �ַ�����
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