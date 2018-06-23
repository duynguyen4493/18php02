<?php
    session_start();
    require '../db/connect.php';
    if (isset($_POST['btn'])) {
        $productName = trim($_POST['productName']);
        $categoryId = $_POST['categoryId'];
        $price = trim($_POST['price']);
        $getDay = (string) date('Y-m-d');
        $getId = $_POST['foo'];

        //update image
        if ($_FILES['image']['tmp_name'] != NULL) {
            $target_file = "../images/" . basename($_FILES['image']['name']);
            $target_file_edit = "images/" . basename($_FILES['image']['name']);
            $uploadOk = 1;
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
            if ($uploadOk == 1) {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $stmt = $conn->query("SELECT imageName FROM products WHERE productId = $getId");
                    $result = $stmt->fetch_assoc();
                    $fileName = "../" . $result['imageName'];

                    $sql = "UPDATE products SET imageName = '".$target_file_edit."' WHERE productId = $getId";
                    if ($conn->query($sql)) {
                        if (file_exists($fileName) and $fileName != $target_file_edit) {
                            unlink($fileName);
                        }
                    } echo "Chưa cập nhật hình ảnh";
                }
            }
        }
        //update Product
        $sql = "UPDATE products SET categoryId = $categoryId, productName = '".$productName."', Price = $price, dayEdit = '".$getDay."' WHERE productId = $getId";
        if ($conn->query($sql)) {
            header('Location: ../listProduct.php');
        } else echo "Cập nhật sản phẩm không thành công! ";
        echo "Click vào link để quay lại trang chủ" . "</br>";
        echo '<a href="../listProduct.php">list Product</a>';
    } 
?>