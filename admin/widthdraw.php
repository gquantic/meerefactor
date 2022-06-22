<?
    /*
    *** Главный файл, отвечающий за корень сайта веб-мастера
    */

    //Подключение всех библиотек 
use Libs\Controllers\Site;

require_once "/libs/coDb.phpers/Db.php";
    $_Db = new Db(1, 1);

    session_start();

    $userData = $_Db->userSelect();

    // Получаем все необходимые данные
    $readywidthdrawSum = mysqli_fetch_assoc($_Db->query("SELECT SUM(`sum`) FROM `payouts` WHERE `status`='1'"));
    #var_dump($readywidthdrawSum);
    $waitwidthdrawSum = mysqli_fetch_assoc($_Db->query("SELECT SUM(`sum`) FROM `payouts` WHERE `status`='0'"));

    $payouts = $_Db->query("SELECT * FROM `payouts`");

    if($_SESSION['type'] != 'admin') header("Location: /webmaster/");

    require_once "../Libs/site.php";
    $_Site = new Site();

    // Получаем данные о запрашиваемой странице
    $name = $_Site->pageName();
    
    // Подключение шапки
    include "assets/layout/blocks/header.php";

    // Прорисовка сайта
    include "assets/layout/bodys/widthdraw.php";

    // Подключение подвала
    include "assets/layout/blocks/footer.php";