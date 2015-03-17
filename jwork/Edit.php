<?php
include_once 'config.php';
@session_start();
$_SESSION["jworkuploadsession"]="chinajwork";

class FCKeditor
{
 public $Name; //编辑器名称,用于取值
 public $Style; //编辑器类别
 public $Width; //长度
 public $Height; //高度
 public $Value;  //默认值

 function __construct($name,$style="default",$width="100%",$height="300px",$value="")
 {
 	$this->Name=$name;
 	$this->Style=$style;
 	$this->Width=$width;
 	$this->Height=$height;
 	$this->Value=$value;
 
 	
 }
 
 function  Create()
 {
   switch (strtolower($this->Style))
   {
   	case "guest":
   	case "guestbase":
   	 $fpath="guest";
   	 $fstyle="Basic";
   	 break;
   	case "guestfull":
   	 $fpath="guest";
   	 $fstyle="Default";
   	 break;
   	case "adminbase":
   	case "adminbasic":
   	 $fpath="admin";
   	 $fstyle="Basic";
   	 break;
   	default:
   	 $fpath="admin";
   	 $fstyle="Default";
   	 break;
 
   }
   
   
   global  $webpath;
   include("editor/".$fpath."/fckeditor.php");   
   
   $ineditor=new FCKeditor2($this->Name);
   if(!empty($webpath)&&$webpath!="/")
    $fpath="/".$webpath."/"."jwork/editor/".$fpath."/";
   else 
     $fpath="/jwork/editor/".$fpath."/";
  
   $fpath=str_replace("//","/",$fpath);
   
   $ineditor->BasePath=$fpath;
   $ineditor->ToolbarSet=$fstyle;
   $ineditor->Width=$this->Width;
   $ineditor->Height=$this->Height;
   $ineditor->Value=$this->Value;
   $ineditor->Create();
 }

}

class Edit extends FCKeditor
{
function __construct($name,$style="default",$width="100%",$height="300px",$value="")
 {
 	$this->Name=$name;
 	$this->Style=$style;
 	$this->Width=$width;
 	$this->Height=$height;
 	$this->Value=$value;
 	
 }
	
}



?>