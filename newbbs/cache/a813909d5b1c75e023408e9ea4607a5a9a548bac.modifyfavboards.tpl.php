<?php /*%%SmartyHeaderCode:25460549579a4851444-14286163%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a813909d5b1c75e023408e9ea4607a5a9a548bac' => 
    array (
      0 => '.\\templates\\modifyfavboards.tpl',
      1 => 1419264190,
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
      1 => 1419161311,
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
    '297bf05ee0d00464509a6c3334f19ac61fce67bc' => 
    array (
      0 => '.\\templates\\carouselad.tpl',
      1 => 1419241232,
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
  'nocache_hash' => '25460549579a4851444-14286163',
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_549840c14ac221_92961546',
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549840c14ac221_92961546')) {function content_549840c14ac221_92961546($_smarty_tpl) {?>     
<HTML>
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
    <a id="logo" href="/testsmarty/index.php" title="珞珈山水BBS">
        <img width="100" height="100" src="img/logo.png" alt="珞珈山水BBS">
    </a>

    <ul class="breadcrumb">
      <li><a href="/testsmarty/index.php">珞珈山水BBS</a> <span class="divider">/</span></li>
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



<script type="text/javascript">
<!--
    writeStyleSheets();
    //-->
</script>
</head>
<script language="javascript">
<!--
    var siteconf_SMS_SUPPORT = 0;
    var siteconf_BOARDS_PER_ROW = 3;
    var siteconf_SHOW_POST_UNREAD = 1;
    var siteconf_THREADSPERPAGE = 15;
    defineMenus();
    //-->
</script>
<!--引用自bootstrap的轮播-->
<div class="mcontainer">
	<div id="bbsCarousel" class="carousel  carousel-fade carouselad" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#bbsCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#bbsCarousel" data-slide-to="1"></li>
        <li data-target="#bbsCarousel" data-slide-to="2"></li>
      </ol>
    <div class="carousel-inner carouselad-inner" style="text-align:center">
        <div class="item active">
          <img alt="First slide" src="img/ad/ad2.jpg" ></img>
          <div class="carousel-caption">
              <h1>珞珈山水</h1>
              <p>珞珈山水是武汉大学的官方学生BBS/论坛，成立于1996年，现为中国众多高校知名BBS之一。</p>
          </div>
        </div>
        <div class="item">
          <img alt="Second slide" src="img/ad/ad2.jpg" ></img>
           <div class="carousel-caption">
              <h1>“武汉大学”</h1>
              <p>本版区主要面向武大校园内，话题集中在学习、校园热点、学生活动、校园生活等方面。下设“武大特快”、“皇皇吾大”、“研究生之家”、“大一新生”、“校园海报栏”等版块。</p>
              </div>
        </div>
        <div class="item">
          <img alt="Third slide" src="img/ad/ad2.jpg"  ></img>
           <div class="carousel-caption">
              <h1>珞珈山水系统</h1>
              <p>主程序为目前国内比较通用的KBS BBS系统，武汉大学另一学生BBS--自强茶馆BBS采用的是discuz系统。</p>
           </div>
        </div>
      </div>
      
      <a class="left carousel-control" href="#bbsCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"><i class="icon-glass"></i></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#bbsCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->

</div>    

<div class="votecontainer">


    <br />
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
    <script language="JavaScript">
<!--
    initTime(1419080923);
    //-->
    </script>
    <br />



    <form method="post" target="_self" action="savefavboards.php?select=0">
        <table class="table tabledefine">
            <tr>
                <th class="thdefine">本站系统</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Advice">
                                <a href="board.php?name=Advice">Advice (共建山水)</a>
                            </td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Announce">
                                <a href="board.php?name=Announce">Announce (站务公告)</a>
                            </td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="BBSApp">
                                <a href="board.php?name=BBSApp">BBSApp (山水客户端)</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="BBSHelp" checked="checked">
                                <a href="board.php?name=BBSHelp">BBSHelp (BBS使用技巧)</a>
                            </td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Blog">
                                <a href="board.php?name=Blog">Blog (山水Blog)</a>
                            </td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="BlogApply">
                                <a href="board.php?name=BlogApply">BlogApply (Blog申请)</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Cherub">
                                <a href="board.php?name=Cherub">Cherub (匿名天使的家)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Death">
                                <a href="board.php?name=Death">Death (珞珈公墓)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Election">
                                <a href="board.php?name=Election">Election (本站选举与投票)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Honor">
                                <a href="board.php?name=Honor">Honor (名人堂)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Recommend">
                                <a href="board.php?name=Recommend">Recommend (推荐文章)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Rules">
                                <a href="board.php?name=Rules">Rules (站规讨论)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="sysop" checked="checked">
                                <a href="board.php?name=sysop">sysop (站务讨论)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Test">
                                <a href="board.php?name=Test">Test (测试版)</a></td>
                            <td width="33%"></td>
                        </tr>
                    </table>
                    <table class="tabledefine table">
                        <tr>
                            <th class="thdefine">BBSActivity (BBS活动)
                            </th>
                        </tr>
                        <tr>
                            <td class="thdefine">
                                <table class="tabledefine table">
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="Anniversary">
                                            <a href="board.php?name=Anniversary">Anniversary (山水站庆)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="TShirt">
                                            <a href="board.php?name=TShirt">TShirt (山水站衫)</a></td>
                                        <td width="33%"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table class="tabledefine table">
                        <tr>
                            <th class="thdefine">BBSData (BBS统计数据)
                            </th>
                        </tr>
                        <tr>
                            <td class="thdefine">
                                <table class="tabledefine table">
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="BBSLists">
                                            <a href="board.php?name=BBSLists">BBSLists (本站的各类数据统计列表)</a>
                                        </td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="notepad">
                                            <a href="board.php?name=notepad">notepad (酸甜苦辣)</a>
                                        </td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="vote">
                                            <a href="board.php?name=vote">vote (各项投票与结果)</a>
                                        </td>
                                    </tr>
                                </table>


                            </td>
                        </tr>
                    </table>
                    <table class="tabledefine table">
                        <tr>
                            <th class="thdefine">BBSDesign (BBS美工)
                            </th>
                        </tr>
                        <tr>
                            <td class="thdefine">
                                <table class="tabledefine table">
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="TelnetArt">
                                            <a href="board.php?name=TelnetArt">TelnetArt (Telnet美工)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="WebArt">
                                            <a href="board.php?name=WebArt">WebArt (Web美工)</a></td>
                                        <td width="33%"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table class="tabledefine table">
                        <tr>
                            <th class="thdefine">BoardWork (版面版务工作)
                            </th>
                        </tr>
                        <tr>
                            <td class="thdefine">
                                <table class="tabledefine table">
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="BMApply">
                                            <a href="board.php?name=BMApply">BMApply (版务申请)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="BMManage">
                                            <a href="board.php?name=BMManage">BMManage (版务管理)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="BoardApply">
                                            <a href="board.php?name=BoardApply">BoardApply (版面申请)</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="BoardManage">
                                            <a href="board.php?name=BoardManage">BoardManage (版面管理)</a>
                                        </td>
                                        <td width="33%"></td>
                                        <td width="33%"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table class="tabledefine table">
                        <tr>
                            <th class="thdefine">Complain (投诉与仲裁)
                            </th>
                        </tr>
                        <tr>
                            <td class="thdefine">
                                <table class="tabledefine table">
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="Appeal">
                                            <a href="board.php?name=Appeal">Appeal (投诉)</a>
                                        </td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="Arbitration">
                                            <a href="board.php?name=Arbitration">Arbitration (仲裁)</a>
                                        </td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="Penalty">
                                            <a href="board.php?name=Penalty">Penalty (处罚公告)</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th class="TableBody1" class="thdefine">武汉大学</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Freshman">
                                <a href="board.php?name=Freshman">Freshman (大一新生)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="NICNotice">
                                <a href="board.php?name=NICNotice">NICNotice (网络信息中心)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Notice">
                                <a href="board.php?name=Notice">Notice (校园海报栏)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="PostGraduate">
                                <a href="board.php?name=PostGraduate">PostGraduate (研究生之家)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Teachers">
                                <a href="board.php?name=Teachers">Teachers (教工)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="TMSATWHU">
                                <a href="board.php?name=TMSATWHU">TMSATWHU (武大附中)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="WHDXL">
                                <a href="board.php?name=WHDXL">WHDXL (武汉大学图书馆)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="WHUCelebration">
                                <a href="board.php?name=WHUCelebration">WHUCelebration (武大校庆)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="WHUCentury">
                                <a href="board.php?name=WHUCentury">WHUCentury (皇皇吾大)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="WHUConnection">
                                <a href="board.php?name=WHUConnection">WHUConnection (部门直通车)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="WHUExpress">
                                <a href="board.php?name=WHUExpress">WHUExpress (武大特快)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="WHUResource">
                                <a href="board.php?name=WHUResource">WHUResource (校园网络资源)</a></td>
                        </tr>
                    </table>

                    <table class="tabledefine table">
                        <tr>
                            <th class="thdefine">Graduation (毕业之声)</th>
                        </tr>
                        <tr>
                            <td class="thdefine">
                                <table class="tabledefine table">
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="2014Graduate">
                                            <a href="board.php?name=2014Graduate">2014Graduate (2014届毕业生)</a></td>
                                        <td width="33%"></td>
                                        <td width="33%"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table class="tabledefine table">
                        <tr>
                            <th class="thdefine">WHUAssociations (协会社团组织)</th>
                        </tr>
                        <tr>
                            <td class="thdefine">
                                <table class="tabledefine table">
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table class="tabledefine table">
                        <tr>
                            <th class="thdefine">WHUDepartments (院系风采)</th>
                        </tr>
                        <tr>
                            <td class="thdefine">
                                <table class="tabledefine table">
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="B.A.S">
                                            <a href="board.php?name=B.A.S">B.A.S (土木建筑工程学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="C.C.S">
                                            <a href="board.php?name=C.C.S">C.C.S (城市设计学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="C.E">
                                            <a href="board.php?name=C.E">C.E (教育科学学院)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="C.H">
                                            <a href="board.php?name=C.H">C.H (历史学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="C.L">
                                            <a href="board.php?name=C.L">C.L (文学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="C.L.S">
                                            <a href="board.php?name=C.L.S">C.L.S (生命科学学院)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="C.M.S">
                                            <a href="board.php?name=C.M.S">C.M.S (化学与分子科学学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="C.P.M.E">
                                            <a href="board.php?name=C.P.M.E">C.P.M.E (动力与机械学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="C.S">
                                            <a href="board.php?name=C.S">C.S (计算机学院)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="D.A">
                                            <a href="board.php?name=D.A">D.A (艺术学系)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="D.P.P">
                                            <a href="board.php?name=D.P.P">D.P.P (印刷与包装系)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="E.E.S">
                                            <a href="board.php?name=E.E.S">E.E.S (电气工程学院)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="E.I.S">
                                            <a href="board.php?name=E.I.S">E.I.S (电子信息学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="E.M.S">
                                            <a href="board.php?name=E.M.S">E.M.S (经济与管理学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="F.L.S">
                                            <a href="board.php?name=F.L.S">F.L.S (外国语言文学学院)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="I.M.S">
                                            <a href="board.php?name=I.M.S">I.M.S (信息管理学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="I.P">
                                            <a href="board.php?name=I.P">I.P (哲学学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="I.S.S">
                                            <a href="board.php?name=I.S.S">I.S.S (国际软件学院)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="L.S">
                                            <a href="board.php?name=L.S">L.S (法学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="LIESMARS">
                                            <a href="board.php?name=LIESMARS">LIESMARS (测绘遥感国家重点实验室)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="M.S">
                                            <a href="board.php?name=M.S">M.S (医学部)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="M.S.S">
                                            <a href="board.php?name=M.S.S">M.S.S (数学与统计学院版)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="NERCMS">
                                            <a href="board.php?name=NERCMS">NERCMS (国家多媒体软件工程中心)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="P.S">
                                            <a href="board.php?name=P.S">P.S (物理科学与技术学院)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="P.S.P.M">
                                            <a href="board.php?name=P.S.P.M">P.S.P.M (政治与公共管理学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="R.E.S">
                                            <a href="board.php?name=R.E.S">R.E.S (资源与环境科学学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="R.S.I.S">
                                            <a href="board.php?name=R.S.I.S">R.S.I.S (遥感信息工程院)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="S.G.G">
                                            <a href="board.php?name=S.G.G">S.G.G (测绘学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="S.J.C">
                                            <a href="board.php?name=S.J.C">S.J.C (新闻与传播学院)</a></td>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="SKLSE">
                                            <a href="board.php?name=SKLSE">SKLSE (软件工程国家重点实验室)</a></td>
                                    </tr>
                                    <tr>
                                        <td class="tddefine">
                                            <input type="checkbox" value="1" name="W.H.S">
                                            <a href="board.php?name=W.H.S">W.H.S (水利水电学院)</a></td>
                                        <td width="33%"></td>
                                        <td width="33%"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th class="thdefine">乡情校谊</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Anhui">
                                <a href="board.php?name=Anhui">Anhui (淮风皖韵·安徽)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="BaShu">
                                <a href="board.php?name=BaShu">BaShu (巴山蜀水·巴蜀)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Beijing">
                                <a href="board.php?name=Beijing">Beijing (皇城幽幽·北京)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Fujian">
                                <a href="board.php?name=Fujian">Fujian (闽海观潮·福建)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Gansu">
                                <a href="board.php?name=Gansu">Gansu (陇上人家·甘肃)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Guangdong">
                                <a href="board.php?name=Guangdong">Guangdong (岭南大地·广东)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Guangxi">
                                <a href="board.php?name=Guangxi">Guangxi (八桂大地·广西)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Guizhou">
                                <a href="board.php?name=Guizhou">Guizhou (黔山秀水·贵州)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Hebei">
                                <a href="board.php?name=Hebei">Hebei (慷慨燕赵·河北)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Henan">
                                <a href="board.php?name=Henan">Henan (逐鹿中原·河南)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Hubei">
                                <a href="board.php?name=Hubei">Hubei (荆风楚韵·湖北)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Hunan">
                                <a href="board.php?name=Hunan">Hunan (三湘四水·湖南)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Jiangsu">
                                <a href="board.php?name=Jiangsu">Jiangsu (吴韵汉风·江苏)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Jiangxi">
                                <a href="board.php?name=Jiangxi">Jiangxi (江南西道·江西)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="NorthEast">
                                <a href="board.php?name=NorthEast">NorthEast (白山黑水·东北)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Shaanxi">
                                <a href="board.php?name=Shaanxi">Shaanxi (策马秦川·陕西)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Shandong">
                                <a href="board.php?name=Shandong">Shandong (齐鲁大地·山东)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Shanghai">
                                <a href="board.php?name=Shanghai">Shanghai (风情沪上·上海)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Wuhan">
                                <a href="board.php?name=Wuhan">Wuhan (江城风情)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Zhejiang">
                                <a href="board.php?name=Zhejiang">Zhejiang (诗画之江·浙江)</a></td>
                            <td width="33%"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th class="thdefine">电脑网络</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="ACM_ICPC">
                                <a href="board.php?name=ACM_ICPC">ACM_ICPC (国际大学生程序设计竞赛)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="BBSDev">
                                <a href="board.php?name=BBSDev">BBSDev (BBS安装与维护)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="CPlusPlus">
                                <a href="board.php?name=CPlusPlus">CPlusPlus (C++程序设计)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Database">
                                <a href="board.php?name=Database">Database (数据库)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Digital">
                                <a href="board.php?name=Digital">Digital (数码时代)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Google">
                                <a href="board.php?name=Google">Google (Google Camp)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Hardware">
                                <a href="board.php?name=Hardware">Hardware (硬件天地)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="IBM">
                                <a href="board.php?name=IBM">IBM (IBM俱乐部)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Internet">
                                <a href="board.php?name=Internet">Internet (万维世界)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Java">
                                <a href="board.php?name=Java">Java (爪哇)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Linux_Unix">
                                <a href="board.php?name=Linux_Unix">Linux_Unix (Linux &amp; Unix)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Microsoft">
                                <a href="board.php?name=Microsoft">Microsoft (微软俱乐部)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="OS">
                                <a href="board.php?name=OS">OS (操作系统)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Programm">
                                <a href="board.php?name=Programm">Programm (程序人生)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Security">
                                <a href="board.php?name=Security">Security (系统安全)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Software">
                                <a href="board.php?name=Software">Software (软件快递)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="TeX">
                                <a href="board.php?name=TeX">TeX (TeX 和 LaTeX)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Theory">
                                <a href="board.php?name=Theory">Theory (计算机理论)</a></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th class="thdefine">科学技术</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Biology">
                                <a href="board.php?name=Biology">Biology (生物)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Chemistry">
                                <a href="board.php?name=Chemistry">Chemistry (化学)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Economics">
                                <a href="board.php?name=Economics">Economics (经济学)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Electronics">
                                <a href="board.php?name=Electronics">Electronics (电子电机)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Environment">
                                <a href="board.php?name=Environment">Environment (环境科学)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Geography">
                                <a href="board.php?name=Geography">Geography (地理)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="History">
                                <a href="board.php?name=History">History (历史)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Law">
                                <a href="board.php?name=Law">Law (法律)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Math">
                                <a href="board.php?name=Math">Math (数学)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="NumComp">
                                <a href="board.php?name=NumComp">NumComp (数值计算)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Physics">
                                <a href="board.php?name=Physics">Physics (物理)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Science">
                                <a href="board.php?name=Science">Science (科学)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Sex">
                                <a href="board.php?name=Sex">Sex (人之初)</a></td>
                            <td width="33%"></td>
                            <td width="33%"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th class="thdefine">文学艺术</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="ASCIIart">
                                <a href="board.php?name=ASCIIart">ASCIIart (ASCII艺术)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Chorus">
                                <a href="board.php?name=Chorus">Chorus (合唱艺术)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Classics">
                                <a href="board.php?name=Classics">Classics (古典及爵士音乐)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Comic">
                                <a href="board.php?name=Comic">Comic (漫画*动画*童话)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Emprise">
                                <a href="board.php?name=Emprise">Emprise (武侠世界)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="English">
                                <a href="board.php?name=English">English (英语天地)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="French">
                                <a href="board.php?name=French">French (浪漫法兰西)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="MyStage">
                                <a href="board.php?name=MyStage">MyStage (舞台人生)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Novels">
                                <a href="board.php?name=Novels">Novels (小说)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Photography">
                                <a href="board.php?name=Photography">Photography (珞珈摄影)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Poetry">
                                <a href="board.php?name=Poetry">Poetry (诗词歌赋)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Reader">
                                <a href="board.php?name=Reader">Reader (读书)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="S.F.">
                                <a href="board.php?name=S.F.">S.F. (幻之天空)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="SanGuo">
                                <a href="board.php?name=SanGuo">SanGuo (青梅煮酒)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="StoneStory">
                                <a href="board.php?name=StoneStory">StoneStory (红楼梦)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Story">
                                <a href="board.php?name=Story">Story (珞珈原创)</a></td>
                            <td width="33%"></td>
                            <td width="33%"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th class="thdefine">休闲娱乐</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Astrology">
                                <a href="board.php?name=Astrology">Astrology (星座)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Automobile">
                                <a href="board.php?name=Automobile">Automobile (车元素)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="dancing">
                                <a href="board.php?name=dancing">dancing (舞迷之家)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Debate">
                                <a href="board.php?name=Debate">Debate (唇舌烽火)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Family">
                                <a href="board.php?name=Family">Family (寸草春晖)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Fashion">
                                <a href="board.php?name=Fashion">Fashion (格调生活)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Feeling">
                                <a href="board.php?name=Feeling">Feeling (心情故事)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="food">
                                <a href="board.php?name=food">food (饮食文化)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="FreeTalk">
                                <a href="board.php?name=FreeTalk">FreeTalk (无事闲聊)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Game">
                                <a href="board.php?name=Game">Game (计算机游戏)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Humor">
                                <a href="board.php?name=Humor">Humor (幽默)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="IDstory">
                                <a href="board.php?name=IDstory">IDstory (ID故事)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="KeepFit">
                                <a href="board.php?name=KeepFit">KeepFit (瘦身塑体)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="KingKiller">
                                <a href="board.php?name=KingKiller">KingKiller (杀人游戏)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Love">
                                <a href="board.php?name=Love">Love (情谊两心知)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Movie">
                                <a href="board.php?name=Movie">Movie (电影)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Mud">
                                <a href="board.php?name=Mud">Mud (泥巴乐园)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Picture">
                                <a href="board.php?name=Picture">Picture (贴图版)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="PieFriends">
                                <a href="board.php?name=PieFriends">PieFriends (缘分的天空)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="PopMusic">
                                <a href="board.php?name=PopMusic">PopMusic (流行音乐)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Riddle">
                                <a href="board.php?name=Riddle">Riddle (谜语天地)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Rock">
                                <a href="board.php?name=Rock">Rock (摇滚乐)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="single">
                                <a href="board.php?name=single">single (光辉岁月)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Think">
                                <a href="board.php?name=Think">Think (我思故我在)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Travel">
                                <a href="board.php?name=Travel">Travel (海天游踪)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="TV">
                                <a href="board.php?name=TV">TV (电视)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Youth">
                                <a href="board.php?name=Youth">Youth (青涩时代)</a></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th class="thdefine">体育健身</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Badminton">
                                <a href="board.php?name=Badminton">Badminton (羽毛球)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="baseball">
                                <a href="board.php?name=baseball">baseball (棒球)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Basketball">
                                <a href="board.php?name=Basketball">Basketball (篮球)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Bicycle">
                                <a href="board.php?name=Bicycle">Bicycle (一骑绝尘)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Bridge">
                                <a href="board.php?name=Bridge">Bridge (桥牌)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Chess">
                                <a href="board.php?name=Chess">Chess (珞珈棋缘)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Football">
                                <a href="board.php?name=Football">Football (足球)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="GO">
                                <a href="board.php?name=GO">GO (黑白纵横)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Olympic2008">
                                <a href="board.php?name=Olympic2008">Olympic2008 (北京奥运会)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Sports">
                                <a href="board.php?name=Sports">Sports (休闲体育)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Tabletennis">
                                <a href="board.php?name=Tabletennis">Tabletennis (乒乓球)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Tennis">
                                <a href="board.php?name=Tennis">Tennis (网球)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Volleyball">
                                <a href="board.php?name=Volleyball">Volleyball (鲲鹏展翅)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Yoga">
                                <a href="board.php?name=Yoga">Yoga (瑜伽)</a></td>
                            <td width="33%"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th class="thdefine">社会信息</th>
            </tr>
            <tr>
                <td class="thdefine">
                    <table class="tabledefine table">
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Abroad">
                                <a href="board.php?name=Abroad">Abroad (出国·他乡寻梦)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="ADagent_TG">
                                <a href="board.php?name=ADagent_TG">ADagent_TG (代理与团购)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="EnglishTest">
                                <a href="board.php?name=EnglishTest">EnglishTest (英语考试)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Graduate">
                                <a href="board.php?name=Graduate">Graduate (毕业生)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="House">
                                <a href="board.php?name=House">House (房屋租赁)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Job">
                                <a href="board.php?name=Job">Job (工作)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="JobInfo">
                                <a href="board.php?name=JobInfo">JobInfo (工作信息)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="kaoyan">
                                <a href="board.php?name=kaoyan">kaoyan (考研信息港)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Medicine">
                                <a href="board.php?name=Medicine">Medicine (医疗保健)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Military">
                                <a href="board.php?name=Military">Military (军事天地)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="MyWallet">
                                <a href="board.php?name=MyWallet">MyWallet (投资理财)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="News">
                                <a href="board.php?name=News">News (新闻)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="PartTimeJob">
                                <a href="board.php?name=PartTimeJob">PartTimeJob (兼职信息)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Search">
                                <a href="board.php?name=Search">Search (失物招领)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="secondhand">
                                <a href="board.php?name=secondhand">secondhand (二手货交易市场)</a></td>
                        </tr>
                        <tr>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="TrafficInfo">
                                <a href="board.php?name=TrafficInfo">TrafficInfo (交通信息)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="WHU">
                                <a href="board.php?name=WHU">WHU (珞珈论坛)</a></td>
                            <td class="tddefine">
                                <input type="checkbox" value="1" name="Wish">
                                <a href="board.php?name=Wish">Wish (生日·祝福)</a></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p align="center">
            <input type="submit" value="保存到顶层收藏夹目录" class="btn-info" />
        </p>
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
