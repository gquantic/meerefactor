<?php 
include '../libs/db.php';
$db = new Db('0', '0'); 

session_start();

if(!isset($_SESSION['auth'])) header("Location: /");

$ud = $db->userSelect();

$utable = $db->query("SELECT * FROM `users` ORDER BY `meecount` DESC LIMIT 10");

$finoffer = mysqli_fetch_assoc($db->query("SELECT * FROM `offers` WHERE `id`='33' LIMIT 1"));
$gameoffer = mysqli_fetch_assoc($db->query("SELECT * FROM `offers` WHERE `id`='157' LIMIT 1"));
$joboffer = mysqli_fetch_assoc($db->query("SELECT * FROM `offers` WHERE `id`='95' LIMIT 1"));
#$finoffer = mysqli_fetch_assoc($db->query("SELECT * FROM `offers` WHERE `category` LIKE '%%card%%' ORDER BY `leadPrice` DESC LIMIT 1"));
#$gameoffer = mysqli_fetch_assoc($db->query("SELECT * FROM `offers` WHERE `category` LIKE '%%game%%' ORDER BY `leadPrice` DESC LIMIT 1"));
#$joboffer = mysqli_fetch_assoc($db->query("SELECT * FROM `offers` WHERE `category` LIKE '%%job%%' ORDER BY `leadPrice` DESC LIMIT 1"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>MeeLiga</title>

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
						<div class="heading-sup-title">Марафон MeeManey</div>
						<h2 class="heading-title heading--half-colored">Рейтинг Вeбмастеров</h2>
						<div class="heading-text">Учавствуй в марафоне MeeMaster, стань лучшим вебмастером и получи главный приз от MeeMoney - 100 000 рублей!</div>
					</header>
					<a data-scroll href="/promo/ruls.php" class="btn btn--large btn--primary btn--transparent">Правила марафона</a>
				</div>
			</div>
		</div>
	</section>

	<section class="medium-padding100">
		<div class="container">
			<div id="started" class="row align-center">
			    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			        <h3 class="title">Топ офферы для заработка</h3>
			    </div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="crumina-module crumina-module-slider pagination-bottom-center">
						<div class="swiper-container" data-show-items="3" data-prev-next="1">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="crumina-module crumina-pricing-table pricing-table--small">
										<div class="pricing-thumb">
											<img src="/upload/offers/<?php echo $finoffer['image']; ?>" class="woox-icon" alt="bitcoin">
											<h5 class="pricing-title"><?php echo $finoffer['name']; ?> <span>Финансовый</span></h5>
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
											<div class="price-sup-title">Цена за лид:</div>
											<div class="price-value" style="color:#8dc647;"><?php echo $finoffer['leadPrice']; ?>₽
												<div class="growth" style="color:#ffba00;"><?php echo $finoffer['leadPrice']*2; ?><img src="img/logo.png" width="20px" style="margin-bottom:-2px;margin-left:5px;"></div>
											</div>
										</div>
										<a href="/webmaster/viewoffer.php?id=<?php echo $finoffer['id']; ?>" target="__blank" class="btn btn--large btn--dark-lighter btn--transparent full-width">Перейти к офферу</a>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="crumina-module crumina-pricing-table pricing-table--small">
										<div class="pricing-thumb">
											<img src="/upload/offers/<?php echo $gameoffer['image']; ?>" class="woox-icon bg-white" alt="Логотип">
											<h5 class="pricing-title"><?php echo $gameoffer['name']; ?> <span>Финансовый</span></h5>
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
											<div class="price-sup-title">Цена за лид:</div>
											<div class="price-value" style="color:#8dc647;"><?php echo $gameoffer['leadPrice']; ?>₽
												<div class="growth" style="color:#ffba00;"><?php echo $gameoffer['leadPrice']*2; ?><img src="img/logo.png" width="20px" style="margin-bottom:-2px;margin-left:5px;"></div>
											</div>
										</div>
										<a href="/webmaster/viewoffer.php?id=<?php echo $gameoffer['id']; ?>" target="__blank" class="btn btn--large btn--dark-lighter btn--transparent full-width">Перейти к офферу</a>
									</div>
								</div><div class="swiper-slide">
									<div class="crumina-module crumina-pricing-table pricing-table--small">
										<div class="pricing-thumb">
											<img src="/upload/offers/<?php echo $joboffer['image']; ?>" class="woox-icon bg-white" alt="Логотип">
											<h5 class="pricing-title"><?php echo $joboffer['name']; ?> <span>Игровой</span></h5>
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
											<div class="price-sup-title">Цена за лид:</div>
											<div class="price-value" style="color:#8dc647;"><?php echo $joboffer['leadPrice']; ?>₽
												<div class="growth" style="color:#ffba00;"><?php echo $joboffer['leadPrice']*2; ?><img src="img/logo.png" width="20px" style="margin-bottom:-2px;margin-left:5px;"></div>
											</div>
										</div>
										<a href="/webmaster/viewoffer.php?id=<?php echo $joboffer['id']; ?>" target="__blank" class="btn btn--large btn--dark-lighter btn--transparent full-width">Перейти к офферу</a>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row medium-padding120">
			    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			        <h3 class="title">Рейтинг вебмастеров</h3>
			    </div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="mCustomScrollbar scrollable-responsive-table" data-mcs-theme="dark">
						<table class="pricing-tables-wrap-table-blurring">
							<thead>
							<tr>
								<th>#</th>
								<th>Имя</th>
								<th>Дата регистрации</th>
								<th>Микоины</th>
								<th>Покупок</th>
								<th>Всего конверсий</th>
							</tr>
							</thead>

							<tbody>
							<?php while($user = mysqli_fetch_assoc($utable)): $userRait = $userRait + 1; $leadsCount = mysqli_num_rows($db->query("SELECT * FROM `conversions` WHERE `webmaster_id`='".$user['id']."'"));?>
    							<tr class="crumina-module crumina-pricing-table pricing-table--style-table-blurring c-brown" 
    							style="border-left: 3px solid <?php if($userRait == 1) echo "#ffc729"; elseif ($userRait == 2) echo "#ee7800"; elseif($userRait == 3) "#c7c7c7"; else echo "#505050"; ?>">
    								<td>
    									<?php echo $userRait; ?>
    								</td>
    								<td>
    									<div class="pricing-thumb">
    										<!--img src="img/if_Bitcoin_2745023.png" class="woox-icon" alt="bitcoin"-->
    										<h6 class="pricing-title"><?php echo $user['name']; ?></h6>
    									</div>
    								</td>
    								<td>
    									<div class="currency-details-item">
    										<div class="value"><?php echo substr($user['regdate'], 0, 10); ?></div>
    									</div>
    								</td>
    								<td>
    									<div class="currency-details-item">
    										<div class="value c-primary"><?php echo $user['meecount']; ?></div>
    									</div>
    								</td>
    								<td>
    									<div class="currency-details-item">
    										<div class="value c-green-succes">0</div>
    									</div>
    								</td>
    								<td>
    									<div class="currency-details-item">
    										<div class="value"><?php echo $leadsCount; ?></div>
    									</div>
    								</td>
    							</tr>
							<?php endwhile; ?>
							</tbody>
							<tfoot>
							<tr>
								<td colspan="8">Тройка лидеров, участников данного рейтинга разделят между собой общий призовой фонд - 170 000 рублей. 1-е место 100 000 рублей. 2-е место 50 000 рублей. 3-е место 20 000 рублей.</td>
							</tr>
							</tfoot>
						</table>
						<style>
    					    .pricing-tables-wrap-table-blurring > tbody > tr.c-brown > td:first-child:before{
    					        background: rgba(0,0,0,0) !important;
    					    }   
    					</style>
					</div>
				</div>
			</div>
		</div>
	</section>

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

<style>
    .title{
        font-size: 1.375em;
        color: #ffba00;
        margin-bottom: 35px;
        text-align: center;
    }
    .crumina-module .pricing-title {
        width: 150px ;
    overflow: hidden ;
    text-overflow: ellipsis ;
    white-space: nowrap;
    text-overflow: ellipsis;
    }
    .pricing-table--small .pricing-title > span{
        width: auto;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    text-overflow: ellipsis;
    }
</style>

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