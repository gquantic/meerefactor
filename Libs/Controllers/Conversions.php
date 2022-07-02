<?php

namespace Libs\Controllers;

class Conversions
{
    /**
     * @param $conversions - Объект БД
     * @param string $withStatus - Выделить со статусом?
     * @return int|mixed
     */
    public static function getAmount($conversions, string $withStatus = null)
    {
        $amount = 0;

        if ($withStatus == null) {
            while ($conversion = mysqli_fetch_assoc($conversions)) {
                $amount += $conversion['price'];
            }
        } else {
            while ($conversion = mysqli_fetch_assoc($conversions)) {
                if ($conversion['status'] == $withStatus)
                    $amount += $conversion['price'];
            }
        }

        return $amount;
    }
}