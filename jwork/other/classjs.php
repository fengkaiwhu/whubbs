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
	
	//将类别表，读为数组 list和rel
	function readData($table)
	{
		$dao = new MysqlDao();
		//得到分类的级数，2表示二次分类
		$count=$dao->sqlValue("select level from $table order by level desc limit 1");
		$list=array(); //存的是id和类别内容
		$rel=array();  //存的是id和父类id
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
		//测试
		//print_r($list);
		//print_r($rel);
	}

// 显示菜单
function showJs($table,$object="")
{
  //初始化
  $this->readData($table);
  $num=$this->level;
  $list=$this->list;
  $rel=$this->rel;
  $str="";
  $i=0;
  //如果控件名为空，则默认为表的名称
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
   	   
   	 
   	 //输入控件名
   	 $str.="document.writeln('<select name=\"".$obj."\" ".$change.">');\n";
   	 $str.="document.writeln('<option value=\"\">请选择</option>');\n";
   	 $str.="document.writeln('</select>');\n";
   	 
   	
     }
     
     $num=$this->level;
     for($i=0;$i<$this->level;$i++)
     {
     //生成js数组
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