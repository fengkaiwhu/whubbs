<?php

//$AnnounceBoard="Announce"; //�������

define("ANNOUNCENUMBER",5);  //��ҳ������ʾ�Ĺ�������

define("ARTICLESPERPAGE",30); //Ŀ¼�б���ÿҳ��ʾ��������

define("THREADSPERPAGE",15); //�����Ķ�ʱÿҳ��ʾ��������

define("BOARDS_PER_ROW", 3); //�۵������б�ÿ�а�����Ŀ

//define("SECTION_DEF_CLOSE", false); //��ҳ���������б���Ĭ��������Ƿ�ر�

//define ('MAINTITLE',' <a href="http://hb.qq.com/zt/2010/telecom2/index.htm" target="_blank"><img src="http://bbs.whu.edu.cn/ad/tianyi.gif" height="60" width="468" border="0"></a>'); //ҳ�����Ϸ���ʾ��վ�����
define ('MAINTITLE','<script src="/bbsad.js"></script><script>showContentAd();</script>'); //ҳ�����Ϸ���ʾ��վ
define('OLD_REPLY_STYLE', true); //ʹ�ô�ͳ telnet re �ķ�ʽ

define("ENABLE_UBB", true); //�Ƿ�֧�� UBB

define('SHOW_REGISTER_TIME', false); //�Ƿ�֧����ʾ��ʵ�û���Ϣ�������û�ע��ʱ�䣩

/* ������ÿ�����ߴ磬�����ߴ磬��������� */
define("ATTACHMAXSIZE","1048576");
define ("ATTACHMAXTOTALSIZE","10485760");
define("ATTACHMAXCOUNT","20");

define('SERVERTIMEZONE','����ʱ��'); //������ʱ��
//define("SHOW_SERVER_TIME", true); //��ʾ������ʱ��

define('SHOWTELNETPARAM', 0); //�Ƿ��������� telnet ��ר�õĸ��˲���

//define('MYFACEDIR','uploadFace/'); //�Զ���ͷ���ϴ�����λ��

define('MYFACEMAXSIZE','30720'); //�Զ���ͷ������ļ���С, ��λbyte

define('SHOWREPLYTREE', 1);  //�Ƿ�����ͼ��ʾ�ظ��ṹ

define('ALLOWMULTIQUERY', false); //�Ƿ�����һ���û�����ȫվ/������ѯ
define('ALLOW_SYSOP_MULTIQUERY', true); //�Ƿ��������Ա����ȫվ/������ѯ
define('ALLOW_SELF_MULTIQUERY', true); //�Ƿ�����ȫվ��ѯ�Լ����������

//define('AUTO_KICK', false); //һ���û���¼����ʱ���Զ����ǣ�������ʾ�����߳���ǰ�ĵ�¼

//define('SHOW_POST_UNREAD', true); //���������б��Ƿ���ʾ new ��δ����־

define('SMS_SUPPORT', 0); //�Ƿ������ֻ�����

//define('USER_FACE', 1); //�Ƿ������Զ���ͷ��

define("RSS_SUPPORT", true); //�Ƿ����� RSS

define("ONBOARD_USERS", false); //�Ƿ�������ʾ���������û�

//define('AUDIO_CHAT', 0); //�Ƿ���ʾ���������ҵ� link
	
$SiteURL = "http://bbs.whu.edu.cn/wForum/"; //վ�����ַ��ע�����һ���ַ������� '/'

$SiteName="����ɽˮBBS";   //վ������

$Banner="pic/ws.jpg"; //ҳ�����Ͻ���ʾ��ͼƬ

/* �������źͷ������� */
$section_nums = array("0", "1", "2", "3", "4","5","6","7","8");
$section_names = array(
    array("��վϵͳ", "[ϵͳ]"),
    array("�人��ѧ", "[���]"),
    array("����У��", "[����]"),
    array("��������", "[����]"),
    array("��ѧ����", "[��ѧ]"),
    array("��ѧ����", "[��ѧ]"),
    array("��������", "[����]"),
    array("��������", "[����]"),
    array("�����Ϣ", "[��Ϣ]"),
);


/* ���ݿ����� */
//define("DB_ENABLED", true); //�Ƿ��������ݿ�֧�֣�Ŀǰ������С�ֱ����������Ĭ���ǹرյģ�
$dbhost='localhost';
$dbuser='';
$dbpasswd='';
$dbname='';


$whuacc['������']='Whuof';
$whuacc['У���ܻ�']='WHUxyzh';
$whuacc['��֯��']='WHUzzb';
$whuacc['������']='WHUxcb';
$whuacc['ѧ����']='WHUxgb';
$whuacc['�й���']='WHUygb';
$whuacc['��ί']='WHUtw';
$whuacc['��չ�滮��']='WHUfzgh';
$whuacc['������Ժ']='WHUjwb';//����->������Ժ by davidxn 2014/02/21
$whuacc['�о���Ժ']='WHUyjs';
$whuacc['���²�']='WHUrsb';
$whuacc['����']='WHUcwb';
$whuacc['У԰������']='ecard';
$whuacc['���ʽ�����']='gjjlb';
$whuacc['�۰�̨��']='WHUgat';
$whuacc['ѧ����ҵָ�����������']='WHUzsjy';
$whuacc['�豸��']='sbc';
$whuacc['��������']='WHUjjb';
$whuacc['������']='WHUbwb';
$whuacc['���ڱ��ϲ�']='WHUhqbzb';
$whuacc['��������ѧԺ']='WHUjxjy';
$whuacc['ͼ���']='WHUtsg ';
$whuacc['��Ϣ����1']='NOC';
$whuacc['��Ϣ����2']='lilywei';
$whuacc['������']='WHUtyb';
$whuacc['УҽԺ']='WHUyy';
$whuacc['���ڷ�����']='WHUhqjt';
$whuacc['��ʳ��������']='HQJTyinshi';
$whuacc['�޽�����']='HQJTsujiao';
$whuacc['�����������']='HQJTyunshu';
$whuacc['��������']='HQJThuanwei';
$whuacc['��������']='whugrzx';
$whuacc['Уѧ����Ȩ�沿']='xhqy';
$whuacc['��Ȼ�Ķ�~�ǳ�����']='zgfcwr';
$whuacc['ɽˮС����1']='WHULJSShelp';
$whuacc['���г�Э��']='cyclist';
$whuacc['У��ί']='whucyl';
$whuacc['��������ѧԺ']='whuggws';



require "default.php";
?>
