<?php
$userData = \Libs\Controllers\Db::userSelect();

// Извлекаем всех офферов по категориям
$notifications = \Libs\Controllers\Db::query("SELECT * FROM `notifications` WHERE `foruser`='".$userData['id']."' AND `view`='0'");

if(!isset($_SESSION['type'])) header("Location: /");
else if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");

// Получаем данные о запрашиваемой странице
$pageName = "Уведомления";