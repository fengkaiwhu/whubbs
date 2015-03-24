{config_load file="test.conf" section="setup"}
{include file="base.tpl" title=foo}
<script type="text/javascript" src="js/smartpaginator.js"></script>
<link href="css/smartpaginator.css" rel="stylesheet" type="text/css" />

{include file="header.tpl"}
{include file="left.tpl"}
{include file="right.tpl"}
{include file="carouselad.tpl"}


<div class="usermailcontainer">
  <table class="table" align="center" >
        <tbody>
            <tr class="success">
                <th height="25" width="100%" align="left" id="TableTitleLink" style="font-weight: normal">本版当前共有<b>19</b>人在线。今日帖子0。
              
                
               [<a href="favboard.php?bname=Jiangxi" title="收藏本版面到收藏夹顶层目录"  >收藏本版</a>]
               &nbsp;[<a href="doclear.php?boardName=Jiangxi" title="将本版所有文章标记成已读">清除未读</a>]
                    <span id="onboard_users"></span></th>
            </tr>
        </tbody>
   </table>

    <!--******************************************************************-->
    <div class="topicListcontainer">
    <table class="table listtable">
        <tbody>
            <tr class="active">
                <td width="110px">
                    <a href="postarticle.php?board=Jiangxi">
                        <div class="buttonClass1"  title="发新帖">
                        </div>
                    </a>
                </td>
                <td align="right">
                    <img src="img/pic/team2.gif" align="absmiddle">
                    <a href="dispuser.php?id=wad87812" target="_blank" title="点击查看该版主资料">wad87812</a>
                </td>
            </tr>

        </tbody>
    </table>
   <!--**********************************************帖子列表*****************************************************-->
    
    <div id="v6_pl_content_myfavoriteslist">
            <div>
                <div class="WB_feed">
              
               
         
                    <!--1-->
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
                                    <span class="W_fr">
                                    发布于 2014.02.10
                                    &nbsp;
                                    <a href="">
                                        [版面名称]
                                    </a>
                                    </span>
                                </div>                            
                            </div>
                        </div>
                        <div class="WB_feed_handle">
                            <div class="WB_handle">
                                <ul class="WB_row_line WB_row_r4 clearfix S_line2">
                                    <li>
                                        <a class="S_txt2" href="javascript:void(0);"><span class="pos"><span class="line S_line1">
                                            回复
                                        </span></span></a>
                                    </li>
                                    <li>
                                        <a class="S_txt2" href="javascript:void(0);">
                                            <span class="pos">
                                                <span class="line S_line1">收藏
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                 </ul>
                            </div>
                            <div class="WB_feed_repeat S_bg1" style="display: none;"></div>
                        </div>
                    </div>
                    <!--1 end-->


                </div>
            </div>
        </div>

    </div>

    <!--Pager-->
  <div id="wrapper">
        
            <div id="skyblue" style="margin: auto;">
            </div>
        </div>
    <!--Pager End-->


    <!--***************************************帖子列表结束*******************************************************-->
    <table class="table">
        <tbody>
            <tr>
                <form method="GET" action="queryresult.php"></form>

                <input type="hidden" name="boardNames" value="Jiangxi">

                <td class="boardsearch">
                     
                     <div class="col-lg-6">
                        <div class="input-group">
                            
                              <input type="text" class="form-control" placeholder="搜索相关内容">
                              <span class="input-group-btn">
                                 <button class="btn btn-default" type="button">Go!</button>
                            </span>
                             </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                     
                     </div>
                </td>

            </tr>
        </tbody>
    </table>

    <!-- search end-->
</div>


  <script type="text/javascript">
        $(document).ready(function () {

          $('#skyblue').smartpaginator({ totalrecords: 32, recordsperpage: 4, length: 4, next: '下一页', prev: '前一页', first: '首页', last: '尾页', theme: 'skyblue', controlsalways: true, onchange: function (newPage) {
                $('#r').html('Page # ' + newPage);
            }
            });

        });
    </script>
{include file="footer.tpl"}
