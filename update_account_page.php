<?php
	require_once 'database.php';
	require_once 'form.php';
	
	$id = $_GET['id'];
	$db = new DataBase();
	$userInf = $db->getUserInf($id);
	renderForm($userInf);
	echo '</br><input class="button" name="update" type="submit" value=" Изменить аккаунт ">';
	echo '<link rel="stylesheet" href="css/styles.css" type="text/css" />';
	echo '</br><input class="button" name="delete" type="submit" value=" Удалить аккаунт "></form></body></html>';
	
?>