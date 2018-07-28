<div class="container">
	<div class="top text-center">
		<h2>Cập nhật thành viên</h2>
		<p><?php if (isset($notify)) echo $notify; ?></p>
	</div>
	<div class="d-flex justify-content-center">
		<form action="" method="POST">
			<?php $row = $data->fetch_assoc(); ?>
			<label for="user_name">Tên đăng nhập</label><br/>
			<input type="text" name="user_name" value="<?php echo $row['name'] ?>"><br/>
			<label for="password">Mật khẩu</label><br/>
			<input type="password" name="pass_word" value="<?php echo $row['pass'] ?>"><br/>
			<label for="number_phone">Số điện thoại</label><br/>
			<input type="text" name="number_phone" value="<?php echo $row['phone'] ?>"><br/>
			<label for="email">Email</label><br/>
			<input type="email" name="email" value="<?php echo $row['email'] ?>"><br/>
			<label for="email">Chức năng</label><br/>
			<select name="role">
				<?php if($row['role'] == 1) : ?>
				<option value="0">user</option>
				<option selected="selected" value="1">admin</option>
				<?php endif ?>
				<?php if($row['role'] == 0) : ?>
				<option selected="selected" value="0">user</option>
				<option value="1">admin</option>
				<?php endif ?>
			</select>
			<div class="d-flex justify-content-center mt-3">
				<input class="btn-success" type="submit" name="update_user" value="Update"></input>
			</div>
		</form>
	</div>
</div>
