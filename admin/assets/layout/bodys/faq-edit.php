<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Управление FAQ</h2>
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
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                            <div class="card">
                                <div class="body">
                                <p>Для перехода к редактированию нажмите на название</p>
                                <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Название</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php while($faq = mysqli_fetch_assoc($faqs)): ?>
                                        <tr>
                                            <th scope="row"><?= $faq['id']; ?></th>
                                            <td><a style="color:#000;" href="editfaq.php?id=<?=$faq['id'];?>"><?= $faq['title']; ?></td>
                                        </tr>
                                    <?php endwhile; ?>
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