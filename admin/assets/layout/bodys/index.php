<!-- Main Content -->
<script>
    $(document).ready(function(){
        var chart = c3.generate({
            bindto: '#chart-area-spline-sracked', // id of chart wrapper
            data: {
                columns: [
                    // each columns data
                    ['data1', 
                    <?echo mysqli_num_rows($_Db->exportInPeriod('users', 'regdate', 6)) ?>, 
                    <?echo mysqli_num_rows($_Db->exportInPeriod('users', 'regdate', 5)) ?>,
                    <?echo mysqli_num_rows($_Db->exportInPeriod('users', 'regdate', 4)) ?>,
                    <?echo mysqli_num_rows($_Db->exportInPeriod('users', 'regdate', 3)) ?>,
                    <?echo mysqli_num_rows($_Db->exportInPeriod('users', 'regdate', 2)) ?>,
                    <?echo mysqli_num_rows($_Db->exportInPeriod('users', 'regdate', 1)) ?>,
                    <?echo mysqli_num_rows($_Db->exportInPeriod('users', 'regdate', 0)) ?>],


                    // Conversions 
                    /*['data2', 
                    <?#echo mysqli_num_rows($_Db->exportInPeriod('conversions', 'created', 7)) ?>,
                    <?#echo mysqli_num_rows($_Db->exportInPeriod('conversions', 'created', 6)) ?>,
                    <?#echo mysqli_num_rows($_Db->exportInPeriod('conversions', 'created', 5)) ?>,
                    <?#echo mysqli_num_rows($_Db->exportInPeriod('conversions', 'created', 4)) ?>,
                    <?#echo mysqli_num_rows($_Db->exportInPeriod('conversions', 'created', 3)) ?>,
                    <?#echo mysqli_num_rows($_Db->exportInPeriod('conversions', 'created', 2)) ?>,
                    <?#echo mysqli_num_rows($_Db->exportInPeriod('conversions', 'created', 1)) ?>],*/
                ],
                type: 'area-spline', // default type of chart
                groups: [
                    [ 'data1' ]
                ],
                colors: {
                    'data1': Aero.colors["teal"],
                    //'data2': Aero.colors["gray"],
                },
                names: {
                    // name of each serie
                    'data1': 'Новых пользователей',
                    //'data2': 'Конверсий',
                }
            },
            axis: {
                x: {
                    type: 'category',
                    // name of each category
                    categories: ['<?echo date('d-m-Y', time() - (86400 * 6));?>', '<?echo date('d-m-Y', time() - (86400 * 5));?>', '<?echo date('d-m-Y', time() - (86400 * 4));?>', '<?echo date('d-m-Y', time() - (86400 * 3));?>', '<?echo date('d-m-Y', time() - (86400 * 2));?>', '<?echo date('d-m-Y', time() - (86400 * 1));?>', '<?echo date('d-m-Y', time() - 0);?>']
                },
            },
            legend: {
                show: true, //hide legend
            },
            padding: {
                bottom: 0,
                top: 0
            },
        });
    });
</script>


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
                        <h2><?echo mysqli_num_rows($_Db->query("SELECT * FROM `users` WHERE `type`='webmaster'"));?></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card widget_2 sales">
                    <div class="body">
                        <h6>Всего рекламодателей</h6>
                        <h2><?echo mysqli_num_rows($_Db->query("SELECT * FROM `users` WHERE `type`='advertiser'"));?></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card widget_2 sales">
                    <div class="body">
                        <h6>В общем лидов</h6>
                        <h2><?echo mysqli_num_rows($_Db->query("SELECT * FROM `conversions`"));?></h2>
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
                                            <h5><?echo mysqli_num_rows($_Db->query("SELECT * FROM `conversions`"));?></h5>
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
                        <div id="chart-area-spline-sracked" class="c3_chart d_sales"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>