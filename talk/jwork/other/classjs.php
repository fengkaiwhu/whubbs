<?php
include_once("mysql.php");

	
class ClassJs
{
	
	var $list;
	var $rel;
	var $level;
	
 function createtable($table)
	{
       $sql="create table";
	}
	
	//��������Ϊ���� list��rel
	function readData($table)
	{
		$dao = new MysqlDao();
		//�õ�����ļ�����2��ʾ���η���
		$count=$dao->sqlValue("select level from $table order by level desc limit 1");
		$list=array(); //�����id���������
		$rel=array();  //�����id�͸���id
		for($i=0;$i<$count;$i++)
		{
		  $level=$i+1;
		  $arr=array();
		  $arr2=array();
		  $sql="select * from $table where level=$level order by orderby";		
		  $array=$dao->sqlArray($sql);
		  
		  while (list($rowid,$row)=each($array))
		  {
			  //echo "$rowid".$row["class_name"];
			 $arr[$row["class_id"]]=$row["class_name"];
			 $arr2[$row["class_id"]]=$row["parent_id"];
		  }
		  $list[$i]=$arr;
		  $rel[$i]=$arr2;
		 
		}
		 $this->list=$list;
		 $this->rel=$rel;
		 $this->level=$count;
		//����
		//print_r($list);
		//print_r($rel);
	}

// ��ʾ�˵�
function showJs($table,$object="")
{
  //��ʼ��
  $this->readData($table);
  $num=$this->level;
  $list=$this->list;
  $rel=$this->rel;
  $str="";
  $i=0;
  //����ؼ���Ϊ�գ���Ĭ��Ϊ�������
  if($object=="")
   $object=$table;
 
   
   for(;$num>0;$num--)
   {
    $change="";
   	if($num!=1)
   	{
   	  $obj=$object.($num-1);
      $change="onchange=\"Jchange".($num-1)."(this.selectedIndex)\"";
   	}
   	else 
   	   $obj=$object;
   	   
   	 
   	 //����ؼ���
   	 $str.="document.writeln('<select name=\"".$obj."\" ".$change.">');\n";
   	 $str.="document.writeln('<option value=\"\">��ѡ��</option>');\n";
   	 $str.="document.writeln('</select>');\n";
   	 
   	
     }
     
     $num=$this->level;
     for($i=0;$i<$this->level;$i++)
     {
     //����js����
     if($num==1)
       $vbj=$obj;
      else 
       $vbj=$obj.($num-1);

     $valueobj="v".$vbj;
     $keyobj="k".$vbj;
     $relobj="r".$vbj;
     $k="";
     $v="";
     $r="";
     $array=$list[$i];
     foreach($array as $key=>$value)
     {
     	$k.="'".$key."',";
     	$v.="'".$value."',";
     }
     
     $rarray=$rel[$i];
     foreach($rarray as $key=>$value)
     {
          	$r.="'".$value."',";
     }
     
     $str.="var $keyobj = [$k];\n";
     $str.="var $valueobj = [$v];\n";
     $str.="var $relobj = [$r];\n";
  
     $num--;
     }
   
    return $str;
  
}

function inHtml($table,$object="")
{
	 echo "<script>\n";
	 echo $this->showJs($table,$object);
	 echo "</script>\n";

}
}


$cc = new ClassJs();
$cc->inHtml("news_class");

?>