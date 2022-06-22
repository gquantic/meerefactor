<?php

$debcard = \Libs\Controllers\Db::query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `top`=1 AND `web_show`='1' AND `category` IN ('debetcard') LIMIT 8");
$credcard = \Libs\Controllers\Db::query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `top`=1 AND `web_show`='1' AND `category` IN ('creditcard') LIMIT 8");

$games = \Libs\Controllers\Db::query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `top`=1 AND `web_show`='1' AND `category` LIKE ('game%%') LIMIT 8");

$job = \Libs\Controllers\Db::query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `top`=1 AND `web_show`='1' AND `category` LIKE ('job%%') LIMIT 8");

$loan = \Libs\Controllers\Db::query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `top`=1 AND `web_show`='1' AND `category` LIKE ('%%loan%%') LIMIT 8");

// Получаем данные о запрашиваемой странице
$pageName = "Главная";