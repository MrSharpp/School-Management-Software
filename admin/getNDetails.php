<?php 
	include 'include/db.php';

	if(isset($_POST['data']) && !empty($_POST['data']))
	{
		$id = $_POST['data'];
		$query = "SELECT * FROM notices WHERE id = :id";
		$stmt = $connect->prepare($query);
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach($result as $row)
		{
			echo '
				<tr>
                     <td width="30%"><label>Heading</label></td>  
                     <td width="100%"><b>'.$row["heading"].'</b></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Notice</label></td>  
                     <td> <i>'.$row["notice"].'</i></td>  
                </tr>    
                <tr>  
                     <td width="30%"><label>For</label></td>  
                     <td width="70%">'.$row["type"].'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>date</label></td>  
                     <td width="70%">'.$row["date"].'</td>  
                </tr>
                ';
		}
	}
	else
	{
		echo "Wrong";
	}
?>