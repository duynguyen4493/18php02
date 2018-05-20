<?php
$result = [2, 6, 10, 13, 17, 20];
$q = isset($_GET['q']) ? $_GET['q'] : "";
$lastResult = "";
if (!empty($q)) {
	for ($i = 0; $i < count($result); $i++) {
		if ($result[$i] == $q) {
			$lastResult = "Chúc mừng bạn đã trúng thưởng với số ".$q;
			break;
		}
		else {
			$lastResult = "Chúc bạn may mắn lần sau!";
		}
	}

}
else {
	$error = 'Vui lòng  chọn 1 số';
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Example 2</title>
	<link rel="stylesheet" href="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
</head>
<body>
	<div style="margin-left: 100px">
		<form method="GET" action="index.php">
			<!-- <textarea id="area" name="text_input" cols="30" rows="10" placeholder="Enter text"></textarea> -->
			<h2 style="color: red; font-weight: bold;">Chương trình bốc thăm trúng thưởng</h2>
			<h3 style="color: violet">Mời bạn nhập 1 số (từ 1 đến 20)</h3>
			<label for="#">Chọn số may mắn:</label><input name="q" type="text">
			<button>Search</button>
		</form>
		<div>
			<p style="font-size: 20px; color: blue;" id="result"><?php echo $lastResult; ?></p>
		</div>
	</div>
</body>
</html>