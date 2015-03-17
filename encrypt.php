
<?php 
function encrypt($encrypt,$key="") { 
$iv = mcrypt_create_iv ( mcrypt_get_iv_size ( MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB ), MCRYPT_RAND ); 
$passcrypt = mcrypt_encrypt ( MCRYPT_RIJNDAEL_256, $key, $encrypt, MCRYPT_MODE_ECB, $iv ); 
$encode = base64_encode ( $passcrypt ); 
return $encode; 
} 

function decrypt($decrypt,$key="") { 
$decoded = base64_decode ( $decrypt ); 
$iv = mcrypt_create_iv ( mcrypt_get_iv_size ( MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB ), MCRYPT_RAND ); 
$decrypted = mcrypt_decrypt ( MCRYPT_RIJNDAEL_256, $key, $decoded, MCRYPT_MODE_ECB, $iv );
return $decrypted; 
}
if($_GET['o'])
	echo encrypt($_GET['o'],"*&*N68*688");
if($_GET['m']) 
	echo decrypt($_GET['m'],"*&*N68*688");
?>