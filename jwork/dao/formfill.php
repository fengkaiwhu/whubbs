<?php
/**
 * 开发日期：2007-12-09
 * ccopen.net
 */

class Form
{
  
	var $prefix="";//客户端名称前端
	private $list=array();//控件名/字段名数组
	private $dellist;//不绑定数据列
	var $row; //行数组

function __construct($row)
{
	$this->row=$row;
}

/**
 * 自定义添加回填项
 *
 * @param 控件名 $input
 * @param 字段名 $field
 */
function addKey($input,$field)
{
	$this->list[$input]=$this->row[$field];
}

/**
 * 不想自动绑定的数据列
 *
 * @param 列1,列2... $fieldlist
 */
function delKey($fieldlist)
{
	$this->dellist.=$fieldlist.",";
}

/**
 * 自定义添加回填项
 *
 * @param 控件名 $input
 * @param 字段名 $field
 */
function addValue($input,$value)
{
	$this->list[$input]=$value;
}


/**
 * 自动回填表单
 *
 * @param 行数组 $row
 */
function autofill()
{
        $row=$this->row;
	    $str="<script language=javascript> \n";	
	    $str.=$this->onefill();
	    $str.="\n function jworkFormFill(){\n";
	    
	    $prefix=$this->prefix;
	    $dellist=$this->dellist;
		while (list($key,$value)=each($row)) {	
		//$i=strpos(strtolower($dellist),strtolower($key));
	    if(!preg_match("/$key/",$dellist))
	    {
	    $value=$this->vplace($value);
		$str.="var jwork_$key=document.getElementsByName('$prefix$key');\n";
	    $str.="if(jwork_$key.length>0){ jwork_one_fill(jwork_$key,\"$value\");} \n";  
	    }
	    
		}	
		while (list($key,$value)=each($this->list)) {	
		 $value=$this->vplace($value);    
	   	 $str.="var jwork_$key=document.getElementsByName('$key');\n";
	   	 $str.="if(jwork_$key.length>0){ jwork_one_fill(jwork_$key,\"$value\");} \n";   
		}	
		
	     $str.="}\n";
	     $str.="jworkFormFill(); \n";
	     $str.="</script> \n";
	     echo $str;

}

/**
 * 按需求，回填表单
 * 即通过指定addKey来实现
 * @param 行数组 $row
 */
function needfill()
{
        $row=$this->row;
	    $str="<script language=javascript> \n";	  
	     $str.=$this->onefill();
	    $str.="\n function jworkFormFill(){\n";
	 
		
		while (list($key,$value)=each($this->list)) {	 
		 $value=$this->vplace($value);
	   	 $str.="var jwork_$key=document.getElementsByName('$key');\n";
	   	 $str.="if(jwork_$key.length>0){ jwork_one_fill(jwork_$key,\"$value\");} \n";   
		}	
		
	     $str.="}\n";
	     $str.="jworkFormFill(); \n";
	    $str.="</script> \n";
	    echo $str;

}


//输出单个控件 填充表单的js
private function onefill()
{
$str=<<<EOF
function jwork_one_fill(obj,txt)
{
	
	switch(obj[0].type)
	{
	 case 'text':
	 case 'textarea':
	 case 'hidden':
	 case 'password':
	  obj[0].value=txt;
	  break;
	 case 'radio':
	   jwork_fill_radio(obj,txt);		  
	  break;
	 case 'select-one':
	  jwork_fill_select(obj,txt);  
	  break;
	 case 'checkbox':
	  jwork_fill_checkbox(obj,txt);
	 break;
	 default:
	  jwork_fill_default(obj,txt);
	  break;
	}
}
//填充单选框
function jwork_fill_radio(obj,txt){
 for(n=0;n<obj.length;n++) { 
   if(obj[n].value==txt) 	{
     obj[n].checked=true; 	}}
}
//填充下拉框
function jwork_fill_select(obj,txt){
   for(n=0;n<obj[0].length;n++) { 
	if(obj[0].options[n].value==txt){   
      obj[0].selectedIndex=n;
	}}   
}
//填充复选框
function jwork_fill_checkbox(obj,txt){
  txt=txt+",";
  for(n=0;n<obj.length;n++) { 
  	va=obj[n].value+",";
   if(txt.indexOf(va)>=0) {
     obj[n].checked=true; }}
}

//div等
function jwork_fill_default(obj,txt)
{	obj[0].innerHTML=txt; }

EOF;
return $str;
}

//转换特列字符 把php中的 \r \n转义为js中的\\r \\n
function vplace($str)
{
	$s=str_replace("\r","\\r",$str);
	$s=str_replace("\n","\\n",$s);
	$s=str_replace("\"","\\\"",$s);
	return $s;	
}
	
}


?>