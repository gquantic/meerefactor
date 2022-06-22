<?
	//Подключение всех библиотек 
	require_once "/libs/contrDb.php/Db.php";
	$db = new Db(1, 1);

	$data = $_POST['data'];
	$id = $_POST['id'];
	$index = $_POST['index'];

	if($id != 'no'){
		$conversions = $db->query("SELECT * FROM `$data` WHERE `$index` LIKE ('$id%%') ORDER BY `$index` ASC");
	}else{
		$conversions = $db->query("SELECT * FROM `$data` ORDER BY `id` DESC LIMIT 10");
	}

	while($conversion = mysqli_fetch_assoc($conversions)){
		?>
			<tr>
				<td><a href="conversion.php?id=<?=$conversion['id'];?>"><?=$conversion['id'];?></a></td>
				<td><?=$conversion['transaction_id'];?></td>
				<td><?=$conversion['webmaster_id'];?></td>
				<td><?=$conversion['price'];?></td>
				<td><?=$conversion['pa'];?></td>
				<td><?=$conversion['autodate'];?></td>
				<td><?=$conversion['status'];?></td>
			</tr>
		<?
	}