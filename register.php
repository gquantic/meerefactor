<?
	/*
	*** Главный файл, отвечающий за корень сайта
	*/

	//Подключение всех библиотек 
	require_once "libs/db.php";
	$_Db = new Db('NaN', 0);

	require_once "libs/site.php";
	$_Site = new Site();

	// Получаем данные о запрашиваемой странице
	$name = $_Site->pageName();

	// Прорисовка сайта
	include "assets/layout/bodys/register.php";