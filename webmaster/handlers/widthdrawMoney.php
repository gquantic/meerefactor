<?php
	//Подключение всех библиотек 
	require_once "/libs/contrDb.php/Db.php";
	$db = new Db(1, 1);

	session_start();

	$userData = $db->userSelect();

	$where = $_POST['where'];
	$req = $_POST['req'];
	$userLastbalance = $userData['width_balance'] - $req;

	if(intval($req) < 300){
		echo "sumnocorret";
		exit();
	}
	
	if(intval($req) > intval($userData['width_balance'])){
		echo "nomoney";
		exit();
	}

	if($where == 'qiwi'){ 
		$paynumbers = $userData['qiwi'];
		$where = 'Qiwi';
	}elseif($where == 'bcard'){
		$paynumbers = $userData['bcard'];
		$where = 'Банковская карта';
	}elseif($where == 'ymoney'){
		$paynumbers = $userData['ymoney'];
		$where = 'Я.Деньги';
	}


	$query = $db->query("INSERT INTO `payouts` (`foruser`, `sum`, `req_name`, `req`) VALUES ('".$userData['id']."', '$req', '$where', '$paynumbers')");

	if(!empty($query)){ 
		$db->query("UPDATE `users` SET `width_balance`='$userLastbalance' WHERE `id`='".$userData['id']."'");
		echo "suc";
	} else echo "error"; //." and: ".var_dump($_POST)." card: ".$paynumbers." userData: ".var_dump($userData);