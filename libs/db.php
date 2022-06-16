<?
	/**
	 * Файл, отвечающий за БД и операции с ней	
	**/

	class Db
	{
		/* Конструктор, проверяющий авторизацию */
		function __construct($userLogin, $requireAuth)
		{
			session_start();
			
			//ini_set('error_reporting', E_ALL);
            //ini_set('display_errors', 1);
            //ini_set('display_startup_errors', 1);


			$_SESSION['last_url'] = $_SERVER['REQUEST_URI'];

			$userData = $this->userSelect();
			if($userData['blocked'] == 1 && $_SERVER['REQUEST_URI'] != '/banned.php'){
				header("Location: /banned.php");
			}
		}

		function connect(){
			// Данные от БД
			$host = "localhost";
			$user = "meemoney_main";
			$password = "d*0W%2O5";
			$name = "meemoney_main";

			$mysqli_connect = mysqli_connect($host, $user, $password, $name);
			mysqli_set_charset($mysqli_connect, "utf8");

			return $mysqli_connect;
		}

		/* Функция запроса в БД */
		function query($query){
			$ready_query = $query." SET NAMES 'utf8'";
			mysqli_set_charset($this->connect(), "utf8");
			return mysqli_query($this->connect(), $query);
		}
		
		function fQuery($query){
			$ready_query = $query." SET NAMES 'utf8'";
			mysqli_set_charset($this->connect(), "utf8");
			return mysqli_fetch_assoc(mysqli_query($this->connect(), $query));
		}

		/* Выделение пользователя */
		function userSelect(){
			session_start();

			return mysqli_fetch_assoc($this->query("SELECT * FROM `users` WHERE `email`='".$_SESSION['email']."'"));
		}

		/* Проверка типа пользователя и редирект */
		function typeCheck(){
			session_start();

			if(isset($_SESSION['auth']) && $_SESSION['email'] != ''):
				$user = $this->userSelect();

				if($user['type'] == 'webmaster'):
					header("Location: /webmaster/");
				elseif($user['type'] == 'advertiser'):
					header("Location: /advertiser/");
				elseif($user['type'] == 'admin'):
					header("Location: /admin/");
				endif;
			endif;
		}

		/* Проверка авторизации пользователя */
		function authCheck(){
			session_start();

			if($_SESSION['auth'] == true && $_SESSION['email'] != '') $this->typeCheck();

			if(isset($_COOKIE['utoken'])):
				$userData = mysqli_fetch_assoc($this->query("SELECT * FROM `users` WHERE `id`='".$_COOKIE['uid']."'"));

				if($_COOKIE['utoken'] == $userData['token']):
					$_SESSION['auth'] = true;
	                $_SESSION['email'] = $userData['email'];
					$_SESSION['type'] = $userData['type'];

					$this->typeCheck();
				else:
					setcookie("utoken", "0", time()-3000);
					setcookie("email", "0", time()-3000);
				endif;
			endif;
		}

		/* Генерации символов */
		function generate($type, $length){
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
		    $code = "";

		    $clen = strlen($chars) - 1;  
		    while (strlen($code) < $length) {
		        $code .= $chars[mt_rand(0,$clen)];  
		    }

		    return $code;
		}

		/* Выбор из БД записей в опред. период времени */
		function exportWithDate($from, $dc, $d,$m,$y){
            return $this->query("SELECT * FROM `$from` WHERE `$dc` LIKE '$y-$m-$d'");
        }

        /* Выбор из БД записей в опред. день недели */
		function exportInPeriod($from, $dc, $day){
            return $this->query("SELECT * FROM `$from` WHERE `$dc` LIKE '".date('Y-m-d', time() - (86400 * $day))." %%:%%:%%'");
        }

		/* Трансляция из кириллицы в латиницу */
		function translate($s){
			$s = (string) $s; // преобразуем в строковое значение
			  $s = strip_tags($s); // убираем HTML-теги
			  $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
			  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
			  $s = trim($s); // убираем пробелы в начале и конце строки
			  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
			  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
			  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
			  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
			  return $s; // возвращаем результат
		}

		/* Достаём количество записей */
		function countEcho($userQuery){
			$query = $this->query($userQuery);
			return mysqli_num_rows($query);
		}

		/* Image upload */
		function uploadImage($fileName, $path, $uploadDir = '../../upload/offers/'){
			/* Генерация имени файла:
				>> ID пользователя + дата + рандомное число от 1111 до 9999 + расширение файла
			*/

			$userData = $this->userSelect();

			$date = "1";
			$int = rand(1111, 9999);

			$fileEx = substr($fileName, -4);

			$fileName = (string) $fileName;
			$fileName = preg_replace("/\s+/", ' ', $fileName);
			$fileName = trim($fileName);
			$fileName = strip_tags($fileName);
			$fileName = $this->translate($fileName);
			$fileName = preg_replace("/\s+/", ' ', $fileName);
			$fileName = str_replace(" ", "_", $fileName);
			$fileNameOutput = $userData['id'].'_'.$date.'_'.$int.'_'.$fileName.$fileEx;

			$uploadDir = $uploadDir.$fileNameOutput;

			move_uploaded_file($path, $uploadDir ); // Перемещаем файл в желаемую директорию

			return $fileNameOutput;
		}

		/* Удаление всех куки: foreach($_COOKIE as $key => $value) setcookie($key, '', time() - 3600, '/'); */
		
		function sendMail($to, $subject, $message) {
            /* Для отправки HTML-почты вы можете установить шапку Content-type. */
            $headers= "MIME-Version: 1.0\r\n";
            
            /* дополнительные шапки */
            $headers .= "From: Поддержка MeeMoney <suppor@meemoney.ru>\r\n";
            $headers .= "Cc: suppor@meemoney.ru\r\n";
            $headers .= "Bcc: suppor@meemoney.rum\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

			mail($to, $subject, $message, $headers);
		}

		/* Офферы */
		function exOffers($uoffers){
			while($offer = mysqli_fetch_assoc($uoffers)): if($offer['modercheck'] == 1 && $offer['web_show'] == 1):?>
			<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
				<div class="card">
					<div class="body product_item" style="/*min-height: 326px;*/">
						<?php if($offer['action'] != ''): ?><span class="label new" style="background: #f15353;"><?php echo $offer['action']; ?></span><?php endif; ?>
						<!--span class="label onsale">Популярный</span-->
						<div class="text-center" style="height:250px;display:flex;align-items: center;text-align: center;justify-content: center;"><img src="/upload/offers/<?echo $offer['image'];?>" style="width:100%;" alt="Product" class="img-fluid cp_img" /></div>
						<div class="product_details">
							<a href="viewoffer.php?id=<?echo $offer['id'];?>"><p><?php echo $offer['name']; ?></p></a>
							<ul class="product_price list-unstyled">
								<li class="old_price" style="color:#ee2558;">Холд: <?echo $offer['hold'];?> дней</li>
								<li class="new_price" style="font-size:16px;"><?echo $offer['leadPrice'];?>₽</li>
							</ul>                                
						</div>
						<div class="action">
							<!--a href="viewoffer.php?id=<?#echo $offer['id'];?>" class="btn btn-info waves-effect"><i class="zmdi zmdi-eye"></i></a-->
							<a href="viewoffer.php?id=<?echo $offer['id'];?>" class="btn btn-primary waves-effect">Подробнее</a>
						</div>
					</div>
				</div>                
			</div>
			<?endif; endwhile;
		}
	}