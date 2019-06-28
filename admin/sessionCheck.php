<?php include 'include/db.php';
	if($_SESSION['userType'] == 'moderator')
	{
		echo 'M';
	}
	else if($_SESSION['userType'] == 'teacher')
	{
		echo 'T';
	}
 ?>