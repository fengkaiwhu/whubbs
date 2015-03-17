<?php
/**
 * Jwork v2.0
 * www.ccopen.net
 */
include_once("function.php"); 
include_once("formfill.php"); 
include_once("pageStyle.php");
include_once('daosql.php');

class MysqlDao extends Idao
{

    var $conn; //取得连接
    var $result;   //取得结果集
    var $sql;      //取得sql语句
   
   
  
    //如果分页，还有以下两个参数
    var $foot="no pages";
    var $pagesize;
    var $page;
    var $style="default";
    
   /**
    * 构造函数，参数数据库字符串，默认为配置文件指定的连接
    *
    * @param string $connstr
    */
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
		    $this->conn= @mysql_connect($this->server,$this->userid,$this->passid,true)  or  $this->debug();
			mysql_query("SET NAMES '".$this->dbcharset."'");//设置编码
			$this->selectdb();
			return $this->conn;
	}

	function selectdb(){
		mysql_select_db($this->dbname,$this->conn);
	}


     /**
      * 执行sql语句.
      *
      * @param string $sql
      * @return bolean 返回true或false
      */
	function sqlExecute($sql){
		$bool=@mysql_query($sql,$this->conn);
		return $bool;
	}
	
   /**
    * 普通查询方法(无分页)
    *
    * @param string $sql
    * @return Array
    */
	function sqlArray($sql){
		$record = array();
		$result=$this->getResult($sql);			
		while ($tmp_info = mysql_fetch_array($result, MYSQL_ASSOC) ){
			$record[] = $tmp_info;
		}
		return $record;
	}
	
	/**
	 * 得到第一行第一列的值
	 *
	 * @param string $sql
	 * @return string
	 */
	function sqlValue($sql){
		$res=$this->getResult($sql);	
	    $row=mysql_fetch_array($res);
		return $row[0];
	}
	
	/**
	 * 返回一行，一般用于修改数据
	 *
	 * @param string $sql
	 * @return Array
	 */
	function sqlRow($sql){
		$res=$this->getResult($sql);	
	    $row=mysql_fetch_array($res,MYSQL_ASSOC);
		return $row;
	}
	
	//得到结果集
	function getResult($sql)
	{
		  $this->sql=$sql;
		  if (!($this->result=mysql_query($this->sql,$this->conn) or $this->debug()))
			{
					if (mysql_errno()>0)
						die("<br>.MySQL error".mysql_errno().":".mysql_error());
			}
		  
		  
		  return $this->result;
	}
	
   //返回行数 
	function num_rows(){
		return mysql_num_rows($this->result);
	}
   
	// 返回字段数目
	function num_fields(){
		
		return mysql_num_fields($this->result);
	}
    
	// 列出 MySQL 数据库中的表
	function list_tables($dbname=""){
		if (!empty($dbname)){
			$this->dbname = $dbname;
		}
		$table=mysql_list_tables($this->db_name);
		return $table;
	}

	// 返回mysql版本
	function get_serverinfo(){
		return mysql_get_server_info();
	}

	function data_seek($row_number=0){
		return mysql_data_seek($this->conn, $row_number);
	}
   
	//返回自动编号
	function insert_id(){
			return mysql_insert_id();
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
		//如果没设置汇总语句，则生成
		if(isset($sql_count)||empty($sql_count))
		$sql_count=$this->jpageCountSql($sql_list);
		//设置属性
		$this->pagesize=$pagesize;
		$pagesize=$this->pagesize;
		
		$res=$this->getResult($sql_count);
		$row=mysql_fetch_array($res);
		//记录总数
		$recordcount=$row[0];
		//echo  $recordcount."<br>";
		$page=$_REQUEST["page"];
		if($page=="")
		$page=1;
		$this->page=$page;
		$sql_list=$sql_list." limit ".($page-1)*$pagesize.",".$pagesize;
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
	function jpageRill($sql_list,$pagesize=20,$url='')
	{
		//如果没设置汇总语句，则生成
		$sql_count="select count(*) from (".$sql_list.") as jpage";
		$sql_list="select jpage.* from (".$sql_list.") as jpage";

		$res=$this->getResult($sql_count);
		$row=mysql_fetch_array($res);
		//记录总数
		$recordcount=$row[0];
		$page=$_REQUEST["page"];
		if($page=="")
		$page=1;
		$sql_list=$sql_list." limit ".($page-1)*$pagesize.",".$pagesize;
		$rs=$this->sqlArray($sql_list);
		$this->jpageFoot($recordcount,$pagesize,$url);

		//设置属性
		$this->pagesize=$pagesize;
		$this->page=$page;
		return $rs;
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
  	$str=strstr($sql," from ");
  	return "select count(*) ".$str;
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



   /**
    * 执行键-值格式的数组语句
    * 事先，要通过addKey，addValue添加列和值
    * @param 表名 $table
    * @return 返回boolean
    */
	function arrExecute($table){
			
		$sql=$this->getSql($table);
		$bool=@mysql_query($sql);
		$this->arraylist==null;//清空sql集合
        return $bool;
	}
	
	function debug()
	{
		if(db_debug==true)
		{
			die("□ Jwork Debug Messages：<br /><font color=red>".mysql_error($this->conn)."</font>");
		}
		else 
		{
			die("数据错误，系统无法运行！请稍后...");
		}
		
	}
	
	/**
	 * 关闭当前数据库连接	
	 */
	function close(){
		 @mysql_close($this->conn);
	}
	
	function __destruct()
	{
		$this->close();
	}

}

?>