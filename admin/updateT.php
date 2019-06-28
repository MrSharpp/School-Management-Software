<?php 
	include 'include/db.php';
	$imagePath = " ";
	$studId = $_POST['studId'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phoneNo = $_POST['phoneNo'];
	$result = "S";
	$error_msg = " ";

	$query = 'UPDATE `teachers` SET `name`="'.$name.'",`Address`="'.$address.'",`phoneNo`="'.$phoneNo.'" WHERE id='.$studId;
	$stmt = $connect->prepare($query);
	$stmt->execute();
	
	echo json_encode(array("status" => $result,"msg" => $error_msg,'img' => $imagePath));
?>