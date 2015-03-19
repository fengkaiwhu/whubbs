<?php /*%%SmartyHeaderCode:30250549683fdd8bc50-95897455%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58abbab8bdd8e11a44ef893dc7bd4f6c890139b8' => 
    array (
      0 => '.\\templates\\usermanagemenu.tpl',
      1 => 1419825049,
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
    '297bf05ee0d00464509a6c3334f19ac61fce67bc' => 
    array (
      0 => '.\\templates\\carouselad.tpl',
      1 => 1419241232,
      2 => 'file',
    ),
    '1be7ff7fdee636597edd726ee98dfef4bfd55d1f' => 
    array (
      0 => '.\\templates\\footer.tpl',
      1 => 1419428904,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30250549683fdd8bc50-95897455',
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_55081a7a6ec658_63391107',
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55081a7a6ec658_63391107')) {function content_55081a7a6ec658_63391107($_smarty_tpl) {?>
<HTML>
<HEAD>
<TITLE>hello - Hello Ned</TITLE>
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
<script type="text/javascript" src="js/smartpaginator.js"></script>
<link href="css/smartpaginator.css" rel="stylesheet" type="text/css" />
<div class="votecontainer containerradius">





<div class="col-xs-4">
                <table class="table">
                    <tbody>
                        <tr align="center">
                           <div class="WB_main_r">
                                
                                <div id="v6_pl_rightmod_myinfo">
                                    <div class="WB_cardwrap S_bg2">
                                        <div class="W_person_info">
                                            <div class="cover" id="skin_cover_s" style="background-image: url(./img/1.jpg)">
                                                <div class="headpic"><a title="srender晨旭">
                                                    <img class="W_face_radius" src="./img/userface/image6.gif" width="60" height="60" alt="srender晨旭">
                                                    </a>
                                                   </div>
                                            </div>
                                            <div class="WB_innerwrap">
                                                <div class="nameBox">
                                                <a href=" " class="name S_txt1" title="srender晨旭">
                                                     E时代专家
                                                </a>
                                                <a  target="_blank" href="">
                                                <span class="W_icon_level icon_level_c3">
                                                    <span class="txt_out">
                                                    <span class="txt_in">
                                                        <span title="山水等级">用户</span>
                                                    </span>
                                                    </span>
                                                </span>
                                                </a>
                                                </div>
                                                <ul class="user_atten clearfix W_f18" id="person-info">
                                                    <li class="S_line1" id="login-time">
                                                        <a class="S_txt1" >
                                                        <strong>204</strong>
                                                        <span class="S_txt2">登录</span>
                                                        </a>
                                                    </li>
                                                    <li class="S_line1" id="friend-number">
                                                    <a class="S_txt1">
                                                        <strong>358</strong>
                                                        <span class="S_txt2">好友</span>
                                                        </a>
                                                    </li>
                                                    <li class="S_line1 noborder" id="tiezi-number">
                                                    <a class="S_txt1">
                                                        <strong>143</strong>
                                                        <span class="S_txt2">帖子</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </tr>
                        <tr>
                            <th class="userth">基本信息</th>
                        </tr>
                        <tr>
                            <td align="left" valign="top">用户昵称： E时代专家<br>
                                用户等级： 用户<br>
                                用户门派： 3.14<br>
                                帖数总数： 7<br>
                                注册时间： 2014-11-24 <br>
                                登录次数： 43<br>
                            </td>
                        </tr>
                    </tbody>
                </table>
 </div>         
          
<div class="col-xs-8 personpulish">
                <table class="table">
                <caption class="userth">个人帖子</caption>
                    <tbody>
                       
                        <tr>
                            <td align="left">
                              如何在互联网时代生存
                                 <span class="W_icon_level icon_level_c3">
                                            <span class="txt_out">
                                            <span class="txt_in">
                                                  <span title="山水等级">
                                                  22
                                                  </span>
                                            </span>
                                            </span>
                                       </span>
                            </td>
                            <td>2012.30.8</td>
                            
                        </tr>

                      
                         </tr>

                           <tr>
                            <td align="left">
                              西宁我的梦455
                                 <span class="W_icon_level icon_level_c3">
                                            <span class="txt_out">
                                            <span class="txt_in">
                                                  <span title="山水等级">
                                                  22
                                                  </span>
                                            </span>
                                            </span>
                                       </span>
                            </td>
                            <td>2012.30.8</td>
                            
                        </tr>
                         </tr>

                           <tr>
                            <td align="left">
                              西宁我的梦11
                                 <span class="W_icon_level icon_level_c3">
                                            <span class="txt_out">
                                            <span class="txt_in">
                                                  <span title="山水等级">
                                                  22
                                                  </span>
                                            </span>
                                            </span>
                                       </span>
                            </td>
                            <td>2012.30.8</td>
                            
                        </tr>
                         </tr>

                           <tr>
                            <td align="left">
                              西宁我的梦22
                                 <span class="W_icon_level icon_level_c3">
                                            <span class="txt_out">
                                            <span class="txt_in">
                                                  <span title="山水等级">
                                                  22
                                                  </span>
                                            </span>
                                            </span>
                                       </span>
                            </td>
                            <td>2012.30.8</td>
                            
                        </tr>
                         </tr>

                           <tr>
                            <td align="left">
                              西宁我的梦23
                                 <span class="W_icon_level icon_level_c3">
                                            <span class="txt_out">
                                            <span class="txt_in">
                                                  <span title="山水等级">
                                                  22
                                                  </span>
                                            </span>
                                            </span>
                                       </span>
                            </td>
                            <td>2012.30.8</td>
                            
                        </tr>

                            <tr>
                            <td align="left">
                              西宁我的梦23
                                 <span class="W_icon_level icon_level_c3">
                                            <span class="txt_out">
                                            <span class="txt_in">
                                                  <span title="山水等级">
                                                  22
                                                  </span>
                                            </span>
                                            </span>
                                       </span>
                            </td>
                            <td>2012.30.8</td>
                            
                        </tr>

                            <tr>
                            <td align="left">
                              西宁我的梦23
                                 <span class="W_icon_level icon_level_c3">
                                            <span class="txt_out">
                                            <span class="txt_in">
                                                  <span title="山水等级">
                                                  22
                                                  </span>
                                            </span>
                                            </span>
                                       </span>
                            </td>
                            <td>2012.30.8</td>
                            
                        </tr>

                            <tr>
                            <td align="left">
                              西宁我的梦23
                                 <span class="W_icon_level icon_level_c3">
                                            <span class="txt_out">
                                            <span class="txt_in">
                                                  <span title="山水等级">
                                                  22
                                                  </span>
                                            </span>
                                            </span>
                                       </span>
                            </td>
                            <td>2012.30.8</td>
                            
                        </tr>

                            <tr>
                            <td align="left">
                              西宁我的梦23
                                 <span class="W_icon_level icon_level_c3">
                                            <span class="txt_out">
                                            <span class="txt_in">
                                                  <span title="山水等级">
                                                  22
                                                  </span>
                                            </span>
                                            </span>
                                       </span>
                            </td>
                            <td>2012.30.8</td>
                            
                        </tr>
                    </tbody>
                </table>
    
</div>

<!--My collection-->

<div class="col-xs-12 collectarea">
<table class="table">
        <caption class="collectth">我的收藏</caption> 
      <tbody>
        <div id="v6_pl_content_myfavoriteslist">
            <div>
                <div class="WB_feed">
                    <!--1-->
                     <tr>
                     <td>
                         <div class="WB_cardwrap WB_feed_type S_bg2">
                        <div class="WB_feed_detail clearfix">
                           
                            <div class="WB_face W_fl">
                                <div class="face">
                                    <a target="_blank" class="W_face_radius" href="" title="Eexpert">
                                        <img title="srender 晨旭" alt="" width="50" height="50" src="./img/userface/image123.gif" class="W_face_radius"></a>
                                </div>
                            </div>
                            <div class="WB_detail">
                                <div class="WB_info">
                                    <a target="_blank" class="W_f14 W_fb S_txt1" title="Eexpert" href="./dispuser.php">Eexpert</a>
                                    <a  target="_blank" href="">
                                      <span class="W_icon_level icon_level_c3">
                                            <span class="txt_out">
                                            <span class="txt_in">
                                                  <span title="山水等级">
                                                  版主
                                                  </span>
                                            </span>
                                            </span>
                                       </span>
                                    </a>
                                </div>

                                <div class="WB_text W_f14">
                                <a href="./disparticle.php">
                                 年终了，大家评评哪个武大哪个食堂最差？哪个食堂最好？
                                </a>        
                                 </div>

                                <div class="WB_tag clearfix S_txt2">
                                    <span class="W_fr">收藏于12月6日11:41</span>
                           
                                </div>
                                <!-- /feed区组件_收藏tag -->
                                <div class="WB_from S_txt2">
                                    <a target="_blank" href="#" title="2014-12-06 10:30" class="S_txt2">12月6日 10:30</a>  来自
                                    <a class="S_txt2" target="_blank" href="./board.php" rel="nofollow">版面名称</a>
                                </div>

                            </div>
                        </div>
                        <div class="WB_feed_handle">
                            <div class="WB_handle">
                                <ul class="WB_row_line WB_row_r4 clearfix S_line2">
                                     <li>
                                        <a class="S_txt2" href="javascript:void(0);"><span class="pos"><span class="line S_line1">取消收藏</span></span></a>
                                    </li>
                                     <li>
                                        <a class="S_txt2" href="javascript:void(0);"><span class="pos"><span class="line S_line1">回复</span></span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="WB_feed_repeat S_bg1" style="display: none;"></div>
                        </div>
                    </div>
                    </td>
                    </tr>
                    <!--1 end-->

                    <!--2-->
                    <tr>
                     <td>
                          <div class="WB_cardwrap WB_feed_type S_bg2">
                        <div class="WB_feed_detail clearfix">
                           
                            <div class="WB_face W_fl">
                                <div class="face">
                                    <a target="_blank" class="W_face_radius" href="" title="Taylor swift">
                                        <img title="srender 晨旭" alt="" width="50" height="50" src="./img/userface/image78.gif" class="W_face_radius"></a>
                                </div>
                            </div>
                            <div class="WB_detail">
                                <div class="WB_info">
                                    <a target="_blank" class="W_f14 W_fb S_txt1" title="srender 晨旭" href="./dispuser.php">Taylor swift</a>
                                    <a  target="_blank" href="">
                                      <span class="W_icon_level icon_level_c3">
                                            <span class="txt_out">
                                            <span class="txt_in">
                                                  <span title="山水等级">版主</span>
                                            </span>
                                            </span>
                                       </span>
                                    </a>
                                </div>

                                <div class="WB_text W_f14">
                                <a href="./disparticle.php">
                                    泰勒·斯威夫特（Taylor Swift），1989年12月13日出生于美国宾夕法尼亚州，美国乡村音乐、流行音乐创作女歌手、演员、慈善家。
                                </a>    
                                </div>

                                <div class="WB_tag clearfix S_txt2">
                                    <span class="W_fr">收藏于12月6日11:41</span>
                                
                                </div>
              
                                <div class="WB_from S_txt2">
                                    <a target="_blank" href="" title="2014-12-06 10:30" class="S_txt2">12月6日 10:30</a>  来自
                                    <a class="S_txt2" target="_blank" href="./board.php" rel="nofollow">版面名称</a>
                                </div>

                            </div>
                        </div>
                        <div class="WB_feed_handle">
                            <div class="WB_handle">
                                <ul class="WB_row_line WB_row_r4 clearfix S_line2">
                                      <li>
                                        <a class="S_txt2" href="javascript:void(0);"><span class="pos"><span class="line S_line1">取消收藏</span></span></a>
                                    </li>
                                     <li>
                                        <a class="S_txt2" href="javascript:void(0);"><span class="pos"><span class="line S_line1">回复</span></span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="WB_feed_repeat S_bg1" style="display: none;"></div>
                        </div>
                    </div>
                    </td>
                    </tr>
                    <!--2 end-->

                    <!--3-->
                    <tr>
                     <td>    
                          <div class="WB_cardwrap WB_feed_type S_bg2">
                        <div class="WB_feed_detail clearfix">
                            <div class="WB_screen W_fr">
                                <div class="screen_box">
                                   
                                </div>
                            </div>
                            <div class="WB_face W_fl">
                                <div class="face">
                                    <a target="_blank" class="W_face_radius" href="" title="srender 晨旭">
                                        <img title="srender 晨旭" alt="" width="50" height="50" src="./img/userface/image23.gif" class="W_face_radius"></a>
                                </div>
                            </div>
                            <div class="WB_detail">
                                <div class="WB_info">
                                    <a target="_blank" class="W_f14 W_fb S_txt1" title="srender 晨旭" href="./dispuser.php">srender 晨旭</a>
                                    <a  target="_blank" href="">
                                      <span class="W_icon_level icon_level_c3">
                                            <span class="txt_out">
                                            <span class="txt_in">
                                                  <span title="山水等级">用户</span>
                                            </span>
                                            </span>
                                       </span>
                                    </a>
                                </div>

                                <div class="WB_text W_f14">
                                <a href="./disparticle.php">
                                《想做web开发，就学JavaScript》为了快速地在web开发工作上增加优势，应该学习什么语言？
                                </a>
                                </div>

                                <div class="WB_tag clearfix S_txt2">
                                    <span class="W_fr">收藏于12月6日11:41</span>
                                </div>
                                <!-- /feed区组件_收藏tag -->
                                <div class="WB_from S_txt2">
                                    <a target="_blank" href="" title="2014-12-06 10:30" class="S_txt2">12月6日 10:30</a>  来自
                                    <a class="S_txt2" target="_blank" href="./board.php" rel="nofollow">版面名称</a>
                                </div>

                            </div>
                        </div>
                        <div class="WB_feed_handle">
                            <div class="WB_handle">
                                <ul class="WB_row_line WB_row_r4 clearfix S_line2">
                                    <li>
                                        <a class="S_txt2" href="javascript:void(0);"><span class="pos"><span class="line S_line1">取消收藏</span></span></a>
                                    </li>
                                     <li>
                                        <a class="S_txt2" href="javascript:void(0);"><span class="pos"><span class="line S_line1">回复</span></span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="WB_feed_repeat S_bg1" style="display: none;"></div>
                        </div>
                    </div>
                    </td>
                    </tr>
                    <!--3 end-->


                    <!--4-->
                    <tr>
                     <td>
                      <div class="WB_cardwrap WB_feed_type S_bg2">
                        <div class="WB_feed_detail clearfix">
                            <div class="WB_screen W_fr">
                                <div class="screen_box">
                                    <a href="javascript:void(0);"><i class="W_ficon ficon_arrow_down S_ficon">c</i></a>
                                    <div class="layer_menu_list" style="display: none; position: absolute; z-index: 999;">
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="WB_face W_fl">
                                <div class="face">
                                    <a target="_blank" class="W_face_radius" href="" title="技术宅的出路">
                                        <img title="srender 晨旭" alt="" width="50" height="50" src="./img/userface/image66.gif" class="W_face_radius"></a>
                                </div>
                            </div>
                            <div class="WB_detail">
                                <div class="WB_info">
                                    <a target="_blank" class="W_f14 W_fb S_txt1" title="技术宅的出路" href="./dispuser.php">技术宅的出路</a>
                                    <a  target="_blank" href="">
                                      <span class="W_icon_level icon_level_c3">
                                            <span class="txt_out">
                                            <span class="txt_in">
                                                  <span title="山水等级">超级用户</span>
                                            </span>
                                            </span>
                                       </span>
                                    </a>
                                </div>

                                <div class="WB_text W_f14">
                                <a href="./disparticle.php">
                                    周杰伦（Jay Chou），1979年1月18日出生于台湾新北市，华语男歌手、词曲创作人、演员、MV及电影导演、编剧及制作人。2000年发行首张个人专辑《Jay》。2002年在中国、新加坡、马来西亚、美国等地举办首场个人世界巡回演唱会。2003年登上美国《时代周刊》亚洲版封面人物[1] 。
                                </a>    
                                </div>
                                <div class="WB_tag clearfix S_txt2">
                                    <span class="W_fr">收藏于12月6日11:41</span>
                             
                                </div>
                                <!-- /feed区组件_收藏tag -->
                                <div class="WB_from S_txt2">
                                    <a target="_blank" href="" title="2014-12-06 10:30" class="S_txt2">12月6日 10:30</a>  来自
                                    <a class="S_txt2" target="_blank" href="./board.php" rel="nofollow">版面名称</a>
                                </div>

                            </div>
                        </div>
                        <div class="WB_feed_handle">
                            <div class="WB_handle">
                                <ul class="WB_row_line WB_row_r4 clearfix S_line2">
                                    <li>
                                        <a class="S_txt2" href="javascript:void(0);"><span class="pos"><span class="line S_line1">取消收藏</span></span></a>
                                    </li>
                                    <li>
                                        <a class="S_txt2" href="javascript:void(0);">
                                            <span class="pos">
                                                <span class="line S_line1">转发 8
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="WB_feed_repeat S_bg1" style="display: none;"></div>
                        </div>
                     </div>   
                     </td>
                     </tr>               
                    <!--4 end-->
                </div>
            </div>
        </div>

      
    </div> 
</div>

<tr>
    <td>
        <div id="collectwrapper">
        
            <div id="skyblue" style="margin: auto;">
            </div>
        </div>
    </td>
</tr>

</tbody>
</table>
<!--My collection  End-->
  
<!--End contianer-->
</div>




</div>



  <script type="text/javascript">
        $(document).ready(function () {

          $('#skyblue').smartpaginator({ totalrecords: 32, recordsperpage: 4, length: 4, next: '下一页', prev: '前一页', first: '首页', last: '尾页', theme: 'skyblue', controlsalways: true, onchange: function (newPage) {
                $('#r').html('Page # ' + newPage);
            }
            });

        });
    </script>





  <script>
            foucs_module.run();
  </script>

        <!-- 全局脚本 -->
 <script src="js/global.js"></script>

 

</BODY>


</HTML>
<?php }} ?>
