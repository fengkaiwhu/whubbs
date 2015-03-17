<?php
/**
 * 默认分页同格
 *
 * @param 当前页数 $page
 * @param 分页总数 $totle
 * @param 上一页 $prepg
 * @param 下一页 $nextpg
 * @param 最后一页 $lastpg
 * @return 页脚的字符串
 */
function defaultStyle($page,$totle,$prepg,$nextpg,$lastpg,$url)
{
//开始分页导航条代码：
$foot="";
$foot="<table width=\"100%\" height=\"20px\" id=\"jfoot\"><tr><td width=\"50%\" align=\"left\">第<span style=\"padding:1px 3px;color:red;\">".$page."</span>页，共 $totle 条 $lastpg 页";
$foot.="</td><td width=50% align=right>";

//如果只有一页则跳出函数：
if($lastpg<=1) 
{
$foot.="</td></tr></table>";
return $foot;
}

$foot.=" <a href='$url=1'>首页</a> ";
if($prepg) $foot.=" <a href='$url=$prepg'>上一页</a> "; else $foot.=" 上一页 ";
if($nextpg) $foot.=" <a href='$url=$nextpg'>下一页</a> "; else $foot.=" 下一页 ";
$foot.=" <a href='$url=$lastpg'>尾页</a> ";

//下拉列表
$foot.="第 <select name='topage' size='1' onchange='window.location=\"$url=\"+this.value'>\n";
for($i=1;$i<=$lastpg;$i++){
if($i==$page) $foot.="<option value='$i' selected>$i</option>\n";
else $foot.="<option value='$i'>$i</option>\n";
}
$foot.="</select> 页";
$foot.="</td></tr></table>";
return $foot;
}

/**
 * 只有页面连接，没有信息统计的分页样式，适合小量数据、页面宽度小的分页需求
 */
function baseStyle($page,$totle,$prepg,$nextpg,$lastpg,$url)
{

$foot="";
$foot="<table width=\"100%\" height=\"20px\" id=\"jfoot\"> \n <tr><td width=\"50%\" align=\"left\"> \n";
$foot.=" <a href='$url=1'>首页</a> ";
if($prepg) $foot.=" <a href='$url=$prepg'>上一页</a> "; else $foot.=" 上一页 ";
if($nextpg) $foot.=" <a href='$url=$nextpg'>下一页</a> "; else $foot.=" 下一页 ";
$foot.=" <a href='$url=$lastpg'>尾页</a>  \n";
$foot.="</td><td width=50% align=right>";
//下拉列表
$foot.="转到： <select name='topage' size='1' onchange='window.location=\"$url=\"+this.value'";
$foot.="style=\"height:20px;text-align:center;color:#666666;\">\n";
for($i=1;$i<=$lastpg;$i++){
if($i==$page) $foot.="<option value='$i' selected >$i/$lastpg</option>\n";
else $foot.="<option value='$i'>$i/$lastpg</option>\n";
}
$foot.="</select> 页";
$foot.="</td></tr></table> \n \n";
return $foot;
}


/**
 * 海量数据查分页样式，这里取代了下拉框，从页减少了html输入
 */
function dataStyle($page,$totle,$prepg,$nextpg,$lastpg,$url)
{
	//开始分页导航条代码：
	$foot="";
	$foot="<table width=\"100%\" height=\"20px\" id=\"jfoot\"><tr><td width=\"50%\" align=\"left\">第<span style=\"padding:1px 3px;color:red;\">".$page."</span>页，共 $totle 条 $lastpg 页";
	$foot.="</td><td width=50% align=right>";

	//如果只有一页则跳出函数：
	if($lastpg<=1)
	{
		$foot.="</td></tr></table>";
		return $foot;
	}

	$foot.=" <a href='$url=1'>首页</a> ";
	if($prepg) $foot.=" <a href='$url=$prepg'>上一页</a> "; else $foot.=" 上一页 ";
	if($nextpg) $foot.=" <a href='$url=$nextpg'>下一页</a> "; else $foot.=" 下一页 ";
	$foot.=" <a href='$url=$lastpg'>尾页</a> ";

	//下拉列表
	$foot.="\n 转到： <input id=\"currentjpage\" value=$page onkeypress=\"if (event.keyCode < 48 || event.keyCode >57) event.returnValue = false;\"";
	$foot.=" style=\"color:#666;font-size:14px;text-align:center;border:solid 1px #999999;width:45px;height:16px;background:#ffffff;padding:1px;\"> \n";
	$foot.="<input type=button onclick=\"window.location=('".$url."='+document.getElementById('currentjpage').value)\" value='确定'";
	$foot.=" style=\"border:solid 1px #999999;width:45px;height:20px;background:#ffffff;font-size:12px;padding:1px;\" > \n";
	$foot.="</td></tr></table> \n";
	return $foot;
}



