<?php
/**
 * Ĭ�Ϸ�ҳͬ��
 *
 * @param ��ǰҳ�� $page
 * @param ��ҳ���� $totle
 * @param ��һҳ $prepg
 * @param ��һҳ $nextpg
 * @param ���һҳ $lastpg
 * @return ҳ�ŵ��ַ���
 */
function defaultStyle($page,$totle,$prepg,$nextpg,$lastpg,$url)
{
//��ʼ��ҳ���������룺
$foot="";
$foot="<table width=\"100%\" height=\"20px\" id=\"jfoot\"><tr><td width=\"50%\" align=\"left\">��<span style=\"padding:1px 3px;color:red;\">".$page."</span>ҳ���� $totle �� $lastpg ҳ";
$foot.="</td><td width=50% align=right>";

//���ֻ��һҳ������������
if($lastpg<=1) 
{
$foot.="</td></tr></table>";
return $foot;
}

$foot.=" <a href='$url=1'>��ҳ</a> ";
if($prepg) $foot.=" <a href='$url=$prepg'>��һҳ</a> "; else $foot.=" ��һҳ ";
if($nextpg) $foot.=" <a href='$url=$nextpg'>��һҳ</a> "; else $foot.=" ��һҳ ";
$foot.=" <a href='$url=$lastpg'>βҳ</a> ";

//�����б�
$foot.="�� <select name='topage' size='1' onchange='window.location=\"$url=\"+this.value'>\n";
for($i=1;$i<=$lastpg;$i++){
if($i==$page) $foot.="<option value='$i' selected>$i</option>\n";
else $foot.="<option value='$i'>$i</option>\n";
}
$foot.="</select> ҳ";
$foot.="</td></tr></table>";
return $foot;
}

/**
 * ֻ��ҳ�����ӣ�û����Ϣͳ�Ƶķ�ҳ��ʽ���ʺ�С�����ݡ�ҳ����С�ķ�ҳ����
 */
function baseStyle($page,$totle,$prepg,$nextpg,$lastpg,$url)
{

$foot="";
$foot="<table width=\"100%\" height=\"20px\" id=\"jfoot\"> \n <tr><td width=\"50%\" align=\"left\"> \n";
$foot.=" <a href='$url=1'>��ҳ</a> ";
if($prepg) $foot.=" <a href='$url=$prepg'>��һҳ</a> "; else $foot.=" ��һҳ ";
if($nextpg) $foot.=" <a href='$url=$nextpg'>��һҳ</a> "; else $foot.=" ��һҳ ";
$foot.=" <a href='$url=$lastpg'>βҳ</a>  \n";
$foot.="</td><td width=50% align=right>";
//�����б�
$foot.="ת���� <select name='topage' size='1' onchange='window.location=\"$url=\"+this.value'";
$foot.="style=\"height:20px;text-align:center;color:#666666;\">\n";
for($i=1;$i<=$lastpg;$i++){
if($i==$page) $foot.="<option value='$i' selected >$i/$lastpg</option>\n";
else $foot.="<option value='$i'>$i/$lastpg</option>\n";
}
$foot.="</select> ҳ";
$foot.="</td></tr></table> \n \n";
return $foot;
}


/**
 * �������ݲ��ҳ��ʽ������ȡ���������򣬴�ҳ������html����
 */
function dataStyle($page,$totle,$prepg,$nextpg,$lastpg,$url)
{
	//��ʼ��ҳ���������룺
	$foot="";
	$foot="<table width=\"100%\" height=\"20px\" id=\"jfoot\"><tr><td width=\"50%\" align=\"left\">��<span style=\"padding:1px 3px;color:red;\">".$page."</span>ҳ���� $totle �� $lastpg ҳ";
	$foot.="</td><td width=50% align=right>";

	//���ֻ��һҳ������������
	if($lastpg<=1)
	{
		$foot.="</td></tr></table>";
		return $foot;
	}

	$foot.=" <a href='$url=1'>��ҳ</a> ";
	if($prepg) $foot.=" <a href='$url=$prepg'>��һҳ</a> "; else $foot.=" ��һҳ ";
	if($nextpg) $foot.=" <a href='$url=$nextpg'>��һҳ</a> "; else $foot.=" ��һҳ ";
	$foot.=" <a href='$url=$lastpg'>βҳ</a> ";

	//�����б�
	$foot.="\n ת���� <input id=\"currentjpage\" value=$page onkeypress=\"if (event.keyCode < 48 || event.keyCode >57) event.returnValue = false;\"";
	$foot.=" style=\"color:#666;font-size:14px;text-align:center;border:solid 1px #999999;width:45px;height:16px;background:#ffffff;padding:1px;\"> \n";
	$foot.="<input type=button onclick=\"window.location=('".$url."='+document.getElementById('currentjpage').value)\" value='ȷ��'";
	$foot.=" style=\"border:solid 1px #999999;width:45px;height:20px;background:#ffffff;font-size:12px;padding:1px;\" > \n";
	$foot.="</td></tr></table> \n";
	return $foot;
}



/**
 * ����������ʽ
 */
function numStyle($page,$totle,$prepg,$nextpg,$lastpg,$url)
{
	$foot="<DIV id=foot><UL>";
	//���ֻ��һҳ������������
	if($lastpg<=1)
	{
		$foot.="</ul></div>";
		return $foot;
	}

	if($prepg) $foot.=" <LI><A  href='$url=$prepg'> ��һҳ </A></LI>"; else $foot.="<LI class=disabled> ��һҳ </LI>";

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

	if($nextpg) $foot.=" <LI><A  href='$url=$nextpg'> ��һҳ </A></LI> "; else $foot.="<LI class=disabled> ��һҳ </LI>";

	$foot.="</ul></div>";

	return $foot;
}

?>
