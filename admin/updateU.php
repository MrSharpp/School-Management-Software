<?php 
	include 'include/db.php';

	$studId = $_POST['studId'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	$usertype = $_POST['usertype'];
	$result = "S";
	$error_msg = " ";


	$query = 'UPDATE `users` SET `username`="'.$name.'",`password`="'.$password.'",`userType`="'.$usertype.'" WHERE id='.$studId;
	$stmt = $connect->prepare($query);
	$stmt->execute();

	echo json_encode("DONE")
?>