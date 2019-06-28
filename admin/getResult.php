<?php 
	include 'include/db.php';

	$query = 'SELECT * FROM `results`';

	$stmt = $connect->prepare($query);

	$stmt->execute();

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$output = '<div class="row">';	

	foreach($result as $row)
	{
		$output .= '
					<div class="column">
					<div class="card">';
		$output .= '<img src="photo/results/'.$row['imageName'].'" alt="Jane" hieght="250px" width="250px">';
		$output .= '<div class="container">
		<h6><b>'.$row['name'].'</b></h6><p class="title">'.$row['title'].'</p>';
		$output .= '</div></div></div>';
	}

	$output .= '</div>';

	echo $output;
?>