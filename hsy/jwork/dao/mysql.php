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

    var $conn; //ȡ������
    var $result;   //ȡ�ý����
    var $sql;      //ȡ��sql���
   
   
  
    //�����ҳ������������������
    var $foot="no pages";
    var $pagesize;
    var $page;
    var $style="default";
    
   /**
    * ���캯�����������ݿ��ַ�����Ĭ��Ϊ�����ļ�ָ��������
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
    
    //�������ݿ�
	function connect(){
		    $this->conn= @mysql_connect($this->server,$this->userid,$this->passid,true)  or  $this->debug();
			mysql_query("SET NAMES '".$this->dbcharset."'");//���ñ���
			$this->selectdb();
			return $this->conn;
	}

	function selectdb(){
		mysql_select_db($this->dbname,$this->conn);
	}


     /**
      * ִ��sql���.
      *
      * @param string $sql
      * @return bolean ����true��false
      */
	function sqlExecute($sql){
		$bool=@mysql_query($sql,$this->conn);
		return $bool;
	}
	
   /**
    * ��ͨ��ѯ����(�޷�ҳ)
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
	 * �õ���һ�е�һ�е�ֵ
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
	 * ����һ�У�һ�������޸�����
	 *
	 * @param string $sql
	 * @return Array
	 */
	function sqlRow($sql){
		$res=$this->getResult($sql);	
	    $row=mysql_fetch_array($res,MYSQL_ASSOC);
		return $row;
	}
	
	//�õ������
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
	
   //�������� 
	function num_rows(){
		return mysql_num_rows($this->result);
	}
   
	// �����ֶ���Ŀ
	function num_fields(){
		
		return mysql_num_fields($this->result);
	}
    
	// �г� MySQL ���ݿ��еı�
	function list_tables($dbname=""){
		if (!empty($dbname)){
			$this->dbname = $dbname;
		}
		$table=mysql_list_tables($this->db_name);
		return $table;
	}

	// ����mysql�汾
	function get_serverinfo(){
		return mysql_get_server_info();
	}

	function data_seek($row_number=0){
		return mysql_data_seek($this->conn, $row_number);
	}
   
	//�����Զ����
	function insert_id(){
			return mysql_insert_id();
	}

	
 

	
	
	
	/**
	 * jpage��ҳv2.0��
	 *
	 * @param ��ѯ��䣬�����limit $sqllist
	 * @param ������䣬��ʡ�ԣ�ʡ�Խ�����sqllist�õ� $sqlcount
	 * @param ÿҳ��С��Ĭ��20 $pagesize
	 * @param ҳ���е�������ַ��һ��Ĭ�� $url
	 * @return ����һ���������ͬʱ��pagesize page����
	 */
	function jpage($sql_list,$sql_count='',$pagesize=20,$url='')
	{
		//���û���û�����䣬������
		if(isset($sql_count)||empty($sql_count))
		$sql_count=$this->jpageCountSql($sql_list);
		//��������
		$this->pagesize=$pagesize;
		$pagesize=$this->pagesize;
		
		$res=$this->getResult($sql_count);
		$row=mysql_fetch_array($res);
		//��¼����
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
   * ������ѯ��ҳ��jpage�ı��� 
   * @param ��ѯ��� $sql_list
   * @param ��ҳ��С $pagesize
   * @param ��ҳ��ַ $url
   * @return ��ά����
   */
	function jpageSea($sql_list,$sql_count='',$pagesize=20,$url='')
	{
		return  $this->jpage($sql_list,$sql_count='',$pagesize=20,$url='');
	}


   /**
   * С����ͨ�÷�ҳ��ֻ��һ�����,֧���κ����
   * 
   * @param ��ѯ��� $sql_list
   * @param ��ҳ��С $pagesize
   * @param ��ҳ��ַ $url
   * @return ��ά����
   */
	function jpageRill($sql_list,$pagesize=20,$url='')
	{
		//���û���û�����䣬������
		$sql_count="select count(*) from (".$sql_list.") as jpage";
		$sql_list="select jpage.* from (".$sql_list.") as jpage";

		$res=$this->getResult($sql_count);
		$row=mysql_fetch_array($res);
		//��¼����
		$recordcount=$row[0];
		$page=$_REQUEST["page"];
		if($page=="")
		$page=1;
		$sql_list=$sql_list." limit ".($page-1)*$pagesize.",".$pagesize;
		$rs=$this->sqlArray($sql_list);
		$this->jpageFoot($recordcount,$pagesize,$url);

		//��������
		$this->pagesize=$pagesize;
		$this->page=$page;
		return $rs;
	}


   /**
   $totle����Ϣ������
   $pagesize��ÿҳ��ʾ��Ϣ������������ΪĬ����20��
   $url����ҳ�����е����ӣ����˼��벻ͬ�Ĳ�ѯ��Ϣ��page����Ĳ��ֶ������URL��ͬ��
   Ĭ��ֵ������Ϊ��ҳURL����$_SERVER["REQUEST_URI"]��
   */
  function jpageFoot($totle,$pagesize=20,$url=''){

	//������ַΪ��http://localhost:8009/ccopen/admin/list.php?name=20&page=20
	global $page,$firstcount,$foot,$_SERVER;
	$page=$_REQUEST["page"];
	if(!$page) $page=1;

	//���$urlʹ��Ĭ�ϣ�����ֵ����ֵΪ��ҳURL��
	if(!$url){ $url=$_SERVER["REQUEST_URI"];}

	//URL����,��parse_url��ʽ������������ַ��תΪ������ʽ
	$parse_url=parse_url($url);
	$url_query=$parse_url["query"];

	//�����в�����?��֮��,����������
	if($url_query)
	{
		$url=$parse_url["path"];// �õ� ccopen/admin/list.php
		$url_query=preg_replace("/(^|&)page=".$page."/i","",$url_query);
		if($url_query)
		$url.="?".$url_query."&page";
		else
		$url.="?page";
	}
	else //�޲�����ֱ�Ӹ�?pgae
	{
		$url.="?page";
	}


	//ҳ����� $lastpg ���һҳ,
	$lastpg=ceil($totle/$pagesize);
	$page=min($lastpg,$page);
	$firstcount=($page-1)*$pagesize;
	$prepg=$page-1;
	$nextpg=($page==$lastpg ? 0 : $page+1);

	//ҳ���ַ���
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

  //��from���sql
  function jpageCountSql($sql)
  {
  	$str=strstr($sql," from ");
  	return "select count(*) ".$str;
  }

  /**
 * ��ü�¼�����
 * @param �����±� $rowid
 * @return ����
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
    * ִ�м�-ֵ��ʽ���������
    * ���ȣ�Ҫͨ��addKey��addValue����к�ֵ
    * @param ���� $table
    * @return ����boolean
    */
	function arrExecute($table){
			
		$sql=$this->getSql($table);
		$bool=@mysql_query($sql);
		$this->arraylist==null;//���sql����
        return $bool;
	}
	
	function debug()
	{
		if(db_debug==true)
		{
			die("�� Jwork Debug Messages��<br /><font color=red>".mysql_error($this->conn)."</font>");
		}
		else 
		{
			die("���ݴ���ϵͳ�޷����У����Ժ�...");
		}
		
	}
	
	/**
	 * �رյ�ǰ���ݿ�����	
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