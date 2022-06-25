<!-- Main Content -->

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
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                                <?php $count = 0; while($state = mysqli_fetch_assoc($states)): $count = $count + 1;?>
                                    <button type="button" class="btn btn-neutral waves-effect m-r-20 faqbtn" style="color:#000;width:100%;text-align:left;" data-toggle="modal" data-target="#largeModal<?= $count; ?>"><?= $state['title']; ?></button>
                                    <!-- Large Size -->
                                    <div class="modal fade" id="largeModal<?= $count; ?>" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="title" id="largeModalLabel"><?= $state['title']; ?></h4>
                                                </div>
                                                <div class="modal-body"><?= $state['text']; ?></div><br><br>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Закрыть</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                     </div>
                </div>
            </div>         
        </div>
    </div>
</section>

<style type="text/css">
    .faqbtn{
        border-left: 3px solid rgba(0,0,0,.05);
        transition: .2s ease;
        margin-bottom: 8px;
    }
    .faqbtn:hover{
        background: rgba(0,0,0,.05);
    }
</style>