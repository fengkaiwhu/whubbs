// 仿知乎首页模块
var foucs_module = (function(window, $) {

    var COUNT = 9;

    var tabcurrent, level, tablock, start;

   

    var foucs = function foucs(c, i, str) {
        if (tabcurrent[i] == c) {
            return;
        }
        $("#" + str + "_tab_" + tabcurrent[i]).removeClass("on");
        $("#" + str + "_tab_" + tabcurrent[i]).removeClass("current");
        $("#" + str + "_con_" + tabcurrent[i]).hide(0);
        tabcurrent[i] = c;
        $("#" + str + "_tab_" + tabcurrent[i]).addClass("on");
        $("#" + str + "_tab_" + tabcurrent[i]).addClass("current");
        $("#" + str + "_con_" + tabcurrent[i]).show(0);
    };
    
    var autoplay = function autoplay() {
        if (tablock) return;
        foucs(start, '2', 'foucs');
        start++;
        if (start == COUNT + 1)/*页卡有n项，这里的数字就是n+1*/
            start = 1;
    };

    var init = function() {
        $rep = $(".rep");

        if ($rep) {
            $rep.each(function() {
                var hoverTimer, outTimer;   
                var index = this.id.split('_')[2];
                $(this).mouseover(function() {
                    clearTimeout(outTimer);
                    hoverTimer=setTimeout(
                        function(){
                            foucs(index,2,'foucs');
                        },1000)
                    
                          
                   
                });

              $(this).mouseout(function(){
                    outTimer=hoverTimer;
                    clearTimeout(hoverTimer);  

              });    
           
            });
        }
    };


    

    var run = function() {
        init();
        tabcurrent = new Array();
        for (var i = COUNT+1; i >= 1; i--) {
            tabcurrent[i] = 1;
        };
        level = setInterval(autoplay, 30000);
        tablock = 0;
        start = 1;
        for (var l = 1; l < COUNT+1; l++)/*页卡有n项，这里的数字就是n+1*/ {
            $("#foucs_tab_" + l).mouseover(function () { tablock = 1; });
            $("#foucs_tab_" + l).mouseout(function () { tablock = 0; });
            $("#foucs_con_" + l).mouseover(function () { tablock = 1; });
            $("#foucs_con_" + l).mouseout(function () { tablock = 0; });
        }
    };

    return {
        run : run
    };

})(window, jQuery);


