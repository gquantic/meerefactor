<?
	/*
	*** Главный файл, отвечающий за корень сайта веб-мастера
	*/

	//Подключение всех библиотек 
	require_once "../libs/db.php";
	$_Db = new Db(1, 1);
	$db = $_Db;

	session_start();

	$userData = $_Db->userSelect();

	if($_SESSION['type'] != 'webmaster') header("Location: /webmaster/");

	require_once "../libs/site.php";
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
		<? if($_GET['msg'] == '' || !isset($_GET['msg'])): ?>
		<script type="text/javascript">
			swal("Возникла проблема! Пожалуйста, повторите попытку позже.", {
	        	icon: "error",
	        });
		</script>	
		<? else: ?>
		<script type="text/javascript">
			swal("<?echo $_GET['msg'];?>", {
	        	icon: "error",
	        });
		</script>
		<? endif; ?>
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