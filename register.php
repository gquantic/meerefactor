<?
/*
*** Главный файл, отвечающий за корень сайта
*/

require 'vendor/autoload.php';

//Подключение всех библиотек
use Libs\Controllers\Db;
use Libs\Controllers\Site;

// Получаем данные о запрашиваемой странице
$name = Site::pageName();

// Прорисовка сайта
include "assets/layout/bodys/register.php";