<?php /* Smarty version Smarty-3.1.18, created on 2014-12-12 15:05:09
         compiled from ".\templates\carousel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19854884fb001fa19-37813451%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81eb5cac4fad8092c6c9bd9e6e8eaaf431bc873c' => 
    array (
      0 => '.\\templates\\carousel.tpl',
      1 => 1418393026,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19854884fb001fa19-37813451',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54884fb0069db0_60790876',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54884fb0069db0_60790876')) {function content_54884fb0069db0_60790876($_smarty_tpl) {?><!--引用自bootstrap的轮播-->
<div class="mcontainer">
	<div id="bbsCarousel" class="carousel  carousel-fade" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#bbsCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#bbsCarousel" data-slide-to="1"></li>
        <li data-target="#bbsCarousel" data-slide-to="2"></li>
      </ol>
    <div class="carousel-inner" style="text-align:center">
        <div class="item active">
          <img alt="First slide" src="img/1.jpg" ></img>
          <div class="carousel-caption">
              <h1>珞珈山水</h1>
              <p>珞珈山水是武汉大学的官方学生BBS/论坛，成立于1996年，现为中国众多高校知名BBS之一。</p>
          </div>
        </div>
        <div class="item">
          <img alt="Second slide" src="img/2.jpg" ></img>
           <div class="carousel-caption">
              <h1>“武汉大学”</h1>
              <p>本版区主要面向武大校园内，话题集中在学习、校园热点、学生活动、校园生活等方面。下设“武大特快”、“皇皇吾大”、“研究生之家”、“大一新生”、“校园海报栏”等版块。</p>
              </div>
        </div>
        <div class="item">
          <img alt="Third slide" src="img/3.jpg"  ></img>
           <div class="carousel-caption">
              <h1>珞珈山水系统</h1>
              <p>主程序为目前国内比较通用的KBS BBS系统，武汉大学另一学生BBS--自强茶馆BBS采用的是discuz系统。</p>
           </div>
        </div>
      </div>
      
      <a class="left carousel-control" href="#bbsCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"><i class="icon-glass"></i></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#bbsCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->

</div>    <?php }} ?>
