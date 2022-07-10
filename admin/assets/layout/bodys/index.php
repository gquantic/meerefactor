<?php
use Libs\Controllers\Db;
use Libs\Controllers\Conversions;
?>

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
                        <h6>Всего веб-мастеров</h6>
                        <h2><?echo mysqli_num_rows(Db::query("SELECT * FROM `users` WHERE `type`='webmaster'"));?></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card widget_2 sales">
                    <div class="body">
                        <h6>Всего рекламодателей</h6>
                        <h2><?echo mysqli_num_rows(Db::query("SELECT * FROM `users` WHERE `type`='advertiser'"));?></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card widget_2 sales">
                    <div class="body">
                        <h6>В общем лидов</h6>
                        <h2><?echo mysqli_num_rows(Db::query("SELECT * FROM `conversions`"));?></h2>
                    </div>
                </div>
            </div>
        </div> 


        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong><i class="zmdi zmdi-chart"></i> Движение</strong> Бюджета (Рассчёт количества на неделю)</h2>
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
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="state_w1 mb-1 mt-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5><?echo mysqli_num_rows(Db::query("SELECT * FROM `conversions`"));?></h5>
                                            <span><i class="zmdi zmdi-alert-circle-o"></i> Конверсий</span>
                                        </div>
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#82c885">5,3,0,1,0,0,4</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="state_w1 mb-1 mt-1">
                                    <div class="d-flex justify-content-between">
                                        <div>                            
                                            <h5>0</h5>
                                            <span><i class="zmdi zmdi-print"></i> Пополнений баланса</span>
                                        </div>
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#45aaf2">2,0,3,0,6,0, 2</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div id="chart-area-statistic-admin-meemoney" class="c3_chart d_sales"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?=
        Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 7))
    ?>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js" integrity="sha512-+IpCthlNahOuERYUSnKFjzjdKXIbJ/7Dd6xvUp+7bEw0Jp2dg6tluyxLs+zq9BMzZgrLv8886T4cBSqnKiVgUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.js" integrity="sha512-11Z4MD9csmC3vH8Vd0eIPJBQu3uEHEqeznWEt3sLBCdQx3zm9mJbBcJH8WTcyGY9EXDE81BNpjE2vLosPK8cFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script></script>
<script>
    // #chart-area-statistic-admin-meemoney


    $(document).ready(function(){
        var chart = c3.generate({
            bindto: '#chart-area-statistic-admin-meemoney',
            data: {
                columns: [
                    ['data1',
                        <?= mysqli_num_rows(Db::exportInPeriod('users', 'regdate', 6)) ?>,
                        <?= mysqli_num_rows(Db::exportInPeriod('users', 'regdate', 5)) ?>,
                        <?= mysqli_num_rows(Db::exportInPeriod('users', 'regdate', 4)) ?>,
                        <?= mysqli_num_rows(Db::exportInPeriod('users', 'regdate', 3)) ?>,
                        <?= mysqli_num_rows(Db::exportInPeriod('users', 'regdate', 2)) ?>,
                        <?= mysqli_num_rows(Db::exportInPeriod('users', 'regdate', 1)) ?>,
                        <?= mysqli_num_rows(Db::exportInPeriod('users', 'regdate', 0)) ?>
                    ],

                    ['data2',
                        <?= mysqli_num_rows(Db::exportInPeriod('conversions', 'autodate', 6)) ?>,
                        <?= mysqli_num_rows(Db::exportInPeriod('conversions', 'autodate', 5)) ?>,
                        <?= mysqli_num_rows(Db::exportInPeriod('conversions', 'autodate', 4)) ?>,
                        <?= mysqli_num_rows(Db::exportInPeriod('conversions', 'autodate', 3)) ?>,
                        <?= mysqli_num_rows(Db::exportInPeriod('conversions', 'autodate', 2)) ?>,
                        <?= mysqli_num_rows(Db::exportInPeriod('conversions', 'autodate', 1)) ?>,
                        <?= mysqli_num_rows(Db::exportInPeriod('conversions', 'autodate', 0)) ?>
                    ],

                    ['data3',
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 6)) ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 5)) ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 4)) ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 3)) ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 2)) ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 1)) ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 0)) ?>
                    ],

                    ['data4',
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 6), 'new') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 5), 'new') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 4), 'new') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 3), 'new') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 2), 'new') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 1), 'new') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 0), 'new') ?>
                    ],

                    ['data5',
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 6), 'rejected') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 5), 'rejected') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 4), 'rejected') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 3), 'rejected') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 2), 'rejected') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 1), 'rejected') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 0), 'rejected') ?>
                    ],

                    ['data6',
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 6), 'approved') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 5), 'approved') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 4), 'approved') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 3), 'approved') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 2), 'approved') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 1), 'approved') ?>,
                        <?= Conversions::getAmount(Db::exportInPeriod('conversions', 'autodate', 0), 'approved') ?>
                    ]
                ],
                type: 'area-spline',
                colors: {
                    'data1': Aero.colors["teal"],
                    'data2': Aero.colors["green"],
                    'data3': Aero.colors["orange"],
                    'data4': Aero.colors["orange"],
                    'data5': Aero.colors["red"],
                    'data6': Aero.colors["green"],
                },
                names: {
                    'data1': 'Регистрации',
                    'data2': 'Конверсии',
                    'data3': 'Сумма всех конверсий',
                    'data4': 'Сумма новых конверсий',
                    'data5': 'Сумма отклонненых конверсий',
                    'data6': 'Сумма подтвержденных конверсий'
                }
            },
            axis: {
                x: {
                    type: 'category',
                    // name of each category
                    categories: [
                        '<?= str_replace('-', '.', date('d-m-Y', time() - (86400 * 6)));?>',
                        '<?= str_replace('-', '.', date('d-m-Y', time() - (86400 * 5)));?>',
                        '<?= str_replace('-', '.', date('d-m-Y', time() - (86400 * 4)));?>',
                        '<?= str_replace('-', '.', date('d-m-Y', time() - (86400 * 3)));?>',
                        '<?= str_replace('-', '.', date('d-m-Y', time() - (86400 * 2)));?>',
                        '<?= str_replace('-', '.', date('d-m-Y', time() - (86400 * 1)));?>',
                        '<?= str_replace('-', '.', date('d-m-Y', time() - 0));?>'
                    ]
                },
            },
        });
    });
</script>
