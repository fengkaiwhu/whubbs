<?php
require_once("../config.php");

class Upload {
	
	
	public $allowtype;      //�ļ������б�
	public $allowsize;      //�����С K
	public $message;       //������Ϣ������������Ϣ�����ļ�Խ������
	public $clientname=array();    //�ļ��ͻ�������
	public $filename=array();      //�ļ�������������
	public $filesize=array();      //�ļ���С K
	public $filetype=array();      //�ļ�����
	public $filedir;       //�ļ�·��
	public $fullname=array();

	
  function baseUpload($path="",$name="") {
		
		
		//���config���õ��ļ����ͼ���С
		global $uploadpath,$uploadlist,$uploadsize,$webpath;
		
		//�Ƴ����ļ���
		foreach ($_FILES as $key=>$value)
		{
			if(empty($value["name"]))
			 unset($_FILES[$key]);
			 
		}
	
		if(count($_FILES)==0)
		{
		 $this->message="�Ҳ����ϴ��ļ���";
		  return false;
		}
		
		 
		$num=0;
		foreach ($_FILES as $key=>$value)
		{
		$fullname = $value["name"];
		$this->clientname[$num]=$fullname;
		
		
		
	    //����ļ���׺��
		preg_match ( "/\.[a-z0-9]{3,5}$/i",$fullname,$typearray );
		$this->filetype[$num] = $typearray[0];
		
		
		//������ͺʹ�С����û�����ã���ʹ��config�µ�
		if(empty($this->allowtype))
		 $this->allowtype=$uploadlist;
		if(empty($this->allowsize))
		 $this->allowsize=$uploadsize;
		
		if (!preg_match( "/{$typearray[0]}/i", $this->allowtype))
		{
	    $this->message="�ϴ��ļ���ʽ����ȷ";
	    return false;
		}
		
		//��ô�С
		$this->filesize[$num]=round($value["size"]/1024,2);
		
        if($this->filesize[$num]>$this->allowsize)
        {
         $this->message="�ϴ��ļ�����{$this->allowsize}K������С�ļ���";
         return false;
        }

         //�õ�׼ȷ���ļ���׺ 
        $filetype=strstr($fullname,".");
        $filetype=strstr($filetype,".");
        
        //�õ��ļ�����(��������׺)
        if(empty($name))
        $name=date("ymd_His")."_".rand(10,99);
        
        //�ļ�ȫ��
        if(count($_FILES)==1)
         $this->filename[$num]=$name.$filetype;
        else 
          $this->filename[$num]=$name.$num.$filetype;
        $num++;
        }
    
        
        //���·��
        if(empty($path))
         $path=$uploadpath;
        else 
        {
          if(preg_match("/^\//",$path))
           $path=$path;
          else 
           $path=$uploadpath."/".$path;
         }

         //��������ڸ�Ŀ¼�ϣ����ϳ���Ŀ¼��
         if(!empty($webpath)&&$webpath!="/")
         $path=$webpath."/".$path;     
         $this->filedir=str_replace("//","/",$_SERVER['DOCUMENT_ROOT']."/".$path);
         
        
		 //Ŀ¼�����ڣ��򴴽�·��
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
          $this->message="�ļ��ϴ��ɹ���";
          return true;
         }
         else
         {
          $this->message="�ļ��ϴ�ʧ�ܣ�";
          return false;
         } 	
		
}

  function waterUpload($waterfile,$x=10,$y=10,$path="",$name="")
  {
  	 //�����ϴ�
  	 $bool=$this->baseUpload($path,$name);
  	 
  	 //�ϴ�ʧ�ܣ���������
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