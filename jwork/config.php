<?php
/************************** data config *********************************/
// date_default_timezone_set (PRC); //时区设置

//数据库相关配置
$db_type='mysql';  // mysql表示Mysql库,mssql表示sqlserver
$db_host='localhost';
$db_user='whubbs';
$db_pass='bbswebwhu';
$db_name='video';



/*
//sql server 示例
$db_type='mssql';  // mysql表示Mysql库,mssql表示sqlserver
$db_host='(local)';
$db_user='whubbs';
$db_pass='bbswebwhu';
$db_name='vote';
*/
$db_debug=true;

/************************** 基本设置 *********************************/
/*
空或者"/"表示根目录，/web01或者web01 表示整个程序位于根目录的web01目录下
本地开发测试时，可以放在IIS、APACHE根目录下的某个文件夹内，如果使用JworkServer集成环境，则位于wwwroot某个文件夹
上传到服务器，一般地，都为根目录，要将webpath设为空。
*/
$webpath=""; 


/************************** view config *********************************/

//模板参数
$template_path="template";   //模板路径 相对于当前运行的php页面的路径
$template_debug=false;        //启用调试
$template_cachetime=0;       //缓存时间(秒) 为0表示禁用缓存，大于0为时间


/************************** upload config *********************************/
//允许上传文件类型
$uploadlist=".jpg|.txt|.gif|.png|.rar|.doc";
$uploadsize=2000; //单位为K
$uploadpath="upload"; //相对于网站根目录

?>