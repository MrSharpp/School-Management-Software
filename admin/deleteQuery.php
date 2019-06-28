<?php 
	include 'include/db.php';

	$id = $_POST['id'];
 
	$query = 'DELETE FROM `query` WHERE id='.$id;
	$stmt = $connect->prepare($query);
	$stmt->execute();

?>