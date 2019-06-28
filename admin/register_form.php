<?php 
	include 'include/db.php';

	$fname = $_POST['FirstName'];
	$lname = $_POST['LastName'];
	$email = $_POST['InputEmail'];
	$ipassword = $_POST['InputPassword'];

	$username = $fname.'_'.$lname;
	$password = md5($ipassword);

	$query = "INSERT INTO `users`(`username`,`email`,`password`, `userType`) VALUES ('".$username."','".$email."','".$password."','student')";

	$stmt = $connect->prepare($query);
	$stmt->execute();
?>