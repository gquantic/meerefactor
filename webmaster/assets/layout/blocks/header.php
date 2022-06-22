<?php
$notifs = \Libs\Controllers\Db::query("SELECT * FROM `notifications` WHERE `foruser`='".$userData['id']."' AND `view`='0'");
#var_dump($notifs);
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png">
    <meta name="description" content="Партнёрская программа MeeMoney">
    <meta name="author" content="Ssapphire inc.">
    <title><?if($pageName != ''){ echo $pageName." | MeeMoney";} else {?>Партнёрская программа MeeMoney<?}?></title>
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
<link rel="stylesheet" href="assets/layout/blocks/assets/plugins/bootstrap-select/css/bootstrap-select.css" />

<!-- Multi Select Css -->
<link rel="stylesheet" href="assets/layout/blocks/assets/plugins/multi-select/css/multi-select.css">
<!-- Select2 -->
<link rel="stylesheet" href="assets/layout/blocks/assets/plugins/select2/select2.css" />

<!-- JQuery DataTable Css -->
<link rel="stylesheet" href="assets/layout/blocks/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">

    <!-- Jquery -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.js"
      integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
      crossorigin="anonymous"></script>
      
      <!-- Begin Verbox {literal} -->
<script type='text/javascript'>
	(function(d, w, m) {
		window.supportAPIMethod = m;
		var s = d.createElement('script');
		s.type ='text/javascript'; s.id = 'supportScript'; s.charset = 'utf-8';
		s.async = true;
		var id = 'b980b068c5af384e194b82072bf87265';
		s.src = 'https://admin.verbox.ru/support/support.js?h='+id;
		var sc = d.getElementsByTagName('script')[0];
		w[m] = w[m] || function() { (w[m].q = w[m].q || []).push(arguments); };
		if (sc) sc.parentNode.insertBefore(s, sc); 
		else d.documentElement.firstChild.appendChild(s);
	})(document, window, 'Verbox');
</script>
<!-- {/literal} End Verbox -->

    <!-- Production -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    
    <script charset="UTF-8" src="https://web.webpushs.com/js/push/d72063f23c59a73a4c5fa42c116acef4_1.js" async></script>
</head>

<body class="theme-orange">

<!--div class="girlands"></div-->

