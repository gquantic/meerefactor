<?
	$cat = $_POST['category'];

	//Подключение всех библиотек 
	require_once "../../libs/db.php";
	$_Db = new Db(1, 1);


	switch ($cat) {
		case 'all':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1'"));
		break;


		// Финансовые офферы
		case 'fin_offers':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('creditcard', 'debetcard', 'loan', 'insure')"));
		break;

		case 'fin_creditcard':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category`='creditcard'"));
		break;

		case 'fin_debetcard':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category`='debetcard'"));
		break;

		case 'fin_loan':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category`='loan'"));
		break;

		case 'fin_insure':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category`='insure'"));
		break;
		
		case 'fin_forbusiness':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category`='forbusiness'"));
		break;


		// Игровые офферы
		case 'games':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('game_browser', 'game_client', 'game_mobile')"));
		break;

		case 'games_browser':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('game_browser')"));
		break;

		case 'games_client':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('game_client')"));
		break;

		case 'games_mobile':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('game_mobile')"));
		break;



		// Mobile offers
		case 'mobile':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('mobile_instal', 'mobile_use')"));
		break;

		case 'mobile_instal':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('mobile_instal')"));
		break;

		case 'mobile_use':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('mobile_use')"));
		break;



		// Job
		case 'job':
				return export( $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('job_taxi', 'job_delivery', 'job_other')"));
		break;

		case 'job_taxi':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('job_taxi')"));
		break;

		case 'job_delivery':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('job_delivery')"));
		break;

		case 'job_other':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('job_other')"));
		break;



		// Azart
		case 'azart':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('azart_bets', 'azart_cazino', 'azart_other')"));
		break;

		case 'azart_bets':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('azart_bets')"));
		break;

		case 'azart_cazino':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('azart_cazino')"));
		break;

		case 'azart_other':
				return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('azart_other')"));
		break;

		
		default:
			return export($_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('other')"));
		break;
	}




	function export($offers){
		if(mysqli_num_rows($offers) < 1){
			?>
			<div class="col-md-12 text-center mt-3" style=""><p style="font-size: 16px;">В этой категории пока нет офферов :(</p></div>
				<?
			}else{
				?>
				<?while($offer = mysqli_fetch_assoc($offers)): if($offer['modercheck'] == 1 && $offer['web_show'] == 1):?>
				<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
					<div class="card">
						<div class="body product_item" style="/*min-height: 326px;*/">
							<?php if($offer['action'] != ''): ?><span class="label new" style="background: #f15353;"><?php echo $offer['action']; ?></span><?php endif; ?>
							<!--span class="label onsale">Популярный</span-->
							<div class="text-center" style="height:250px;display:flex;align-items: center;text-align: center;justify-content: center;"><img src="/upload/offers/<?echo $offer['image'];?>" style="width:100%;" alt="Product" class="img-fluid cp_img" /></div>
							<div class="product_details">
								<a href="viewoffer.php?id=<?echo $offer['id'];?>"><p><?php echo $offer['name']; ?></p></a>
								<ul class="product_price list-unstyled">
									<li class="old_price" style="color:#ee2558;">Холд: <?echo $offer['hold'];?> дней</li>
									<li class="new_price" style="font-size:16px;"><?echo $offer['leadPrice'];?>₽</li>
								</ul>                                
							</div>
							<div class="action">
								<!--a href="viewoffer.php?id=<?#echo $offer['id'];?>" class="btn btn-info waves-effect"><i class="zmdi zmdi-eye"></i></a-->
								<a href="viewoffer.php?id=<?echo $offer['id'];?>" class="btn btn-primary waves-effect">Подробнее</a>
							</div>
						</div>
					</div>                
				</div>
				<?endif; endwhile;?>
				<?}}
	/*
	$offers = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1'");



	$fin_offers = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('creditcard', 'debetcard', 'loan', 'insure')");
	$fin_creditcard = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('creditcard')");
	$fin_debetcard = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('debetcard')");
	$fin_loan = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('loan')");
	$fin_insure = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('insure')");




	$games = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('game_browser', 'game_client', 'game_mobile')");
	$games_browser = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('game_browser')");
	$games_client = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('game_client')");
	$games_mobile = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('game_mobile')");





	$mobile = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('mobile_instal', 'mobile_use')");
	$mobile_instal = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('mobile_instal')");
	$mobile_use = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('mobile_use')");



	$job = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('job_taxi', 'job_delivery', 'job_other')");
	$job_taxi = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('job_taxi')");
	$job_delivery = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN (job_delivery')");
	$job_other = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('job_other')");



	$azart = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('azart_bets', 'azart_cazino', 'azart_other')");
	$azart_bets = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('azart_bets')");
	$azart_cazino = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('azart_cazino')");
	$azart_other = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('azart_other')");


	

	$other = $_Db->query("SELECT * FROM `offers` WHERE `modercheck`='1' AND `category` IN ('other')"); 
	*/