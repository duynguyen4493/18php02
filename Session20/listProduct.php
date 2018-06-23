<?php
    //connect database
    session_start();
    require 'db/connect.php';
    
    //when click button Submit
    if (isset($_POST['btn'])) {
        $productName = isset($_POST['productName']) ? trim($_POST['productName']) : "";
        $categoryId = isset($_POST['categoryId']) ? $_POST['categoryId'] : "";
        $price = isset($_POST['price']) ? trim($_POST['price']) : "";
        //upload image
        $uploadOk = 1;
        if ($_FILES['image']['tmp_name'] != NULL) {
            $target_file = "images/" . basename($_FILES['image']['name']);
            $imageFileTyppe = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES['image']['tmp_name']);
            if (!$check) {
                echo "File upload không phải là file hình ảnh";
                $uploadOk = 0;
            }
            if ($_FILES['image']['size'] > 500000) {
                echo "file upload qúa lớn";
                $uploadOk = 0;
            }
            if ($imageFileTyppe != 'jpg' and $imageFileTyppe != 'png' and $imageFileTyppe != 'jpeg' and $imageFileTyppe != 'gif' ) {
                echo "Chỉ được upload file jpg, png, jpeg và gif";
                $uploadOk = 0;
            }
        } else {
            $error_1 = "Bạn chưa chọn hình ảnh";
            $uploadOk = 0;
        }
        
        //add product into database
        if ($productName == NULL or $price == NULL or $uploadOk == 0) {
            $error_2 = 'Hãy nhập đầy đủ thông tin và tải lại hình ảnh';
        } else {
            $sql = "SELECT * FROM products WHERE productName = '".$productName."' ";
            $product_result = $conn->query($sql);
            if ($product_result->num_rows == 0) {
                $getDay = (string) date('Y-m-d');
                $sql = "INSERT INTO products (categoryId, productName, Price, dayPost, imageName) VALUES ('".$categoryId."', '".$productName."', '".$price."', '".$getDay."', '".$target_file."')";
                $result = $conn->query($sql);

                //copy image to folder images
                if ($uploadOk == 1 and $result) {
                    if (!is_dir('images')) {
                        mkdir('images');
                    }
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                        echo "Hình sản phẩm đã được lưu";
                    }
                } else $error_1 = "file upload không thành công";

                $success = "Đã thêm sản phẩm $productName thành công!";

            } else $error_2 = "Sản phẩm này đã tồn tại";
        }
    }
    
    //show product
    $sql = "SELECT * FROM categories WHERE del = 0";
    $cate_result = $conn->query($sql);
    $sql = "SELECT * FROM products
        INNER JOIN categories ON products.categoryId = categories.categoryId
        WHERE del = 0";
    $show_result = $conn->query($sql);

    //search product
    if (isset($_POST['btn_search'])) {
        $search = isset($_POST['search']) ? trim($_POST['search']) : "";
        $select = $_POST['select'];
        if ($search == NULL) {
            $error_3 = "Bạn chưa nhập dữ liệu để tìm kiếm";
        } else {
            if ($select == 'categoryName') {
                $show_result = $conn->query("SELECT * FROM products 
                    INNER JOIN categories ON products.categoryId = categories.categoryId
                    WHERE categories.categoryName = '".$search."'");
            }
            if ($select == 'productName') {
                $show_result = $conn->query("SELECT * FROM products WHERE productName = '".$search."'");
            }
            if ($select == 'dayPost') {
                $search = date('Y-m-d', strtotime($search));
                $show_result = $conn->query("SELECT * FROM products WHERE dayPost = '".$search."'");
            }
            if ($select == 'Price') {
                $search = (int)$search;
                $show_result = $conn->query("SELECT * FROM products WHERE Price = $search");
            }
            $searched = $show_result->num_rows;
            $searchAlert = "Đã tìm được $searched sản phẩm";
        }
    }

    //disconnect database
    require 'db/disconnect.php';
?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title></title>
     <link rel="stylesheet" type="text/css" href="css/style_for_productlist.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
 </head>
 <body>
    <div class="container">
        <div class="alert row">
            <div class="col-md-4">
                <?php if (isset($success)) : ?>
                    <p><?php echo $success ?></p>
                <?php endif ?>
                <?php if (isset($error_1)) : ?>
                    <p><?php echo $error_1 ?></p>
                <?php endif ?>
                <?php if (isset($error_2)) : ?>
                    <p><?php echo $error_2 ?></p>
                <?php endif ?>
                <?php if (isset($error_3)) : ?>
                    <p><?php echo $error_3 ?></p>
                <?php endif ?>
                <?php if (isset($searchAlert)) : ?>
                    <p><?php echo $searchAlert ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form">
            <form class="form-check" action="" method="POST" enctype="multipart/form-data">
                <label for="product"><p>Tên sản phẩm:</p></label>
                <input type="text" name="productName" maxlength="255">
                <label for="category"><p>Danh Mục:</p></label>
                <select name="categoryId" id="">
                    <?php while ($cate_row = $cate_result->fetch_assoc()) : ?>
                        <option value="<?php echo ($cate_row['categoryId']) ?>"><?php echo ($cate_row['categoryName']) ?></option>
                    <?php endwhile ?>
                </select>
                <label for="category"><p>Giá sản phẩm:</p></label>
                <input type="number" name="price" min="0" value="0">
                <input type="file" name="image">
                <input class="btn btn-success" type="submit" name="btn" value="Add Product">
            </form>
        </div>
        <div class="search">
            <form action="" method="POST">
                <label for="search"><p>Tìm kiếm:</p></label>
                <input type="text" name="search">
                <select name="select" id="select">
                    <option value="categoryName">theo danh mục</option>
                    <option value="productName">theo tên SP</option>
                    <option value="dayPost">theo ngày đăng</option>
                    <option value="Price">theo giá SP</option>
                </select>
                <input class="btn-primary" type="submit" name="btn_search" value="Search">
            </form>
        </div>
        <div class="table row">
            <div class="col-md-8">
                <table class="table table-striped table-hover">
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
                            <?php while ($row = $show_result->fetch_assoc()) : ?>
                                <?php 
                                    require 'db/connect.php';
                                    $sql = "SELECT categoryName FROM categories WHERE categoryId = '".$row['categoryId']."' ";
                                    $cate_result = $conn->query($sql);
                                    $cate_name = $cate_result->fetch_assoc();
                                    require 'db/disconnect.php';
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
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.delete').click(function () {
                if(confirm('Bạn muốn xóa sản phẩm này chứ?')) {
                    return true;
                }
                return false;
            })
        })
    </script>
 </body>
 </html>