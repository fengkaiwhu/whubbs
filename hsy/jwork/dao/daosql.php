<?php
//PY:www.ChinaJwork.Org//
include_once('commsql.php');

//定义为常量
define("db_server",$db_host);
define("db_user",$db_user);
define("db_pass",$db_pass);
define("db_name",$db_name);
define("db_charset",$db_charset);
define("db_debug",$db_debug);


abstract  class Idao extends Commsql 
{
	var $server=db_server;
	var $userid=db_user;
	var $passid=db_pass;
	var $dbname=db_name;
	var $dbcharset=db_charset;
	
	// 抽象方法
	abstract  function connect();
	abstract  function sqlExecute($sql);
	abstract  function sqlArray($sql);
	abstract  function sqlRow($sql);
	abstract  function sqlValue($sql);
	abstract  function getResult($sql);
	abstract  function insert_id();
	abstract  function jpage($sql_list,$sql_count='',$pagesize=20,$url='');
	abstract  function jpageSea($sql_list,$sql_count='',$pagesize=20,$url='');
	abstract  function jpageRill($sql_list,$pagesize=20,$url='');
	abstract  function jpageRowid($rowid);
	abstract  function arrExecute($table);
	abstract  function close();

	
}

?>