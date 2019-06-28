<?php
	include 'include/db.php';

	$query = 'SELECT * FROM `query` order by id desc';

	$stmt = $connect->prepare($query);
	$stmt->execute();

	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$output = '<div id="accordion">';

	foreach($results as $row)
	{
		$output .= '<div class="card">
    <div class="card-header" id="b'.$row['id'].'">
      <h5 class="mb-0">

        <button class="btn btn-link" data-toggle="collapse" data-target="#a'.$row['id'].'" aria-expanded="true" aria-controls="collapseOne">
          '.$row['topic'].'
        </button>
        <button type="button" id='.$row['id'].' onClick="Qdelete(this);" class="btn btn-danger btn-sm pull-right">Delete</button>
      </h5>
    </div>';

    	$output .= '<div id="a'.$row['id'].'" class="collapse" aria-labelledby="b'.$row['id'].'" data-parent="#accordion">
      <div class="card-body">
      '.$row['query'].'
      </div>
     <i> Email: '.$row['email'].' <br>
      Date Added: '.$row['date'].' </i>
    </div>
    <div class="card-footer py-1">
              From '.$row['name'].'
            </div>
  </div>';

	}

	$output .= '</div>';

	echo $output;

 ?>