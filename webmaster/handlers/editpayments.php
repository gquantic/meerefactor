<?
	/*
	*** Обработчик изменения пароля
	*/

	//Подключение всех библиотек 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

	$userData = \Libs\Controllers\Db::userSelect();

	$userId = $userData['id'];

	$yandexMoney = trim(strip_tags($_POST['yandex']));
	$webmoney = trim(strip_tags($_POST['webmoney']));
	$card = trim(strip_tags($_POST['card']));
	$qiwi = trim(strip_tags($_POST['qiwi']));

	if($userData['password'] == md5($_POST['pass'])){
		$set = \Libs\Controllers\Db::query("UPDATE `users` SET `ymoney`='$yandexMoney', `webmoney`='$webmoney', `bcard`='$card', `qiwi`='$qiwi' WHERE `id`='$userId'");

		if(!empty($set)) echo "success";
		else echo "error__except";
	}else{
		echo "error__oldpass";
	}