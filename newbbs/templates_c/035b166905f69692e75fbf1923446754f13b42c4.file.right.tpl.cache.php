<?php /* Smarty version Smarty-3.1.18, created on 2014-12-25 14:51:13
         compiled from ".\templates\right.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35548af38429f394-94597997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '035b166905f69692e75fbf1923446754f13b42c4' => 
    array (
      0 => '.\\templates\\right.tpl',
      1 => 1419515470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35548af38429f394-94597997',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_548af3842a3212_89266227',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548af3842a3212_89266227')) {function content_548af3842a3212_89266227($_smarty_tpl) {?><div id="right_affix">
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


<?php }} ?>
