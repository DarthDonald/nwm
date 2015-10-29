<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("NOTES") or die(mysql_error());

$email = $_POST["email"];
$username = $_POST["username"];
$name1 = $_POST["name1"];
$name2 = $_POST["name2"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

/*echo $email . "<br/>";
echo $username . "<br/>";
echo $name1 . "<br/>";
echo $name2 . "<br/>";
echo $password . "<br/>";
echo $confirm_password . "<br/>";*/

function is_nickname_exists($username){
	$strSQL = "SELECT * FROM users";
	$rs = mysql_query($strSQL);
	while ($row = mysql_fetch_array($rs)){
		if ($username == $row["Username"]){
			return true;
		}
	}
	return false;
}

function create_new_user($email, $username, $name1, $name2, $password, $confirm_password){
	if (is_nickname_exists($username)){
		echo "<h1>-</h1>";
		return;
	}
	$strSQL = "INSERT INTO users(Email, Username, First_name, Last_name, Password) VALUES(";
	$strSQL = $strSQL . "'" . $email ."', ";
	$strSQL = $strSQL . "'" . $username ."', ";
	$strSQL = $strSQL . "'" . $name1 ."', ";
	$strSQL = $strSQL . "'" . $name2 ."', ";
	$strSQL = $strSQL . "'" . $password ."')";
	mysql_query($strSQL);
	echo "<h1>+</h1>";
}
create_new_user($email, $username, $name1, $name2, $password, $confirm_password);

function show_all_users(){
	$strSQL = "SELECT * FROM users";
	$rs = mysql_query($strSQL);
	while ($row = mysql_fetch_array($rs)){
		echo $row["Email"] . "<br/>";
		echo $row["Username"] . "<br/>";
		echo $row["First_name"] . "<br/>";
		echo $row["Last_name"] . "<br/>";
		echo $row["Password"] . "<br/>";
	}
}
//show_all_users();

echo "<h1>OK</h1>";
?>