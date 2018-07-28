<?php
	require_once './config/connect.php';
	/**
	 * 
	 */
	class userModel extends connectDB
	{

		function login($a, $b)
		{
			$sql = "SELECT * FROM users WHERE name = '".$a ."' AND pass = '".$b."'";
			$query = $this->conn->query($sql);
			if ($query->num_rows > 0) {
				return true;
			} else return false;
		}

		function checkAdmin($a, $b) {
			$sql = "SELECT * FROM users WHERE name = '".$a ."' AND pass = '".$b."'";
			$query = $this->conn->query($sql);
			if ($query->num_rows > 0) {
				$result = $query->fetch_assoc();
				return $result['role'];
			}
		}

		function register($a, $b, $c, $d) {
			$sql = "INSERT INTO users (name, pass, phone, email) VALUES ('".$a."', '".$b."', '".$c."', '".$d."')";
			$query = $this->conn->query($sql);
			if ($query) {
				return true;
			} else return false;
		}

		// user (admin)
		function getUser() {
			$sql = "SELECT * FROM users";
			$query = $this->conn->query($sql);
			if ($query->num_rows > 0) {
				return $query;
			} else return 'Database Empty';
		}
		function getUserId($a) {
			$sql = "SELECT * FROM users WHERE id = '".$a."'";
			$query = $this->conn->query($sql);
			if ($query->num_rows > 0) {
				return $query;
			} else return 'Database Empty';
		}
		function editUser($a, $b, $c, $d, $e, $f) {
			$sql = "UPDATE users SET name = '".$a."', pass = '".$b."', phone = '".$c."', email = '".$d."', role = '".$e."' WHERE id = '".$f."'";
			$query = $this->conn->query($sql);
			if ($query) {
				return true;
			} else return flase;
		}
		function deleteUser($a) {
			$sql = "DELETE FROM users WHERE id = '".$a."'";
			$query = $this->conn->query($sql);
			if ($query) {
				return true;
			} else return false;
		}
		function addUser($a, $b, $c, $d, $e) {
			$sql = "INSERT INTO users (name, pass, phone, email, role) VALUES ('".$a."', '".$b."', '".$c."', '".$d."', '".$e."')";
			$query = $this->conn->query($sql);
			if ($query) {
				return true;
			} else return false;
		}

	}


?>