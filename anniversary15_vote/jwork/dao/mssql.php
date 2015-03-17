<?php
/**
 * Jpage分页 v2.0
 * 此版分页，只支持mssql数据库
 * 分页作者：zuoyefeng.com
 */

include_once("function.php"); 
include_once("formfill.php"); 
include_once("pageStyle.php");
include_once('daosql.php');

class MsSqlDao extends Idao
{
	var $conn; //取得连接
    var $result;   //取得结果集
    var $sql;      //取得sql语句
   
   
  
    //如果分页，还有以下两个参数
    var $foot="no pages";
    var $pagesize;
    var $page;
    var $style="default";
    
    
   function __construct($connstr='')
   {
   	 if(!empty($connstr))
   	 {
   	 	$conn_array=explode(',',$connstr);
   	 	$this->server=$conn_array[0];
   	 	$this->userid=$conn_array[1];
   	 	$this->passid=$conn_array[2];
   	 	$this->dbname=$conn_array[3];
   	 	$this->dbcharset=$conn_array[4];
   	 	
   	 }
   	 $this->connect();
   
   	
   }
  
    //连接数据库
	function connect(){
			$this->conn=@mssql_connect($this->server,$this->userid,$this->passid)  or  $this->debug("连接数据库有误！");
			$this->selectdb();
			return $this->conn;
	}

	function selectdb(){
		mssql_select_db($this->dbname,$this->conn);
	}


    /**
     * 执行SQL语句
     *
     * @param string $sql
     * @return int 影响行数
     */
	function sqlExecute($sql){
	    $bool=@mssql_query($sql);
        return $bool;
	}
	
   /**
    * 查询数据（无分页）
    *
    * @param string $sql
    * @return Array(二维数组)
    */
	function sqlArray($sql){
		$record = array();
		$result=$this->getResult($sql);			
		while ($tmp_info = mssql_fetch_array($result, MSSQL_ASSOC) ){
			$record[] = $tmp_info;
		}
		return $record;
	}
	
	/**
	 * 返回 第一行，第一列的值
	 *
	 * @param string $sql
	 * @return string
	 */
	function sqlValue($sql){
		$res=$this->getResult($sql);	
	    $row=mssql_fetch_array($res);
		return $row[0];
	}
	
	/**
	 * 返回数据的首行
	 *
	 * @param string $sql
	 * @return Array
	 */
	function sqlRow($sql){
		$res=$this->getResult($sql);	
	    $row=mssql_fetch_array($res,MSSQL_ASSOC);
		return $row;
	}
	
	//得到结果集
	function getResult($sql)
	{
		  $this->sql=$sql;
		  $this->result=@mssql_query($this->sql) or $this->debug("查询SQL有误，请核对字段和表名！");
          return $this->result;
	}
	
	//获得SqlServer的表结构，专有方法
	function getfields($sql,$colnum)
	{
	
		mssql_query("SET FMTONLY ON;",$this->conn);
		$array= mssql_fetch_field($this->getResult($sql),$colnum);	
		mssql_query("SET FMTONLY OFF;",$this->conn);
		list($key,$value)=each($array);		
		return $value;
		
	}
	
   //返回行数 
	function num_rows(){
		return mssql_num_rows($this->result);
	}
	
	
   
   
	//返回字段数目
	function num_fields(){
		
		return mssql_num_fields($this->result);
	}

	function list_tables($dbname=""){
		if (!empty($dbname)){
			$this->dbname = $dbname;
		}
		$this->row = mssql_list_tables($this->db_name);
		return $this->row;
	}

	function get_serverinfo(){
		return mssql_get_server_info();
	}

	function data_seek($row_number=0){
		return mssql_data_seek($this->conn, $row_number);
	}
   
	//返回自动编号
	function insert_id(){
			return mssql_insert_id();
	}

	
   //删除表
	function drop_db($dbname=""){
		return mssql_drop_db($dbname,$this->conn);
	}

	
	
