<html>
<head>
<title></title>
<?php
	$setboard=0;
    	require("www2-funcs.php");
    	require("new_add_file.php");
	login_init();
	page_header("״̬", FALSE);

	$unread = false;	
	if (strcmp($currentuser["userid"], "guest")) {
		$tn = bbs_mail_get_num($currentuser["userid"]);
		if ($tn) {
			$unread = $tn["newmail"];//�ж��ٷ�δ��
			$total = $tn["total"];//��ʾ�����ܹ��ж��ٷ���
		}
	}
?>
<meta http-equiv="refresh" content="120;url=wbbsheader.php">
</head>
<body>

<!--header begin--> 
<div id="header" role="navigation">
    <a id="logo" href="./wForum/frames.php" title="����ɽˮBBS">
        <img width="100" height="100" src="img/logo.png" alt="����ɽˮBBS">
    </a>

    <ul class="breadcrumb" id="breadcrumb">
      <li id="breadcrumb-1"><a href="./index.php">����ɽˮBBS</a> <span class="divider">/</span></li>
      <li id="breadcrumb-2"><a href="javascript:void(0);">����1��</a> <span class="divider">/</span></li>
      <li class="active" id="breadcrumb-3">����2��</li>
    </ul>
	
	<?php if (strcmp($currentuser["userid"],"guest")) { ?>
    <ul id="nav" class="nav-main">
        <li class="items" id="li-1">
            <a id="message" href="javascript:void(0);" title="˽��">
                <img  src="img/icon-message.png" alt="˽��">
            </a>
        </li>

        <li class="items">
            <a id="setting" href="./usermanagemenu.php" title="����">
                <img  src="img/icon-setting.png" alt="����">
            </a>
        </li>
        <li class="items">
        	<a id="user" href="#��������" title="user">
                	<?php
                		echo "���ã�".$currentuser["userid"]; 
                	?>
            	</a>
        </li>
        <li class="items">
        	<a id="loginout" href="#ע��" title="loginout">
                	ע��
            	</a>
        </li>
	<?php } else {?>
        <li class="items">
            <a id="login" href="#loginModal" data-toggle="modal" title="��¼">
                ��¼
            </a>
        </li>

        <li class="items" >
            <a id="register" href="#registerModal" data-toggle="modal" title="ע��">
                ע��
            </a>
        </li>
        <?php } ?>

    </ul>

    
    <div id="box-1" class="hidden-box hidden-loc-index">
            <ul>
                <li><a href="./usermailbox.php"><span>˽��</span>
                 <span title="" class="whitespacelittle" >
                     <?php echo $unread; ?>
                  </span></a>
                    
                </li>
                <li><span>�ظ�</span>
                   <span title="" class="whitespacelittle" >
                       1
                  </span>
                </li>
                <li><span>@��</span>
                   <span title="" class="whitespacelittle" >
                          322
                  </span>
                </li>
            </ul>

            <div class=""></div>
        </div>

        
    <div id="online-numbers">
        <p>��������: <span><?php echo bbs_getonlinenumber(); ?></span></p>
    </div>
</div>
<!-- header end -->



<!-- login ģ̬�� begin -->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <div id="logoArea">
            <img width="30" height="30" src="img/logo.png" alt="����ɽˮBBS">
            <h3>����ɽˮBBS</h3>
        </div>
    </div>
    <div class="modal-body">
        <form id="loginForm" class="form-horizontal">
          <div class="control-group">
            <label class="control-label" for="inputName">�û���</label>
            <div class="controls">
              <input type="text" id="inputName" placeholder="�û���">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">����</label>
            <div class="controls">
              <input type="password" id="inputPassword" placeholder="����">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox"> ��ס��
              </label>
              <button id="login-btn" type="submit" class="button">��¼</button>
              <button id="login-cancel-btn" class="button" data-dismiss="modal" aria-hidden="true">ȡ��</button>
              <a id="anonymity" href="javascript:void(0);">������¼>></a>
            </div>
          </div>
        </form>
    </div>
</div>
<!-- login ģ̬�� end -->



<!-- register ģ̬�� begin -->
<div id="registerModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <div id="logoArea">
            <img width="30" height="30" src="img/logo.png" alt="����ɽˮBBS">
            <h3>����ɽˮBBS</h3>
        </div>
    </div>
    <div class="modal-body">
        <form id="registerForm" class="form-horizontal">
          <div class="control-group">
            <label class="control-label" for="inputName">�û���</label>
            <div class="controls">
              <input type="text" id="inputName" placeholder="�û���">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">����</label>
            <div class="controls">
              <input type="password" id="inputPassword" placeholder="����">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button id="register-btn" type="submit" class="button">ע��</button>
              <button id="register-cancel-btn" class="button" data-dismiss="modal" aria-hidden="true">ȡ��</button>
            </div>
          </div>
        </form>
    </div>
</div>
<!-- register ģ̬�� end -->

</body>
</html>
