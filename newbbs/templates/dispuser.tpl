{config_load file="test.conf" section="setup"}
{include file="base.tpl" title=foo}

{include file="header.tpl"}


{include file="left.tpl"}

{include file="right.tpl"}

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


</div>