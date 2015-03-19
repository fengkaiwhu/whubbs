<?php /*%%SmartyHeaderCode:3039754894d75e66575-70813313%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '433c715fab73d536b8f8ec53632e93c6decc4b18' => 
    array (
      0 => '.\\templates\\topicView.tpl',
      1 => 1419143964,
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
      1 => 1419152999,
      2 => 'file',
    ),
    '035b166905f69692e75fbf1923446754f13b42c4' => 
    array (
      0 => '.\\templates\\right.tpl',
      1 => 1419152480,
      2 => 'file',
    ),
    '9ad032cd30576967a5833ee018414bf33149e810' => 
    array (
      0 => '.\\templates\\left_authorInfo.tpl',
      1 => 1419156239,
      2 => 'file',
    ),
    '10be5385439074c85b76f036337769130e05cd7d' => 
    array (
      0 => '.\\templates\\topicContent.tpl',
      1 => 1418284317,
      2 => 'file',
    ),
    '914017260668a913c7c877104d6464438316bbe7' => 
    array (
      0 => '.\\templates\\comment.tpl',
      1 => 1419004584,
      2 => 'file',
    ),
    '1be7ff7fdee636597edd726ee98dfef4bfd55d1f' => 
    array (
      0 => '.\\templates\\footer.tpl',
      1 => 1418822367,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3039754894d75e66575-70813313',
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54969bb4080ae6_92207434',
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54969bb4080ae6_92207434')) {function content_54969bb4080ae6_92207434($_smarty_tpl) {?><HTML>
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
            <a id="lecture" href="/testsmarty/usermanagemenu.php" title="个人中心">
                <img width="100" height="100" src="img/icon-leftnav-lecture.png" alt="个人中心">
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

                <a id="lecture" href="javascripte:void(0);" title="讲座" onmouseover="showDiv(this)" onmouseout="closeDiv(this)">
                    <h3>讲座</h3>
                </a>

            </li>

            <li>

                <a id="announcement" href="javascripte:void(0);" title="组织公告" onmouseover="showDiv(this)" onmouseout="closeDiv(this)">
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





	<div id="tv-content">

        <div id="articleArea">

            <div id="authorArea">
             <div id="authorName">
                    <a target="_blank" href="javascript:void(0);" title="kiki1010" >
                        <h3>kiki1010</h3>
                    </a>
                </div>

              <div class="fm-header-bar" style="float: right;margin-top:20px;">
                <div class="fm-main">
                    <div class="row-fluid">
                        
                            <dt class="w2 pr" style="overflow:visible" >
                              
                                <a href="" class='fm_popovercard' data-obj_id='1' data-url='get_card.php?id='>
                    
                                <img src="img/two.jpg" alt="kiki1010" class="authorImg" >
                                </a>
                          
                            </dt>
                        
                    </div>
                </div>
            </div>
        
            
                <!--作者信息-->
              
               
                <br />
                <!--签名档-->
                <div id="authorInfo">
                    <p>
                        有些事，明知是错的，也要去坚持，因为不甘心；有些人，明知是爱的，也要去放弃，因为没结
            局；有时候，明知没路了，却还在前行，因为习惯了。
                    </p>
                </div>
            </div>

           
            
             <div id="topicArea">
                <div id="topicTitle">
                    <h2>你遇见的事都是因你而生，你遇见的人都是为你而来（文/百无禁忌的理想）</h2>
                </div>

                <div id="topicTool">

                    <!-- 自适应效果 -->
                    <div id="auther">
                        <div id="authorImg"> 
                            <img src="img/two.jpg" >
                        </div>

                        <div id="authorName">
                            <a target="_blank" href="javascript:void(0);" title="kiki1010" >
                                <h3>kiki1010</h3>
                            </a>
                        </div>
                    </div>

                    
                    <span>发信人：<span>kiki1010</span>  信区：<span>Digital</span></span>
                      <br />
                    <span>发信站：<span> 珞珈山水 (Wed Dec  3 17:58:51 2014)</span><span>，站内</span></span>
                    <br />
                    <span class="opset">
                    <span>
                        <a href="javascript:void(0);" title="回复">回 复</a>
                    </span>   
                    <span>
                        <a href="javascript:void(0);" title="点赞">点 赞</a>
                    </span> 
                    <span>  
                        <a href="javascript:void(0);" title="收藏">收 藏</a>
                    </span> 
                    <span>
                        <a href="javascript:void(0);" title="分享">分 享</a>
                    </span>  
                    </span>
                </div>
    
                <div id="topicContent">
                    <p>“我想学哲学，我想学艺术。”</p>

						<p>“学这些有什么用呢，能当饭吃吗？”</p>

						<p>“我就是喜欢她。”</p>

						<p>“她又不喜欢你，有什么用呢？”</p>

						<p>“这个社会为什么这么不公平？”</p>

						<p>“这个社会就这样，你说这些又有什么用呢？”</p>

						<p>这段话出自之前推荐过的一篇文章《别向这个操蛋的世界投降》，不是愤青，是爱情。</p>

						<p>在一个正常到不能再正常的事情都会引起争议的浮躁社会，多数人做或不做一件事，都喜欢用有没有用、赚不赚钱来衡量，好像一切评判和标准都是以有用和金钱来衡量。</p>

						<p>上大学只是为学一个热门专业，却不问自己喜欢不喜欢；找工作只是听说这家公司能管饭，却不问自己喜不喜欢这一行；相亲只是听人说对方如何帅的惊天动地或美的一塌糊涂，却不问自己真正心动的是什么人。总之，当你有一丝的反驳，他们会说：“你说这些有什么用？”</p>

						<p>是，有什么用呢？我也不知道，起码你能过的快乐，而且你要相信那些无处不在的可能性。</p>

						<p>年后我面试一家公司，中国最大的某某网站，复试和初试之间等了15天，面试很残酷，最后是总监面，2个要1个。当时总监来时间不长，我俩没吃饭的从中午12点聊到1点多，不夸张的说，这是我这几年里面试发挥最好的一次，几近完美，不管是从岗位上、技术上、还是逻辑上、思路上，真的是聊的情投意合。</p>

						<p>最后，总监问我有什么问题想要问的？我说：刚已经聊的很细了，专业上的都说过了，我能不能说些自己想说的话？他说可以。”从毕业到现在，我一直做的都是自己喜欢的事情，来北京时间不算长，3个小理想实现了，我进到了喜欢的互联网行业，见了老俞，博客被新浪推荐。我不知道现在有多少同龄人做着自己喜欢的事情，还会不会去做那些重要但不紧急的事情，即使这些事情看起来没什么用，也不能赚大钱，比如跑步，看课外书，学英语，充电，或是跟父母多打打电话……”</p>

						<p>然后我敏锐的看到总监眼睛亮了一下（真的亮了），然后轻描淡写的说了句：“我也是年轻时候过来的。”最后，面完总监直接说：“非常欢迎你来公司上班。”</p>

						<p>这家公司其实很不错，但因为某些原因，清明后我回复说不能去公司上班了。第二天下班我在外面吃饭时，总监打电话来：“我还是希望你再考虑下公司，我知道公司在某些方面不太人性化，而且我承诺试用期工资可以再往上调。”</p>

						<p>第二天晚上我给总监回电话说：“其实昨天您争取我去公司上班，我真的挺感动的，我学校一般，工作经验一般，北京这么多牛人，我何德何能让您主动打电话挽留我。”总监接过话说：“不是说你何德何能，只是你身上有一点特别打动我，就是你对互联网的激情，真的让我想起我年轻时候。”然后总监又跟我聊了很多，给了很多职业上的建议，最后，我才知道这个总监之前是在上家做VP（副总裁）。</p>

						<p>之前博客里有时我会提到Andrew，是一个在澳大利亚生活快30年的台湾人，我认识他是在刚毕业时我在MSN论坛上看贴子，看到一个英文很地道的回复，留了一个邮箱，我无聊就给他发了封邮件，然后一发不可收拾，断断续续、来来回回的发了有2年左右的英文邮件，有时博客更新，我会在邮件里告诉他，去年我试着想跟他见一面，可他时间太紧。</p>

						<p>直到清明的3天假期，Andrew从遥远的澳大利亚飞到北京，晚上到酒店时，我打电话问：“Andrew，你来北京有没有哪里想去的地方，有什么没有什么想吃的，我带你去。”然后Andrew说了句让我感动好几天的话：“Alex，我没有什么想去的地方，也没有什么想吃的东西，我就是飞过来跟你聊聊天。”</p>

						<p>第二天我和Andrew在一家环境很好的咖啡厅聊了一下午，我问他为什么会飞到北京，只是来跟我聊聊天。他说很喜欢我的博客，并且提到了3个词：persistence(坚持)、patience（耐心）、and original（原创）。</p>

						<p>这样一个跟我父亲差不多大的有趣的有钱人，只是飞过来跟我聊天，着实让我受宠若惊，我一同学一直不相信他真的会跟我见上一面，然后我听他讲去世界各地的故事，听他讲各种文化差异，听他讲一些英语地道的用法，听他讲年轻时候的故事，听他讲台湾和大陆的关系，听他讲一党专政和民主党派，听他讲他自己创业时候的故事，还邀请我去澳大利亚玩。</p>

						<p>其实，我只是做了些自己喜欢的事情，写博客、看英语、看课外书、跑步，当时我也不知道这些东西有什么用，甚至在当同学给我滔滔不绝讲他的创业模式时，我还很2的在看《平凡的世界》，就像当时同学问的：“你又不出书，写什么博客？你又不出国，学什么英语？”</p>

						<p>可就是这些貌似不重要且没用的东西，才拉开了我和别人的差距，支撑我在北京一步步的成长。看课外书，拓宽了我的视野和心胸，让我心静，让我内心强大，淡定的面对一切发生的各种事情；跑步让我很好的锻炼身体，睡眠质量好的不像话，即使我晚上写博客到2点，第2天还能不瞌睡的应对一天的工作。</p>

						<p>当时我也没想着这些东西能有什么用，只是喜欢而已，可当它真正带来了这么多有意思和让我成长进步的事情时，我才更加坚定的做这些事情。如果不写博客，我在面试时除了专业上没有跟别人与众不同的地方，也没有那些好公司的offer；如果我不跑步，我或许现在已经是个大肚男；如果我不学英语充电，我在北京早都已经混不下去，Andrew看到我蹩脚的英语也不会来北京看我。</p>

						<p>你能想象吗？我身边最看好的一个同学已经毕业5年，早都是拿年薪的人，到现在还在坚持学英语，练钢笔字，写读书笔记。所以，真的要相信那些无处不在的可能性，尤其是在一个邪门的社会，每个人都有可能变成传奇。</p>

						<p>就像乔布斯05年在斯坦福大学那个经典的演讲里提到的一样：“要不是退了学，我决不会碰巧选了这门书法课，个人电脑也可能不会有现在这些漂亮的版式了。当然，我在大学里不可能从这一点上看到它与将来的关系。十年之后再回头看，两者之间的关系就非常、非常清楚了。你们同样不可能从现在这个点上看到将来；只有回头看时，才会发现它们之间的关系。所以，要相信这些点迟早会连接到一起。你们必须信赖某些东西─直觉、归宿、生命，还有业力，等等。这样做从来没有让我的希望落空过，而且还彻底改变了我的生活。”</p>

						<p>在这个社会上，不能认为什么有用才学什么，什么赚钱才干什么，不要去问一些类似这样的问题：“我想当个教师，可我现在学Photoshop有什么用呢？”学了再说，多会点东西总没什么坏处。最好什么都能知道点，什么都会一点，保不齐什么时候真的会用上，甚至还能救命。</p>

						<p>比如，当你在跟同事一起工作时，起码要懂点人际交往学；当你在跟女孩恋谈爱时，起码要懂点心理学；当你晚上寂寞时，起码你得知道在哪下种子；当你没买车时，起码你得会开；当你钱多时，起码你得会理财；当你买房子时，起码基本的建筑图能看的懂；当你去国外度蜜月时，起码基本的打车和点菜总得会说。</p>

						<p>生活是一所没有毕业的学校，而且不分专业。你遇见的事都是因你而生，你遇见的人都是为你而来。这有什么用呢？这本身就是最大的意义。
						 </p>
                </div>
            </div>
        </div>


               <div id="commentArea">
            <div id="commentHeader">
                
            </div>

            <div id="commentBody">
                
            </div>

            <div id="commentFooter">
                
            </div>
        </div>
    </div>
        

<script src="js/jquery.popover.js"></script>

  <script type="text/javascript">
            $(function(){
                $('.fm_popovercard').each(function(){
                    $(this).popovercard({
                    });
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
