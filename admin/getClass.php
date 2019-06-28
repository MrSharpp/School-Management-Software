<?php 
	include 'include/db.php';
	$output = "";
	$query = "SELECT * FROM classes";

	$stmt = $connect->prepare($query);
	$stmt->execute();

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$output .= '<table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
	$output .= "
              <tr>
              <td>Class ID</td>
              <td>Class Name</td>
              <td>Start Month</td>
              <td>Batch Duration</td>";

              if($_SESSION['userType'] == 'admin')
              {
     $output .= "
              <td>Action</td>";
            }

            $output .= '</tr>';

    $output .= "<tbody>";
	foreach($result as $row)
	{
		$output .= '<tr>
		<td>'.$row['id'].'</td>
		<td>'.$row['className'].'</td>
		<td>'.$row['startMonth'].'</td>
		<td>'.$row['courseDuration'].'</td>';

		if($_SESSION['userType'] == 'admin')
		{
		$output .= '
		<td><a href="#" id='.$row['id'].' onClick="deleteClass(this);"><i class="fas fa-trash-alt"></a></td>';
		}
		$output .= '</tr>';
	}
	$output .= "</tbody></table>";
	echo $output;
?>