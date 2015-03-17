<?php

/*
Jwork Image Copy Class
PowerBy:ChinaJwork.org
This Class Need You HttpServer GD2 
调用此类的方法:

Example:
$im = new CopyImage("source image url", "new width", "new height", "0","new image url");

*/
class CopyImage
{
    
    public $source_type;   //图像类型
    public $source_width;  //源图像宽
    public $source_height; //源图像高
    public $dest_width;    //新图像宽
    public $dest_height;   //新图像高
    public $pattern;       //生成类别
    public $source_name;   //源图像地址
    public $dest_name;     //新图像地址
    
    //临时创建的图象
    private $source_link;  //源图像资源
    public $dest_link;     //新图像资源
	

    
    /**
	 * 图像拷贝(缩图/放大图)
	 *
	 * @param string $source_name
	 * @param string $dest_name
	 * @param string $width
	 * @param string $height
	 * @param string $pattern  auto等比例  fix强制比例 cut裁截 
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
        
        //原图比例 
        $ratio = ($this->source_width)/($this->source_height);        
        //生图比例
        $resize_ratio = ($this->dest_width)/($this->dest_height);
     
        // 按指定尺寸裁截图片(只取部分)
        if($this->pattern=="cut")
        {
            if($ratio>=$resize_ratio)  //以高为主           
            {
                $this->dest_link = imagecreatetruecolor($this->dest_width,$this->dest_height);
                imagecopyresampled($this->dest_link , $this->source_link, 0, 0, 0, 0, $this->dest_width,$this->dest_height, (($this->source_height)*$resize_ratio), $this->source_height);
             }
            if($ratio<$resize_ratio) //以宽为主
            {
                $this->dest_link  = imagecreatetruecolor($this->dest_width,$this->dest_height);
                imagecopyresampled($this->dest_link , $this->source_link, 0, 0, 0, 0, $this->dest_width, $this->dest_height, $this->source_width, (($this->source_width)/$resize_ratio));
            }
         }
        // 按指定尺寸强制缩放(可能变形)
        elseif ($this->pattern=="fix")
        {
        	 $this->dest_link  = imagecreatetruecolor($this->dest_width,$this->dest_height);
             imagecopyresampled($this->dest_link , $this->source_link, 0, 0, 0, 0, $this->dest_width, $this->dest_height, $this->source_width, $this->source_height);
        }
        // 按指定尺寸等比例缩放（保持原图比例）
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
