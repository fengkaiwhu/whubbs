<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>珞珈网谈</title>
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
	$("#hiddencomment").load("getcomment.php?id="+comment); 
	$("#comment").html($("#hiddencomment").html()+$("#comment").html());
	comment = $("#comment").children().get(0).id;
	$("#postbtn").attr("disabled",false);
}


$(document).ready(function(){		
	$("#comment").load("getcomment.php"); 
	
	$("#postbtn").click(function(){
			$("#postform").ajaxSubmit(function() {
				show();
				comment++;
				$("#postbtn").attr("disabled",true);
            });
	});
	setInterval(show,5000);
});
</script>
</head>
<body style="font-size:12px;padding:10px;width:200px;">
    <form id="postform" method="post" action="post.php">
    <p>帐号：<input name="user" type="text" size="21" /></p>
    <p>密码：<input name="password" type="password" size="23" /></p>      
    <p><textarea name="comment" cols="25" rows="5" ></textarea></p>
    <p><input id="postbtn" type="button" value="发言" />
    </p>
    </form>
    <div class="right" id="comment">
    </div>
<span id="hiddencomment"></span>
</div>
</body>
</html>