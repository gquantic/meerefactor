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
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card widget_2 traffic">
                    <div class="body">
                        <h6>Общий баланс</h6>
                        <h2 style="color:#fa6801;"><?echo $userData['balance'] + $userData['referal_balance'];?><span style="font-size:18px;">₽</span></h2>
                        <small>Основной <?=$userData['balance'];?><span style="font-size:10px;">₽</span> + Реферальный <?=$userData['referal_balance'];?><span style="font-size:10px;">₽</span></small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card widget_2 sales">
                    <div class="body">
                        <h6>Общий холд</h6>
                        <h2><?echo $userData['hold'] + $userData['referal_hold'];?><span style="font-size:18px;">₽</span></h2>
                        <small>Основной <?=$userData['hold'];?><span style="font-size:10px;">₽</span> + Реферальный <?=$userData['referal_hold'];?><span style="font-size:10px;">₽</span></small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card widget_2 sales">
                    <div class="body mee_liga">
                        <!--img src="https://chelyabinsk.allstick.ru/@s/image-cache/2da/2daad0e4a511-u..product~19~19146~5bd95d6581aa5.fit.max.w.1000~xgxgxgx.jpg" style="position: absolute;width:100px;left:100%;margin-left:-35px;"-->
                        <h6>MeeCoins</h6>
                        <h2><?echo $userData['meecoins'];?></h2>
                        <a href="/promo/" class="meelink" target="__blank"><img src="/promo/img/logo.png" class="meelogoto"></a>
                        <small><a href="" data-toggle="modal" data-target="#meeLigaModal">Подробнее</a></small>
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
            <a href="/promo/" target="__blank" style="width:100%;"><div class="col-12">
                <div class="card">
                    <div class="body meeblock">
                        <div class="inner">
                            <h2><img src="/promo/img/logo.png" width="50px"> MeeLiga</h2>
                            <span class="ti-angle-right"></span>
                        </div>
                    </div>
                </div>
            </div></a>
        </div

        <?php if(mysqli_num_rows($debcard) > 0): ?>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong><i class="zmdi zmdi-chart"></i> Топовые</strong> Финансовые Офферы (Дебетовые карты)</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <?php \Libs\Traits\Offer::getOffers($debcard); ?>
        </div>
        <?php endif; ?>
        
        <?php if(mysqli_num_rows($credcard) > 0): ?>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong><i class="zmdi zmdi-chart"></i> Топовые</strong> Финансовые Офферы (Кредитные карты)</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <?php \Libs\Traits\Offer::getOffers($credcard); ?>
        </div>
        <?php endif; ?>

        <?php if(mysqli_num_rows($games) > 0): ?>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong><i class="zmdi zmdi-chart"></i> Топовые</strong> Игровые Офферы</h2>
                    </div>
                </div>
            </div>
        <div>
        
        <div class="row clearfix">
            <?php \Libs\Traits\Offer::getOffers($games); ?>
        </div>
        <?php endif; ?>
        
        <?php if(mysqli_num_rows($loan) > 0): ?>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong><i class="zmdi zmdi-chart"></i> Топовые</strong> ЗАЙМЫ И КРЕДИТЫ</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row clearfix">
            <?php \Libs\Traits\Offer::getOffers($loan); ?>
        </div>
        <?php endif; ?>
        

        <?php if(mysqli_num_rows($job) > 0): ?>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong><i class="zmdi zmdi-chart"></i> Топовые</strong> Офферы вакансии</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <?php \Libs\Traits\Offer::getOffers($job); ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<div class="modal fade" id="meeLigaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content mee_liga_modal">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Старт марафона - MeeMaster!</h4>
            </div>
            <div class="modal-body">
                

                <h2>Старт марафона - MeeMaster!</h2>
                <p>
                С 01.11.2020 по 01.06.2021 г.г. сервис MeeMoney проводит марафон MeeMaster!  <br>
                Зарабатывай бонусы MeeCoins и получи один трех призов или обменивай MeeCoins на ценные призы в магазине Mee.Market!  <br><br>
                 
                Приз за первое место в марафоне - 100 000 рублей<br>
                Приз за второе место в марафоне - 50 000 рублей<br>
                Приз за третье место в марафоне - 20 000 рублей<br><br>
                 
                Следи за рейтингами и будь первым!<br><br>
                 
                 
                MeeCoins - это баллы, начисляемые за конверсии по любым офферам MeeMoney <br>
                Mee.Market - это внутренний магазин призов, где ты можешь купить любой понравившийся товар за MeeCoins <br>
                Заработанные MeeCoins можно будет обменять на различные товары в магазине Mee.Market <br><br>
                 
                КАК ЗАРАБАТЫВАТЬ MEE.COINS <br><br>
                 
                MeeCoins начисляются за одобренные конверсии по всем офферам MeeMoney. <br>
                Сумма MeeCoins равна сумме всех одобренных конверсий Х 2. <br><br>
                 
                К примеру: <br>
                Вам одобрилась конверсия на 1 800 рублей, соответственно на основном балансе у Вас 1800 рублей, на баланс MeeCoins Вам автоматически будет начислено 3 600 MeeCoins <br><br>
                 
                ИТАК: <br>
                1. Лей на любые офферы <br>
                2. Копи MEE.COINS <br>
                3. Покупай товары <br><br>
                 
                А так же участвуй в марафоне MeeMaster, стань лучшим вебмастером и получи главный приз от MeeMoney - 100 000 рублей!
                 </p>

            </div><br><br>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .meeblock{
        background: url(/bg.png) !important;
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
        background: url(/bg.png) !important;
        background-size: cover;
        background-position: bottom right !important;
        color: #fff !important;
    }
    .mee_liga a{
        color: #a68658;
    }

    .mee_liga_modal{
        background: url(/bg.png) !important;
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
</style>