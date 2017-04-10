<?php
$MySql = new Sql ( "michiboe.mysql.db.hostpoint.ch", "michiboe_modul", "communismwillprevail18121878", "michiboe_modul133" );
class Sql {
	public $servername = "";
	public $username = "";
	public $password = "";
	public $database = "";
	public $connection = "";
	
	// Open connection and safe it into connection variable
	public function __construct($server, $usern, $pass, $db) {
		$this->connection = new mysqli ( $server, $usern, $pass, $db );
		$this->servername = $server;
		$this->password = $pass;
		$this->username = $usern;
		$this->database = $db;
	}
	public function register($username, $password, $mail) {
		// safe parameters into array for later use
		$escapeString = [ 
				$username,
				$password,
				$mail 
		];
		// Hand over user input into escape function [Line: ]
		$data = $this->escapeString ( $escapeString );
		// Use escaped user input to check if the entered input matches any entry in the database
		$occupied = $this->connection->query ( "SELECT userid FROM users WHERE username = '" . $data [0] . "' AND email='" . $data [2] . "';" );
		if ($occupied->num_rows > 0) {
			$this->setSession ( "ERROR", "The username or email adress is already taken" );
		} else {
			$succ = $this->connection->query ( "INSERT INTO users(username, passwordhash, email) VALUES ('" . $data [0] . "', '" . $data [1] . "', '" . $data [2] . "')" );
		}
		if ($succ) {
			echo "yo";
		} else {
			echo "no";
		}
	}
	
	// User login form: index.php
	public function login($username, $password) {
		// safe parameters into array for later use
		$escapeString = [ 
				$username,
				$password 
		];
		// Hand over user input into escape function
		$data = $this->escapeString ( $escapeString );
		// Use escaped user input to check if the entered input matches any entry in the database
		$result = $this->connection->query ( "SELECT userid FROM users WHERE username = '" . $data [0] . "' AND passwordhash = '" . md5 ( $data [1] ) . "';" );
		// If there where any matches the recieved user ID gets saved into the final variable
		if ($result->num_rows > 0) {
			$value = [ 
					"login",
					$result->fetch_assoc () ["userid"] 
			];
		} else {
			// If there where no matches at all the final variable gets set to 0
			$value = [ 
					"ERROR",
					"You entered an invalid password or the given user does not exist." 
			];
			;
		}
		// Hand the result over to the setSession function
		$this->setSession ( $value [0], $value [1] );
	}
	public function getMedia($type) {
		$result = $this->connection->query ( "SELECT * FROM `media` WHERE type='" . $type . "' AND fk_media_users = " . $_SESSION ['login'] . " ORDER BY mediaid;" );
		if ($result->num_rows > 0) {
			$result = $this->resultToArray ( $result );
			$result = json_encode ( $result );
		} else {
			// If there where no matches at all the final variable gets set to 0
			$result = 0;
		}
		return $result;
	}
	public function resultToArray($result) {
		$rows = array ();
		while ( $row = $result->fetch_assoc () ) {
			$rows [] = $row;
		}
		return $rows;
	}
	
	// Here all the sessions get set. (YET)
	private function setSession($session, $value) {
		$_SESSION [$session] = $value;
	}
	
	// Function for escaping user input
	private function escapeString($toBeEscaped) {
		// Use the array we created earlyer to iterate through variable ammounts of user input
		foreach ( $toBeEscaped as $escape ) {
			$escape = $this->connection->real_escape_string ( $escape );
		}
		// Hand escaped input back to the function
		return $toBeEscaped;
	}
	
	// Function that checks the connection to the database. If there where no Issues found it returns true.
	// Error messages get thrown into $_SESSION["ERROR"]
	public function connectionCheck() {
		$var = true;
		// check if there where any errors recordet
		if ($this->connection->connect_error) {
			// set the return value to false
			$var = false;
			// set the ERROR session to the error.
			$this->setSession ( "ERROR", $this->connection->connect_error );
		}
		// return if there where any errors
		return $var;
	}
	
	// redirect function
	public function redirectUser($url) {
		header ( "Location: " . $url );
	}
	
	// close connection
	private function connectionClose() {
		$connection->close ();
	}
}
?>