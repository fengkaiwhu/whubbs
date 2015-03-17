<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
li,ul{margin:0;padding:0;list-style-type:0}
body{background:#eee; text-align:center;}
li img{vertical-align:bottom; }
.dhooo_tab{
        width:460px;         margin:10px;
        background:#fff url(images/main_bg.gif) repeat-x 0 100%; 
        border:1px solid #aaa;position:relative; 
        float:left;
}
.tab_btn li{        float:left; width:60px}
.tab_btn li {
        font-size:12px;display:block; 
        padding:10px;margin-right:5px; 
        zoom:1;        text-decoration:none; 
        color:#fff;line-height:50%; 
        cursor:pointer;
}
.tab_btn li.hot {
        background:#fff;
        color:#333;font-weight:bold;
        cursor:default;
}
.tab_btn{        overflow:hidden;        height:28px;

        padding-left:20px;         padding-top:5px; 
        background:url(images/tabbar.gif) repeat-x ; 
}
.tab_btn_num{
        position:absolute; 
        right:50px;bottom:15px;
}
.tab_btn_num li{
        width:20px;height:20px;
        background: #CC3300;
        border:2px solid #993300; 
        overflow:hidden; color:#fff; 
        filter:alpha(opacity=80);opacity:0.8;
        float:left;cursor:default; font-size:12px;line-height:20px; 
        margin:0px 5px; font-family:Arial;
}
.tab_btn_num li.hot{
        background:#FFCC00; color:#993300; 
        border:2px solid #FF0000; 
}
.shell{

        width:99999px;         height:100%; 
}
.shell li{
        float:left; 
        width:360px;         height:100%; 
}
.main{
        width:360px;height:190px; 
        overflow:hidden;  
        margin:10px auto; 
        text-align:left;        font-size:12px;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
  <div style=" width:302px; height:262px;overflow:hidden">
   <div id="photos" class="galleryview">
     <?php foreach($huandengpian as $huandengpian_item) {?>
     <div class="panel">
      <a href="<?php url::site('view/'.$huandengpian_item->id); ?>" target="_blank">
     <img src="<?php echo parse::thumb($huandengpian_item->cover,292,217); ?>" />
      </a>
     <div class="panel-overlay">
       <h2><?php text::limit_string($huandengpian_item->news_topic,30); ?></h2>
     </div>
    </div>
  
    <ul class="filmstrip">
     <li><img src="http://p4.p.pixnet.net/albums/userpics/4/7/240247/49d9cd938f289.jpg"  /></li>
    </ul>
     <?php } ?> 
   </div>
  </div>

</body>

</html>