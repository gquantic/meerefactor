<?php

namespace Libs\Controllers;

/**
 * Файл, структуру и отображение сайта
 **/
class Site
{
    /* Получение адреса */
    public static function uri()
    {
        $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
        // и затем используем "левую" часть:
        return substr($uri_parts[0], 1);
    }

    public static function includeView($view)
    {

    }

    /* Генерация имени */
    public static function pageName()
    {
        $uri = self::uri();

        switch ($uri) {
            case 'home.php':
                $name = 'Главная | MeeMoney';
                break;

            case 'login.php':
                $name = 'Авторизация  | MeeMoney';
                break;

            case 'register.php':
                $name = 'Регистрация  | MeeMoney';
                break;

            case '404':
                $name = 'Страница не найдена | MeeMoney';
                break;

            default:
                $name = 'Партнёрская программа | MeeMoney';
                break;
        }

        return $name;
    }

    public static function startSession()
    {
        if (!$_SESSION) {
            session_start();
        }
    }
}