<?php 
	include 'include/db.php';

	$id = $_POST['id'];
	$getQuery = "SELECT status FROM users WHERE id=".$id;
	$satmt = $connect->prepare($getQuery);
	$satmt->execute();
	$result = $satmt->fetch(PDO::FETCH_ASSOC);
	$res = ' ';

	if($result['status'] == 'enabled')	
	{
	$query = "UPDATE `users` SET status='desabled' WHERE id=".$id;
	$stmt = $connect->prepare($query);
	$stmt->execute();
	}
	else
	{
	$query = "UPDATE `users` SET status='enabled' WHERE id=".$id;
	$stmt = $connect->prepare($query);
	$stmt->execute();
	}
?>