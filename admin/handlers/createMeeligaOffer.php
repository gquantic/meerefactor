<?
/*
*** Обработчик добавления оффера
*/

//Подключение всех библиотек
require_once "../../libs/db.php";
$db = new Db(1, 1);

session_start();

// Подгружаем заполненные поля
$image = $_POST['offerImage'];
$name = $_POST['offerName'];
$desc = $_POST['description'];
$shortdesc = trim(strip_tags($_POST['shortdesc']));
$category = $_POST['category'];
$pice = $_POST['price'];

// Остальные операции
if(intval($topOffer) != 1) $topOffer = 0;

// $_FILES['offerImage']['name'];
// Преобразовываем файлы
$image = $db->uploadImage($_FILES['offerImage']['name'], $_FILES['offerImage']['tmp_name'], '../../upload/promo/meeliga/');

// Запись в бд
$insert = $db->query("INSERT INTO `meeshop` (`img`, `title`, `shortdesc`, `text`, `price`, `category`) VALUES ('$image', '{$_POST['offerName']}', '{$_POST['offerLastName']}', '{$_POST['description']}', '{$_POST['price']}', '{$_POST['category']}')");

if(!empty($insert)){
    header("Location: ../displaymessage.php?act=success&from=offers.php");
}else{
    header("Location: ../displaymessage.php?act=error&from=create-offer.php");
}


// id	image	description	leadPrice	endDate	endTime	acCountries	blockCountries	acceptSocs	blockSocs	banner1	banner2	banner3	modercheck	modercomment
