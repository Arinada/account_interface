<?php
	require_once 'database.php';
	
	// Текущая страница
	if (isset($_GET['page']))
		$current_page_number = $_GET['page'];		
	else 
		$current_page_number = 1;
	
	$rows_number_on_page = 2;  // количество записей для вывода
	$start_with = ($current_page_number * $rows_number_on_page) - $rows_number_on_page;
	//echo $start_with;

	// Определяем все количество записей в таблице
	$db = new DataBase();
	$all_rows_number = $db->getAllUsersNumber();
	//echo $all_rows_number;

	// Количество страниц для пагинации
	$all_pages_number = ceil($all_rows_number / $rows_number_on_page);
	//echo $all_pages_number;

	// Запрос и вывод записей
	$emails = $db->getEmailsList($start_with, $rows_number_on_page);
	echo '<table border="1">';
	foreach($emails as $id => $email) {
		echo '<tr>';
		echo '<td><a href="update_account_page.php?id='.$id.'">'.$email.'</href></td>';
		echo '</tr>';
	}
	echo '</tr>';
	echo '</table></br>';
	// формируем пагинацию
	for ($i = 1; $i <= $all_pages_number; $i++){
		echo "<a href=accounts_list.php?page=".$i."> ".$i." </a>";
	}
		
	unset($bd);
?>