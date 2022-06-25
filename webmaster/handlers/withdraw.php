<?
	/*
	*** Обработчик изменения пароля
	*/
	//Подключение всех библиотек 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

	$userData = \Libs\Controllers\Db::userSelect();

	if($userData['width_balance'] < 300){
		echo "error_nomoney";
	}elseif($userData['width_balance'] >= 300){
		echo "success";
	}