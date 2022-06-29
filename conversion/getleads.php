<?php

/*
lk.meemoney.ru/conversion/getleads.php?conversion_id={conversion_id}&created={created}&status={status}&pa={pa}&payout={payout}&payout_round={payout_round}&payout_type={payout_type}&referrer={referrer}&user_agent={user_agent}&offer_id={offer_id}&offer_name={offer_name}&affiliate_id={affiliate_id}&source={source}&aff_sub1={aff_sub1}&offer_url_id={offer_url_id}&browser_app={browser_app}&browser_device={browser_device}&country_name={country_name}&region_name={region_name}&city_name={city_name}&transaction_id={transaction_id}&ip={ip}&adv_sub={adv_sub}&type_event=new
*/

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use Libs\Controllers\Db;
use Libs\Controllers\User;

if ($_GET['password'] != "26052003arturmeemoney") {
    echo "Error!";
    exit();
}

// Присваиваем данные
$conversion_id = $_GET['conversion_id'];
$status = $_GET['status'];
$payout_round = $_GET['payout_round'];
$transaction_id = "leads_".$_GET['transaction_id'];
$offer_id = $_GET['offer_id'];
$ip = $_GET['ip'];
$pa = $_GET['pa'];
$payout = $_GET['payout'];
$payout_type = $_GET['payout_type'];
$city = $_GET['city_name'];

#var_dump($_GET);

// Функция для вычисления заработка
function calcP($array, $percent, $sum, $type){
    if($type == 'pay') return $array + ($percent * ($sum / 100));
    if($type == 'rej'){ 
        $sum = $array - ($percent * ($sum / 100));

        if($sum < 0){
            return 0;
        }else{
            return $sum;
        }
    }
}

function calcB($array, $sum, $type){
    if($type == 'pay') return $array + $sum;
    if($type == 'rej'){
        $sum = $array - $sum;

        if($sum < 0){
            return 0;
        }else{
            return $sum;
        }
    }
}

// Вытаскиваем цену
$offer = mysqli_fetch_assoc(Db::query("SELECT * FROM `offers` WHERE `subid`='".$_GET['offer_id']."'"));

// Перезадаю значение
#$offer['leadPrice'] = 40 * ($payout_round / 100);

// Вытаскиваем ID рефералов
$user = mysqli_fetch_assoc(Db::query("SELECT * FROM `users` WHERE `id`='".$_GET['aff_sub1']."'")); /* Sam pol'zovatel' */
$r1 = mysqli_fetch_assoc(Db::query("SELECT * FROM `users` WHERE `id`='".$user['referal']."'")); /* 1 lvl Referal */
$r2 = mysqli_fetch_assoc(Db::query("SELECT * FROM `users` WHERE `id`='".$r1['referal']."'")); /* 2 lvl Referal */

$partner = mysqli_fetch_assoc(Db::query("SELECT * FROM `users` WHERE `id`='1'"));

// Проверяем, есть ли реферал второго уровня
// if(empty($r2)) $r1pay = 10;

