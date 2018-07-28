<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="">
	<style>
	header {
		background-color: #ff5722;
	}
		.logo a img {
			width: 100%;
		}
		.navbar {
			background-color: transparent !important;
		}
	</style>
</head>
<body>
	<div class="wraper">
		<header>
			<?php include 'views/user/header.php'; ?>
		</header>
		
		<main>
			 <?php
			 	include 'controller/home_controller.php';
			 	$home = new homeController;
			 	$home->handleRequest();
			 ?>
		</main>
	</div>
</body>
</html>