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
	$notifications = $db->query("SELECT * FROM `notifications` WHERE `foruser`='".$userData['id']."' AND `view`='0'");

	if(!isset($_SESSION['type'])) header("Location: /");
	else if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");

	require_once "../libs/site.php";
	$_Site = new Site();

	// Получаем данные о запрашиваемой странице
	$pageName = "Уведомления";
    
    // Подключение шапки
	include "assets/layout/blocks/header.php";

	// Прорисовка сайта
	include "assets/layout/bodys/notifications.php";

    // Подключение подвала
	include "assets/layout/blocks/footer.php";