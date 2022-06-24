<?php

namespace Libs\Contracts;

interface Api
{
    /**
     * Инициация класса и получение результатов
     *
     * @return array
     */
    public static function init() : array;

    /**
     * GET запрос
     *
     * @return array
     */
    public static function getRequest() : array;

    /**
     * POST запрос
     *
     * @return array
     */
    public static function postRequest() : array;

    /**
     * Инициация запроса
     *
     * @return array
     */
    public static function initRequest($object, $method, $params) : array;
}