	/**
	 * jpage分页v2.0，
	 *
	 * @param 查询语句，不需加limit $sqllist
	 * @param 汇总语句，可省略，省略将根据sqllist得到 $sqlcount
	 * @param 每页大小，默认20 $pagesize
	 * @param 页脚中导航的网址，一般默认 $url
	 * @return 返回一个结果集，同时可pagesize page属性
	 */
	function jpage($sql_list,$sql_count='',$pagesize=20,$url='')
{
              $sql_list=str_replace("  "," ",$sql_list);
              $sql_list=str_replace("　"," ",$sql_list);
	          $start=strripos($sql_list,"order by");
              if($start)
	           {
	             $sqlfoot=substr($sql_list,$start);
                 $sqlhead=substr($sql_list,0,$start); 
	           } 
	           else
	           {
	        
	           //当第一列认为主键
                $sqlhead=$sql_list;
                $prikey=$this->getfields($sql_list,0);  
                $sqlfoot=" order by ".$prikey." asc"; 
               }
               
	           //得到排序反转
	           $sqlsort=$this->getsqlSort($sqlfoot);
	           
	           //如果没设置汇总语句，则生成              
	           if(empty($sql_count))
	           $sql_count=$this->jpageCountSql($sqlhead);	
	                
	           //设置属性
	           $this->pagesize=$pagesize;
	           $res=$this->getResult($sql_count);	
	           
	           $row=mssql_fetch_array($res);
	                
			    //记录总数
			    $recordcount=$row[0];
			    //echo  $recordcount."<br>";		  
			    $page=$_REQUEST["page"];
			    if($page=="")
			      $page=1;
			    $this->page=$page;
			    //$sql_list=$sql_list." limit ".($page-1)*$pagesize.",".$pagesize;	
			  
			    //sql语句
			    $nextCount=$page*$pagesize;
			    $sql_list="SELECT * FROM (SELECT TOP $pagesize * FROM  (SELECT TOP $nextCount * FROM ($sqlhead) AS t0  $sqlfoot) AS t1 $sqlsort) AS t2 $sqlfoot";
			
			    $rs=$this->sqlArray($sql_list);
			    $this->jpageFoot($recordcount,$pagesize,$url);	   
			    return $rs;
}	

/**
 * 海量查询分页，jpage的别名 
 * @param 查询语句 $sql_list
 * @param 分页大小 $pagesize
 * @param 分页网址 $url
 * @return 二维数据
 */
function jpageSea($sql_list,$sql_count='',$pagesize=20,$url='')
{	
	return  $this->jpage($sql_list,$sql_count='',$pagesize=20,$url='');
}


/**
 * 小数据通用分页，只需一条语句,支持任何语句
 * 
 * @param 查询语句 $sql_list
 * @param 分页大小 $pagesize
 * @param 分页网址 $url
 * @return 二维数据
 */
function jpageRill($sql_list,$sql_count='',$pagesize=20,$url='')
{                 
	   return $this->jpage($sql_list,$sql_count='',$pagesize=20,$url=''); 
}	


/**
  $totle：信息总数；
  $pagesize：每页显示信息数，这里设置为默认是20；
  $url：分页导航中的链接，除了加入不同的查询信息“page”外的部分都与这个URL相同。
  默认值本该设为本页URL（即$_SERVER["REQUEST_URI"]）
 */
function jpageFoot($totle,$pagesize=20,$url=''){

	//假设网址为：http://localhost:8009/ccopen/admin/list.php?name=20&page=20
	global $page,$firstcount,$foot,$_SERVER;
	$page=$_REQUEST["page"];
	if(!$page) $page=1;

	//如果$url使用默认，即空值，则赋值为本页URL：
	if(!$url){ $url=$_SERVER["REQUEST_URI"];}

	//URL分析,用parse_url方式，将可整个网址，转为数组形式
	$parse_url=parse_url($url);
	$url_query=$parse_url["query"];

	//如明有参数（?号之后）,将参数整合
	if($url_query)
	{
		$url=$parse_url["path"];// 得到 ccopen/admin/list.php
		$url_query=preg_replace("/(^|&)page=".$page."/i","",$url_query);
		if($url_query)
		$url.="?".$url_query."&page";
		else
		$url.="?page";
	}
	else //无参数，直接赋?pgae
	{
		$url.="?page";
	}


//页码计算 $lastpg 最后一页,
$lastpg=ceil($totle/$pagesize);
$page=min($lastpg,$page);
$firstcount=($page-1)*$pagesize;
$prepg=$page-1; 
$nextpg=($page==$lastpg ? 0 : $page+1); 

//页脚字符串
switch ($this->style)
{
	case "base":
		$foot=baseStyle($page,$totle,$prepg,$nextpg,$lastpg,$url);
		break;
	case "data":
		$foot=dataStyle($page,$totle,$prepg,$nextpg,$lastpg,$url);
		break;
    case "num":
		$foot=numStyle($page,$totle,$prepg,$nextpg,$lastpg,$url);
		break;
	default:
	   $foot=defaultStyle($page,$totle,$prepg,$nextpg,$lastpg,$url);
		break;	
}

$this->foot=$foot;
}

//按from拆分sql
function jpageCountSql($sql)
{
	//$str=strstr($sql," from ");
	//return "select count(*) ".$str;
	return "select count(*) from (".$sql.") as t0";
}

/**
 * 获得记录的序号
 * @param 数组下标 $rowid
 * @return 整型
 */
function  jpageRowid($rowid)
{
	if($this->page=="")
     $page=1;
     else 
     $page=$this->page;
	return $rowid+1+($page-1)*$this->pagesize;
	
}


   //反转排序语句
   private function getsqlSort($sql)
   {
   $arr=explode(",",$sql);
   	$newsql = array();
   	while (list($key,$value)=each($arr)) {
   		if(!strpos($value,"desc")&&!strpos($value,"asc"))
   		$newsql[]=$value." desc";
   		elseif(strpos($value,"desc"))
   		$newsql[]=str_replace("desc","asc",$value);
   		elseif(strpos($value,"asc"))
   		$newsql[]=str_replace("asc","desc",$value);
   	}
   	$sql=implode($newsql,",");
   	return $sql;
   }


   /**
    * 执行键-值格式的数组语句
    * 事先，要通过addKey，addValue添加列和值
    * @param 表名 $table
    * @return 影响行数
    */
	function arrExecute($table){
		$sql=$this->getSql($table);
		$bool=@mssql_query($sql);
		$this->arraylist==null;//清空sql集合
        return $bool;
	}
	
	function debug($string)
	{
		if(db_debug==true)
		{
			die("□ Jwork Debug Messages：<br /><font color=red>".$string."</font>");
		}
		else 
		{
			die("数据错误，系统无法运行！请稍后...");
		}
		
	}
	function close(){
		 @mssql_close($this->conn);
	}
	
	function __destruct()
	{
		$this->close();
	}

}




?>