<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_query("DROP DATABASE NOTES") or die(mysql_error());
mysql_query("CREATE DATABASE NOTES") or die(mysql_error());
mysql_select_db("NOTES") or die(mysql_error());
mysql_query("CREATE TABLE users(
	id INT AUTO_INCREMENT,
	Email TEXT,
	Username TEXT,
	First_name TEXT,
	Last_name TEXT,
	Password TEXT,
	PRIMARY KEY(id)
	)") or die(mysql_error());

echo "<h1>OK</h1>";
?>