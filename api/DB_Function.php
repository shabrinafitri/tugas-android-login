<?php
	class DB_Functions {
 		
 		private $conn;
		
		function __construct() {
 
 			require_once 'DB_Connect.php';
			
			// Database Connection
			$db = new Db_Connect();
			$this->conn = $db->connect();
		}
 		
 		function __destruct() {

 		}
 	
 		public function simpanUser($nama, $email, $password) {
			 
			$uuid = uniqid('', true);
			$hash = $this->hashSSHA($password);
			$encrypted_password = $hash["encrypted"];
			$salt = $hash["salt"];
			$stmt = $this->conn->prepare("INSERT INTO user(unique_id, nama, email, encrypted_password, salt) VALUES(?, ?, ?, ?, ?)");
			$stmt->bind_param("sssss", $uuid, $nama, $email, $encrypted_password, $salt);
			$result = $stmt->execute();
			$stmt->close();

			// Checking
			if ($result) {
			 	$stmt = $this->conn->prepare("SELECT * FROM user WHERE email = ?");
				$stmt->bind_param("s", $email);
				$stmt->execute();
				$user = $stmt->get_result()->fetch_assoc();
				$stmt->close();
			 	
			 	return $user;
			} else {
				return false;
			}
		}

		public function getUserByEmailAndPassword($email, $password) {
			$stmt = $this->conn->prepare("SELECT * FROM user WHERE email = ?");
			$stmt->bind_param("s", $email);
 
			if ($stmt->execute()) {
				$user = $stmt->get_result()->fetch_assoc();
				$stmt->close();
				
				// User Password Verification
				$salt = $user['salt'];
				$encrypted_password = $user['encrypted_password'];
				$hash = $this->checkhashSSHA($salt, $password);
			 

				if ($encrypted_password == $hash) {
	 				return $user;
	 			}
			} else {
			
				return NULL;
			}
 		}

		public function isUserExisted($email) {
			$stmt = $this->conn->prepare("SELECT email from user WHERE email = ?");
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$stmt->store_result();
			
			if ($stmt->num_rows > 0) {
				// User Not Available
				$stmt->close();
			 	return true;
			} else {
			 	// User Available
				$stmt->close();
				return false;
			}
 		}

	 	public function hashSSHA($password) {
			$salt = sha1(rand());
			$salt = substr($salt, 0, 10);
			$encrypted = base64_encode(sha1($password . $salt, true) . $salt);
			$hash = array("salt" => $salt, "encrypted" => $encrypted);
				return $hash;
		}

 		public function checkhashSSHA($salt, $password) {
		 	$hash = base64_encode(sha1($password . $salt, true) . $salt);
			return $hash;
 		}
	}
?>
