<?php

/*
*** Главный файл, отвечающий за корень сайта веб-мастера
*/

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Libs\Controllers\Db;
use Libs\Controllers\Site;

Site::startSession();

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$uri = substr($_SERVER['REQUEST_URI'], 11);
$getVariables = strpos($uri, '?');

$userData = Db::userSelect();

if ($getVariables !== false) {
    $uri = substr($uri, 0, $getVariables);
}

if(!isset($_SESSION['type'])) header("Location: /");
else if($_SESSION['type'] != 'webmaster') header("Location: /");

$uri == '' ? $uri = 'index' : $uri;

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