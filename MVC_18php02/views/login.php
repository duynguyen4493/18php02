
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Log_In</title>
	<link rel="stylesheet" type="text/css" href="css/type1.css">
</head>
<body>
	<div class="container">
		<div class="top text-center">
			<h2 id="title">Mời bạn đăng nhập vào Website</h2>
		</div>
		<div class="d-flex justify-content-center">
			<form class="login" name="log-in" action="" method="POST">
				<label for="username">Username</label>
				<br/>
				<input type="text" id="username" name="user_name">
				<br/>
				<label for="password">Password</label>
				<br/>
				<input type="password" id="password" name="pass_word">
				<br/>
				<div class="mt-3 d-flex justify-content-center">
					<input class="btn-primary" type="submit" name="submit_login" value="Login">
				</div>
				<br/>
			</form>
		</div>
	</div>
</body>
</html>