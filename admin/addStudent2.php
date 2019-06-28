<?php include 'include/db.php'; 

	$query = "INSERT INTO `students` (`name`,`class`,`age`,`address`,`gender`,`photo`,`phoneNo`) VALUES ('".$_POST['name']."','".$_POST['class']."','".$_POST['age']."','".$_POST['address']."','".$_POST['address']."','".$_FILES['photo']['name']."','".$_POST['phoneNo']."')";

	$stmt = $connect->prepare($query);
	$stmt->execute();
?>