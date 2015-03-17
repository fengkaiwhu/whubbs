<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>珞珈网谈</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript">

var talk=0;

$.ajaxSetup ({
    cache: false //
});

function show(){
	$("#hiddentalk").load("gettalk.php?id="+talk); 
	$("#talk").html($("#hiddentalk").html()+$("#talk").html());
	talk = $("#talk").children().get(0).id;
}


$(document).ready(function(){	
	$("#talk").load("gettalk.php"); 	
	setInterval(show,5000);
});
</script>
</head>
<body style="font-size:12px;padding:10px;width:500px;">
    <div id="talk">
    </div>
<span id="hiddentalk"></span>
</body>
</html>