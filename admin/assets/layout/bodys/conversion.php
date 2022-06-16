<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Конверсия [<?=$cv['id'];?>]</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                        <li class="breadcrumb-item active">Конверсии</li>
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
                                <input type="text" id="edit_id" class="form-control" value="<?=$cv['id'];?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="edit_price">Цена лида</label>
                                <input type="text" id="edit_price" class="form-control" value="<?=$cv['price'];?>">
                            </div>
                            <div class="form-group">
                                <label for="edit_pa">PA</label>
                                <input type="text" id="edit_pa" class="form-control" value="<?=$cv['pa'];?>">
                            </div>
                            <div class="form-group">
                                <label for="edit_status">Статус</label>
                                <input type="text" id="edit_status" class="form-control" value="<?=$cv['status'];?>">
                            </div>
                            <button id="savesetts" class="btn btn-warning float-right" style="background: #ff6100;color:#fff;">Сохранить</button>
                            <p>[pending] - ожидание <br> [approved] - принят <br> [rejected] - отклонён</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Изменить</strong> баланс</h2>
                    </div>
                    <div class="body">
                        <div class="form-group">
                            <label for="">Необходимая операция</label>
                            <select class="form-control show-tick select2" id="operationd" data-placeholder="Что надо сделать?">
                                <option value="pay">Пополнить</option>
                                <option value="rej">Минус</option>
                                <option value="hold">В холд</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="opprice">Цена лида</label>
                            <input type="text" id="opprice" class="form-control" value="<?=$cv['price'];?>">
                        </div>
                        <button id="editpay" class="btn btn-warning float-right" style="background: #ff6100;color:#fff;">Сохранить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Информация</strong> о Веб-мастере</h2>
                </div>
                <div class="body">
                    <p>ID: <?=$user['id'];?></p>
                    <p>Имя: <?=$user['name'];?></p>
                    <p>Баланс: <?=$user['balance'];?></p>
                    <p>Холд: <?=$user['hold'];?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Информация</strong> об оффере</h2>
                </div>
                <div class="body">
                    <p>Название: <?=$offer['name'];?></p>
                    <p>Цена: <?=$offer['leadPrice'];?>p.</p>
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
            "/admin/handlers/editConversion.php",
            {
                id: $('#edit_id').val(),
                price: $('#edit_price').val(),
                pa: $('#edit_pa').val(),
                status: $('#edit_status').val()
            },
            function(data){
                $('#savesetts').html(data);

                setTimeout(function(){
                    $('#savesetts').html('Сохранить');
                }, 1000);
            }
            );
    });

    // Pay edit
    $('#editpay').on('click', function(){
        $.post(
            "/admin/handlers/payConversion.php",
            {
                id: $('#edit_id').val(),
                price: $('#opprice').val(),
                op: $('#operationd').val()
            },
            function(data){
                $('#editpay').html(data);

                setTimeout(function(){
                    $('#editpay').html('Сохранить');
                }, 1000);
            }
            );
    });
</script>