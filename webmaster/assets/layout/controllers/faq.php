<?php

$userData = \Libs\Controllers\Db::userSelect();

// Извлекаем всех офферов по категориям
$states = \Libs\Controllers\Db::query("SELECT * FROM `faq`");

if(!isset($_SESSION['type'])) header("Location: /");
else if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");

// Получаем данные о запрашиваемой странице
$pageName = "Вопрос / Ответ";