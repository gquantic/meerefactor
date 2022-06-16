<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Редактирование оффера</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                        <li class="breadcrumb-item">Офферы</li>
                        <li class="breadcrumb-item active">Редактирование оффера</li>
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
                <div class="col-lg-12">
                    <div class="alert alert-warning">
                        <strong>Внимание!</strong> Подробное описание видно только вам. Все данные предоставлены в режиме разработчика.
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-12">
                                    <div class="preview preview-pic tab-content">
                                        <div class="tab-pane active" id="product_1"><img src="/upload/offers/<?echo $offer['image'];?>" class="img-fluid" alt=""/></div>
                                    </div>             
                                </div>
                                <div class="col-xl-9 col-lg-8 col-md-12">
                                    <div class="product details">
                                        <h3 class="product-title mb-0"><input type="text" class="editInput" id="offername" name="offername" style="width:100%;" value="<?echo $offer['name'];?>"></h3><br>
                                        <h5 class="price mt-0">Текущая ставка: <span class="col-amber"><input type="text" class="editInput" name="leadprice" id="leadprice" style="width:60px;" value="<?echo $offer['leadPrice'];?>">₽</span></h5>
                                        <div class="rating">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <input name="active" value="1" id="active" type="checkbox" <?if($offer['web_show'] == 1):?>checked=""<?endif;?>>
                                                    <label for="active">Активен</label>
                                                </div>
                                            </div>                                            <!--div class="stars">
                                                <span class="zmdi zmdi-star col-amber"></span>
                                                <span class="zmdi zmdi-star col-amber"></span>
                                                <span class="zmdi zmdi-star col-amber"></span>
                                                <span class="zmdi zmdi-star col-amber"></span>
                                                <span class="zmdi zmdi-star-outline"></span>
                                            </div>
                                            <span class="m-l-10">41 оценок</span-->
                                        </div>
                                        <hr>

                                        <p class="form-group">
                                            <label for="">Холд оффера</label>
                                            <input type="text" id="offerhold" class="form-control" value="<?echo $offer['hold'];?>">
                                        </p>

                                        <p class="form-group">
                                            <label for="">Описание</label>
                                            <textarea id="offershortdesc" class="form-control"><?echo $offer['shortdescription'];?></textarea>
                                            <input type="text" id="offerId" value="<?echo $_GET['id'];?>" hidden>
                                        </p>

                                        <div class="form-group">
                                            <label for="">Премиальный текст</label>
                                            <input type="text" class="form-control" id="actiontext" value="<?=$offer['action'];?>">
                                            <p>Если оставить поле пустым, то ничего отображаться не будет. <span style="color:#c72929;">Избегайте пробелов в пустом поле.</span></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Категория оффера</label>
                                            <select class="form-control show-tick select2" name="category" id="offercategory" data-placeholder="Выберите категорию">
                                                <optgroup label="Финансы">
                                                    <option value="debetcard" <?if($offer['category'] == 'debetcard'):?>selected=""<?endif;?>>Дебетовые карты</option>
                                                    <option value="creditcard" <?if($offer['category'] == 'creditcard'):?>selected=""<?endif;?>>Кредитные карты</option>
                                                    <option value="loan" <?if($offer['category'] == 'loan'):?>selected=""<?endif;?>>Займы</option>
                                                    <option value="insure" <?if($offer['category'] == 'insure'):?>selected=""<?endif;?>>Страхование</option>
                                                </optgroup>
                                                <optgroup label="Игры и развлечение">
                                                    <option value="game_browser" <?if($offer['category'] == 'game_browser'):?>selected=""<?endif;?>>Браузерные</option>
                                                    <option value="game_client" <?if($offer['category'] == 'game_client'):?>selected=""<?endif;?>>Клиентские</option>
                                                    <option value="game_mobile" <?if($offer['category'] == 'game_mobile'):?>selected=""<?endif;?>>Мобильные</option>
                                                </optgroup>
                                                <optgroup label="Мобильные">
                                                    <option value="mobile_instal" <?if($offer['category'] == 'mobile_instal'):?>selected=""<?endif;?>>Инстал</option>
                                                    <option value="mobile_use" <?if($offer['category'] == 'mobile_use'):?>selected=""<?endif;?>>Использование</option>
                                                </optgroup>
                                                <optgroup label="Вакансии">
                                                    <option value="job_taxi" <?if($offer['category'] == 'job_taxi'):?>selected=""<?endif;?>>Такси</option>
                                                    <option value="job_delivery" <?if($offer['category'] == 'job_delivery'):?>selected=""<?endif;?>>Доставка</option>
                                                    <option value="job_other" <?if($offer['category'] == 'job_other'):?>selected=""<?endif;?>>Прочее</option>
                                                </optgroup>
                                                <optgroup label="Для бизнеса">
                                                    <option value="forbusiness" <?if($offer['category'] == 'forbusiness'):?>selected=""<?endif;?>>Для бизнеса</option>
                                                </optgroup>
                                                <optgroup label="Азарт">
                                                    <option value="azart_bets" <?if($offer['category'] == 'azart_bets'):?>selected=""<?endif;?>>Ставки</option>
                                                    <option value="azart_cazino" <?if($offer['category'] == 'azart_cazino'):?>selected=""<?endif;?>>Казино</option>
                                                    <option value="azart_other" <?if($offer['category'] == 'azart_other'):?>selected=""<?endif;?>>Прочее</option>
                                                </optgroup>
                                                <option value="other" <?if($offer['category'] == 'other'):?>selected=""<?endif;?>>Прочее</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Топовый оффер</label>
                                                <select class="form-control show-tick select2" name="topoffer" id="topoffer" data-placeholder="Выберите категорию">
                                                    <option value="1" <?if($offer['top'] == 1):?>selected=""<?endif;?>>Да</option>
                                                    <option value="0" <?if($offer['top'] == 0):?>selected=""<?endif;?>>Нет</option>
                                                </select>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-6 .col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Системные</strong> настройки</h2>
                        </div>
                        <div class="body">
                            <label for="">ID оффера в партнёрской программе</label>
                            <div class="form-group">
                                <input type="text" name="subid" id="subid" class="form-control" value="<?echo $offer['subid'];?>" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description">Материалы</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#about">Условия</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#fuldesc">Подробное описание</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">                            
                            <div class="tab-content">
                                <div class="tab-pane active" id="description">
                                    <div class="form-group">
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" name="needcheck" id="need" class="with-gap" value="1" <?if($offer['needcheck'] == 1):?>checked=""<?endif;?>>
                                                <label for="need">Требует подтверждения</label>
                                            </div>                                
                                            <div class="radio inlineblock">
                                                <input type="radio" name="needcheck" id="noneed" class="with-gap" value="0" <?if($offer['needcheck'] == 0):?>checked=""<?endif;?>>
                                                <label for="noneed">Не требует подтверждения</label>
                                            </div>
                                        </div>

                                    <p>Ссылка для привлечения: <input type="text" class="form-control" id="promourl" name="promourl" value="<?echo $offer['promo_url'];?>"></p><br>


                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p>Баннер 1:</p>
                                            <?  $bannerLink1 = '../upload/offers/'.$offer['banner1'];
                                                if(file_exists($bannerLink1)):?>
                                                <img src="/upload/offers/<?echo $offer['banner1'];?>" alt="" width="400px">
                                            <?  else: ?>
                                                <p>Баннер отсутствует</p>
                                            <?  endif; ?>
                                        </div>

                                        <div class="col-lg-4">
                                            <p>Баннер 2:</p>
                                            <?  $bannerLink2 = '../upload/offers/'.$offer['banner2'];
                                                if(file_exists($bannerLink2)):?>
                                                <img src="/upload/offers/<?echo $offer['banner2'];?>" alt="" width="400px">
                                            <?  else: ?>
                                                <p>Баннер отсутствует</p>
                                            <?  endif; ?>
                                        </div>

                                        <div class="col-lg-4">
                                            <p>Баннер 3:</p>
                                            <?  $bannerLink3 = '../upload/offers/'.$offer['banner3'];
                                                if(file_exists($bannerLink3)):?>
                                                <img src="/upload/offers/<?echo $offer['banner3'];?>" alt="" width="400px">
                                            <?  else: ?>
                                                <p>Баннер отсутствует</p>
                                            <?  endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="about">
                                    <p>ГЕО: <input type="text" class="form-control" id="geo" value="<?echo $offer['geo'];?>"></p>
                                    <p>Источники: <input type="text" class="form-control" id="socs" value="<?echo $offer['socs'];?>"></p>
                                </div>
                                <div class="tab-pane" id="fuldesc">
                                    <div class="summernote" id="fulldescription"><?echo $offer['description'];?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="body text-right">
                            <a href="view-offer.php?id=<?echo $_GET['id'];?>"><button class="btn btn-default" style="color:#fff;">Вернуться назад</button></a>
                            <button class="btn btn-success" id="editBtn" style="color:#fff;" onclick="edit()">Сохранить изменения</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style type="text/css">
    .editInput{
        background: rgba(0,0,0,.0);
        border: none;
        outline: none;
        box-shadow: none;
        transition: .1s;
    }
    .editInput:hover{
        background: rgba(0,0,0,.05);
    }
    .editInput:focus{
        background: rgba(0,0,0,.05);
    }
