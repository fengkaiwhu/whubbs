<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>������̸</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript">

var comment=0;
var talk=0;

$.ajaxSetup ({
    cache: false //
});

function show(){
	$("#hiddentalk").load("gettalk.php?id="+talk); 
	$("#talk").html($("#hiddentalk").html()+$("#talk").html());
	$("#hiddencomment").load("getcomment.php?id="+comment); 
	$("#comment").html($("#hiddencomment").html()+$("#comment").html());
	talk = $("#talk").children().get(0).id;
	comment = $("#comment").children().get(0).id;
	$("#postbtn").attr("disabled",false);
}


$(document).ready(function(){	
	$("#talk").load("gettalk.php"); 	
	$("#comment").load("getcomment.php"); 
	
	$("#postbtn").click(function(){
			$("#postform").ajaxSubmit(function() {
				show();
				comment++;
				talk++;
				$("#postbtn").attr("disabled",true);
            });
	});
	setInterval(show,5000);
});
</script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="block_header">
      <div class="search">
      </div>
         <div class="header_text"></div>
    <div class="clr">
    </div>
    <div class="clr"></div>
      
    </div>
  </div>
    <div class="body">
    <div class="body_resize">
    <div class="left">
	<h2>���ս���</h2>
	<p><span>2009-3-3 ��̸����</span></p>
	<p>�����������뵽��<br />
	</p>
	<p>&nbsp;</p>
	<h2>���ڶԻ�</h2>
    <div id="talk">
    </div>
    </div>
    <div class="right" id="post">
    <h2>���ѷ���</h2>
    <form id="postform" method="post" action="post.php">
    <p>�ʺţ�<input name="user" type="text" size="21" /></p>
    <p>���룺<input name="password" type="password" size="23" /></p>      
    <p><textarea name="comment" cols="33" rows="10" ></textarea></p>
    <p><input id="postbtn" type="button" value="����" />
    </p>
    </form>
    </div>
    <div class="right">
	<h2>��������</h2>
    </div>
    <div class="right" id="comment">
    </div>
      <div class="clr"></div>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
  </div>
    <div class="footer">
      <div class="clr"></div>
  </div>
<span id="hiddentalk"></span>
<span id="hiddencomment"></span>
</div>
</body>
</html>