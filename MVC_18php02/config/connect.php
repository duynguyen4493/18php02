<?php
	class connectDB
	{
		private $server = 'localhost';
		private $userName = 'root';
		private $passWord = '';
		private $dataName = '18php02';

		var $conn;
		
		function __construct()
		{
			$this->connectDB();
		}

		function connectDB() {
			$this->conn = new mysqli($this->server, $this->userName, $this->passWord, $this->dataName);
			if ($this->conn->connect_error) {
				die ('Connection failed: ' . $conn->connect_error);
			};
			mysqli_set_charset($this->conn, 'utf8');
			return $this->conn;
		}
	}

?>