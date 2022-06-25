<?php
$userData = \Libs\Controllers\Db::userSelect();
$userId = $userData['id'];

$referals = \Libs\Controllers\Db::query("SELECT * FROM `users` WHERE `referal`='$userId'");

if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");

// Получаем данные о запрашиваемой странице
$pageName = "Рефералы";