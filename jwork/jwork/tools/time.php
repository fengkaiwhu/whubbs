<?php
class Time
{
/**
 * ����ʱ���
 *
 * @param string $t1
 * @param string $t2
 * @param string $type(hour|day)
 * @return string
 */
function datediff($t1,$t2,$type="hour")
{
  $t2=strtotime($t2);
  $t1=strtotime($t1);
  
  if($type=="day"||$type=="d")
    return ceil(($t2-$t1)/3600/24);
  else if($type=="hour"||$type=="h")  
     return ceil(($t2-$t1)/3600);
  else
    return ceil(($t2-$t1)); 
  

}

/**
 * ����ĳ�μ�����ʱ���
 *
 * @param string $time
 * @param int $num
 * @param string $type
 * @return string
 */
function dateadd($time,$num,$type="second")
{
  $t1=strtotime($time);
  $format="Y-m-d H:i:s";
  if($type=="day"||$type=="d")
  {
     $diff=$num*24*3600;
	 $format="Y-m-d";
  }
  else if($type=="hour"||$type=="h")  
     $diff=$num*3600;
  else
    $diff=$num;
  
  $t2=$t1+$diff;
  
  return date($format,$t2);
}

/**
 * ���ϵͳ��ǰʱ��
 *
 * @return string
 */
function now()
{
	return date("Y-m-d H:i:s");
}



}
?>