<?
	/*
	*** Обработчик добавления оффера
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

	// Подгружаем заполненные поля
	$offerName = $_POST['offerName'];
    $offerHold = $_POST['offerhold'];
	$leadprice = $_POST['leadprice'];
	$active = $_POST['active'];
	$shortdesc = strip_tags($_POST['shortdesc']);
	$promourl = $_POST['promourl'];
	$description = $_POST['description'];
	$needcheck = $_POST['needcheck'];
	$offerId = $_POST['id'];
	$geo = $_POST['geo'];
	$socs = $_POST['socs'];
	$topoffer = $_POST['topoffer'];
	$category = $_POST['category'];
	$subid = $_POST['subid'];
	$actiontext = $_POST['actiontext'];

	# echo $description;

	if($topoffer != intval(0)) $topoffer = 1;

	
	if($needcheck != '1') $needcheck = 0;

	// Запись в бд
	$insert = $db->query("UPDATE `offers` SET name='$offerName', `hold`='$offerHold', leadPrice='$leadprice', web_show='$active', shortdescription='$shortdesc', promo_url='$promourl', description='$description', needcheck='$needcheck', `geo`='$geo', `socs`='$socs', `top`='$topoffer', `category`='$category', `subid`='$subid', `action`='$actiontext' WHERE `id`='$offerId'");

	if(!empty($insert)){
		# header("Location: ../displaymessage.php?act=success&from=offers.php");
		echo "1";
	}else{
		# header("Location: ../displaymessage.php?act=error&from=create-offer.php");
		echo "0";
	}


	// id	image	description	leadPrice	endDate	endTime	acCountries	blockCountries	acceptSocs	blockSocs	banner1	banner2	banner3	modercheck	modercomment
