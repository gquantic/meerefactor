<?
	/*
	*** Обработчик изменения пароля
	*/

	//Подключение всех библиотек 
	require_once "/libs/contrDb.php/Db.php";
	$_Db = new Db(1, 1);

	session_start();

	$userData = \Libs\Controllers\Db::userSelect();

	$pass = md5($_POST['pass']);
	$userId = $userData['id'];

	// Get input values
	$name = strip_tags($_POST['name']);
	$telegram = trim(strip_tags($_POST['telegram']));
	$about = trim(strip_tags($_POST['about']));


	// Notifications get
	#if($_POST['view'] == 'other_view') $view = 1; else $view = 0;
	#if($_POST['notifications'] == 'notification') $notifications = 1; else $notifications = 0;
	#if($_POST['senler'] == 'senler') $senler = 1; else $senler = 0;

	$view = $_POST['view'];
	$notifications = $_POST['notifications'];
	$senler = $_POST['senler'];

	if($userData['password'] == $pass){
		$set = \Libs\Controllers\Db::query("UPDATE `users` SET `name`='$name', `telegram`='$telegram', `about_yourself`='$about', `other_view`='$view', `notifications`='$notifications', `senler`='$senler' WHERE `id`='$userId'");

		if(!empty($set)) echo "success";
		else echo "error__except";
	}else{
		echo "error__oldpass";
	}