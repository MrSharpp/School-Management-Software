<?php 
include 'include/db.php';
	$query = "SELECT * FROM users";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $output = "";
                    $output .= '<div class="table-responsive" id="allData">';
                    $output .= '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                    	$output .= '<thead>
                    <tr>
                      <th>Student Id</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>UserType</the>
                      <th>Status</th>';

                      if($_SESSION['userType'] == 'admin')
                      {

                      $output .= '
                      <th>Action</th>';
                  }

                  $output .= '</tr></thead>';


                  	$output .= '<tbody>';
                    foreach($result as $row)
                    {
                    	
                      if($row['status'] == 'enabled')
                      {
                        $statusButton = '<a href="#" class="statusButton" id="'.$row['id'].'" onClick="statusChange(this);"><i class="fas fa-check-circle"> </i></a>';
                      } 
                      else
                      {
                        $statusButton = '<a href="#" class="statusButton" id="'.$row['id'].'" onClick="statusChange(this);"><i class="far fa-check-circle"> </i></a>';
                      }

                    	$output .= '<tr>
                    	<td>'.$row['id'].'</td>
                    	<td>'.$row['username'].'</td>
                    	<td>'.$row['password'].'</td>
                      <td>'.$row['userType'].'</td>
                      <td>'.$row['status'].'</td>';

                      if($_SESSION['userType'] == 'admin')
                      {
                      $output .= '
                    	<td>
                    	<a class="edit" href="#" id="'.$row['id'].'" data-toggle="modal" data-target="#update" class="edit"><i class="far fa-edit"></i></a> 
                    	<a href="#" id="'.$row['id'].'" data-toggle="modal" data-target="#deleteModal" onClick="msgDelete(this);"><i class="fas fa-trash-alt"> </i></a>
                      '.$statusButton.'
                      </td>
                    	';
                      }

                      $output .= '</tr>';
                    	
                    }
                    $output .= '</tbody></table></div>';
                    echo $output;

?>