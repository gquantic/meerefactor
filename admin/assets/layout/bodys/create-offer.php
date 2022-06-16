

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Мои офферы</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                        <li class="breadcrumb-item active">Офферы</li>
                        <li class="breadcrumb-item active">Мои офферы</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>
    
        <!-- Form start -->
        <form enctype="multipart/form-data" action="/admin/handlers/createOffer.php" method="post">

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Загрузите изображение оффера</h2>
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
                                <label for="about">Заголовок оффера</label>
                                <div class="form-group">                                
                                    <input type="text" name="offerName" placeholder="Название оффера" class="form-control">
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
                                        <label for="">Вознаграждение за лид</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="font-weight: 600;"><!--i class="zmdi zmdi-money"></i--> ₽</span>
                                            </div>
                                            <input type="text" name="leadPrice" class="form-control" placeholder="300">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label for="">Холд в днях без обозначений (по умолчанию 3 дня)</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="font-weight: 600;"><i class="zmdi zmdi-calendar"></i></span>
                                            </div>
                                            <input type="text" name="hold" class="form-control" placeholder="7">
                                        </div>
                                    </div>
                                </div>


                                <label for="">Категория оффера</label>
                                <select class="form-control show-tick select2" name="category" data-placeholder="Выберите категорию">
                                    <optgroup label="Финансы">
                                        <option value="debetcard">Дебетовые карты</option>
                                        <option value="creditcard">Кредитные карты</option>
                                        <option value="loan">Займы</option>
                                        <option value="insure">Страхование</option>
                                        <option value="forbusiness">Для бизнеса</option>
                                    </optgroup>
                                    <optgroup label="Игры и развлечение">
                                        <option value="game_browser">Браузерные</option>
                                        <option value="game_client">Клиентские</option>
                                        <option value="game_mobile">Мобильные</option>
                                    </optgroup>
                                    <optgroup label="Мобильные">
                                        <option value="mobile_instal">Инстал</option>
                                        <option value="mobile_use">Использование</option>
                                    </optgroup>
                                    <optgroup label="Вакансии">
                                        <option value="job_taxi">Такси</option>
                                        <option value="job_delivery">Доставка</option>
                                        <option value="job_other">Прочее</option>
                                    </optgroup>
                                    <optgroup label="Азарт">
                                        <option value="azart_bets">Ставки</option>
                                        <option value="azart_cazino">Казино</option>
                                        <option value="azart_other">Прочее</option>
                                    </optgroup>
                                    <optgroup label="Азарт">
                                        <option value="other">Прочее</option>
                                    </optgroup>
                                </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-6 .col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Системные</strong> настройки</h2>
                        </div>
                        <div class="body">
                            <label for="">Ссылка на промо страницу (будет автоматически преобразовываться в SubID)</label>
                            <div class="form-group">
                                <input type="text" name="promoUrl" class="form-control" placeholder="https://pxl.leads.su/click/8f560158f80fc5919f816b9adb01e77f?aff_sub">
                                <p style="margin-top: 5px;"><span style="font-weight: bold;color:red;">Внимание!</span><br> Введите ссылку на подобии образца <span style="color:green;">https://pxl.leads.su/click/8f560158f80fc5919f816b9adb01e77f?aff_sub</span></span>.</p>
                            </div><br>

                            <label for="">ID оффера в партнёрской программе</label>
                            <div class="form-group">
                                <input type="text" name="subid" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <label for="about">Дата окончания оффера</label>
                                    <div class="input-group masked-input">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                        </div>
                                        <input type="text" name="endDate" class="form-control date" placeholder="30.07.2016">
                                    </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <label>Время окончания оффера (Необязательно)</label>
                                    <div class="input-group masked-input">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-time"></i></span>
                                        </div>
                                        <input type="text" name="endTime" class="form-control time12" placeholder="11:59">
                                    </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>ГЕО</h2>
                        </div>

                        <div class="body">
                          <p>Введите Страны / Регионы</p>
                            <div class="mb-3">
                                <!--select class="form-control show-tick" name="acceptedCounries" multiple>
                                    <optgroup label="Россия" data-max-options="3">
                                        <option>Москва</option>
                                        <option>Санкт-Петербург</option>
                                        <option>Хабаровский край</option>
                                    </optgroup>
                                    <optgroup label="СНГ" data-max-options="2">
                                        <option>Казахстан</option>
                                        <option>Азербайджан</option>
                                    </optgroup>
                                </select-->

                                <input type="text" name="countries" class="form-control">
                            </div>  
                        </div>
                    </div>
                </div>

                <!-- Traffics Start -->
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Источники</h2>
                        </div>

                        <div class="body">
                          <p>Введите название источников (желательно на английском)</p>
                            <div class="mb-3">
                                <!--select class="form-control show-tick" name="acceptedCounries" multiple>
                                    <optgroup label="Россия" data-max-options="3">
                                        <option>Москва</option>
                                        <option>Санкт-Петербург</option>
                                        <option>Хабаровский край</option>
                                    </optgroup>
                                    <optgroup label="СНГ" data-max-options="2">
                                        <option>Казахстан</option>
                                        <option>Азербайджан</option>
                                    </optgroup>
                                </select-->
                                
                                <input type="text" name="socs" class="form-control">
                            </div>  
                        </div>
                    </div>
                </div>
                <!-- Traffics End -->

                <!-- Banners -->
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Рекламные Баннеры (Минимум 2 баннера)</h2>
                        </div>
                        <div class="body">
                            <input type="file" name="banner1" class="dropify"><br>
                            <input type="file" name="banner2" class="dropify"><br>
                            <input type="file" name="banner3" class="dropify">
                        </div>
                    </div>
                </div>
                <!-- Banners End -->
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-6" style="display:flex;align-items: center;">
                                <div class="checkbox">
                                    <input id="remember_me" type="checkbox" name="topOffer" value="1">
                                    <label for="remember_me">
                                            Опубликовать как топовый оффер
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <button style="margin-left: 35px;" class="btn btn-primary">Добавить оффер</button>
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
-->