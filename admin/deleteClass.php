<?php 
	include 'include/db.php';

	$id = $_POST['id'];
	$query = "DELETE FROM classes WHERE id=".$id;
	$stmt = $connect->prepare($query);
	$stmt->execute();

?>