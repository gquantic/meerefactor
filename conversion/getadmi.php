<?php

/*
lk.meemoney.ru/conversion/getleads.php?conversion_id={conversion_id}&created={created}&status={status}&pa={pa}&payout={payout}&payout_round={payout_round}&payout_type={payout_type}&referrer={referrer}&user_agent={user_agent}&offer_id={offer_id}&offer_name={offer_name}&affiliate_id={affiliate_id}&source={source}&aff_sub1={aff_sub1}&offer_url_id={offer_url_id}&browser_app={browser_app}&browser_device={browser_device}&country_name={country_name}&region_name={region_name}&city_name={city_name}&transaction_id={transaction_id}&ip={ip}&adv_sub={adv_sub}&type_event=new
*/

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include '../libs/db.php';
$db = new Db(0,0);

include '../libs/user.php';
$_User = new User;

if ($_GET['password'] != "26052003arturmeemoney") {
    echo "Error!";
    exit();
}

// Присваиваем данные
$conversion_id = $_GET['conversion_id'];
$status = $_GET['status'];
$payout_round = $_GET['payout_round'];
$transaction_id = "admi_".$_GET['transaction_id'];
$offer_id = $_GET['offer_id'];
$ip = $_GET['ip'];
$pa = $_GET['pa'];
$payout = $_GET['payout'];
$payout_type = $_GET['payout_type'];
$refer = $_GET['refer'];
$city = $_GET['city_name'];

#var_dump($_GET);

// Функция для вычисления заработка
function calcP($array, $percent, $sum, $type){
    if ($sum <= 0) {
        exit();
    }
    
    if($type == 'pay') return $array + ($percent * ($sum / 100));
    if($type == 'rej'){ 
        $sum = $array - ($percent * ($sum / 100));

        if($sum <= 0){
            return 0;
        }else{
            return $sum;
        }
    }
}

function calcB($array, $sum, $type){
    if ($sum <= 0) {
        exit();
    }
    
    if($type == 'pay') return $array + $sum;
    if($type == 'rej'){
        $sum = $array - $sum;

        if($sum <= 0){
            return 0;
        }else{
            return $sum;
        }
    }
}

// Вытаскиваем цену
$offer = mysqli_fetch_assoc($db->query("SELECT * FROM `offers` WHERE `subid`='".$_GET['offer_id']."'"));

if($payout_round == 0){
    $offer['leadPrice'] = 0;
}

// Перезадаю значение
#$offer['leadPrice']; #= $payout_round * (40 / 100);

// Вытаскиваем ID рефералов
$user = mysqli_fetch_assoc($db->query("SELECT * FROM `users` WHERE `id`='".$_GET['aff_sub1']."'")); /* Sam pol'zovatel' */
$r1 = mysqli_fetch_assoc($db->query("SELECT * FROM `users` WHERE `id`='".$user['referal']."'")); /* 1 lvl Referal */
$r2 = mysqli_fetch_assoc($db->query("SELECT * FROM `users` WHERE `id`='".$r1['referal']."'")); /* 2 lvl Referal */

$partner = mysqli_fetch_assoc($db->query("SELECT * FROM `users` WHERE `id`='1'"));

// Проверяем, есть ли реферал второго уровня
if(empty($r2)) $r1pay = 10;

if($_GET['status'] == 'new'){
    if($_GET['payout_round'] < 1){
        // Для начала создаём саму конверсию
        $db->query("INSERT INTO `conversions` (`transaction_id`, `convpart`, `offer_id`, `webmaster_id`, `price`, `status`) VALUES ('$transaction_id', 'admitad', '".$offer['id']."', '".$user['id']."', '0', '$status')");
    }else{
        // Для начала создаём саму конверсию
        $db->query("INSERT INTO `conversions` (`transaction_id`, `convpart`, `offer_id`, `webmaster_id`, `price`, `status`) VALUES ('$transaction_id', 'admitad', '".$offer['id']."', '".$user['id']."', '".$offer['leadPrice']."', '$status')");
    }
}else if($_GET['status'] == 'pending'){
    $db->query("INSERT INTO `conversions` (`transaction_id`, `convpart`, `offer_id`, `webmaster_id`, `price`, `status`) VALUES ('$transaction_id', 'admitad', '".$offer['id']."', '".$user['id']."', '".$offer['leadPrice']."', '$status')");

    // Начисление будет проходить по порядку 3-2-1
    $_User->updateBalance($user['id'], $user['balance'], calcB($user['hold'], $offer['leadPrice'], 'pay'));

    if(!empty($r1)) $_User->updateRefbalance($r1['id'], $r1['balance'], calcP($r1['referal_hold'], 20, $offer['leadPrice'], 'pay'));

    if(!empty($r2)) $_User->updateRefbalance($r2['id'], $r2['balance'], calcP($r2['referal_hold'], 10, $offer['leadPrice'], 'pay'));
    
    // Начисление партнёру
    $db->query("UPDATE `users` SET `referal_hold`='".calcP($partner['referal_hold'], 20, $offer['leadPrice'], 'pay')."' WHERE `id`='".$partner['id']."'");
}elseif($_GET['status'] == 'approved'){
        // Accepted
        $db->query("UPDATE `conversions` SET `status`='approved' WHERE `transaction_id`='$transaction_id'");

        // Начисление будет проходить по порядку 3-2-1
        $_User->updateBalance($user['id'], calcB($user['balance'], $offer['leadPrice'], 'pay'), calcB($user['hold'], $offer['leadPrice'], 'rej'));


        if(!empty($r1)) $_User->updateRefbalance($r1['id'], calcP($r1['referal_balance'], 20, $offer['leadPrice'], 'pay'), calcP($r1['referal_hold'], 20, $offer['leadPrice'], 'rej'));


        if(!empty($r2)) $_User->updateRefbalance($r2['id'], calcP($r2['referal_balance'], 20, $offer['leadPrice']), calcP($r2['referal_hold'], 20, $offer['leadPrice'], 'rej'));
        
        $meebalance = $user['meecoins'] + ($offer['leadPrice'] * 2);
        $meecount = $user['meecount'] + ($offer['leadPrice'] * 2);
        
        $db->query("UPDATE `users` SET `meecoins`='$meebalance', `meecount`='$meecount' WHERE `id`='".$user['id']."'");

        // Начисление партнёру
            $_User->updateRefbalance($partner['id'], calcP($partner['referal_balance'], 20, $offer['leadPrice'], 'pay'), calcP($partner['referal_hold'], 20, $offer['leadPrice'], 'rej'));
    }elseif($_GET['status'] == 'declined'){
        // Declined
        $db->query("UPDATE `conversions` SET `status`='rejected' WHERE `transaction_id`='$transaction_id'");

        // Начисление будет проходить по порядку 3-2-1
        $_User->updateBalance($user['id'], $user['balance'], calcB($user['hold'], $offer['leadPrice'], 'rej'));

        if(!empty($r1)) $_User->updateRefbalance($r1['id'], $r1['balance'], calcP($r1['referal_hold'], 20, $offer['leadPrice'], 'rej'));
        if(!empty($r2)) $_User->updateRefbalance($r2['id'], $r2['balance'], calcP($r2['referal_hold'], 10, $offer['leadPrice'], 'rej'));

        // Начисление партнёру
        $db->query("UPDATE `users` SET `referal_hold`='".calcP($partner['referal_hold'], 20, $offer['leadPrice'], 'rej')."' WHERE `id`='".$partner['id']."'");
    }

// Status check end