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
	$userId = $userData['id'];
	
	$referals = $_Db->query("SELECT * FROM `users` WHERE `referal`='$userId'");
	
	if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");

	require_once "../libs/site.php";
	$_Site = new Site();

	// Получаем данные о запрашиваемой странице
	$pageName = "Рефералы";
    
    // Подключение шапки
	include "assets/layout/blocks/header.php";

	// Прорисовка сайта
	include "assets/layout/bodys/referals.php";

    // Подключение подвала
	include "assets/layout/blocks/footer.php";