<?php
	include '/libs/coDb.phpers/Db.php';
	$db = new Db('0', '0');
	$userData = $db->userSelect();

	$notif = mysqli_fetch_assoc($db->query("SELECT * FROM `notifications` WHERE `id`='".$_POST['id']."'"));
	
	if($notif['foruser'] == $userData['id']){
		$db->query("UPDATE `notifications` SET `view`='1' WHERE `id`='".$_POST['id']."'");
		echo mysqli_num_rows($db->query("SELECT * FROM `notifications` WHERE `foruser`='".$userData['id']."' AND `view`='0'"));
	}else exit();
?>