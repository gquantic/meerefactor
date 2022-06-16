<?
	/*
	*** Главный файл, отвечающий за корень сайта веб-мастера
	*/

	//Подключение всех библиотек 
	require_once "../libs/db.php";
	$_Db = new Db(1, 1);
	$db = $_Db;

	session_start();

	$id = intval($_GET['id']);

	$userData = $_Db->userSelect();
	$offer = $_Db->query("SELECT * FROM `offers` WHERE `id`='$id'");
	$offer = mysqli_fetch_assoc($offer);

	if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");

	require_once "../libs/site.php";
	$_Site = new Site();

	// Получаем данные о запрашиваемой странице
	$pageName = "Оффер \"".$offer['name']."\"";
    
    // Подключение шапки
	include "assets/layout/blocks/header.php";

	// Прорисовка сайта
	include "assets/layout/bodys/offer.php";

    // Подключение подвала
	include "assets/layout/blocks/footer.php";