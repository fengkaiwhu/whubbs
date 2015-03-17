<?php
 //View�ǻ���smartyģ�弼����������ɣ�����ʵ��PHP��MVCģʽ����������ͼ����
 include_once('smarty/Smarty.class.php');
 include_once('config.php');
 

 class View extends Smarty
 {
   function View($path='')
   {
   	  $this->Init($path);
   } 


   //��ʼ��Smarty��
   function Init($path)
   {
     global $template_path;
     global $template_debug;
     global  $template_cachetime;
     if(!empty($path))
     $template_path=$path;
     
     //path cure
     $webroot=$this->curepath($template_path);
     $webroot=str_replace("\\","/",$webroot);
     $webroot=str_replace("//","/",$webroot);
     $template_path=$webroot."/".$template_path;
     $template_path=str_replace("//","/",$template_path);

     $this->compile_check = true;
   	 $this->debugging = $template_debug;
   	 $this->template_dir =$template_path;
   	 $this->compile_dir ="{$webroot}jwork/temp/templates_c";
   	 $this->config_dir = $template_path;
   	 $this->cache_dir ="{$webroot}jwork/temp/cache"; 
   	 $this->caching=$template_cachetime; //�Ƿ񻺴�   
   	 $this->cache_lifetime=$template_cachetime; //����ʱ��
    	
   }
   
   /**
    * ��Ӵ洢��Ϣ assign����
    *
    * @param string $name
    * @param object $value
    */
   function add($name,$value)
   {
   	 $this->assign($name,$value);
   }
   
   /**
    * ��ʾҳ��
    *
    * @param string	 $path
    * @param string $cache_id
    * @param string $compile_id
    */
   function show($path,$cache_id='',$compile_id='')
   {
   	$this->display($path,$cache_id,$compile_id);
   }
   
   /**
    * ��ջ��淽��
    *
    * @param �ļ����� $file
    * @param �ȴ�ʱ�� $ext_time
    */
   function CacheClear($file=null,$ext_time=null)
   {
   	if(empty($file))
   	 $this->clear_all_cache($ext_time);
   	else 
   	 $this->clear_cache($file,$ext_time);
   	
   }
   /**
    * ����ʱ��
    *
    * @param �������� $second
    */
   function cache($second)
   {
   	$this->caching=true;
   	$this->cache_lifetime=$second;
   }
   
   private function curepath($path)
   {
     global $webpath;
   	  //��ó����Ŀ¼
     $app_path =$_SERVER['DOCUMENT_ROOT'];
      //���configָ��·��
     if(empty($webpath)||$webpath=="/")
     $tempath=$app_path."/".$template_path;
     else 
     $tempath=$app_path."/".$webpath."/".$template_path;    
     $tempath=str_replace("//","/",$tempath); 
     return $tempath;
   	
   }
   
  
 }


?>