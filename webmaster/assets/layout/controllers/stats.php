<?php

//Подключаем графики
require_once $_SERVER['DOCUMENT_ROOT'] . "/Libs/api.php";
$leads = new Leads();

// С какой записи выводим и сколько
if(!isset($_GET['convpage']) || $_GET['convpage'] == 0) $whereSelect = 1;
else $whereSelect = $_GET['convpage'];

$convCount = 10;

$userId = \Libs\Controllers\Db::userSelect()['id'];
$conversions = \Libs\Controllers\Db::query("SELECT * FROM `conversions` WHERE `webmaster_id`='$userId' ORDER BY `id` DESC");
$referals = \Libs\Controllers\Db::query("SELECT * FROM `users` WHERE `referal`='$userId'");

// Достаём реферальные конверсии
$refСonvs = array();
while ($referal = mysqli_fetch_assoc($referals)) {
    $conversion = mysqli_fetch_assoc(\Libs\Controllers\Db::query("SELECT * FROM `conversions` WHERE `webmaster_id`='".$referal['id']."'"));
    array_push($refСonvs, $conversion);
}

// Получаем данные о запрашиваемой странице
$pageName = "Статистика и конверсии";

#var_dump($leads->request("reports", "offset=0&grouping=month&aff_sub1"));

$leadsStat = $leads->getReportsStatic();

var_dump($leadsStat);