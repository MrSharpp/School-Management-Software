<?php 
	include 'include/db.php';

			$heading = $_POST['heading'];
			$text = $_POST['text'];
			$for = $_POST['for'];
      $date = date("Y-m-d h:i:sa");
   	 	$query = "INSERT INTO `notices` (`heading`,`notice`,`type`,`date`) VALUES ('".$heading."','".$text."','".$for."','".$date."')";
			$stmt = $connect->prepare($query);
			$stmt->execute();

      $result = "S";
      $error_msg = " ";
      echo json_encode(array("result" => $result,"msg" => $error_msg));
?>