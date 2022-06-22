<?php
	/*
	*** Обработчик бана
	*/

	//Подключение всех библиотек 
	require_once "/libs/contrDb.php/Db.php";
	$db = new Db(1, 1);

	session_start();

	if($_SESSION['type'] != 'admin'): 
		header("Location: /webmaster/");
		exit();
	endif;

	$type = $_POST['type'];
	$id = $_POST['user_id'];
	#var_dump($_POST);


	if($type == "block"){
		$comment = $_POST['comment'];

		$query = $db->query("UPDATE `users` SET `blocked`='1', `block_comment`='$comment' WHERE `id`='$id'");
	}else{
		$query = $db->query("UPDATE `users` SET `blocked`='0', `block_comment`='' WHERE `id`='$id'");
	}

	if(!empty($query)) echo "Успешно";
	else echo "Ошибка";
?>