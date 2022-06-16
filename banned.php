<?php
	//Подключение всех библиотек 
	require_once "libs/db.php";
	$db = new Db('NaN', 0);
	$userData = $db->userSelect();

	if($userData['blocked'] != 1) header("Location: /");

	include 'fatal/ban.php';
?>