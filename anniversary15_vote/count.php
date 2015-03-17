<?php 

	//foreach($_COOKIE as $key=>$value)
	  $userid = $_COOKIE['UTMPUSERID'];
	  echo"<br><br><br>";
	  $flag =false;
	  $browseuser=array('SYSOP','sumiyixin','kky','zhangghost','tedy','siximu','zhaoqf8829','wad87812','BabyBlue');
	  foreach($browseuser as $user){
	  	  if($user == $userid) $flag = true;
	  }
	  if(!$flag){
		  echo "对不起<br>";
		  echo "您无权查看此页面<br>";
	  	  exit;
	  }


include_once('jwork/Data.php');
$data = new Data();
$sql="select count(*) from banzhu where banzhu1=1";
$banzhu1=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from banzhu where banzhu2=1";
$banzhu2=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from banzhu where banzhu3=1";
$banzhu3=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from banzhu where banzhu4=1";
$banzhu4=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from banzhu where banzhu5=1";
$banzhu5=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from banzhu where banzhu6=1";
$banzhu6=$data->sqlValue($sql);

$data = new Data();
$sql="select count(*) from jijiwangyou where jijiwangyou1=1";
$jijiwangyou1=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from jijiwangyou where jijiwangyou2=1";
$jijiwangyou2=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from jijiwangyou where jijiwangyou3=1";
$jijiwangyou3=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from jijiwangyou where jijiwangyou4=1";
$jijiwangyou4=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from jijiwangyou where jijiwangyou5=1";
$jijiwangyou5=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from jijiwangyou where jijiwangyou6=1";
$jijiwangyou6=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from jijiwangyou where jijiwangyou7=1";
$jijiwangyou7=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from jijiwangyou where jijiwangyou8=1";
$jijiwangyou8=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from jijiwangyou where jijiwangyou9=1";
$jijiwangyou9=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from jijiwangyou where jijiwangyou10=1";
$jijiwangyou10=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from jijiwangyou where jijiwangyou11=1";
$jijiwangyou11=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from jijiwangyou where jijiwangyou12=1";
$jijiwangyou12=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from jijiwangyou where jijiwangyou13=1";
$jijiwangyou13=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from jijiwangyou where jijiwangyou14=1";
$jijiwangyou14=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from jijiwangyou where jijiwangyou15=1";
$jijiwangyou15=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from jijiwangyou where jijiwangyou16=1";
$jijiwangyou16=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from jijiwangyou where jijiwangyou17=1";
$jijiwangyou17=$data->sqlValue($sql);

$data = new Data();
$sql="select count(*) from xinren where xinren1=1";
$xinren1=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from xinren where xinren2=1";
$xinren2=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from xinren where xinren3=1";
$xinren3=$data->sqlValue($sql);


$data = new Data();
$sql="select count(*) from yuanchuang where yuanchuang1=1";
$yuanchuang1=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from yuanchuang where yuanchuang2=1";
$yuanchuang2=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from yuanchuang where yuanchuang3=1";
$yuanchuang3=$data->sqlValue($sql);

$data = new Data();
$sql="select count(*) from renqibanmian where renqibanmian1=1";
$renqibanmian1=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from renqibanmian where renqibanmian2=1";
$renqibanmian2=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from renqibanmian where renqibanmian3=1";
$renqibanmian3=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from renqibanmian where renqibanmian4=1";
$renqibanmian4=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from renqibanmian where renqibanmian5=1";
$renqibanmian5=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from renqibanmian where renqibanmian6=1";
$renqibanmian6=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from renqibanmian where renqibanmian7=1";
$renqibanmian7=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from renqibanmian where renqibanmian8=1";
$renqibanmian8=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from renqibanmian where renqibanmian9=1";
$renqibanmian9=$data->sqlValue($sql);

