<?php 
     $users = array('1'=>'老大','2'=>'老二','3'=>'老三','4'=>'老四');
     $get = $_GET;   
     $id = isset($get['id']) ? $get['id'] : false;
     $display_name = isset($users[$id]) ? $users[$id] : '午後的紅茶';
?>

<div class="popover right popover-namecard" style="display: block; height: 120px; top: -30px; left: 68px; z-index:100">
    <div class="arrow arrow-t">
    </div>
    <div class="popover-content">
        <div class="row-fluid">
            
                
                <a href="" class=""><img src="img/two.jpg" alt=""></a>
                
                <span class="">狮子座   </span><span></span><span> 用户 </span>  <span>一般站友</span
            <div>
                  
            
            
            </div>
        </div>

        

        <!--
        <div class="row-fluid text-right mt1">
            <button class="btn btn-small fm-btn-small fm-bs-gray">
                关注
            </button>
            <button class="btn btn-small fm-btn-small disabled">
                已关注
            </button>
        </div>

        -->
    </div>
</div>
