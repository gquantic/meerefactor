<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Новые офферы</h2>
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
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="d-flex">
                        <div class="mobile-left">
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
                                    <li class="active"><a href="mail-inbox.php"><i class="zmdi zmdi-inbox"></i>Все<span class="badge badge-primary"><?echo $_Db->countEcho("SELECT * FROM `offers`");?></span></a></li>

                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-mail-send"></i>Ожидают <span class="badge badge-warning"><?echo $_Db->countEcho("SELECT * FROM `offers` WHERE `modercheck`='0'");?></span></a></li>

                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-badge-check"></i>Одобренные <span class="badge badge-success"><?echo $_Db->countEcho("SELECT * FROM `offers` WHERE `modercheck`='1'");?></span></a></li>

                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-email"></i>Заявки</a></li>

                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-alert-circle"></i>Отклонены <span class="badge badge-danger"><?echo $_Db->countEcho("SELECT * FROM `offers` WHERE `modercheck`='-1'");?></span></a></li>

                                    <!--li><a href="javascript:void(0);"><i class="zmdi zmdi-delete"></i>Нарушения<span class="badge badge-danger">9</span></a></li-->
                                </ul>
                                <!--h3 class="label">Labels</h3>
                                <ul class="nav">
                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-label text-danger"></i>UI Project<span class="badge badge-primary">5</span></a></li>
                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-label text-info"></i>Marketing</a></li>
                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-label text-dark"></i>Payout</a></li>
                                    <li><a href="javascript:void(0);"><i class="zmdi zmdi-label text-primary"></i>Meeting</a></li>
                                </ul-->
                            </div>
                        </div>
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

                            <div class="table-responsive">
                                <table class="table c_table inbox_table">
                                    <?
                                        $userId = $userData['id'];

                                        $offers = $_Db->query("SELECT * FROM `offers`");

                                        while($offer = mysqli_fetch_assoc($offers)){
                                            echo "<tr>";

                                            if($offer['modercheck'] == 1) echo '<td class="starred" style="padding: 0px 20px;"><i class="zmdi zmdi-check" style="color:green;"></i></td>'; 
                                            elseif($offer['modercheck'] == 0) echo '<td class="starred" style="padding: 0px 20px;"><i class="zmdi zmdi-check"></i></td>';
                                            else echo '<td class="starred" style="padding: 0px 20px;"><i class="zmdi zmdi-check" style="color:red"></i></td>';

                                            echo '<td class="u_image"><img src="/upload/offers/'.$offer['image'].'" alt="user" class="rounded" width="30"></td>';

                                            echo '<td class="u_name"><h5 class="font-15 mt-0 mb-0">'.$offer['name'].'</h6></td>';

                                            echo '<td class="max_ellipsis">
                                                    <a class="link" href="view-offer.php?id='.$offer['id'].'">
                                                        '.$offer['description'].'
                                                    </a>
                                                </td>';  

                                            echo '<td class="clip"><i class="zmdi zmdi-attachment-alt"></i></td>';

                                            echo '<td class="time" style="padding-right:15px;">'.substr($offer['add_date'], 2, 8).'</td>';

                                            echo "</tr>";
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>