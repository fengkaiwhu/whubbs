<?php
require_once "xml/JworkXmlParser.php"; 
require_once "xml/JworkXmlBase.php"; 
require_once "xml/JworkXmlRoot.php"; 
require_once "xml/JworkXmlNode.php";

class Xml extends JworkXmlParser 
{
	
	private $dom=null;
	public  $array= array();
	function __construct($file)
	{
		 $this->parse($file); 
		 $this->dom = $this->getJworkXml();
	}
	
	/**
	 * ���xml��Ŀ¼��Ľڵ�����
	 *
	 * @return Array
	 */
	function getData()
	{
		$array=$this->dom->getSaveData();		
		$this->array=$$array;
		return $array;		
	} 
	
	
	
	
	
}

?>