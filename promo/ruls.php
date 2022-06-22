<?php 
include '/libs/coDb.phpers/Db.php';
$db = new Db('0', '0'); 

session_start();

if(!isset($_SESSION['auth'])) header("Location: /");

$ud = $db->userSelect();

$utable = $db->query("SELECT * FROM `users` ORDER BY `meecount` DESC LIMIT 10");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Правила | MeeLiga</title>

	<!-- Favicon-->
	<link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
	<meta name="description" content="Авторизация | MeeMoney">
	<meta name="author" content="MirFox inc.">


	<link rel="stylesheet" type="text/css" href="css/plugins.css">
	<link rel="stylesheet" type="text/css" href="css/theme-styles.css">
	<link rel="stylesheet" type="text/css" href="css/blocks.css">
	<link rel="stylesheet" type="text/css" href="css/widgets.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700i,900," rel="stylesheet">

	<!--Styles for RTL-->

	<!--<link rel="stylesheet" type="text/css" href="css/rtl.css">-->

</head>

<body class="crumina-grid">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKGD7NP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Preloader -->

<!--div id="hellopreloader">
	<div class="preloader">
		<svg width="135" height="140" fill="#fff">
			<rect width="15" height="120" y="10" rx="6">
				<animate attributeName="height" begin="0.5s" calcMode="linear" dur="1s" repeatCount="indefinite" values="120;110;100;90;80;70;60;50;40;140;120" />
				<animate attributeName="y" begin="0.5s" calcMode="linear" dur="1s" repeatCount="indefinite" values="10;15;20;25;30;35;40;45;50;0;10" />
			</rect>
			<rect width="15" height="120" x="30" y="10" rx="6">
				<animate attributeName="height" begin="0.25s" calcMode="linear" dur="1s" repeatCount="indefinite" values="120;110;100;90;80;70;60;50;40;140;120" />
				<animate attributeName="y" begin="0.25s" calcMode="linear" dur="1s" repeatCount="indefinite" values="10;15;20;25;30;35;40;45;50;0;10" />
			</rect>
			<rect width="15" height="140" x="60" rx="6">
				<animate attributeName="height" begin="0s" calcMode="linear" dur="1s" repeatCount="indefinite" values="120;110;100;90;80;70;60;50;40;140;120" />
				<animate attributeName="y" begin="0s" calcMode="linear" dur="1s" repeatCount="indefinite" values="10;15;20;25;30;35;40;45;50;0;10" />
			</rect>
			<rect width="15" height="120" x="90" y="10" rx="6">
				<animate attributeName="height" begin="0.25s" calcMode="linear" dur="1s" repeatCount="indefinite" values="120;110;100;90;80;70;60;50;40;140;120" />
				<animate attributeName="y" begin="0.25s" calcMode="linear" dur="1s" repeatCount="indefinite" values="10;15;20;25;30;35;40;45;50;0;10" />
			</rect>
			<rect width="15" height="120" x="120" y="10" rx="6">
				<animate attributeName="height" begin="0.5s" calcMode="linear" dur="1s" repeatCount="indefinite" values="120;110;100;90;80;70;60;50;40;140;120" />
				<animate attributeName="y" begin="0.5s" calcMode="linear" dur="1s" repeatCount="indefinite" values="10;15;20;25;30;35;40;45;50;0;10" />
			</rect>
		</svg>

		<div class="text">Loading ...</div>
	</div>
</div-->

<!-- ... end Preloader -->

<!-- Header -->

<header class="header" id="site-header">
	<div class="container">
		<div class="header-content-wrapper">
			<a href="index.php" class="site-logo">
				<img src="img/logo.png" alt="MeeLiga" width="60px">
				<span style="font-size: 20px;color:#fff;font-weight: 400;">MeeLiga</span>
			</a>
            
            <nav id="primary-menu" class="primary-menu primary-menu-responsive">

				<!-- menu-icon-wrapper -->

				<a href="javascript:void(0)" id="menu-icon-trigger" class="menu-icon-trigger showhide">
					<span class="mob-menu--title">Menu</span>
					<span id="menu-icon-wrapper" class="menu-icon-wrapper" style="visibility: visible;">
						<svg width="1000px" height="1000px">
							<path id="pathD" d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800" style="stroke-dashoffset: 5803.15; stroke-dasharray: 2901.57, 2981.57, 240;"></path>
							<path id="pathE" d="M 300 500 L 700 500" style="stroke-dashoffset: 800; stroke-dasharray: 400, 480, 240;"></path>
							<path id="pathF" d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200" style="stroke-dashoffset: 6993.11; stroke-dasharray: 3496.56, 3576.56, 240;"></path>
						</svg>
					</span>
				</a>

				<ul class="primary-menu-menu primary-menu-indented scrollable" style="max-height: 460px; display: inline-block;">
					<li>
						<a href="/promo/">Рейтинг</a>
					</li>
					
					<li>
						<a href="/promo/ruls.php">Правила</a>
					</li>
					
					<li>
						<a href="/promo/faq.php">FAQ</a>
					</li>
				<li class="scrollable-fix"></li></ul>

			</nav>

			<a href="/" class="btn btn--large btn--primary">Назад на сайт<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 100.143px; top: -8.14288px; background-color: rgb(255, 186, 0); transform: scale(4.03226);"></div><div class="ripple ripple-on ripple-out" style="left: 68.1429px; top: -9.14288px; background-color: rgb(255, 186, 0); transform: scale(4.03226);"></div></div></a>

		</div>
	</div>
