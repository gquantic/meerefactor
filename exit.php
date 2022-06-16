<?
	session_start();

	unset($_SESSION['auth']);
	unset($_SESSION['login']);
	unset($_SESSION['type']);
	unset($_SESSION['email']);

	setcookie("utoken", "1", time()-3000);
    setcookie("uid", "1", time()-3000);

	header("Location: /");