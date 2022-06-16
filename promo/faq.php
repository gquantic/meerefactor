<?php 
include '../libs/db.php';
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
						<div class="heading-sup-title">FAQ</div>
						<h2 class="heading-title heading--half-colored">Вoпрос / Ответ</h2>
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

	<div class="row" style="margin-bottom:20%;">
	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb30" style="padding: 0 20% 0 20%">
					<ul class="crumina-module crumina-accordion accordion--style1" id="accordion1">

						<li class="accordion-panel">
							<div class="panel-heading">
								<a href="#toggleSample1" class="accordion-heading collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
									<span class="icons">
										<svg class="woox-icon icon-arrow-bottom"><use xlink:href="#icon-arrow-bottom"></use></svg>
									</span>
									<span class="title">Когда заканчивается акция MeeMaster?</span>
								</a>
							</div>

							<div id="toggleSample1" class="panel-collapse collapse" aria-expanded="false" role="tree" style="height: 30px;">
								<div class="panel-info">
									MeeMaster включает 2 акционные зоны с разными периодами проведения <br>
                                    Период работы MEE.MARKET — c 15.11.2020 по 31.12.2021 <br>
                                    Период работы MEELIGA — c 01.11.2020 по 01.06.2021
								</div>
							</div>
						</li>

						<li class="accordion-panel">
							<div class="panel-heading">
								<a href="#toggleOne1" class="accordion-heading collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
									<span class="icons">
										<svg class="woox-icon icon-arrow-bottom"><use xlink:href="#icon-arrow-bottom"></use></svg>
									</span>
									<span class="title">Кто может учавствовать в акции MeeMaster?</span>
								</a>
							</div>

							<div id="toggleOne1" class="panel-collapse collapse" aria-expanded="false" role="tree" style="height: 30px;">
								<div class="panel-info">
									В акции могут участвовать все вебмастера MeeMoney.ru независимо от даты подключения к партнерской сети.
								</div>
							</div>
						</li>

						<li class="accordion-panel">
							<div class="panel-heading">
								<a href="#toggleTwo1" class="accordion-heading collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
									<span class="icons">
										<svg class="woox-icon icon-arrow-bottom"><use xlink:href="#icon-arrow-bottom"></use></svg>
									</span>
									<span class="title">MEELIGA и MEE.MARKET - две части акции. Могу ли я учавствовать в каждой из них?</span>
								</a>
							</div>

							<div id="toggleTwo1" class="panel-collapse collapse" aria-expanded="false" role="tree" style="height: 30px;">
								<div class="panel-info">
									Да, вы одновременно можете копить баллы MEECOINS для участия в марафоне MEELIGA и для обмена MEECOINS на гарантированные призы в MEE.MARKET.<br>
                                    Но потратив MEECOINS на призы в MEE.MARKET Вы соотвественнно потеряете позиции в рейтинге MEELIGA.
								</div>
							</div>
						</li>
						
						<li class="accordion-panel">
							<div class="panel-heading">
								<a href="#toggleTwo2" class="accordion-heading collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
									<span class="icons">
										<svg class="woox-icon icon-arrow-bottom"><use xlink:href="#icon-arrow-bottom"></use></svg>
									</span>
									<span class="title">Можно ли обменять MEECOINS на деньги?</span>
								</a>
							</div>

							<div id="toggleTwo2" class="panel-collapse collapse" aria-expanded="false" role="tree" style="height: 30px;">
								<div class="panel-info">
									Нет, MEECOINS можно потратить только в магазине MEE.MARKET
								</div>
							</div>
						</li>
						
						<li class="accordion-panel">
							<div class="panel-heading">
								<a href="#toggleTwo3" class="accordion-heading collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
									<span class="icons">
										<svg class="woox-icon icon-arrow-bottom"><use xlink:href="#icon-arrow-bottom"></use></svg>
									</span>
									<span class="title">После завершения марафона MEELIGA будет ли работать MEE.MARKET?</span>
								</a>
							</div>

							<div id="toggleTwo3" class="panel-collapse collapse" aria-expanded="false" role="tree" style="height: 30px;">
								<div class="panel-info">
									Да, период работы MEE.MARKET — c 15.11.2020 по 32.12.2021
								</div>
							</div>
						</li>
						
						<li class="accordion-panel">
							<div class="panel-heading">
								<a href="#toggleTwo4" class="accordion-heading collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
									<span class="icons">
										<svg class="woox-icon icon-arrow-bottom"><use xlink:href="#icon-arrow-bottom"></use></svg>
									</span>
									<span class="title">Могу ли я купить в MEE.MARKET несколько одинаковых товаров?</span>
								</a>
							</div>

							<div id="toggleTwo4" class="panel-collapse collapse" aria-expanded="false" role="tree" style="height: 30px;">
								<div class="panel-info">
									Да, мы не ограничиваем вебмастеров в количестве товаров. Забирайте столько, сколько можете.
								</div>
							</div>
						</li>
						
						<li class="accordion-panel">
							<div class="panel-heading">
								<a href="#toggleTwo5" class="accordion-heading collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
									<span class="icons">
										<svg class="woox-icon icon-arrow-bottom"><use xlink:href="#icon-arrow-bottom"></use></svg>
									</span>
									<span class="title">Платная ли доставка товаров из MEE.MARKET?</span>
								</a>
							</div>

							<div id="toggleTwo5" class="panel-collapse collapse" aria-expanded="false" role="tree" style="height: 30px;">
								<div class="panel-info">
									Доставка призов по России осуществляется за счет партнерской сети MeeMoney. Доставка в другие страны осуществляется за счет вебмастера.
								</div>
							</div>
						</li>

					</ul>
				</div>
	</div>

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