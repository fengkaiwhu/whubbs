<?php


if (!defined('IN_SITE')){
	die('Hacking attempt!');
}

class SMTP
{
	var $subject			= "";
	var $message			= "";
	var $type				= "text/html";
	var	$charset			= "utf-8";
	var $email_info			= array();

	var $smtp_host			= "";
	var $smtp_port			= 25;
	var $smtp_username		= "";
	var $smtp_password		= "";
	var $smtp_socket		= null;

	function SMTP($smtp_host = "", $smtp_username = "", $smtp_password = ""){
		if ( !empty($smtp_host) ){
			$this->smtp_host		= $smtp_host;
			$this->smtp_username	= $smtp_username;
			$this->smtp_password	= $smtp_password;
		}
		$this->email_info['to']		= "";
	}

	function email_from($email_from){
		$this->email_info['from']	= $email_from;
	}

	function email_to($email_to){
		$this->email_info['to']		= $email_to;
	}

	function email_bcc($email_bcc){
		$this->email_info['bcc'][]	= $email_bcc;
	}

	function email_cc($email_cc){
		$this->email_info['cc'][]	= $email_cc;
	}

	function message_type($type){
		$this->type	= $type;
	}

	function message_charset($charset = ""){
		$this->charset	= $charset;
	}

	function message_subject($subject){
		$this->subject	= trim($subject);
	}

	function message_content($message){
		$this->message	= trim($message);
	}

	function send(){
		if ( empty($this->email_info['from']) || (empty($this->email_info['to']) && empty($this->email_info['cc']) && empty($this->email_info['bcc'])) ){
			return false;
		}

		// Fix any bare linefeeds in the message to make it RFC821 Compliant.
		$this->message	= preg_replace("#(?<!\r)\n#si", "\r\n", $this->message);

		//Send emails
		if ( !empty($this->smtp_host) ){ //User SMTP
			$errno		= "";
			$errstr		= "";
			if( !$socket	= fsockopen($this->smtp_host, $this->smtp_port, $errno, $errstr, 20) ){
				$this->halt("Could not connect to smtp host!");
				return false;
			}

			//Email headers
			$headers	= $this->email_headers();

			// Waiting for reply
			$this->server_waiting($socket, "220");

			// Do we want to use AUTH?, send RFC2554 EHLO, else send RFC821 HELO
			if( !empty($this->smtp_username) && !empty($this->smtp_password) ){ 
				fputs($socket, "EHLO " . $this->smtp_host . "\r\n");
				$this->server_waiting($socket, "250");

				fputs($socket, "AUTH LOGIN\r\n");
				$this->server_waiting($socket, "334");

				fputs($socket, base64_encode($this->smtp_username) . "\r\n");
				$this->server_waiting($socket, "334");

				fputs($socket, base64_encode($this->smtp_password) . "\r\n");
				$this->server_waiting($socket, "235");
			}
			else
			{
				fputs($socket, "HELO " . $this->smtp_host . "\r\n");
				$this->server_waiting($socket, "250");
			}

			fputs($socket, "MAIL FROM: <" . $this->email_info['from'] . ">\r\n");
			$this->server_waiting($socket, "250");

			if ( preg_match('#[^ ]+\@[^ ]+#', $this->email_info['to']) ){
				fputs($socket, "RCPT TO: <". $this->email_info['to'] .">\r\n");
				$this->server_waiting($socket, "250");
			}

			if ( isset($this->email_info['bcc']) ){
				@reset($this->email_info['bcc']);
				while(list(, $email_bcc)	= each($this->email_info['bcc']) ){
					if (preg_match('#[^ ]+\@[^ ]+#', $email_bcc))
					{
						fputs($socket, "RCPT TO: <$email_bcc>\r\n");
						$this->server_waiting($socket, "250");
					}
				}
			}

			if ( isset($this->email_info['cc']) ){
				@reset($this->email_info['cc']);
				while(list(, $email_cc)	= each($this->email_info['cc']) ){
					if (preg_match('#[^ ]+\@[^ ]+#', $email_cc))
					{
						fputs($socket, "RCPT TO: <$email_cc>\r\n");
						$this->server_waiting($socket, "250");
					}
				}
			}

			//Tell the server we are ready to start sending data
			fputs($socket, "DATA\r\n");
			$this->server_waiting($socket, "354");

			fputs($socket, "Subject: " . $this->subject . "\r\n");
//			if ( !empty($this->email_info['to']) ){
//				fputs($socket, "To: ". $this->email_info['to'] ."\r\n");
//			}
			fputs($socket, $headers ."\r\n\r\n");
			fputs($socket, $this->message . "\r\n");
			fputs($socket, "\r\n.\r\n");
			$this->server_waiting($socket, "250");

			fputs($socket, "QUIT\r\n");
			fclose($socket);
		}
		else{ //Use mail function
			$email_cc	= isset($this->email_info['cc']) ? implode(', ', $this->email_info['cc']) : '';
			$email_bcc	= isset($this->email_info['bcc']) ? implode(', ', $this->email_info['bcc']) : '';
			$headers	= $this->email_headers($email_cc, $email_bcc);
			mail($this->email_info['to'], $this->subject, $this->message, $headers);
		}
		return true;
	}

	function email_headers($email_cc = "", $email_bcc = ""){
		// Build header
		$headers 	= "From: ". $this->email_info['from'] ."\n";
		if ( !empty($email_cc) ){
			$headers 	.= "CC: ". $email_cc ."\n";
		}
		if ( !empty($email_bcc) ){
			$headers 	.= "BCC: ". $email_bcc ."\n";
		}
		$headers 	.= "Reply-to: ". $this->email_info['from'] ."\n";
		$headers	.= !empty($this->smtp_host) ? "Message-ID: <" . md5(uniqid(time())) . "@" . $this->smtp_host . ">\n" : '';
		$headers	.= "MIME-Version: 1.0\nContent-type: " . $this->type . "; charset=" . $this->charset . "\nContent-transfer-encoding: 8bit\n";
		$headers	.= "Date: " . date('r', time()) . "\n";
		$headers	.= "X-Priority: 3\nX-MSMail-Priority: Normal\nX-Mailer: PHP\n";

		// Make sure there are no bare linefeeds in the headers
		$headers	= preg_replace('#(?<!\r)\n#si', "\r\n", $headers);
		return $headers;
	}

	function server_waiting($socket, $response){
		$server_response	= "";
		while (substr($server_response, 3, 1) != ' '){
			if ( !($server_response = fgets($socket, 256)) ){
				$this->halt("Couldn't get mail server response codes!");
				return false;
			}
		}
		if ( !(substr($server_response, 0, 3) == $response) ){
			$this->halt("Ran into problems sending Mail. Response: $server_response!");
		}
		return true;
	}

	function reset_email(){
		$this->email_info	= array();
	}

	function reset(){
		$this->reset_email();
		$this->subject	= "";
		$this->message	= "";
	}

	function halt($msg){
		echo "<b>SMTP Error:</b>\n<br>$msg";
		die();
	}
}
?>