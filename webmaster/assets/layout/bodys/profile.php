<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Мой профиль</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                        <li class="breadcrumb-item active">Мой профиль</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="profile-edit.php" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-edit"></i></a>
                </div>
            </div>
        </div> 
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card mcard_3">
                        <div class="body">
                            <a href="profile.php"><img src="assets/images/profile_av.jpg" class="rounded-circle shadow" width="200px" alt="profile-image"></a>
                            <h4 class="m-t-10"><?echo $userData['name'];?> [<?echo $userData['id'];?>]</h4>                            
                            <div class="row">
                                <div class="col-12">
                                    <!--ul class="social-links list-unstyled">
                                        <li><a title="facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a title="twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a title="instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                                    </ul-->
                                    <p class="text-muted"><?echo $userData['email'];?></p>
                                </div>
                                <!--div class="col-4">                                    
                                    <small>Following</small>
                                    <h5>852</h5>
                                </div>
                                <div class="col-4">                                    
                                    <small>Followers</small>
                                    <h5>13k</h5>
                                </div>
                                <div class="col-4">                                    
                                    <small>Post</small>
                                    <h5>234</h5>
                                </div-->   
                                <div class="col-12">
                                    <a href="profile-edit.php" class=""><button class="btn btn-warning">Настройки профиля</button></a>
                                </div>
                            </div>
                        </div>
                    </div>       
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Название</th>
                                            <th>Дата подключения</th>
                                            <th>Статус</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?while($template = mysqli_fetch_assoc($templates)):?>
                                            <tr>
                                                <th><?echo $template['id'];?></th>
                                                <th><a href="<?echo $template['url'];?>" target="_blank" style="color:#000;border-bottom:1px dashed #000;"><?echo $template['name'];?></a></th>
                                                <th><?echo $template['date'];?></th>
                                                <th><?if($template['moder_check'] == 0) echo 'На проверке'; else echo 'Подтверждён';?></th>
                                            </tr>
                                        <?endwhile;?>
                                    </tbody>
                                </table>
                            </div>
                                
                            <div class="text-right">
                                <!--button class="btn btn-neutral pull-right">Редактировать</button-->
                                <a href="create-template.php"><button class="btn btn-primary pull-right">Добавить площадку</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>