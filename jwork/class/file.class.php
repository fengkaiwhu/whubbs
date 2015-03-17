<?php
class File
{
	private $file_link;  //�ļ����
	private $file_name;  //�ļ���
	public  $line_sign;  //���з�
   
   /**
    * �ļ����ƣ�����·����
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
	 * �����ļ���������ڣ��򸲸�
	 *
	 * @param �ļ���·�������� $filename
	 * @return resource �ļ����
	 */
    function create($filename="")
	{
		if(!empty($filename))
		$this->file_name=$filename;
		$this->file_link=fopen($this->file_name,"w+");
		return $this->file_link;
	}
	
	/**
	 * д�����ݣ�������
	 *
	 * @param ���� $string
	 */
	function write($string)
	{
		if($this->file_link==NULL)
		$this->file_link=fopen($this->file_name,"w+");
		
		fwrite($this->file_link,$string);
	}
	
	/**
	 * д�����ݣ�������
	 *
	 * @param ���� $string
	 */
	function writeLine($string)
	{
		if($this->file_link==NULL)
		$this->file_link=fopen($this->file_name,"w+");
		fwrite($this->file_link,$string.$this->line_sign);
	}
	
	
	/**
	 * ���ֽڶ�ȡ��Ĭ��ȫ��
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
	 * �ļ�β׷������
	 *
	 * @param string $string
	 */
	function  append($string)
	{
		 $this->file_link=fopen($this->file_name,"a+");
		 fwrite($this->file_link,$string);
	}
	/**
	 * �ļ�ͷ��������
	 *
	 * @param string $string
	 */
    function  apptop($string)
	{
		 $this->file_link=fopen($this->file_name,"r+");
		 fwrite($this->file_link,$string);
	}
	
    /**
	 * ɾ���ļ�
	 *
	 * @param string �ļ���
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
	 * �ر��ļ�������Դ
	 *
	 */
	function close()
	{
		@fclose($this->file_link);
	}
	
}

?>