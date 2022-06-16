<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Партнёрская программа MeeMoney</title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png">
    <meta name="description" content="Авторизация | MeeMoney">
    <meta name="author" content="Ssapphire inc.">
    <link rel="stylesheet" href="assets/layout/blocks/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/layout/blocks/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
    <link rel="stylesheet" href="assets/layout/blocks/assets/plugins/charts-c3/plugin.css"/>

    <link rel="stylesheet" href="assets/layout/blocks/assets/plugins/morrisjs/morris.min.css" />

    <!-- Dropify -->
    <link rel="stylesheet" href="assets/layout/blocks/assets/plugins/dropify/css/dropify.min.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/layout/blocks/assets/css/style.min.css">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!-- Interactive JS -->
    <script type="text/javascript" src="libs/ui.js"></script>
    <script type="text/javascript" src="/handlers/exdate.js"></script>

    <!-- Icons and fonts -->
    <script src="https://kit.fontawesome.com/ada758ae4a.js" crossorigin="anonymous"></script>

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="assets/layout/blocks/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">

    <!-- Bootstrap Select Css -->
    <link rel="stylesheet" href="assets/layout/blocks/assets/plugins/bootstrap-select/css/bootstrap-select.css" />

    <!-- Multi Select Css -->
    <link rel="stylesheet" href="assets/layout/blocks/assets/plugins/multi-select/css/multi-select.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="assets/layout/blocks/assets/plugins/select2/select2.css" />

    <!-- Bootstrap Select Css -->
    <link rel="stylesheet" href="assets/layout/blocks/assets/plugins/bootstrap-select/css/bootstrap-select.css" />

    <link rel="stylesheet" href="/admin/assets/layout/blocks/assets/plugins/summernote/dist/summernote.css"/>
</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/loader.svg" width="48" height="48" alt="Aero"></div>
        <p>Загрузка страницы...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Main Search -->
<div id="search">
    <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
    <form>
      <input type="search" value="" placeholder="Search..." />
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

<!-- Right Icon menu Sidebar -->
<div class="navbar-right">
    <ul class="navbar-nav">
        <li><a href="#search" class="main_search" title="Search..."><i class="zmdi zmdi-search"></i></a></li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="App" data-toggle="dropdown" role="button"><i class="zmdi zmdi-apps"></i></a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">App Sortcute</li>
                <li class="body">
                    <ul class="menu app_sortcut list-unstyled">
                        <li>
                            <a href="image-gallery.php">
                                <div class="icon-circle mb-2 bg-blue"><i class="zmdi zmdi-camera"></i></div>
                                <p class="mb-0">Photos</p>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle mb-2 bg-amber"><i class="zmdi zmdi-translate"></i></div>
                                <p class="mb-0">Translate</p>
                            </a>
                        </li>
                        <li>
                            <a href="events.php">
                                <div class="icon-circle mb-2 bg-green"><i class="zmdi zmdi-calendar"></i></div>
                                <p class="mb-0">Calendar</p>
                            </a>
                        </li>
                        <li>
                            <a href="urls.php">
                                <div class="icon-circle mb-2 bg-purple"><i class="zmdi zmdi-account-calendar"></i></div>
                                <p class="mb-0">Contacts</p>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle mb-2 bg-red"><i class="zmdi zmdi-tag"></i></div>
                                <p class="mb-0">News</p>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle mb-2 bg-grey"><i class="zmdi zmdi-map"></i></div>
                                <p class="mb-0">Maps</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="Notifications" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
            </a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">Notifications</li>
                <li class="body">
                    <ul class="menu list-unstyled">
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-blue"><i class="zmdi zmdi-account"></i></div>
                                <div class="menu-info">
                                    <h4>8 New Members joined</h4>
                                    <p><i class="zmdi zmdi-time"></i> 14 mins ago </p>
                                </div>
                            </a>
                        </li>
                        <li>
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
                        </li>
                    </ul>
                </li>
                <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-balance-wallet"></i>
            </a>
            <ul class="dropdown-menu slideUp2" style="height: 200px !important;">
                <li class="header">Ваш баланс <small class="float-right"><a href="javascript:void(0);">Подробнее</a></small></li>
                <li class="body">
                    <ul class="menu tasks list-unstyled">
                        <li>
                            <div class="progress-container progress-primary">
                                <span class="progress-badge">Реальный баланс</span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                        <span class="progress-value" style="font-size: 13px;">0₽</span>
                                    </div>
                                </div>                        
                            </div>

                            <div class="progress-container progress-primary">
                                <span class="progress-badge">Холд</span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                        <span class="progress-value" style="font-size: 13px;">0₽</span>
                                    </div>
                                </div>                        
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="javascript:void(0);" class="app_calendar" title="Calendar"><i class="zmdi zmdi-calendar"></i></a></li>
        <li><a href="javascript:void(0);" class="app_google_drive" title="Google Drive"><i class="zmdi zmdi-google-drive"></i></a></li>
        <li><a href="javascript:void(0);" class="app_group_work" title="Group Work"><i class="zmdi zmdi-group-work"></i></a></li>
        <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li><a href="/exit.php" class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
    </ul>
