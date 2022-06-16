

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Редактирование FAQ</h2>
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
                                    <input type="text" name="stateName" id="stateName" placeholder="Название статьи FAQ" class="form-control" value="<?=$faq['title']?>">
                                    <input type="text" value="<?=$faq['id']?>" id="faqid" hidden>
                                </div>

                                <label for="about">Текст</label>
                                <div class="form-group">                                
                                    <div class="summernote" id="descstate"><?=$faq['text']?></div>
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
                                <button style="margin-left: 35px;" id="savestate" class="btn btn-primary">Сохранить</button>
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
        $('#savestate').html('Сохранение...');

        $.post(
            "/admin/handlers/stateedit.php",
            {
                id:   $('#faqid').val(),
                name: $('#stateName').val(),
                desc: $('#descstate').summernote('code')
            },
            function(data){
                console.log(data);
                if(data == 'success'){
                    $('#savestate').html('Успешно!');
                    setTimeout(function(){
                        $('#savestate').html('Сохранить');
                    }, 700);
                }else{
                    $('#savestate').html('Ошибка!');
                    setTimeout(function(){
                        $('#savestate').html('Сохранить');
                    }, 700);
                }
            }
        );
    });
</script>


<!--
    Добавить оффер - Тут размещаем блоки для добавления нового оффера, 

    >> блок с загрузкой изображения оффера, текстовый блок для информации по офферу, блок ГЕО, блок виды трафика, поле с указанием ХОЛДА, блок загрузка фирменных баннеров, блок с полем для внесения даты действия данного оффера. 

    >> Кнопки - сохранить, отправить на модерацию, скрыть оффер, отобразить оффер (последние две кнопки должны становиться активными только после прохождения модерации, т.е. рекламодатель может в любой момент скрыть оффер и тогда он не будет показываться вебмастерам). 

    >> Соответственно надо какой-то иконкой отображать цвет статуса оффера который находиться на модерации или прошел модерацию ( к примеру красная рамочка вокруг блока оффера - это отказ в модерации, зеленая Активен, синяя - находиться на модерации)
-->