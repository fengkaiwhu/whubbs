<?php /*%%SmartyHeaderCode:1612454969d2a9a2487-77667932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '934b1cf77cd75fc50c5067fd73b5613fd0890b9a' => 
    array (
      0 => '.\\templates\\dispuser.tpl',
      1 => 1419316629,
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
      1 => 1419423337,
      2 => 'file',
    ),
    '7766edeed70c03bb2918a932d78f502767064661' => 
    array (
      0 => '.\\templates\\left.tpl',
      1 => 1419423340,
      2 => 'file',
    ),
    '035b166905f69692e75fbf1923446754f13b42c4' => 
    array (
      0 => '.\\templates\\right.tpl',
      1 => 1419423473,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1612454969d2a9a2487-77667932',
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_549ab824e24140_07848293',
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549ab824e24140_07848293')) {function content_549ab824e24140_07848293($_smarty_tpl) {?><HTML>
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

    <ul id="nav">
        <li class="items">
            <a id="message" href="./usermailbox.php" title="私信">
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
            <a id="top_ten" href="./collect.php" title="Hot十大话题">
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
        <div class="items">
            <a id="lecture" href="./usermanagemenu.php" title="个人中心">
                <img width="100" height="100" src="img/icon-leftnav-lecture.png" alt="个人中心">
            </a>
        </div>
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
        <div class="items">
            <a id="post" href="./postarticle.php" title="发帖">
                <img width="100" height="100" src="img/icon-leftnav-post.png" alt="发帖">
            </a>
        </div>
    </div>
</div>

<div id="right_affix">
    <div id="nav_right" class="nav_right" data-spy="affix" data-offset-top="30">
        <ul>
            <li>

                <a id="lecture" href="./board.php" title="讲座" onmouseover="showDiv(this)" onmouseout="closeDiv(this)">
                    <h3>讲座</h3>
                </a>

            </li>

            <li>

                <a id="announcement" href="./board.php" title="组织公告" onmouseover="showDiv(this)" onmouseout="closeDiv(this)">
                    <h3>组织公告</h3>
                </a>

            </li>

            <li>

                <a id="poster" href="./board.php" title="海报" onmouseover="showDiv(this)" onmouseout="closeDiv(this)">
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
                    <h3><span>组织公告</span></h3>
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
    
    <div>
        <div class="PCD_header">
            <div class="pf_wrap">
                <div class="cover_wrap banner_transition"style="background-image: url(/img/ad/as2.jpg);" >
                </div>
                <div class="shadow  S_shadow" layout-shell="false">
                    <div class="pf_photo " node-type="photo">
                        <p class="photo_wrap">
                            <a href="#" title="更换头像">
                                <img src="./img/userface/image43.gif" alt="srender晨旭" class="photo">
                            </a>

                        </p>
                       
                    </div>

                    <div class="pf_username">
                        <span class="username">srender晨旭</span>
                        <span class="icon_bed"><a><i class="W_icon icon_pf_male"></i></a></span>
                    </div>


                    <div class="pf_intro" title="给我感觉！">
                        给我感觉！                   
                    </div>
                    
                <div class="pf_opt">
                    <div class="opt_box clearfix">
                        <div class="btn_bed W_fl">
                            <a href="./sendmail.php?receiver" class="W_btn_d btn_34px">
                                
                                发信问候
                              
                            </a>
                        </div>
                        <div class="btn_bed W_fl">
                            <a href="./friendlist.php"  class="W_btn_d btn_34px" >
                            加为好友
                            </a>
                        </div>
                       
                    </div>
                </div>
    
    



                </div>
                
            </div>
        </div>
    
        <div id="Pl_Core_CustTab__2" name="place" anchor="-50">
            <div class="PCD_tab S_bg2">
                <div class="tab_wrap" style="width: 60%">
                    <table class="tb_tab" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td class="current">
                                    <a>
                                        <span class="S_txt1 t_link"><a onclick="showBaseDiv()">基本资料</a></span>
                                        <span class="ani_border"></span>
                                    </a>
                                </td>
                                <td class=" " >
                                    <a>
                                        <span class="S_txt1 t_link" ><a onclick="showLuntanDiv()">论坛属性</a></span>
                                        <span class="ani_border"></span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!--
<table class="table">
    <tbody>
        <tr>
            <td>
                <img src="img/userface/image0.gif" align="absmiddle/"><b>qhylyh</b>
            </td>
            <td align="right">
                <b>
                    <a href="sendmail.php?receiver=qhylyh" title="给该用户发信">发信问候</a> | 
                    <a href="friendlist.php?addfriend=qhylyh" title="将该用户添加到好友列表">加为好友</a>
                </b>
            </td>
        </tr>
    </tbody>
</table>
-->

<div class="basecontainer" id="basecontainer">
    <table class="table basetable" border="1">
      
        <tbody>
            <tr>
                <th colspan="2" align="left" height="25">基本资料</th>
            </tr>
            <tr>
                <td  width="40%" align="right">昵 称：</td>
                <td >samuel </td>
            </tr>

            <tr>
                <td  width="40%" align="right">性 别：</td>
                <td >男 </td>
            </tr>
            <tr>
                <td  width="40%" align="right">星 座：</td>
                <td >
                    <img src="img/star/z10.gif" alt="魔羯座">
                    魔羯座</td>
            </tr>
            <tr>
                <td  width="40%" align="right">Ｑ Ｑ：</td>
                <td >
                    <font color="gray">未知</font></td>
            </tr>
            <tr>
                <td  width="40%" align="right">ＩＣＱ：</td>
                <td >
                    <font color="gray">未知</font></td>
            </tr>
            <tr>
                <td width="40%" align="right">ＭＳＮ：</td>
                <td >
                    <font color="gray">未知</font></td>
            </tr>
            <tr>
                <td width="40%" align="right">主 页：</td>
                <td >
                    <font color="gray">未知</font></td>
            </tr>
        </tbody>
   
    <table class="table signaturetable" border="1">
      
        <tbody>
            <tr>
                <th colspan="4" align="left" height="25">签名档</th>
            </tr>
            <tr>
                <td>
                    
                     <p>
                                有些事，明知是错的，也要去坚持，因为不甘心；有些人，明知是爱的，也要去放弃，因为没结
                                局；有时候，明知没路了，却还在前行，因为习惯了。
                    </p>
                </td>
            </tr>
        
        </tbody>
    </table>

    </table>
</div>


<div class="luntancontainer" id="luntancontainer">
    <table class="table" border="1">
        <tbody>
            <tr>
                <th align="left" colspan="6" height="25">论坛属性</th>
            </tr>
            <tr>
                <td  width="15%" align="right">论坛职务：</td>
                <td width="35%" ><b>站务总监 </b></td>
                <td width="15%" align="right" >帖子总数：</td>
                <td width="35%" ><b>1115</b> 篇</td>
            </tr>
            <tr>
                <td  width="15%" align="right">门  派：</td>
                <td width="35%" ><b>无门无派 </b></td>
                <td  width="15%" align="right">登录次数：</td>
                <td width="35%" ><b>1592</b>
                </td>
            </tr>
            <tr>
                <td  width="15%" align="right">经验值：</td>
                <td width="35%" ><b>4560 </b></td>
                <td  width="15%" align="right">经验等级：</td>
                <td width="35%" ><b>本站元老</b>
                </td>
            </tr>
            <tr>
                <td  width="15%" align="right">生命力：</td>
                <td width="35%" ><b>999</b></td>
                <td width="15%" align="right" >上次登录：</td>
                <td width="35%" ><b>2014-12-19 17:29:02</b></td>
            </tr>
            <tr>
                <td  width="15%" align="right">同门：</td>
                <td width="35%"  colspan="3"><b>
                    <a href="dispuser.php?id=0">0</a>&nbsp;&nbsp;&nbsp;<a href="dispuser.php?id="></a>&nbsp;&nbsp;&nbsp;<a href="dispuser.php?id="></a>&nbsp;&nbsp;&nbsp; </b></td>
            </tr>
            <tr>
                <td width="50%"  colspan="2" align="center"><b>目前不在站上</b></td>
                <td width="15%" align="right" >最后来访IP：</td>
                <td width="35%" ><b>202.114.74.*</b></td>
            </tr>
        </tbody>
    </table>
</div>

<form method="GET" action="dispuser.php">
    <table class="table dispusertablesearch" >
        <tbody>
            <tr>
                <td>请输入用户名:
                    <input type="text" name="id">&nbsp;<input type="submit" value="查询用户" class="btn-info">
                </td>
            </tr>
        </tbody>
    </table>
</form>


<script type="text/javascript">
    
    function showBaseDiv(){
            var base=document.getElementById('basecontainer');
            var luntan=document.getElementById('luntancontainer');
            base.style.display = "block";
            this.background = "red";
            luntan.style.display = "none";

    }


    function showLuntanDiv(){
             var base=document.getElementById('basecontainer');
            var luntan=document.getElementById('luntancontainer');
             base.style.display = "none";
            luntan.style.display = "block";
    }
</script>


</div><?php }} ?>
