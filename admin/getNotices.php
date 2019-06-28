<?php 
include 'include/db.php';
	$query = "SELECT * FROM notices";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $output = "";
                    $output .= '<div class="table-responsive" id="allData">';
                    $output .= '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                    	$output .= '<thead>
                    <tr>
                      <th>Notice Id</th>
                      <th>Heading</th>
                      <th>For</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Notice Id</th>
                      <th>Heading</th>
                      <th>date</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>';
                  	$output .= '<tbody>';
                     
                    foreach($result as $row)
                    {
                      $dt = new DateTime($row['date']);
                      $date = $dt->format('m/d/y');
                    	$output .= '<tr>
                    	<td>'.$row['id'].'</td>
                    	<td><a href="#" style="text-decoration:none;" data-toggle="modal" id='.$row['id'].' data-target="#details" onClick="showDetails(this);">'.$row['heading'].'</a></td>
                    	<td>'.$date.'</td>
                    	<td>
                    	<a href="#" id="'.$row['id'].'" data-toggle="modal" data-target="#deleteModal" onClick="msgDelete(this);"><i class="fas fa-trash-alt"> </i></a></td>
                    	</tr>';
                    	
                    }
                    $output .= '</tbody></table></div>';
                    echo $output;

?>