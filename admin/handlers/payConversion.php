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
	$op = $_POST['op'];
	$price = $_POST['price'];

	$offer['leadPrice'] = $price;	

	$conversion = mysqli_fetch_assoc($db->query("SELECT * FROM `conversions` WHERE `id`='$id'"));
	$webid = $conversion['webmaster_id'];


	$user = mysqli_fetch_assoc($db->query("SELECT * FROM `users` WHERE `id`='$webid'"));
		// Вытаскиваем ID рефералов
	$r1 = mysqli_fetch_assoc($db->query("SELECT * FROM `users` WHERE `id`='".$user['referal']."'")); /* 1 lvl Referal */
	$r2 = mysqli_fetch_assoc($db->query("SELECT * FROM `users` WHERE `id`='".$r1['referal']."'")); /* 2 lvl Referal */




	// Функция для вычисления заработка
	function calcP($array, $percent, $sum, $type){
	    if($type == 'pay') return $array + ($percent * ($sum / 100));
	    if($type == 'rej') return $array - ($percent * ($sum / 100));
	}

	function calcB($array, $sum, $type){
	    if($type == 'pay') return $array + $sum;
	    if($type == 'rej') return $array - $sum;
	}

	$partner = mysqli_fetch_assoc($db->query("SELECT * FROM `users` WHERE `id`='1'"));


	if($op == "pay"){
		// Начисление будет проходить по порядку 3-2-1
		$db->query("UPDATE `users` SET `balance`='".calcB($user['balance'], $offer['leadPrice'], 'pay')."', `hold`='".calcB($user['hold'], $offer['leadPrice'], 'rej')."' WHERE `id`='".$user['id']."'");

		if(!empty($r1)) $db->query("UPDATE `users` SET `balance`='".calcP($r1['referal_balance'], 20, $offer['leadPrice'], 'pay')."', `referal_hold`='".calcP($r1['referal_hold'], 20, $offer['leadPrice'], 'rej')."' WHERE `id`='".$r1['id']."'");

		if(!empty($r2)) $db->query("UPDATE `users` SET `balance`='".calcP($r2['referal_balance'], 10, $offer['leadPrice'], 'pay')."', `referal_hold`='".calcP($r2['referal_hold'], 10, $offer['leadPrice'], 'rej')."' WHERE `id`='".$r2['id']."'");
	}elseif($op == "rej"){
		// Начисление будет проходить по порядку 3-2-1
		$db->query("UPDATE `users` SET `hold`='".calcB($user['hold'], $offer['leadPrice'], 'rej')."' WHERE `id`='".$user['id']."'");

		if(!empty($r1)) $db->query("UPDATE `users` SET `referal_hold`='".calcP($r1['referal_hold'], 20, $offer['leadPrice'], 'rej')."' WHERE `id`='".$r1['id']."'");

		if(!empty($r2)) $db->query("UPDATE `users` SET `referal_hold`='".calcP($r2['referal_hold'], 10, $offer['leadPrice'], 'rej')."' WHERE `id`='".$r2['id']."'");
	}elseif($op == "hold"){
		// Начисление будет проходить по порядку 3-2-1
		$db->query("UPDATE `users` SET `hold`='".calcB($user['hold'], $offer['leadPrice'], 'pay')."' WHERE `id`='".$user['id']."'");

		if(!empty($r1)) $db->query("UPDATE `users` SET `referal_hold`='".calcP($r1['referal_hold'], 20, $offer['leadPrice'], 'pay')."' WHERE `id`='".$r1['id']."'");

		if(!empty($r2)) $db->query("UPDATE `users` SET `referal_hold`='".calcP($r2['referal_hold'], 10, $offer['leadPrice'], 'pay')."' WHERE `id`='".$r2['id']."'");
	}

	echo $op." ОК";