<?
	/*
	*** Главный файл, отвечающий за корень сайта веб-мастера
	*/

	//Подключение всех библиотек 
use Libs\Controllers\Site;

require_once "/libs/coDb.phpers/Db.php";
	$_Db = new Db(1, 1);

	//Подключаем графики 
	require_once "charts/conv_charts.php";
	$_Db = new Db(1, 1);

	session_start();

	$userData = $_Db->userSelect();

	if($_SESSION['type'] != 'admin') header("Location: /webmaster/");

	require_once "../Libs/site.php";
	$_Site = new Site();

	// Получаем данные о запрашиваемой странице
	$name = $_Site->pageName();
    
    // Подключение шапки
	include "assets/layout/blocks/header.php";

    // Подключение подвала
	include "assets/layout/blocks/footer.php";

	?>
	
	<? if($_GET['act'] == 'success'): ?>

		<script type="text/javascript">
			swal("Операция успешно выполнена!", {
	        	icon: "success",
	        });
		</script>

	<? elseif($_GET['act'] == 'error'): ?>

		<script type="text/javascript">
			swal("Возникла проблема! Пожалуйста, повторите попытку позже.", {
	        	icon: "error",
	        });
		</script>	

	<? endif; ?>

	<script type="text/javascript">
		$(document).on('click', function(){
				var location = window.location.href;
				var url = new URL(location);
				var c = url.searchParams.get("from");

				if(c == null){
					c = 'index.php';
				}
	        	
	        	window.location.href = c;
	    });
	</script>