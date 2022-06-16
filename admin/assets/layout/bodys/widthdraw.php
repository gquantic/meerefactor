<!-- JQuery DataTable Css -->
<link rel="stylesheet" href="assets/layout/blocks/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">

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
                        <h6>Выплаченные средства</h6>
                        <h2><?= $readywidthdrawSum["SUM(`sum`)"]; ?><span style="font-size:18px;">₽</span></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card widget_2 traffic">
                    <div class="body">
                        <h6>Ожидаются к выплате</h6>
                        <h2><?= $waitwidthdrawSum["SUM(`sum`)"]; ?><span style="font-size:18px;">₽</span></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card widget_2 traffic">
                    <div class="body">
                        <h6>Запас</h6>
                        <h2>-<span style="font-size:18px;">₽</span></h2>
                    </div>
                </div>
            </div>
        </div> 

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12" id="widthdraws">
                <div class="card">
                    <div class="header">
                        <h2>Заявки</h2>
                    </div>  
                    <div class="body">
                        <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-conversions">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Пользователь</th>
                                            <th>Дата создания</th>
                                            <th>Сумма</th>
                                            <th>Куда вывести</th>
                                            <th>Статус</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($payout = mysqli_fetch_assoc($payouts)):
                                            $userd = mysqli_fetch_assoc($_Db->query("SELECT * FROM `users` WHERE `id`='".$payout['foruser']."'"));
                                        ?>
                                            <tr>
                                                <th scope="row"><?=$payout['id'];?></th>
                                                <td><a href="user.php?id=<?=$userd['id'];?>" target="__blank"><?=$userd['name'];?></td>
                                                <td><?=$payout['date'];?></td>
                                                <td><?=$payout['sum'];?>₽</td>
                                                <td><?=$payout['req'];?> (<?=$payout['req_name'];?>)</td>
                                                <td><?=$payout['status'];?></td>
                                                <td><a href="/admin/handlers/acceptConversion.php?id=<?=$payout['id'];?>">Изменить статус</a></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>

            <!--div class="col-lg-12 col-md-12 col-sm-12" id="webmasters_profits">
                <div class="card">
                    <div class="header">
                        <h2>История начислений веб-мастерам</h2>
                    </div>  
                    <div class="body">
                        <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Пользователь</th>
                                            <th>Рекламодатель</th>
                                            <th>Конверсия №</th>
                                            <th>Дата</th>
                                            <th>Сумма</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><a href="" class="link">1</a></th>
                                            <td><a href="" class="link">Алиев Мурад Гапурович</a></td>
                                            <td><a href="" class="link">Администрация</a></td>
                                            <td><a href="" class="link">12</a></td>
                                            <td>10.07.2020 15:00</td>
                                            <td>250₽</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="" class="link">1</a></th>
                                            <td><a href="" class="link">Пользователь</a></td>
                                            <td><a href="" class="link">Алиев Мурад Гапурович</a></td>
                                            <td><a href="" class="link">17</a></td>
                                            <td>10.07.2020 15:00</td>
                                            <td>400₽</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12" id="advertiser_balance">
                <div class="card">
                    <div class="header">
                        <h2>Бюджеты рекламодателей</h2>
                    </div>  
                    <div class="body">
                        <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Рекламодатель</th>
                                            <th>Всего транзакций</th>
                                            <th>Дата регистрации</th>
                                            <th>Всего потрачено</th>
                                            <th>На проверке</th>
                                            <th>Сумма</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td><a href="" class="link">Алиев Мурад Гапурович</a></td>
                                            <td>12</td>
                                            <td>10.07.2020 15:00</td>
                                            <td>250₽</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
</section>




<section class="content" id="project_porit">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Доход проекта</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card widget_2 traffic">
                    <div class="body">
                        <h6>Средств прошло через сервис</h6>
                        <h2>0<span style="font-size:18px;">₽</span></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card widget_2 traffic">
                    <div class="body">
                        <h6>Ожидаются к выплате</h6>
                        <h2>0<span style="font-size:18px;">₽</span></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card widget_2 traffic">
                    <div class="body">
                        <h6>Запас</h6>
                        <h2>0<span style="font-size:18px;">₽</span></h2>
                    </div>
                </div>
            </div>
        </div> 

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Лучшие рекламодатели</h2>
                    </div>  
                    <div class="body">
                        <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Пользователь</th>
                                            <th>Дата регистрации</th>
                                            <th>Сумма транзакций</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Алиев Мурад Гапурович</td>
                                            <td>10.07.2020 15:00</td>
                                            <td>8000₽</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Алиев Мурад Гапурович</td>
                                            <td>10.07.2020 15:00</td>
                                            <td>8000₽</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12"  id="best_webmasters">
                <div class="card">
                    <div class="header">
                        <h2>Лучшие веб-мастера</h2>
                    </div>  
                    <div class="body">
                        <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Пользователь</th>
                                            <th>Дата регистрации</th>
                                            <th>Сумма транзакций</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Алиев Мурад Гапурович</td>
                                            <td>10.07.2020 15:00</td>
                                            <td>8000₽</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Алиев Мурад Гапурович</td>
                                            <td>10.07.2020 15:00</td>
                                            <td>8000₽</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
</section-->