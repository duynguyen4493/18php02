<div class="container">
	<div class="top text-center">
		<h2>Thêm thành viên</h2>
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
			<label for="role">Chức năng</label><br/>
			<select name="role">
				<option value="0">user</option>
				<option value="1">admin</option>
			</select>
			<div class="d-flex justify-content-center mt-3">
				<input class="btn-success" type="submit" name="add_user" value="Add"></input>
			</div>
		</form>
	</div>
</div>