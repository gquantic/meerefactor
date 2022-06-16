<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png">
    <meta name="description" content="Партнёрская программа MeeMoney">
    <meta name="author" content="Ssapphire inc.">
    <title>MeeMarket | Партнёрская программа MeeMoney</title>
    <link rel="stylesheet" href="assets/layout/blocks/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/layout/blocks/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
    <link rel="stylesheet" href="assets/layout/blocks/assets/plugins/charts-c3/plugin.css"/>

    <link rel="stylesheet" href="assets/layout/blocks/assets/plugins/morrisjs/morris.min.css" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/layout/blocks/assets/css/style.min.css">

    <!-- Interactive JS -->
    <script type="text/javascript" src="libs/ui.js"></script>

    <!-- Icons and fonts -->
    <script src="https://kit.fontawesome.com/ada758ae4a.js" crossorigin="anonymous"></script>

    <!-- Bootstrap Select Css -->
<link rel="stylesheet" href="/webmaster/assets/layout/blocks/assets/layout/blocks/assets/plugins/bootstrap-select/css/bootstrap-select.css" />

<!-- Multi Select Css -->
<link rel="stylesheet" href="/webmaster/assets/layout/blocks/assets/layout/blocks/assets/plugins/multi-select/css/multi-select.css">
<!-- Select2 -->
<link rel="stylesheet" href="/webmaster/assets/layout/blocks/assets/layout/blocks/assets/plugins/select2/select2.css" />

<!-- JQuery DataTable Css -->
<link rel="stylesheet" href="/webmaster/assets/layout/blocks/assets/layout/blocks/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">

    <!-- Jquery -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.js"
      integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
      crossorigin="anonymous"></script>
      
      <script type="text/javascript" src="https://botsrv.com/qb/widget/DYRAQrGBgWmW05dx/wKYPWr6qdXmd0px4" async defer crossorigin="anonymous"></script>

    <!-- Production -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    
    <script charset="UTF-8" src="https://web.webpushs.com/js/push/d72063f23c59a73a4c5fa42c116acef4_1.js" async></script>
</head>

<body class="theme-blush">

<!-- Preloader -->
<div class="preloader">
  <div class="preloader__row">
    <div class="preloader__item"></div>
    <div class="preloader__item"></div>
  </div>
</div>

