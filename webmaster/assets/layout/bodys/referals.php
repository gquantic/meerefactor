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
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card widget_2 traffic">
                    <div class="body">
                        <h6>Привлечено рефералов</h6>
                        <h2 style="color:#fa6801;"><?echo mysqli_num_rows($_Db->query("SELECT * FROM `users` WHERE `referal`='$userId'"));?></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card widget_2 sales">
                    <div class="body">
                        <h6>Всего заработано с рефералов</h6>
                        <h2 style="color:#0613ba;"><?echo $userData['referal_balance'];?><span style="font-size:18px;">₽</span></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card widget_2 sales">
                    <div class="body">
                        <h6>ВСЕГО ОЖИДАЕТСЯ С РЕФЕРАЛОВ</h6>
                        <h2><?echo $userData['referal_hold'];?><span style="font-size:18px;">₽</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <div class="container-fluid">
       <div class="row clearfix">
        <div class="col-lg-6 col-md-12">
            
            <div class="card">
                <div class="header">
                    <h2><strong>Промокод</strong> для рефералов</h2>
                </div>

                <div class="body">
                    <p>Ваш код приглашения</p>

                    <input type="text" value="<?echo $userData['promocode'];?>" class="form-control" disabled>
                    <br>
                    <!--div class="text-right js-sweetalert">
                        <button class="btn btn-danger waves-effect success btn-raised" onclick="generateCodeAlert();">Сгенерировать новый</button>
                        <button class="btn btn-primary waves-effect success btn-raised" onclick="alertGenerate('Промокод успешно скопирован!', 'success');">Скопировать промокод</button>
                    </div-->
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Ссылка</strong> для рефералов</h2>
                </div>

                <div class="body">
                    <p>Ваша реферальная ссылка</p>

                    <input type="text" class="form-control" value="https://lk.meemoney.ru/referal_reg.php?id=<?echo $userData['id']?>" disabled>
                    <br>
                    <!--div class="text-right js-sweetalert">
                        <button class="btn btn-primary waves-effect" onclick="alertGenerate('Ссылка успешно скопирована!', 'success');">Скопировать ссылку</button>
                    </div-->
                 </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Как пригласить друзей?</strong> Проще простого!</h2>
                </div>

                <div class="body">
                    <p style="font-size: 17px;line-height: 22px;margin-bottom: 0px;">Скопируй ссылку, отправь ее другу по почте или SMS,
                    сообщением в любимом мессенджере или просто
                    размести информацию у себя на стене в социальной
                    сети и напиши пригласительный код!</p> <br>
                 </div>
            </div>
        </div>
        
        <div class="col-lg-12 col-md-12" id="referalstag">
            <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#description">Рефералы</a></li>
                                <li class="nav-item"><a class="nav-link" href="stats.php">Заявки рефералов</a></li>
                            </ul>
                        </div>
                    </div>
            <div class="card">
                <div class="header">
                    <h2><strong>Список</strong> рефералов</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable js-conversions">
                                            <thead>
                                                <tr>
                                                    <th>Логин</th>
                                                    <th>Дата</th>
                                                    <th>Уровень</th>
                                                    <th>Доход</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?while($referal = mysqli_fetch_assoc($referals)):
                                                    $sum = mysqli_fetch_assoc($db->query("SELECT SUM(`price`) FROM `conversions` WHERE `webmaster_id`='".$referal['id']."'"));
                                                 ?>
                                                <tr>
                                                    <td><?echo $referal['name']?></td>
                                                    <td><?echo str_replace('-','.',substr($referal['regdate'], 0, 16));?></td>
                                                    <td>1</td>
                                                    <td><?if(is_null($sum["SUM(`price`)"])) echo 0; else echo $sum["SUM(`price`)"] * (20 / 100);?>₽</td>
                                                </tr>
                                                <?endwhile;?>
                                            </tbody>
                                        </table>
                                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
</section>