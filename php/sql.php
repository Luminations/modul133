<?php
$MySql = new Sql('localhost', 'root', "", "modul133");
Class Sql{
	 public $servername = "";
	 public $username = "";
	 public $password = "";
	 public $database = "";
	 public $connection = "";
	
//Open connection and safe it into connection variable
	public function __construct($server, $usern, $pass, $db){
		$this->connection = new mysqli($server, $usern, $pass, $db);
		$this->servername = $server;
		$this->password = $pass;
		$this->username = $usern;
		$this->database = $db;
	}
	
//User login form: index.php
	public function login($username, $password){
//safe parameters into array for later use
		$escapeString = [$username, $password];
//Hand over user input into escape function [Line: ]
		$data = $this->escapeString($escapeString);
//Use escaped user input to check if the entered input matches any entry in the database
		$result = $this->connection->query("SELECT userid FROM users WHERE username = '" . $data[0] ."' AND passwordhash = '" . md5($data[1]) . "';");
//If there where any matches the recieved user ID gets saved into the final variable
		if($result->num_rows > 0){
			$value = ["login", $result->fetch_assoc()["userid"]];
		} else {
//If there where no matches at all the final variable gets set to 0
			$value = ["ERROR", md5(0)];;
		}
//Hand the result over to the setSession function [Line: ]
		$this->setSession($value[0], $value[1]);
	}
	
//Here all the sessions get set. (YET)
	private function setSession($session, $value){
		$_SESSION[$session] = $value;
	}

//Function for escaping user input	
	private function escapeString($toBeEscaped){
//Use the array we created earlyer to iterate through variable ammounts of user input
		foreach($toBeEscaped as $escape){
			$escape = $this->connection->real_escape_string($escape);
		}
//Hand escaped input back to the function
		return $toBeEscaped;
	}
	
//Function that checks the connection to the database. If there where no Issues found it returns true.
//Error messages get thrown into $_SESSION["ERROR"]
	public function connectionCheck (){
//No Issues
		$var = true;
		if($this->connection->connect_error){
			$var = false;
			$this->setSession("ERROR", $this->connection->connect_error);
		}
		return $var;
	}
	
	private function connectionClose(){
		$connection->close();
	}
}
?>