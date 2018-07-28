<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hình sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Thêm vào giỏ hàng</th>
                <!-- <th>Delete</th> -->
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
                    <td><img id="avatar" src="<?php echo $row['imageName'] ?>" alt="Hình sản phẩm"></td>
                    <td><p><?php echo $row['productName'] ?></p></td>
                     <td><p><?php echo $cate_name['categoryName'] ?></p></td> 
                    <td><p><?php echo $row['Price'] . ' đ' ?></p></td>
                </tr>
            <?php endwhile ?>

        </tbody>
    </table>
</div>