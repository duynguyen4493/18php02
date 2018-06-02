<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
	//echo "<h1>Xin chào mọi người</h1>";
	//$title = 'Today is Sunday';
	//echo $title;
	//echo "<img src='image.jpg' alt='anh'>";

	$name = "hello duy nguyễn";
	echo "Tên bạn là: $name</br>";
	$x = strlen($name) - substr_count($name, " ");
	echo "Số kí tự trong đó là: " . $x . "</br>";
	echo "Số từ trong tên bạn là " . (substr_count($name, " ") + 1) . "</br>";
	$find = substr_count($name, 'n');
	if ($find != 0) {
	echo "Trong tên bạn có chữ n" . "</br>";
	} else {
		echo "Trong tên bạn không có chữ n" . "</br>";
	}
	echo mb_strtoupper($name) . "</br>";
	echo str_replace("Duy", "PHP", $name) . '</br>';
	?>
</body>
</html>