<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Финансы</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                        <li class="breadcrumb-item">Мой профиль</li>
                        <li class="breadcrumb-item active">Финансы</li>
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
                <div class="col-lg-4 col-md-12">
                    <div class="card mcard_3">
                        <div class="body">
                            <a href="javascript:void(0);" style="color:#000;"><i style="font-size: 50px;" class="zmdi zmdi-balance-wallet"></i></a>
                            <h4 class="m-t-10">Счёт для вывода</h4>                            
                            <div class="row">
                                <div class="col-6">                                    
                                    <small>Готово к выводу</small>
                                    <h5><?echo $userData['width_balance'];?>₽</h5>
                                </div>
                                <div class="col-6">                                    
                                    <small>Доступный баланс</small>
                                    <h5><?echo $userData['balance'] + $userData['referal_balance'];?>₽</h5>
                                </div>
                                <div class="col-12 mt-2">
                                    <a href="#" data-toggle="modal" data-target="#largeModal1"><i class="ti-help-alt" style="font-size: 18px;color:#000;"></i></a>
                                </div>
                                <!--div class="col-4">                                    
                                    <small>Прогноз</small>
                                    <h5>0₽</h5>
                                </div-->                            
                            </div><br>
                            <!--div class="row">
                                <div class="col-12">
                                    <p style="font-size: 15px;">История зачислений <span style="display:block;font-size:14px;margin-top:-5px;color:rgba(0,0,0,.3);">(последние 10 транзакций)</span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Дата</th>
                                                <th>Сумма</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...₽</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div-->
                            <div class="row">
                                <div class="col-12 text-center">
                                    <?if($userData['width_balance'] < 300):?>
                                    <button class="btn btn-warning" style="color:#fff;width:200px;" id="withbtn" onclick="withdraw('#withbtn');">Вывести деньги</button>
                                    <?else:?>
                                    <button class="btn btn-warning" style="color:#fff;width:200px;" id="withbtn" data-toggle="modal" data-target="#largeModal">Вывести деньги</button>
                                    <?endif;?>
                                    <p style="margin-top: 10px;margin-bottom: 0px;">Минимальная сумма вывода: 300₽</p>
                                </div>
                                <!--div class="col-12 text-center mt-1">
                                    <a href="profile-edit.php">Платёжные данные</a>
                                </div-->
                            </div>
                        </div>
                    </div>       


                    <div class="card mcard_3">
                        <div class="body"><br>
                            <a href="javascript:void(0);" style="color:#000;"><i style="font-size: 50px;" class="zmdi zmdi-balance"></i></a>
                            <h4 class="m-t-10">Перевод на счёт для вывода</h4>                            
                            <div class="row">
                                <div class="col-6">                                    
                                    <small>Основной баланс</small>
                                    <h5><?echo $userData['balance'];?>₽</h5>
                                </div>
                                <div class="col-6">                                    
                                    <small>Основной холд</small>
                                    <h5><?echo $userData['hold'];?>₽</h5>
                                </div>                      
                            </div>
                            <div class="row">
                                <div class="col-6">                                    
                                    <small>Реферальный баланс</small>
                                    <h5><?echo $userData['referal_balance'];?>₽</h5>
                                </div>
                                <div class="col-6">                                    
                                    <small>Реферальный холд</small>
                                    <h5><?echo $userData['referal_hold'];?>₽</h5>
                                </div>                     
                            </div><br>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="form-group">
                                        <select class="form-control show-tick select2" id="retbalance" data-placeholder="Что надо сделать?">
                                            <option value="main">С основного баланса - <?=$userData['balance'];?>₽</option>
                                            <option value="referal">С реферального баланса - <?=$userData['referal_balance'];?>₽</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="retsum" class="form-control" placeholder="Сумма">
                                    </div>
                                    <button class="btn btn-warning hovertext" style="color:#fff;width:200px;" id="walletret" helptext="Переведите на основной баланс для вывода" helpplace="bottom">Перевести</button><br><br>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>



                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>Сумма</th>
                                            <th>Вывод на</th>
                                            <th>Реквизиты</th>
                                            <th>Дата Запроса</th>
                                            <th>Статус</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?while($hItem = mysqli_fetch_assoc($hItems)):?>
                                            <tr>
                                                <td><?=$hItem['sum']?>₽</td>
                                                <td><?=$hItem['req_name']?></td>
                                                <td><?=$hItem['req']?></td>
                                                <td><?=str_replace('-','.',substr($hItem['date'], 0, 16))?></td>
                                                <td><?if($hItem['status'] == 1):?><span style="color:green;">Одобрен</span><?elseif($hItem['status'] == 0):?><span style="color:orange;">В ожидании</span><?else:?><span style="color:red;">Отклонён</span><?endif;?></td>
                                            </tr>
                                        <?endwhile;?>
                                        <?if(mysqli_num_rows($hItems) < 1):?>
                                            <tr>
                                                <td colspan="5">Запросов пока не было :(</td>
                                            </tr>
                                        <?endif;?>
                                    </tbody>
                                </table>
                            </div>

                            <!--div class="text-right">
                                <a href="profile-edit.php"><button class="btn btn-neutral pull-right">Платёжные данные</button></a>
                                <button class="btn btn-primary pull-right">Запросить вывод</button>
                            </div-->
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="title" id="largeModalLabel">Вывод средств</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Платёжные данные</label>
                                                <select id="p_where" class="bootstrap-select form-control show-tick">
                                                    <?if($userData['qiwi'] != ''):?>
                                                    <option value="qiwi">Qiwi: <b><?=$userData['qiwi']?></b></option>
                                                    <?endif;?>
                                                    <?if($userData['bcard'] != ''):?>
                                                    <option value="bcard">Карта: <b><?=$userData['bcard']?></b></option>
                                                    <?endif;?>
                                                    <?if($userData['ymoney'] != ''):?>
                                                    <option value="ymoney">Я.Деньги: <b><?=$userData['ymoney']?></b></option>
                                                    <?endif;?>
                                                    <?if($userData['webmoney'] != ''):?>
                                                        <option value="webmoney">Webmoney: <b><?=$userData['webmoney']?></b></option>
                                                    <?endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Сумма</label>
                                                <div class="input-group">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">₽</span>
                                                    </div>
                                                    <input id="p_req" type="text" class="form-control datetimepicker" placeholder="Введите сумму" data-dtp="dtp_UwFNR">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <p>Если в поле "Платёжные данные" нет информации, то Вам необходимо перейти по этой <a href="/webmaster/assets/layout/controllers/profile-edit.php">ссылке</a> и настроить свои реквизиты.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning waves-effect" style="background: #ff6100;color:#fff;" id="wdMoney">Вывести</button>
                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Закрыть</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Large Size -->
                                    <div class="modal fade" id="largeModal1" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="title" id="largeModalLabel">Как пользоваться балансами в сервисе MeeMoney? Как вывести средства?</h4>
                                                </div>
                                                <div class="modal-body"><p><b>В сервисе MeeMoney действуют два баланса:</b></p><p><b>Основной</b> - он представлен на главной странице личного кабинета и отражает общую сумму Ваших личных конверсий и доходов с Ваших рефералов.</p><p><b>Реферальный</b> - данный баланс представлен на страничке <b>"Рефералы"</b> и отражает доход полученный с конверсий Ваших рефералов.</p><p>На страничке <b>"Финансы"</b> Вы можете вывести средства с данных балансов.</p><p>Для осуществления заявки на вывод средств, Вам необходимо перевести доступные для вывода средства с <b>"Основного" </b>баланса или с <b>"Реферального</b>" баланса на счет с которого выводятся средства. </p><p>Если у Вас накопились денежные средства на двух счетах, то Вы можете объеденить все доступные средства на счету для вывода, и подать заявку на общую сумму.</p><p><br></p><p>Желаем успешной работы!<br></p></div><br><br>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Закрыть</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


<script type="text/javascript">
    $('#wdMoney').on('click', function(){
        var btn = $('#wdMoney');
        btn.html('Загрузка');
        $.post(
                "/webmaster/handlers/widthdrawMoney.php",

                {
                    where: $('#p_where').val(),
                    req: $('#p_req').val()
                },

                function(data){
                    if(data == 'suc'){
                        setTimeout(function(){
                            btn.html('Вывести');
                        }, 1000);
                        setTimeout(function(){
                            window.location.reload();
                        }, 1500)
                        btn.html('Запрос успешно создан!');
                    }else if(data == 'nomoney'){
                        setTimeout(function(){
                            btn.html('Вывести');
                        }, 1000);
                        btn.html('Недостаточно средств');
                    }else if(data == 'sumnocorret'){
                        setTimeout(function(){
                            btn.html('Вывести');
                        }, 1000);
                        btn.html('Минимум 300₽!');
                    }else{
                        setTimeout(function(){
                            btn.html('Вывести');
                        }, 1000);
                        btn.html('Неизвестная ошибка');
                    }
                    console.log(data);
                }
            );
    });

    $('#walletret').on('click', function(){
        var btn = $('#walletret');
        btn.html('Загрузка');

        var retsum = $('#retsum').val();
        var retbalance = $('#retbalance').val();

        //console.log(retbalance, retsum);

        $.post(
                "/webmaster/handlers/retwallet.php",

                {
                    retsum: $('#retsum').val(),
                    retbalance: $('#retbalance').val()
                },

                function(data){
                    if(data == 'suc'){
                        setTimeout(function(){
                            btn.html('Вывести');
                        }, 1000);
                        setTimeout(function(){
                            window.location.reload();
                        }, 1500);
                        btn.html('Средства переведены!');
                    }else if(data == 'nomoney'){
                        setTimeout(function(){
                            btn.html('Вывести');
                        }, 1000);
                        btn.html('Недостаточно средств');
                    }else if(data == 'sumnocorret'){
                        setTimeout(function(){
                            btn.html('Вывести');
                        }, 1000);
                        btn.html('Некорректная сумма!');
                    }else{
                        setTimeout(function(){
                            btn.html('Вывести');
                        }, 1000);
                        btn.html('Неизвестная ошибка');
                    }
                    console.log(data);
                }
            );
    });
</script>