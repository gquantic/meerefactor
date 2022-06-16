<?
	/*
	*** Главный файл, отвечающий за корень сайта веб-мастера
	*/

	//Подключение всех библиотек 
	require_once "../libs/db.php";
	$_Db = new Db(1, 1);

	session_start();

	if($_SESSION['type'] != 'admin') header("Location: /webmaster/");

	$userData = $_Db->userSelect();
	$userId = $userData['id'];

	require_once "../libs/site.php";
	$_Site = new Site();

	// Получаем данные о запрашиваемой странице
	$name = $_Site->pageName();
    
    // Подключение шапки
	include "assets/layout/blocks/header.php";

	// Прорисовка сайта
	include "assets/layout/bodys/offer-requests.php";

    // Подключение подвала
	include "assets/layout/blocks/footer.php";