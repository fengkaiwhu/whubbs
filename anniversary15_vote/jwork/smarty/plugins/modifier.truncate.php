<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty truncate modifier plugin
 *
 * Type:     modifier<br>
 * Name:     truncate<br>
 * Purpose:  Truncate a string to a certain length if necessary,
 *           optionally splitting in the middle of a word, and
 *           appending the $etc string or inserting $etc into the middle.
 * @link http://smarty.php.net/manual/en/language.modifier.truncate.php
 *          truncate (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @param boolean
 * @return string
 */
function smarty_modifier_truncate($string, $length = 80, $pad = '')
 {
    
 	if(empty($pad))
 	 $str=left($string,$length);
 	else 
 	{
 		 $str=left($string,$length);
 		 if(strlen($str)<strlen($string))
 		 $str.=$pad;
 	
 	}
 	return $str;
 }

function left($string, $len) {
		$tmpstr = "";
		$strlen = strlen($string);
		$templen=0;
		if($len>$strlen/2)
		$strlen=$strlen;
		else
		$strlen=$len*2;

		for($i =0; $i < $strlen; $i++) {
			if(ord(substr($string, $i, 1)) > 0xa0) {
				$tmpstr .= substr($string, $i, 2);
				$i++;
			} else
			$tmpstr .= substr($string, $i, 1);
			$templen++;
			if($templen==$len)
			break;
		}
		return $tmpstr;
	}

/* vim: set expandtab: */

?>
