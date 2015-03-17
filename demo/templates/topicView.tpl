{config_load file="test.conf" section="setup"}
{include file="base.tpl" title=foo}

{include file="header.tpl"}


{include file="left.tpl"}

{include file="right.tpl"}


	<div id="tv-content">

      {include file="left_authorInfo.tpl"}
            
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
    
               {include file="topicContent.tpl"}

               {include file="comment.tpl"}
        

<script src="js/jquery.popover.js"></script>

  <script type="text/javascript">
            $(function(){
                $('.fm_popovercard').each(function(){
                    $(this).popovercard({
                    });
                });
            });
            
        </script>

{include file="footer.tpl"}
