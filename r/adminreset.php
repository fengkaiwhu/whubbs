<?php
require_once("../www2-funcs.php");
login_init();

global $currentuser;
if($currentuser["userid"]!="davidxn" && $currentuser["userid"]!="SYSOP")
{
	die("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /><script>alert('您没有访问权限！');location.href='http://bbs.whu.edu.cn';</script>");
}

$tab = "new";
$page = 1;

if(isset($_GET['tab']) && ($_GET['tab']=="new" || $_GET['tab']=="done") )
  $tab = $_GET['tab'];

if(isset($_GET['page']) && is_numeric($_GET['page']) )
  $page = $_GET['page'];

$NUM_PER_PAGE = 20;

//database
$con = mysql_connect("127.0.0.1","whubbs","bbswebwhu");
if (!$con)
{
  die('无法连接数据库: ' . mysql_error());
}

mysql_select_db("whuinfo", $con);
mysql_query("set names 'utf8'");
//mysql_query("set names 'latin1_swedish_ci'");


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>密码找回——珞珈山水BBS</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="container">
  		<div class="page-header">
		    <h1>珞珈山水BBS  密码取回<small>——请求列表</small></h1>
		  </div>
      <ul class="nav nav-tabs">
        <li <?php if($tab=="new") echo 'class="active"'; ?>><a href="adminreset.php?tab=new">未处理</a></li>
        <li <?php if($tab=="done") echo 'class="active"'; ?>><a href="adminreset.php?tab=done">已处理</a></li>
      </ul>
      <div class="tab-content">
      <?php if($tab=="new") { ?>
        <div class="tab-pane active" id="new">
          <table class="table table-hover">
            <thead><tr><th>序号</th><th>BBS ID</th><th>姓名</th><th>学号</th><th>身份证</th><th>邮箱</th><th>备注</th><th>选择</th></tr></thead>
            <tbody id="newtable">
              <?php

              $rs = mysql_query("select count(*) from findpwd_info where `status`='NEW'");
              $row = mysql_fetch_row($rs);
              $totalpage = $row[0] / $NUM_PER_PAGE + 1;
              if($totalpage < $page)
              {
                $page = $totalpage;
                
              }
              $beginrow = $NUM_PER_PAGE * ($page-1);//0-based row

              $rs = mysql_query("select * from findpwd_info where `status`='NEW' limit $beginrow, $NUM_PER_PAGE;");
              //| index | id  | name | xuehao | shenfenzheng | email | status | operator | comments
              // if (mysql_error()) {
              //     die(mysql_error());
              // }
              $rowindex = $beginrow + 1;
              while($row = mysql_fetch_assoc($rs))
              {
              	foreach ($row as $key => $value) {
              		$row[$key] = htmlspecialchars($value);
              	}
              	//var_dump($row);
                $uid = $row['id'];
                $name = $row['name'];
                $xh = $row['xuehao'];
                $sfzh = $row['shenfenzheng'];
                $email = $row['email'];
                $bz = $row['comments'];
                $rowid = $row['index'];
                echo "<tr><td>$rowindex</td>"
                    ."<td class='uid'>$uid</td>"
                    ."<td>$name</td>"
                    ."<td>$xh</td>"
                    ."<td>$sfzh</td>"
                    ."<td class='eml'>$email</td>"
                    ."<td>$bz</td>"
                    ."<td><input type='checkbox' id='$rowid'></td></tr>";
                $rowindex++;
              }
              ?>
            </tbody>
          </table>
          <div class="btn-group pull-right">
            <a class="btn btn-default" id="rst">同意重置</a>
            <a class="btn btn-default" id="refuse">拒绝请求</a>
          </div>
          <div>
          <ul class="pagination" id="newpages">
          <?php 
          echo "<li><a href='adminreset.php?tab=new&page=1'>&laquo;</a></li>";
          $page -= 2; 
          for ($i= 0 ; $i < 5; $i++ ) { 
            if ($page>0 && $page<=$totalpage) 
            {
              if ($i == 2) {
                echo "<li class='active'><a href='adminreset.php?tab=new&page=$page'>$page</a></li>";
              }
              else{
                echo "<li><a href='adminreset.php?tab=new&page=$page'>$page</a></li>";
              }
            }
            $page++;
          }
          echo "<li><a href='adminreset.php?tab=new&page=$totalpage'>&raquo;</a></li>"; 
          ?>
          </ul>
          </div>
        </div>
      <?php }else{ ?>
        <div class="tab-pane active" id="done">
          <table class="table table-hover">
            <thead><tr><th>序号</th><th>BBS ID</th><th>姓名</th><th>学号</th><th>身份证</th><th>邮箱</th><th>备注</th><th>状态</th><th>操作人</th></tr></thead>
            <tbody id="donetable">
              <?php

              $rs = mysql_query("select count(*) from findpwd_info where `status`!='NEW'");
              $row = mysql_fetch_row($rs);
              $totalpage = $row[0] / $NUM_PER_PAGE + 1;
              if($totalpage < $page)
              {
                $page = $totalpage;
                
              }
              $beginrow = $NUM_PER_PAGE * ($page-1);//0-based row

              $rs = mysql_query("select * from findpwd_info where `status`!='NEW' limit $beginrow, $NUM_PER_PAGE;");
              //| index | id  | name | xuehao | shenfenzheng | email | status | operator | comments
              // if (mysql_error()) {
              //     die(mysql_error());
              // }
              $rowindex = $beginrow + 1;
              while($row = mysql_fetch_assoc($rs))
              {
              	foreach ($row as $key => $value) {
              		$row[$key] = htmlspecialchars($value);
              	}
                $uid = $row['id'];
                $name = $row['name'];
                $xh = $row['xuehao'];
                $sfzh = $row['shenfenzheng'];
                $email = $row['email'];
                $bz = $row['comments'];
                $op = $row['operator'];
                $sta = $row['status'];
                echo "<tr><td>$rowindex</td>"
                    ."<td>$uid</td>"
                    ."<td>$name</td>"
                    ."<td>$xh</td>"
                    ."<td>$sfzh</td>"
                    ."<td>$email</td>"
                    ."<td>$bz</td>"
                    ."<td>$sta</td>"
                    ."<td>$op</td></tr>";
                $rowindex++;
              }
              ?>  
            </tbody>
          </table>
          <?php if($currentuser["userid"]=="davidxn") { ?>
          <div class="btn-group pull-right">
            <a class="btn btn-default" id="clear">清空</a>
          </div>
          <?php } ?>
          <div>
          <ul class="pagination" id="donepages">
            <?php 
            echo "<li><a href='adminreset.php?tab=done&page=1'>&laquo;</a></li>";
            $page -= 2; 
            for ($i= 0 ; $i < 5; $i++ ) { 
              if ($page>0 && $page<=$totalpage) 
              {
                if ($i == 2) {
                  echo "<li class='active'><a href='adminreset.php?tab=done&page=$page'>$page</a></li>";
                }
                else{
                  echo "<li><a href='adminreset.php?tab=done&page=$page'>$page</a></li>";
                }
              }
              $page++;
            }
            echo "<li><a href='adminreset.php?tab=done&page=$totalpage'>&raquo;</a></li>"; 
            ?>
          </ul>
          </div>
        </div>
      <?php } ?>
      </div>

      
  	</div>

	<div id="footer">
      <div class="container">
        <p class="text-muted credit"  style="text-align:center"><a href="http://bbs.whu.edu.cn">武汉大学BBS 珞珈山水站</a> All rights reserved.</p>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">

    $(function(){
      $("#rst").click(function() {
        $("input:checked").each(function(){
        	var index = $(this).attr("id");
        	var uid = $(this).parent().prevAll("td.uid").text();
        	var email = $(this).parent().prevAll("td.eml").text();
          $.post("doreset.php", { "tgt": "adminreset", "op": "rst","index": index, "uid": uid, "email": email },
          function(data){
            if(data.success === null || data.success === undefined)
            {
              alert(data.error);
            }
            else
            {
              alert(data.success);
              location.reload();
            }
          }, "json");
        });
      });//rst btn
      $("#refuse").click(function() {
        $("input:checked").each(function(){
        	var index = $(this).attr("id");
          $.post("doreset.php", { "tgt": "adminreset", "op": "refuse", "index": index },
          function(data){
            if(data.success === null || data.success === undefined)
            {
              alert(data.error);
            }
            else
            {
              alert(data.success);
              location.reload();
            }
          }, "json");
        });
      });//refuse btn
      $("#clear").click(function() {
          $.post("doreset.php", { "tgt": "adminreset", "op": "clear", "range":"done" },
          function(data){
            if(data.success === null || data.success === undefined)
            {
              alert(data.error);
            }
            else
            {
              alert(data.success);
              location.reload();
            }
          }, "json");
      });//clear btn
    });
    </script>
  </body>
</html>