$data = new Data();
$sql="select count(*) from shuishou where shuishou1=1";
$shuishou1=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from shuishou where shuishou2=1";
$shuishou2=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from shuishou where shuishou3=1";
$shuishou3=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from shuishou where shuishou4=1";
$shuishou4=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from shuishou where shuishou5=1";
$shuishou5=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from shuishou where shuishou6=1";
$shuishou6=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from shuishou where shuishou7=1";
$shuishou7=$data->sqlValue($sql);

$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen1=1";
$youxiubumen1=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen2=1";
$youxiubumen2=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen3=1";
$youxiubumen3=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen4=1";
$youxiubumen4=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen5=1";
$youxiubumen5=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen6=1";
$youxiubumen6=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen7=1";
$youxiubumen7=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen8=1";
$youxiubumen8=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen9=1";
$youxiubumen9=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen10=1";
$youxiubumen10=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen11=1";
$youxiubumen11=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen12=1";
$youxiubumen12=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen13=1";
$youxiubumen13=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen14=1";
$youxiubumen14=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen15=1";
$youxiubumen15=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen16=1";
$youxiubumen16=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen17=1";
$youxiubumen17=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen18=1";
$youxiubumen18=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen19=1";
$youxiubumen19=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen20=1";
$youxiubumen20=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen21=1";
$youxiubumen21=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen22=1";
$youxiubumen22=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen23=1";
$youxiubumen23=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen24=1";
$youxiubumen24=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen25=1";
$youxiubumen25=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen26=1";
$youxiubumen26=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen27=1";
$youxiubumen27=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen28=1";
$youxiubumen28=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen29=1";
$youxiubumen29=$data->sqlValue($sql);
$data = new Data();
$sql="select count(*) from youxiubumen where youxiubumen30=1";
$youxiubumen30=$data->sqlValue($sql);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title>珞珈山水BBS十五周年站庆之风云榜评选投票结果</title>
</head>
<body bgcolor="white">
<div align="center">
	<table >
		<tr>
			<p align="center"><font size="5">珞珈山水BBS十五周年站庆之风云榜评选投票说明</font></p>
			<p align="left">感谢各位山水网友的热情参与，珞珈山水BBS十五周年站庆之风云榜评选投票活动已经结束，投票结果如下。</p>
		</tr>
		<tr>
						<table border="1">
						<tr>★“珞珈山水BBS优秀版主”奖(3名)</tr>
						<tr>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">char</font></b></p>
						<p align="center">票数：<?php echo $banzhu1;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">coollwf</font></b></p>
						<p align="center">票数：<?php echo $banzhu2;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">DarkTemplar</font></b></p>
						<p align="center">票数：<?php echo $banzhu3;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">F2</font></b></p>
						<p align="center">票数：<?php echo $banzhu4;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">lency</font></b></p>
						<p align="center">票数：<?php echo $banzhu5;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">qianche</font></b></p>
						<p align="center">票数：<?php echo $banzhu6;?></td>
					</tr>
					</table>
					</tr>
					<tr>
						<table border="1">
						<tr>★“珞珈山水BBS积极网友”奖(5名)</tr>
						<tr>						
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">angelma</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou1;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">baolisi007</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou2;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">dandaoyi</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou3;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">foriver</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou4;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">lack888</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou5;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">luohanquan</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou6;?></td>
						</tr>
						<tr>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">shanshuihan</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou7;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">Vin</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou8;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">whudim</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou9;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">wrhsu</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou10;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">WYP</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou11;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">xiao1990</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou12;?></td>
					</tr>
					<tr>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">xlh1526</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou13;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">yaowang</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou14;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">ylddyl</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou16;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">zhuimeng</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou17;?></td>
					</tr>
					</table>
				</tr>
				<tr>
						<table border="1">
						<tr>★“珞珈山水BBS优秀水手”奖(5名)</tr>
						<tr>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">ahol</font></b></p>
						<p align="center">票数：<?php echo $shuishou1;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">cancer</font></b></p>
						<p align="center">票数：<?php echo $shuishou2;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">Evenlyn</font></b></p>
						<p align="center">票数：<?php echo $shuishou3;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">forever18</font></b></p>
						<p align="center">票数：<?php echo $shuishou4;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">Nozomi</font></b></p>
						<p align="center">票数：<?php echo $shuishou5;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">qianche</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou6;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">whuxwy</font></b></p>
						<p align="center">票数：<?php echo $jijiwangyou7;?></td>
						</tr>	
						</table>
				</tr>		
				<tr>
						<table border="1">
							<tr>★“珞珈山水BBS优秀原创”奖(2名)</tr>
							<tr>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">baitu</font></b></p>
						<p align="center">票数：<?php echo $yuanchuang1;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">caofangxiang</font></b></p>
						<p align="center">票数：<?php echo $yuanchuang2;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">zhu</font></b></p>
						<p align="center">票数：<?php echo $yuanchuang3;?></td>
					</tr>	
					</table>
			</tr>							
			<tr>
						<table border="1">
							<tr>★“珞珈山水BBS最佳新人”奖(1名)</tr>
							<tr>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">lime</font></b></p>
						<p align="center">票数：<?php echo $xinren1;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">MANMAN</font></b></p>
						<p align="center">票数：<?php echo $xinren2;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">SUPERKING</font></b></p>
						<p align="center">票数：<?php echo $xinren3;?></td>
					</tr>
				</table>
			</tr>								
			<tr>
						<table border="1">
							<tr>★“珞珈山水BBS人气版面”奖(3名)</tr>
							<tr>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">Feeling</font></b></p>
						<p align="center">票数：<?php echo $renqibanmian1;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">FreeTalk</font></b></p>
						<p align="center">票数：<?php echo $renqibanmian2;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">Humor</font></b></p>
						<p align="center">票数：<?php echo $renqibanmian3;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">Hunan</font></b></p>
						<p align="center">票数：<?php echo $renqibanmian4;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">Picture</font></b></p>
						<p align="center">票数：<?php echo $renqibanmian5;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">PieFriends</font></b></p>
						<p align="center">票数：<?php echo $renqibanmian6;?></td>
					</tr>	
					<tr>		
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">secondhand</font></b></p>
						<p align="center">票数：<?php echo $renqibanmian7;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">WHUconnection</font></b></p>
						<p align="center">票数：<?php echo $renqibanmian8;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">WHUExpress</font></b></p>
						<p align="center">票数：<?php echo $renqibanmian9;?></td>
					</tr>
					</table>
				</tr>												
				<tr>
						<table border="1">
						<tr>★“珞珈山水BBS最佳部门账号”奖(1名)</tr>
						<tr>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">保卫部</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen1;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">校园卡中心</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen2;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">国际交流部</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen3;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">环卫中心</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen4;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">宿教中心</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen5;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">饮食服务中心</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen6;?></td>
					</tr>
						<tr>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">运输服务中心</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen7;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">网络中心</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen8;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">设备处</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen9;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">财务部</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen10;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">发展规划办</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen11;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">港澳台办</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen12;?></td>
					</tr>
					<tr>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">后勤保障部</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen13;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">后勤服务集团</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen14;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">基建部</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen15;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">教务部</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen16;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">继续教育学院</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen17;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">校办</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen18;?></td>
					</tr>
					<tr>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">人事部</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen19;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">图书馆</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen20;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">团委</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen21;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">体育部</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen22;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">宣传部</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen23;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">学工办</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen24;?></td>
					</tr>
					<tr>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">校友总会</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen25;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">研工部</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen26;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">研究生</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen27;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">校医院</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen28;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">招生就业处</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen29;?></td>
						<td width="165">
						<p align="center"><b><font size="5" face="隶书">组织部</font></b></p>
						<p align="center">票数：<?php echo $youxiubumen30;?></td>
					</tr>	
				</table>
			</tr>				
				</table>
			</div>
</body>
</html>
