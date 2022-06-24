<?php

use Libs\Controllers\Db;
use Libs\Controllers\Leads;

// С какой записи выводим и сколько
//if(!isset($_GET['convpage']) || $_GET['convpage'] == 0) $whereSelect = 1;
//else $whereSelect = $_GET['convpage'];

//$convCount = 10;

$userId = Db::userSelect()['id'];
$conversions = Db::query("SELECT * FROM `conversions` WHERE `webmaster_id`='$userId' ORDER BY `id` DESC");
$conversionsRejected = Db::query("SELECT * FROM `conversions` WHERE `webmaster_id`='$userId' AND `status`='rejected' ORDER BY `id` DESC");
$referrals = Db::query("SELECT * FROM `users` WHERE `referal`='$userId'");

// Достаём реферальные конверсии
$referralActive = array();
while ($referral = mysqli_fetch_assoc($referrals)) {
    $conversion = mysqli_fetch_assoc(\Libs\Controllers\Db::query("SELECT * FROM `conversions` WHERE `webmaster_id`='".$referral['id']."'"));
    $referralActive[] = $conversion;
}

// Получаем данные о запрашиваемой странице
$pageName = "Статистика и конверсии";

$leadsStat = \Libs\Controllers\Leads::init();