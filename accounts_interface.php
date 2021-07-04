<?php

require_once 'database.php';

class AccountsInterface { 
	private $db;

	function __construct() {
	  
      $this->db = new DataBase();
    }

	public function createAccount($first_name, $last_name, $email, $company_name, $position, $phone1, $phone2, $phone3){
		$this->db->addUserInf($first_name, $last_name, $email, $company_name, $position, $phone1, $phone2, $phone3);
		header('Location: main_page.php');
		exit;
		unset($this->db);
	}

	public function deleteAccount($id){
		$this->db->deleteUserInf($id);
		header('Location: main_page.php');
		exit;
		unset($this->db);
	}
	
	public function updateAccount($userInf){
		$this->db->updateUserInf($userInf);
		header('Location: main_page.php');
		exit;
		unset($this->db);
	}
	
	public function showAccountsList(){	
		require_once 'accounts_list.php';
	}
	
}

?>