/**
 * 数据序列样式
 */
function numStyle($page,$totle,$prepg,$nextpg,$lastpg,$url)
{
	$foot="<DIV id=foot><UL>";
	//如果只有一页则跳出函数：
	if($lastpg<=1)
	{
		$foot.="</ul></div>";
		return $foot;
	}

	if($prepg) $foot.=" <LI><A  href='$url=$prepg'> 上一页 </A></LI>"; else $foot.="<LI class=disabled> 上一页 </LI>";

	if($lastpg<12)
	{
		for($i=1;$i<=$lastpg;$i++)
		{
			if($i==$page)
			$foot.="<LI class=current>$page</LI>";
			else
			$foot.="<LI><A href=\"$url=$i\">$i</A></LI>";
		}

	}
	else
	{

		if($page<=5)
		{
			if ($page-2<=1)
			{
				for($i=1;$i<=5;$i++)
				{
					if($i==$page)
					$foot.="<LI class=current>$page</LI>";
					else
					$foot.="<LI><A href=\"$url=$i\">$i</A></LI>";
				}
			}
			else
			{
				for($i=1;$i<$page-2;$i++)
				$foot.="<LI><A href=\"$url=$i\">$i</A></LI>";
				for($i=$page-2;$i<=$page+2;$i++)
				{
					if($i==$page)
					$foot.="<LI class=current>$page</LI>";
					else
					$foot.="<LI><A href=\"$url=$i\">$i</A></LI>";
				}
			}

			$foot.="<LI class=none>... </LI>";

			for($i=($lastpg-1);$i<=$lastpg;$i++)
			{
				$foot.="<LI><A href=\"$url=$i\">$i</A></LI>";
			}
		}

		if($page>($lastpg-5))
		{
			for($i=1;$i<=2;$i++)
			{
				$foot.="<LI><A href=\"$url=$i\">$i</A></LI>";
			}
			$foot.="<LI class=none>... </LI>";
			if ($page+2>=$lastpg)
			{
				for($i=($lastpg-4);$i<=$lastpg;$i++)
				{
					if($i==$page)
					$foot.="<LI class=current>$page</LI>";
					else
					$foot.="<LI><A href=\"$url=$i\">$i</A></LI>";
				}
			}
			else
			{

				for($i=$page-2;$i<=$page+2;$i++)
				{
					if($i==$page)
					$foot.="<LI class=current>$page</LI>";
					else
					$foot.="<LI><A href=\"$url=$i\">$i</A></LI>";
				}
				for($i=($page+3);$i<=$lastpg;$i++)
				$foot.="<LI><A href=\"$url=$i\">$i</A></LI>";
			}

		}

		if($page>5&&$page<=($lastpg-5))
		{
			for($i=1;$i<=2;$i++)
			{
				$foot.="<LI><A href=\"$url=$i\">$i</A></LI>";
			}

			$foot.="<LI class=none>... </LI>";

			for($i=$page-2;$i<=$page+2;$i++)
			{
				if($i==$page)
				$foot.="<LI class=current>$page</LI>";
				else
				$foot.="<LI><A href=\"$url=$i\">$i</A></LI>";
			}


			$foot.="<LI class=none>... </LI>";
			for($i=($lastpg-1);$i<=$lastpg;$i++)
			{
				$foot.="<LI><A href=\"$url=$i\">$i</A></LI>";
			}
		}
	}

	if($nextpg) $foot.=" <LI><A  href='$url=$nextpg'> 下一页 </A></LI> "; else $foot.="<LI class=disabled> 下一页 </LI>";

	$foot.="</ul></div>";

	return $foot;
}

?>
