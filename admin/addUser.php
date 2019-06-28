<?php 
	include 'include/db.php';
		$error_msg = " ";
		$result = "S";

			$name = $_POST['name'];
			$password = $_POST['password'];
			$usertype = $_POST['usertype'];
   	 		$query = "INSERT INTO `users` (`username`,`password`,`userType`) VALUES ('".$name."','".$password."','".$usertype."')";
			$stmt = $connect->prepare($query);
			$stmt->execute();

           
          
        echo json_encode(array("result" => $result,"msg" => $error_msg));
	
?>