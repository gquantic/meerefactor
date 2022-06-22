<?
	/*
	*** Главный файл, отвечающий за корень сайта
	*/

include $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

//Подключение всех библиотек
use Libs\Controllers\Db;
use Libs\Controllers\Site;

// Получаем данные о запрашиваемой странице
$name = Site::pageName();

// Прорисовка сайта
include "assets/layout/bodys/login.php";