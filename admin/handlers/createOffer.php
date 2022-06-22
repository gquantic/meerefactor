<?
	/*
	*** Обработчик добавления оффера
	*/

	//Подключение всех библиотек 
	require_once "/libs/contrDb.php/Db.php";
	$db = new Db(1, 1);

	session_start();

	$userData = $db->userSelect();
	$userId = $userData['id'];

	// Подгружаем заполненные поля
	$image = $_POST['offerImage'];
	$name = $_POST['offerName'];
	$promoUrl = $_POST['promoUrl'];
	$desc = $_POST['description'];
	$shortdesc = trim(strip_tags($_POST['shortdesc']));
	$hold = $_POST['hold'];
	$leadPrice =  $_POST['leadPrice'];
	$endDate = $_POST['endDate'];
	$endTime = $_POST['endTime'];
	$countries = $_POST['countries'];
	$socs = $_POST['socs'];
	$banner1 = $_POST['banner1'];
	$banner2 = $_POST['banner2'];
	$banner3 = $_POST['banner3'];
	$category = $_POST['category'];
	$topOffer = $_POST['topOffer'];
	$subid = $_POST['subid'];

	// Остальные операции
	if(intval($topOffer) != 1) $topOffer = 0;

	// $_FILES['offerImage']['name'];

	// Преобразовываем файлы
	$image = $db->uploadImage($_FILES['offerImage']['name'], $_FILES['offerImage']['tmp_name']);
	$banner1 = $db->uploadImage($_FILES['banner1']['name'], $_FILES['banner1']['tmp_name']);
	$banner2 = $db->uploadImage($_FILES['banner2']['name'], $_FILES['banner2']['tmp_name']);
	$banner3 = $db->uploadImage($_FILES['banner3']['name'], $_FILES['banner3']['tmp_name']);

	// Запись в бд
	$insert = $db->query("INSERT INTO `offers` (`author_id`, `image`, `name`, `description`, `leadPrice`, `endDate`, `endTime`, `geo`, `socs`, `banner1`, `banner2`, `banner3`, `promo_url`, `modercheck`, `root`, `hold`, `shortdescription`, `category`, `top`, `subid`) VALUES ('$userId','$image', '$name', '$desc', '$leadPrice', '$endDate', '$endTime', '$countries', '$socs', '$banner1', '$banner2', '$banner3', '$promoUrl', '1', '1', '$hold', '$shortdesc', '$category', '$topOffer', '$subid')");

	if(!empty($insert)){
		header("Location: ../displaymessage.php?act=success&from=offers.php");
	}else{
		header("Location: ../displaymessage.php?act=error&from=create-offer.php");
	}


	// id	image	description	leadPrice	endDate	endTime	acCountries	blockCountries	acceptSocs	blockSocs	banner1	banner2	banner3	modercheck	modercomment
	