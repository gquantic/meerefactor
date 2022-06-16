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
        <div class="row rowclearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong><i class="zmdi zmdi-notifications"></i> Новые</strong> уведомления (<span id="notifCount"><?php echo mysqli_num_rows($notifications); ?></span>)</h2>
                    </div>
                    <div class="body">
                        <div class="row" id="notContent">
                            <?php if(mysqli_num_rows($notifications) == 0): ?>
                                <div class="text-center col-lg-12">У вас нет новых уведомлений.</div>
                            <?php endif; ?>
                            <?php while($notif = mysqli_fetch_assoc($notifications)): ?>
                                <!--div class="col-lg-12 mb-2">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="icon-circle bg-red"><i class="zmdi zmdi-settings"></i></div>
                                            </div>
                                            <div class="col-lg-10">
                                                <p class="w_title"><?php echo $notif['title']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div-->
                                <div class="col-lg-12">
                                    <div class="alert bg-<?=$notif['lvl'];?>" role="alert">
                                        <div class="container">
                                            <div class="alert-icon">
                                                <i class="zmdi zmdi-<?=$notif['category'];?>"></i>
                                            </div>
                                            <strong><?=$notif['title'];?></strong> <?=$notif['text'];?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closenotif('<?php echo $notif['id']; ?>')">
                                                <span aria-hidden="true">
                                                    <i class="zmdi zmdi-close"></i>
                                                </span>
                                            </button>
                                            <?php if($notif['link'] != ''):?>
                                            <a href="<?php echo $notif['link'];?>"><button type="button" class="close">
                                                <span aria-hidden="true">
                                                    <span class="ti-link" style="font-size: 16px;margin-right: 15px;"></span>
                                                </span>
                                            </button></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>  
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function closenotif(id) {
        //console.log(id);
        $.post(
            "/handlers/closenotif.php",
            {
                id: id
            },
            function (data) {
                $('#notifCount').html(data);

                if(data == 0){
                    $('#notContent').append('<div class="text-center col-lg-12">У вас нет новых уведомлений.</div>');
                }
            }
        );
    }
</script>