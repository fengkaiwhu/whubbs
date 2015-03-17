<?php
class File
{
	private $file_link;  //文件句柄
	private $file_name;  //文件名
	public  $line_sign;  //换行符
   
   /**
    * 文件名称（包括路径）
    *
    * @param string $filename
    */
   function __construct($filename)
   {
   	$this->file_name=$filename;
   	$os=$_ENV["OS"];
    if(preg_match("/win/i",$os))
     $this->line_sign="\r\n";
    else 
     $this->line_sign="\n";
   }

   
   
	
    /**
	 * 创建文件，如果存在，则覆盖
	 *
	 * @param 文件的路径及名称 $filename
	 * @return resource 文件句柄
	 */
    function create($filename="")
	{
		if(!empty($filename))
		$this->file_name=$filename;
		$this->file_link=fopen($this->file_name,"w+");
		return $this->file_link;
	}
	
	/**
	 * 写入内容，不换行
	 *
	 * @param 内容 $string
	 */
	function write($string)
	{
		if($this->file_link==NULL)
		$this->file_link=fopen($this->file_name,"w+");
		
		fwrite($this->file_link,$string);
	}
	
	/**
	 * 写入内容，并换行
	 *
	 * @param 内容 $string
	 */
	function writeLine($string)
	{
		if($this->file_link==NULL)
		$this->file_link=fopen($this->file_name,"w+");
		fwrite($this->file_link,$string.$this->line_sign);
	}
	
	
	/**
	 * 按字节读取，默认全部
	 *
	 * @param int $size
	 * @return string
	 */
	function read($size=0)
	{
		$this->file_link=fopen($this->file_name,"r");
		$thesize=filesize($this->file_name);
		if(empty($size)||$size>$thesize)
		  $size=$thesize;
		 $contents = fread($this->file_link, $size);
        return $contents;
	}
	
	/**
	 * 文件尾追加内容
	 *
	 * @param string $string
	 */
	function  append($string)
	{
		 $this->file_link=fopen($this->file_name,"a+");
		 fwrite($this->file_link,$string);
	}
	/**
	 * 文件头插入内容
	 *
	 * @param string $string
	 */
    function  apptop($string)
	{
		 $this->file_link=fopen($this->file_name,"r+");
		 fwrite($this->file_link,$string);
	}
	
    /**
	 * 删除文件
	 *
	 * @param string 文件名
	 * @return bool 
	 */
	function del($filename)
	{
		$this->close();
		return unlink($filename);
	}
	
	function __destruct()
	{
	  $this->close();
	}
	
	/**
	 * 关闭文件连接资源
	 *
	 */
	function close()
	{
		@fclose($this->file_link);
	}
	
}

?>