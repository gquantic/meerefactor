

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Создание конверсии</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                        <li class="breadcrumb-item active">Конверсии</li>
                        <li class="breadcrumb-item active">Создание</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>
    
        <!-- Form start -->
        <form action="/admin/handlers/createConversion.php" method="post">

        <div class="container-fluid">
            <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Информация</strong> об оффере</h2>
                        </div>
                        <div class="body">
                                <label for="about">ID транзакции</label>
                                <div class="form-group">                                
                                    <input type="text" name="transactid" placeholder="ID транзакции" class="form-control">
                                </div>

                                <label for="about">ID Веб-мастера</label>
                                <div class="form-group">                                
                                    <input type="text" name="webid" placeholder="ID Веб-мастера" class="form-control">
                                </div>

                                <label for="about">ID оффера</label>
                                <div class="form-group">                                
                                    <input type="text" name="offerid" placeholder="ID оффера" class="form-control">
                                </div>

                                <label for="about">Статус конверсии (pending, approved, rejected)</label>
                                <div class="form-group">                                
                                    <input type="text" name="status" placeholder="pending" class="form-control">
                                </div>



                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Вознаграждение</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="font-weight: 600;"><!--i class="zmdi zmdi-money"></i--> ₽</span>
                                            </div>
                                            <input type="text" name="leadPrice" class="form-control" placeholder="300">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-6" style="display:flex;align-items: center;">
                                <div class="checkbox">
                                    <input id="remember_me" type="checkbox" name="autobalance" value="1" checked="">
                                    <label for="remember_me">
                                            Обновить балансы автоматически
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <button style="margin-left: 35px;" class="btn btn-primary">Создать конверсию</button>
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