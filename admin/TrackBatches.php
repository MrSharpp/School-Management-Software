<?php include 'include/header.php'; ?>
<script type="text/javascript">
    $('.title').html('<strong>Track Batches</strong>');
  </script>

<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            	Track All Batches
            </div>
            <div class="card-body">
              <?php 

	$query = "SELECT * FROM classes";

	$stmt = $connect->prepare($query);
	$stmt->execute();

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$output = '<div class="card-body">';

	$progress = '';

	foreach($result as $row)
	{

		$date1 = $row['startMonth'];
		$date2 = date('m-Y');

		$toString1 = explode('-', $date1);
		$toString2 = explode('-', $date2);

		$year1 = $toString1[1];
		$year2 = $toString2[1];

		$SaCmonths = (($year2 - $year1) * 12) + ($toString2[0] - $toString1[0]);

		$progress = $SaCmonths / $row['courseDuration'] * 100;
		$progress = floor($progress);
		$output .= '<h4 class="small font-weight-bold">'.$row['className'].'<span class="float-right">'.$progress.'%</span></h4>';

		$output .= '<div class="progress mb-4">';
		$output .= '<div class="progress-bar bg-success" role="progressbar" style="width: '.$progress.'%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>';
		$output .= '</div>';
	}

	$output .= '</div>';
	 echo $output;
              ?>
            </div>
          </div>

        </div>

        <?php include 'include/footer.php'; ?>