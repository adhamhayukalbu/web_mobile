<?php
    header("Access-Control-Allow-Origin: *");
	class OpenAcademyConnection{	
		public $host = 'localhost';
		public $user = 'root';
		public $pass = '';
		public $dbname = 'dapoer_development_db';
		public $conn;
		public $error;
 
		public function connect(){
			$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
			if(!$this->conn){
				$this->error = "Fatal Error: Can't connect to database" . $this->connect->connect_error();
				return false;
			}
		}
	}	
?>