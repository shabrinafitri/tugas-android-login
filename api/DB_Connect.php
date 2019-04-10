<?php
	
	class DB_Connect {
 	
 	private $conn;
	
	 	// Database Connection
	 	public function connect() {
	 		require_once 'config.php';

	 		// MySQL Database Connection
	 		$this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	 		
	 		// Return database handler
	 		return $this->conn;
	 	}
	}
?>
