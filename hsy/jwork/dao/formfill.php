<?php
/**
 * �������ڣ�2007-12-09
 * ccopen.net
 */

class Form
{
  
	var $prefix="";//�ͻ�������ǰ��
	private $list=array();//�ؼ���/�ֶ�������
	private $dellist;//����������
	var $row; //������

function __construct($row)
{
	$this->row=$row;
}

/**
 * �Զ�����ӻ�����
 *
 * @param �ؼ��� $input
 * @param �ֶ��� $field
 */
function addKey($input,$field)
{
	$this->list[$input]=$this->row[$field];
}

/**
 * �����Զ��󶨵�������
 *
 * @param ��1,��2... $fieldlist
 */
function delKey($fieldlist)
{
	$this->dellist.=$fieldlist.",";
}

/**
 * �Զ�����ӻ�����
 *
 * @param �ؼ��� $input
 * @param �ֶ��� $field
 */
function addValue($input,$value)
{
	$this->list[$input]=$value;
}


/**
 * �Զ������
 *
 * @param ������ $row
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
 * �����󣬻����
 * ��ͨ��ָ��addKey��ʵ��
 * @param ������ $row
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


//��������ؼ� ������js
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
//��䵥ѡ��
function jwork_fill_radio(obj,txt){
 for(n=0;n<obj.length;n++) { 
   if(obj[n].value==txt) 	{
     obj[n].checked=true; 	}}
}
//���������
function jwork_fill_select(obj,txt){
   for(n=0;n<obj[0].length;n++) { 
	if(obj[0].options[n].value==txt){   
      obj[0].selectedIndex=n;
	}}   
}
//��临ѡ��
function jwork_fill_checkbox(obj,txt){
  txt=txt+",";
  for(n=0;n<obj.length;n++) { 
  	va=obj[n].value+",";
   if(txt.indexOf(va)>=0) {
     obj[n].checked=true; }}
}

//div��
function jwork_fill_default(obj,txt)
{	obj[0].innerHTML=txt; }

EOF;
return $str;
}

//ת�������ַ� ��php�е� \r \nת��Ϊjs�е�\\r \\n
function vplace($str)
{
	$s=str_replace("\r","\\r",$str);
	$s=str_replace("\n","\\n",$s);
	$s=str_replace("\"","\\\"",$s);
	return $s;	
}
	
}


?>