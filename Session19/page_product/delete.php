<?php
	echo $_GET['id'];
	$dsn = "mysql: host=localhost; dbname=18php02";
    try {
        $conn = new PDO($dsn, "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //delete image
        $stmt = $conn->prepare("SELECT imageName FROM products WHERE productId = :product_id");
        $data = array('product_id' => $_GET['id']);
        $stmt->execute($data);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $fileName = "../" . $result['imageName'];
        if (file_exists($fileName)) {
            unlink($fileName);
        }
        
        //delete product
        $stmt = $conn->prepare("DELETE FROM products WHERE productId = :product_id");
        $data = array('product_id' => $_GET['id']);
        $stmt->execute($data);
        header('Location: ../listProduct.php');
    }
    catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    //discoonnect database
    $conn = null;
?>