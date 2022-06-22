<?php

use Libs\Controllers\Db;
use Libs\Controllers\Site;

$errors = array();

if(isset($_POST['auth'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email != '' && $password != ''){
        $user = Db::query("SELECT * FROM `users` WHERE `email`='$email'");

        if (mysqli_num_rows($user) > 0) {
            $user = mysqli_fetch_assoc($user);



            if(md5($password) == $user['password']){
                Site::startSession();

                $code = Db::generate("int", 16);

                $_SESSION['auth'] = true;
                $_SESSION['email'] = $email;

                setcookie("utoken", $code, time()+99000);
                setcookie("uid", $user['id'], time()+99000);

                Db::query("UPDATE `users` SET `token`='$code' WHERE `email`='$email' ");

                #if($_POST['rememberme'] == 'rememberme') setcookie("authEmail", $email, time()+999999);

                if ($user['type'] == 'advertiser') {
                    $_SESSION['type'] = 'advertiser';
                    header("Location: /advertiser/");
                } else {
                    $_SESSION['type'] = 'webmaster';
                    header("Location: /webmaster/");
                }

                if($user['is_admin'] == 1){
                    $_SESSION['type'] = 'admin';
                    $_SESSION['email'] = $email;

                    header("Location: /admin/");

                    exit();
                }
            }else{
                $errors[] = 'Неверный пароль!';
            }
        }else{
            $errors[] = 'Пользователь с таким Email не найден!';
        }
    }else{
        $errors[] = 'Пожалуйста, заполните поля.';
    }
}
?>

<html class="chrome"><head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Авторизация | MeeMoney</title>

 <!--Progressive Web App -->
<link rel="manifest" href="/manifest.json">

<script>
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('/offline.js');
    }
</script>

<!-- Favicon-->
<link rel="shortcut icon" type="image/x-icon" href="/favicon.png">
<meta name="description" content="Авторизация | MeeMoney">
<meta name="author" content="Ssapphire inc.">
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
@keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}@-moz-keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}@-webkit-keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}#zCK51DW-1589738274268{outline:none!important;visibility:visible!important;resize:none!important;box-shadow:none!important;overflow:visible!important;background:none!important;opacity:1!important;filter:alpha(opacity=100)!important;-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity1)!important;-moz-opacity:1!important;-khtml-opacity:1!important;top:auto!important;right:10px!important;bottom:0px!important;left:auto!important;position:fixed!important;border:0!important;min-height:0!important;min-width:0!important;max-height:none!important;max-width:none!important;padding:0!important;margin:0!important;-moz-transition-property:none!important;-webkit-transition-property:none!important;-o-transition-property:none!important;transition-property:none!important;transform:none!important;-webkit-transform:none!important;-ms-transform:none!important;width:auto!important;height:auto!important;display:none!important;z-index:2000000000!important;background-color:transparent!important;cursor:auto!important;float:none!important;border-radius:unset!important;pointer-events:auto!important}#Gj3AQ2v-1589738274270.open{animation : tawkMaxOpen .25s ease!important;}</style>

    <script charset="UTF-8" src="//web.webpushs.com/js/push/d72063f23c59a73a4c5fa42c116acef4_1.js" async></script>
</head>

<body class="theme-red ls-closed">
<div class="authentication">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-lg-8 col-md-12 col-sm-12">
				<div class="l-detail">
	                    <h4>Добро пожаловать в</h4>
	                    <img style="margin-left: -10px;" src="/assets/img/logo.png" width="300px" alt="">
	                    <h3>Для начала Авторизуйтесь</h3>
	                    <p>Пройдите авторизацию используя данные, которые вводили при регистрации.</p><br />                          
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
				    <h4 class="l-login">Авторизация</h4>
                    <form class="" action="" id="sign_in" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="email" class="form-control" name="email" value="<?#echo $_COOKIE['authEmail'];?>" required>
                                <label class="form-label">Email</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" required>
                                <label class="form-label">Пароль</label>
                            </div>
                        </div>
                        <!--div>
                            <input type="checkbox" name="rememberme" id="rememberme" value="rememberme" class="filled-in chk-col-cyan">
                            <label for="rememberme">Remember Me</label>
                        </div-->
                        <button type="submit" type="submit" class="btn btn-raised waves-effect bg-red" style="background: #ff490e !important;" name="auth">Авторизоваться</button>
                        <a href="register.php" class="btn btn-raised waves-effect">Регистрация</a><br><br>
                        <div class="text-left">
                            <a href="forgotpassword.php">Забыли пароль?</a>
                        </div><br>
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


<div id="zCK51DW-1589738274268" class="" style="display: none !important;"><iframe id="Gj3AQ2v-1589738274270" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: auto !important; bottom: auto !important; left: auto !important; position: static !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 320px !important; z-index: 999999 !important; cursor: auto !important; float: none !important; border-radius: unset !important; pointer-events: auto !important; display: none !important; height: 120px !important;"></iframe><iframe id="B5cGpnM-1589738274271" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; transition-property: none !important; z-index: 1000001 !important; cursor: auto !important; float: none !important; pointer-events: auto !important; height: 50px !important; min-height: 50px !important; max-height: 50px !important; width: 240px !important; min-width: 240px !important; max-width: 240px !important; border-radius: 0px !important; transform: rotate(0deg) translateZ(0px) !important; transform-origin: 0px center !important; margin: 0px !important; top: auto !important; bottom: 0px !important; right: 10px !important; left: auto !important; display: block !important;"></iframe><iframe id="Bi93g3E-1589738274271" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; display: none !important; z-index: 1000003 !important; cursor: auto !important; float: none !important; border-radius: unset !important; pointer-events: auto !important; top: auto !important; bottom: 35px !important; right: 1px !important; left: auto !important; width: 21px !important; max-width: 21px !important; min-width: 21px !important; height: 21px !important; max-height: 21px !important; min-height: 21px !important;"></iframe><div class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 100% !important; display: none !important; z-index: 1000001 !important; cursor: move !important; float: left !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="Dz2CKSb-1589738274268" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 6px !important; height: 100% !important; display: block !important; z-index: 999998 !important; cursor: w-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="XTdwscw-1589738274268" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 6px !important; height: 100% !important; display: block !important; z-index: 999998 !important; cursor: e-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="KyfUAsk-1589738274269" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 6px !important; display: block !important; z-index: 999998 !important; cursor: n-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="fK3xdfd-1589738274269" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: 0px !important; bottom: 0px !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 6px !important; display: block !important; z-index: 999998 !important; cursor: s-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="ULafi77-1589738274269" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: nw-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="ANxqQqd-1589738274270" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: ne-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="dDAbNtE-1589738274270" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: auto !important; bottom: 0px !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: sw-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="oQkOchC-1589738274270" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: 0px !important; bottom: 0px !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999999 !important; cursor: se-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><iframe id="rijhD7L-1589738274360" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 378px !important; height: 899px !important; display: none !important; z-index: 999999 !important; cursor: auto !important; float: none !important; border-radius: unset !important; pointer-events: auto !important; bottom: 60px !important; top: auto !important; right: 10px !important; left: auto !important;"></iframe></div></body></html>