<?
	/*
	*** Главный файл, отвечающий за корень сайта веб-мастера
	*/

	//Подключение всех библиотек 
use Libs\Controllers\Site;

require_once "/libs/coDb.phpers/Db.php";
	$_Db = new Db(1, 1);
	$db = $_Db;

	session_start();

	$userData = \Libs\Controllers\Db::userSelect();
	$offerid = intval($_GET['id']);

	$uid = $userData['id'];

	$templates = \Libs\Controllers\Db::query("SELECT * FROM `templates` WHERE `web_id`='$uid' AND `moder_check`='1' LIMIT 30");

	$offers = \Libs\Controllers\Db::query("SELECT * FROM `offers` WHERE `modercheck`='1'");
	$offer = \Libs\Controllers\Db::query("SELECT * FROM `offers` WHERE `id`='$offerid'");
	$offer = mysqli_fetch_assoc($offer);

	if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");

	require_once "../Libs/site.php";
	$_Site = new Site();

	// Получаем данные о запрашиваемой странице
	$name = 'Подключение к офферу';
    
    // Подключение шапки
	include "assets/layout/blocks/header.php";

	// Прорисовка сайта
	include "assets/layout/bodys/offer-connect.php";

    // Подключение подвала
	include "assets/layout/blocks/footer.php";