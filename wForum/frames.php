<?php
    require("inc/funcs.php");
?>
<html>
<head>
<link rel="icon" href="../favicon.ico" mce_href="../favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="../favicon.ico" mce_href="../favicon.ico" type="image/x-icon"> 
<title><?php echo $HTMLTitle; ?></title>
</head>
<frameset name="mainframe" id="mainframe" frameborder="0" border="1" rows="60,*">
    <frame id="head" name="head" marginwidth="0" marginheight="0" src="../wbbshead.php">
    <frameset name="secondframe" id="secondframe" frameborder="0" border="1" cols="60,*,120">
        <frame id="menu" name="menu" marginwidth="0" marginheight="0" src="../wbbsleft.php">
    	<frame id="main" name="main" marginwidth="0" marginheight="0" src="<?php echo isset($_GET["target"])?urldecode($_GET["target"]):"../wmainpage.html"; ?>">
    	<frame id="right" name="right" marginwidth="0" marginheight="0" src="../wbbsright.html">
    </frameset>
</frameset>
</html>
