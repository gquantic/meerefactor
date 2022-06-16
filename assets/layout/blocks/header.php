<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?echo $_Site->pageName()?></title>

	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	
	<!-- Adaptive -->
	<link rel="stylesheet" href="/assets/css/adaptive.css">

	<meta name="viewport" content="width=device-width">

	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	
	<script charset="UTF-8" src="//web.webpushs.com/js/push/d72063f23c59a73a4c5fa42c116acef4_1.js" async></script>
</head>
<body>
	<!-- Шапка сайта -->
	<div class="wrapper">
		<div class="header">
			<div class="container">
				<div class="header__burger">
					<span></span>
				</div>

				<div class="header__menu">
					<ul class="header__list">
						<li><a href="" class="header__link">Recomended</a></li>
						<li><a href="" class="header__link">Bookmarks</a></li>
						<li><a href="" class="header__link">Popular searchs</a></li>
						<li><img src="/assets/img/icons/menu.png" alt=""></li>
						<li><button>Sign in</button></li>
					</ul>
				</div>

				<a href="" class="services mobile__display"><img src="/assets/img/icons/services.png" alt=""></a>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		
		$(window).scroll(function(){
			var count = $(this).scrollTop();

			if(screen.width < 790){
				if(count >= 100){
					$('.header').css({
						'margin-top' : '-20px',
						'height' : '20px',
						'line-height' : '40px',
						'padding-top' : '0px',
						'background' : '#fff',
						'height' : '80px',
						'line-height' : '80px',
						'align-items' : 'center',
					});
					$('.header__burger').css({
						'margin-top' : '20px'
					});
				}

				if(count <= 99){
					$('.header').css({
						'background' : 'rgba(0,0,0,0)',
						'height' : '35px',
						'line-height' : '35px',
						'margin-top' : '35px',
						'align-items' : 'center'
					});
				}
			}else{
				if(count >= 100){
					$('.header').css({
						'margin-top' : '0px',
						'background' : '#fff',
						'height' : '80px',
						'line-height' : '80px',
						'align-items' : 'center'
					});
				}

				if(count <= 99){
					$('.header').css({
						'background' : 'rgba(0,0,0,0)',
						'height' : '35px',
						'line-height' : '35px',
						'margin-top' : '35px',
						'align-items' : 'center'
					});
				}
			}
		});
	</script>