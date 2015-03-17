<?php 
	error_reporting (E_ALL);
$messages = Array (
 "noFollow" => Array (
	0 => " <font color=red><b> û���ҵ���ڡ�</b></font>. ",
	1 => " û���ҵ���ڡ�"
 ),
 "inDatabase" => Array (
	0 => " <font color=red><b> �Ѿ������ݿ���</b></font><br>",
	1 => " �Ѿ������ݿ���\n"
 ),
 "completed" => Array (
	0 => "<br>����� %cur_time.\n<br>",
	1 => "����� %cur_time.\n"
 ),
 "starting" => Array (
	0 => " ������ʼ�� %cur_time.\n",
	1 => " ������ʼ�� %cur_time.\n"
	 ),
 "quit" => Array (
	0 => "</body></html>",
	1 => ""
 ),
 "pageRemoved" => Array (
	0 => " <font color=red>���������ų�ҳ�档</font><br>\n",
	1 => " ���������ų�ҳ�档\n"
 ),
  "continueSuspended" => Array (
	0 => "<br>������ͣ��������<br>\n",
	1 => "������ͣ��������\n"
 ),
  "indexed" => Array (
	0 => "<br><b> <font color=\"green\">������ɡ�</font></b><br>\n",
	1 => " \n������ɡ�\n"
 ),
"duplicate" => Array (
	0 => " <font color=\"red\"><b>ҳ���ظ���</b></font><br>\n",
	1 => " ҳ���ظ���\n"
 ),
"md5notChanged" => Array (
	0 => " <font color=\"red\"><b>MD5 ��⣬ҳ���޸ı䡣</b></font><br>\n",
	1 => " MD5 ��⣬ҳ���޸ı䡣\n"
 ),
"metaNoindex" => Array (
	0 => " <font color=\"red\">��meta��ǩ��û��������ǩ��</font><br>\n",
	1 => " ��meta��ǩ��û��������ǩ��\n"
 ),
  "re-indexed" => Array (
	0 => " <font color=\"green\">��������</font><br>\n",
	1 => " ��������\n"
 ),
"minWords" => Array (
	0 => " <font color=\"red\">ҳ����������趨�� $min_words_per_page ���ؼ��ʡ�</font><br>\n",
	1 => " ҳ����������趨�� $min_words_per_page ���ؼ��ʡ�\n"
 )
);

function printRobotsReport($num, $thislink, $cl) {
	global $print_results, $log_format;
	$log_msg_txt = "$num. ���� $thislink����robots.txt �ļ��б���Ϊ��ֹ������\n";
	$log_msg_html = "<b>$num</b>. ���� <b>$thislink</b>��<font color=red>����robots.txt �ļ��б���Ϊ��ֹ������</font></br>";
	if ($print_results) {
		if ($cl==0) {
			print $log_msg_html; 
		} else {
			print $log_msg_txt;
		}
		flush();
	}
	if ($log_format=="html") {
		writeToLog($log_msg_html);
	} else {
		writeToLog($log_msg_txt);
	}

}

function printUrlStringReport($num, $thislink, $cl) {
	global $print_results, $log_format;
	$log_msg_txt = "$num. ���� $thislink���ļ��� required/disallowed ���������ֹ��\n";
	$log_msg_html = "<b>$num</b>. ���� <b>$thislink</b>��<font color=red>�ļ��� required/disallowed ��������ֹ��</font></br>";
	if ($print_results) {
		if ($cl==0) {
			print $log_msg_html;
		} else {
			print $log_msg_txt;
		}
		flush();
	}

	if ($log_format=="html") {
		writeToLog($log_msg_html);
	} else {
		writeToLog($log_msg_txt);
	}
}

function printRetrieving($num, $thislink, $cl) {
	global $print_results, $log_format;
	$log_msg_txt = "$num. ������ $thislink �� " . date("H:i:s")."��\n";
	$log_msg_html = "<b>$num</b>. ������<b>$thislink</b> �� " . date("H:i:s")."��<br>\n";
	if ($print_results) {
		if ($cl==0) {
			print $log_msg_html;
		} else {
			print $log_msg_txt;
		}
		flush();
	}

	if ($log_format=="html") {
		writeToLog($log_msg_html);
	} else {
		writeToLog($log_msg_txt);
	}
}


