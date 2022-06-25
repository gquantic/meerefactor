<?php

$userId = \Libs\Controllers\Db::userSelect()['id'];
$conversions = \Libs\Controllers\Db::query("SELECT * FROM `conversions` WHERE `webmaster_id`='$userId' ORDER BY `id` DESC");
$conversionsRejected = \Libs\Controllers\Db::query("SELECT * FROM `conversions` WHERE `webmaster_id`='$userId' AND `status`='rejected' ORDER BY `id` DESC");
$referrals = \Libs\Controllers\Db::query("SELECT * FROM `users` WHERE `referal`='$userId'");

// Достаём реферальные конверсии
$referralActive = array();
while ($referral = mysqli_fetch_assoc($referrals)) {
    $conversion = mysqli_fetch_assoc(\Libs\Controllers\Db::query("SELECT * FROM `conversions` WHERE `webmaster_id`='".$referral['id']."'"));
    $referralActive[] = $conversion;
}

// Получаем данные о запрашиваемой странице
$pageName = "Статистика и конверсии";

$leadsStat = \Libs\Controllers\Leads::init();