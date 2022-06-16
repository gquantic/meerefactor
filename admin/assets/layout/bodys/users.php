<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Пользователи</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                        <li class="breadcrumb-item active">Пользователи</li>
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
                    <!--div class="d-flex">
                        <!--div class="mobile-left">
                            <a class="btn btn-info btn-icon toggle-email-nav collapsed" data-toggle="collapse" href="#email-nav" role="button" aria-expanded="false" aria-controls="email-nav">
                                <span class="btn-label"><i class="zmdi zmdi-more"></i></span>
                            </a>
                        </div>
                        <div class="inbox left" id="email-nav">
                            <div class="mail-compose mb-4">
                                <a href="create-offer.php" class="btn btn-danger btn-block">Добавить оффер</a>
                            </div>
                            <div class="mail-side"> 
                                <ul class="nav">
                                    <li class="active"><a href="mail-inbox.php"><i class="zmdi zmdi-inbox"></i>Все<span class="badge badge-primary"><?#echo $_Db->countEcho("SELECT * FROM `offers`");?></span></a></li>

                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-mail-send"></i>Ожидают <span class="badge badge-warning"><?#echo $_Db->countEcho("SELECT * FROM `offers` WHERE `modercheck`='0'");?></span></a></li>

                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-badge-check"></i>Одобренные <span class="badge badge-success"><?#echo $_Db->countEcho("SELECT * FROM `offers` WHERE `modercheck`='1'");?></span></a></li>

                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-email"></i>Заявки</a></li>

                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-alert-circle"></i>Отклонены <span class="badge badge-danger"><?#echo $_Db->countEcho("SELECT * FROM `offers` WHERE `modercheck`='-1'");?></span></a></li-->

                                    <!--li><a href="javascript:void(0);"><i class="zmdi zmdi-delete"></i>Нарушения<span class="badge badge-danger">9</span></a></li-->
                                <!--/ul-->
                                <!--h3 class="label">Labels</h3>
                                <ul class="nav">
                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-label text-danger"></i>UI Project<span class="badge badge-primary">5</span></a></li>
                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-label text-info"></i>Marketing</a></li>
                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-label text-dark"></i>Payout</a></li>
                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-label text-primary"></i>Meeting</a></li>
                                </ul-->
                            <!--/div-->
                        <!--/div-->
                        <!--div class="inbox right">
                            <div class="i_action d-flex justify-content-between align-items-center">
                                <div class="">
                                    <div class="checkbox simple d-inline-block mr-3">
                                        <input id="mc0" type="checkbox">
                                        <label for="mc0"></label>
                                    </div>
                                    <div class="btn-group">
                                        <a href="javascript:void(0);" class="btn btn-outline-secondary btn-sm"><i class="zmdi zmdi-refresh"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-outline-secondary btn-sm"><i class="zmdi zmdi-archive"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-outline-secondary btn-sm"><i class="zmdi zmdi-delete"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Labels</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);">UI Project</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Marketing</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Payout</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);">Mark as read</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Mark as unread</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Spam</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pagination-email">
                                    <span>1-50/295</span>
                                    <div class="btn-group ml-3">
                                        <button type="button" class="btn btn-outline-secondary btn-sm"><i class="zmdi zmdi-chevron-left"></i></button>
                                        <button type="button" class="btn btn-outline-secondary btn-sm"><i class="zmdi zmdi-chevron-right"></i></button>
                                    </div>
                                </div>
                            </div-->

                            <div class="card">
                                <div class="body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="mb-1">Всего пользователей на сайте: <?php echo mysqli_num_rows($_Db->query("SELECT * FROM `users`")); ?></h5>
                                            <h6 class="text-muted mb-0">Отображено: 500 / <?php echo mysqli_num_rows($_Db->query("SELECT * FROM `users`")); ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="body">
                                    <div id="search_with_id">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Отобразить данные, где поле</label>
                                                    <select class="form-control show-tick select2" id="operationd" data-placeholder="Что надо сделать?">
                                                        <option value="id">ID</option>
                                                        <option value="name">Имя</option>
                                                        <option value="email">Email</option>
                                                        <option value="balance">Баланс</option>
                                                        <option value="hold">Холд</option>
                                                        <option value="regdate">Дата регистрации</option>
                                                    </select>               
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="">Равно значению:</label>
                                                    <input type="text" class="form-control" id="id__search">
                                                </div>
                                            </div>
                                        </div>               
                                    </div>
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
                                                <?
                                                    $userId = $userData['id'];
            
                                                    $users = $_Db->query("SELECT * FROM `users` ORDER BY `id` DESC LIMIT 500");
            
                                                    while($user = mysqli_fetch_assoc($users)){
                                                        ?>
                                                        <tr>
                                                            <td><a href="user.php?id=<?=$user['id'];?>"><?=$user['id'];?></a></td>
                                                            <td><?=$user['name'];?></td>
                                                            <td><?=$user['email'];?></td>
                                                            <td><?=$user['balance'];?></td>
                                                            <td><?=$user['hold'];?></td>
                                                            <td><?=$user['regdate'];?></td>
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
    </div>
</section>

<script type="text/javascript">
    // Поиск по ID
    $('#id__search').keyup(function(){
        if($('#id__search').val() != ''){
          $.post(
            "/admin/handlers/exportUsersC.php",
            {
                data: "users",
                id: $('#id__search').val(),
                index: $('#operationd').val()
            },
            function(data){
                $('tbody').empty();
                $('tbody').append(data);
            }
            );
        }else{
            $.post(
            "/admin/handlers/exportUsersC.php",
            {
                data: "users",
                id: "no",
                index: $('#operationd').val()
            },
            function(data){
                $('tbody').empty();
                $('tbody').append(data);
            }
            );
        }
  });
</script>