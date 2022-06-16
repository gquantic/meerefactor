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

	// Извлекаем всех офферов по категориям
	#$offers = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' LIMIT 8");

	$debcard = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `top`=1 AND `web_show`='1' AND `category` IN ('debetcard') LIMIT 8");
	$credcard = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `top`=1 AND `web_show`='1' AND `category` IN ('creditcard') LIMIT 8");

	$games = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `top`=1 AND `web_show`='1' AND `category` LIKE ('game%%') LIMIT 8");

	$job = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `top`=1 AND `web_show`='1' AND `category` LIKE ('job%%') LIMIT 8");
	
	$loan = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `top`=1 AND `web_show`='1' AND `category` LIKE ('%%loan%%') LIMIT 8");

	if(!isset($_SESSION['type'])) header("Location: /");
	else if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");

	require_once "../libs/site.php";
	$_Site = new Site();

	// Получаем данные о запрашиваемой странице
	$pageName = "Главная";
    
    // Подключение шапки
	include "assets/layout/blocks/header.php";

	// Прорисовка сайта
	include "assets/layout/bodys/index.php";

    // Подключение подвала
	include "assets/layout/blocks/footer.php";