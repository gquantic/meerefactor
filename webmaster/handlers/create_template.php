<?
	/*
	*** Обработчик добавления площадки
	*/

	//Подключение всех библиотек 
	require_once "/libs/contrDb.php/Db.php";
	$db = new Db(1, 1);

	session_start();

	$user = $db->userSelect();
	$uid = $user['id'];

	$name = trim(strip_tags($_POST['tmp_name']));
	$template = trim(strip_tags($_POST['template']));
	$tmp_url = trim($_POST['tmp_url']);
	$tmp_comm = trim(strip_tags($_POST['tmp_comm']));
	$tmp_desc = trim(strip_tags($_POST['tmp_desc']));

	if($name == '' || $template == '' || $tmp_url == '' || $tmp_desc == ''){
		$msg = "Заполните все поля корректно!";
		$to = "create-template.php";

		header("Location: /webmaster/displaymessage.php?act=error&msg=$msg&from=$to");
		exit();
	}

	if(isset($_POST['create_template'])){
		# echo $name.' '.$template.' '.$tmp_url.' '.$tmp_comm.' '.$tmp_desc;

		$already_exits = $db->query("SELECT * FROM `templates` WHERE `web_id`='$uid' AND `name`='$name' LIMIT 1");
		if(mysqli_num_rows($already_exits) > 0){
			$msg = "У вас уже есть площадка с таким именем!";
			$to = "create-template.php";

			header("Location: /webmaster/displaymessage.php?act=error&msg=$msg&from=$to");
		}else{
			$insert = $db->query("INSERT INTO `templates` (web_id, template, url, comment, name, tmp_desc) VALUES ('$uid', '$template', '$tmp_url', '$tmp_comm', '$name', '$tmp_desc')");

			if(!empty($insert)){
				$msg = "Площадка успешно создана!";
				$to = "profile.php";

				header("Location: /webmaster/displaymessage.php?act=success&msg=$msg&from=$to");
			}else{
				$msg = "Произошла неизвестная ошибка. Пожалуйста, попробуйте снова.";
				$to = "create-template.php";

				header("Location: /webmaster/displaymessage.php?act=error&msg=$msg&from=$to");
			}
		}
	}