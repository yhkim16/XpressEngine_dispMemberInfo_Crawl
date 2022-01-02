<html>
<body>
<form action="dream.php" method="post">
<table border="0">
<tr>
  <td>Address </td>
  <td align="left"><input type="text" name="address" size="30"
     maxlength="999"></td>
<tr>

<tr>
  <td>start </td>
  <td align="left"><input type="text" name="start" size="30"
     maxlength="50"></td>
<tr>

<tr>
  <td>limit </td>
  <td align="left"><input type="text" name="limit" size="30"
     maxlength="30"></td>
<tr>

<tr>
  <td>PHPSESSID </td>
  <td align="left"><input type="text" name="PHPSESSID" size="30"
     maxlength="50"></td>
<tr>

<tr>
  <td colspan="2" align="center"><input type="submit" value="Submit Order"></td>
</tr>
</table>
</form>


<?php
include "Snoopy.class.php";
set_time_limit(0);
 $address= $_POST['address'];
 $start= $_POST['start'];
 $limit=$_POST['limit'];
 $PHPSESSID=$_POST['PHPSESSID'];

for($srl=$start; $srl<=$limit; $srl++){

$snoopy = new Snoopy;


 $snoopy->agent = "Mozilla/5.0 (Windows NT 5.1; rv:6.0) Gecko/20100101 Firefox/6.0";
 $snoopy->cookies["PHPSESSID"] = $PHPSESSID;
	

$snoopy->fetch("$address$srl");

 $fp=fopen("./srl/$srl.html","w");
 fwrite($fp,"$snoopy->results");
 fclose($fp);
echo "$srl<br />";
}
?>
</body>