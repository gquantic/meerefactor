<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

# Для начала подключим всё
use Libs\Controllers\Admitad;
use Libs\Controllers\Db;

# Конверсии из Адми
$conversions = Admitad::getConversions(1);

echo "<pre>";
foreach ($conversions['results'] as $conversion) {
    # Выделяем конверсию
    $conversionInSystem = Db::fQuery("SELECT * FROM `conversions` WHERE `transaction_id`='admi_{$conversion['id']}'");

    # Выделяем оффера
    $offerInSystem = Db::fQuery("SELECT * FROM `offers` WHERE `subid`='{$conversion['advcampaign_id']}'");

    $userInSystem = Db::fQuery("SELECT * FROM `users` WHERE `id`='{$conversion['subid1']}'");
    $referralFirst = Db::fQuery("SELECT * FROM `users` WHERE `id`='{$userInSystem['referal']}'");
    $referralSecond = Db::fQuery("SELECT * FROM `users` WHERE `id`='{$referralFirst['referal']}'");

    $forReferralFirst = $referralFirst['balance'] + intval(($offerInSystem['leadPrice'] * 20) / 100);
    $forReferralSecond = $referralSecond['balance'] + intval(($offerInSystem['leadPrice'] * 10) / 100);

    # Если же конверсия уже со статусом апрув и сумма больше нуля, но у нас статус не апрув и при этом тоже больше нуля,
    # то ставим статус need_check - "обратитесь в поддержку"
    if ($conversion['status'] == 'approved' && $conversion['payment'] > 0 && $conversionInSystem['price'] > 0 && $conversionInSystem['status'] != 'approved') {
        Db::query("UPDATE `conversions` SET `status`='need_check' WHERE `id`='{$conversionInSystem['id']}'");
    }

    if (empty($conversionInSystem)) {
        echo "<h2 style='color:red;'>This conversion not found on database</h2>";
        if ($conversion['payment'] > 0 && $conversion['status'] == 'approved') { // Если начисление не нулевое, то сразу делаем всё необходимое
            $newUserBalance = $userInSystem['balance'] + $offerInSystem['leadPrice'];

            # Начисляем пользователю
            Db::query("UPDATE `users` SET `balance`='$newUserBalance' WHERE `id`='{$userInSystem['id']}'");

            # Начисляем первому рефералу, если он есть
            if (!empty($referralFirst)) {
                Db::query("UPDATE `users` SET `balance`='$forReferralFirst' WHERE `id`='{$referralFirst['id']}'");
            }

            # Начисляем второму рефералу, если он есть
            if (!empty($referralSecond)) {
                Db::query("UPDATE `users` SET `balance`='$forReferralSecond' WHERE `id`='{$referralSecond['id']}'");
            }

            # Начисляю себе :3
            Db::query("UPDATE `users` SET `balance`='$forReferralFirst' WHERE `id`='1'");

            $payForConversion = intval($offerInSystem['leadPrice']);
            Db::query("INSERT INTO `conversions` (`transaction_id`, `convpart`, `offer_id`, `webmaster_id`, `price`, `status`) VALUES ('admi_{$conversion['id']}', 'admitad', '{$offerInSystem['id']}', '{$conversion['subid1']}', '$payForConversion', '{$conversion['status']}')");
        } else { // Если начисление нулевое, то просто создаём
            Db::query("INSERT INTO `conversions` (`transaction_id`, `convpart`, `offer_id`, `webmaster_id`, `price`, `status`) VALUES ('admi_{$conversion['id']}', 'admitad', '{$offerInSystem['id']}', '{$conversion['subid1']}', '0', '{$conversion['status']}')");
        }
    }

    if ($conversion['status'] == 'approved' && $conversionInSystem['price'] == 0) {
        # Тут очень аккуратно
        if ($conversion['payment'] > 0) { // Если оплата с лидса не нулевая, то начисляем пользователю на баланс
            echo "Ready for edit";

            echo "<h1>User in system:</h1>";
//            var_dump($offerInSystem['leadPrice']);
//            var_dump($referralFirst);
//            var_dump($forReferralSecond);

            $newUserBalance = $userInSystem['balance'] + $offerInSystem['leadPrice'];

            # Начисляем пользователю
            Db::query("UPDATE `users` SET `balance`='$newUserBalance' WHERE `id`='{$userInSystem['id']}'");

            # Начисляем первому рефералу, если он есть
            if (!empty($referralFirst)) {
                Db::query("UPDATE `users` SET `balance`='$forReferralFirst' WHERE `id`='{$referralFirst['id']}'");
            }

            # Начисляем второму рефералу, если он есть
            if (!empty($referralSecond)) {
                Db::query("UPDATE `users` SET `balance`='$forReferralSecond' WHERE `id`='{$referralSecond['id']}'");
            }

            # Начисляю себе :3
            Db::query("UPDATE `users` SET `balance`='$forReferralFirst' WHERE `id`='1'");

            $payForConversion = intval($offerInSystem['leadPrice']);
            Db::query("UPDATE `conversions` SET `status`='approved', `price`='$payForConversion' WHERE `id`='{$conversionInSystem['id']}'");
        } else { // Если оплата нулевая, то просто переводим статус в "waiting_payment" - "Ожидание оплаты"
            Db::query("UPDATE `conversions` SET `status`='waiting_payment' WHERE `id`='{$conversionInSystem['id']}'");
        }
//        Db::query("UPDATE `conversions` SET `price`='{$offer['leadPrice']}'");
    }

    echo "<h1>Conversion on system:</h1>";
    var_dump($conversionInSystem);
    echo var_dump($conversion) . '<br>';
    echo $conversion['payout'] . '<br>';
    echo $conversion['status'] . '<hr><br>';
}