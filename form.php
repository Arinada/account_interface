<?php

function renderForm($userInf) {
	echo '<!DOCTYPE html><head><meta charset="utf-8"><title>Главная страница</title></head>';
	echo '<body> <form action="controller.php">';  
	echo '<input type="hidden"  name="id" value="'.$userInf['id'].'">';
	echo '<p>Имя: <input value="'.$userInf['first_name'].'" maxlength="25" size="40" name="first_name"></p>';
	echo '<p>Фамилия: <input value="'.$userInf['last_name'].'" maxlength="25" size="40" name="last_name"></p>';
	echo '<p>Электронная почта: <input value="'.$userInf['email'].'" type="email" maxlength="25" size="40" name="email"></p>';
	echo '<p>Название компании: <input value="'.$userInf['company_name'].'" maxlength="25" size="60" name="company_name"></p>';
	echo '<p>Должность: <input value="'.$userInf['position'].'" maxlength="25" size="60" name="position"></p>';
	echo '<p>Номер телефона в формате 7-xxx-xxx-xx-xx: <input value="'.$userInf['phone1'].'" type="tel" pattern="7-[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" maxlength="25" size="20" name="phone1"></p>';
	echo '<p>Номер телефона: <input value="'.$userInf['phone2'].'" type="tel" maxlength="25" size="20" name="phone2"></p>';
	echo '<p>Номер телефона: <input value="'.$userInf['phone3'].'" type="tel" maxlength="25" size="20" name="phone3"></p>';
}

?>