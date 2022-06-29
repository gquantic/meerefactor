<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

//Подключение всех библиотек
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
    $promo_url = "{$offer['promo_url']}=".intval($_GET['wid'])."&subid=".intval($_GET['wid'])."&subid1=".intval($_GET['wid']);
//        $promo_url = "{$offer['promo_url']}=".intval($_GET['wid'])."&subid=".intval($_GET['wid']);

    if ($user['id'] == 1) {
//            echo $promo_url;
    }

    $promo_url = 'http://meegames.ru/go.php?promo='.$promo_url;
}

//if ($user['id'] == 1) {
if (0) {
    echo $promo_url;
} else {
    header("Location: ".$promo_url);
}