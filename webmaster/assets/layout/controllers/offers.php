<?
/*
*** Главный файл, отвечающий за корень сайта веб-мастера
*/

//Подключение всех библиотек
use Libs\Controllers\Site;

$userData = \Libs\Controllers\Db::userSelect();

$pageName = 'Офферы';

// Извлекаем всех офферов по категориям
$uoffers = \Libs\Controllers\Db::query("SELECT * FROM `offers` WHERE `modercheck`='1'");