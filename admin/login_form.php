<?php 
	include 'include/db.php';


	$email = $_POST['InputEmail'];
	$password = $_POST['InputPassword'];

	// $password = md5($ipassword);

	$query = "SELECT * FROM `users` WHERE username='".$email."' AND password='".$password."' ";
	$stmt = $connect->prepare($query);
	$stmt->execute();

	if($stmt->rowCount() > 0)
	{
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($result['status'] == 'enabled')
		{
		$_SESSION['username'] = $email;
		$_SESSION['userType'] = $result['userType'];

		if(!empty($_POST['rememberMe']))
		{
			setcookie('username',$email,time()+(10 * 365 * 24 * 60 * 60));
			setcookie('password',$password,time()+(10 * 365 * 24 * 60 * 60));
			setcookie('checkbox','yes',time()+(10 * 365 * 24 * 60 * 60));
		}
		else
		{
			setcookie('username','');
			setcookie('password','');
			setcookie('checkbox','');
		}
		
		echo "0";
		}
		else 
		{
			echo "D";
		}
	}
	else
	{
		echo 'N';
	}

?>