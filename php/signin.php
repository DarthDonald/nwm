<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("NOTES") or die(mysql_error());

$email = $_POST["email"];
$password = $_POST["password"];

function try_sign_in($email, $password){
	$strSQL = "SELECT * FROM users";
	$rs = mysql_query($strSQL);
	while ($row = mysql_fetch_array($rs)){
		if ($row["Email"] == $password && $row["Password"] == $password){
			echo "<h1>+</h1>";
			return true;
		}
	}
	echo "<h1>-</h1>";
	return false;
}
try_sign_in($email,$password);

echo "<h1>OK</h1>";
?>