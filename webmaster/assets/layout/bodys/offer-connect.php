<!-- Bootstrap Select Css -->
<link rel="stylesheet" href="assets/layout/blocks/assets/plugins/bootstrap-select/css/bootstrap-select.css" />

<!-- Multi Select Css -->
<link rel="stylesheet" href="assets/layout/blocks/assets/plugins/multi-select/css/multi-select.css">
<!-- Select2 -->
<link rel="stylesheet" href="assets/layout/blocks/assets/plugins/select2/select2.css" />

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Подключение к Офферу</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                        <li class="breadcrumb-item"><a href="offers.php">Офферы</a></li>
                        <li class="breadcrumb-item">Подключение к офферу</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div> 
        <div class="container-fluid">

            <?if($offer['root'] != 1):?>
    
            <form action="handlers/requestSend.php" method="post">

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Подключение к Офферу <a href="viewoffer?id=<?echo $offer['id'];?>">"<?echo $offer['name'];?>"</a></h2>
                        </div>
                        <div class="body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Укажите площадку</label>
                                            <select class="form-control show-tick" name="template" data-live-search="true">
                                                <?while($template = mysqli_fetch_assoc($templates)):?>
                                                <option value="<?echo $template['id'];?>"><?echo $template['name'];?></option>
                                                <?endwhile;?>
                                            </select><br><br>
                                            <div class="text-right"><a href="create-template.php">Создать новую площадку</a></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Комментарий на усмотрение (его увидит рекламодатель)</label>
                                            <textarea rows="4" name="comment" class="form-control no-resize" placeholder="Со мной стоит работать, так как..."></textarea>

                                            <input type="text" name="id" value="<?echo $_GET['id'];?>" hidden>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="checkbox">
                                <input id="checkbox" name="rulAccept" value="accept" type="checkbox">
                                <label for="checkbox">Я прочитал условия, правила и понимаю, что заявка будет отправлена на модерацию. Так же я понимаю, что при любмом несоблюдении правил, трафик не будет оплачен и оффер станет недоступным для вас.</label>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-raised btn-primary waves-effect" name="requestCreate" type="submit">Отправить на модерацию</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </form>

            <?else:?>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Подключение к Офферу <a href="viewoffer?id=<?echo $offer['id'];?>">"<?echo $offer['name'];?>"</a></h2>
                        </div>
                        <div class="body">
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?echo $offer['promo_url'];?>">
                            </div>
                            <span style="color:#cc2f2f;">Используйте ссылку в поле ввода для привлечения клиентов.</span>
                        </div>
                    </div>
                    <p>Отправка запроса не обязательна, так как этот оффер является официальным. <br></p>
                </div>
            </div>

            <?endif;?>

        </div>
    </div>
</section>

<!-- Js -->
<script src="assets/layout/blocks/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script> <!-- Bootstrap Colorpicker Js --> 
<script src="assets/layout/blocks/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script> <!-- Input Mask Plugin Js --> 
<script src="assets/layout/blocks/assets/plugins/multi-select/js/jquery.multi-select.js"></script> <!-- Multi Select Plugin Js --> 
<script src="assets/layout/blocks/assets/plugins/jquery-spinner/js/jquery.spinner.js"></script> <!-- Jquery Spinner Plugin Js --> 
<script src="assets/layout/blocks/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script> <!-- Bootstrap Tags Input Plugin Js --> 
<script src="assets/layout/blocks/assets/plugins/nouislider/nouislider.js"></script> <!-- noUISlider Plugin Js -->

<script src="assets/layout/blocks/assets/plugins/select2/select2.min.js"></script> <!-- Select2 Js -->