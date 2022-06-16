<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Подробности оффера</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                        <li class="breadcrumb-item"><a href="offers.php">Офферы</a></li>
                        <li class="breadcrumb-item active">Подробности оффера</li>
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
                                        <h3 class="product-title mb-0"><?echo $offer['name'];?> <?if($offer['root'] == 1):?><i class="zmdi zmdi-check" style="font-size: 20px;margin-left: 5px;color:#5c9ce6;"></i><?endif;?></h3><br>
                                        <h5 class="price mt-0">Ваш доход: <span class="col-amber" style="color:#ff6100 !important;"><?echo $offer['leadPrice'];?>₽</span></h5>
                                        <p style="font-size:17px;margin-top:-15px;">Холд: <?echo $offer['hold'];?> дней</p>
                                        <!--div class="rating">
                                            <div class="stars">
                                                <span class="zmdi zmdi-star col-amber"></span>
                                                <span class="zmdi zmdi-star col-amber"></span>
                                                <span class="zmdi zmdi-star col-amber"></span>
                                                <span class="zmdi zmdi-star col-amber"></span>
                                                <span class="zmdi zmdi-star-outline"></span>
                                            </div>
                                            <span class="m-l-10">41 оценок</span>
                                        </div-->
                                        <hr>
                                        <p class="product-description"><?echo $offer['shortdescription'];?></p>
                                        <div class="action">
                                            <?if($offer['root'] != 1):?>
                                            <a href="connectoffer.php?id=<?echo $offer['id'];?>"><button class="btn btn-success waves-effect" type="button">Запросить подключение</button></a>
                                            <?else:?>
                                            <!--p>Запрашивать разрешение не требуется, так как это официальный оффер.</p-->
                                            <?endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description">Материалы</a></li>
                                <!--li class="nav-item"><a class="nav-link" data-toggle="tab" href="#review">Отзывы</a></li-->
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#about">Условия</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#fulldesc">Подробное описание</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">                            
                            <div class="tab-content">
                                <div class="tab-pane active" id="description">
                                    <?if($offer['needcheck'] == 0):?>
                                    <div class="form-group">
                                        <label for="">Ссылка для привлечения:</label>
                                        <div class="row">
                                            <div class="col-xl-9 col-lg-8 col-md-8">
                                                <input type="text" class="form-control" value="https://lk.meemoney.ru/go.php?id=<?echo $offer['id'];?>&wid=<?echo $userData['id'];?>" style="width:100%">
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4">
                                                <a href="https://lk.meemoney.ru/go.php?id=<?echo $offer['id'];?>&wid=<?echo $userData['id'];?>" target="_blank">
                                                    <button class="btn btn-warning" style="width:100%;color:#fff !important;background: #ff6100;">Заработать <?= $offer['leadPrice'] ?>₽</button>
                                                </a>
                                            </div>
                                        </div>      
                                    </div>
                                    <?else: 
                                    $selectres = $db->query("SELECT * FROM `ofconnect` WHERE `webid`='".$userData['id']."' AND `offid`='".$_GET['id']."'");
                                    if(mysqli_num_rows($selectres) > 0): $res = mysqli_fetch_assoc($selectres); $temp = $db->fQuery("SELECT * FROM `templates` WHERE `id`='".$res['tempid']."'");?>
                                    <div class="form-group">
                                        <label for="">Ссылка для привлечения:</label>
                                        <div class="row">
                                            <div class="col-xl-9 col-lg-8 col-md-8">
                                            <input type="text" class="form-control" value="https://lk.meemoney.ru/go.php?id=<?echo $offer['id'];?>&wid=<?echo $userData['id'];?>" style="width:100%">
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4">
                                                <a href="https://lk.meemoney.ru/go.php?id=<?echo $offer['id'];?>&wid=<?echo $userData['id'];?>" target="_blank">
                                                    <button class="btn btn-warning" style="width:100%;color:#fff !important;background: #ff6100;">Протестировать продукт</button>
                                                </a>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <p style="font-size:15px;margin-top:5px;"><span style="color:red;">Внимание!</span> Для данного оффера действуют ограничения. <a href="" data-toggle="modal" data-target="#meeLigaModal">Подробнее...</a></p>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 mt-3">
                                                <p style="font-size:15px;margin-top:5px;"><span style="color:red;">Подключеная Вами площадка:</span> <?=$temp['name'];?>. <br> 
                                                Пожалуйста, используйте именно эту площадку, для привлечения трафика.</p>
                                            </div>
                                        </div>      
                                    </div>
                                    <br>
                                    <?else:?>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-8 col-lg-8 col-md-8">
                                            <form action="/webmaster/handlers/connecttemplate.php" method="post">
                                                    <!--<a href="https://lk.meemoney.ru/go.php?id=<?#echo $offer['id'];?>&wid=<?#echo $userData['id'];?>" target="_blank">-->
                                                        <!--<button class="btn btn-warning" style="width:100%;color:#fff !important;background: #ff6100;">Протестировать продукт</button>-->
                                                    <!--</a>-->
                                                    <select class="selecttemp" name="tempid">
                                                        <?php   $templs = $db->query("SELECT * FROM `templates` WHERE `web_id`='".$userData['id']."'"); var_dump($templs);
                                                                while($temp = mysqli_fetch_assoc($templs)): ?>
                                                            <option value="<?php echo $temp['id']; ?>"><?php echo $temp['name']; ?></option>
                                                        <?php endwhile; ?>
                                                        <input value="<?= $_GET['id']; ?>" name="game" hidden>
                                                    </select>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4">
                                                    <a href="" target="_blank">
                                                        <button class="btn btn-warning" type="submit" style="width:100%;color:#fff !important;background: #ff6100;">Начать</button>
                                                    </a>
                                                </div>
                                            </form>
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <p style="font-size:15px;margin-top:5px;"><span style="color:red;">Внимание!</span> Для данного оффера действуют ограничения. <a href="" data-toggle="modal" data-target="#meeLigaModal">Подробнее...</a></p>
                                            </div>
                                        </div>      
                                    </div>
                                    <?endif; endif;?>


                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p>Баннер 1:</p>
                                            <?  $bannerLink1 = '../upload/offers/'.$offer['banner1']; 
                                                if(file_exists($bannerLink1)):?>
                                                <a href="/upload/offers/<?echo $offer['banner1'];?>" target="_blank"><img src="/upload/offers/<?echo $offer['banner1'];?>" alt="" width="400px"></a>
                                            <?  else: ?>
                                                <p>Баннер отсутствует</p>
                                            <?  endif; ?>
                                        </div>

                                        <div class="col-lg-4">
                                            <p>Баннер 2:</p>
                                            <?  $bannerLink2 = '../upload/offers/'.$offer['banner2']; 
                                                if(file_exists($bannerLink2)):?>
                                                <a href="/upload/offers/<?echo $offer['banner2'];?>" target="_blank"><img src="/upload/offers/<?echo $offer['banner2'];?>" alt="" width="400px"></a>
                                            <?  else: ?>
                                                <p>Баннер отсутствует</p>
                                            <?  endif; ?>
                                        </div>

                                        <div class="col-lg-4">
                                            <p>Баннер 3:</p>
                                            <?  $bannerLink3 = '../upload/offers/'.$offer['banner3']; 
                                                if(file_exists($bannerLink3)):?>
                                                <a href="/upload/offers/<?echo $offer['banner3'];?>" target="_blank"><img src="/upload/offers/<?echo $offer['banner3'];?>" alt="" width="400px"></a>
                                            <?  else: ?>
                                                <p>Баннер отсутствует</p>
                                            <?  endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="about">
                                    <p>ГЕО: <?echo $offer['geo'];?></p>
                                    <p>Разрешённые источники: <?echo $offer['socs'];?></p>
                                    <p>Холд: <?echo $offer['hold'];?> дней</p>
                                    <p>Запрещённые ГЕО: <?if($offer['blockCountries'] == '') echo "Нет ограничений"; else echo $offer['blockCountries'];?></p>
                                    <p>Дата добавления: <?echo $offer['add_date'];?></p>
                                </div>
                                <div class="tab-pane" id="fulldesc">
                                    <!--pre style="font-size: 14px;"--><?echo $offer['description'];?><!--/pre-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="meeLigaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content mee_liga_modal">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel"><?= $state['title']; ?></h4>
            </div>
            <div class="modal-body">
                

                <h2>Офферы с ограничением!</h2>
                <p><b>В сервисе MeeMoney имеются офферы с скрытой ссылкой для продвижения!</b></p>
                <p>Для того чтобы получить ссылку и возможность привлекать клиентов на данный оффер Вам необходимо пройти модерацию своей площадки на которой Вы разместите партнерскую ссылку. Или описать нам иную механику или ресурс через который вы планируете привлекать клиентов на данный оффер.</p><p>Для начала Вам необходимо перейти в профиль и нажав на кнопку "Добавить площадку" заполнить все необходимые поля (указать площадку или ресурс на котором будет размещена ссылка) и сохранить данные.</p><p>Далее дождаться проверки Ваших данных администратором нашего сервиса, и в случае одобрения Вам станет доступна ссылка для размещения на своих ресурсах и привлечения клиентов.</p><p><b>&nbsp;&nbsp;</b></p>

            </div><br><br>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<style>
    .selecttemp{
        width: 100% !important;
    }
</style>