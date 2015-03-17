<?php
	require("www2-funcs.php");
	require("www2-board.php");
	bbs_set_onboard(0,0);
	login_init();
	bbs_session_modify_user_mode(BBS_MODE_MMENU);
	
<?php
//生成海报列表
function gen_notice_html()
{
		$brdarr = array();
		$brdnum = bbs_getboard("Notice", $brdarr);
		if ( ($brdnum==0) || ($brdarr["FLAG"] & BBS_BOARD_GROUP) ) {
			echo '"当前没有海报","",';
		} else {
			$total = bbs_getThreadNum($brdnum);
			if ($total <= 0) {
				echo '"当前没有海报","",';
			} else {
				$articles = bbs_getthreads($brdarr['NAME'], 0, 30,1); 
				if ($articles == FALSE) {
					echo '"当前没有海报","",';
				} else {
					$num=count($articles);

					$j=14;
					for ($i=0;$i<$num;$i++) {
					if($articles[$i]['origin']['FLAGS'][0]=='g'){
						if($j--<0) break;
?>
        <li><?php echo "<a href=\"wForum/disparticle.php?boardName=".$brdarr['NAME']."&amp;ID=".$articles[$i]['origin']['ID']."&amp;pos=".$i."\">" .htmlspecialchars($articles[$i]['origin']['TITLE'],ENT_QUOTES) . "</a>";?></li>
        <?php          }
					}
				}
			}
		}
?>
<?php
}
?>

<?php
//生成公告
function gen_announce_html()
{
		$brdarr = array();
		$brdnum = bbs_getboard("Announce", $brdarr);
		if ( ($brdnum==0) || ($brdarr["FLAG"] & BBS_BOARD_GROUP) ) {
			echo '"当前没有公告","",';
		} else {
			$total = bbs_getThreadNum($brdnum);
			if ($total <= 0) {
				echo '"当前没有公告","",';
			} else {
				$articles = bbs_getthreads($brdarr['NAME'], 0, 10,1); 
				if ($articles == FALSE) {
					echo '"当前没有公告","",';
				} else {
					$num=count($articles);
					$j=4;
					for ($i=0;$i<$num;$i++) {
					if($articles[$i]['origin']['FLAGS'][0]=='g'){
						if($j--<0) break;
?>
        <li><?php echo "<a href=\"wForum/disparticle.php?boardName=".$brdarr['NAME']."&amp;ID=".$articles[$i]['origin']['ID']."&amp;pos=".$i."\">" .htmlspecialchars($articles[$i]['origin']['TITLE'],ENT_QUOTES) . "</a>"; ?></li>
        <?php			}
					}
				}
			}
		}
?>
<?php
}
?>

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
                
                <?php
//生成公告
		$brdarr = array();
		$brdnum = bbs_getboard("Announce", $brdarr);
		if ( ($brdnum==0) || ($brdarr["FLAG"] & BBS_BOARD_GROUP) ) {
			echo '"当前没有公告","",';
		} else {
			$total = bbs_getThreadNum($brdnum);
			if ($total <= 0) {
				echo '"当前没有公告","",';
			} else {
				$articles = bbs_getthreads($brdarr['NAME'], 0, 10,1); 
				if ($articles == FALSE) {
					echo '"当前没有公告","",';
				} else {
					$num=count($articles);
					$j=4;
					for ($i=0;$i<$num;$i++) {
					if($articles[$i]['origin']['FLAGS'][0]=='g'){
						if($j--<0) break;
?>
        <li><?php echo "<a href=\"wForum/disparticle.php?boardName=".$brdarr['NAME']."&amp;ID=".$articles[$i]['origin']['ID']."&amp;pos=".$i."\">" .htmlspecialchars($articles[$i]['origin']['TITLE'],ENT_QUOTES) . "</a>"; ?></li>
        <?php			}
					}
				}
			}
		}
?>

 
                </p>


            </ul>
        </div>

        <div class="cont" style="display: none;">
            <ul class="sublist clearfix">
                <li>
                    <h3><span>海报</span></h3>
                </li>
            <p>
            <?php
            	$brdarr = array();
		$brdnum = bbs_getboard("Notice", $brdarr);
		if ( ($brdnum==0) || ($brdarr["FLAG"] & BBS_BOARD_GROUP) ) {
			echo '"当前没有海报","",';
		} else {
			$total = bbs_getThreadNum($brdnum);
			if ($total <= 0) {
				echo '"当前没有海报","",';
			} else {
				$articles = bbs_getthreads($brdarr['NAME'], 0, 30,1); 
				if ($articles == FALSE) {
					echo '"当前没有海报","",';
				} else {
					$num=count($articles);

					$j=14;
					for ($i=0;$i<$num;$i++) {
					if($articles[$i]['origin']['FLAGS'][0]=='g'){
						if($j--<0) break;
?>
        <li><?php echo "<a href=\"wForum/disparticle.php?boardName=".$brdarr['NAME']."&amp;ID=".$articles[$i]['origin']['ID']."&amp;pos=".$i."\">" .htmlspecialchars($articles[$i]['origin']['TITLE'],ENT_QUOTES) . "</a>";?></li>
        <?php          }
					}
				}
			}
		}
             ?>

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


