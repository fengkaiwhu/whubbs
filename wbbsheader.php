<html>
<head>
<title></title>
<?php
	$setboard=0;
    	require("www2-funcs.php");
    	require("new_add_file.php");
	login_init();
	page_header("状态", FALSE);

	$unread = false;	
	if (strcmp($currentuser["userid"], "guest")) {
		$tn = bbs_mail_get_num($currentuser["userid"]);
		if ($tn) {
			$unread = $tn["newmail"];//有多少封未读
			$total = $tn["total"];//表示信箱总共有多少封信
		}
	}
?>
<meta http-equiv="refresh" content="120;url=wbbsheader.php">
</head>
<body>

<!--header begin--> 
<div id="header" role="navigation">
    <a id="logo" href="./wForum/frames.php" title="珞珈山水BBS">
        <img width="100" height="100" src="img/logo.png" alt="珞珈山水BBS">
    </a>

    <ul class="breadcrumb" id="breadcrumb">
      <li id="breadcrumb-1"><a href="./index.php">珞珈山水BBS</a> <span class="divider">/</span></li>
      <li id="breadcrumb-2"><a href="javascript:void(0);">测试1层</a> <span class="divider">/</span></li>
      <li class="active" id="breadcrumb-3">测试2层</li>
    </ul>
	
	<?php if (strcmp($currentuser["userid"],"guest")) { ?>
    <ul id="nav" class="nav-main">
        <li class="items" id="li-1">
            <a id="message" href="javascript:void(0);" title="私信">
                <img  src="img/icon-message.png" alt="私信">
            </a>
        </li>

        <li class="items">
            <a id="setting" href="./usermanagemenu.php" title="设置">
                <img  src="img/icon-setting.png" alt="设置">
            </a>
        </li>
        <li class="items">
        	<a id="user" href="#个人中心" title="user">
                	<?php
                		echo "您好！".$currentuser["userid"]; 
                	?>
            	</a>
        </li>
        <li class="items">
        	<a id="loginout" href="#注销" title="loginout">
                	注销
            	</a>
        </li>
	<?php } else {?>
        <li class="items">
            <a id="login" href="#loginModal" data-toggle="modal" title="登录">
                登录
            </a>
        </li>

        <li class="items" >
            <a id="register" href="#registerModal" data-toggle="modal" title="注册">
                注册
            </a>
        </li>
        <?php } ?>

    </ul>

    
    <div id="box-1" class="hidden-box hidden-loc-index">
            <ul>
                <li><a href="./usermailbox.php"><span>私信</span>
                 <span title="" class="whitespacelittle" >
                     <?php echo $unread; ?>
                  </span></a>
                    
                </li>
                <li><span>回复</span>
                   <span title="" class="whitespacelittle" >
                       1
                  </span>
                </li>
                <li><span>@我</span>
                   <span title="" class="whitespacelittle" >
                          322
                  </span>
                </li>
            </ul>

            <div class=""></div>
        </div>

        
    <div id="online-numbers">
        <p>在线人数: <span><?php echo bbs_getonlinenumber(); ?></span></p>
    </div>
</div>
<!-- header end -->



<!-- login 模态框 begin -->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <div id="logoArea">
            <img width="30" height="30" src="img/logo.png" alt="珞珈山水BBS">
            <h3>珞珈山水BBS</h3>
        </div>
    </div>
    <div class="modal-body">
        <form id="loginForm" class="form-horizontal">
          <div class="control-group">
            <label class="control-label" for="inputName">用户名</label>
            <div class="controls">
              <input type="text" id="inputName" placeholder="用户名">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">密码</label>
            <div class="controls">
              <input type="password" id="inputPassword" placeholder="密码">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox"> 记住我
              </label>
              <button id="login-btn" type="submit" class="button">登录</button>
              <button id="login-cancel-btn" class="button" data-dismiss="modal" aria-hidden="true">取消</button>
              <a id="anonymity" href="javascript:void(0);">匿名登录>></a>
            </div>
          </div>
        </form>
    </div>
</div>
<!-- login 模态框 end -->



<!-- register 模态框 begin -->
<div id="registerModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <div id="logoArea">
            <img width="30" height="30" src="img/logo.png" alt="珞珈山水BBS">
            <h3>珞珈山水BBS</h3>
        </div>
    </div>
    <div class="modal-body">
        <form id="registerForm" class="form-horizontal">
          <div class="control-group">
            <label class="control-label" for="inputName">用户名</label>
            <div class="controls">
              <input type="text" id="inputName" placeholder="用户名">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">密码</label>
            <div class="controls">
              <input type="password" id="inputPassword" placeholder="密码">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button id="register-btn" type="submit" class="button">注册</button>
              <button id="register-cancel-btn" class="button" data-dismiss="modal" aria-hidden="true">取消</button>
            </div>
          </div>
        </form>
    </div>
</div>
<!-- register 模态框 end -->

</body>
</html>
