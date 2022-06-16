<?
/*
*** Добавление товара MeeLiga
*/

//Подключение всех библиотек
require_once "../libs/db.php";
$_Db = new Db(1, 1);

//Подключаем графики
require_once "charts/conv_charts.php";
$_Db = new Db(1, 1);

session_start();

if($_SESSION['type'] != 'admin') header("Location: /webmaster/");

$userData = $_Db->userSelect();

require_once "../libs/site.php";
$_Site = new Site();

// Получаем данные о запрашиваемой странице
$name = $_Site->pageName();

// Подключение шапки
include "assets/layout/blocks/header.php";

// Прорисовка сайта
include "assets/layout/bodys/meeliga-add-offer.php";

// Подключение подвала
include "assets/layout/blocks/footer.php";