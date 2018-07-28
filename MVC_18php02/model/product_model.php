<?php
	require_once './config/connect.php';
	/**
	 * 
	 */
	class ProductModel extends connectDB
	{
		// function for category


		function getCategoryId($a) {
			$a = (int) $a;
			$sql = "SELECT categoryName FROM categories WHERE categoryId = $a ";
            $result = $this->conn->query($sql);
            if ($result) {
				return $result;
			} else return false;
		}
		function getCategory() {
			$sql = "SELECT * FROM categories WHERE del = 0";
            $result = $this->conn->query($sql);
            if ($result) {
				return $result;
			} else return false;
		}
		function editCategory($a, $b) {
			$sql = "UPDATE categories SET categoryName = '".$a."' WHERE  categoryId = '".$b."'";
			$result =  $this->conn->query($sql);
			if ($result) {
				return true;
			} else return false;
		}
		function deleteCategory($a) {
			$sql = "UPDATE categories SET del = 1 WHERE categoryId = '".$a."'";
			$query = $this->conn->query($sql);
			if ($query) {
				return true;
			} else return false;
		}
		function addCategory($a) {
			$sql = "INSERT INTO categories (categoryName, del) VALUES ('".$a."', 0)";
			$query = $this->conn->query($sql);
			if ($query) {
				return true;
			} else return false;
		}

		function uploadImage() {
			$uploadOk = 1;
			$target_file;
	        if ($_FILES['image']['tmp_name'] != NULL) {
	            $target_file = "public/upload/" . basename($_FILES['image']['name']);
	            $imageFileTyppe = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	            $check = getimagesize($_FILES['image']['tmp_name']);
	            if (!$check) {
	                $uploadOk = 0;
	            }
	            if ($_FILES['image']['size'] > 500000) {
	                $uploadOk = 0;
	            }
	            if ($imageFileTyppe != 'jpg' and $imageFileTyppe != 'png' and $imageFileTyppe != 'jpeg' and $imageFileTyppe != 'gif' ) {
	                $uploadOk = 0;
	            }
	        } else {
	            $error = "Bạn chưa chọn hình ảnh";
	            $uploadOk = 0;
	        }
	        if ($uploadOk ==  1) {
	        	move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
	        }
	        return [$target_file, $uploadOk];
		}
		function addProduct($a, $b, $c, $d, $e) {
            $sql = "INSERT INTO products (categoryId, productName, Price, dayPost, imageName) VALUES ('".$a."', '".$b."', '".$c."', '".$d."', '".$e."')";
            $result = $this->conn->query($sql);
            if ($result) {
            	return true;
            } else return false;
		}

		function getData(){
			//code 
			$errorCode = 1;
			$message = 'connection failed';
			return [$errorCode,$message];
		}
		// function for product


		function getProduct() {
		    $sql = "SELECT * FROM products
		        INNER JOIN categories ON products.categoryId = categories.categoryId
		        WHERE del = 0";
		    $result = $this->conn->query($sql);
		    if ($result) {
		    	return $result;
		    } else return false;
		}
	}

?>