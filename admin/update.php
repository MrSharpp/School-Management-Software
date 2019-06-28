<?php 
	include 'include/db.php';
	$imagePath = " ";
	$studId = $_POST['studId'];
	$name = $_POST['name'];
	$class = $_POST['class'];
	$age = $_POST['age'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$phoneNo = $_POST['phoneNo'];
	$result = "S";
	$error_msg = " ";

	$query = 'UPDATE `students` SET `name`="'.$name.'",`class`="'.$class.'",`age`="'.$age.'",`address`="'.$address.'",`gender`="'.$gender.'",`phoneNo`="'.$phoneNo.'" WHERE studId='.$studId;
	$stmt = $connect->prepare($query);
	$stmt->execute();
	
	echo json_encode(array("status" => $result,"msg" => $error_msg,'img' => $imagePath));
?>