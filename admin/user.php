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

	$exuser = mysqli_fetch_assoc($_Db->query("SELECT * FROM `users` WHERE `id`='".intval($_GET['id'])."'"));
	$referals = $_Db->query("SELECT * FROM `users` WHERE `referal`='".intval($_GET['id'])."'");
	$conversions = $_Db->query("SELECT * FROM `conversions` WHERE `webmaster_id`='".intval($_GET['id'])."'");

	$invited = mysqli_fetch_assoc($_Db->query("SELECT * FROM `users` WHERE `id`='".$exuser['referal']."'"));

	if($_SESSION['type'] != 'admin') header("Location: /webmaster/");

	require_once "../libs/site.php";
	$_Site = new Site();

	// Получаем данные о запрашиваемой странице
	$name = $_Site->pageName();
    
    // Подключение шапки
	include "assets/layout/blocks/header.php";

	// Прорисовка сайта
	include "assets/layout/bodys/user.php";

    // Подключение подвала
	include "assets/layout/blocks/footer.php";