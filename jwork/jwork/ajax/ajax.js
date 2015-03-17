/**
* Jwork AJAX Frame v2.0
* www.ccopen.net
* ���� IE7 IE6 FireFox
*/

//����XMLHttpRequest����
var jajax;
var jvalue="";

function createHttp(){
	try{
		jajax= window.XMLHttpRequest ? new XMLHttpRequest(): new ActiveXObject("Microsoft.XMLHTTP");
	}
	catch (e){
		jajax	= false;
	}
	return jajax;
}


//��POST��ʽ��������
function jpost(url,input,output)
{
  
  createHttp();
  if(!jajax)
  {
    alert("Browser doesn't support ajax");
	return;
  }
 
   jajax.open("POST",url,true); 
 
  //���崫����ļ�HTTPͷ��Ϣ
 
  jajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded;"); 


 
  if(input.indexOf("=")>=0)
   sendvalue=input;
  else
  {
    var formobj=document.getElementById(input);
	sendvalue=jform(formobj);
  }

  //����POST����
  jajax.send(sendvalue);
  jajax.onreadystatechange=function(){jshow(output)};

}

//��GET��ʽ����������
function jget(url,output)
{
  
  createHttp();
  if(!jajax)
  {
    alert("Browser doesn't support ajax");
	return;
  }
  //������ʱ��������֤get��ˢ��
  if(url.indexOf("?")>=0)
  url+="&rnd="+(new Date()).getTime();
  else
  url+="?rnd="+(new Date()).getTime();
  
  jajax.open("GET",url,true); 
  jajax.send(null);
  jajax.onreadystatechange=function(){jshow(output)};
}

//�ص����ݣ���ʾ
function jshow(output)
{

var bool=(jajax.readyState == 4&&jajax.status == 200);
if(bool)
   {
	
	jvalue=jajax.responseText;
	
	//������ؿؼ�δ�գ��򲻻��ԣ�ֻ��jvalue��ֵ
    if(output==null||output=="")
    return;
	
	//������Ϣ������jvalue��ֵ
   var obj=document.getElementById(output);
   
    
   if(obj==null)
   {
    alert(output+ " doesn't find  in the page !");
    return;
    }
	
	var type=obj.type;
	
	
	switch(type)
	{
	 case 'text':
	  case 'password':
	 case 'textarea':
	 case 'hidden':
	  obj.value =jvalue;
	   break;
	 default:
	  obj.innerHTML= jvalue;
	  break;
	}
	}
}

// ��FORMԪ��ת�����ַ�������
function jform(form_obj) {
	var query_string="";
	var and="";
	for (var i=0; i<form_obj.length; i++) {
		e=form_obj[i];
		if (e.name) {
			if (e.type=="select-one") {
				element_value=e.options[e.selectedIndex].value;
			} else if (e.type=="select-multiple") {
				for (var n=0; n<e.length; n++) {
					var op=e.options[n];
					if (op.selected) {
						query_string+=and+e.name+'='+encodeURIComponent(op.value);
						and="&"
					}
				}
				continue;
			} else if (e.type=="checkbox" || e.type=="radio") {
				if (e.checked==false) {
					continue;   
				}
				element_value=e.value;
			} else if (typeof e.value != "undefined") {
				element_value=e.value;
			} else {
				continue;
			}
			query_string+=and+e.name+"="+encodeURIComponent(element_value);
			and="&"
		}
	}
	return query_string;
}




