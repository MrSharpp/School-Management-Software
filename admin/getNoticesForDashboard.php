<?php 
	include 'include/db.php';

	$query = "SELECT * FROM `notices` WHERE `type`='student' ORDER BY `id` DESC LIMIT 5";
	$stmt = $connect->prepare($query);
	$stmt->execute();

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$output = '<div class="col-xs-3 clear padding">';

	foreach($result as $row)
	{
		$output .= '<div class="col-xs-9">';
		$output .= '<h6><u><b>'.$row['heading'].'</b></u>:'.time_elapsed_string($row['date']).'</h6>';
		$output .= '<p>'.$row['notice'].'</p>';
		$output .= '</div>';
	}

	$output .= '</div>';

	function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

	print_r($output);
?>