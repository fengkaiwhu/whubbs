<?php /*%%SmartyHeaderCode:11124548841b69f4c44-13033324%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1419823132,
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
      1 => 1419824825,
      2 => 'file',
    ),
    '7766edeed70c03bb2918a932d78f502767064661' => 
    array (
      0 => '.\\templates\\left.tpl',
      1 => 1419516431,
      2 => 'file',
    ),
    '035b166905f69692e75fbf1923446754f13b42c4' => 
    array (
      0 => '.\\templates\\right.tpl',
      1 => 1419515470,
      2 => 'file',
    ),
    '81eb5cac4fad8092c6c9bd9e6e8eaaf431bc873c' => 
    array (
      0 => '.\\templates\\carousel.tpl',
      1 => 1419823552,
      2 => 'file',
    ),
    '262bc2f138d93a287bd4eb14f9a55b85db2f0b06' => 
    array (
      0 => '.\\templates\\indexshow.tpl',
      1 => 1419824268,
      2 => 'file',
    ),
    '1be7ff7fdee636597edd726ee98dfef4bfd55d1f' => 
    array (
      0 => '.\\templates\\footer.tpl',
      1 => 1419428904,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11124548841b69f4c44-13033324',
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_55081a81ce17c3_00573731',
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55081a81ce17c3_00573731')) {function content_55081a81ce17c3_00573731($_smarty_tpl) {?><HTML>
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
    <a id="logo" href="./index.php" title="珞珈山水BBS">
        <img width="100" height="100" src="img/logo.png" alt="珞珈山水BBS">
    </a>

    <ul class="breadcrumb" id="breadcrumb">
      <li id="breadcrumb-1"><a href="./index.php">珞珈山水BBS</a> <span class="divider">/</span></li>
      <li id="breadcrumb-2"><a href="javascript:void(0);">测试1层</a> <span class="divider">/</span></li>
      <li class="active" id="breadcrumb-3">测试2层</li>
    </ul>

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
            <a id="login" href="#loginModal" data-toggle="modal" title="登录">
                登录
            </a>
        </li>

        <li class="items" >
            <a id="register" href="#registerModal" data-toggle="modal" title="注册">
                注册
            </a>
        </li>

    </ul>

    
    <div id="box-1" class="hidden-box hidden-loc-index">
            <ul>
                <li><a href="./usermailbox.php"><span>私信</span>
                 <span title="" class="whitespacelittle" >
                                  22
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
            <a id="top_ten" href="./usermanagemenu.php" title="个人中心">
                <img width ="28" height="24" src="img/icon-leftnav-lecture.png" alt="个人中心">
            </a>
        </div >
        <div class="items">
            <a id="recommand" href="./vote.php" title="投票系统">
                <img width="100" height="100" src="img/icon-leftnav-recommand.png" alt="投票系统">
            </a>
        </div>
        <div class="items">
            <a id="newest" href="telnet:bbs.whu.edu.cn" title=" telnet">
                <img width="100" height="100" src="img/icon-leftnav-telnet.png" alt=" telnet">
            </a>
        </div>
        <div class="items">
            <a id="lecture" href="./weichat.php" title="山水微博、微信">
                <img width="100" height="100" src="img/icon-leftnav-lecture.png" alt="山水微博、微信">
            </a>
        </div>
        <div class="items">
            <a id="notification" href="./board.php" title="山水提醒">
                <img width="100" height="100" src="img/icon-leftnav-notification.png" alt="山水提醒">
            </a>
        </div>
        <div class="items">
            <a id="poster" href="javascripte:void(0);" title="离开本站">
                <img width="100" height="100" src="img/icon-leftnav-poster.png" alt="离开本站">
            </a>
        </div>
        <!--
        <div class="items">
            <a id="telnet" href="telnet:bbs.whu.edu.cn" title="telnet">
                <img width="100" height="100" src="img/icon-leftnav-telnet.png" alt="telnet">
            </a>
        </div>
        <div class="items">
            <a id="post" href="./postarticle.php" title="发帖">
                <img width="100" height="100" src="img/icon-leftnav-post.png" alt="发帖">
            </a>
        </div>
        -->
    </div>
</div>
<div id="right_affix">
    <div id="nav_right" class="nav_right" data-spy="affix" data-offset-top="30">
        <ul>
            <li>

                <a id="lecture" href="./board.php" title="讲座" onmouseover="showDiv(this)" onmouseout="closeDiv(this)">
                    <h3>海报栏</h3>
                </a>

            </li>

            <li>

                <a id="announcement" href="./board.php" title="组织公告" onmouseover="showDiv(this)" onmouseout="closeDiv(this)">
                    <h3>校内资讯</h3>
                </a>

            </li>

            <li>

                <a id="poster" href="./board.php" title="海报" onmouseover="showDiv(this)" onmouseout="closeDiv(this)">
                    <h3>系统公告</h3>
                </a>

            </li>

        </ul>

    </div>



    <div class="right_message_box" id="right_message_box">
        <div class="cont" style="display: none;">
            <ul class="sublist clearfix">
                <li>
                    <h3><span>海报栏</span></h3>
                </li>
                <p>
                    <li>
                        <a href="./disparticle.php">世界上的十大谎言</a>
                    </li>
                    <li>
                        <a href="./disparticle.php">世界上的十大谎言</a>
                    </li>
                    <li>
                        <a href="./disparticle.php">世界上的十大谎言</a>
                    </li>
                    <li>
                        <a href="./disparticle.php">世界上的十大谎言</a>
                    </li>

                    <li>
                        <a href="./disparticle.php">世界上的十大谎言</a>
                    </li>

                </p>

            </ul>
        </div>

        <div class="cont" style="display: none;">
            <ul class="sublist clearfix">
                <li>
                    <h3><span>系统公告</span></h3>
                </li>
                <p>
                    <li>
                        <a href="./disparticle.php">世界上的十大谎言</a>
                    </li>
                    <li>
                        <a href="./disparticle.php">世界上的十大谎言</a>
                    </li>
                    <li>
                        <a href="./disparticle.php">世界上的十大谎言</a>
                    </li>
                    <li>
                        <a href="./disparticle.php">世界上的十大谎言</a>
                    </li>

                    <li>
                        <a href="./disparticle.php">世界上的十大谎言</a>
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
                    <a href="./disparticle.php">世界上的十大谎言</a>
                </li>
                <li>
                    <a href="./disparticle.php">世界上的十大谎言</a>
                </li>
                <li>
                    <a href="./disparticle.php">世界上的十大谎言</a>
                </li>
                <li>
                    <a href="./disparticle.php">世界上的十大谎言</a>
                </li>

                <li>
                    <a href="./disparticle.php">世界上的十大谎言</a>
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




<div id="indexcontent">
<!--引用自bootstrap的轮播-->
<div class="indexcontainer" id="indexcarousel">
	<div id="bbsCarousel" class="carousel  carousel-fade carouselindex" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#bbsCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#bbsCarousel" data-slide-to="1"></li>
        <li data-target="#bbsCarousel" data-slide-to="2"></li>
      </ol>
    <div class="carousel-inner" style="text-align:center">
        <div class="item active">
          <img alt="First slide" src="img/1.jpg" ></img>
          <div class="carousel-caption">
              <h1>珞珈山水</h1>
              <p>珞珈山水是武汉大学的官方学生BBS/论坛，成立于1996年，现为中国众多高校知名BBS之一。</p>
          </div>
        </div>
        <div class="item">
          <img alt="Second slide" src="img/2.jpg" ></img>
           <div class="carousel-caption">
              <h1>“武汉大学”</h1>
              <p>本版区主要面向武大校园内，话题集中在学习、校园热点、学生活动、校园生活等方面。下设“武大特快”、“皇皇吾大”、“研究生之家”、“大一新生”、“校园海报栏”等版块。</p>
              </div>
        </div>
        <div class="item">
          <img alt="Third slide" src="img/3.jpg"  ></img>
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

<div class="mcontainer" id="index-content-bottom">
    <!-- container begin-->
				
	<div class="wrapper index-content-wrapper"  id="indexshow">
    	<div class="bottom">
    		<div class="inner-wrapper" >
    			<div class="stories">
    				<div class="reps clearfix" id="reps">

   						<a target="_blank" href="./board.php" class="rep current repspecial" id="foucs_tab_1" data-type="topic" data-token="" title="十大热帖">
						    <span class="info-card">十大话题</span>
						    <img src="img/one.jpg" >
						</a>

					    <a target="_blank" href="./board.php" class="rep repspecial" id="foucs_tab_2" data-type="topic" data-token="" title="推荐版面" >
					    	<span class="info-card">推荐文章</span>
					 		<img src="img/two.jpg" >
					    </a>

					    <a target="_blank" href="./board.php" class="rep repspecial" id="foucs_tab_3" data-type="topic" data-token="" title="体育健身">
					    	<span class="info-card">今日新帖</span>
					        <img src="img/three.jpg" >
					    </a>


					    <a target="_blank" href="./secondary.php" class="rep" id="foucs_tab_4" data-type="topic" data-token="" title="文学艺术">
					    	<span class="info-card">信息天地</span>
					    	<img src="img/four.jpg" >
					    </a>

					    <a target="_blank" href="./secondary.php" class="rep" id="foucs_tab_5" data-type="topic" data-token="" title="本站系统">
					    	<span class="info-card">学习考试</span>
					    	<img src="img/five.jpg" >
					    </a>

					    <a target="_blank" href="./secondary.php" class="rep" id="foucs_tab_6" data-type="topic" data-token="" title="武汉大学">
					    	<span class="info-card">本站系统</span>
					    	<img src="img/eight.jpg" >
					    </a>

					    <a target="_blank" href="./secondary.php" class="rep" id="foucs_tab_7" data-type="topic" data-token="" title="电脑网络">
					    	<span class="info-card">文学艺术</span>
							<img src="img/seven.jpg" >
					    </a>

					    <a target="_blank" href="./secondary.php" class="rep" id="foucs_tab_8" data-type="topic" data-token="" title="社会信息">
					    	<span class="info-card">武汉大学 </span>
							<img src="img/six.jpg" >
					    </a>

					    <a target="_blank" href="./secondary.php" class="rep" id="foucs_tab_9" data-type="topic" data-token="" title="科学技术">
					    	<span class="info-card"> 体育健身</span>
					  		<img src="img/night.jpg" >
					    </a>


					     <a target="_blank" href="./secondary.php" class="rep" id="foucs_tab_10" data-type="topic" data-token="" title="电脑网络">
					    	<span class="info-card">知性感性 </span>
							<img src="img/seven.jpg" >
					    </a>

					    <a target="_blank" href="./secondary.php" class="rep" id="foucs_tab_11" data-type="topic" data-token="" title="社会信息">
					    	<span class="info-card">休闲娱乐</span>
							<img src="img/eight.jpg" >
					    </a>

					    <a target="_blank" href="./secondary.php" class="rep" id="foucs_tab_12" data-type="topic" data-token="" title="科学技术">
					    	<span class="info-card">生活时尚</span>
					  		<img src="img/night.jpg" >
					    </a>

					   
    				</div>

					<!--右栏重复出现12次，-->

    				<div class="single-story" id="foucs_con_1">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/one.jpg">
		    				<div class="story-title">
		    					<div>
		    						<a class="name" href="./board.php" target="_blank">十大话题</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	526
								    </span>
								     <p>
								     <a class="question_link" target="_blank" href="./disparticle.php">
								     	吐槽一下本期跑男
								     </a>
									<a href="./board.php">
										[武大特快]
									</a>
								     </p>
							    </div>
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">年终了，大家评评哪个武大哪个食堂最差？哪个食堂最好？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							   
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">本人武大校友，想在武大附近租房，求收留。妹子当然最好啦
								    </a>
									<a href="./board.php">
										[房屋租赁]
									</a>
								    </p>
							    </div>
						    </div>
						 
						</div>
		    		</div>

		    		<div class="single-story undisplay" id="foucs_con_2">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/two.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="./board.php" target="_blank">推荐文章</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	526
								    </span>
								     <p>
								     <a class="question_link" target="_blank" href="./disparticle.php">
								     	吐槽一下本期跑男
								     </a>
									<a href="./board.php">
										[武大特快]
									</a>
								     </p>
							    </div>
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">年终了，大家评评哪个武大哪个食堂最差？哪个食堂最好？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							   
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">本人武大校友，想在武大附近租房，求收留。妹子当然最好啦
								    </a>
									<a href="./board.php">
										[房屋租赁]
									</a>
								    </p>
							    </div>
						    </div>
						</div>
		    		</div>

		    		<div class="single-story undisplay" id="foucs_con_3">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/three.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="./board.php" target="_blank">今日新帖</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	526
								    </span>
								     <p>
								     <a class="question_link" target="_blank" href="./disparticle.php">
								     	吐槽一下本期跑男
								     </a>
									<a href="./board.php">
										[武大特快]
									</a>
								     </p>
							    </div>
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">年终了，大家评评哪个武大哪个食堂最差？哪个食堂最好？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							   
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">本人武大校友，想在武大附近租房，求收留。妹子当然最好啦
								    </a>
									<a href="./board.php">
										[房屋租赁]
									</a>

								    </p>
							    </div>
						    </div>
						</div>
		    		</div>

		    		<div class="single-story undisplay" id="foucs_con_4">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/four.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="" target="_blank">信息天地</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	526
								    </span>
								     <p>
								     <a class="question_link" target="_blank" href="./disparticle.php">
								     	吐槽一下本期跑男
								     </a>
									<a href="./board.php">
										[武大特快]
									</a>
								     </p>
							    </div>
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">年终了，大家评评哪个武大哪个食堂最差？哪个食堂最好？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							   
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">本人武大校友，想在武大附近租房，求收留。妹子当然最好啦
								    </a>
									<a href="./board.php">
										[房屋租赁]
									</a>
								    </p>
							    </div>
						    </div>
						</div>
		    		</div>

		    		<div class="single-story undisplay" id="foucs_con_5">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/five.jpg">
		    					<div class="story-title">
		    					<div>
		    						<a class="name" href="" target="_blank">学习考试</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	526
								    </span>
								     <p>
								     <a class="question_link" target="_blank" href="./disparticle.php">
								     	吐槽一下本期跑男
								     </a>
									<a href="./board.php">
										[武大特快]
									</a>
								     </p>
							    </div>
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">年终了，大家评评哪个武大哪个食堂最差？哪个食堂最好？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							   
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">本人武大校友，想在武大附近租房，求收留。妹子当然最好啦
								    </a>
									<a href="./board.php">
										[房屋租赁]
									</a>
								    </p>
							    </div>
						    </div>
						</div>
		    		</div>

		    		<div class="single-story undisplay" id="foucs_con_6">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/six.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="" target="_blank">本站系统</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	526
								    </span>
								     <p>
								     <a class="question_link" target="_blank" href="./disparticle.php">
								     	吐槽一下本期跑男
								     </a>
									<a href="./board.php">
										[武大特快]
									</a>
								     </p>
							    </div>
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">年终了，大家评评哪个武大哪个食堂最差？哪个食堂最好？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							   
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">本人武大校友，想在武大附近租房，求收留。妹子当然最好啦
								    </a>
									<a href="./board.php">
										[房屋租赁]
									</a>
								    </p>
							    </div>
						    </div>
						</div>
		    		</div>

		    		<div class="single-story undisplay" id="foucs_con_7">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/seven.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="" target="_blank">文学艺术</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	526
								    </span>
								     <p>
								     <a class="question_link" target="_blank" href="./disparticle.php">
								     	吐槽一下本期跑男
								     </a>
									<a href="./board.php">
										[武大特快]
									</a>
								     </p>
							    </div>
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">年终了，大家评评哪个武大哪个食堂最差？哪个食堂最好？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							   
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">本人武大校友，想在武大附近租房，求收留。妹子当然最好啦
								    </a>
									<a href="./board.php">
										[房屋租赁]
									</a>
								    </p>
							    </div>
						    </div>
						</div>
		    		</div>

		    		<div class="single-story undisplay" id="foucs_con_8">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/six.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="" target="_blank">武汉大学</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	526
								    </span>
								     <p>
								     <a class="question_link" target="_blank" href="./disparticle.php">
								     	吐槽一下本期跑男
								     </a>
									<a href="./board.php">
										[武大特快]
									</a>
								     </p>
							    </div>
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">年终了，大家评评哪个武大哪个食堂最差？哪个食堂最好？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							   
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">本人武大校友，想在武大附近租房，求收留。妹子当然最好啦
								    </a>
									<a href="./board.php">
										[房屋租赁]
									</a>
								    </p>
							    </div>
						    </div>
						</div>
		    		</div>

		    		<div class="single-story undisplay" id="foucs_con_9">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/night.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="" target="_blank">体育健身</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	526
								    </span>
								     <p>
								     <a class="question_link" target="_blank" href="./disparticle.php">
								     	吐槽一下本期跑男
								     </a>
									<a href="./board.php">
										[武大特快]
									</a>
								     </p>
							    </div>
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">年终了，大家评评哪个武大哪个食堂最差？哪个食堂最好？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							   
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">本人武大校友，想在武大附近租房，求收留。妹子当然最好啦
								    </a>
									<a href="./board.php">
										[房屋租赁]
									</a>
								    </p>
							    </div>
						    </div>
						</div>
		    		</div>


		    			<div class="single-story undisplay" id="foucs_con_10">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/night.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="" target="_blank">知性感性</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	526
								    </span>
								     <p>
								     <a class="question_link" target="_blank" href="./disparticle.php">
								     	吐槽一下本期跑男
								     </a>
									<a href="./board.php">
										[武大特快]
									</a>
								     </p>
							    </div>
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">年终了，大家评评哪个武大哪个食堂最差？哪个食堂最好？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							   
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">本人武大校友，想在武大附近租房，求收留。妹子当然最好啦
								    </a>
									<a href="./board.php">
										[房屋租赁]
									</a>
								    </p>
							    </div>
						    </div>
						</div>
		    		</div>

				

					<div class="single-story undisplay" id="foucs_con_11">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/night.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="" target="_blank">休闲娱乐</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	526
								    </span>
								     <p>
								     <a class="question_link" target="_blank" href="./disparticle.php">
								     	吐槽一下本期跑男
								     </a>
									<a href="./board.php">
										[武大特快]
									</a>
								     </p>
							    </div>
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">年终了，大家评评哪个武大哪个食堂最差？哪个食堂最好？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							   
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">本人武大校友，想在武大附近租房，求收留。妹子当然最好啦
								    </a>
									<a href="./board.php">
										[房屋租赁]
									</a>
								    </p>
							    </div>
						    </div>
						</div>
		    		</div>


					<div class="single-story undisplay" id="foucs_con_12">
		 	 			<div class="single-story-inner">
		    				<img class="author-img" src="img/night.jpg">
		    						<div class="story-title">
		    					<div>
		    						<a class="name" href="" target="_blank">生活时尚</a>
		    					</div>
								<div>
									<span class="whitespacen">
										<br />
									</span>
								</div>

							</div>

						    <div class="sep"></div>
							<div class="story-content">
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	526
								    </span>
								     <p>
								     <a class="question_link" target="_blank" href="./disparticle.php">
								     	吐槽一下本期跑男
								     </a>
									<a href="./board.php">
										[武大特快]
									</a>
								     </p>
							    </div>
							  
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">年终了，大家评评哪个武大哪个食堂最差？哪个食堂最好？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							   
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">冬至日，你吃饺子了吗？
								    </a>
									<a href="./board.php">
										[武大特快]
									</a>
								    </p>
							    </div>
							    
							    <div class="story-content-answer">
								    <span class="vote">
								    	551
								    </span>
								    <p>
								    <a class="question_link" target="_blank" href="./disparticle.php">本人武大校友，想在武大附近租房，求收留。妹子当然最好啦
								    </a>
									<a href="./board.php">
										[房屋租赁]
									</a>
								    </p>
							    </div>
						    </div>
						</div>
		    		</div>

		  		<!--*****************-->
				</div>
			</div>
		</div>

<!--Container and wrapper-->
	</div>
</div>


</div>


<script src="js/foucs.js"></script>






  <script>
            foucs_module.run();
  </script>

        <!-- 全局脚本 -->
 <script src="js/global.js"></script>

 

</BODY>


</HTML>

<?php }} ?>
