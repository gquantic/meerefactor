<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Просмотр пользователя</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                        <li class="breadcrumb-item active"><a href="users.php">Пользователи</a></li>
                        <li class="breadcrumb-item active">Пользователь</li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Общие</strong> данные</h2>
                        </div>
                        <div class="body">
                         <div class="form-edit">
                            <div class="form-group">
                                <label for="edit_price">ID</label>
                                <input type="text" id="edit_id" class="form-control" value="<?=$exuser['id'];?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="obsum">Общий баланс (Основной + Реферальный)</label>
                                <input type="text" id="obsum" class="form-control" value="<?=$exuser['balance'] + $exuser['referal_balance'];?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="obsum">Баланс для вывода</label>
                                <input type="text" id="widthbalance" class="form-control" value="<?=$exuser['width_balance'];?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="obsum">Общий холд (Основной + Реферальный)</label>
                                <input type="text" id="obsum" class="form-control" value="<?=$exuser['hold'] + $exuser['referal_hold'];?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="edit_price">Имя</label>
                                <input type="text" id="edit_name" class="form-control" value="<?=$exuser['name'];?>">
                            </div>
                            <div class="form-group">
                                <label for="edit_pa">Email</label>
                                <input type="text" id="edit_email" class="form-control" value="<?=$exuser['email'];?>">
                            </div>
                            <div class="form-group">
                                <label for="edit_status">Баланс</label>
                                <input type="text" id="edit_balance" class="form-control" value="<?=$exuser['balance'];?>">
                            </div>
                            <div class="form-group">
                                <label for="edit_status">Холд</label>
                                <input type="text" id="edit_hold" class="form-control" value="<?=$exuser['hold'];?>">
                            </div>

                            <div class="form-group">
                                <label for="edit_status">Реферальный баланс</label>
                                <input type="text" id="edit_rbalance" class="form-control" value="<?=$exuser['referal_balance'];?>">
                            </div>

                            <div class="form-group">
                                <label for="edit_status">Реферальный холд</label>
                                <input type="text" id="edit_rhold" class="form-control" value="<?=$exuser['referal_hold'];?>">
                            </div>
                            <div class="form-group text-right">
                                <button id="savesetts" class="btn btn-warning" style="background: #ff6100;color:#fff;">Сохранить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Пригласил</strong> пользователя</h2>
                    </div>
                    <div class="body">
                        <p>ID: <?=$invited['id'];?></p>
                        <p>Имя: <a href="user.php?id=<?=$invited['id'];?>"><?=$invited['name'];?></a></p>
                        <p>Реферальный баланс: <?=$invited['referal_balance'];?></p>
                        <p>Реферальный холд: <?=$invited['referal_hold'];?></p>
                    </div>
                </div>
            </div>
        </div>

        <?php if($exuser['blocked'] == 0): ?>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Заблокировать</strong> пользователя</h2>
                    </div>
                    <div class="body">
                        <div class="form-group">
                            <label for="">Причина блокировки</label>
                            <input type="text" id="bancomment" class="form-control">
                        </div>
                        <div class="text-right">
                            <button id="banuser" class="btn btn-warning" style="background: #ff6100;color:#fff;">Заблокировать</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php elseif($exuser['blocked'] == 1): ?>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Разблокировать</strong> пользователя</h2>
                    </div>
                    <div class="body">
                        <p><b>Причина бана:</b> <?php echo $exuser['block_comment']; ?></p>
                        <div class="text-right">
                            <button id="unbanuser" class="btn btn-warning" style="background: #ff6100;color:#fff;">Разблокировать</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Рефералы</strong> пользователя</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-conversions">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Имя</th>
                                        <th>Email</th>
                                        <th>Баланс</th>
                                        <th>Холд</th>
                                        <th>Дата регистрации</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while($referal = mysqli_fetch_assoc($referals)){
                                        ?>
                                        <tr>
                                            <td><a href="user.php?id=<?=$referal['id'];?>"><?=$referal['id'];?></a></td>
                                            <td><?=$referal['name'];?></td>
                                            <td><?=$referal['email'];?></td>
                                            <td><?=$referal['balance'];?></td>
                                            <td><?=$referal['hold'];?></td>
                                            <td><?=$referal['regdate'];?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Конверсии</strong> пользователя</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-conversions">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ID транзакции</th>
                                        <th>Веб-мастер</th>
                                        <th>Цена</th>
                                        <th>PA</th>
                                        <th>Статус</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while($conversion = mysqli_fetch_assoc($conversions)){
                                        ?>
                                        <tr>
                                            <td><a href="conversion.php?id=<?=$conversion['id'];?>"><?=$conversion['id'];?></a></td>
                                            <td><?=$conversion['transaction_id'];?></td>
                                            <td><?=$conversion['webmaster_id'];?></td>
                                            <td><?=$conversion['price'];?></td>
                                            <td><?=$conversion['pa'];?></td>
                                            <td><?=$conversion['status'];?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>



<script type="text/javascript">
    // Save
    $('#savesetts').on('click', function(){
        $.post(
            "/admin/handlers/editUserInfo.php",
            {
                edit_id: $('#edit_id').val(),
                edit_name: $('#edit_name').val(),
                edit_email: $('#edit_email').val(),
                edit_balance: $('#edit_balance').val(),
                edit_hold: $('#edit_hold').val(),
                edit_rbalance: $('#edit_rbalance').val(),
                edit_rhold: $('#edit_rhold').val()
            },
            function(data){
                $('#savesetts').html(data);

                setTimeout(function(){
                    $('#savesetts').html('Сохранить');
                }, 1000);
            }
            );
    });

    $('#banuser').on('click', function(){
        $.post(
            "/admin/handlers/banuser.php",
            {
                type: "block",
                user_id: $('#edit_id').val(),
                comment: $('#bancomment').val()
            },
            function(data){
                $('#banuser').html(data);
                window.location.reload();
            }
        );
    });

    $('#unbanuser').on('click', function(){
        $.post(
            "/admin/handlers/banuser.php",
            {
                type: "unblock",
                user_id: $('#edit_id').val()
            },
            function(data){
                $('#unbanuser').html(data);
                window.location.reload();
            }
        );
    });
</script>