<!-- Main Content -->

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Главная</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                    <li class="breadcrumb-item active">Главная</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card widget_2 traffic">
                    <div class="body">
                        <h6>Баланс</h6>
                        <h2 style="color:#fa6801;"><?echo number_format($userData['meecoins'], 0, '', ' '); ?><span style="font-size:18px;"><img src="/promo/img/logo.png" width="22px" style="transform:translateY(-3px);margin-left:5px;"></span></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card widget_2 sales">
                    <div class="body">
                        <h6>Всего покупок</h6>
                        <h2>0</h2>
                    </div>
                </div>
            </div>
            <!--div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card widget_2 sales">
                    <div class="body">
                        <h6>Прогноз</h6>
                        <h2>0<span style="font-size:18px;">₽</span></h2>
                        <small>Прогноз баланса</small>
                    </div>
                </div>
            </div-->
        </div>
        
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="body cats">
                        <a href="?"><button <?if(!$_GET['cat']):?> class="get_active" <?endif;?>>Все товары</button></a>
                        <a href="?cat=car"><button <?if($_GET['cat'] == "car"):?> class="get_active" <?endif;?> >Транспорт</button></a>
                        <a href="?cat=cert"><button <?if($_GET['cat'] == "cert"):?> class="get_active" <?endif;?> >Подарочные сертификаты</button></a>
                        <a href="?cat=clock"><button <?if($_GET['cat'] == "clock"):?> class="get_active" <?endif;?> >Часы</button></a>
                        <a href="?cat=game"><button <?if($_GET['cat'] == "game"):?> class="get_active" <?endif;?> >Развлечение</button></a>
                        <a href="?cat=bag"><button <?if($_GET['cat'] == "bag"):?> class="get_active" <?endif;?> >Сумки и аксессуары</button></a>
                        <a href="?cat=tech"><button <?if($_GET['cat'] == "tech"):?> class="get_active" <?endif;?> >Техника</button></a>
                        <a href="?cat=other"><button <?if($_GET['cat'] == "other"):?> class="get_active" <?endif;?> >Другое</button></a>
                        <a href="?cat=service"><button <?if($_GET['cat'] == "service"):?> class="get_active" <?endif;?> >Сервисы</button></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row clearfix">
            <?php 
                $items = $db->query("SELECT * FROM `meeshop` WHERE `active`='1' AND `category` LIKE '%%".$_GET['cat']."%%'");
                while($item = mysqli_fetch_assoc($items)){?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <a href="/webmaster/product.php?id=<?php echo $item['id']; ?>" class="productblock">
                        <div class="card">
                            <div class="body product_item product" style="/*min-height: 326px;*/">
        												<!--span class="label onsale">Популярный</span-->
        						<div class="text-center image" style="height:250px;display:flex;align-items: center;text-align: center;justify-content: center;"><img src="<?php echo $item['img']; ?>" style="width:100%;" alt="Product" class="img-fluid cp_img"></div>
        						<div class="product_details">
        							<p><?php echo $item['title']; ?></p>
        							<p class="shortdesc"><?php echo $item['shortdesc']; ?></p>
        							<ul class="product_price list-unstyled text-right">
        								<li class="old_price" style="color:#ee2558;"></li>
        								<li class="new_price" style="font-size:16px;"><?php echo number_format(round($item['price'] / 1000), 0, '', ' '); ?>K <img src="http://lk.meemoney.ru/promo/img/logo.png" width="20px" style="margin-bottom: 5px;margin-left:10px;"></li>
        							</ul>                                
        						</div>
        					</div>
					</div>
					</a>
                    </div>
                <?} if(mysqli_num_rows($items) < 1){?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="alert alert-warning" style="background: #33271f;box-shadow: 0px 0px 14px rgba(52,39,31,1);">
                            Товаров в этой категории пока нет :(
                        </div>
                    </div>
                <?}?>
        </div>
    </div>
</section>

<script type="text/javascript">
    // Preloader
    window.onload = function () {
        setTimeout(function(){
            document.body.classList.add('loaded_hiding');
            window.setTimeout(function () {
              document.body.classList.add('loaded');
              document.body.classList.remove('loaded_hiding');
            }, 500);
        }, 980);
    }
</script>
<style type="text/css">
    .cats button:active, .cats button:focus{
        background: #33261f !important;
        box-shadow: 0px 0px 14px rgba(52,39,31,1);
        color: #fff;
    }
    .cats button.get_active{
        background: #33261f !important;
        box-shadow: 0px 0px 14px rgba(52,39,31,1);
        color: #fff;
    }
    .cats button:active, .cats button:focus{
        outline: none !important;
    }
    .cats{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .cats button{
        padding: 10px 30px;
        border: none;
        color: #bfbfbf;
        background: rgba(0,0,0,0);
        border-radius: 6px;
        transition: .1s ease;
    }
    .cats button:hover{
        background: rgba(250,250,250,.05);
        color: #fff;
    }
    .product{
        transition: .3s ease;
    }
    .product .shortdesc{
        font-size: 14px;
        color: #C0CBE6;
        margin-top: -20px;
    }
    .product div.image{
        background: radial-gradient(50% 50% at 50% 50%, 
        rgba(251,104,0,0.05) 0%, 
        rgba(251,104,0,0.175) 0%, 
        rgba(251,104,0,0.07) 52.09%, 
        rgba(251,104,0,0.025) 73.1%, 
        rgba(251,104,0,0) 100%),rgba(0,0,0,0);
        height: 280px !important;
    }
    .product img{
        border-radius: 10px;
    }
    .product p{
        font-size: 18px;
    }
    .product:hover{
        transform: translateX(-5px) translateY(-5px);
    }
    section.content{
        margin: 0 !important;
        background: #171717;
        border-color: #171717 !important;
    }
    body{
        background: #171717 !important;
    }
    .block-header h2{
        color: #fff;
    }
    .card .body{
        background: #1f1f1f;
        color: #fff;
    }
    .product_details p{
        color: #fff;
    }
    .product_details li.new_price{
        color: #fb6800 !important;
    }
    .meeblock{
        background: url(https://wf.cdn.gmru.net/warface_seasons/img/background.0a67d20e.png) !important;
        color: #fff !important;
        height: 100px !important;
        display: flex;
        align-items: center;
        transition: .3s ease;
        background-position: bottom center;
    }
    .meeblock:hover{
        transform: translateX(-5px) translateY(-5px);
        box-shadow: 5px 5px 14px rgba(0,0,0,.4);
    }
    .meeblock .inner{
        margin-top: 20px;
    }
    .meeblock img{
        margin-right: 15px;
        float: left;
        margin-top: -6px;
    }
    .meeblock h2{
        font-weight: 600;
        margin-top: 15px;
        float: right;
    }
    .meeblock span{
        position: absolute;
        right: 0;
        font-size: 35px;
        margin-right: 30px;
        margin-top: 17px;
        transition: .3s ease;
    }
    .meeblock:hover span{
        transform: translateX(5px);
        color: #ff8f00;
    }
    .meelogoto{
        float:right;position:absolute;right:0;top:0;
        margin-top: 35px;
        margin-right: 50px;
        width: 60px;        
        transition: .7s ease;
    }
    .meelink:hover img{
        transform: translateX(-5px) translateY(-5px);
        text-shadow: 5px 5px 14px rgba(255,43,0,1);
    }
    .mee_liga{
        background: url(https://wf.cdn.gmru.net/warface_seasons/img/background.0a67d20e.png) !important;
        background-size: cover;
        background-position: bottom right !important;
        color: #fff !important;
    }
    .mee_liga a{
        color: #a68658;
    }

    .mee_liga_modal{
        background: url(https://wf.cdn.gmru.net/warface_seasons/img/background.0a67d20e.png) !important;
        color: #fff;
    }
    .mee_liga_modal button{
        background: linear-gradient(to right, #a68658, #d1c0a9);
        box-shadow: none !important;
        border: none;
    }
    .mee_liga_modal button:focus{
        box-shadowr: none !important;
    }
    
    /* Preloader */
    .preloader {
  /*фиксированное позиционирование*/
  position: fixed;
  /* координаты положения */
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  /* фоновый цвет элемента */
  background: #171717;
  /* размещаем блок над всеми элементами на странице (это значение должно быть больше, чем у любого другого позиционированного элемента на странице) */
  z-index: 1001;
}

.preloader__row {
  position: relative;
  top: 50%;
  left: 50%;
  width: 70px;
  height: 70px;
  margin-top: -35px;
  margin-left: -35px;
  text-align: center;
  animation: preloader-rotate 2s infinite linear;
}

.preloader__item {
  position: absolute;
  display: inline-block;
  top: 0;
  background-color: #fb6800;
  box-shadow: 0px 0px 25px #fb6800;
  border-radius: 100%;
  width: 35px;
  height: 35px;
  animation: preloader-bounce 2s infinite ease-in-out;
}

.preloader__item:last-child {
  top: auto;
  bottom: 0;
  animation-delay: -1s;
}

@keyframes preloader-rotate {
  100% {
    transform: rotate(360deg);
  }
}

@keyframes preloader-bounce {

  0%,
  100% {
    transform: scale(0);
  }

  50% {
    transform: scale(1);
  }
}

.loaded_hiding .preloader {
  transition: 0.3s opacity;
  opacity: 0;
}

.loaded .preloader {
  display: none;
}
</style>

</body>
</html>