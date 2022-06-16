

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Добавить товар</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                        <li class="breadcrumb-item active">MeeLiga</li>
                        <li class="breadcrumb-item active">Добавить товар</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <!-- Form start -->
        <form enctype="multipart/form-data" action="/admin/handlers/createMeeligaOffer.php" method="post">

            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>Загрузите изображение товара</h2>
                            </div>
                            <div class="body">
                                <input type="file" name="offerImage" class="dropify">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong>Информация</strong> об оффере</h2>
                            </div>
                            <div class="body">
                                <label for="about">Название товара</label>
                                <div class="form-group">
                                    <input type="text" name="offerName" placeholder="Наушники Apple AirPods" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Подзаголовок товара</label>
                                    <input type="text" name="offerLastName" placeholder="Беспроводные наушники с чехлом" class="form-control">
                                </div>

                                <label for="shortdesc">Краткое описание оффера</label>
                                <div class="form-group">
                                    <textarea rows="4" class="form-control" name="shortdesc" id="shortdesc" placeholder="Это описание будут видеть веб-мастера"></textarea>
                                </div>

                                <label for="about">Полное описание оффера</label>
                                <div class="form-group">
                                    <textarea rows="4" class="form-control" name="description" id="about" placeholder="Это описание будут видеть веб-мастера"></textarea>
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Стоимость (MeeCoins)</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="font-weight: 600;">
                                                    <img src="/promo/img/logo-fire.png" width="20px" alt="">
                                                </span>
                                            </div>
                                            <input type="text" name="price" class="form-control" placeholder="300">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Категория товара</label>
                                        <select class="form-control show-tick select2" name="category" data-placeholder="Выберите категорию">
                                            <option value="car">Транспорт</option>
                                            <option value="cert">Подарочные сертификаты</option>
                                            <option value="clock">Часы</option>
                                            <option value="game">Развлечение</option>
                                            <option value="bag">Сумки и аксессуары</option>
                                            <option value="tech">Техника</option>
                                            <option value="other">Другое</option>
                                            <option value="service">Сервисы</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Banners -->
<!--                    <div class="col-lg-12 col-md-12">-->
<!--                        <div class="card">-->
<!--                            <div class="header">-->
<!--                                <h2>Рекламные Баннеры (Минимум 2 баннера)</h2>-->
<!--                            </div>-->
<!--                            <div class="body">-->
<!--                                <input type="file" name="banner1" class="dropify"><br>-->
<!--                                <input type="file" name="banner2" class="dropify"><br>-->
<!--                                <input type="file" name="banner3" class="dropify">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <!-- Banners End -->
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="body">
                                <!--                                <div class="col-6" style="display:flex;align-items: center;">-->
                                <!--                                    <div class="checkbox">-->
                                <!--                                        <input id="remember_me" type="checkbox" name="topOffer" value="1">-->
                                <!--                                        <label for="remember_me">-->
                                <!--                                            Опубликовать как топовый оффер-->
                                <!--                                        </label>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <div class="col-12 text-right">
                                    <button style="margin-left: 35px;" class="btn btn-primary">Добавить товар</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

        </form>
        <!-- Form end -->
    </div>
</section>



<!--
    Добавить оффер - Тут размещаем блоки для добавления нового оффера, 

    >> блок с загрузкой изображения оффера, текстовый блок для информации по офферу, блок ГЕО, блок виды трафика, поле с указанием ХОЛДА, блок загрузка фирменных баннеров, блок с полем для внесения даты действия данного оффера. 

    >> Кнопки - сохранить, отправить на модерацию, скрыть оффер, отобразить оффер (последние две кнопки должны становиться активными только после прохождения модерации, т.е. рекламодатель может в любой момент скрыть оффер и тогда он не будет показываться вебмастерам). 

    >> Соответственно надо какой-то иконкой отображать цвет статуса оффера который находиться на модерации или прошел модерацию ( к примеру красная рамочка вокруг блока оффера - это отказ в модерации, зеленая Активен, синяя - находиться на модерации)
-->1