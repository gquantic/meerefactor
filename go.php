<?
	/*
	* Нажатие на кнопку "протестировать" в карточке оффера
	*/

	//Подключение всех библиотек
	require_once "/libsDb.phpollers/Db.php";
	$db = new Db('NaN', 0);

	$id = intval($_GET['id']);
	$wid = intval($_GET['wid']);
	
	$user = mysqli_fetch_assoc($db->query("SELECT * FROM `users` WHERE id='$wid'"));
	
	$offer = mysqli_fetch_assoc($db->query("SELECT * FROM `offers` WHERE `id`='".intval($id)."'"));
	
    if($user['blocked'] == 1) exit("Переход по ссылке не удался.");
	
	$promo_url = 'http://meefinance.ru/go.php/?'."&aff_sub1=".intval($_GET['wid'])."&offerid=".$id;
	
	if ($offer['partner'] == 'leads') {
	    $promo_url = "{$offer['promo_url']}=".intval($_GET['wid']);
	    $promo_url = 'http://meefinance.ru/go.php?promo='.$promo_url;
	} elseif($offer['partner'] == 'admitad') {
	    $promo_url = "{$offer['promo_url']}=".intval($_GET['wid'])."&subid=".intval($_GET['wid']);
	    $promo_url = 'http://meegames.ru/go.php?promo='.$promo_url;
//	    var_dump($promo_url);
	}
    
    #var_dump($offer);
	header("Location: ".$promo_url);
	
	#echo $promo_url;