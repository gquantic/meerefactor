<?
	/*
	*** Главный файл, отвечающий за корень сайта веб-мастера
	*/

	//Подключение всех библиотек 
use Libs\Controllers\Site;

require_once "/libs/coDb.phpers/Db.php";
	$_Db = new Db(1, 1);

	//Подключаем графики 
	require_once "charts/conv_charts.php";
	$_Db = new Db(1, 1);

	session_start();

	$userData = $_Db->userSelect();

	$faqs = $_Db->query("SELECT * FROM `faq`");

	if($_SESSION['type'] != 'admin') header("Location: /webmaster/");

	require_once "../Libs/site.php";
	$_Site = new Site();

	// Получаем данные о запрашиваемой странице
	$name = $_Site->pageName();
    
    // Подключение шапки
	include "assets/layout/blocks/header.php";

	// Прорисовка сайта
	include "assets/layout/bodys/faq-edit.php";

    // Подключение подвала
	include "assets/layout/blocks/footer.php";
?>