</header>

<!-- ... end Header -->


<div class="main-content-wrapper">
	<section data-settings="particles-1" class="main-section crumina-flying-balls particles-js bg-1">
		<div class="container">
			<div class="row medium-padding120 align-center">
				<div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
					<header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
						<div class="heading-sup-title">Общие правила проведения акции MeeMaster</div>
						<h2 class="heading-title heading--half-colored">Правила марафона MeeLiga</h2>
						<div class="heading-text">
						    <p style="text-align:left;font-weight:100px !important;"><b>Общие положения</b> <br><br>
1. MeeMaster — спонсорская акция от сервиса MeeMoney<br>
2. Период проведения марафона MeeLiga — c 01 ноября 2020 по 31 мая 2021 включительно.<br>
3. 01 июня 2021 подведение итогов рейтинга MeeLiga<br>
4. В марафоне MeeLiga участвуют все офферы представленные в сервисе MeeMoney<br>
5. За каждую одобренную конверсию по офферам, а так же за одобренные конверсии рефералов <br>
(в соотвествии с реферальной программой MeeMoney), вебмастер получает спонсорские баллы (MEECOINS),<br> 
сумма которых определяет его место в рейтинге MeeLiga.<br><br>
 
Формирование рейтингов<br>
В рейтинг MeeLiga входят ТОП-10 вебмастеров по количеству спонсорских баллов<br><br>
 
Количество начисляемых баллов MEECOINS зависит от действующих множителей и проводимых акциях:<br><br>
 
1. Стандарт (х2) — постоянный множитель который действует на все офферы;<br>
2. Промо (х4) — временное увеличение множителя начисляемых баллов в 2 раза по промоакциям проводимым на некоторые офферы сервиса;<br><br>
 
 
Призы победителей марафона MeeLiga<br>
Для победителей лиги вебмастеров определен общий призовой фонд в сумме 170 000 рублей.<br><br>
 
Распределение призового фонда между тройкой победителей<br>
1 -ое место в лиги вебмастеров - 100 000 рублей<br>
2 -ое место в лиги вебмастеров - 50 000 рублей<br>
3 -ое место в лиги вебмастеров - 20 000 рублей<br><br>
 
</p>
<h2 class="heading-title heading--half-colored">Правила MeeMarket</h2><br>
 <p style="text-align:left;font-weight:100px !important;">
<b>Общие положения</b><br><br>
 
1. Период работы MEE.MARKET — c 15.11.2020 по 31.12.2021.<br>
2. Валюта акционной зоны — MEECOINS.<br>
3. Только MEECOINS можно обменять на товары MEE.MARKET.<br><br>
 
<b>Правила начисления</b><br><br>
 
1. MEECOINS начисляются за каждую вышедшую из ХОЛДА конверсию по офферам, а так же за вышедшую из ХОЛДА конверсию рефералов (в соотвествии с реферальной программой MeeMoney)<br>
2. Количество начисляемых баллов MEECOINS зависит от действующих множителей и проводимых акциях:<br>
    2.1. Стандарт (х2) — постоянный множитель который действует на все офферы;<br>
    2.2. Промо (х4) — временное увеличение множителя начисляемых баллов в 2 раза по промоакциям проводимым на некоторые офферы сервиса;<br>
3. В акции участвуют все офферы. По тем офферам по которым будет действовать множитель Промо(х4) в карточке будут указаны акционные множители.<br>
4. Текущее количество заработанных MEECOINS отражается в личном кабинете вебмастера в блоке MEECOINS.<br>
5. Баланс заработанных MEECOINS обновляется сразу после выхода конверсии из холда.<br><br>
 
<b>Порядок покупки</b><br><br>
 
