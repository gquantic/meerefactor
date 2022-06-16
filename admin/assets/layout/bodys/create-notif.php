

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
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Информация</strong> об оффере</h2>
                        </div>
                        <div class="body">
                                <label for="about">Заголовок</label>
                                <div class="form-group">                                
                                    <input type="text" name="stateName" id="notifTitle" placeholder="Заголовок уведомления" class="form-control">
                                </div>

                                <label for="about">Текст</label>
                                <div class="form-group">                                
                                    <textarea class="form-control" placeholder="Текст уведомления" id="notiftext"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Категория</label>
                                            <select class="form-control show-tick select2" id="category" data-placeholder="Что надо сделать?">
                                                <option value="account"> Аккаунт</option>
                                                <option value="alert-triangle">Предупреждение</option>
                                                <option value="close-circle-o">Ошибка</option>
                                                <option value="email">Почта</option>
                                                <option value="info">Информация</option>
                                                <option value="check">Успешная операция</option>
                                                <option value="check-all">Средства зачислены</option>
                                            </select><br><br>

                                            <p>Описание: <br><br>
                                            Аккаунт - <i class="zmdi zmdi-account"></i><br>
                                            Предупреждение - <i class="zmdi zmdi-alert-triangle"></i><br>
                                            Ошибка - <i class="zmdi zmdi-close-circle-o"></i><br>
                                            Почта - <i class="zmdi zmdi-email"></i><br>
                                            Информация - <i class="zmdi zmdi-info"></i><br>
                                            Успешная операция - <i class="zmdi zmdi-check"></i><br>
                                            Средства зачислены - <i class="zmdi zmdi-check-all"></i><br>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Цвет фона</label>
                                            <select class="form-control show-tick select2" id="bgcolor" data-placeholder="Что надо сделать?">
                                                <option value="red">Красный</option>
                                                <option value="blue">Синий</option>
                                                <option value="green">Зеленый</option>
                                                <option value="orange">Оранжевый</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <label for="about">Для пользователя</label>
                                <div class="form-group">                                
                                    <input type="text" class="form-control" placeholder="ID пользователя" id="userid">
                                </div>
                        </div>
                    </div>
                </div>

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-6" style="display:flex;align-items: center;">
                            </div>
                            <div class="col-6 text-right">
                                <button style="margin-left: 35px;" id="savestate" class="btn btn-primary">Добавить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form end -->
    </div>
</section>
    
<script type="text/javascript">
    $('#savestate').on('click', function(){
        $('#savestate').html('Добавление...');

        $.post(
            "/admin/handlers/notifcreate.php",
            {
                title: $('#notifTitle').val(),
                text: $('#notiftext').val(),
                category: $('#category').val(),
                foruser: $('#userid').val(),
                bgcolor: $('#bgcolor').val()
            },
            function(data){
                console.log(data);
                if(data == 'success'){
                    $('#savestate').html('Успешно!');
                }else{
                    $('#savestate').html('Ошибка!');
                }
            }
        );
    });
</script>