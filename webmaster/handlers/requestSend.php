<?
	/*
	*** Обработчик изменения пароля
	*/

	//Подключение всех библиотек 
	require_once "../../libs/db.php";
	$db = new Db(1, 1);

	session_start();

	$offerId = intval($_POST['id']);

	$userData = $db->userSelect();

	$offerData = $db->query("SELECT * FROM `offers` WHERE `id`='$offerId'");
	$offerData = mysqli_fetch_assoc($offerData);

	if(isset($_POST['requestCreate'])){
		$template = $_POST['template'];
		$comment = $_POST['comment'];
		$accept = $_POST['rulAccept'];
		$userId = $userData['id'];
		$advertiser_id = $offerData['author_id'];

		# echo $template.'<br>'.$comment.'<br>'.$accept;

		if($accept == ''){
			$msg = "Необходимо согласиться";
			$to = "connectoffer.php?id=$offerId";

			header("Location: /webmaster/displaymessage.php?act=error&msg=$msg&from=$to");
		}else{
			$insert = $db->query("INSERT INTO `connects` (user_id, advertiser_id, offer_id, template_id, comment) VALUES ('$userId', '$advertiser_id', '$offerId', '$template', '$comment')");

			if(!empty($insert)){
				$msg = "Заявка успешно отправлена!";
				$to = "/webmaster/viewoffer.php?id=".$offerData['id'];

				header("Location: /webmaster/displaymessage.php?act=success&msg=$msg&from=$to");
			}
		}
	}