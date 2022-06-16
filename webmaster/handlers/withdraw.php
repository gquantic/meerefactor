<?
	/*
	*** Обработчик изменения пароля
	*/
	//Подключение всех библиотек 
	require_once "../../libs/db.php";
	$_Db = new Db(1, 1);

	session_start();

	$userData = $_Db->userSelect();

	if($userData['width_balance'] < 300){
		echo "error_nomoney";
	}elseif($userData['width_balance'] >= 300){
		echo "success";
	}