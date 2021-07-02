<?php
	require_once 'database.php';
	require_once 'form.php';
	
	$id = $_GET['id'];
	$db = new DataBase();
	$userInf = $db->getUserInf($id);
	renderForm($userInf);
	echo '<p><input name="update" type="submit" value=" Изменить аккаунт ">';
	echo '<p><input name="delete" type="submit" value=" Удалить аккаунт "></p></form></body></html>';
	
?>