<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Настройки профиля</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> MeeMoney</a></li>
                        <li class="breadcrumb-item"><a href="profile.php">Мой профиль</a></li>
                        <li class="breadcrumb-item active">Редактирование</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="profile.php" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-check"></i></a>
                </div>
            </div>
        </div> 
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Настройки <strong>безопасности</strong></h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="passedit_u__password" placeholder="Текущий пароль">
                                        <label id="passedit_u_password__error" class="error"></label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Новый пароль" id="new__password" value="">
                                        <label id="password__error" class="error"></label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="renew__password" placeholder="Повторите новый пароль">
                                        <label id="repassword__error" class="error"></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-warning" id="editPassBtn" onclick="editPass();" style="color:#fff;background:#ff6100;">Сохранить изменения</button>
                                </div>                                
                            </div>                              
                        </div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h2><strong>Платёжные</strong> данные</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <p>Эти данные не валидируются. Пожалуйста, укажите верные данные.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Webmoney" id="webmoney__pay" value="<?echo $userData['webmoney'];?>">
                                        <label id="webmoney__error" class="error"></label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="group" class="form-control" placeholder="Яндекс деньги" id="yandex__pay" value="<?echo $userData['ymoney'];?>">
                                        <label id="ymoney__error" class="error"></label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Банковская карта" id="bankcard" value="<?echo $userData['bcard'];?>">
                                        <label id="card__error" class="error"></label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Qiwi" id="qiwi" value="<?echo $userData['qiwi'];?>">
                                        <label id="qiwi__error" class="error"></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Текущий пароль" id="payments_u_password">
                                        <label id="payments_u_password__error" class="error"></label>
                                    </div>
                                </div>
                
                                <div class="col-12">
                                    <button class="btn btn-warning" id="editPaymentBtn" onclick="editPayments();" style="color:#fff;background:#ff6100;">Сохранить изменения</button>
                                </div>                                
                            </div>                              
                        </div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h2>Настройки <strong>профиля</strong></h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="uname" placeholder="Имя" value="<?echo $userData['name'];?>">

                                        <label id="name__error" class="error"></label>
                                    </div>
                                </div>        

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="utelegram" placeholder="Telegram (Для связи с менеджером)" value="<?echo $userData['telegram'];?>">

                                        <label id="telegram__error" class="error"></label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="E-mail" value="<?echo $userData['email'];?>" disabled>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="upass_check" placeholder="Текущий пароль" value="">

                                        <label id="profile_u_password__error" class="error"></label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize" id="aboutyourself" placeholder="О себе"><?echo $userData['about_yourself'];?></textarea>

                                        <label id="about__error" class="error"></label>
                                    </div>
                                    <p>Эта информация видна только менеджерам сервиса. Укажите её для того, чтобы <span style="color:#cc1515;">менеджеры могли быстрее решить ваш вопрос</span>. <br> Опишите свой опыт и стаж работы в этой сфере.</p>
                                </div>

                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <input id="procheck1" value="other_view" type="checkbox" <?if($userData['other_view'] == 1) echo "checked";?>>
                                        <label for="procheck1">Профиль виден остальным пользователям</label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="procheck2" value="notification" type="checkbox" <?if($userData['notifications'] == 1) echo "checked";?>>
                                        <label for="procheck2">Присылать уведомления</label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="procheck3" value="senler" type="checkbox" <?if($userData['senler'] == 1) echo "checked";?>>
                                        <label for="procheck3">Подписаться на рассылку (Не более 2-х писем в неделю)</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-warning" id="editProfileBtn" onclick="editProfileInfo();" style="color:#fff;background:#ff6100;">Сохранить изменения</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>