if($_GET['type_event'] == 'new'){
    // Для начала создаём саму конверсию
    Db::query("INSERT INTO `conversions` (`transaction_id`, `convpart`, `offer_id`, `webmaster_id`, `price`, `agree`, `spam`, `ip`, `conversion_id`, `status`, `pa`, `payout`, `payout_type`) VALUES ('$transaction_id', 'leads', '".$offer['id']."', '".$user['id']."', '".$offer['leadPrice']."', '0', '0', '$ip', '$conversion_id', '$status', '$pa', '$payout_round', '$payout_type')");

    // Начисление будет проходить по порядку 3-2-1
    User::updateBalance($user['id'], $user['balance'], calcB($user['hold'], $offer['leadPrice'], 'pay'));

    if(!empty($r1)) User::updateRefbalance($r1['id'], $r1['balance'], calcP($r1['referal_hold'], 20, $offer['leadPrice'], 'pay'));

    if(!empty($r2)) User::updateRefbalance($r2['id'], $r2['balance'], calcP($r2['referal_hold'], 10, $offer['leadPrice'], 'pay'));
    
    // Отправка письма
    Db::sendMail($user['email'], "У Вас новая конверсия!", "Конверсия по офферу: ".$offer['name'].'<br> На сумму: '.$offer['leadPrice'].'<br> <a href="https://lk.meemoney.ru">В личный кабинет</a>');
    
    // Начисление партнёру
    Db::query("UPDATE `users` SET `referal_hold`='".calcP($partner['referal_hold'], 20, $offer['leadPrice'], 'pay')."' WHERE `id`='".$partner['id']."'");
}elseif($_GET['type_event'] == 'status'){
// Status check begin

if($_GET['type_event'] == 'status')

    if($_GET['status'] == 'approved'){
        // Accepted
        Db::query("UPDATE `conversions` SET `status`='approved' WHERE `transaction_id`='$transaction_id'");

        // Начисление будет проходить по порядку 3-2-1
        User::updateBalance($user['id'], calcB($user['balance'], 0, 'pay'), calcB($user['hold'], $offer['leadPrice'], 'rej'));


        if(!empty($r1)) User::updateRefbalance($r1['id'], calcP($r1['referal_balance'], 20, 0, 'pay'), calcP($r1['referal_hold'], 20, $offer['leadPrice'], 'rej'));

        if(!empty($r2)) User::updateRefbalance($r2['id'], calcP($r2['referal_balance'], 10, 0, 'pay'), calcP($r2['referal_hold'], 10, $offer['leadPrice'], 'rej'));

        # Example: if(!empty($r2)) User::updateRefbalance($r2['id'], calcP($r2['referal_balance'], 10, $offer['leadPrice'], 'pay'), calcP($r2['referal_hold'], 10, $offer['leadPrice'], 'rej'));
        
        $meebalance = $user['meecoins'] + ($offer['leadPrice'] * 2);
        $meecount = $user['meecount'] + ($offer['leadPrice'] * 2);
        
        Db::query("UPDATE `users` SET `meecoins`='$meebalance', `meecount`='$meecount' WHERE `id`='".$user['id']."'");
        
        // Отправка письма
        Db::sendMail($user['email'], "Конверсия вышла из холда!", "Конверсия по офферу: ".$offer['name'].'<br> На сумму: '.$offer['leadPrice'].'<br> Ваш баланс: '.$user['balance'].' <br> Ваш холд: '.$user['hold'].' <br><br> Ожидайте оплаты действия! <br> <a href="https://lk.meemoney.ru">В личный кабинет</a>');

        // Начисление партнёру
            User::updateRefbalance($partner['id'], calcP($partner['referal_balance'], 20, $offer['leadPrice'], 'pay'), calcP($partner['referal_hold'], 20, $offer['leadPrice'], 'rej'));
    }elseif($_GET['status'] == 'rejected'){
        // Declined
        Db::query("UPDATE `conversions` SET `status`='rejected' WHERE `transaction_id`='$transaction_id'");

        // Начисление будет проходить по порядку 3-2-1
        User::updateBalance($user['id'], $user['balance'], calcB($user['hold'], $offer['leadPrice'], 'rej'));

        if(!empty($r1)) User::updateRefbalance($r1['id'], $r1['balance'], calcP($r1['referal_hold'], 20, $offer['leadPrice'], 'rej'));
        if(!empty($r2)) User::updateRefbalance($r2['id'], $r2['balance'], calcP($r2['referal_hold'], 10, $offer['leadPrice'], 'rej'));

        // Начисление партнёру
        Db::query("UPDATE `users` SET `referal_hold`='".calcP($partner['referal_hold'], 20, $offer['leadPrice'], 'rej')."' WHERE `id`='".$partner['id']."'");
    }

// Status check end
}