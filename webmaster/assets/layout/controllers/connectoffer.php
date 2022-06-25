<?php
	$userData = \Libs\Controllers\Db::userSelect();
	$offerid = intval($_GET['id']);

	$uid = $userData['id'];

	$templates = \Libs\Controllers\Db::query("SELECT * FROM `templates` WHERE `web_id`='$uid' AND `moder_check`='1' LIMIT 30");

	$offers = \Libs\Controllers\Db::query("SELECT * FROM `offers` WHERE `modercheck`='1'");
	$offer = \Libs\Controllers\Db::query("SELECT * FROM `offers` WHERE `id`='$offerid'");
	$offer = mysqli_fetch_assoc($offer);

	if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");

	// Получаем данные о запрашиваемой странице
	$name = 'Подключение к офферу';