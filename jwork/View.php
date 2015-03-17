<?php
 //View是基于smarty模板技术，改造而成，用于实现PHP的MVC模式，代码与视图分离
 include_once('smarty/Smarty.class.php');
 include_once('config.php');
 

 class View extends Smarty
 {
   function View($path='')
   {
   	  $this->Init($path);
   } 


   //初始化Smarty类
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
   	 $this->caching=$template_cachetime; //是否缓存   
   	 $this->cache_lifetime=$template_cachetime; //缓存时间
    	
   }
   
   /**
    * 添加存储信息 assign别名
    *
    * @param string $name
    * @param object $value
    */
   function add($name,$value)
   {
   	 $this->assign($name,$value);
   }
   
   /**
    * 显示页面
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
    * 清空缓存方法
    *
    * @param 文件名称 $file
    * @param 等待时间 $ext_time
    */
   function CacheClear($file=null,$ext_time=null)
   {
   	if(empty($file))
   	 $this->clear_all_cache($ext_time);
   	else 
   	 $this->clear_cache($file,$ext_time);
   	
   }
   /**
    * 缓存时间
    *
    * @param 缓存秒数 $second
    */
   function cache($second)
   {
   	$this->caching=true;
   	$this->cache_lifetime=$second;
   }
   
   private function curepath($path)
   {
     global $webpath;
   	  //获得程序根目录
     $app_path =$_SERVER['DOCUMENT_ROOT'];
      //获得config指定路径
     if(empty($webpath)||$webpath=="/")
     $tempath=$app_path."/".$template_path;
     else 
     $tempath=$app_path."/".$webpath."/".$template_path;    
     $tempath=str_replace("//","/",$tempath); 
     return $tempath;
   	
   }
   
  
 }


?>