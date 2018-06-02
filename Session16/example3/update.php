<?php
	session_start();

	$name = isset($_GET["name"]) ? $_GET["name"] : "";
	$mail = isset($_GET["mail"]) ? $_GET["mail"] : "";
	$pass = isset($_GET["pass"]) ? $_GET["pass"] : "";
	if ($pass) {
		$mdPass = md5($pass);
	} else $mdPass = "";
	$phone = isset($_GET["phone"]) ? $_GET["phone"] : "";
	function upDate($a, $b, $c) {
		if ($b) {
			return str_replace($a, $b, $c);
		}
	};
	if (!is_dir("file")) {
		mkdir("file");
	}
	$filename = "file/user.txt";
	$fp = @fopen($filename, "a+");
	if (!$fp) {
		echo 'Mở file không thành công';
	}
	else {
		$line = file($filename);
		for ($i =0; $i < count($line); $i++) {
		    $array = explode("-", $line[$i]);
			if ($_SESSION['loadMail'] == trim($array[1]) && $_SESSION['loadPass'] == trim($array[2])) {
				if ($name) {
					$line[$i] = str_replace(trim($array[0]), trim($name), $line[$i]);
				}
				if ($mail) {
					$line[$i] = str_replace(trim($array[1]), trim($mail), $line[$i]);
				}
				if ($mdPass) {
					$line[$i] = str_replace(trim($array[2]), trim($mdPass), $line[$i]);
				}
				if ($phone) {
					$line[$i] = str_replace(trim($array[3]), trim($phone), $line[$i]);
				}
				echo "Bạn đã cập nhật thông tin thành công";
				// $line[$i] = upDate(trim($array[0]), trim($name), $line[$i]);
				// $line[$i] = upDate(trim($array[1]), trim($mail), $line[$i]);
				// $line[$i] = upDate(trim($array[2]), trim($mdPass), $line[$i]);
				// $line[$i] = upDate(trim($array[3]), trim($phone), $line[$i]);
				break;
			}
		}
		file_put_contents($filename, $line);
		fclose($fp);
		unset($_SESSION['loadMail']); unset($_SESSION['loadPass']);
	}
?>