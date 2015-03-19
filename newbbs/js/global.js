/**
全局都要执行的脚本。
如果只有单页需要执行，请重写base.html的“添加自定义脚本”标签。
例子：参见index.html

目的是为了提高页面加载速度，避免不必要的js代码的加载。

如果不会写模块化的js，请直接按照自己的方式来写，后期我会来改。

————马天翼
**/

// $(function() {

// }());


$(document).ready(function(){
//    nav-li hover e
    var num;
    $('.nav-main>li[id]').hover(function(){
       /*图标向上旋转*/
       
        /*下拉框出现*/
        var Obj = $(this).attr('id');
        num = Obj.substring(3, Obj.length);
        $('#box-'+num).slideDown(500);
    },function(){
        /*图标向下旋转*/
     
        /*下拉框消失*/
        $('#box-'+num).hide();
    });
//    hidden-box hover e

    $('.hidden-box').hover(function(){
        /*保持图标向上*/
      
        $(this).show();
    },function(){
        $(this).slideUp(800);
       
    });
});