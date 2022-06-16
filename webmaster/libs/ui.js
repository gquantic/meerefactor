// Редактирование пароля
function editPass(){
	var error = 0;

	var new__password = $('#new__password').val();
	var renew__password = $('#renew__password').val();
	var passedit_u__password = $('#passedit_u__password').val();

	if(new__password.length < 6){
		error = 1;
		$('#password__error').html('Пожалуйста, укажите пароль корректно!');
	}else{
		$('#password__error').html('');
	}

	if(renew__password == '' || renew__password != new__password){
		error = 1;
		$('#repassword__error').html('Повторите пароль');
	}else{
		$('#repassword__error').html('');
	}

	if(passedit_u__password.length < 6){
		error = 1;
		$('#passedit_u_password__error').html('Введите ваш текущий пароль');
	}else{
		$('#passedit_u_password__error').html('');
	}


	if(error == 0){
		$('#editPassBtn').html('<i class="fas fa-cog fa-spin"></i>');

		$.post(
			'handlers/editpass.php',

			{
				new: new__password,
				old: passedit_u__password
			},

			function(data){
				if(data == 'error__oldpass'){
					swal("Ошибка!", "Неверно введён старый пароль.", "error");
				}else if(data == 'error__except'){
					swal("Ошибка!", "Возникла неизвестная ошибка. Пожалуйста, попробуйте позже.", "error");
				}else{
					swal("Отлично!", "Ваш пароль был успешно сменён.", "success");
				}

				$('#editPassBtn').html('Сохранить изменения');
			}
			);
	}
}


// Редактирование платёжных реквезитов
function editPayments(){
	var error = 0;

	var webmoney = $('#webmoney__pay').val();
	var yandex = $('#yandex__pay').val();
	var card = $('#bankcard').val();
	var qiwi = $('#qiwi').val();
	var payments_u_password = $('#payments_u_password').val();

	if(webmoney.length < 5 && yandex.length < 5 && card.length < 5 && qiwi.length < 5){
		error = 1;
		$('#webmoney__error').html('Пожалуйста, укажите хотя бы один из реквизитов!');
	}else{
		$('#webmoney__error').html('');
	}


	/*if(webmoney.length < 3){
		error = 1;
		$('#webmoney__error').html('Пожалуйста, укажите поле корректно!');
	}else{
		$('#webmoney__error').html('');
	}

	if(yandex.length < 5){
		error = 1;
		$('#ymoney__error').html('Пожалуйста, укажите поле корректно!');
	}else{
		$('#ymoney__error').html('');
	}

	if(card.length < 5){
		error = 1;
		$('#card__error').html('Пожалуйста, укажите поле корректно!');
	}else{
		$('#card__error').html('');
	}

	if(qiwi.length < 5){
		error = 1;
		$('#qiwi__error').html('Пожалуйста, укажите поле корректно!');
	}else{
		$('#qiwi__error').html('');
	}*/

	if(payments_u_password.length < 5){
		error = 1;
		$('#payments_u_password__error').html('Пожалуйста, введите ваш текущий пароль!');
	}else{
		$('#payments_u_password__error').html('');
	}




	if(error == 0){
		$('#editPaymentBtn').html('<i class="fas fa-cog fa-spin"></i>');

		$.post(
			'handlers/editpayments.php',

			{
				webmoney: webmoney,
				yandex: yandex,
				pass: payments_u_password,
				card: card,
				qiwi: qiwi
			},

			function(data){
				if(data == 'error__oldpass'){
					swal("Ошибка!", "Неверно введён пароль.", "error");
				}else if(data == 'error__except'){
					swal("Ошибка!", "Возникла неизвестная ошибка. Пожалуйста, попробуйте позже.", "error");
				}else{
					swal("Отлично!", "Реквизиты изменены.", "success");
				}

				$('#editPaymentBtn').html('Сохранить изменения');
			}
			);
	}
}





// Редактирование информации о профиле
function editProfileInfo(){
	var error = 0;

	// Inputs
	var name = $('#uname').val();
	var telegram = $('#utelegram').val();
	var pass = $('#upass_check').val();
	var about = $('#aboutyourself').val();

	// Checkboxs
	if($('#procheck1').is(':checked')){
		var view = 1;
	}else{
		var view = 0;
	}

	if($('#procheck2').is(':checked')){
		var notifications = 1;
	}else{
		var notifications = 0;
	}

	if($('#procheck3').is(':checked')){
		var senler = 1;
	}else{
		var senler = 0;
	}


	// Check inputs
	if(name.length < 6){
		error = 1;
		$('#name__error').html('Пожалуйста, укажите поле корректно!');
	}else{
		$('#name__error').html('');
	}

	if(telegram.length < 4){
		error = 1;
		$('#telegram__error').html('Пожалуйста, укажите поле корректно!');
	}else{
		$('#telegram__error').html('');
	}

	if(pass.length < 6){
		error = 1;
		$('#profile_u_password__error').html('Пожалуйста, укажите поле корректно!');
	}else{
		$('#profile_u_password__error').html('');
	}

	if(about.length < 15){
		error = 1;
		$('#about__error').html('Пожалуйста, укажите поле корректно!');
	}else{
		$('#about__error').html('');
	}


	// Если всё верно, то отправляем поля
	if(error == 0){
		$('#editProfileBtn').html('<i class="fas fa-cog fa-spin"></i>');

		$.post(
			'handlers/editprofileinfo.php',

			{
				name: name,
				telegram: telegram,
				pass: pass,
				about: about,

				view: view,
				notifications: notifications,
				senler: senler
			},

			function(data){
				if(data == 'error__oldpass'){
					swal("Ошибка!", "Неверно введён пароль.", "error");
				}else if(data == 'error__except'){
					swal("Ошибка!", "Возникла неизвестная ошибка. Пожалуйста, попробуйте позже.", "error");
				}else{
					swal("Отлично!", "Информация о профиле изменена.", "success");
				}

				$('#editProfileBtn').html('Сохранить изменения');
			}
			);
	}
}


// Withdraw
function withdraw(button){
	$(button).html('Обработка...');
	$.post(
		'handlers/withdraw.php',

		{},

		function(data){
			console.log(data);
			if(data == 'error_nomoney'){
				swal("Недостаточно средств", "Минимальная сумма для вывода 300 рублей!", "error");
			}else if(data == 'success'){
					// swal("Ошибка!", "Возникла неизвестная ошибка. Пожалуйста, попробуйте позже.", "success");
				}

				$(button).html('Вывести деньги');
			}
			);
}