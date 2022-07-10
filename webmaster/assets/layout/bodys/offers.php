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
            <div class="row">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="body">
                            <input type="text" class="form-control" placeholder="Введите название оффера">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <button class="btn btn-warning" style="height: 75px;width:100%;font-weight: 600;font-size: 17px;color:#fff !important;">Как начать <br> зарабатывать?</button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">

                </div>
                <div class="col-lg-9">
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
                // console.log(data);
                $('#offerscontent').html(data);
            }
        );
    }
</script>