<?
$userData = \Libs\Controllers\Db::userSelect();

$uid = $userData['id'];

$templates = \Libs\Controllers\Db::query("SELECT * FROM `templates` WHERE `web_id`='$uid' LIMIT 30");

$hItems = \Libs\Controllers\Db::query("SELECT * FROM `payouts` WHERE `foruser`='$uid'");

$rstate = \Libs\Controllers\Db::query("SELECT * FROM `faq` WHERE `id`='17'");

if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");

// Получаем данные о запрашиваемой странице
$pageName = "Финансы";
