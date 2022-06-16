<?
	/*
	*** Обработчик добавления оффера
	*/

	//Подключение всех библиотек 
	require_once "../../libs/db.php";
	$db = new Db(1, 1);

	session_start();

	if($_SESSION['type'] != 'admin'): 
		header("Location: /webmaster/");
		exit();
	endif;

	#var_dump($_POST);echo "<br><br><br>";

	$transactid = $_POST['transactid'];
	$webid = $_POST['webid'];
	$offerid = $_POST['offerid'];
	$status = $_POST['status'];
	$leadPrice = $_POST['leadPrice'];

	// Вытаскиваем цену
	$offer = mysqli_fetch_assoc($db->query("SELECT * FROM `offers` WHERE `subid`='$offerid'"));
	#var_dump($offer); echo "<br><br><br>";

	// Если передан параметр цены лида, то записываем его
	if($leadPrice != '') $offer['leadPrice'] = $leadPrice;


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

	$db->query("INSERT INTO `conversions` (`transaction_id`, `webmaster_id`, `offer_id`, `status`, `price`) VALUES ('$transactid', '$webid', '".$offer['id']."', '$status', '$leadPrice')");


	if(isset($_POST['autobalance']) && $_POST['autobalance'] == 1){
		$user = mysqli_fetch_assoc($db->query("SELECT * FROM `users` WHERE `id`='$webid'"));
		// Вытаскиваем ID рефералов
		$r1 = mysqli_fetch_assoc($db->query("SELECT * FROM `users` WHERE `id`='".$user['referal']."'")); /* 1 lvl Referal */
		$r2 = mysqli_fetch_assoc($db->query("SELECT * FROM `users` WHERE `id`='".$r1['referal']."'")); /* 2 lvl Referal */

		var_dump($user); echo "<br><br><br>"; var_dump($r1); echo "<br><br><br>"; var_dump($r2);	

		// Начисление будет проходить по порядку 3-2-1
	    $db->query("UPDATE `users` SET `hold`='".calcB($user['hold'], $offer['leadPrice'], 'pay')."' WHERE `id`='".$user['id']."'");
	    if(!empty($r1)) $db->query("UPDATE `users` SET `referal_hold`='".calcP($r1['referal_hold'], 20, $offer['leadPrice'], 'pay')."' WHERE `id`='".$r1['id']."'");
	    if(!empty($r2)) $db->query("UPDATE `users` SET `referal_hold`='".calcP($r2['referal_hold'], 10, $offer['leadPrice'], 'pay')."' WHERE `id`='".$r2['id']."'");
	    
	    // Начисление партнёру
	    $db->query("UPDATE `users` SET `referal_hold`='".calcP($partner['referal_hold'], 20, $offer['leadPrice'], 'pay')."' WHERE `id`='".$partner['id']."'");
	}