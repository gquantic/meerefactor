<?
	/*
	*** Обработчик изменения пароля
	*/

	//Подключение всех библиотек 
	require_once "/libs/contrDb.php/Db.php";
	$_Db = new Db(1, 1);

	session_start();

	$userData = $_Db->userSelect();

	$userId = $userData['id'];

	$yandexMoney = trim(strip_tags($_POST['yandex']));
	$webmoney = trim(strip_tags($_POST['webmoney']));

	if($userData['password'] == md5($_POST['pass'])){
		$set = $_Db->query("UPDATE `users` SET `ymoney`='$yandexMoney', `webmoney`='$webmoney'  WHERE `id`='$userId'");

		if(!empty($set)) echo "success";
		else echo "error__except";
	}else{
		echo "error__oldpass";
	}