<style>
    .girlands {
        background: url(http://christmasdisplay.ca/wp-content/plugins/christmas-lights/img/lights.gif); 
        width: 100%; height: 50px; 
        background-repeat: repeat-x;
        background-size: 15%;
        position: fixed;
        top: 0;
        z-index: 1000;
    }
    
    @media screen and (max-width: 600px) {
      .girlands {
          background-size: 40%;
      }
    }
</style>

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <!--div class="m-t-30"><img class="zmdi-hc-spin" src="https://clipart-best.com/img/santa-claus/santa-claus-clip-art-2.png" width="48" height="48" alt="MeeMoney"></div-->
        
        <img class="zmdi-hc-spin" src="assets/images/loader.svg" width="48" height="48" alt="MeeMoney">
        <p>Загрузка страницы...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Main Search -->
<!--div id="search">
    <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
    <form>
      <input type="search" value="" placeholder="Поиск..." />
      <button type="submit" class="btn btn-primary">Поиск</button>
    </form>
</div-->



<!-- Right Icon menu Sidebar -->
<div class="navbar-right">
    <ul class="navbar-nav">
        <!--li><a href="#search" class="main_search" title="Search..."><i class="zmdi zmdi-search"></i></a></li-->
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="App" data-toggle="dropdown" role="button"><i class="zmdi zmdi-apps"></i></a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">Быстрая навигация</li>
                <li class="body">
                    <ul class="menu app_sortcut list-unstyled">
                        <li>
                            <a href="/webmaster/">
                                <div class="icon-circle mb-2 bg-pink"><i class="zmdi zmdi-home"></i></div>
                                <p class="mb-0">Главная</p>
                            </a>
                        </li>
                        <li>
                            <a href="profile">
                                <div class="icon-circle mb-2 bg-blue"><i class="zmdi zmdi-account"></i></div>
                                <p class="mb-0">Мой профиль</p>
                            </a>
                        </li>
                        <li>
                            <a href="offers">
                                <div class="icon-circle mb-2 bg-amber"><i class="zmdi zmdi-shopping-cart"></i></div>
                                <p class="mb-0">Офферы</p>
                            </a>
                        </li>
                        <li>
                            <a href="referals">
                                <div class="icon-circle mb-2 bg-green"><i class="zmdi zmdi-accounts"></i></div>
                                <p class="mb-0">Рефералы</p>
                            </a>
                        </li>
                        <li>
                            <a href="wallet">
                                <div class="icon-circle mb-2 bg-purple"><i class="zmdi zmdi-balance-wallet"></i></div>
                                <p class="mb-0">Финансы</p>
                            </a>
                        </li>
                        <li>
                            <a href="stats">
                                <div class="icon-circle mb-2 bg-red"><i class="zmdi zmdi-view-dashboard"></i></div>
                                <p class="mb-0">Статистика</p>
                            </a>
                        </li>
                        <!--li>
                            <a href="conversions-dashboard.php">
                                <div class="icon-circle mb-2 bg-pink"><i class="zmdi zmdi-shopping-cart"></i></div>
                                <p class="mb-0">Конверсии</p>
                            </a>
                        </li-->
                    </ul>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="Notifications" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                <?php if(mysqli_num_rows($notifs) > 0): ?><div class="notify"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?>
            </a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">Уведомления</li>
                <li class="body">
                    <ul class="menu list-unstyled">
                        <?php while($notif = mysqli_fetch_assoc($notifs)): ?>
                        <li>
                            <a href="<?php if($notif['link'] == ''):?>javascript:void(0);<?php else: echo $notif['link']; endif;?>" style="<?php if($notif['link'] == ''):?> cursor: default !important; <?php endif; ?>">
                                <div class="icon-circle bg-<?php echo $notif['lvl']; ?>"><i class="zmdi zmdi-<?php echo $notif['category']; ?>"></i></div>
                                <div class="menu-info">
                                    <h4><?php echo $notif['title']; ?> <?php if($notif['link'] != ''):?> <span class="ti-link"></span> <?php endif; ?></h4>
                                    <p><i class="zmdi zmdi-time"></i> <?php echo substr($notif['date'], 0, 16); ?> </p>
                                </div>
                            </a>
                        </li>
                        <?php endwhile; ?>
                        <!--li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-amber"><i class="zmdi zmdi-shopping-cart"></i></div>
                                <div class="menu-info">
                                    <h4>4 Sales made</h4>
                                    <p><i class="zmdi zmdi-time"></i> 22 mins ago </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-red"><i class="zmdi zmdi-delete"></i></div>
                                <div class="menu-info">
                                    <h4><b>Nancy Doe</b> Deleted account</h4>
                                    <p><i class="zmdi zmdi-time"></i> 3 hours ago </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-green"><i class="zmdi zmdi-edit"></i></div>
                                <div class="menu-info">
                                    <h4><b>Nancy</b> Changed name</h4>
                                    <p><i class="zmdi zmdi-time"></i> 2 hours ago </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-grey"><i class="zmdi zmdi-comment-text"></i></div>
                                <div class="menu-info">
                                    <h4><b>John</b> Commented your post</h4>
                                    <p><i class="zmdi zmdi-time"></i> 4 hours ago </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-purple"><i class="zmdi zmdi-refresh"></i></div>
                                <div class="menu-info">
                                    <h4><b>John</b> Updated status</h4>
                                    <p><i class="zmdi zmdi-time"></i> 3 hours ago </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-light-blue"><i class="zmdi zmdi-settings"></i></div>
                                <div class="menu-info">
                                    <h4>Settings Updated</h4>
                                    <p><i class="zmdi zmdi-time"></i> Yesterday </p>
                                </div>
                            </a>
                        </li-->
                    </ul>
                </li>
                <li class="footer"> <a href="notifications.php">Все уведомления</a> </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-balance-wallet"></i>
            </a>
            <ul class="dropdown-menu slideUp2" style="height: 200px !important;">
                <li class="header">Ваш баланс <small class="float-right"><a href="wallet">Подробнее</a></small></li>
                <li class="body">
                    <ul class="menu tasks list-unstyled">
                        <li>
                            <div class="progress-container progress-primary">
                                <span class="progress-badge">Готовы к выводу</span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                        <span class="progress-value" style="font-size: 13px;"><?echo $userData['balance'] + $userData['referal_balance'];?>₽</span>
                                    </div>
                                </div>                        
                            </div>

                            <div class="progress-container progress-primary">
                                <span class="progress-badge">Холд</span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                        <span class="progress-value" style="font-size: 13px;"><?echo $userData['hold'] + $userData['referal_hold'];?>₽</span>
                                    </div>
                                </div>                        
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <!--li><a href="javascript:void(0);" class="app_calendar" title="Calendar"><i class="zmdi zmdi-calendar"></i></a></li-->
        <!--li><a href="javascript:void(0);" class="app_google_drive" title="Google Drive"><i class="zmdi zmdi-google-drive"></i></a></li-->
        <!--li><a href="javascript:void(0);" class="app_group_work" title="Group Work"><i class="zmdi zmdi-group-work"></i></a></li-->
        <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li><a href="/exit" class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
    </ul>
</div>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index"><img width="150px" src="/assets/img/logo.png" width="25" alt="MeeMoney"><!--span class="m-l-10">Aero</span--></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="profile"><img src="assets/images/profile_av.jpg" alt="User"></a>
                    <div class="detail">
                        <h4><?if(strlen($userData['name']) > 8) echo substr($userData['name'], 0, 8).'...'; else echo $userData['name'];?></h4>
                        <small>Веб-мастер</small>                        
                    </div>
                </div>
            </li>
            <li class=""><a href="index"><i class="zmdi zmdi-home"></i><span>Главная</span></a></li>
            
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>Офферы</span></a>
                <ul class="ml-menu">
                    <li><a href="offers">Все офферы</a></li>
                </ul>
            </li>

            <li class=""><a href="stats"><i class="zmdi zmdi-view-dashboard"></i><span>Статистика</span></a></li>

            <li><a href="profile"><i class="zmdi zmdi-account"></i><span>Мой профиль</span></a></li>

            <li><a href="referals"><i class="zmdi zmdi-accounts"></i><span>Рефералы</span></a></li>

            <li><a href="wallet"><i class="zmdi zmdi-balance-wallet"></i><span>Финансы</span></a></li>

            <li><a href="faq"><i class="zmdi zmdi-book"></i><span>Полезная информация</span></a></li>
            
            <li><a href="/exit"><i class="zmdi zmdi-minus-circle"></i><span>Выход</span></a></li><br>
        </ul>
    </div>
</aside>

<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs sm">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat"><i class="zmdi zmdi-comments"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Theme Option</h6>
                    <div class="light_dark">
                        <div class="radio">
                            <input type="radio" name="radio1" id="lighttheme" value="light" checked="">
                            <label for="lighttheme">Светлая тема</label>
                        </div>
                        <div class="radio mb-0">
                            <input type="radio" name="radio1" id="darktheme" value="dark">
                            <label for="darktheme">Темная тема</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h6>Цветовые схемы</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple"><div class="purple"></div></li>
                        <li data-theme="blue"><div class="blue"></div></li>
                        <li data-theme="cyan"><div class="cyan"></div></li>
                        <li data-theme="green"><div class="green"></div></li>
                        <li data-theme="orange"><div class="orange"></div></li>
                        <li data-theme="blush" class="active"><div class="blush"></div></li>
                    </ul>                                        
                </div>
                <div class="card">
                    <h6>Визуальные настройки</h6>
                    <ul class="setting-list list-unstyled">
                        <li>
                            <div class="checkbox rtl_support">
                                <input id="checkbox1" type="checkbox" value="rtl_view">
                                <label for="checkbox1">Развёрнутая версия</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox ms_bar">
                                <input id="checkbox2" type="checkbox" value="mini_active">
                                <label for="checkbox2">Мини сайдбар</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox3" type="checkbox" checked="">
                                <label for="checkbox3">Звук уведомлений</label>
                            </div>                        
                        </li>
                    </ul>
                </div>                
            </div>                
        </div>       
        <div class="tab-pane right_chat" id="chat">
            <div class="slim_scroll">
                <div class="card">
                    <ul class="list-unstyled">

                    </ul>
                </div>
            </div>
        </div>
    </div>
</aside>