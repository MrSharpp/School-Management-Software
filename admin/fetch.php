<?php
include 'include/db.php';
	$id = $_POST['id'];
	$query = "SELECT * FROM `students` WHERE studId=".$id;
	$stmt = $connect->prepare($query);
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
 	echo json_encode($results);
	
?>