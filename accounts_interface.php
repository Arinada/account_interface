<?php

require_once 'database.php';
require_once 'accounts_list.php';

class AccountsInterface { 
	private $db;

	function __construct() {
      $this->db = new DataBase();
    }

	public function createAccount($first_name, $last_name, $email, $company_name, $position, $phone1, $phone2, $phone3){
		$this->db->addUserInf($first_name, $last_name, $email, $company_name, $position, $phone1, $phone2, $phone3);
		$this->turnToMainPage();
	}

	public function deleteAccount($id){
		$this->db->deleteUserInf($id);
		$this->turnToMainPage();
	}
	
	public function updateAccount($userInf){
		$this->db->updateUserInf($userInf);
		$this->turnToMainPage();
	}
	
	public function showAccountsList($page_number){	
		formAccountsList($page_number);
	}
	
	private function turnToMainPage(){
		header('Location: main_page.php');
		exit;
		unset($this->db);
	}
	
}

?>