function printLinksReport($numoflinks, $all_links, $cl) {
	global $print_results, $log_format;
	$log_msg_txt = " $all_links �����ӱ��ҵ��� �����ӣ�$numoflinks ���ҵ���\n";
	$log_msg_html = " <font color=\"blue\"><b>$all_links</b>�����ӱ��ҵ�</font>�� �����ӣ�<font color=\"blue\"><b>$numoflinks</b></font>�����ҵ���<br>\n";
	if ($print_results) {
		if ($cl==0) {
			print $log_msg_html;
		} else {
			print $log_msg_txt;
		}
		flush();
	}

	if ($log_format=="html") {
		writeToLog($log_msg_html);
	} else {
		writeToLog($log_msg_txt);
	}
}

function printHeader($omit, $url, $cl) {
	global $print_results, $log_format;

	if (count($omit) > 0 ) {
		$urlparts = parse_url($url);
		foreach ($omit as $dir) {			
			$omits[] = $urlparts['scheme']."://".$urlparts['host'].$dir;
		}
	}
	
	$log_msg_txt = "���� $url\n";
	if (count($omit) > 0) {
		$log_msg_txt .= "��robots.txt�н�ֹ���������ļ���Ŀ¼��\n";
		$log_msg_txt .= implode("\n", $omits);
		$log_msg_txt .= "\n\n";
	}

	$log_msg_html_1 = "<html><head><LINK REL=STYLESHEET HREF=\"admin.css\" TYPE=\"text/css\"></head>\n";
	$log_msg_html_1 .= "<body style=\"font-family:Verdana, Arial; font-size:12px\">";
	
	$log_msg_html_link = "[���ص� <a href=\"admin.php\">����Ա�������</a>]";
	$log_msg_html_2 = "<p><font size=\"+1\">���� <b>$url</b></font></p>\n";

	if (count($omit) > 0) {
		$log_msg_html_2 .=  "��robots.txt�н�ֹ���������ļ���Ŀ¼��<br>\n";
		$log_msg_html_2 .=  implode("<br>", $omits);
		$log_msg_html_2 .=  "<br><br>";
	}

	if ($print_results) {
		if ($cl==0) {
			print $log_msg_html_1.$log_msg_html_link.$log_msg_html_2;
		} else {
			print $log_msg_txt;
		}
		flush();
	}

	if ($log_format=="html") {
		writeToLog($log_msg_html_1.$log_msg_html_2);
	} else {
		writeToLog($log_msg_txt);
	}
}

function printPageSizeReport($pageSize) {
	global $print_results, $log_format;
	$log_msg_txt = "ҳ���С��$pageSize"."kb. ";
	if ($print_results) {
		print $log_msg_txt;
		flush();
	}

	writeToLog($log_msg_txt);
}

function printUrlStatus($report, $cl) {
	global $print_results, $log_format;
	$log_msg_txt = "$report\n";
	$log_msg_html = " <font color=red><b>$report</b></font><br>\n";
	if ($print_results) {
		if ($cl==0) {
			print $log_msg_html; 
		} else {
			print $log_msg_txt;
		}
		flush();
	}
	if ($log_format=="html") {
		writeToLog($log_msg_html);
	} else {
		writeToLog($log_msg_txt);
	}

}



function printConnectErrorReport($errmsg) {
	global $print_results, $log_format;
	$log_msg_txt = "���� socket ����ʧ�� ";
	$log_msg_txt .= $errmsg;

	if ($print_results) {
		print $log_msg_txt;
		flush();
	}

	writeToLog($log_msg_txt);
}



function writeToLog($msg) {
	global $keep_log, $log_handle;
	if($keep_log) {
		if (!$log_handle) {
			die ("��¼��־�ļ��޷��򿪡� ");
		}

		if (fwrite($log_handle, $msg) === FALSE) {
			die ("��¼��־�ļ��޷�д�롣 ");
		}
	}
}


function printStandardReport($type, $cl) {
	global $print_results, $log_format, $messages;
	if ($print_results) {
		print str_replace('%cur_time', date("H:i:s"), $messages[$type][$cl]);
		flush();
	}

	if ($log_format=="html") {
		writeToLog(str_replace('%cur_time', date("H:i:s"), $messages[$type][0]));
	} else {
		writeToLog(str_replace('%cur_time', date("H:i:s"), $messages[$type][1]));
	}

}


?>