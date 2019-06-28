<?php 
session_start();
	$dsn = "mysql:host=localhost;dbname=school";
	$username = "root";
	$password = "";
	$connect = new PDO($dsn, $username, $password);
?>