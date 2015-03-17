<?php
require_once("../config.php");

class Upload {
	
	
	public $allowtype;      //文件类型列表
	public $allowsize;      //允许大小 K
	public $message;       //操作信息，包括错误信息，如文件越过限制
	public $clientname=array();    //文件客户端名称
	public $filename=array();      //文件服务器端名称
	public $filesize=array();      //文件大小 K
	public $filetype=array();      //文件类型
	public $filedir;       //文件路径
	public $fullname=array();

	
  function baseUpload($path="",$name="") {
		
		
		//获得config设置的文件类型及大小
		global $uploadpath,$uploadlist,$uploadsize,$webpath;
		
		//移除空文件域
		foreach ($_FILES as $key=>$value)
		{
			if(empty($value["name"]))
			 unset($_FILES[$key]);
			 
		}
	
		if(count($_FILES)==0)
		{
		 $this->message="找不到上传文件！";
		  return false;
		}
		
		 
		$num=0;
		foreach ($_FILES as $key=>$value)
		{
		$fullname = $value["name"];
		$this->clientname[$num]=$fullname;
		
		
		
	    //获得文件后缀名
		preg_match ( "/\.[a-z0-9]{3,5}$/i",$fullname,$typearray );
		$this->filetype[$num] = $typearray[0];
		
		
		//如果类型和大小属性没有设置，则使用config下的
		if(empty($this->allowtype))
		 $this->allowtype=$uploadlist;
		if(empty($this->allowsize))
		 $this->allowsize=$uploadsize;
		
		if (!preg_match( "/{$typearray[0]}/i", $this->allowtype))
		{
	    $this->message="上传文件格式不正确";
	    return false;
		}
		
		//获得大小
		$this->filesize[$num]=round($value["size"]/1024,2);
		
        if($this->filesize[$num]>$this->allowsize)
        {
         $this->message="上传文件超过{$this->allowsize}K，请缩小文件！";
         return false;
        }

         //得到准确的文件后缀 
        $filetype=strstr($fullname,".");
        $filetype=strstr($filetype,".");
        
        //得到文件名称(不包括后缀)
        if(empty($name))
        $name=date("ymd_His")."_".rand(10,99);
        
        //文件全名
        if(count($_FILES)==1)
         $this->filename[$num]=$name.$filetype;
        else 
          $this->filename[$num]=$name.$num.$filetype;
        $num++;
        }
    
        
        //获得路径
        if(empty($path))
         $path=$uploadpath;
        else 
        {
          if(preg_match("/^\//",$path))
           $path=$path;
          else 
           $path=$uploadpath."/".$path;
         }

         //如果程序不在根目录上，加上程序目录名
         if(!empty($webpath)&&$webpath!="/")
         $path=$webpath."/".$path;     
         $this->filedir=str_replace("//","/",$_SERVER['DOCUMENT_ROOT']."/".$path);
         
        
		 //目录不存在，则创建路径
         if(!is_dir($this->filedir))
         @mkdir($this->filedir);
         
		 $i=0; 
		 foreach ($_FILES as $key=>$value)
		  {
		   $target_path =$this->filedir.'/'.$this->filename[$i];         
           $target_path=str_replace("//","/",$target_path);
           $this->fullname[$i]=$target_path;
		   move_uploaded_file($value["tmp_name"], $target_path); 
		   if(file_exists($target_path))  $i++;
		 }
         if($i==count($this->filename)) 
         {
          $this->message="文件上传成功！";
          return true;
         }
         else
         {
          $this->message="文件上传失败！";
          return false;
         } 	
		
}

  function waterUpload($waterfile,$x=10,$y=10,$path="",$name="")
  {
  	 //批量上传
  	 $bool=$this->baseUpload($path,$name);
  	 
  	 //上传失败，立即返回
  	 if(!bool)
  	 return false;
  	  
  	 foreach ($this->fullname as $key=>$value)
  	 {
  	 $this->waterPrint($value,$waterfile,$x,$y);  	 	
  	 }
  	 return true;
  }
  
  function waterPrint($srcfile,$waterfile,$x=10,$y=10)
  {
  	$type=basename($srcfile);
  	$type=strstr($type,".");
  	
    if($type==".jpg")
  	$dest=imagecreatefromjpeg($srcfile);
  	elseif ($type==".gif")
  	$dest=imagecreatefromgif($srcfile);
  	elseif ($type==".png")
  	$dest=imagecreatefrompng($srcfile);
  	else 
  	 return false;
  	 
  	$destX=imagesx($dest);
  	$destY=imagesy($dest);
  	
  	$watertype=basename($waterfile);
  	$watertype=strstr($watertype,".");
  	
  	if($watertype==".png")
  	$water=imagecreatefrompng($waterfile);
  	elseif($watertype==".gif")
  	$water=imagecreatefromgif($waterfile);
  	elseif($watertype==".jpg")
  	$water=imagecreatefromjpeg($waterfile);
  	$waterX=imagesx($water);
  	$waterY=imagesy($water);
  	if($x<0)
  	 $x=$destX+$x-$waterX;
  	if($y<0)
  	 $y=$destY+$y-$waterY;
  	 
  	imagecopy($dest,$water,$x,$y,0,0,$waterX,$waterY);
  	if($type==".jpg")
  	imagejpeg($dest,$srcfile);
  	elseif ($type==".gif")
  	imagegif($dest,$srcfile);
  	elseif ($type==".png")
  	imagepng($dest,$srcfile);
  	imagedestroy ($water);
  	imagedestroy ($dest);  
  	return true;	
  	
  }
}

/*
$u = new Upload();


$u->waterUpload("../../upload/water.gif");

	print_r($u->filename);
	print_r($u->filedir);
	print_r($u->filetype);
	print_r($u->fullname);
*/
	

?>