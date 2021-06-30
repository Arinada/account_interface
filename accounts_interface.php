<?php

class AccountsInterface { 

	public function createAccount($first_name, $last_name, $email, $company_name, $position, $phone1, $phone2, $phone3){
		require_once 'database.php';
		$bd = new DataBase();
		$bd->addUserInf($first_name, $last_name, $email, $company_name, $position, $phone1, $phone2, $phone3);
		unset($bd);
	}

	//public function deleteAccount();
	
//	public function updateAccount();
	
	//public function getAccountsList();
}

?>