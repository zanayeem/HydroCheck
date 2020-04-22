<?php  
	namespace Apps\Libs\Database;
	use mysqli;


	abstract class Database {

		// Server information 		
		private $host = 'localhost';
		private $user = 'root';
		private $pass = '';
		private $db = 'hydrocheck';
		


		// Connection setup 
		protected function connection(){
			return new mysqli($this -> host, $this -> user, $this -> pass, $this -> db);
		}


	}








?>