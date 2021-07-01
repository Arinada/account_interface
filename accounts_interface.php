<?php

require_once 'database.php';

class AccountsInterface { 
	private $db;

	function __construct() {
	  
      $this->db = new DataBase();
    }

	public function createAccount($first_name, $last_name, $email, $company_name, $position, $phone1, $phone2, $phone3){
		$bd->addUserInf($first_name, $last_name, $email, $company_name, $position, $phone1, $phone2, $phone3);
		unset($bd);
	}

	//public function deleteAccount();
	
//	public function updateAccount();
	
	public function showAccountsList(){
		$emails = $this->db->getEmailsList();
		//pagination
		echo '<table border="1">';
		foreach($emails as $id => $email) {
			echo '<tr>';
			echo '<td><a href="update_account_page.php?id='.$id.'">'.$email.'</href></td>';
			echo '</tr>';
		}
		echo '</tr>';
		echo '</table>';
	}
}

?>