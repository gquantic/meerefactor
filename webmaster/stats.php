<?
	/*
	*** Главный файл, отвечающий за корень сайта веб-мастера
	*/

	//Подключение всех библиотек 
	require_once "../libs/db.php";
	$_Db = new Db(1, 1);
	$db = $_Db;

	//Подключаем графики 
	require_once "../libs/api.php";
	$leads = new Leads();
    
	session_start();

	$userData = $_Db->userSelect();
	
	#$conversions = $leads->request("conversions", $userData['id']);
	$userId = $userData['id'];
	#var_dump($conversions);

	if($_SESSION['type'] != 'webmaster') header("Location: /advertiser/");

	require_once "../libs/site.php";
	$_Site = new Site();


	
	// С какой записи выводим и сколько
	if(!isset($_GET['convpage']) || $_GET['convpage'] == 0) $whereSelect = 1;
	else $whereSelect = $_GET['convpage']; 

	$convCount = 10;

	$conversions = $_Db->query("SELECT * FROM `conversions` WHERE `webmaster_id`='$userId' ORDER BY `id` DESC");


	$referals = $_Db->query("SELECT * FROM `users` WHERE `referal`='$userId'");
    
    // Достаём реферальные конверсии
    $refСonvs = array();
    while ($referal = mysqli_fetch_assoc($referals)) {
    	$conversion = mysqli_fetch_assoc($_Db->query("SELECT * FROM `conversions` WHERE `webmaster_id`='".$referal['id']."'"));
    	array_push($refСonvs, $conversion);
    }

	// Получаем данные о запрашиваемой странице
	$pageName = "Статистика и конверсии";

	#var_dump($leads->request("reports", "offset=0&grouping=month&aff_sub1"));

	$leadsStat = $leads->getReportsStatic();
    
    // Подключение шапки
	include "assets/layout/blocks/header.php";

	// Прорисовка сайта
	include "assets/layout/bodys/stats.php";

    // Подключение подвала
	include "assets/layout/blocks/footer.php";