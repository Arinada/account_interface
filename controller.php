<?php

$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$email = $_GET['email'];
$company_name = $_GET['company_name'];
$position = $_GET['position'];
$phone1 = $_GET['phone1'];
$phone2 = $_GET['phone2'];
$phone3 = $_GET['phone3'];

if( isset($first_name) && !(empty($first_name)) && isset($last_name) && !(empty($last_name)) && isset($email) && !(empty($email)))
{
	require_once 'accounts_interface.php';
	$acc_interface = new AccountsInterface();
	$acc_interface->createAccount($first_name, $last_name, $email, $company_name, $position, $phone1, $phone2, $phone3);
}
else
{
	$message = "Заполните все обязательные поля: Имя, Фамилия, Эл.почта";
	echo "<script type='text/javascript'>alert('$message');</script>";
}

?>