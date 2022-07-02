<?php

/*
*** Главный файл, отвечающий за корень сайта веб-мастера
*/

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Libs\Controllers\Db;
use Libs\Controllers\Site;

Site::startSession();
Db::authCheck();

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';


$uri = substr($_SERVER['REQUEST_URI'], 11);
$getVariables = strpos($uri, '?');

$userData = Db::userSelect();

if ($getVariables !== false) {
    $uri = substr($uri, 0, $getVariables);
}

if(!isset($_SESSION['type'])) header("Location: /");
else if($_SESSION['type'] != 'webmaster') header("Location: /");

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