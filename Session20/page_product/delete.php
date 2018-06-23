<?php
	session_start();
    require '../db/connect.php';
    $getId = $_GET['id'];
    //delete image
    $stmt = $conn->query("SELECT imageName FROM products WHERE productId = $getId");
    $result = $stmt->fetch_assoc();
    $fileName = "../" . $result['imageName'];
    //delete product
    $sql = "DELETE FROM products WHERE productId = $getId";
    if ($conn->query($sql)) {
        if (file_exists($fileName)) {
            unlink($fileName);
        }
    }
    require '../db/disconnect.php';
    header('Location: ../listProduct.php');
?>