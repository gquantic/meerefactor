<?php
	/*
	*** Обработчик изменения пароля
	*/

	//Подключение всех библиотек 
	require_once "../../libs/db.php";

	$db = new Db(1, 1);

	$name = $_POST['name'];
	$desc = $_POST['desc'];

	$query = $db->query("INSERT INTO `faq` (`title`, `text`) VALUES ('$name', '$desc')");

	if(!empty($query)){
		echo "success";
	}else{
		echo "error";
	}
?>