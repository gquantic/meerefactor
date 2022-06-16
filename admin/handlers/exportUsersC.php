<?
	//Подключение всех библиотек 
	require_once "../../libs/db.php";
	$db = new Db(1, 1);

	$data = $_POST['data'];
	$id = $_POST['id'];
	$index = $_POST['index'];

	if($id != 'no'){
		$users = $db->query("SELECT * FROM `$data` WHERE `$index` LIKE ('$id%%') ORDER BY `$index` ASC LIMIT 10");
	}else{
		$users = $db->query("SELECT * FROM `$data` LIMIT 10");
	}

	while($user = mysqli_fetch_assoc($users)){
		?>
			<tr>
				<td><a href="user.php?id=<?=$user['id'];?>"><?=$user['id'];?></a></td>
				<td><?=$user['name'];?></td>
				<td><?=$user['email'];?></td>
				<td><?=$user['balance'];?></td>
				<td><?=$user['hold'];?></td>
				<td><?=$user['regdate'];?></td>
			</tr>
		<?
	}