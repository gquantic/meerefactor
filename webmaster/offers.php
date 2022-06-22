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

	mysqli_set_charset(\Libs\Controllers\Db::connect(), "utf8");

	$userData = \Libs\Controllers\Db::userSelect();





	// Извлекаем всех офферов по категориям
	$uoffers = \Libs\Controllers\Db::query("SELECT * FROM `offers` WHERE `modercheck`='1'");



	if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");

	require_once "../Libs/site.php";
	$_Site = new Site();

	// Получаем данные о запрашиваемой странице
	$pageName = "Офферы";
    
    // Подключение шапки
	include "assets/layout/blocks/header.php";

	// Прорисовка сайта
	include "assets/layout/bodys/offers.php";

    // Подключение подвала
	include "assets/layout/blocks/footer.php";