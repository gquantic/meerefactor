<?
	/*
	*** Обработчик добавления conversii
	*/

	//Подключение всех библиотек 
	require_once "/libs/contrDb.php/Db.php";
	$db = new Db(1, 1);

	session_start();

	#$userData = $db->userSelect();
	#$userId = $userData['id'];

	if($_SESSION['type'] != 'admin'): 
		header("Location: /");
		exit();
	endif;

	$edit_id = $_POST['edit_id'];
	$edit_name = $_POST['edit_name'];
	$edit_email = $_POST['edit_email'];
	$edit_balance = $_POST['edit_balance'];
	$edit_hold = $_POST['edit_hold'];
	$edit_rbalance = $_POST['edit_rbalance'];
	$edit_rhold = $_POST['edit_rhold'];

	$db->query("UPDATE `users` SET `name`='$edit_name', `email`='$edit_email', `balance`='$edit_balance', `hold`='$edit_hold', `referal_balance`='$edit_rbalance', `referal_hold`='$edit_rhold' WHERE `id`='$edit_id'");

	echo "ОК";