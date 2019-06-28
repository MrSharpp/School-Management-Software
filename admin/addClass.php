<?php 
	include 'include/db.php';

	$className = $_POST['className'];
	$startMonth = $_POST['startMonth'];
	$startYear = $_POST['startYear'];
	$duration = $_POST['duration'];

	$query = "INSERT INTO `classes` (`className`,`startMonth`,`courseDuration`) VALUES('".$className."','".$startMonth."-".$startYear."','".$duration."')";
	$stmt = $connect->prepare($query);
	$stmt->execute();
?>