1. При обмене MEECOINS на товары акционной зоны соответствующая сумма списывается со счета вебмастера<br>
2. Вебмастер может обменять MEECOINS на призы из MEE.MARKET в любое время при накоплении достаточной суммы.<br>
3. Доставка призов по России осуществляется за счет партнерской сети MeeMoney<br>
4. Доставка в другие страны осуществляется за счет вебмастера.<br>
5. В отдельные регионы доставка может быть невозможной. Подробнее можно будет уточнить в информационном центре MeeMoney mail@meemoney.ru при оформлении заказа.<br>
6. За статусом доставки заказанных товаров вы можете следить на странице «Мои заказы»<br><br>
 
<b>Иные положения</b><br><br>
 
1. Условия акции могут быть изменены партнерской сетью MeeMoney, следите за обновлениями, чтобы оставаться в курсе событий.<br>
2. Список призов, представленный на витрине «MEE.MARKET», может быть изменен в любое время<br>
3. Если какого-то товара или приза нет в наличии, то партнерская программа MeeMoney вправе отказать в его доставке, сообщив об этом, и вернув в полном объеме акционные баллы MEECOINS, если те были потрачены<br>
4. Стоимость призов может меняться в зависимости от текущего курса USD.<br>
5. При отсутствии выбранной модели товара будет произведена замена товара на аналогичный.<br><br>
 
						    </p>
						</div>
					</header>
					<a data-scroll href="/promo/" class="btn btn--large btn--primary btn--transparent">Рейтинг участников</a>
				</div>
			</div>
		</div>
	</section>

	<!--section class="medium-padding100">
		<div class="container">
			<div id="started" class="row align-center">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="crumina-module crumina-module-slider pagination-bottom-center">
						<div class="swiper-container" data-show-items="3" data-prev-next="1">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="crumina-module crumina-pricing-table pricing-table--small">
										<div class="pricing-thumb">
											<img src="img/if_Bitcoin_2745023.png" class="woox-icon" alt="bitcoin">
											<h5 class="pricing-title">Bitcoin <span>BTC</span></h5>
											<div class="gain-drop-arrow">
												<svg class="woox-icon icon-arrow-up arrow-up active">
													<use xlink:href="#icon-arrow-up"></use>
												</svg>
												<svg class="woox-icon icon-arrow-down arrow-down">
													<use xlink:href="#icon-arrow-down"></use>
												</svg>
											</div>
										</div>
										<div class="price">
											<div class="price-sup-title">1 Bitcoin equals:</div>
											<div class="price-value">$9.635.34
												<div class="growth">+ 1.25%</div>
											</div>
										</div>
										<a href="005_coin_market.html#" class="btn btn--large btn--dark-lighter btn--transparent full-width">Buy Bitcoin Now!</a>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="crumina-module crumina-pricing-table pricing-table--small">
										<div class="pricing-thumb">
											<img src="img/if_etherium_eth_ethcoin_crypto_2844386.png" class="woox-icon" alt="ethereum">
											<h5 class="pricing-title">Ethereum <span>ETH</span></h5>
											<div class="gain-drop-arrow">
												<svg class="woox-icon icon-arrow-up arrow-up">
													<use xlink:href="#icon-arrow-up"></use>
												</svg>
												<svg class="woox-icon icon-arrow-down arrow-down active">
													<use xlink:href="#icon-arrow-down"></use>
												</svg>
											</div>
										</div>
										<div class="price">
											<div class="price-sup-title">1 Ethereum equals:</div>
											<div class="price-value">$820.93
												<div class="drop">- 4.22%</div>
											</div>
										</div>
										<a href="005_coin_market.html#" class="btn btn--large btn--dark-lighter btn--transparent full-width">Buy Ethereum Now!</a>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="crumina-module crumina-pricing-table pricing-table--small">
										<div class="pricing-thumb">
											<img src="img/if_dash_dashcoin_2844383.png" class="woox-icon" alt="dash">
											<h5 class="pricing-title">Dash <span>Dash</span></h5>
											<div class="gain-drop-arrow">
												<svg class="woox-icon icon-arrow-up arrow-up active">
													<use xlink:href="#icon-arrow-up"></use>
												</svg>
												<svg class="woox-icon icon-arrow-down arrow-down">
													<use xlink:href="#icon-arrow-down"></use>
												</svg>
											</div>
										</div>
										<div class="price">
											<div class="price-sup-title">1 Dash equals:</div>
											<div class="price-value">$611.24
												<div class="growth">+ 1.25%</div>
											</div>
										</div>
										<a href="005_coin_market.html#" class="btn btn--large btn--dark-lighter btn--transparent full-width">Buy Dash Now!</a>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
		</div>
	</section-->

	

</div>
<!-- Footer -->

