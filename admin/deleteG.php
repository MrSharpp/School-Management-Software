<?php 
	include 'include/db.php';
	if(isset($_POST['id']) && !empty($_POST['id']))
	{
	$id = $_POST['id'];
	$dQuery = 'SELECT url FROM `gallary` WHERE id = '.$id;
	$stmtb = $connect->prepare($dQuery);
	$stmtb->execute();
	$resultb = $stmtb->fetch();
	
	$query = "DELETE FROM `gallary` WHERE id = ".$id;
	$stmt = $connect->prepare($query);

	if($stmt->execute())
	{
		$imagePath = 'photo/gallary/' . $resultb['url'];
		unlink($imagePath);
	}
	
}
?>