</style>

<!-- Script --> 
<script type="text/javascript">
    function edit(){
        $('#editBtn').html("Применение изменений...");
        $('#editBtn').prop('disabled', true);

        var offerName   =   $('#offername').val();
        var offerhold   =   $('#offerhold').val();
        var leadprice   =   $('#leadprice').val();
        var active      =   $('#active');
        var shortdesc   =   $('#offershortdesc').val();
        var promourl    =   $('#promourl').val();
        var geo         =   $('#geo').val();
        var socs        =   $('#socs').val();
        var description =   $('#fulldescription').summernote('code');
        var needcheck   =   $('input[name="needcheck"]:checked').val();
        var topoffer    =   $('#topoffer').val();
        var category    =   $('#offercategory').val();
        var subid       =   $('#subid').val();
        var actiontext  =   $('#actiontext').val();

        var id = $('#offerId').val();

        if (active.is(':checked')){
            var offeractive = 1;
        } else {
            var offeractive = 0;
        }

        // console.log(' Name: ', offerName, ' Lead Price: ', leadprice, ' Active: ', active, ' Short Desc: ',shortdesc, ' Promo url: ',promourl, ' Need check: ', needcheck);

        // .note-editable

        $.post(
            "/admin/handlers/editOffer.php",

            {
                offerName: offerName,
                offerhold: offerhold,
                leadprice: leadprice,
                active: offeractive,
                shortdesc: shortdesc,
                promourl: promourl,
                description: description,
                needcheck: needcheck,
                geo: geo,
                socs: socs,
                id: id,
                topoffer: topoffer,
                category: category,
                subid: subid,
                actiontext: actiontext
            },

            function(data){
                if(data == '1'){
                    $('#editBtn').html("Изменения сохранены!");

                    setTimeout(function(){
                        $('#editBtn').html("Сохранить изменения");
                        $('#editBtn').prop('disabled', false);
                    }, 1500);
                }else{
                    $('#editBtn').html("Неизвестная ошибка.");

                    console.log(data);

                    setTimeout(function(){
                        $('#editBtn').html("Сохранить изменения");
                        $('#editBtn').prop('disabled', false);
                    }, 1500);
                }
            }
        );
    }
</script>