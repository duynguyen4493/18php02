<div class="form">
    <form class="form-check" action="" method="POST" enctype="multipart/form-data">
        <label for="product"><p>Tên sản phẩm:</p></label>
        <input type="text" name="product_name" maxlength="255">
        <label for="category"><p>Danh Mục:</p></label>
        <select name="category_id">
            <?php while ($row = $cate_result->fetch_assoc()) : ?>
                <option value="<?php echo ($row['categoryId']) ?>"><?php echo ($row['categoryName']) ?></option>
            <?php endwhile ?>
        </select>
        <label for="category"><p>Giá sản phẩm:</p></label>
        <input type="number" name="price" min="0" value="1000"><br>
        <input type="file" name="image"><br>
        <input class="btn btn-success mt-3" type="submit" name="add_product" value="Add Product">
    </form>
</div>