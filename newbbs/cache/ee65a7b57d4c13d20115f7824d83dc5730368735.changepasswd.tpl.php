<?php /*%%SmartyHeaderCode:18681549567ce8d5763-92992309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee65a7b57d4c13d20115f7824d83dc5730368735' => 
    array (
      0 => '.\\templates\\changepasswd.tpl',
      1 => 1419151923,
      2 => 'file',
    ),
    '0debd65d8a9db561a3ba3fd862046bf4e41cc1db' => 
    array (
      0 => '.\\configs\\test.conf',
      1 => 1396895534,
      2 => 'file',
    ),
    '50da811edd0e07e65507282cf2fea5e9d6f55598' => 
    array (
      0 => '.\\templates\\base.tpl',
      1 => 1419076219,
      2 => 'file',
    ),
    '10e0737838b4a574ef135d0c601e7b602cfaf37a' => 
    array (
      0 => '.\\templates\\header.tpl',
      1 => 1419152548,
      2 => 'file',
    ),
    '7766edeed70c03bb2918a932d78f502767064661' => 
    array (
      0 => '.\\templates\\left.tpl',
      1 => 1419158296,
      2 => 'file',
    ),
    '035b166905f69692e75fbf1923446754f13b42c4' => 
    array (
      0 => '.\\templates\\right.tpl',
      1 => 1419157340,
      2 => 'file',
    ),
    '964a1f9935b66812f2b967e8ac71ae95cedb56a0' => 
    array (
      0 => '.\\templates\\ad.tpl',
      1 => 1419157493,
      2 => 'file',
    ),
    '89b9e32832dfbde1f3a91e37d97250e7fe5154be' => 
    array (
      0 => '.\\templates\\childnav.tpl',
      1 => 1419151574,
      2 => 'file',
    ),
    '1be7ff7fdee636597edd726ee98dfef4bfd55d1f' => 
    array (
      0 => '.\\templates\\footer.tpl',
      1 => 1418822367,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18681549567ce8d5763-92992309',
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5496adf8530585_54988578',
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5496adf8530585_54988578')) {function content_5496adf8530585_54988578($_smarty_tpl) {?><HTML>
<HEAD>
<TITLE>foo - Hello Ned</TITLE>
<meta charset="utf-8">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen,print">
<link rel="stylesheet" href="css/fms.v2.css" >
 <script src="js/jquery-1.11.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>



<!–[if IE]>  
<script src=”http://html5shiv.googlecode.com/svn/trunk/html5.js”></script>  
<![endif]–>  
   
</HEAD>
<BODY>



<!--header begin-->	
<div id="header" role="navigation">
    <a id="logo" href="javascript:void(0);" title="珞珈山水BBS">
        <img width="100" height="100" src="img/logo.png" alt="珞珈山水BBS">
    </a>

    <ul class="breadcrumb">
      <li><a href="javascript:void(0);">珞珈山水BBS</a> <span class="divider">/</span></li>
      <li><a href="javascript:void(0);">测试1层</a> <span class="divider">/</span></li>
      <li class="active">测试2层</li>
    </ul>

    <ul id="nav">
        <li class="items">
            <a id="message" href="/testsmarty/usermailbox.php" title="私信">
                <img  src="img/icon-message.png" alt="私信">
            </a>
        </li>
        <li class="items">
            <a id="setting" href="/testsmarty/usermanagemenu.php" title="设置">
                <img  src="img/icon-setting.png" alt="设置">
            </a>
        </li>
        <li class="items">
            <a id="login" href="#loginModal" data-toggle="modal" title="登录">
                登录
            </a>
        </li>
        <li class="items">
            <a id="register" href="#registerModal" data-toggle="modal" title="注册">
                注册
            </a>
        </li>
    </ul>

    <div id="online-numbers">
        <p>在线人数: <span>212</span></p>
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

<div id="left_affix">
    <div id="nav_left" class="nav_left" data-spy="affix" data-offset-top="30">
        <div class ="items">
            <a id="top_ten" href="/testsmarty/topicList.php" title="Hot十大话题">
                <img width ="28" height="24" src="img/icon-leftnav-topTen.png" alt="Hot十大话题">
            </a>
        </div >
        <div class="items">
            <a id="recommand" href="/testsmarty/topicList.php" title="推荐文章">
                <img width="100" height="100" src="img/icon-leftnav-recommand.png" alt="推荐文章">
            </a>
        </div>
        <div class="items">
            <a id="newest" href="/testsmarty/vote.php" title="今日新帖">
                <img width="100" height="100" src="img/icon-leftnav-newest.png" alt="今日新帖">
            </a>
        </div>
        <div class="items">
            <a id="lecture" href="/testsmarty/usermanagemenu.php" title="个人中心">
                <img width="100" height="100" src="img/icon-leftnav-lecture.png" alt="个人中心">
            </a>
        </div>
        <div class="items">
            <a id="notification" href="/testsmarty/board.php" title="组织公告">
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
        <div class="items">
            <a id="post" href="/testsmarty/postarticle.php" title="发帖">
                <img width="100" height="100" src="img/icon-leftnav-post.png" alt="发帖">
            </a>
        </div>
    </div>
</div>
<div id="right_affix">
    <div id="nav_right" class="nav_right" data-spy="affix" data-offset-top="30">
        <ul>
            <li>

                <a id="lecture" href="/testsmarty/board.php" title="讲座" onmouseover="showDiv(this)" onmouseout="closeDiv(this)">
                    <h3>讲座</h3>
                </a>

            </li>

            <li>

                <a id="announcement" href="/testsmarty/board.php" title="组织公告" onmouseover="showDiv(this)" onmouseout="closeDiv(this)">
                    <h3>组织公告</h3>
                </a>

            </li>

            <li>

                <a id="poster" href="/testsmarty/board.php" title="海报" onmouseover="showDiv(this)" onmouseout="closeDiv(this)">
                    <h3>海报</h3>
                </a>

            </li>

        </ul>

    </div>



    <div class="right_message_box" id="right_message_box">
        <div class="cont" style="display: none;">
            <ul class="sublist clearfix">
                <li>
                    <h3><span>讲座</span></h3>
                </li>
                <p>
                    <li>
                        <a href="/testsmarty/disparticle.php">世界上的十大谎言</a>
                    </li>
                    <li>
                        <a href="/testsmarty/disparticle.php">世界上的十大谎言</a>
                    </li>
                    <li>
                        <a href="/testsmarty/disparticle.php">世界上的十大谎言</a>
                    </li>
                    <li>
                        <a href="/testsmarty/disparticle.php">世界上的十大谎言</a>
                    </li>

                    <li>
                        <a href="/testsmarty/disparticle.php">世界上的十大谎言</a>
                    </li>

                </p>

            </ul>
        </div>

        <div class="cont" style="display: none;">
            <ul class="sublist clearfix">
                <li>
                    <h3><span>组织公告</span></h3>
                </li>
                <p>
                    <li>
                        <a href="/testsmarty/disparticle.php">世界上的十大谎言</a>
                    </li>
                    <li>
                        <a href="/testsmarty/disparticle.php">世界上的十大谎言</a>
                    </li>
                    <li>
                        <a href="/testsmarty/disparticle.php">世界上的十大谎言</a>
                    </li>
                    <li>
                        <a href="/testsmarty/disparticle.php">世界上的十大谎言</a>
                    </li>

                    <li>
                        <a href="/testsmarty/disparticle.php">世界上的十大谎言</a>
                    </li>

                </p>


            </ul>
        </div>

        <div class="cont" style="display: none;">
            <ul class="sublist clearfix">
                <li>
                    <h3><span>海报</span></h3>
                </li>
            <p>
                <li>
                    <a href="/testsmarty/disparticle.php">世界上的十大谎言</a>
                </li>
                <li>
                    <a href="/testsmarty/disparticle.php">世界上的十大谎言</a>
                </li>
                <li>
                    <a href="/testsmarty/disparticle.php">世界上的十大谎言</a>
                </li>
                <li>
                    <a href="/testsmarty/disparticle.php">世界上的十大谎言</a>
                </li>

                <li>
                    <a href="/testsmarty/disparticle.php">世界上的十大谎言</a>
                </li>

            </p>
        </div>

    </div>
</div>

<script type="text/javascript">
    (function () {
        var time = null;
        var list = $("#nav_right");
        var box = $("#right_message_box");
        var lista = list.find("a");

        for (var i = 0, j = lista.length; i < j; i++) {
            if (lista[i].className == "now") {
                var olda = i;
            }
        }
        var box_show = function (hei) {
            box.stop().animate({
                height: hei,
                opacity: 1
            }, 400);
        }
        var box_hide = function () {
            box.stop().animate({
                height: 0,
                opacity: 0
            }, 400);
        }

        lista.hover(function () {
            lista.removeClass("now");
            $(this).addClass("now");
            clearTimeout(time);
            var index = list.find("a").index($(this));
            box.find(".cont").hide().eq(index).show();
            var _height = box.find(".cont").eq(index).height() + 24;
            box_show(_height)

        }, function () {
            time = setTimeout(function () {
                box.find(".cont").hide();
                box_hide();
            }, 500);
            lista.removeClass("now");
            lista.eq(olda).addClass("now");
        });


        box.find(".cont").hover(function () {
            var _index = box.find(".cont").index($(this));
            lista.removeClass("now");
            lista.eq(_index).addClass("now");
            clearTimeout(time);
            $(this).show();
            var _height = $(this).height() + 24;
            box_show(_height);
        }, function () {

            time = setTimeout(function () {
                $(this).hide();
                box_hide();
            }, 1000);


            lista.removeClass("now");
            lista.eq(olda).addClass("now");


        });
    })();
</script>






<div class="votecontainer">
    <table cellspacing="0" cellpadding="0" align="center" class="navClass2 table">
    <tbody>
        <tr>
            <td width="100%">
                <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td class="TopDarkNav" height="9"></td>
                        </tr>
                        <tr>
                            <td height="70" class="TopLighNav2">

                                <table border="0" width="100%" align="center">
                                    <tbody>
                                        <tr>
                                            <td align="left" width="10%"><a href="/testsmarty/index.php">
                                                <img border="0" src="img/pic/ws.jpg"></a></td>
                                            <td align="center" width="80%">
                                                <script src="/bbsad.js"></script>
                                                <script>showContentAd();</script>
                                                <a href="http://bbs.whu.edu.cn/indexpages/now/" target="_blank">
                                                    <img border="0" src="img/ad/ad.jpg"></a>
                                            </td>
                                          
                                        </tr>
                                    </tbody>
                                </table>

                            </td>
                        </tr>
                        <tr>
                            <td class="TopLighNav" height="9"></td>
                        </tr>
              
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>



<nav class="navbar navbar-default userdefine" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
     
      <a class="navbar-brand" href="#"> 
      	珞珈山水
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>
        	<a href="/testsmarty/usermanagemenu.php">控制面板首页</a>
        </li>
        <li>
        	<a href="/testsmarty/modifyuserdata.php">基本资料修改</a>
        </li>
       	<li>
        	<a href="/testsmarty/changepasswd.php">昵称密码修改</a>
        </li>

        <li>
        	<a href="/testsmarty/userparam.php">用户自定义参数</a>
        </li>
        <li>
        	<a href="/testsmarty/usermailbox.php">用户信件服务</a>
        </li>
       	<li>
        	<a href="/testsmarty/friendlist.php">编辑好友列表</a>
        </li>
     	
     	<li>
        	<a href="/testsmarty/modifyfavboards.php">收藏版面管理</a>
        </li>
      </ul>
     
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

    <form action="dochangepasswd.php" method="POST" name="theForm">
        <table cellpadding="3" cellspacing="1" align="center" class="table" border="1">
            <tr>
                <th colspan="2" width="100%">用户昵称
                </th>
            </tr>
            <tr>
                <td width="40%" align="right"><b>您的昵称：</b>
                <td width="60%">
                    <input type="text" name="nick" value="E时代专家" size="24">
                    &nbsp; &nbsp;
      <input type="checkbox" value="1" name="chkTmp">临时修改昵称（在线用户列表中有效）
                </td>
            </tr>
            <tr align="center">
                <td colspan="2" width="100%" class="TableBody2">
                    <input type="Submit" value="修 改" class="btn-info">
                </td>
            </tr>

        </table>
    </form>
    <br>

    <form action="dochangepasswd.php" method="POST" name="theForm">
        <table cellpadding="3" cellspacing="1" align="center" class="table" border="1">
            <tr>
                <th colspan="2" width="100%">用户密码资料
                </th>
            </tr>
            <tr>
                <td width="40%"><b>旧密码确认</b>：<br>
                    如要修改请输入旧密码进入确认</td>
                <td width="60%">
                    <input type="password" name="oldpsw" value="" size="30" maxlength="13">
                </td>
            </tr>
            <tr>
                <td width="40%"><b>新密码</b>：<br>
                    如要修改请直接输入新密码进入更新</td>
                <td width="60%">
                    <input type="password" name="psw" value="" size="30" maxlength="13">
                </td>
            </tr>
            <tr>
                <td width="40%"><b>新密码确认</b>：<br>
                    再输一次新密码防止输入错误</td>
                <td width="60%">
                    <input type="password" name="psw2" value="" size="30" maxlength="13">
                </td>
            </tr>
            <tr align="center">
                <td colspan="2" width="100%">
                    <input type="Submit" value="更 新" name="Submit" class="btn-success">
                    &nbsp; 
            <input type="reset" name="Submit2" value="清 除" class="btn-danger">
                </td>
            </tr>

        </table>
    </form>
</div>





  <script>
            foucs_module.run();
  </script>

        <!-- 全局脚本 -->
 <script src="js/global.js"></script>

</BODY>


</HTML>
<?php }} ?>
