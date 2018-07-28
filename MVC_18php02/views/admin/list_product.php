<div class="">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hình sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $data->fetch_assoc()) : ?>
               <?php
                    $cate = new ProductModel;
                    $cate_result = $cate->getCategoryId($row['categoryId']);
                    $cate_name = $cate_result->fetch_assoc();
                ?>
                <tr>
                    <td><p><?php echo $row['productId'] ?></p></td>
                    <td><img  id="avatar" src="<?php echo $row['imageName'] ?>" alt="Hình sản phẩm"></td>
                    <td><p><?php echo $row['productName'] ?></p></td>
                     <td><p><?php echo $cate_name['categoryName'] ?></p></td>
                    <td><p><?php echo $row['Price'] . ' đ' ?></p></td>
                    <td><p><a href="page_product/form_edit.php?id=<?php echo $row['productId'] ?>">Sửa</a></p></td>
                    <td><p><a class="delete" href="page_product/delete.php?id=<?php echo $row['productId'] ?>">Xóa</a></p></td>
                </tr>
            <?php endwhile ?>

        </tbody>
    </table>
</div>