<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Подробности оффера</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                        <li class="breadcrumb-item">Офферы</li>
                        <li class="breadcrumb-item active">Подробности оффера</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="offer-edit.php?id=<?echo $_GET['id'];?>" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-edit"></i></a>
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
                                        <h3 class="product-title mb-0"><?echo $offer['name'];?></h3><br>
                                        <h5 class="price mt-0">Текущая ставка: <span class="col-amber"><?echo $offer['leadPrice'];?>₽</span></h5>
                                        <div class="rating">
                                            <div>
                                                <p>Статус: 
                                                <?if($offer['web_show'] == 1):?>
                                                    <span style="color:green;">Активен</span>
                                                <?else:?>
                                                    <span style="color:red;">Неактивен</span>
                                                <?endif;?></p>
                                            </div>
                                            <div>
                                                <p>Требует подтверждения: 
                                                <?if($offer['needcheck'] == 1):?>
                                                    <span style="color:green;">Да</span>
                                                <?else:?>
                                                    <span style="color:red;">Нет</span>
                                                <?endif;?></p>
                                            </div>
                                            <!--div class="stars">
                                                <span class="zmdi zmdi-star col-amber"></span>
                                                <span class="zmdi zmdi-star col-amber"></span>
                                                <span class="zmdi zmdi-star col-amber"></span>
                                                <span class="zmdi zmdi-star col-amber"></span>
                                                <span class="zmdi zmdi-star-outline"></span>
                                            </div>
                                            <span class="m-l-10">41 оценок</span-->
                                        </div>
                                        <hr>
                                        <p class="product-description"><?echo $offer['shortdescription'];?></p>
                                        <div class="action">
                                            <?if($offer['modercheck'] == 0):?>
                                                <button class="btn btn-success waves-effect" type="button">Одобрить оффер</button>
                                            <?endif;?>
                                            <button class="btn btn-warning waves-effect" type="button" style="color:#fff;">Скрыть оффер</button>
                                            <a href="/admin/handlers/deleteOffer.php?id=<?echo $offer['id'];?>"><button class="btn btn-danger waves-effect" type="button">Удалить оффер</button></a> <br><br>
                                            <p>Для отклонения оффера воспользуйтесь формой ниже "Заблокировать оффер".</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?if($offer['modercheck'] == 1):?>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Заблокировать оффер</h2>
                        </div>
                        <div class="body">
                            <div class="form-group">
                                <label for="">Сообщение (отобразиться у рекламодателя)</label>
                                <textarea class="form-control" placeholder="Товар нарушает правила сервиса"></textarea>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-warning" style="color:#fff;">Заблокировать</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?endif;?>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description">Материалы</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#about">Условия</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#fulldescription">Подробное описание</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">                            
                            <div class="tab-content">
                                <div class="tab-pane active" id="description">
                                    <p>Ссылка для привлечения: <input type="text" class="form-control" value="<?echo $offer['promo_url'];?>"></p><br>


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
                                    <p>ГЕО: <?echo $offer['geo'];?></p>
                                    <p>Разрешённые источники: <?echo $offer['socs'];?></p>
                                    <p>Дата добавления: <?echo $offer['add_date'];?></p>
                                </div>
                                <div class="tab-pane" id="fulldescription">
                                   <?echo $offer['description'];?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>