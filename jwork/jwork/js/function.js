// JavaScript Document
  window.open('filename','名称','width=300,height=60');
 
//只允许输入数字
function checkNumber()
{
	if(event.keyCode < 48 || event.keyCode >57) event.returnValue = false;
}

