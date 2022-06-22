<?
	/*
	*** Обработчик изменения пароля
	*/

	//Подключение всех библиотек 
	require_once "/libs/contrDb.php/Db.php";
	$_Db = new Db(1, 1);

	session_start();

	$userData = \Libs\Controllers\Db::userSelect();

	$new = md5($_POST['new']);
	$userId = $userData['id'];

	if($userData['password'] == md5($_POST['old'])){
		$set = \Libs\Controllers\Db::query("UPDATE `users` SET `password`='$new' WHERE `id`='$userId'");

		if(!empty($set)) echo "success";
		else echo "error__except";
	}else{
		echo "error__oldpass";
	}