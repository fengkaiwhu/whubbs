<?php
/**
 * Jpage��ҳ v2.0
 * �˰��ҳ��ֻ֧��mssql���ݿ�
 * ��ҳ���ߣ�zuoyefeng.com
 */

include_once("function.php"); 
include_once("formfill.php"); 
include_once("pageStyle.php");
include_once('daosql.php');

class MsSqlDao extends Idao
{
	var $conn; //ȡ������
    var $result;   //ȡ�ý����
    var $sql;      //ȡ��sql���
   
   
  
    //�����ҳ������������������
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
  
    //�������ݿ�
	function connect(){
			$this->conn=@mssql_connect($this->server,$this->userid,$this->passid)  or  $this->debug("�������ݿ�����");
			$this->selectdb();
			return $this->conn;
	}

	function selectdb(){
		mssql_select_db($this->dbname,$this->conn);
	}


    /**
     * ִ��SQL���
     *
     * @param string $sql
     * @return int Ӱ������
     */
	function sqlExecute($sql){
	    $bool=@mssql_query($sql);
        return $bool;
	}
	
   /**
    * ��ѯ���ݣ��޷�ҳ��
    *
    * @param string $sql
    * @return Array(��ά����)
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
	 * ���� ��һ�У���һ�е�ֵ
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
	 * �������ݵ�����
	 *
	 * @param string $sql
	 * @return Array
	 */
	function sqlRow($sql){
		$res=$this->getResult($sql);	
	    $row=mssql_fetch_array($res,MSSQL_ASSOC);
		return $row;
	}
	
	//�õ������
	function getResult($sql)
	{
		  $this->sql=$sql;
		  $this->result=@mssql_query($this->sql) or $this->debug("��ѯSQL������˶��ֶκͱ�����");
          return $this->result;
	}
	
	//���SqlServer�ı�ṹ��ר�з���
	function getfields($sql,$colnum)
	{
	
		mssql_query("SET FMTONLY ON;",$this->conn);
		$array= mssql_fetch_field($this->getResult($sql),$colnum);	
		mssql_query("SET FMTONLY OFF;",$this->conn);
		list($key,$value)=each($array);		
		return $value;
		
	}
	
   //�������� 
	function num_rows(){
		return mssql_num_rows($this->result);
	}
	
	
   
   
	//�����ֶ���Ŀ
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
   
	//�����Զ����
	function insert_id(){
			return mssql_insert_id();
	}

	
   //ɾ����
	function drop_db($dbname=""){
		return mssql_drop_db($dbname,$this->conn);
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
              $sql_list=str_replace("  "," ",$sql_list);
              $sql_list=str_replace("��"," ",$sql_list);
	          $start=strripos($sql_list,"order by");
              if($start)
	           {
	             $sqlfoot=substr($sql_list,$start);
                 $sqlhead=substr($sql_list,0,$start); 
	           } 
	           else
	           {
	        
	           //����һ����Ϊ����
                $sqlhead=$sql_list;
                $prikey=$this->getfields($sql_list,0);  
                $sqlfoot=" order by ".$prikey." asc"; 
               }
               
	           //�õ�����ת
	           $sqlsort=$this->getsqlSort($sqlfoot);
	           
	           //���û���û�����䣬������              
	           if(empty($sql_count))
	           $sql_count=$this->jpageCountSql($sqlhead);	
	                
	           //��������
	           $this->pagesize=$pagesize;
	           $res=$this->getResult($sql_count);	
	           
	           $row=mssql_fetch_array($res);
	                
			    //��¼����
			    $recordcount=$row[0];
			    //echo  $recordcount."<br>";		  
			    $page=$_REQUEST["page"];
			    if($page=="")
			      $page=1;
			    $this->page=$page;
			    //$sql_list=$sql_list." limit ".($page-1)*$pagesize.",".$pagesize;	
			  
			    //sql���
			    $nextCount=$page*$pagesize;
			    $sql_list="SELECT * FROM (SELECT TOP $pagesize * FROM  (SELECT TOP $nextCount * FROM ($sqlhead) AS t0  $sqlfoot) AS t1 $sqlsort) AS t2 $sqlfoot";
			
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
function jpageRill($sql_list,$sql_count='',$pagesize=20,$url='')
{                 
	   return $this->jpage($sql_list,$sql_count='',$pagesize=20,$url=''); 
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
	//$str=strstr($sql," from ");
	//return "select count(*) ".$str;
	return "select count(*) from (".$sql.") as t0";
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


   //��ת�������
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
    * ִ�м�-ֵ��ʽ���������
    * ���ȣ�Ҫͨ��addKey��addValue����к�ֵ
    * @param ���� $table
    * @return Ӱ������
    */
	function arrExecute($table){
		$sql=$this->getSql($table);
		$bool=@mssql_query($sql);
		$this->arraylist==null;//���sql����
        return $bool;
	}
	
	function debug($string)
	{
		if(db_debug==true)
		{
			die("�� Jwork Debug Messages��<br /><font color=red>".$string."</font>");
		}
		else 
		{
			die("���ݴ���ϵͳ�޷����У����Ժ�...");
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