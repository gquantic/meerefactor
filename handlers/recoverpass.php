<?php
	include '../libs/db.php';
	$db = new Db('0', '0');

	$passRecover = $db->query("SELECT * FROM `passrecover` WHERE `foruser`='".$_GET['email']."'");

	if(mysqli_num_rows($passRecover) < 1){
		echo "<h3 style='font-family:Arial, calibri;'>Запрос не найден. <a href='/'>Вернуться на главную</a></h3>";
	}else{
	// Start

		$data = mysqli_fetch_assoc($passRecover);
		if($_GET['code'] == $data['code']){
			$permitted_chars = '0123456789abABCDEFGHIJKLcdefgMNOPQRShijklmnopqrstuvwxyzTUVWXYZ';
			$generatedPass = substr(str_shuffle($permitted_chars), 0, 8);

			$db->query("UPDATE `users` SET `password`='".md5($generatedPass)."' WHERE `email`='".$_GET['email']."'");
			$db->query("DELETE FROM `passrecover` WHERE `foruser`='".$_GET['email']."'");

        $db->sendMail($_GET['email'], "Пароль сброшен", "Пароль успешно сброшен! <br> Ваш новый пароль: $generatedPass");

        echo "<h3 style='font-family:Arial, calibri;'>Новый пароль оправлен Вам на почту. <a href='/'>Вернуться на главную</a></h3>";
		}else{
			echo "<h3 style='font-family:Arial, calibri;'>Доступ отклонён. <a href='/'>Вернуться на главную</a></h3>";
		}

	// End
	}
?>