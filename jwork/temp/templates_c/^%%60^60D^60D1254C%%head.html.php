<?php /* Smarty version 2.6.18, created on 2008-08-13 01:42:16
         compiled from head.html */ ?>
<!-- 头开始 -->
<script src="images/common/flash.js" type="text/javascript"></script>
<?php echo '
<script  type="text/javascript">
  function flashhome()
  {
    try
    {
    document.links[0].style.behavior=\'url(#default#homepage)\';
    document.links[0].setHomePage(\'www.oumuchaoliu.com\');
    }
    catch(e)
    {
    }
  
  }
  
  function flashadd()
  {
   window.external.addfavorite("http://www.oumuchaoliu.com","欧姆潮流")
  }
</script>
'; ?>

<div id="top">
  <div id="ttop">
  <script type="text/javascript">
    myflash( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','100%','height','122','src','images/default/top' ); //end AC code
    </script>
   <!--  

   <div id="tleft"><img src="images/<?php echo $this->_tpl_vars['template']; ?>
/logo.gif" /></div>
   <div id="tright">
       <div id="tr01">
       <a href="#"  class="ablank" onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.lxtd.net')">设为首页</a> |
       <a href=javascript:window.external.addfavorite("<?php echo $this->_tpl_vars['www']; ?>
","www_name")  class="ablank"   target=top>加入收藏</a>&nbsp;&nbsp;
       </div>
       <div id="tr02"></div>
       <div id="tr03">客服电话:0411-84337165 &nbsp;&nbsp;客服QQ:438187&nbsp;6907832&nbsp;&nbsp;</div>
   </div> 
-->
    
   
  </div>
  <div style="clear:left;">
  <div id="tlink" >
  	<ul>
  		<li><a href="?index.html">首页</a></li>
  		<li><a href="?news.html">新闻</a></li>
        <li><a href="?goods.html">产品</a></li>
  		<li><a href="?about-buy-43.html">如何购买</a></li>
  		<li><a href="?about-buy-44.html">关于我们</a></li>
  		<li><a href="?about-buy-45.html">联系我们</a></li>
  		
  	</ul>
  </div>
  
</div>
<!-- 头结束-->