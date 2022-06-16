<?
	/*
	*** Обработчик добавления conversii
	*/

	//Подключение всех библиотек 
	require_once "../../libs/db.php";
	$db = new Db(1, 1);

	session_start();

	#$userData = $db->userSelect();
	#$userId = $userData['id'];

	if($_SESSION['type'] != 'admin'): 
		header("Location: /");
		exit();
	endif;

	$id = $_POST['id'];
	$price = $_POST['price'];
	$pa = $_POST['pa'];
	$status = $_POST['status'];

	$db->query("UPDATE `conversions` SET `price`='$price', `pa`='$pa', `status`='$status' WHERE `id`='$id'");

	echo "ОК";