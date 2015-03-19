<?php /*%%SmartyHeaderCode:19545491affeb3bed7-48214133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab6fa0a9198c5c25bee58e174ca63fb64c5add99' => 
    array (
      0 => '.\\templates\\answer.tpl',
      1 => 1419006168,
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
      1 => 1419005897,
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
  'nocache_hash' => '19545491affeb3bed7-48214133',
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54967c31722699_56857691',
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54967c31722699_56857691')) {function content_54967c31722699_56857691($_smarty_tpl) {?><HTML>
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
            <a id="message" href="javascript:void(0);" title="私信">
                <img  src="img/icon-message.png" alt="私信">
            </a>
        </li>
        <li class="items">
            <a id="setting" href="/testsmarty/setting.php" title="设置">
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




<br />
	<div class="mcontainer">
		<div class="mmcontainer">

		<div class="panel panel-primary" id="votebase">
			  <div class="panel-heading"><b>发表新帖子</b></div>
			  

			  <table class="table">
			  	<tr>
			  	<!--
			  		<td>主题标题：
						 <SELECT name=font onchange=DoTitle(this.options[this.selectedIndex].value) class="dropdown">
			              <OPTION selected value="">选择话题</OPTION> <OPTION value=[原创]>[原创]</OPTION> 
			              <OPTION value=[转帖]>[转帖]</OPTION> <OPTION value=[灌水]>[灌水]</OPTION> 
			              <OPTION value=[讨论]>[讨论]</OPTION> <OPTION value=[求助]>[求助]</OPTION> 
			              <OPTION value=[推荐]>[推荐]</OPTION> <OPTION value=[公告]>[公告]</OPTION> 
			              <OPTION value=[注意]>[注意]</OPTION> <OPTION value=[贴图]>[贴图]</OPTION>
			              <OPTION value=[建议]>[建议]</OPTION> <OPTION value=[下载]>[下载]</OPTION>
			              <OPTION value=[分享]>[分享]</OPTION></SELECT>

			  		</td>

			  		-->
					<td><b>主题标题：</b>
			  		<div class="btn-group">
					  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
					    话 题<span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
					    
					    <li><a href="#">[原创]</a></li>
					    <li><a href="#">[转帖]</a></li>
					     <li><a href="#">[灌水]</a></li>
					    
					    <li><a href="#">[求助]</a></li>
					    <li><a href="#">[下载]</a></li>
					  </ul>
					</div>
					</td>

			  		<td>
			  			<input class="form-control" width="" name="subject" value=""><font color=#ff0000><strong>*</strong></font>不得超过 25 个汉字或50个英文字符
			  			  
			  		</td>
			  	</tr>
			  	<tr>
			  		<td>文件上传</td>
			  		<td>
			  			
			  			<iframe name="ad" frameborder=0 width=100% height=24 scrolling=no src="postupload.php?board="></iframe>
			  		</td>
			  	</tr>
				<tr>
			  		<td width="20%" valign="top" class="TableBody1">
			  			<b>内容</b>
			  		</td>
			        <td width="80%" class="TableBody1">

			          <textarea class="smallarea" cols="95" name="Content" id="oArticleContent" rows="12" wrap="VIRTUAL" title="IE中可以使用Ctrl+Enter直接提交贴子" class="FormClass" resize="none" onkeydown="ctlent()">

			          </textarea>
			        </td>
			  	</tr>
				<tr>
			  		   <td class=TableBody1 valign=top colspan=2 style="table-layout:fixed; word-break:break-all"><b>点击表情图即可在帖子中加入相应的表情</B><br>

              </td>
			  	</tr>
				<tr>
			  		<td valign=top class=TableBody1>
			  			<b>选项</b>
			  		</td>
                	<td valign=middle class=TableBody1>&nbsp;
                	<!--
                	<select name="signature">
		                <option value="0" selected="selected">不使用签名档</option>
		                <option value="0">不使用签名档</option>
		                <option value="<?php echo '<?php'; ?>
 echo $i; <?php echo '?>'; ?>
" selected="selected">第 <?php echo '<?php'; ?>
 echo $i; <?php echo '?>'; ?>
 个</option>
		                <option value="<?php echo '<?php'; ?>
 echo $i; <?php echo '?>'; ?>
">第 <?php echo '<?php'; ?>
 echo $i; <?php echo '?>'; ?>
 个</option>
		                <option value="-1" <?php echo '<?php'; ?>
 if ($currentuser["signature"] < 0) echo "selected "; <?php echo '?>'; ?>
>随机签名档</option>
		            </select>
					<BR><BR>
					-->
					<div class="btn-group">
					  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
					    签名档 <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
					   
					    <li><a href="#">不使用</a></li>
					    <li><a href="#">使用</a></li>
					    
					  </ul>
					</div>

					</td>
			  	</tr>  

				<tr class="panel-footer">
					<td valign=middle colspan=2 align=center class=TableBody2>
					<input type=Submit value='请填写验证码后发表' name=Submit id="oSubmit" disabled = true class="btn-success"> 
					&nbsp;&nbsp;&nbsp;
					<input type="button" value='预 览' name=preview onclick=gopreview() class="btn-info">
                </td></form></tr>	

			  </table>
				
				
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
