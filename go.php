<?php

/**
 * Переход по офферу
 */

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Libs\Controllers\Db;

$id = intval($_GET['id']);
$wid = intval($_GET['wid']);

$user = mysqli_fetch_assoc(Db::query("SELECT * FROM `users` WHERE id='$wid'"));

$offer = mysqli_fetch_assoc(Db::query("SELECT * FROM `offers` WHERE `id`='".intval($id)."'"));

if($user['blocked'] == 1) exit("Переход по ссылке не удался.");

$promo_url = 'http://meefinance.ru/go.php/?'."&aff_sub1=".intval($_GET['wid'])."&offerid=".$id;

if ($offer['partner'] == 'leads') {
    $promo_url = "{$offer['promo_url']}=".intval($_GET['wid']);
    $promo_url = 'http://meefinance.ru/go.php?promo='.$promo_url;
} elseif($offer['partner'] == 'admitad') {
    $promo_url = "{$offer['promo_url']}=".intval($_GET['wid'])."&subid=".intval($_GET['wid']);
    $promo_url = 'http://meegames.ru/go.php?promo='.$promo_url;
}

header("Location: ".$promo_url);
