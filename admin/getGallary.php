<?php
	include 'include/db.php';
	$query = "SELECT * FROM gallary";

	$stmt = $connect->prepare($query);
	$stmt->execute();

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$output = '<div class="table-responsive" >';
	$output .= '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
	$output .= "<thead><tr>
	<td>Iamge</td>
	<td>Title</td>
	<td>Action</td>
	</tr></thead><tbody>";

	foreach($result as $row)
	{
		$output .= '<tr>
		<td><image width="220px" height="150px" src="photo/gallary/'.$row['url'].'" alt="'.$row['title'].'"></td>
		<td>'.$row['title'].'</td>
		<td>
		<a href="#" id="'.$row['id'].'" data-toggle="modal" data-target="#deleteModal" onClick="msgDelete(this);"><i class="fas fa-trash-alt"> </i></a> 
		</td>
		</tr>';
	}

	$output .= '</tbody></table></div>';

	echo $output;
?>