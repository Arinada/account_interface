<?php

class DataBase{

	private $connection;
	private $servername = 'localhost';
	private	$database = 'clients';
	private	$username = 'root';
	private	$password = '';
	
	function __construct() {
      $this->openConnection();
    }
   
    function __destruct() {
       $this->closeConnection;
    }

	private function openConnection(){
		$this->connection = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
		if (!$this->connection) {
			die("Connection failed: " . mysqli_connect_error());
		}
	}	

	private function closeConnection(){
		mysqli_close($this->connection);
	}	
	
	public function addUserInf($first_name, $last_name, $email, $company_name, $position, $phone1, $phone2, $phone3){
		
		if(!isset($company_name))
			$company_name = ' ';
		
		if(!isset($position))
			$position = ' ';
		
		$statement1 = $this->connection->prepare('INSERT INTO users(first_name, last_name, email, company_name, position) VALUES(?, ?, ?, ?, ?)'); 
		$statement1->bind_param("sssss", $first_name, $last_name, $email, $company_name, $position);
		$statement1->execute();
		
		$user_id = $this->connection->insert_id;   
		$statement2 = $this->connection->prepare('INSERT INTO phone_numbers(user_id, phone_number) VALUES(?, ?)');
	

		if(isset($phone1)) 
		{
			$phone = $phone1;
			echo $phone;
			$statement2->bind_param("is", $user_id, $phone);
			$statement2->execute();
		}
		
		if(isset($phone2))
		{
			$phone = $phone2;
			//echo $phone;
			//echo $statement2->bind_param("is", $user_id, $phone);
			$statement2->execute();
		}
		
		if(isset($phone3))
		{
			$phone = $phone3;
			//echo $phone;
			//$statement2->bind_param("is", $user_id, $phone);
			$statement2->execute();
		}
	}
	
	
	
	
}

?>