<?
	/*
	*** Обработчик изменения пароля
	*/

	//Подключение всех библиотек 
	require_once "../../libs/db.php";
	$db = new Db(1, 1);

	session_start();

	$userData = $db->userSelect();

	$userId = $userData['id'];

	$sum = str_replace('+', '', $_POST['retsum']);
	$sum = str_replace('-', '', $sum);
	$rbl = $_POST['retbalance'];

	if($sum == 0){
		echo "sumnocorret";
		exit();
	}

	if($rbl == "referal"){
		if($userData['referal_balance'] >= $sum){
			$lastbalance = $userData['referal_balance'] - $sum;
			$widthbalance = $userData['width_balance'] + $sum;
			$db->query("UPDATE `users` SET `referal_balance`='$lastbalance', `width_balance`='$widthbalance' WHERE `id`='$userId'");

			echo "suc";
		}else echo "nomoney";
	}elseif($rbl == "main"){
		if($userData['balance'] >= $sum){
			$lastbalance = $userData['balance'] - $sum;
			$widthbalance = $userData['width_balance'] + $sum;
			$db->query("UPDATE `users` SET `width_balance`='$widthbalance', `balance`='$lastbalance' WHERE `id`='$userId'");

			echo "suc";
		}else echo "nomoney";
	}