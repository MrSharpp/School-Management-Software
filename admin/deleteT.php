<?php 
	include 'include/db.php';
	if(isset($_POST['id']) && !empty($_POST['id']))
	{
	$id = $_POST['id'];
	$query = "DELETE FROM `teachers` WHERE id = ".$id;
	$stmt = $connect->prepare($query);

	if($stmt->execute())
	{
		echo "Sucess";
	}
	else
	{
		echo "Error";
	}
}
?>