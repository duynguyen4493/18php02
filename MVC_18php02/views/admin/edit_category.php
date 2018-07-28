<div class="container">
	<div class="top text-center">
		<h2>Cập nhật danh mục</h2>
	</div>
	<div class="d-flex justify-content-center">
		<form action="" method="POST">
			<label for="category_name">Tên danh mục</label>
			<input type="text" name="category_name" value="<?php echo $row['categoryName'] ?>"><br/>
			<div class="d-flex justify-content-center mt-3">
				<input class="btn-success" type="submit" name="edit_category" value="Update"></input>
			</div>
		</form>
	</div>
</div>