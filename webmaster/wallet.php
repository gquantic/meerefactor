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

	$uid = $userData['id'];
	
	$templates = \Libs\Controllers\Db::query("SELECT * FROM `templates` WHERE `web_id`='$uid' LIMIT 30");

	$hItems = \Libs\Controllers\Db::query("SELECT * FROM `payouts` WHERE `foruser`='$uid'");
	
	$rstate = \Libs\Controllers\Db::query("SELECT * FROM `faq` WHERE `id`='17'");

	if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");

	require_once "../Libs/site.php";
	$_Site = new Site();

	// Получаем данные о запрашиваемой странице
	$pageName = "Финансы";
    
    // Подключение шапки
	include "assets/layout/blocks/header.php";

	// Прорисовка сайта
	include "assets/layout/bodys/wallet.php";

    // Подключение подвала
	include "assets/layout/blocks/footer.php";