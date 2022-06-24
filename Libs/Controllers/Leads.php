<?php

namespace Libs\Controllers;

use Libs\Contracts\Api;
use Libs\Controllers\Db;

class Leads extends Db implements Api
{
    private static $secret = '5695bc2efbeb72bfb2d9d280becf6b84';
    private static $apiToken = '8da5de493dd523a2d23d4130a3c3b9de';
    protected static $url = 'http://api.leads.su';

    public static function init() : array
    {
        // Извлекаем пользователя
        $user = self::userSelect();

        // Собираем статистику
        $static = self::initRequest('webmaster', 'reports', "&aff_sub1={$user['id']}");

        // Перебираем и вносим
        $clicks = 0;

        foreach ($static['data'] as $object) {
            $clicks += $object['clicks'];
        }

        // Ответочка
        return [
            'clicks' => $clicks
        ];
    }

    public static function getRequest(): array
    {
        return [];
    }

    public static function postRequest(): array
    {
        return [];
    }

    public static function initRequest($object, $method, $params = ''): array
    {
        // CURL запрос
        $ch = curl_init(self::$url . "/{$object}/{$method}?token=" . self::$apiToken . $params);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $response = json_decode(curl_exec($ch), true);
        curl_close($ch);

        return (array) $response;
    }
}