<footer id="site-footer" class="footer ">

	<canvas id="can"></canvas>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-0 col-xs-12">
				<div class="widget w-info">
					<a href="index.html" class="site-logo">
						<img src="img/logo.png" alt="MeeMoney" width="70px">
						<h5>MeeLiga</h5>
						</svg>
					</a>
					<p>С 01.11.2020 по 01.06.2021 г.г. сервис MeeMoney проводит марафон MeeMaster! 
Зарабатывай бонусы MeeCoins и получи один трех призов или обменивай MeeCoins на ценные призы в магазине Mee.Market!</p>
				</div>

				<!--div class="widget w-contacts">
					<ul class="socials socials--white">
						<li class="social-item">
							<a href="005_coin_market.html#">
								<i class="fab fa-twitter woox-icon"></i>
							</a>
						</li>

						<li class="social-item">
							<a href="005_coin_market.html#">
								<i class="fab fa-dribbble woox-icon"></i>
							</a>
						</li>

						<li class="social-item">
							<a href="005_coin_market.html#">
								<i class="fab fa-instagram woox-icon"></i>
							</a>
						</li>

						<li class="social-item">
							<a href="005_coin_market.html#">
								<i class="fab fa-linkedin-in woox-icon"></i>
							</a>
						</li>

						<li class="social-item">
							<a href="005_coin_market.html#">
								<i class="fab fa-facebook-square woox-icon"></i>
							</a>
						</li>
					</ul>
				</div-->

			</div>
		</div>
	</div>

	<div class="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-0 col-xs-12">

					<span>© Вcе права защищены 2020</span>
					<span><a href="/">MeeMoney</a> - Партнерская программа</span>

					<div class="logo-design">
						<img src="img/logo-fire.png" alt="MeeMaster">
						<div class="design-wrap">
							<div class="sup-title">Марафон</div>
							<a href="/promo/" class="logo-title">MeeMaster</a>
						</div>
					</div>

					<div class="logo-design logo-design-crumina">
						<img src="img/crumina-logo.png" alt="MeeMoney">
						<div class="design-wrap">
							<div class="sup-title">Партнерка</div>
							<a href="/" class="logo-title">MeeMoney</a>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>

	<a class="back-to-top" href="005_coin_market.html#">
		<svg class="woox-icon icon-top-arrow">
			<use xlink:href="#icon-top-arrow"></use>
		</svg>
	</a>
</footer>

<!-- ... end Footer -->


<script src="js/method-assign.js"></script>

<!-- jQuery first, then Other JS. -->

<script src="js/jquery-3.3.1.js"></script>

<script src="js/js-plugins/leaflet.js"></script>
<script src="js/js-plugins/MarkerClusterGroup.js"></script>
<script src="js/js-plugins/crum-mega-menu.js"></script>
<script src="js/js-plugins/waypoints.js"></script>
<script src="js/js-plugins/jquery-circle-progress.js"></script>
<script src="js/js-plugins/segment.js"></script>
<script src="js/js-plugins/bootstrap.js"></script>
<script src="js/js-plugins/imagesLoaded.js"></script>
<script src="js/js-plugins/jquery.matchHeight.js"></script>
<script src="js/js-plugins/jquery-countTo.js"></script>
<script src="js/js-plugins/Headroom.js"></script>
<script src="js/js-plugins/jquery.magnific-popup.js"></script>
<script src="js/js-plugins/popper.min.js"></script>
<script src="js/js-plugins/particles.js"></script>
<script src="js/js-plugins/perfect-scrollbar.js"></script>
<script src="js/js-plugins/jquery.datetimepicker.full.js"></script>
<script src="js/js-plugins/svgxuse.js"></script>
<script src="js/js-plugins/select2.js"></script>
<script src="js/js-plugins/smooth-scroll.js"></script>
<script src="js/js-plugins/sharer.js"></script>
<script src="js/js-plugins/isotope.pkgd.min.js"></script>
<script src="js/js-plugins/ajax-pagination.js"></script>
<script src="js/js-plugins/swiper.min.js"></script>
<script src="js/js-plugins/material.min.js"></script>
<script src="js/js-plugins/orbitlist.js"></script>
<script src="js/js-plugins/highstock.js"></script>
<script src="js/js-plugins/bootstrap-datepicker.js"></script>
<script src="js/js-plugins/TimeCircles.js"></script>
<script src="js/js-plugins/ion.rangeSlider.js"></script>

<!-- FontAwesome 5.x.x JS -->

<script defer src="fonts/fontawesome-all.js"></script>

<script src="js/main.js"></script>

<!-- SVG icons loader -->
<script src="js/svg-loader.js"></script>
<!-- /SVG icons loader -->

</body>
</html>