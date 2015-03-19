<?php /*%%SmartyHeaderCode:401454944c40b67ab9-73507259%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f24eaa4ada8faa6c0ec53a204d1f30bf996aea70' => 
    array (
      0 => '.\\templates\\setting.tpl',
      1 => 1419005754,
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
      1 => 1419152116,
      2 => 'file',
    ),
    '7766edeed70c03bb2918a932d78f502767064661' => 
    array (
      0 => '.\\templates\\left.tpl',
      1 => 1419006274,
      2 => 'file',
    ),
    '035b166905f69692e75fbf1923446754f13b42c4' => 
    array (
      0 => '.\\templates\\right.tpl',
      1 => 1418548662,
      2 => 'file',
    ),
    '1be7ff7fdee636597edd726ee98dfef4bfd55d1f' => 
    array (
      0 => '.\\templates\\footer.tpl',
      1 => 1418822367,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '401454944c40b67ab9-73507259',
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54968af67db088_36168914',
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54968af67db088_36168914')) {function content_54968af67db088_36168914($_smarty_tpl) {?><HTML>
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
            <a id="message" href="javascript:void(0);" title="私信">
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
            <a id="top_ten" href="javascripte:void(0);" title="Hot十大话题">
                <img width ="28" height="24" src="img/icon-leftnav-topTen.png" alt="Hot十大话题">
            </a>
        </div >
        <div class="items">
            <a id="recommand" href="javascripte:void(0);" title="推荐文章">
                <img width="100" height="100" src="img/icon-leftnav-recommand.png" alt="推荐文章">
            </a>
        </div>
        <div class="items">
            <a id="newest" href="/testsmarty/vote.php" title="今日新帖">
                <img width="100" height="100" src="img/icon-leftnav-newest.png" alt="今日新帖">
            </a>
        </div>
        <div class="items">
            <a id="lecture" href="javascripte:void(0);" title="讲座">
                <img width="100" height="100" src="img/icon-leftnav-lecture.png" alt="讲座">
            </a>
        </div>
        <div class="items">
            <a id="notification" href="javascripte:void(0);" title="组织公告">
                <img width="100" height="100" src="img/icon-leftnav-notification.png" alt="组织公告">
            </a>
        </div>
        <div class="items">
            <a id="poster" href="javascripte:void(0);" title="海报">
                <img width="100" height="100" src="img/icon-leftnav-poster.png" alt="海报">
            </a>
        </div>
        <div class="items">
            <a id="telnet" href="#" title="telnet">
                <img width="100" height="100" src="img/icon-leftnav-telnet.png" alt="telnet">
            </a>
        </div>
        <div class="items">
            <a id="post" href="/testsmarty/answer.php" title="发帖">
                <img width="100" height="100" src="img/icon-leftnav-post.png" alt="发帖">
            </a>
        </div>
    </div>
</div>

<div id="right_affix">
    <div id="nav_right" class="nav_right" data-spy="affix" data-offset-top="30">
        <ul>
            <li>
               
                    <a id="lecture" href="javascripte:void(0);" title="讲座" onmouseover="showDiv(this)" onmouseout="closeDiv(this)" >
                       <h3>讲座</h3>
                    </a>
               
            </li>

            <li>
                
                    <a id="announcement" href="javascripte:void(0);" title="组织公告" onmouseover="showDiv(this)" onmouseout="closeDiv(this)" >
                        <h3>组织公告</h3>
                    </a>
               
            </li>  
            
            <li> 
                
                    <a id="poster" href="javascripte:void(0);" title="海报" onmouseover="showDiv(this)" onmouseout="closeDiv(this)">
                        <h3>海报</h3>
                    </a>
                
            </li>
                
        </ul>

    </div>



<div class="right_message_box" id="right_message_box">
            <div class="cont" style="display:none;">
                <ul class="sublist clearfix">
                        <li>
                        <h3><span>讲座</span></h3>
                        </li>
                        <p>
                            <li>
                             <a href="/">国社会医疗保险国社会医疗保险国社会医疗保险国社会医疗保险</a>
                            </li>
                            <li>
                             <a href="/">国社会医疗保险</a>
                            </li>
                           <li>
                             <a href="/">国社会医疗保险</a>
                            </li>
                             <li>
                             <a href="/">国社会医疗保险</a>
                            </li>
                              <li>
                             <a href="/">国社会医疗保险</a>
                            </li>
                        </p>
            
                </ul>
            </div>

            <div class="cont" style="display:none;">
                <ul class="sublist clearfix">
                        <li>
                        <h3><span>组织公告</span></h3>
                        </li>
                        <p>
                            <li>
                             <a href="/">国社会医疗保险国社会医疗保险国社会医疗保险国社会医疗保险</a>
                            </li>
                            <li>
                             <a href="/">国社会医疗保险</a>
                            </li>
                           <li>
                             <a href="/">国社会医疗保险</a>
                            </li>
                             <li>
                             <a href="/">国社会医疗保险</a>
                            </li>
                              <li>
                             <a href="/">国社会医疗保险</a>
                            </li>
                        </p>
                    
                    
                </ul>
            </div>
            
            <div class="cont" style="display:none;">
                <ul class="sublist clearfix">
                        <li>
                        <h3 ><span>海报</span></h3>
                        </li>
                        <p>
                            <li>
                             <a href="/">国社会医疗保险国社会医疗保险国社会医疗保险国社会医疗保险</a>
                            </li>
                            <li>
                             <a href="/">国社会医疗保险</a>
                            </li>
                           <li>
                             <a href="/">国社会医疗保险</a>
                            </li>
                             <li>
                             <a href="/">国社会医疗保险</a>
                            </li>
                              <li>
                             <a href="/">国社会医疗保险</a>
                            </li>
                        </p>
            </div>
      
        </div>
</div>

<script type="text/javascript">
(function(){
    var time = null;
    var list = $("#nav_right");
    var box = $("#right_message_box");
    var lista = list.find("a");

    for(var i=0,j=lista.length;i<j;i++){
        if(lista[i].className == "now"){
            var olda = i;
        }
    }
    var box_show = function(hei){
        box.stop().animate({
            height:hei,
            opacity:1
        },400);
    }
    var box_hide = function(){
        box.stop().animate({
            height:0,
            opacity:0
        },400);
    }

    lista.hover(function(){
        lista.removeClass("now");
        $(this).addClass("now");
        clearTimeout(time);
        var index = list.find("a").index($(this));
        box.find(".cont").hide().eq(index).show();
        var _height = box.find(".cont").eq(index).height()+24;
        box_show(_height)

    },function(){
        time = setTimeout(function(){   
            box.find(".cont").hide();
            box_hide();
        },500);
        lista.removeClass("now");
        lista.eq(olda).addClass("now");
    });


    box.find(".cont").hover(function(){
        var _index = box.find(".cont").index($(this));
        lista.removeClass("now");
        lista.eq(_index).addClass("now");
        clearTimeout(time);
        $(this).show();
        var _height = $(this).height()+24;
        box_show(_height);
    },function(){

     time = setTimeout(function(){       
            $(this).hide();
            box_hide();
        },1000);


        lista.removeClass("now");
        lista.eq(olda).addClass("now");


    });
})();
</script>     




<div class="settingcontainer">

<div id="user-setting-page">
    <h1>帐号设置</h1>

    <div>
        <form action="" method="post">
            <div class="setting-unit">
                <div class="unit-title">
                    基本资料
                </div>
                <table class="list">
                    <tbody>
                        <tr>
                            <td class="row-header">登录名：</td>
                            <td>
                                <input name="logname" class="input-area form-control" placeholder="luojiashanshui" >
                                
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><span>2-12字符，可用字母或数字，开头必须为字母</span></td>
                        </tr>
                        <tr>
                            <td>
                                <a id="alter-password">修改密码</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="row-header">性别：</td>
                            <td class="sex">
                                <label>
                                    <input type="radio" name="sex" value="f">
                                    男
                                </label>
                                <label>
                                    <input type="radio" name="sex" value="m">
                                    女
                                </label>
                                <label>
                                    <input type="radio" name="sex" value="s">
                                    保密
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="row-header">生日：</td>
                            <td class="birthday">
                                <input id="year" class="input-area form-control" maxlength="4" value>
                                <label>年</label>
                                <input class="input-area form-control" maxlength="2" value>
                                <label>月</label>
                                <input class="input-area form-control" maxlength="2" value>
                                <label>日</label>
                            </td>
                        </tr>
                        <tr>
                            <td class="row-header">邮箱：</td>
                            <td><input class="input-area form-control" value>
                            </td>
                        </tr>
                    </tbody>    
                </table>
            </div>
            <div class="setting-unit">
                <div class="unit-title">
                    实名认证
                </div>
                <table class="list">
                    <tbody>

                        <tr>
                            <td class="row-header">真实姓名：</td>
                            <td>
                               <input name="username" class="input-area form-control"  placeholder="珞珈山水">

                                
                            </td>

                        </tr>
                      
                     
                         
                        <tr>
                            <td class="row-header">学号/工号：</td>
                            <td>
                                <input name="userID" class="input-area form-control" placeholder="2012302580001">
                            </td>
                        </tr>
                        <tr>
                            <td class="row-header">院系/部门：</td>
                            <td>
                                <input name="department" class="input-area form-control" placeholder="国际软件学院">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                
                            </td>
                            <td>
                                <span class="note">在校学生可自动实名认证</span>
                            </td>
                        </tr>
                    </tbody>    
                </table>
            </div>

            <button id="submit-setting" type="button" class="btn btn-primary">
                <strong>保存</strong>
            </button>
        </form>
    </div>

    
  </div>

</div>





  <script>
            foucs_module.run();
  </script>

        <!-- 全局脚本 -->
 <script src="js/global.js"></script>

</BODY>


</HTML>
<?php }} ?>
