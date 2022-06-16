<?
	/*
	*** Главный файл, отвечающий за корень сайта веб-мастера
	*/

	//Подключение всех библиотек 
	require_once "../libs/db.php";
	$_Db = new Db(1, 1);

	//Подключаем графики 
	require_once "charts/conv_charts.php";
	$_Db = new Db(1, 1);

	session_start();

	$userData = $_Db->userSelect();

	$offer = $_Db->query("SELECT * FROM `offers` WHERE `id`='".$_GET['id']."'");
	$offer = mysqli_fetch_assoc($offer);

	if($_SESSION['type'] != 'admin') header("Location: /webmaster/");

	require_once "../libs/site.php";
	$_Site = new Site();

	// Получаем данные о запрашиваемой странице
	$name = $_Site->pageName();
    
    // Подключение шапки
	include "assets/layout/blocks/header.php";

	// Прорисовка сайта
	include "assets/layout/bodys/offer-edit.php";

    // Подключение подвала
	include "assets/layout/blocks/footer.php";