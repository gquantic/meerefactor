<?php

namespace Libs\Controllers;

class Admitad
{
    public static function getClicks($userId)
    {
        $token = self::updateToken()['access_token'];

        $array = array(
            'client_id'    => 'gYOKtVsZovUjaUn9dibAGbNzabut34',
            'client_secret' => 'ahAViNLbk0tYtorLEh4YuWlxvPhOlc',
            'scope' => 'advertiser_statistics',
            'grant_type' => 'client_credentials',
        );

        $ch = curl_init("https://api.admitad.com/statistics/sub_ids/?date_start=26.06.2022&subid1=$userId");
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Authorization: Bearer $token"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $html = json_decode(curl_exec($ch), true);
        curl_close($ch);

        return $html;
    }

    public static function updateToken()
    {
        $array = array(
            'client_id'    => 'gYOKtVsZovUjaUn9dibAGbNzabut34',
            'client_secret' => 'ahAViNLbk0tYtorLEh4YuWlxvPhOlc',
            'scope' => ' statistics',
            'grant_type' => 'client_credentials',
        );

        $ch = curl_init('https://api.admitad.com/token/');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($array, '', '&'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $accessToken = json_decode(curl_exec($ch), true);
        curl_close($ch);

        return $accessToken;
    }
}