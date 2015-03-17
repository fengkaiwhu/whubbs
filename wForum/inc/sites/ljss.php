<?php

//$AnnounceBoard="Announce"; //公告版面

define("ANNOUNCENUMBER",5);  //首页滚动显示的公告数量

define("ARTICLESPERPAGE",30); //目录列表下每页显示的主题数

define("THREADSPERPAGE",15); //文章阅读时每页显示的文章数

define("BOARDS_PER_ROW", 3); //折叠版面列表每行版面数目

//define("SECTION_DEF_CLOSE", false); //首页分区版面列表在默认情况下是否关闭

//define ('MAINTITLE',' <a href="http://hb.qq.com/zt/2010/telecom2/index.htm" target="_blank"><img src="http://bbs.whu.edu.cn/ad/tianyi.gif" height="60" width="468" border="0"></a>'); //页面正上方显示的站点标题
define ('MAINTITLE','<script src="/bbsad.js"></script><script>showContentAd();</script>'); //页面正上方显示的站
define('OLD_REPLY_STYLE', true); //使用传统 telnet re 文方式

define("ENABLE_UBB", true); //是否支持 UBB

define('SHOW_REGISTER_TIME', false); //是否支持显示真实用户信息（包括用户注册时间）

/* 附件：每个最大尺寸，总最大尺寸，总最大数量 */
define("ATTACHMAXSIZE","1048576");
define ("ATTACHMAXTOTALSIZE","10485760");
define("ATTACHMAXCOUNT","20");

define('SERVERTIMEZONE','北京时间'); //服务器时区
//define("SHOW_SERVER_TIME", true); //显示服务器时间

define('SHOWTELNETPARAM', 0); //是否允许配置 telnet 下专用的个人参数

//define('MYFACEDIR','uploadFace/'); //自定义头像上传保存位置

define('MYFACEMAXSIZE','30720'); //自定义头像最大文件大小, 单位byte

define('SHOWREPLYTREE', 1);  //是否用树图显示回复结构

define('ALLOWMULTIQUERY', false); //是否允许一般用户进行全站/多版面查询
define('ALLOW_SYSOP_MULTIQUERY', true); //是否允许管理员进行全站/多版面查询
define('ALLOW_SELF_MULTIQUERY', true); //是否允许全站查询自己发表的文章

//define('AUTO_KICK', false); //一个用户登录过多时是自动（是）还是提示（否）踢出以前的登录

//define('SHOW_POST_UNREAD', true); //版面帖子列表是否显示 new 的未读标志

define('SMS_SUPPORT', 0); //是否允许手机短信

//define('USER_FACE', 1); //是否允许自定义头像

define("RSS_SUPPORT", true); //是否允许 RSS

define("ONBOARD_USERS", false); //是否允许显示版面在线用户

//define('AUDIO_CHAT', 0); //是否显示语音聊天室的 link
	
$SiteURL = "http://bbs.whu.edu.cn/wForum/"; //站点根地址，注意最后一个字符必须是 '/'

$SiteName="珞珈山水BBS";   //站点名称

$Banner="pic/ws.jpg"; //页面左上角显示的图片

/* 分区代号和分区名称 */
$section_nums = array("0", "1", "2", "3", "4","5","6","7","8");
$section_names = array(
    array("本站系统", "[系统]"),
    array("武汉大学", "[武大]"),
    array("乡情校谊", "[乡情]"),
    array("电脑网络", "[电脑]"),
    array("科学技术", "[科学]"),
    array("文学艺术", "[文学]"),
    array("休闲娱乐", "[娱乐]"),
    array("体育健身", "[体育]"),
    array("社会信息", "[信息]"),
);


/* 数据库配置 */
//define("DB_ENABLED", true); //是否启用数据库支持，目前仅用于小字报，这个功能默认是关闭的！
$dbhost='localhost';
$dbuser='';
$dbpasswd='';
$dbname='';


$whuacc['党政办']='Whuof';
$whuacc['校友总会']='WHUxyzh';
$whuacc['组织部']='WHUzzb';
$whuacc['宣传部']='WHUxcb';
$whuacc['学工部']='WHUxgb';
$whuacc['研工部']='WHUygb';
$whuacc['团委']='WHUtw';
$whuacc['发展规划办']='WHUfzgh';
$whuacc['本科生院']='WHUjwb';//教务部->本科生院 by davidxn 2014/02/21
$whuacc['研究生院']='WHUyjs';
$whuacc['人事部']='WHUrsb';
$whuacc['财务部']='WHUcwb';
$whuacc['校园卡中心']='ecard';
$whuacc['国际交流部']='gjjlb';
$whuacc['港澳台办']='WHUgat';
$whuacc['学生就业指导与服务中心']='WHUzsjy';
$whuacc['设备处']='sbc';
$whuacc['基建管理部']='WHUjjb';
$whuacc['保卫部']='WHUbwb';
$whuacc['后勤保障部']='WHUhqbzb';
$whuacc['继续教育学院']='WHUjxjy';
$whuacc['图书馆']='WHUtsg ';
$whuacc['信息中心1']='NOC';
$whuacc['信息中心2']='lilywei';
$whuacc['体育部']='WHUtyb';
$whuacc['校医院']='WHUyy';
$whuacc['后勤服务集团']='WHUhqjt';
$whuacc['饮食服务中心']='HQJTyinshi';
$whuacc['宿教中心']='HQJTsujiao';
$whuacc['运输服务中心']='HQJTyunshu';
$whuacc['环卫中心']='HQJThuanwei';
$whuacc['供热中心']='whugrzx';
$whuacc['校学生会权益部']='xhqy';
$whuacc['怦然心动~非诚勿扰']='zgfcwr';
$whuacc['山水小助手1']='WHULJSShelp';
$whuacc['自行车协会']='cyclist';
$whuacc['校团委']='whucyl';
$whuacc['公共卫生学院']='whuggws';



require "default.php";
?>