</div>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index.php"><img width="150px" src="/assets/img/logo.png" width="25" alt="MeeMoney"><!--span class="m-l-10">Aero</span--></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="profile.php"><img src="https://i03.fotocdn.net/s119/11a097ff366bfb24/user_l/2713047325.jpg" alt="User"></a>
                    <div class="detail">
                        <h4><?if(strlen($userData['name']) > 8) echo substr($userData['name'], 0, 8).'...'; else echo $userData['name'];?></h4>
                        <small>Администратор</small>                        
                    </div>
                </div>
            </li>

            <li class=""><a href="index.php"><i class="zmdi zmdi-home"></i><span>Главная</span></a></li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-info"></i><span>FAQ</span></a>
                <ul class="ml-menu">
                    <li><a href="create-faq.php">Создать вопрос</a></li>
                    <li><a href="faq-edit.php">Управление</a></li>
                </ul>
            </li>

            <li class=""><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-fire"></i><span>MeeLiga <span style="font-size: 10px;color:#fff;background: #e50000;padding:4px;border-radius: 4px;">Наконец-то))</span></span></a>
                <ul class="ml-menu">
                    <li><a href="meeliga-add-offer.php">Добавить товар</a></li>
                    <li><a href="meeliga-edit.php">Управление</a></li>
                    <li><a href="meeliga.php">Статистика</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-notifications"></i><span>Уведомления</span></a>
                <ul class="ml-menu">
                    <li><a href="create-notif.php">Создать</a></li>
                </ul>
            </li>
            
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>Офферы</span></a>
                <ul class="ml-menu">
                    <li><a href="create-offer.php">Добавить оффер</a></li>
                    <li><a href="offers.php">Управление офферами</a></li>
                    <li><a href="offers.php?show=passive">Неактивные офферы</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-widgets"></i><span>Модерация заявок</span></a>
                <ul class="ml-menu">
                    <li><a href="offers.php">Офферы</a></li>
                    <li><a href="support.php">Тикеты в поддержку</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-widgets"></i><span>Редактирование</span></a>
                <ul class="ml-menu">
                    <li><a href="conversions.php">Конверсии</a></li>
                    <li><a href="create-conversion.php">Создать конверсию</a></li>
                    <li><a href="users.php">Пользователи</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Пользователи</span></a>
                <ul class="ml-menu">
                    <li><a href="users.php?show=advertiser">Рекламодатели</a></li>
                    <li><a href="users.php?show=webmaster">Веб-мастера</a></li>
                    <li><a href="users.php?show=manager">Менеджеры</a></li>
                    <li><a href="users.php?rol=leader">Привелегии</a></li>
                    <li><a href="create-user.php">Создать</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-balance-wallet"></i><span>Финансы</span></a>
                <ul class="ml-menu">
                    <li><a href="widthdraw.php#widthdraws">Заявки на вывод</a></li>
                    <li><a href="widthdraw.php#webmasters_profits">Начисления веб-мастерам</a></li>
                    <li><a href="widthdraw.php#advertiser_balance">Бюджеты рекламодателей</a></li>
                    <li><a href="widthdraw.php#project_porit">Общий доход проекта</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-alert-polygon"></i><span>Защита</span></a>
                <ul class="ml-menu">
                    <li><a href="create-offer.php">Подозрительная активность</a></li>
                    <li><a href="create-offer.php">Вирусы</a></li>
                    <li><a href="stats.php">Некоректное заполнение полей</a></li>
                    <li><a href="stats.php">Инжекты скриптов</a></li>
                    <li><a href="stats.php">Аварийный режим</a></li>
                </ul>
            </li>
            
            <li><a href="/exit.php"><i class="zmdi zmdi-minus-circle"></i><span>Выход</span></a></li>

            <li>
                <div class="progress-container progress-primary m-t-10">
                    <span class="progress-badge">CTR</span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%;">
                            <span class="progress-value">67%</span>
                        </div>
                    </div>
                </div>
                <div class="progress-container progress-info">
                    <span class="progress-badge">Принято лидов</span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 73%;">
                            <span class="progress-value">73%</span>
                        </div>
                    </div>
                </div>
            </li>
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
                            <label for="lighttheme">Light Mode</label>
                        </div>
                        <div class="radio mb-0">
                            <input type="radio" name="radio1" id="darktheme" value="dark">
                            <label for="darktheme">Dark Mode</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h6>Color Skins</h6>
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
                    <h6>General Settings</h6>
                    <ul class="setting-list list-unstyled">
                        <li>
                            <div class="checkbox rtl_support">
                                <input id="checkbox1" type="checkbox" value="rtl_view">
                                <label for="checkbox1">RTL Version</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox ms_bar">
                                <input id="checkbox2" type="checkbox" value="mini_active">
                                <label for="checkbox2">Mini Sidebar</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox3" type="checkbox" checked="">
                                <label for="checkbox3">Notifications</label>
                            </div>                        
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox4" type="checkbox">
                                <label for="checkbox4">Auto Updates</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox5" type="checkbox" checked="">
                                <label for="checkbox5">Offline</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox6" type="checkbox" checked="">
                                <label for="checkbox6">Location Permission</label>
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
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Sophia <small class="float-right">11:00AM</small></span>
                                        <span class="message">There are many variations of passages of Lorem Ipsum available</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Grayson <small class="float-right">11:30AM</small></span>
                                        <span class="message">All the Lorem Ipsum generators on the</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Isabella <small class="float-right">11:31AM</small></span>
                                        <span class="message">Contrary to popular belief, Lorem Ipsum</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="me">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">John <small class="float-right">05:00PM</small></span>
                                        <span class="message">It is a long established fact that a reader</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar3.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Alexander <small class="float-right">06:08PM</small></span>
                                        <span class="message">Richard McClintock, a Latin professor</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</aside>