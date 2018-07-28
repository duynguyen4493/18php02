<?php
	include './model/user_model.php';
	include './model/product_model.php';
	
	class homeController
	{
		
		function handleRequest()
		{
			$action = isset($_GET['action']) ? $_GET['action'] : 'login';
			switch ($action) {
				case 'home':
					$getProduct = new ProductModel;
					$data = $getProduct->getProduct();
					include 'views/user/list_product.php';
					break;
				
				case 'login':
					include 'views/user/login.php';
					if (isset($_POST['submit_login'])) {
						$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
						$pass_word = isset($_POST['pass_word']) ? $_POST['pass_word'] : '';
						$login = new userModel;
						if ($login->login($user_name, $pass_word)) {
							// $_SESSION['name'] = $user_name;
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
					include 'views/user/register.php';
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
					include 'views/user/listProduct.php';
					break;
			}
		}

		function adminRequest() {
			$user = new userModel;
			$product = new ProductModel;
			$action = isset($_GET['action']) ? $_GET['action'] : 'list_user';
			switch ($action) {
				case 'list_user':
					$data = $user->getUser();
					include './views/admin/list_user.php';
					break;
				case 'edit_user':
					$getId = (int) $_GET['id'];
					$data = $user->getUserId($getId);
					if (isset($_POST['update_user'])) {
						$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
						$pass = isset($_POST['pass_word']) ? $_POST['pass_word'] : '';
						$phone = isset($_POST['number_phone']) ? $_POST['number_phone'] : '';
						$email = isset($_POST['email']) ? $_POST['email'] : '';
						$role = isset($_POST['role']) ? $_POST['role'] : '0';
						$update = $user->editUser($user_name, $pass, $phone, $email, $role, $getId);
						if ($update) {
							redirect('admin.php?action=list_user');
						} else $notify = 'Cập nhật không thành công';
					}
					include './views/admin/edit_user.php';
					break;
				case 'delete_user':
					$getId = (int) $_GET['id'];
					if ($user->deleteUser($getId)) redirect('admin.php?action=list_user');
					break;
				case 'add_user':
					if (isset($_POST['add_user'])) {
						$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
						$pass = isset($_POST['pass_word']) ? $_POST['pass_word'] : '';
						$phone = isset($_POST['number_phone']) ? $_POST['number_phone'] : '';
						$email = isset($_POST['email']) ? $_POST['email'] : '';
						$role = isset($_POST['role']) ? $_POST['role'] : '';
						$add = $user->addUser($user_name, $pass, $phone, $email, $role);
						if ($add) {
							redirect('admin.php?action=list_user');
						} else $notify = 'Thêm thành viên không thành công';
					}
					include './views/admin/add_user.php';
					break;

				case 'list_product':
                    $data = $product->getProduct();
                    include './views/admin/list_product.php';
					break;
				case 'add_product':
					$cate_result = $product->getCategory();
					include './views/admin/add_product.php';
					if (isset($_POST['add_product'])) {
						$name = isset($_POST['product_name']) ? $_POST['product_name'] : '';
						$cateId = isset($_POST['category_id']) ? $_POST['category_id'] : '';
						$price = isset($_POST['price']) ? $_POST['price'] : '';
						$image = $product->uploadImage();
						if ($image[1] == 1) {
							$imageName = $image[0];
							$getDay = (string) date('d-m-Y s:i:H');
							$add = $product->addProduct($cateId, $name, $price, $getDay, $imageName);
							if ($add) {
								echo 'them sp thanh cong';
							}
						}
					}
					break;

				case 'list_category':
					$data = $product->getCategory();
					include './views/admin/list_category.php';
					break;
				case 'edit_category':
					$getId = isset($_GET['id']) ? $_GET['id'] : '';
					$data = $product->getCategoryId($getId);
					$row = $data->fetch_assoc();
					if (isset($_POST['edit_category'])) {
						$name = isset($_POST['category_name']) ? $_POST['category_name'] : '';
						$edit = $product->editCategory($name, $getId);
						if ($edit) {
							redirect('admin.php?action=list_category');
						}
					}
					include './views/admin/edit_category.php';
					break;
				case 'delete_category':
					$getId = isset($_GET['id']) ? $_GET['id'] : '';
					$delete = $product->deleteCategory($getId);
					if ($delete) {
						redirect('admin.php?action=list_category');
					}
					break;
				case 'add_category':
					if (isset($_POST['add_category'])) {
						$name = isset($_POST['category_name']) ? $_POST['category_name'] : '';
						$result = $product->addCategory($name);
						if ($result) {
							// echo "them thanh cong";
							redirect('admin.php?action=list_category');
						}
						
					}
					include './views/admin/add_category.php';
					break;
			}
		}
	}
	function redirect($a) {
		header('Location: ' . $a);
		exit();
	}
?>