<?php

namespace Libs\Controllers;

class Admitad
{
    private static $clientId = 'gYOKtVsZovUjaUn9dibAGbNzabut34';
    private static $clientSecret = 'ahAViNLbk0tYtorLEh4YuWlxvPhOlc';

    /**
     * @return string
     */
    public static function getClientId(): string
    {
        return self::$clientId;
    }

    /**
     * @return string
     */
    public static function getClientSecret(): string
    {
        return self::$clientSecret;
    }

    /**
     * @param $userId
     * @return mixed
     */
    public static function getClicks($userId)
    {
        $html = self::init("statistics/sub_ids/?date_start=26.06.2022&subid1=$userId");
        return $html;
    }

    /**
     * @param $userId
     * @return mixed
     */
    public static function getConversions($userId)
    {
        $html = self::init('statistics/actions/?date_start=01.04.2022&limit=10000');
        return $html;
    }

    public static function init($object)
    {
        $token = self::updateToken()['access_token'];

        $ch = curl_init("https://api.admitad.com/$object");
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
            'client_id'    => self::$clientId,
            'client_secret' => self::$clientSecret,
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

<?php

namespace Libs\Controllers;

class Admitad
{
    private static $clientId = 'gYOKtVsZovUjaUn9dibAGbNzabut34';
    private static $clientSecret = 'ahAViNLbk0tYtorLEh4YuWlxvPhOlc';

    /**
     * @return string
     */
    public static function getClientId(): string
    {
        return self::$clientId;
    }

    /**
     * @return string
     */
    public static function getClientSecret(): string
    {
        return self::$clientSecret;
    }

    /**
     * @param $userId
     * @return mixed
     */
    public static function getClicks($userId)
    {
        $html = self::init("statistics/sub_ids/?date_start=26.06.2022&subid1=$userId");
        return $html;
    }

    /**
     * @param $userId
     * @return mixed
     */
    public static function getConversions($userId)
    {
        $html = self::init('statistics/actions/?date_start=01.04.2022&limit=10000');
        return $html;
    }

    public static function init($object)
    {
        $token = self::updateToken()['access_token'];

        $ch = curl_init("https://api.admitad.com/$object");
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
            'client_id'    => self::$clientId,
            'client_secret' => self::$clientSecret,
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