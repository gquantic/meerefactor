<?
	/*
	*** Главный файл, отвечающий за корень сайта веб-мастера
	*/

	//Подключение всех библиотек 
	require_once "../libs/db.php";
	$_Db = new Db(1, 1);
	$db = $_Db;

	session_start();

	$userData = $_Db->userSelect();
	$offerid = intval($_GET['id']);

	$uid = $userData['id'];

	$templates = $_Db->query("SELECT * FROM `templates` WHERE `web_id`='$uid' AND `moder_check`='1' LIMIT 30");

	$offers = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1'");
	$offer = $_Db->query("SELECT * FROM `offers` WHERE `id`='$offerid'");
	$offer = mysqli_fetch_assoc($offer);

	if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");

	require_once "../libs/site.php";
	$_Site = new Site();

	// Получаем данные о запрашиваемой странице
	$name = 'Подключение к офферу';
    
    // Подключение шапки
	include "assets/layout/blocks/header.php";

	// Прорисовка сайта
	include "assets/layout/bodys/offer-connect.php";

    // Подключение подвала
	include "assets/layout/blocks/footer.php";