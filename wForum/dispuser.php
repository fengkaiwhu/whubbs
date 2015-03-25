<?php

require("inc/funcs.php");
require("menpai.php");
require("inc/user.inc.php");
require("inc/ubbcode.php");
require_once("inc/myface.inc.php");
require_once("../new_add_file.php");

preprocess();

if ($user !== false) {
	showUserData($user,$user_num);
}
showQueryForm();

function preprocess() {
	global $user,$user_num;
	if (!isset($_GET['id']) || $_GET['id'] == "") {
		$user = false;
		return;
	}
	$userarray=array();
	if (($user_num=bbs_getuser($_GET['id'],$userarray))==0) {
		foundErr("没有找到相应的用户");
	}
	$user=$userarray;
	return true;

}

function showQueryForm() {
?>
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
<?php
}

function showUserData($user, $user_num) {

require("inc/userdatadefine.inc.php");
?>
<div class="votecontainer">
    
    <div>
        <div class="PCD_header">
            <div class="pf_wrap">
                <div class="cover_wrap banner_transition"style="background-image: url(../img/ad/as2.jpg);" >
                </div>
                <div class="shadow  S_shadow" layout-shell="false">
                    <div class="pf_photo " node-type="photo">
                        <p class="photo_wrap">
                        <?php
                        	if ($user['userface_img'] == -1) {
			$user_pic = htmlEncode($user['userface_url']);
			//$has_size = true;
		} else {
			$user_pic = 'userface/image'.$user['userface_img'].'.gif';
			//$has_size = false;
		}
                        ?>
                            <a href="#" title="更换头像">
                                <img src="<?php echo $user_pic; ?>" class="photo">
                            </a>

                        </p>
                       
                    </div>

                    <div class="pf_username">
                        <span class="username"><?php echo $user['userid']; ?></span>
                        <span class="icon_bed"><a><i class="W_icon icon_pf_male"></i></a></span>
                    </div>

<!--
                    <div class="pf_intro" title="给我感觉！">
                        给我感觉！                   
                    </div>
-->
                <div class="pf_opt">
                    <div class="opt_box clearfix">
                        <div class="btn_bed W_fl">
                            <a href="./sendmail.php?receiver<?php echo $user['userid']; ?>" class="W_btn_d btn_34px">
                                
                                发信问候
                              
                            </a>
                        </div>
                        <div class="btn_bed W_fl">
                            <a href="./friendlist.php?addfriend=<?php echo $user['userid']; ?>"  class="W_btn_d btn_34px" >
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
                <td ><?php echo htmlspecialchars($user['username'],ENT_QUOTES); ?> </td>
            </tr>

            <tr>
                <td  width="40%" align="right">性 别：</td>
                <td ><?php echo chr($user['gender'])=='M'?'男':'女'; ?> </td>
            </tr>
            <tr>
                <td  width="40%" align="right">星 座：</td>
                <td >
                    <?php
	echo get_astro($user['birthmonth'],$user['birthday']);
?>
            </tr>
            <tr>
                <td  width="40%" align="right">Ｑ Ｑ：</td>
                <td >
                    <?php echo showIt($user['OICQ']); ?></td>
            </tr>
            <tr>
                <td  width="40%" align="right">ＩＣＱ：</td>
                <td >
                    <?php echo showIt($user['ICQ']); ?></td>
            </tr>
            <tr>
                <td width="40%" align="right">ＭＳＮ：</td>
                <td >
                    <?php echo showIt($user['MSN']); ?></td>
            </tr>
            <tr>
                <td width="40%" align="right">主 页：</td>
                <td >
                    	<?php 
	$homepage=htmlspecialchars(trim($user['homepage']),ENT_QUOTES);
	if ($homepage!='') {
		echo '<a href="'.$homepage.'" target="_blank">'.$homepage.'</a>'; 
	} else {
		echo "<font color=gray>未知</font>";
	}
	?>
	</td>
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
                <td width="35%" ><b><?php echo bbs_getuserlevel($user['userid']); ?> </b></td>
                <td width="15%" align="right" >帖子总数：</td>
                <td width="35%" ><b><?php echo $user['numposts']; ?></b> 篇</td>
            </tr>
            <tr>
                <td  width="15%" align="right">门  派：</td>
                <td width="35%" ><b><?php $arr = getgroupinfo($user['userid']);if($arr[1]!='') echo $arr[1].' '.$arr[2]; else echo '无门无派'?> </b></td>
                <td  width="15%" align="right">登录次数：</td>
                <td width="35%" ><b><?php echo $user['numlogins']; ?></b>
                </td>
            </tr>
            <tr>
                <td  width="15%" align="right">经验值：</td>
                <td width="35%" ><b><?php echo bbs_getuserexp($user['userid']); ?> </b></td>
                <td  width="15%" align="right">经验等级：</td>
                <td width="35%" ><b><?php echo bbs_getexplevel($user['userid']); ?></b>
                </td>
            </tr>
            <tr>
                <td  width="15%" align="right">生命力：</td>
                <td width="35%" ><b><?php echo bbs_compute_user_value($user["userid"]); ?></b></td>
                <td width="15%" align="right" >上次登录：</td>
                <td width="35%" ><b><?php echo strftime("%Y-%m-%d %H:%M:%S", $user['lastlogin']); ?></b></td>
            </tr>
            <tr>
                <td  width="15%" align="right">同门：</td>
                <td width="35%"  colspan="3"><b>
                    <?php $arr = getgroupinfo($user['userid']);if($arr[1]!='') $arr = getgroupmember($arr[1]);for($i=0;$i<count($arr);$i++) {echo "<a href='dispuser.php?id=".$arr[$i]."'>".$arr[$i]."</a>&nbsp;&nbsp;&nbsp;";if($i!=0 && $i%8==0) echo "<br>";}?></b></td>
            </tr>
            <tr>
                <td width="50%"  colspan="2" align="center"><b><?php 
    	$usermodestr = bbs_getusermode($user["userid"]);
    	if( $usermodestr!="" && $usermodestr{1} != "") echo substr($usermodestr, 1);
    	else echo "目前不在站上"; ?></b></td>
                <td width="15%" align="right" >最后来访IP：</td>
                <td width="35%" ><b><?php echo $user['lasthost']; ?></b></td>
            </tr>
        </tbody>
    </table>
</div>
<?php
}
?>

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
