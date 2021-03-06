<?
$errors = array();

if(isset($_POST['reg'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];

	setcookie("regName", $name);
	setcookie("regEmail", $email);
	setcookie("regPassword", $password);
	setcookie("regRepassword", $password);

	if(strlen($password) < 6){
		$errors[] = 'Минимальная длина пароль: 6 символов!';
	}

	if(strlen($name) < 4){
		$errors[] = 'Пожалуйста, введите поле "Имя" корректно!';
	}

	if(strlen($email) < 4){
		$errors[] = 'Пожалуйста, введите поле "Email" корректно!';
	}

	if(strlen($phone) < 11){
		$errors[] = 'Пожалуйста, введите номер телефона корректно!';
	}

	if($password != $repassword){
		$errors[] = 'Пароли не совпадают!';
	}

	if(empty($errors)){
		$users = $_Db->query("SELECT * FROM `users` WHERE `email`='$email'");

		if(mysqli_num_rows($users) > 0){
			$errors[] = 'Пользователь с таким Email уже существует!';
		}else{
			$password = md5($password);
			$reg = $_Db->query("INSERT INTO `users` (`name`, `email`, `password`, `phone`, `type`) VALUES ('$name', '$email', '$password', '$phone', 'advertiser')");

			if(empty($reg)) $errors[] = 'Неизвестная ошибка, пожалуйста, попробуйте снова.';
			else{ /* Успешная регистрация */
				$_SESSION['auth'] = true;
				$_SESSION['type'] = 'advertiser';
				$_SESSION['email'] = $email;

				header("Location: /webmaster/");
			}
		}
	}
}
?>

<!DOCTYPE html>

<html class="chrome"><head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Регистрация | MeeMoney</title>

<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">

<!-- Custom Css -->
<link rel="stylesheet" href="/assets/css/blocks/main.css">
<link rel="stylesheet" href="/assets/css/blocks/authentication.css">
<link rel="stylesheet" href="/assets/css/blocks/all-themes.css">

<!-- BOOTSTRAP | Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style type="text/css">
*:focus{
	outline: none !important;
	box-shadow: none !important;
}
.alert{
	font-size: 16px;
}
@keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}@-moz-keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}@-webkit-keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}#t9tdw0w-1589735274981{outline:none!important;visibility:visible!important;resize:none!important;box-shadow:none!important;overflow:visible!important;background:none!important;opacity:1!important;filter:alpha(opacity=100)!important;-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity1)!important;-moz-opacity:1!important;-khtml-opacity:1!important;top:auto!important;right:10px!important;bottom:0px!important;left:auto!important;position:fixed!important;border:0!important;min-height:0!important;min-width:0!important;max-height:none!important;max-width:none!important;padding:0!important;margin:0!important;-moz-transition-property:none!important;-webkit-transition-property:none!important;-o-transition-property:none!important;transition-property:none!important;transform:none!important;-webkit-transform:none!important;-ms-transform:none!important;width:auto!important;height:auto!important;display:none!important;z-index:2000000000!important;background-color:transparent!important;cursor:auto!important;float:none!important;border-radius:unset!important;pointer-events:auto!important}#PLAYBIO-1589735274983.open{animation : tawkMaxOpen .25s ease!important;}</style></head>

