<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = isset($_POST["name"]) ? $_POST["name"] : "";
		$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
		$phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
	}

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbh = "18php02";
	//tạo và kiểm tra kết nối
	$conn = new mysqli($servername, $username, $password, $dbh);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	//check form và ghi dữ liệu vào database
	if ($name == NULL or $mail == NULL or $phone == NULL) {
		echo 'Hãy nhập đầy đủ thông tin';
	} else {
		$sel = "SELECT * FROM users WHERE email = '".$mail."'";
		$result = $conn->query($sel);
		if ($result->num_rows > 0) {
			echo "Mời bạn sử dụng email khác";
		} else {
			$sql = "INSERT INTO users (name, email, phone) VALUES ('".$name."','".$mail."', '".$phone."')";
			if ($conn->query($sql) === true) {
				echo "Chúc mừng $name đã đăng kí thành công!";
			} else {
				echo "Error: ".$sql."</br>". $conn->error;
			}
		}
	}

	// $sql = ("INSERT INTO users (name, email, phone) VALUES (?,?,?)");
	// $stmt = $conn->prepare($sql);
	// $stmt->bind_param('sss', $name, $mail, $phone);
	// $stmt->execute();
	// $stmt->close();

	$conn->close();
?>