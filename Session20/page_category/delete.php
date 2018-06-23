<?php
	session_start();
	require '../db/connect.php';
	$getId = (int) $_GET['id'];
	$sql = "UPDATE categories SET del = 1 WHERE categoryId = '".$getId."'";
    $result = $conn->query($sql);
    require '../db/disconnect.php';
    header('Location: ../listCategory.php');
?>