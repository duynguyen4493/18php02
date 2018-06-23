<?php
    session_start();
    require '../db/connect.php';
	$getId = (int) $_GET['id'];
    $sql = "SELECT * FROM categories";
    $cate_result = $conn->query($sql);

    $product_result = $conn->query("SELECT * FROM products WHERE productId = $getId");
    $edit = $product_result->fetch_assoc();
    require '../db/disconnect.php';
?>

<!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title></title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
 </head>
 <body>
    <div class="container">
        <div class="form">
            <form class="form-check" action="file_edit.php" method="POST" enctype="multipart/form-data">
                <label for="product"><p>Sửa tên</p></label>
                <input type="text" name="productName" maxlength="255" value="<?php echo $edit['productName'] ?>">
                <label for="category"><p> Sửa Danh Mục</p></label>
                <select name="categoryId" id="">
                    <?php while ($cate_row = $cate_result->fetch_assoc()) : ?>
                        <?php if ($cate_row['categoryId'] == $edit['categoryId']) : ?>
                            <option selected="selected" value="<?php echo ($cate_row['categoryId']) ?>"><?php echo ($cate_row['categoryName']) ?></option>
                        <?php endif ?>
                        <?php if ($cate_row['categoryId'] != $edit['categoryId']) : ?>
                            <option value="<?php echo ($cate_row['categoryId']) ?>"><?php echo ($cate_row['categoryName']) ?></option>
                        <?php endif ?>
                    <?php endwhile ?>
                </select>
                <label for="category"><p>Sửa Giá</p></label>
                <input type="number" name="price" min="0" value="<?php echo $edit['Price'] ?>"></br>
                <label for="image"><p>Chọn hình ảnh</p></label>
                <input type="file" name="image">
                <input type="hidden" name="foo" value="<?php echo $getId ?>">
                <input class="btn-success" type="submit" name="btn" value="Update Product">
            </form>
        </div>
    </div>
 </body>
 </html>