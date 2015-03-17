<?php
class String
{

	/**
    * 字符串载取方法
    *
    * @param string $string
    * @param int $start
    * @param int $len
    * @return string
    */
	function substring($string,$start,$len) {
		$tempstr=self::ToArray($string);
		return implode("",array_slice($tempstr,$start,$len));
	}

	/**
    * 字符串左载取
    *
    * @param string $string
    * @param int $len
    * @return string
    */
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

	/**
    * 字符串右载取
    *
    * @param string $string
    * @param int $len
    * @return string
    */
	function right($string, $len) {
		$tempstr=self::ToArray($string);
		$strlen = count($tempstr);
		if($len>$strlen)
		$len=$strlen;
		return implode("",array_slice($tempstr,$strlen-$len));
	}

	
	/**
     * 字符串转数组
     *
     * @param string $string
     * @return Array
     */
	function ToArray($string)
	{
		$len=strlen($string);
		$array=array();
		for($i =0; $i < $len; $i++) {
			if(ord(substr($string, $i, 1)) > 0xa0) {
				$tmpstr= substr($string, $i, 2);
				$i++;
			} else
			$tmpstr= substr($string, $i, 1);
			$array[]=$tmpstr;

		}

		return $array;
	}
	
	
	/**
	 * html标签转化为普通的text
	 *
	 * @param  string $string
	 * @return string
	 */
	function htmlToText($string)
	{
		return htmlspecialchars($string);
	}
	
	
	/**
	 * 去掉html标签
	 *
	 * @param string $string
	 * @param string $allow
	 * @return string
	 */
	function htmlToEmpty($string,$allow)
	{
		return strip_tags($string,$allow);
	}
	
	
	/**
	 * 文本框内容转化为html
	 *
	 * @param string $string
	 * @return string
	 */
	function inputToHtml($string)
	{
		$string=str_replace("\n","<br>",$string);
		$string=str_replace(" ","&nbsp;",$string);
		return $string;
	}
	
	
	/**
	 * html内容转换为文本框
	 *
	 * @param string $string
	 * @return string
	 */
	function htmlToInput($string)
	{
		$string=str_replace("<br>","\n",$string);
		$string=str_replace("&nbsp;"," ",$string);
		return $string;
	}
	
	
	/**
	 * 字符串替换
	 *
	 * @param string $string
	 * @param string $old
	 * @param string $new
	 * @return string
	 */
	function replace($string,$old,$new)
	{
		return str_replace($old,$new,$string);
	}
	
	
	/**
	 * 返回$needle在$string的出现问题,出现>=0，无则为-1
	 *
	 * @param string $string
	 * @param string $needle
	 * @param int $offset
	 * @return int
	 */
	function indexOf($string,$needle,$offset=0)
	{
		$temp=strpos($string,$needle,$offset);	
		if($temp===0)		
		return 0;
		elseif($temp==false)
		return -1;
		else
		return $temp;
	}
	
	
	/**
	 * indexOf的别名
	 *
	 * @param string $string
	 * @param string $needle
	 * @param int $offset
	 * @return int
	 */
	function strpos($string,$needle,$offset=0)
	{
		return indexOf($string,$needle,$offset);
	}
    
	function trim($string)
	{
		return trim($string);
	}
	
	function explode($separator,$string,$limit=null)
	{
		return explode($separator,$string,$limit);
	}
	
	function implode($separator,$array)
	{
		return implode($separator,$array);
	}
	
	function str_pad($string,$pad_length,$pad_string)
	{
		return str_pad($string,$pad_length,$pad_string);
	}
	
	function toUpper($string)
	{
		return strtoupper($string);
	}
	function toLower($string)
	{
		return strtolower($string);
	}
	
	function pregMatch($pattern,$subject,$array=null,$flags=null,$offset=null)
	{
		return preg_match($pattern,$subject,$array,$flags,$offset);
	}
	function pregReplace($regex,$replace,$subject,$limit=null,$count=null)
	{
		return preg_replace($regex,$replace,$subject,$limit,$count);
	}
}

?>
