<?php


require_once('class.phpmailer.php');
require_once("class.smtp.php"); 
$mail  = new PHPMailer(); 

$mail->CharSet    ="UTF-8";                 //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置为 UTF-8
$mail->IsSMTP();                            // 设定使用SMTP服务
$mail->SMTPAuth   = true;                   // 启用 SMTP 验证功能
//$mail->SMTPSecure = "ssl";                  // SMTP 安全协议
$mail->Host       = "smtp.whu.edu.cn";       // SMTP 服务器
$mail->Port       = 25;//465;                    // SMTP服务器的端口号
$mail->Username   = "davidxn";  // SMTP服务器用户名
$mail->Password   = "ddddddd";        // SMTP服务器密码
$mail->SetFrom('davidxn@whu.edu.cn', 'system');    // 设置发件人地址和名称
//$mail->AddReplyTo("邮件回复人地址","邮件回复人名称"); 
                                            // 设置邮件回复人地址和名称
$mail->Subject    = '中文中文中文中文中文'; // 设置邮件标题
$mail->AltBody    = "为了查看该邮件，请切换到支持 HTML 的邮件客户端"; 
                                            // 可选项，向下兼容考虑
$mail->MsgHTML('<h1>asdfasdf</h1>正文中文');                         // 设置邮件内容
$mail->AddAddress('davidxn327@sina.com', "");
//$mail->AddAttachment("images/phpmailer.gif"); // 附件 
if(!$mail->Send()) {
    echo "发送失败：" . $mail->ErrorInfo;
} else {
    echo "恭喜，邮件发送成功！";
}



/*
$to = "davidxn327@sina.com";
$subject = "测试邮件";
$subject = "=?UTF-8?B?".base64_encode($subject)."?=";
$message = "<h1>标题</h1>测试内容";
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type:text/html;charset=utf-8\r\n";
$headers .= "From: system<bbs@ljss.net>\r\n";
echo mail($to,$subject,$message,$headers);




$from      = "Your Name <your@email>";  
$to          = "toemail@gmail.com";    
$subject   = "Test";    
$message = "<h1>Test</h1> i want to send  emails !";    
   
$headers .= "From: ".$from."\r\n";  
  
$headers .= "Organization: Your Organization\r\n";  
$headers .= "MIME-Version: 1.0\r\n";  
$headers .= "Content-type:text/html;charset=utf-8\r\n";   
$headers .= "X-Priority: 1\r\n";  
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";  
  
mail($to, $subject, $message, $headers); 
*/
?>

