
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Form_Register</title>
	<link rel="stylesheet" type="text/css" href="css/type2.css">
</head>
<body>
	<div class="container">
		<div class="top text-center">
			<h2>Đăng kí thành viên</h2>
		</div>
		<div class="d-flex justify-content-center">
			<form action="" method="post">
				<label for="user_name">Tên đăng nhập</label><br/>
				<input type="text" name="user_name"><br/>
				<label for="password">Mật khẩu</label><br/>
				<input type="password" name="pass_word"><br/>
				<label for="number_phone">Số điện thoại</label><br/>
				<input type="text" name="number_phone"><br/>
				<label for="email">Email</label><br/>
				<input type="email" name="email"><br/>
				<div class="d-flex justify-content-center mt-3">
					<input class="btn-success" type="submit" name="register" value="Register"></input>
				</div>
			</form>
		</div>
	</div>
</body>
</html>