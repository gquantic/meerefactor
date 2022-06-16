<?php
	/*
	*** Обработчик изменения пароля
	*/

	//Подключение всех библиотек 
	require_once "../../libs/db.php";

	$db = new Db(1, 1);

	$title = $_POST['title'];
	$text = $_POST['text'];
	$category = $_POST['category'];
	$foruser = $_POST['foruser'];
	$bgcolor = $_POST['bgcolor'];

	$query = $db->query("INSERT INTO `notifications` (`foruser`, `lvl`, `category`, `title`, `text`) VALUES ('$foruser', '$bgcolor', '$category','$title', '$text')");

	if(!empty($query)){
		echo "success";
	}else{
		echo "error";
	}
?>