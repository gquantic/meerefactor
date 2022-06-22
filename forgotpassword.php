<?
	/*
	*** Главный файл, отвечающий за корень сайта
	*/

	//Подключение всех библиотек 
use Libs\Controllers\Site;

require_once "/libsDb.phpollers/Db.php";
	$_Db = new Db('NaN', 0);

	$_Db->authCheck();

	require_once "Libs/site.php";
	$_Site = new Site();

	// Получаем данные о запрашиваемой странице
	$name = $_Site->pageName();

	// Прорисовка сайта
	include "assets/layout/bodys/forgotpassword.php";