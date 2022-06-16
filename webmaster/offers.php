<?
	/*
	*** Главный файл, отвечающий за корень сайта веб-мастера
	*/

	//Подключение всех библиотек 
	require_once "../libs/db.php";
	$_Db = new Db(1, 1);
	$db = $_Db;

	session_start();

	mysqli_set_charset($_Db->connect(), "utf8");

	$userData = $_Db->userSelect();





	// Извлекаем всех офферов по категориям
	$uoffers = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1'");



	if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");

	require_once "../libs/site.php";
	$_Site = new Site();

	// Получаем данные о запрашиваемой странице
	$pageName = "Офферы";
    
    // Подключение шапки
	include "assets/layout/blocks/header.php";

	// Прорисовка сайта
	include "assets/layout/bodys/offers.php";

    // Подключение подвала
	include "assets/layout/blocks/footer.php";