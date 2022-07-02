<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

//Подключение всех библиотек
use Libs\Controllers\Site;
use Libs\Controllers\Db;

session_start();

$userData = Db::userSelect();

if($_SESSION['type'] != 'admin') header("Location: /webmaster/");

// Получаем данные о запрашиваемой странице
$name = Site::pageName();

$uri = substr($_SERVER['REQUEST_URI'], 7);
$getVariables = strpos($uri, '?');

$userData = Db::userSelect();

if ($getVariables !== false) {
    $uri = substr($uri, 0, $getVariables);
}

$uri == '' ? $uri = 'index' : $uri;

$phpDotExtension = strpos($uri, '.php');

if ($phpDotExtension !== false) {
    $end = $phpDotExtension + 4;
    $uri = substr($uri, 0, $phpDotExtension);
}

// Если есть обработчик, то подключаем
if (file_exists("assets/layout/controllers/{$uri}.php")) {
    include "assets/layout/controllers/{$uri}.php";
}

// Подключение шапки
include "assets/layout/blocks/header.php";

// Прорисовка сайта
include "assets/layout/bodys/{$uri}.php";

// Подключение подвала
include "assets/layout/blocks/footer.php";
