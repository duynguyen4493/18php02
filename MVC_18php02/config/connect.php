<?php
	class connectDB
	{
		private $server = 'localhost';
		private $userName = 'root';
		private $passWord = '';
		private $dataName = '18php02';

		function __construct()
		{
			$this->connectDB();
		}

		function connectDB() {
			$conn = new mysqli($this->server, $this->userName, $this->passWord, $this->dataName);
			if ($conn->connect_error) {
				die ('Connection failed: ' . $conn->connect_error);
			};
			mysqli_set_charset($conn, 'utf8');
			return $conn;
		}
	}

?>