<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Создание новой площадки</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                        <li class="breadcrumb-item">Площадки</li>
                        <li class="breadcrumb-item">Profile</li>
                        <li class="breadcrumb-item active">Edit</li>
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

                    <form action="handlers/create_template.php" method="post">

                    <div class="card">
                        <div class="header">
                            <h2><strong>Основные</strong> настройки</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="tmp_name" placeholder="Имя (видите только вы)" id="new__password" value="">
                                    </div>
                                </div>                              
                            </div>                              
                        </div>
                    </div>                

                    <div class="card">
                        <div class="header">
                            <h2><strong>Параметры</strong> площадки</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="template">
                                            <option value="Istagram">Instagram</option>
                                            <option value="Telegram">Telegram</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="SEO">СЕО траффик</option>
                                            <option value="Site">Веб-сайт</option>
                                            <option value="Target">Таргет</option>
                                        </select>
                                    </div>
                                </div>        

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="tmp_url" id="utelegram" placeholder="Ссылка на ресурс" value="">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="tmp_comm" placeholder="Комментарий менеджеру (необязательно)" value="">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize" name="tmp_desc" id="aboutyourself" placeholder="Информация о площадке (будет видна рекламодателю)"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit" name="create_template">Добавить</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    </form>

                </div>
            </div>
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