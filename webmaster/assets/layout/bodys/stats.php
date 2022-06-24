<!-- Main Content -->

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Общая статистика</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                    <li class="breadcrumb-item active">Панель</li>
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
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card widget_2 big_icon traffic">
                    <div class="body">
                        <h6>Клики</h6>
                        <h2 style="color:#1d29c0;">
                            <?= $leadsStat['clicks']; ?>
                        </h2>
                        <!--small>на 0% больше, чем в прошлом месяце</small>
                        <div class="progress">
                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                        </div-->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon sales">
                    <div class="body">
                        <h6>Конверсии</h6>
                        <h2 style="color:#fa6801;">
                            <?= mysqli_num_rows($conversions); ?>
                        </h2>
                        <!--small>на 0% больше, чем в прошлом месяце</small>
                        <div class="progress">
                            <div class="progress-bar l-blue" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                        </div-->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon email">
                    <div class="body">
                        <h6>Отклонённые</h6>
                        <h2>
                            <?= mysqli_num_rows($conversionsRejected); ?>
                        </h2>
                        <!--small>На 0% больше, чем в прошлом месяце</small>
                        <div class="progress">
                            <div class="progress-bar l-purple" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                        </div-->
                    </div>
                </div>
            </div>
            <!--div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon domains">
                    <div class="body">
                        <h6>Ссылок создано</h6>
                        <h2>0 <small class="info">из 35</small></h2>
                        <small>Общее количество</small>
                        <div class="progress">
                            <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                        </div>
                    </div>
                </div>
            </div-->
        </div>
        <!--div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong><i class="zmdi zmdi-chart"></i> Статистика</strong> Посещений</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp">
                                    <li><a href="javascript:void(0);">Подробно</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body mb-2">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="state_w1 mb-1 mt-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5>0</h5>
                                            <span><i class="zmdi zmdi-balance"></i> Посещений</span>
                                        </div>
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#868e96">0,0,0,0,0,0,0</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="state_w1 mb-1 mt-1">
                                    <div class="d-flex justify-content-between">
                                        <div>                                
                                            <h5>0</h5>
                                            <span><i class="zmdi zmdi-turning-sign"></i> Завершений</span>
                                        </div>
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#2bcbba">0,0,0,0,0,0,0</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="state_w1 mb-1 mt-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5>0</h5>
                                            <span><i class="zmdi zmdi-alert-circle-o"></i> Уникальных</span>
                                        </div>
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#82c885">0,0,0,0,0,0,0</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="state_w1 mb-1 mt-1">
                                    <div class="d-flex justify-content-between">
                                        <div>                            
                                            <h5>0</h5>
                                            <span><i class="zmdi zmdi-print"></i> Счетов создано</span>
                                        </div>
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#45aaf2">0,0,0,0,0,0,0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div id="chart-area-spline-sracked" class="c3_chart d_sales"></div>
                    </div>
                </div>
            </div>
        </div-->
        <div class="row clearfix">

        <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description">Заявки</a></li>
                                <!--li class="nav-item"><a class="nav-link" data-toggle="tab" href="#review">Отзывы</a></li-->
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#about">Заявки рефералов</a></li>
                                <li class="nav-item"><a class="nav-link" href="referals.php#referalstag">Рефералы</a></li>
                                <!--li class="nav-item"><a class="nav-link" data-toggle="tab" href="#fulldesc">Все транзакции</a></li-->
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">                            
                            <div class="tab-content">
                                <div class="tab-pane active" id="description">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable js-conversions">
                                            <thead>
                                                <tr>
                                                    <th>Предложение</th>
                                                    <th>Дата</th>
                                                    <th>Сумма заявки</th>
                                                    <th>Статус</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Предложение</th>
                                                    <th>Дата</th>
                                                    <th>Сумма заявки</th>
                                                    <th>Статус</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?while($conversion = mysqli_fetch_assoc($conversions)):
                                                  $meeOffer = mysqli_fetch_assoc(\Libs\Controllers\Db::query("SELECT * FROM `offers` WHERE `id`='".$conversion['offer_id']."'"));
                                                ?>
                                                <tr>
                                                    <td><a <?if($meeOffer['name'] != ''){?>href="viewoffer?id=<?echo $conversion['offer_id'];?>"<?}?>>
                                                        <?if($meeOffer['name'] != ''){?>
                                                            <?=$meeOffer['name'];?>
                                                        <?}else{?>
                                                            Не удалось прогрузить данные
                                                        <?}?>
                                                    </a></td>
                                                    <td><?if($conversion['created'] != '') echo substr($conversion['created'], 0, 16); else echo substr(str_replace('-', '.', $conversion['autodate']), 0, 16);?></td>
                                                    <td><?echo $conversion['price']?>₽</td>
                                                    <td><?if($conversion['status'] == 'pending' || $conversion['status'] == 'new'):?><span style="color:#ff6100;">Ожидание</span><?elseif($conversion['status'] == 'rejected'):?>
                                                    <span style="color:red;">Отклонен</span>
                                                    <?else:?><span style="color:green;">Принят</span><?endif;?></td>
                                                </tr>
                                                <?endwhile;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="tab-pane" id="about">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover dataTable js-conversions">
                                            <thead>
                                                <tr>
                                                    <th>Предложение</th>
                                                    <th>Дата</th>
                                                    <th>Вознаграждение</th>
                                                    <th>Реферал</th>
                                                    <th>Статус</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Предложение</th>
                                                    <th>Дата</th>
                                                    <th>Вознаграждение</th>
                                                    <th>Реферал</th>
                                                    <th>Статус</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                if (count($referralActive) > 0):
                                                for($i = 0; $i <= count($referralActive); $i++){
                                                  if($referralActive[$i] != ''){
                                                    $meeOffer = mysqli_fetch_assoc(\Libs\Controllers\Db::query("SELECT * FROM `offers` WHERE `id`='".$referralActive[$i]['offer_id']."'"));
                                                    $referralActive = mysqli_fetch_assoc(\Libs\Controllers\Db::query("SELECT * FROM `users` WHERE `id`='".$referralActive[$i]['webmaster_id']."'"));
                                                    ?>
                                                <tr>
                                                    <td><a href="viewoffer?id=<?echo $referralActive[$i]['offer_id'];?>">
                                                        <?if($meeOffer['name'] != ''){?>
                                                            <?=$meeOffer['name'];?>
                                                        <?}else{?>
                                                            Не удалось прогрузить данные
                                                        <?}?>
                                                    </a></td>
                                                    <td><?if($referralActive[$i]['created'] != '') echo substr($referralActive[$i]['created'], 0, 16); else echo substr(str_replace('-', '.', $referralActive[$i]['autodate']), 0, 16);?></td>
                                                    <td><?echo 20 * ($referralActive[$i]['price'] / 100)?>₽</td>
                                                    <td><?echo $referralActive['name']?></td>
                                                    <td><?if($referralActive[$i]['status'] == 'pending'):?><span style="color:#ff6100;">Ожидание</span><?elseif($referralActive[$i]['status'] == 'rejected'):?>
                                                    <span style="color:red;">Отклонен</span>
                                                    <?else:?><span style="color:green;">Принят</span><?endif;?></td>
                                                </tr>
                                                <?php
                                                  }}
                                                else:
                                                ?>
                                                    <tr>
                                                        <td colspan="5">
                                                            <p class="mb-0">Реферальных конверсий ещё не было :(</p>
                                                            <a href="/webmaster/referals">Начните приглашать прямо сейчас!</a>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <!--div class="tab-pane" id="fulldesc">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Предложение</th>
                                                    <th>Дата</th>
                                                    <th>Сумма заявки</th>
                                                    <th>Вознаграждение</th>
                                                    <th>Статус</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div-->
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</section>