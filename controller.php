<?php

require_once 'accounts_interface.php';

$id =$_GET['id'];
$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$email = $_GET['email'];
$company_name = $_GET['company_name'];
$position = $_GET['position'];
$phone1 = $_GET['phone1'];
$phone2 = $_GET['phone2'];
$phone3 = $_GET['phone3'];

$acc_interface = new AccountsInterface();

if (isset($_GET['accounts_list']))
{
	$acc_interface->showAccountsList($_GET['page']);
}
else if (isset($_GET['update']) && (isset($first_name) && !(empty($first_name)) && isset($last_name) && !(empty($last_name)) && isset($email) && !(empty($email))))
{
	$userInf;
	$userInf['id'] = $id;
	$userInf['last_name'] = $last_name;
	$userInf['first_name'] = $first_name;
	$userInf['email'] = $email;
	$userInf['company_name'] = $company_name;
	$userInf['position'] = $position;
	$userInf['phone1'] = $phone1;
	$userInf['phone2'] = $phone2;
	$userInf['phone3'] = $phone3;
	$acc_interface->updateAccount($userInf);
}
else if (isset($_GET['delete']))
{
	$acc_interface->deleteAccount($id);
}
else if(isset($first_name) && !(empty($first_name)) && isset($last_name) && !(empty($last_name)) && isset($email) && !(empty($email)))
{
	$acc_interface->createAccount($first_name, $last_name, $email, $company_name, $position, $phone1, $phone2, $phone3);
}
else
{
	$message = "Заполните все обязательные поля: Имя, Фамилия, Эл.почта";
	echo "<script type='text/javascript'>alert('$message');</script>";
}

?>