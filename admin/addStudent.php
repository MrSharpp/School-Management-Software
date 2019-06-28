<?php 
	include 'include/db.php';
		$error_msg = " ";
		$result = " ";

			if($_FILES['photo']['error'] != 0)
          {
            $imagePath = "photo/default/student.png";
          }
          else
          {
            $extension = array("jpeg","png","jpg","JPEG","PNG","JPG");
            $ext = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);

            if(in_array($ext,$extension))
            {
              $target_file = "photo/" . $_FILES['photo']['name'];
              if(file_exists($target_file))
              {
                $result = "E";
                $error_msg = "A file with tha same name already exists.";
              }
              else
              {
                move_uploaded_file($_FILES['photo']['tmp_name'],$target_file);
                $imagePath = 'photo/'.$_FILES['photo']['name'];
                $result = "S";
              }
            }
            else
            {
            	$result = "E";
            	$error_msg = "The extension of the image is not valid.";
			}
		   }

            if($result != "E")
            {
			$name = $_POST['name'];
			$class = $_POST['class'];
			$age = $_POST['age'];
			$address = $_POST['address'];
			$gender = $_POST['gender'];
			$phoneNo = $_POST['phoneNo'];
   	 		$query = "INSERT INTO `students` (`name`,`class`,`age`,`address`,`gender`,`photo`,`phoneNo`) VALUES ('".$name."','".$class."','".$age."','".$address."','".$gender."','".$imagePath."','".$phoneNo."')";
			$stmt = $connect->prepare($query);
			if($stmt->execute())
			{
				$result = "S";
			}
			else
			{
				$result = "E";
			}
    }

           
          
        echo json_encode(array("result" => $result,"msg" => $error_msg));
	
?>