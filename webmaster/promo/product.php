<?
	/*
	*** Главный файл, отвечающий за корень сайта веб-мастера
	*/

	//Подключение всех библиотек 
	require_once "../../libs/db.php";
	$_Db = new Db(1, 1);
	$db = $_Db;

	session_start();

	$userData = $_Db->userSelect();

	// Извлекаем всех офферов по категориям
	#$offers = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' LIMIT 8");

	if(!isset($_SESSION['type'])) header("Location: /");
	else if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");
	
	// Получаем данные о запрашиваемой странице
	$pageName = "Главная";
    
    // Подключение шапки
	include "assets/layout/blocks/header.php";

	// Прорисовка сайта
	include "assets/layout/bodys/product.php";

    // Подключение подвала
	include "assets/layout/blocks/footer.php";