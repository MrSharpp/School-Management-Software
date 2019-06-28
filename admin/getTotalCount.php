<?php 
	include 'include/db.php';

	$sql = "SELECT count(*) FROM `students`"; 
	$result = $connect->prepare($sql); 
	$result->execute(); 
	$students = $result->fetchColumn(); 

	$sql = "SELECT count(*) FROM `teachers`"; 
	$result = $connect->prepare($sql); 
	$result->execute(); 
	$teachers = $result->fetchColumn(); 

	$sql = "SELECT count(*) FROM `users`"; 
	$result = $connect->prepare($sql); 
	$result->execute(); 
	$users = $result->fetchColumn(); 

	$sql = "SELECT count(*) FROM `classes`"; 
	$result = $connect->prepare($sql); 
	$result->execute(); 
	$classes = $result->fetchColumn();

	echo json_encode(array('students' => $students, 'teachers' => $teachers, "users" => $users,"classes" => $classes));
?>