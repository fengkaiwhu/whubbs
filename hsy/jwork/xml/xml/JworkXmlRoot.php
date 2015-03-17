<?php 
/** 
 *================================================
 * 
 * @author     Jwork V2.0.0
 * @since      2007-10-10 * 
 *================================================
 */ 
 /** 
 * class JworkXmlRoot 
 * xml root class, include values/attributes/subnodes. 
 * all this pachage's is work for xml file, and method is action as DOM. 
 * 
 * @package SmartWeb.common.xml 
 * @version 1.0 
 */
class JworkXmlRoot extends JworkXmlBase 
{ 
    private $prefixStr = ''; 
    private $nodeLists = array();
    
    function __construct($nodeTag='') 
    { 
        if(empty($nodeTag))
    	parent::__construct($nodeTag); 
    }
    public function createNodeObject($pNodeId, $name, $attributes) 
    { 
        $seq = sizeof($this->nodeLists); 
        $tmpObject = new JworkXmlNode($this, 
        $pNodeId, $name, $seq); 
        $tmpObject->setAttributes($attributes);
        $this->nodeLists[$seq] = $tmpObject; 
        return $tmpObject; 
    }
    public function removeNodeById($id) 
    { 
        if(sizeof($this->nodeLists)==1) 
        $this->nodeLists = array(); 
        else 
        unset($this->nodeLists[$id]); 
    }
    public function getNodeById($id) 
    { 
        return $this->nodeLists[$id]; 
    }
    public function createNode($name, $attributes) 
    { 
        return $this->createNodeByName($this, $name, $attributes, -1); 
    }
    public function removeNode($name) 
    { 
        return $this->removeNodeByName($this, $name); 
    }
    public function getNode($name=null) 
    { 
        return $this->getNodeByName($this, $name); 
    }
    public function getSaveXml() 
    { 
        $prefixSpace = ""; 
        $str = $this->prefixStr."\r\n"; 
        return $str.parent::getSaveXml(0); 
    } 
} 
?>
 
