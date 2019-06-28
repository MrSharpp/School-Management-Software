<?php 
	include 'include/db.php';

	$query = 'INSERT INTO `gallary` (`url`,`title`) VALUES ("'.$_FILES['photo']['name'].'","'.$_POST['title'].'")';

	$stmt = $connect->prepare($query);
	if($stmt->execute())
	{
		$target_file = "photo/gallary/" . $_FILES['photo']['name'];
		move_uploaded_file($_FILES['photo']['tmp_name'],$target_file);
	}


?>