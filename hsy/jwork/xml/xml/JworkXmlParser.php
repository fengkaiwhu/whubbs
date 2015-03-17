<?php 
/** 
 *================================================
 * 
 * @author     Jwork V2.0.0
 * @since      2007-10-10 * 
 *================================================
 */ 
 /** 
 * class JworkXmlParser 
 * use SAX parse xml file, and build JworkXmlObject 
 * all this pachage's is work for xml file, and method is action as DOM. 
 * 
 * @package SmartWeb.common.xml 
 * @version 1.0 
 */ 
 class JworkXmlParser 
 {
     var $domRootObject;
     private $currentNO = null; 
     private $currentName  = null; 
     private $currentValue = null; 
     private $currentAttribute = null;
  
     public function getJworkXml() 
     { 
         return $this->domRootObject; 
     } 
     public function parse($file) 
     { 
         $xmlParser = xml_parser_create(); 
         xml_parser_set_option($xmlParser,XML_OPTION_CASE_FOLDING, 
         0); 
         xml_parser_set_option($xmlParser,XML_OPTION_SKIP_WHITE, 1); 
         xml_parser_set_option($xmlParser, 
         XML_OPTION_TARGET_ENCODING, 'UTF-8'); 
         xml_set_object($xmlParser, $this);
         xml_set_element_handler($xmlParser, "startElement", "endElement"); 
         xml_set_character_data_handler($xmlParser, 
         "characterData");
         if (!xml_parse($xmlParser, file_get_contents($file)))
         die(sprintf("Jwork XML error: %s at line %d", xml_error_string(xml_get_error_code($xmlParser)), 
         xml_get_current_line_number($xmlParser)));
         xml_parser_free($xmlParser);
     }
     private function startElement($parser, $name, $attrs) 
     { 
         $this->currentName = $name; 
         $this->currentAttribute = $attrs; 
         if($this->currentNO == null) 
         { 
             $this->domRootObject = new JworkXmlRoot($name);
             $this->currentNO = $this->domRootObject; 
         } 
         else
         { 
             $this->currentNO = $this->currentNO->createNode($name, $attrs);
         } 
     }
     private function endElement($parser, $name) 
     { 
         if($this->currentName==$name)
         { 
             $tag = $this->currentNO->getSeq(); 
             $this->currentNO  = $this->currentNO->getPNodeObject(); 
             if($this->currentAttribute!=null && sizeof($this->currentAttribute)>0) 
             $this->currentNO->setValue($name, array('value'=>$this->currentValue, 'attrs'=>$this->currentAttribute));
             else 
             $this->currentNO->setValue($name, $this->currentValue);
             $this->currentNO->removeNode($tag); 
         } 
         else
         { 
             $this->currentNO = (is_a($this->currentNO, 'JworkXmlRoot'))?   null: 
             $this->currentNO->getPNodeObject(); 
         } 
     }
     private function characterData($parser,  $data) 
     { 
         $this->currentValue = iconv('UTF-8', 'GB2312', $data); 
     }

     function __destruct() 
     { 
         unset($this->domRootObject); 
     }
 } 
?>