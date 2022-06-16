<?
	/*
	*** Обработчик удаления оффера
	*** Удалять оффер будем только после окончательного решения админом.
	*/

	//Подключение всех библиотек 
	require_once "../../libs/db.php";
	$db = new Db(1, 1);

	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(0);

	session_start();

	if($_SESSION['type'] != 'admin'): 
		header("Location: /webmaster/");
		exit();
	endif;

	$id = intval($_GET['id']);
	$offer = mysqli_fetch_assoc($db->query("SELECT * FROM `offers` WHERE `id`='$id'"));

	if($_GET['accept'] == 'true' && $id != ''){
		if(file_exists('../../upload/offers/'.$offer['img'])) unlink('../../upload/offers/'.$offer['img']); 
		if(file_exists('../../upload/offers/'.$offer['banner1'])) unlink('../../upload/offers/'.$offer['banner1']);
		if(file_exists('../../upload/offers/'.$offer['banner2'])) unlink('../../upload/offers/'.$offer['banner2']);
		if(file_exists('../../upload/offers/'.$offer['banner3'])) unlink('../../upload/offers/'.$offer['banner3']);
	
		$db->query("DELETE FROM `offers` WHERE `id`='$id'");

		header("Location: /admin/offers.php");

		exit();
	}

	// 57, 10.9Mb
	// Получаем данные о запрашиваемой странице
	$name = "Удаление оффера";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Удаление оффера | MeeMoney</title>
</head>
<body>
	<div class="warn">
		<h1>Внимание!</h1>
		<p>Оффер будет удалён, вы уверены?</p>
		<div class="footer">
			<div class="buttons">
				<a href="http://safir/admin/view-offer.php?id=<?echo $_GET['id'];?>"><button class="cancel">Отменить</button></a>
				<a href="?id=<?echo $_GET['id'];?>&accept=true"><button class="delete">Удалить оффер</button></a>
			</div>
		</div>
	</div>

	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap');

		body{
			font-family: 'Roboto', sans-serif;
		}

		.warn{
			width: 400px;
			margin: 0 auto;
			padding: 3px 30px;
			background: rgba(0,0,0,.05);
		}

		h1{
			font-size: 31px;
			margin-top: 10px;
			font-weight: 400;
		}
		p{
			font-size: 17px;
			margin-top: -20px;
		}

		.buttons{
			width: fit-content;
			float: right;
		}
		.footer{
			margin-bottom: 10px;
			overflow: hidden;
		}
		
		button{
			cursor: pointer;
			outline: none;
			transition: .2s ease;
		}

		button.delete{
			color: #fff;
			background: #f70505;
			border: none;
			width: 131px;
			height: 35px;
		}
		button.delete:hover{
			background: #d20808;
		}
		button.delete:active{
			background: #af0808;
		}

		button.cancel{
			color: #000;
			background: rgba(0,0,0,.05);
			border: none;
			width: 131px;
			height: 35px;
		}
		button.cancel:hover{
			background: rgba(0,0,0,.08);
		}
		button.cancel:active{
			background: rgba(0,0,0,.1);
		}
	</style>
</body>
</html>