<?php
	require("www2-funcs.php");
	require("config.php");
	require("uc_client/client.php");
	
	require("new_add_file.php");
	login_init();
	cache_header("nocache");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<script type="text/javascript" src="static/www2-main.js"></script>
<script type="text/javascript"><!--
	writeCssLeft();
	top.document.title = '欢迎莅临<?php echo BBS_FULL_NAME; ?>';
//-->
</script>
<script src="wForum/bbsleft.js" language="JavaScript"></script>
<script type="text/javascript" src="static/bbsleft.js"></script>
<script language="JavaScript">
<!--
    colsDefine = top.document.getElementById('mainframe').cols;
//-->
</script>
<!--[if IE]>
<style type="text/css">
.t2,.logo {
	width: 167px;
}
</style>
<![endif]-->
<base target="main" />
</head>
<body>

<!--站点标志-->
<!--<?php if (defined("SITE_NEWSMTH")) { ?>
<script type="text/javascript">putImage('t1.gif','class="pm"');</script>
<?php } else { ?>
<center style="padding: 0.3em;font-weight:bold;font-size:120%;"><?php echo BBS_FULL_NAME; ?></center>
<?php } ?>-->

<div id="left_affix">
    <div id="nav_left" class="nav_left" data-spy="affix" data-offset-top="30">
        <div class ="items">
            <a id="top_ten" href="./topicList.php" title="Hot十大话题">
                <img width ="28" height="24" src="img/icon-leftnav-topTen.png" alt="Hot十大话题">
            </a>
        </div >
        <div class="items">
            <a id="recommand" href="./topicList.php" title="推荐文章">
                <img width="100" height="100" src="img/icon-leftnav-recommand.png" alt="推荐文章">
            </a>
        </div>
        <div class="items">
            <a id="newest" href="./vote.php" title="今日新帖">
                <img width="100" height="100" src="img/icon-leftnav-newest.png" alt="今日新帖">
            </a>
        </div>
        <?php
		if($currentuser["userid"]=="guest")
		{
		}else{
	?>
	<div class="items">
            <a id="lecture" href="./usermanagemenu.php" title="个人中心">
                <img width="100" height="100" src="img/icon-leftnav-lecture.png" alt="个人中心">
            </a>
        </div>
	<?php
		}
	?>
        <div class="items">
            <a id="notification" href="./board.php" title="组织公告">
                <img width="100" height="100" src="img/icon-leftnav-notification.png" alt="组织公告">
            </a>
        </div>
        <div class="items">
            <a id="poster" href="javascripte:void(0);" title="海报">
                <img width="100" height="100" src="img/icon-leftnav-poster.png" alt="海报">
            </a>
        </div>
        <div class="items">
            <a id="telnet" href="telnet:bbs.whu.edu.cn" title="telnet">
                <img width="100" height="100" src="img/icon-leftnav-telnet.png" alt="telnet">
            </a>
        </div>
        <?php
		if($currentuser["userid"]=="guest")
		{
		}else{
	?>
        <div class="items">
            <a id="post" href="./postarticle.php" title="发帖">
                <img width="100" height="100" src="img/icon-leftnav-post.png" alt="发帖">
            </a>
        </div>
        	<?php
		}
	?>
    </div>
</div>


</body>
</html>