<body class="theme-red ls-closed">
	<div class="authentication">
	    <div class="container-fluid">
	        <div class="row clearfix">
	            <div class="col-lg-8 col-md-12 col-sm-12">
	                <div class="l-detail">
	                    <h4>Добро пожаловать в</h4>
	                    <img style="margin-left: -10px;" src="/assets/img/logo.png" width="300px" alt="">
	                    <h3>Для начала зарегистрируйтесь</h3>
	                    <p>Пройдите регистрацию используя свои реальные данные.</p>                            
	                    <!--ul class="list-unstyled l-social">
	                        <li><a href="#"><i class="zmdi zmdi-facebook-box"></i></a></li>                                
	                        <li><a href="#"><i class="zmdi zmdi-linkedin-box"></i></a></li>
	                        <li><a href="#"><i class="zmdi zmdi-pinterest-box"></i></a></li>
	                        <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>                       
	                        <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
	                    </ul-->
	                    <ul class="list-unstyled l-menu">
	                        <li><a href="https://meemoney.ru/contact.html" target="__blank">Связаться с нами</a></li>                                
	                        <li><a href="https://meemoney.ru/about.html" target="__blank">О нас</a></li>
	                        <!--li><a href="javascript:void(0);">Вопрос / Ответ</a></li-->
	                    </ul>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-12 col-sm-12">
	                <div class="card">
	                    <h4 class="l-login">Регистрация
	                        <div class="msg" style="margin-top:5px; color: rgba(0,0,0,.5);">Вы регистрируетесь как Рекламодатель</div>
	                    </h4>
	                    <form class="" id="" action="" method="POST">
	                        <div class="form-group form-float">
	                            <div class="form-line">
	                                <input type="text" class="form-control" name="name" value="<?#echo $_COOKIE['regName'];?>" required>
	                                <label class="form-label">Ф.И.О.</label>
	                            </div>
	                        </div>
	                        <div class="form-group form-float">
	                            <div class="form-line">
	                                <input type="email" class="form-control" name="email" value="<?#echo $_COOKIE['regEmail'];?>" required>
	                                <label class="form-label">Email (Электронная почта)</label>
	                            </div>
	                        </div>
	                        <div class="form-group form-float">
	                            <div class="form-line">
	                                <input type="phone" class="form-control" name="phone" value="<?#echo $_COOKIE['regEmail'];?>" required>
	                                <label class="form-label">Номер телефона</label>
	                            </div>
	                        </div>
	                        <div class="form-group form-float">
	                            <div class="form-line">
	                                <input type="password" class="form-control" name="password" value="<?#echo $_COOKIE['regPassword'];?>" required>
	                                <label class="form-label">Придумайте пароль</label>
	                            </div>
	                        </div>
	                        <div class="form-group form-float">
	                            <div class="form-line">
	                                <input type="password" class="form-control" name="repassword" value="<?#echo $_COOKIE['regRepassword'];?>" required>
	                                <label class="form-label">Повторите пароль</label>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
	                            <label for="terms">Я прочитал и согласен <a href="javascript:void(0);">с правилами сайта</a>.</label>
	                        </div>
	                        <div class="text-left"> <button href="#" class="btn btn-raised waves-effect bg-red" type="submit" name="reg">Регистрация</button> 
	                        <a href="register.php" class="btn btn-raised waves-effect">Я веб-мастер</a><br><br></div><br>
	                        <div class="m-t-10 m-b--5"> <a href="login.php">Уже зарегистрированны?</a> </div>
	                        <br>
	                        <?php if ($errors != ''): ?>
	                        	<? foreach($errors as $error){ ?>
	                        		<div class="alert alert-danger"><?echo $error;?></div>
	                        	<?}?>
	                        <?php endif; ?>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	<!-- Jquery Core Js --> 
	<script async="" src="https://embed.tawk.to/59f5afbbbb0c3f433d4c5c4c/default" charset="UTF-8" crossorigin="*"></script>
	<script src="/assets/js/bundle/libscript.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
	<script src="/assets/js/bundle/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

	<script src="/assets/js/bundle/mainscript.bundle.js"></script><!-- Custom Js --> 


	<div id="t9tdw0w-1589735274981" class="" style="display: none !important;"><iframe id="PLAYBIO-1589735274983" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: auto !important; bottom: auto !important; left: auto !important; position: static !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 320px !important; z-index: 999999 !important; cursor: auto !important; float: none !important; border-radius: unset !important; pointer-events: auto !important; display: none !important; height: 120px !important;"></iframe><iframe id="eNmtAzK-1589735274984" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; transition-property: none !important; z-index: 1000001 !important; cursor: auto !important; float: none !important; pointer-events: auto !important; height: 50px !important; min-height: 50px !important; max-height: 50px !important; width: 240px !important; min-width: 240px !important; max-width: 240px !important; border-radius: 0px !important; transform: rotate(0deg) translateZ(0px) !important; transform-origin: 0px center !important; margin: 0px !important; top: auto !important; bottom: 0px !important; right: 10px !important; left: auto !important; display: block !important;"></iframe><iframe id="c1Cc9PA-1589735274984" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; display: none !important; z-index: 1000003 !important; cursor: auto !important; float: none !important; border-radius: unset !important; pointer-events: auto !important; top: auto !important; bottom: 35px !important; right: 1px !important; left: auto !important; width: 21px !important; max-width: 21px !important; min-width: 21px !important; height: 21px !important; max-height: 21px !important; min-height: 21px !important;"></iframe><div class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 100% !important; display: none !important; z-index: 1000001 !important; cursor: move !important; float: left !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="P3dbsnk-1589735274981" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 6px !important; height: 100% !important; display: block !important; z-index: 999998 !important; cursor: w-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="HOldMXy-1589735274982" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 6px !important; height: 100% !important; display: block !important; z-index: 999998 !important; cursor: e-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="gd7CvmC-1589735274982" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 6px !important; display: block !important; z-index: 999998 !important; cursor: n-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="TibKPlI-1589735274982" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: 0px !important; bottom: 0px !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 6px !important; display: block !important; z-index: 999998 !important; cursor: s-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="DPknktx-1589735274982" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: nw-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="mJG2LGe-1589735274982" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: ne-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="LtUGnGp-1589735274982" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: auto !important; bottom: 0px !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: sw-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="F8co7Ya-1589735274983" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: 0px !important; bottom: 0px !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999999 !important; cursor: se-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><iframe id="AszDtBz-1589735275074" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 378px !important; height: 899px !important; display: none !important; z-index: 999999 !important; cursor: auto !important; float: none !important; border-radius: unset !important; pointer-events: auto !important; bottom: 60px !important; top: auto !important; right: 10px !important; left: auto !important;"></iframe></div>
	</body>
</html>