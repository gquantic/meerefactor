<?

$id = intval($_GET['id']);

$userData = \Libs\Controllers\Db::userSelect();
$offer = \Libs\Controllers\Db::query("SELECT * FROM `offers` WHERE `id`='$id'");
$offer = mysqli_fetch_assoc($offer);

// Получаем данные о запрашиваемой странице
$pageName = "Оффер \"".$offer['name']."\"";