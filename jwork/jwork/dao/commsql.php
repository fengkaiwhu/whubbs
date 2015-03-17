<?php

class Commsql
{

var $arraylist;
var $where;

/**
 * ��� ����-�ؼ��� ��Ϣ
 * @param ����1,����2 $data
 * @param �ؼ�1,�ؼ�2 $form
 */
function addKey($data,$form="")
{
	$data_name=split(",",$data);
	
	if(empty($form))
	$form_name=$data_name;
	else 
	{
	$form_name=split(",",$form);
	}
	
	$len1=count($form_name);
	$len2=count($data_name);
	if($len1!=$len2)
	$this->jsAlert("�ؼ������ֶ������������飡");
	
	for($i=0;$i<$len1;$i++)
	{
	$this->arraylist[$data_name[$i]]=$_REQUEST[$form_name[$i]];
	}
	
	//print_r($this->arraylist);
}

/**
 * ��� ����-��ֵ ��Ϣ
 * @param �������� $field
 * @param ����ȡֵ $value
 */
function addValue($field,$value)
{
	$this->arraylist[$field]=$value;
}


function getSql($table)
{
	$where=$this->where;
	if(empty($where))
	return $this->insertSql($table);
	else 
	return $this->updateSql($table);
	
	
}

function insertSql($table)
{
	
	$array=$this->arraylist;
	$field="";
	$vals="";
	while (list($key,$value)=each($array)) {
		$field.=$key.",";
		if($value=='')
		$vals.="NULL,";
		else
		$vals.="'".$value."',";
	}
	$field=substr($field,0,strlen($field)-1);
	$vals=substr($vals,0,strlen($vals)-1);
	$this->sql="insert into $table($field) values($vals)";
	return $this->sql;
}


function updateSql($table)
{
	
	$array=$this->arraylist;
	$sql="";
	
	while (list($key,$value)=each($array)) {
		
		if($value=='')
		$sql.="$key=NULL,";
		else
		$sql.="$key='$value',";
	}
	$sql=substr($sql,0,strlen($sql)-1);
	$updaetsql="update $table set $sql where $this->where";
	return $updaetsql;
}

//javascript����
function jsAlert($string,$url="")
{
  if($url=="")
   echo "<script language='javascript'>alert('$string');history.go(-1);</script>";
  else 
   echo "<script language='javascript'>alert('$string');location.href('$url');</script>";
}
}
?>