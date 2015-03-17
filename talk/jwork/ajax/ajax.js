/**
* Jwork AJAX Frame v2.0
* www.ccopen.net
* 兼容 IE7 IE6 FireFox
*/

//创建XMLHttpRequest对象
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


//以POST方式发送数据
function jpost(url,input,output)
{
  
  createHttp();
  if(!jajax)
  {
    alert("Browser doesn't support ajax");
	return;
  }
 
   jajax.open("POST",url,true); 
 
  //定义传输的文件HTTP头信息
 
  jajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded;"); 


 
  if(input.indexOf("=")>=0)
   sendvalue=input;
  else
  {
    var formobj=document.getElementById(input);
	sendvalue=jform(formobj);
  }

  //发送POST数据
  jajax.send(sendvalue);
  jajax.onreadystatechange=function(){jshow(output)};

}

//以GET方式，发送数据
function jget(url,output)
{
  
  createHttp();
  if(!jajax)
  {
    alert("Browser doesn't support ajax");
	return;
  }
  //引入随时参数，保证get总刷新
  if(url.indexOf("?")>=0)
  url+="&rnd="+(new Date()).getTime();
  else
  url+="?rnd="+(new Date()).getTime();
  
  jajax.open("GET",url,true); 
  jajax.send(null);
  jajax.onreadystatechange=function(){jshow(output)};
}

//回调数据，显示
function jshow(output)
{

var bool=(jajax.readyState == 4&&jajax.status == 200);
if(bool)
   {
	
	jvalue=jajax.responseText;
	
	//如果返回控件未空，则不回显，只把jvalue赋值
    if(output==null||output=="")
    return;
	
	//回显信息，并把jvalue赋值
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

// 将FORM元素转换成字符串参数
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




