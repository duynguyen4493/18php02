<?php
	require_once 'config/connect.php';
	/**
	 * 
	 */
	class userModel extends connectDB
	{

		function login($a, $b)
		{
			$sql = "SELECT * FROM users WHERE name = '".$a ."' AND pass = '".$b."'";
			$query = $this->connectDB()->query($sql);
			if ($query->num_rows > 0) {
				return true;
			} else return false;
		}

		function checkAdmin($a, $b) {
			$sql = "SELECT * FROM users WHERE name = '".$a ."' AND pass = '".$b."'";
			$query = $this->connectDB()->query($sql);
			if ($query->num_rows > 0) {
				$result = $query->fetch_assoc();
				return $result['role'];
			}
		}

		function register($a, $b, $c, $d) {
			$sql = "INSERT INTO users (name, pass, phone, email) VALUES ('".$a."', '".$b."', '".$c."', '".$d."')";
			$query = $this->connectDB()->query($sql);
			if ($query) {
				return true;
			} else return false;
		}
	}


?>