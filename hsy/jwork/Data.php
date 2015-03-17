<?php
include_once('config.php');

if($db_type=="mssql")
{
 include_once('dao/mssql.php');
 class Data extends MsSqlDao{};
}
elseif ($db_type=="mysql")
{
 include_once('dao/mysql.php');
 class Data extends  MysqlDao {};
}
elseif ($db_type=="oracle")
{
 include_once('dao/oracle.php');
 class Data extends  OracleDao {};
}


 
?>