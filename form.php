<?php

function renderForm($userInf) {
	echo '<!DOCTYPE html><head><meta charset="utf-8"><title>Главная страница</title></head>';
	echo '<body> <form action="controller.php">';  
	echo '<input type="hidden"  name="id" value="'.$userInf['id'].'">';
	echo '<p>Имя:</p> <input value="'.$userInf['first_name'].'" maxlength="25" name="first_name">';
	echo '<p>Фамилия:</p> <input value="'.$userInf['last_name'].'" maxlength="25" name="last_name">';
	echo '<p>Электронная почта:</p> <input value="'.$userInf['email'].'" type="email" maxlength="25" name="email">';
	echo '<p>Название компании:</p> <input value="'.$userInf['company_name'].'" maxlength="25" name="company_name">';
	echo '<p>Должность:</p> <input value="'.$userInf['position'].'" maxlength="25" name="position">';
	echo '<p>Номер телефона: </p><input value="'.$userInf['phone1'].'" type="tel" " maxlength="25" name="phone1">';
	echo '<p>Номер телефона: </p><input value="'.$userInf['phone2'].'" type="tel" maxlength="25" name="phone2">';
	echo '<p>Номер телефона: </p><input value="'.$userInf['phone3'].'" type="tel" maxlength="25" name="phone3">';
}

?>