<?php
define('UC_CLIENT_VERSION', '1.5.0');	//note UCenter �汾��ʶ
define('UC_CLIENT_RELEASE', '20081031');

define('API_DELETEUSER', 1);		//note �û�ɾ�� API �ӿڿ���
define('API_RENAMEUSER', 1);		       //note �û����� API �ӿڿ���
define('API_GETTAG', 1); 		       //note ��ȡ��ǩ API �ӿڿ���
define('API_SYNLOGIN', 1);		       	      //note ͬ����¼ API �ӿڿ���
define('API_SYNLOGOUT', 1);			      	     //note ͬ���ǳ� API �ӿڿ���
define('API_UPDATEPW', 1);				     	    //note �����û����� ����
define('API_UPDATEBADWORDS', 1);				    //note ���¹ؼ����б� ����
define('API_UPDATEHOSTS', 1);					    	   //note ���������������� ����
define('API_UPDATEAPPS', 1);						   	  //note ����Ӧ���б� ����
define('API_UPDATECLIENT', 1);							  	 //note ���¿ͻ��˻��� ����
define('API_UPDATECREDIT', 1);								 	//note �����û����� ����
define('API_GETCREDITSETTINGS', 1);								//note �� UCenter �ṩ�������� ����
define('API_GETCREDIT', 1);									//note ��ȡ�û���ĳ����� ����
define('API_UPDATECREDITSETTINGS', 1);								//note ����Ӧ�û������� ����

define('API_RETURN_SUCCEED', '1');
define('API_RETURN_FAILED', '-1');
define('API_RETURN_FORBIDDEN', '-2');
class uc_note {

											       function test($get, $post) {
											       		return API_RETURN_SUCCEED;
													}
															
															/* ����ӿ���Ŀ */

}
?>