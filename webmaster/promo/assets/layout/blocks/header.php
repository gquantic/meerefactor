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
    <link rel="stylesheet" href="/assets/template/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/template/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
    <link rel="stylesheet" href="/assets/template/plugins/charts-c3/plugin.css"/>

    <link rel="stylesheet" href="/assets/template/plugins/morrisjs/morris.min.css" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="/assets/template/css/style.min.css">

    <!-- Interactive JS -->
    <script type="text/javascript" src="libs/ui.js"></script>

    <!-- Icons and fonts -->
    <script src="https://kit.fontawesome.com/ada758ae4a.js" crossorigin="anonymous"></script>

    <!-- Bootstrap Select Css -->
<link rel="stylesheet" href="/assets/template/assets/plugins/bootstrap-select/css/bootstrap-select.css" />

<!-- Multi Select Css -->
<link rel="stylesheet" href="/assets/template/assets/plugins/multi-select/css/multi-select.css">
<!-- Select2 -->
<link rel="stylesheet" href="/assets/template/assets/plugins/select2/select2.css" />

<!-- JQuery DataTable Css -->
<link rel="stylesheet" href="/assets/template/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">

    <!-- Jquery -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.js"
      integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
      crossorigin="anonymous"></script>
      
      <!--script type="text/javascript" src="https://botsrv.com/qb/widget/DYRAQrGBgWmW05dx/wKYPWr6qdXmd0px4" async defer crossorigin="anonymous"></script-->

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

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h2>Главная</h2>
                <ul class="breadcrumb mt-1">
                    <li class="breadcrumb-item"><a href="main"><i class="zmdi zmdi-home"></i> MeeLiga</a></li>
                </ul>
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