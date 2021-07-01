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
		$statement2->bind_param("is", $user_id, $phone);
	

		if(isset($phone1)) 
		{
			$phone = $phone1;
			echo $phone;
			$statement2->execute();
		}
		
		if(isset($phone2))
		{
			$phone = $phone2;
			$statement2->execute();
		}
		
		if(isset($phone3))
		{
			$phone = $phone3;
			$statement2->execute();
		}
	}
	
	public function getEmailsList(){
		$emailsList;
		$query = 'SELECT id, email FROM users';
		$result = mysqli_query($this->connection, $query);
		if(!$result)
			die('upadting error: '. mysql_error());
		while($row = mysqli_fetch_assoc($result)) {
			$emailsList[$row['id']] = $row['email'];
		}
		return $emailsList;
	}
	
	public function getUserInf($id){
		$userInf;
		
		$query = 'SELECT * FROM users WHERE id='.$id;
		$result = mysqli_query($this->connection, $query);
		if(!$result)
			die('upadting error: '. mysql_error());
		$userInf = mysqli_fetch_assoc($result);
		
		$query = 'SELECT * FROM phone_numbers WHERE user_id='.$id;
		$result = mysqli_query($this->connection, $query);
		if(!$result)
			die('upadting error: '. mysql_error());
		$counter = 1;
		while($row = mysqli_fetch_assoc($result)) {
			$userInf['phone'.$counter] = $row['phone_number'];
			$counter++;
		}
		
		return $userInf;
	}
	
	public function updateUserInf($userInf){
		$query = 'UPDATE users SET first_name="'.$userInf['first_name'].'", last_name="'.$userInf['last_name'].'", email="'.$userInf['email'].'"'.;
		$company_name = $userInf['company_name'];
		$position = $userInf['position'];
		if(!empty($company_name))
			$query.', "'.$company_name.'"';
		if(!empty($position))
			$query.', "'.$position.'"';
		$query.' WHERE id='.$userInf['id'];
		
		$result = mysqli_query($this->connection, $query);
		if(!$result)
			die('upadting error: '. mysql_error());

		$phone1 = $userInf['phone1'];
		$phone2 = $userInf['phone2'];
		$phone3 = $userInf['phone3'];
		$user_id = $userInf['id'];

		if(!empty($phone1))
			$this->updatePhone($phone1, $user_id);
		if(!empty($phone2))
			$this->updatePhone($phone2, $user_id);
		if(!empty($phone3))
			$this->updatePhone($phone3, $user_id);
		
	}
	
	private function updatePhone($phone, $user_id){
		$query = 'UPDATE phone_numbers SET phone_number="'.$phone.'" WHERE user_id='.$id;
		$result = mysqli_query($this->connection, $query);
		if(!$result)
			die('upadting error: '. mysql_error());
	}
	
	public function deleteUserInf($id){
		$query = 'DELETE FROM users WHERE id='.$id;
		$result = mysqli_query($this->connection, $query);
		if(!$result)
			die('upadting error: '. mysql_error());
		//cascade deleting for phones 
	}
}

?>