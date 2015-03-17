<?php

/*
Jwork Image Copy Class
PowerBy:ChinaJwork.org
This Class Need You HttpServer GD2 
���ô���ķ���:

Example:
$im = new CopyImage("source image url", "new width", "new height", "0","new image url");

*/
class CopyImage
{
    
    public $source_type;   //ͼ������
    public $source_width;  //Դͼ���
    public $source_height; //Դͼ���
    public $dest_width;    //��ͼ���
    public $dest_height;   //��ͼ���
    public $pattern;       //�������
    public $source_name;   //Դͼ���ַ
    public $dest_name;     //��ͼ���ַ
    
    //��ʱ������ͼ��
    private $source_link;  //Դͼ����Դ
    public $dest_link;     //��ͼ����Դ
	

    
    /**
	 * ͼ�񿽱�(��ͼ/�Ŵ�ͼ)
	 *
	 * @param string $source_name
	 * @param string $dest_name
	 * @param string $width
	 * @param string $height
	 * @param string $pattern  auto�ȱ���  fixǿ�Ʊ��� cut�ý� 
	 * @return bool
	 */
    function  copySize($source_name,$dest_name,$width,$height,$pattern="auto")
    {
    	$this->source_name = $source_name;
        $this->dest_name=$dest_name;
        $this->dest_width = $width;
        $this->dest_height = $height;
        $this->pattern = strtolower($pattern);
        $this->imageInit();
        
        //ԭͼ���� 
        $ratio = ($this->source_width)/($this->source_height);        
        //��ͼ����
        $resize_ratio = ($this->dest_width)/($this->dest_height);
     
        // ��ָ���ߴ�ý�ͼƬ(ֻȡ����)
        if($this->pattern=="cut")
        {
            if($ratio>=$resize_ratio)  //�Ը�Ϊ��           
            {
                $this->dest_link = imagecreatetruecolor($this->dest_width,$this->dest_height);
                imagecopyresampled($this->dest_link , $this->source_link, 0, 0, 0, 0, $this->dest_width,$this->dest_height, (($this->source_height)*$resize_ratio), $this->source_height);
             }
            if($ratio<$resize_ratio) //�Կ�Ϊ��
            {
                $this->dest_link  = imagecreatetruecolor($this->dest_width,$this->dest_height);
                imagecopyresampled($this->dest_link , $this->source_link, 0, 0, 0, 0, $this->dest_width, $this->dest_height, $this->source_width, (($this->source_width)/$resize_ratio));
            }
         }
        // ��ָ���ߴ�ǿ������(���ܱ���)
        elseif ($this->pattern=="fix")
        {
        	 $this->dest_link  = imagecreatetruecolor($this->dest_width,$this->dest_height);
             imagecopyresampled($this->dest_link , $this->source_link, 0, 0, 0, 0, $this->dest_width, $this->dest_height, $this->source_width, $this->source_height);
        }
        // ��ָ���ߴ�ȱ������ţ�����ԭͼ������
        else
        {
     
            if($ratio>=$resize_ratio)
            {
                $this->dest_link  = imagecreatetruecolor($this->dest_width,($this->dest_width)/$ratio);
                imagecopyresampled($this->dest_link , $this->source_link, 0, 0, 0, 0, $this->dest_width, ($this->dest_width)/$ratio, $this->source_width, $this->source_height);
            
            }
            if($ratio<$resize_ratio)
            {
                $this->dest_link  = imagecreatetruecolor(($this->dest_height)*$ratio,$this->dest_height);
                imagecopyresampled($this->dest_link , $this->source_link, 0, 0, 0, 0, ($this->dest_height)*$ratio, $this->dest_height, $this->source_width, $this->source_height);
            }
      
        }
          $this->imageMake();
          return basename($dest_name);
    }
    
    
     function  copyZoom($source_name,$dest_name,$percent="30")
    {
    	$this->source_name = $source_name;
        $this->dest_name=$dest_name;
        $this->imageInit();
        $this->dest_width = round($this->source_width*$percent/100);
        $this->dest_height= round($this->source_height*$percent/100);
      
        $this->dest_link  = imagecreatetruecolor($this->dest_width,$this->dest_height);
        imagecopyresampled($this->dest_link , $this->source_link, 0, 0, 0, 0, $this->dest_width, $this->dest_height, $this->source_width, $this->source_height);
        $this->imageMake();
        return basename($dest_name);
    }
    
    private function imageInit()
    {
         //Get Image Type    
		 $this->source_type = strtolower(substr(strrchr($this->source_name,"."),1));
       
         //Load Source Image
         if($this->source_type=="gif")
          $this->source_link = imagecreatefromgif($this->source_name);
         elseif($this->source_type=="png")
          $this->source_link = imagecreatefrompng($this->source_name);
         else
          $this->source_link= imagecreatefromjpeg($this->source_name);
                     
        //Get Source Image Width and Height
        $this->source_width = imagesx($this->source_link);
        $this->source_height =imagesy($this->source_link);
       
    }
    private function imageMake()
    {
       
    
          if($this->source_type=="gif")
           imagegif($this->dest_link,$this->dest_name);
          elseif($this->source_type=="png")
           imagepng($this->dest_link,$this->dest_name);
          else
           imagejpeg($this->dest_link,$this->dest_name);
          
    }
  
   
     function __destruct()
     {
     	@ImageDestroy ($this->source_link); 
     	@ImageDestroy ($this->dest_link);     	
     }
  
}
 ?>
