<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$day = isset($_POST["day"]) ? $_POST["day"] : "";
		$month = isset($_POST["month"]) ? $_POST["month"] : "";
		$year = isset($_POST["year"]) ? $_POST["year"] : "";
	}
	$now = getdate();
	$age = $now['year']-$year;
	function chan_le($num) {
		return ($num % 2 == 0);
	}
	
	$check = chan_le($day) ? 1 : 0;
	$check += chan_le($month) ? 1 : 0;
	$check += chan_le($year) ? 1 : 0;
	
	if ($check == 1) {
		echo "<h2 style='color: red'>Bạn sinh ngày: ".$day.' Tháng: '.$month.' Năm: '.$year."</h2>";
	}
	else if ($check == 2) {
		echo "<h2 style='color: blue'>Bạn sinh ngày: ".$day.' Tháng: '.$month.' Năm: '.$year."</h2>";
	}
	else {
		echo "<h2 style='color: yellow;'>Bạn sinh ngày: ".$day.' Tháng: '.$month.' Năm: '.$year."</h2>";
	}
	$format = 'D';
	$timestamp = strtotime($month."/".$day."/".$year);
	$dayWeek = date ($format, $timestamp);
	$dayofweek = strftime ('%A', $timestamp);
	$arrayDay = array (
		'Sun' => 'chủ nhật',
		'Mon' => 'thứ hai',
		'Tue' => 'thứ ba',
		'Wed' => 'thứ tư',
		'Thu' => 'thứ năm',
		'Fri' => 'thứ sáu',
		'Sat' => 'thứ bảy'
	);
	echo $day."/".$month."/".$year." là ngày ".$arrayDay[$dayWeek]." (".$dayofweek.").";
	echo " ";
	echo "Năm nay bạn $age tuổi";
?>