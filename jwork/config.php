<?php
/************************** data config *********************************/
// date_default_timezone_set (PRC); //ʱ������

//���ݿ��������
$db_type='mysql';  // mysql��ʾMysql��,mssql��ʾsqlserver
$db_host='localhost';
$db_user='whubbs';
$db_pass='bbswebwhu';
$db_name='video';



/*
//sql server ʾ��
$db_type='mssql';  // mysql��ʾMysql��,mssql��ʾsqlserver
$db_host='(local)';
$db_user='whubbs';
$db_pass='bbswebwhu';
$db_name='vote';
*/
$db_debug=true;

/************************** �������� *********************************/
/*
�ջ���"/"��ʾ��Ŀ¼��/web01����web01 ��ʾ��������λ�ڸ�Ŀ¼��web01Ŀ¼��
���ؿ�������ʱ�����Է���IIS��APACHE��Ŀ¼�µ�ĳ���ļ����ڣ����ʹ��JworkServer���ɻ�������λ��wwwrootĳ���ļ���
�ϴ�����������һ��أ���Ϊ��Ŀ¼��Ҫ��webpath��Ϊ�ա�
*/
$webpath=""; 


/************************** view config *********************************/

//ģ�����
$template_path="template";   //ģ��·�� ����ڵ�ǰ���е�phpҳ���·��
$template_debug=false;        //���õ���
$template_cachetime=0;       //����ʱ��(��) Ϊ0��ʾ���û��棬����0Ϊʱ��


/************************** upload config *********************************/
//�����ϴ��ļ�����
$uploadlist=".jpg|.txt|.gif|.png|.rar|.doc";
$uploadsize=2000; //��λΪK
$uploadpath="upload"; //�������վ��Ŀ¼

?>