<?php

namespace Libs\Controllers;

/**
 * Класс для работы со структурой сайта
 */
class Site
{
    /**
     * Получение адреса
     *
     * @return false|string
     */
    public static function uri()
    {
        $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
        return substr($uri_parts[0], 1); // и затем используем "левую" часть:
    }

    /**
     * Генерация имени
     *
     * @return string
     */
    public static function pageName(): string
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

    /**
     * Запуск сессии
     *
     * @return void
     */
    public static function startSession()
    {
        if (!$_SESSION) {
            session_start();
        }
    }

    /**
     * Закрытие сессии
     *
     * @return void
     */
    public static function closeSession()
    {
        if ($_SESSION) {
            session_destroy();
        }
    }
}