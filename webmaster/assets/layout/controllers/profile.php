<?php

$userData = \Libs\Controllers\Db::userSelect();

$uid = $userData['id'];

$templates = \Libs\Controllers\Db::query("SELECT * FROM `templates` WHERE `web_id`='$uid' LIMIT 30");

if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");

// Получаем данные о запрашиваемой странице
$pageName = "Мой профиль";