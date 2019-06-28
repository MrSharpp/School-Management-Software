<?php 
	include 'include/db.php';
		$error_msg = "";
       
			$name = $_POST['name'];
			$address = $_POST['address'];
			$phoneNo = $_POST['phoneNo'];
   	 		$query = "INSERT INTO `teachers` (`name`,`address`,`phoneNo`) VALUES ('".$name."','".$address."','".$phoneNo."')";
			$stmt = $connect->prepare($query);
			if($stmt->execute())
			{
				$result = "S";
			}
			else
			{
				$result = "E";
			}
          
        echo json_encode(array("result" => $result,"msg" => $error_msg));
	
?>