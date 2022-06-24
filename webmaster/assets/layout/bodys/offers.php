<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Офферы</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                        <li class="breadcrumb-item">Офферы</li>
                        <li class="breadcrumb-item active">Список офферов</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab_all_offers">Все офферы</a></li>
                                <!--li class="nav-item"><a class="nav-link" data-toggle="tab" href="#review">Отзывы</a></li-->
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_fin_offers">Финансовые</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_games">Игры</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_mobile">Мобильные</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_job">Вакансии HR</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_business">Для бизнеса</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="exoffers('azart_other');" href="javascript:void(0);">Прочее</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_all_offers">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link active" onclick="exoffers('all');" data-toggle="tab" href="#taball">Все офферы</a></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="tab_fin_offers">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link" onclick="exoffers('fin_offers');" data-toggle="tab" href="#tabcreditcard">Все</a></li>

                                        <li class="nav-item"><a class="nav-link" onclick="exoffers('fin_creditcard');" data-toggle="tab" href="#tabcreditcard">Кредитные карты</a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabdebetcard" onclick="exoffers('fin_debetcard');">Дебетовые карты</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabloan" onclick="exoffers('fin_loan');">Займы</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabinsure" onclick="exoffers('fin_insure');">Страхование</a></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="tab_games">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabbrowsergames" onclick="exoffers('games');">Все</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabbrowsergames" onclick="exoffers('games_browser');">Браузерные</a></li>
                                        <!--li class="nav-item"><a class="nav-link" data-toggle="tab" href="#review">Отзывы</a></li-->
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabclientgames" onclick="exoffers('games_client');">Клиентские</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabmobilegames" onclick="exoffers('games_mobile');">Мобильные</a></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="tab_mobile">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#taballmobile" onclick="exoffers('mobile');">Все</a></li>
                                        <!--li class="nav-item"><a class="nav-link" data-toggle="tab" href="#review">Отзывы</a></li-->
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabinstallmobile" onclick="exoffers('mobile_instal');">Оплата за установку</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabusemobile" onclick="exoffers('mobile_use');">Оплата за использование</a></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="tab_job">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#description" onclick="exoffers('job');">Все</a></li>
                                        <!--li class="nav-item"><a class="nav-link" data-toggle="tab" href="#review">Отзывы</a></li-->
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#about" onclick="exoffers('job_taxi');">Такси</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#fulldesc" onclick="exoffers('job_delivery');">Доставка</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#fulldesc" onclick="exoffers('job_other');">Прочее</a></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="tab_business">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabinsure" onclick="exoffers('fin_forbusiness');">Для бизнеса</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>  
                    </div>
                    <div class="card">
                        <div class="body">                            
                            <div class="row clearfix" id="offerscontent">
                                <?php \Libs\Traits\Offer::getOffers($uoffers); ?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>


<script type="text/javascript">
    function exoffers(type){
        // $('#offerscontent').html('<div class="col-md-12 text-center mt-3" style=""><p style="font-size: 16px;">Загрузка...</p></div>');

        $.post(
            "/webmaster/handlers/getoffers.php",

            {
                category: type
            },

            function(data){
                console.log(data);
                $('#offerscontent').html(data);
            }
        );
    }
</script>