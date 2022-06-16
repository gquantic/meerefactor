<?php
	//Подключение всех библиотек 
	require_once "../../libs/db.php";
	$db = new Db(1, 1);

	session_start();

	if($_SESSION['type'] != 'admin'): 
		header("Location: /webmaster/");
		exit();
	endif;

	if(isset($_GET['true'])){
		$db->query("UPDATE `payouts` SET `status`='".$_GET['status']."' WHERE `id`='".$_GET['id']."'");
		header("Location: /admin/widthdraw.php");
	}
?><br><br>
Вы уверены, что хотите перевести вывод в статус "принят"? <br><br><br>
<a href="?id=<?=$_GET['id'];?>&true&status=1">Принять</a>
<a href="?id=<?=$_GET['id'];?>&true&status=0">В ожидание</a>
<a href="?id=<?=$_GET['id'];?>&true&status=-1">Отклонить</a><br><br><br>
<a href="../widthdraw.php">Назад</a>

<style type="text/css">
	body{
		font-family: Arial;
		text-align: center;
	}
	a{
		padding: 10px 50px;
		color: #000;
		margin-right: 15px;
		text-decoration: none;
		background: rgba(0,0,0,.1);
		border-radius: 4px;
		transition: .2s;
	}
	a:hover{
		background: rgba(0,0,0,.15);
	}
</style>