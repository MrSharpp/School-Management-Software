<?php 
include 'include/db.php';
	$query = "SELECT * FROM students";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $output = "";
                    $output .= '<div class="table-responsive" id="allData">';
                    $output .= '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';

                    	$output .= '<thead>
                    <tr>
                      <th>Student Id</th>
                      <th>Name</th>
                      <th>Class</th>
                      <th>Age</th>
                      <th>Phone Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Student Id</th>
                      <th>Name</th>
                      <th>Class</th>
                      <th>Age</th>
                      <th>Phone Number</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>';
                  	$output .= '<tbody>';
                    
                    $usertype = $_SESSION['userType'];

                    foreach($result as $row)
                    {
                    	
                    	$output .= '<tr>
                    	<td>'.$row['studId'].'</td>
                    	<td><a href="#" style="text-decoration:none;" data-toggle="modal" id='.$row['studId'].' data-target="#details" onClick="showDetails(this);">'.$row['name'].'</a></td>
                    	<td>'.$row['class'].'</td>
                    	<td>'.$row['age'].'</td>
                    	<td>'.$row['phoneNo'].'</td>';

                      if($usertype == 'admin')
                      {
                        $output .= '
                    	<td>
                    	<a class="edit" href="#" id="'.$row['studId'].'" data-toggle="modal" data-target="#update" class="edit"><i class="far fa-edit"></i></a> 
                    	<a href="#" id="'.$row['studId'].'" data-toggle="modal" data-target="#deleteModal" onClick="msgDelete(this);"><i class="fas fa-trash-alt"> </i></a></td>
                    	</tr>';
                      }
                      else if($usertype == 'teacher')
                      {
                        $output .= '<td>Not enough Permission</td></tr>';
                      }
                    	
                    }
                    $output .= '</tbody></table></div>';
                    echo $output;

?>