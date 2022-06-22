<?php
	/*
	*** Обработчик изменения пароля
	*/

	//Подключение всех библиотек 
	require_once "/libs/contrDb.php/Db.php";
	$db = new Db(1, 1);

	$id   = $_POST['id'];
	$name = $_POST['name'];
	$desc = $_POST['desc'];

	$query = $db->query("UPDATE `faq` SET `title`='$name',`text`='$desc' WHERE `id`='$id'");

	if(!empty($query)){
		echo "success";
	}else{
		echo "error";
	}
?>