<?
/*
*** Главный файл, отвечающий за корень сайта веб-мастера
*/

$userData = \Libs\Controllers\Db::userSelect();

$pageName = 'Офферы';

// Извлекаем всех офферов по категориям
$uoffers = \Libs\Controllers\Db::query("SELECT * FROM `offers` WHERE `modercheck`='1'");