<?php /*%%SmartyHeaderCode:81255489a8d0a57ca2-72246020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9728a1b172f80719120c90e41023371a54c9d950' => 
    array (
      0 => '.\\templates\\vote.tpl',
      1 => 1419153203,
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
      1 => 1419515603,
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
    '1be7ff7fdee636597edd726ee98dfef4bfd55d1f' => 
    array (
      0 => '.\\templates\\footer.tpl',
      1 => 1419428904,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81255489a8d0a57ca2-72246020',
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_549d89d4c60416_74984857',
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549d89d4c60416_74984857')) {function content_549d89d4c60416_74984857($_smarty_tpl) {?><HTML>
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

    <ul class="breadcrumb">
      <li><a href="./index.php">珞珈山水BBS</a> <span class="divider">/</span></li>
      <li><a href="javascript:void(0);">测试1层</a> <span class="divider">/</span></li>
      <li class="active">测试2层</li>
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

        <li class="items">
            <a id="register" href="#registerModal" data-toggle="modal" title="注册">
                注册
            </a>
        </li>

    </ul>

    
    <div id="box-1" class="hidden-box hidden-loc-index">
            <ul>
                <li><span>私信</span>
                 <span title="" class="whitespacelittle" >
                                  22
                  </span>
                    
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




	<div class="votecontainer">

	<h2>创建投票</h2>
	<hr />
	
	

		<div class="panel panel-primary" id="votebase">
			  <div class="panel-heading">投票基本设置</div>
			  <div class="panel-body">
			   <div class="input-group">
					  <span class="input-group-addon">投票标题</span>
					  <input type="text" class="form-control txtwidth" placeholder="请在这儿输入投票标题">
				</div>
				<br />
				<div class="input-group">
					  <span class="input-group-addon">投票类型</span>
					  <div class="leftspace4">
					  <input type="radio" name="votetype" value="single" checked="checked"  />单选
					  <input type="radio" name="votetype" value="multi" />多选
					  </div>		
				</div>
				
						
			  </div>
			</div>

	<div class="panel panel-primary overview" >
		<div class="panel-heading">投票选项</div>
			  <br />
		<div id="voteitem" class="voteitem">		
			<div class="input-group topspace">
				  <span class="input-group-addon">1</span>
				  <input type="text" class="form-control txtwidth">
			</div>

			<div class="input-group topspace">
				  <span class="input-group-addon">2</span>
				  <input type="text" class="form-control txtwidth">
		    </div>

			<button type="button" class="btn btn-primary">增加选项</button>

			<br />

		    <div class="input-group topspace">
				  <span class="input-group-addon">其他</span>
				  <input type="text" class="form-control">
				    <span class="input-group-addon othertxt">
			        	<input type="checkbox">启用其他选项
			      	</span>
		    </div>

		    
		</div>	

		
	</div>
		<button type="button" class="btn btn-primary" >创建投票</button>	


	</div>

	











  <script>
            foucs_module.run();
  </script>

        <!-- 全局脚本 -->
 <script src="js/global.js"></script>

 

</BODY>


</HTML>

<?php }} ?>
