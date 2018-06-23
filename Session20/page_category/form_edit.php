<?php
	session_start();
	require '../db/connect.php';
	$getId = (int) $_GET['id'];
	$sql = "SELECT * FROM categories WHERE categoryId = '".$getId."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    require '../db/disconnect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="form">
			<form action="file_edit.php" method="GET">
				<label for="update"><p>Chỉnh sửa danh mục</p></label></br>
				<input name="update" type="text" value="<?php echo $row['categoryName'] ?>">
				<input class="btn-success" type="submit" name="btn" value="Update">
				<input type="hidden" name="foo" value="<?php echo $getId ?>">
			</form>
		</div>
	</div>
</body>
</html>