<?php
$userData = \Libs\Controllers\Db::userSelect();

if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");

// Получаем данные о запрашиваемой странице
$name = \Libs\Controllers\Site::pageName();