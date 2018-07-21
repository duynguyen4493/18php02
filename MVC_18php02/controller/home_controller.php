<?php
	include 'model/user_model.php';
	
	class homeController
	{
		
		function handleRequest()
		{
			$action = isset($_GET['action']) ? $_GET['action'] : 'login';
			switch ($action) {
				case 'home':
					include 'views/listProduct.php';
					break;
				
				case 'login':
					include 'views/login.php';
					if (isset($_POST['submit_login'])) {
						$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
						$pass_word = isset($_POST['pass_word']) ? $_POST['pass_word'] : '';
						$login = new userModel;
						if ($login->login($user_name, $pass_word)) {
							if ($login->checkAdmin($user_name, $pass_word) == 0) {
								$path = 'index.php?action=home';
								redirect($path);
							} else {
								$path = 'admin.php';
								redirect($path);
							}
						} else echo 'Đăng nhập không thành công';
					}
					break;

				case 'register':
					include 'views/register.php';
					if (isset($_POST['register'])) {
						$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
						$pass = isset($_POST['pass_word']) ? $_POST['pass_word'] : '';
						$phone = isset($_POST['number_phone']) ? $_POST['number_phone'] : '';
						$email = isset($_POST['email']) ? $_POST['email'] : '';
						$register = new userModel;
						if ($register->register($user_name, $pass, $email, $phone)) {
							$path = 'index.php?action=login';
							redirect($path);
						}
					}
					break;

				case 'logout':
					include 'views/listProduct.php';
					break;
			}
		}
	}
	
	function redirect($a) {
		header('Location: ' . $a);
	}
	
?>
