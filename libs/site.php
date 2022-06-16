<?
	/**
	 * Файл, структуру и отображение сайта	
	**/

	class Site{
		
		/* Получение адреса */
		function uri(){
			$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
			// и затем используем "левую" часть:
			return substr($uri_parts[0], 1);
		}

		/* Генерация имени */
		function pageName(){
			$uri = $this->uri();

			switch ($uri) {
				case 'home.php':
					$name = 'Главная | MeeMoney';
				break;

				case 'login.php':
					$name = 'Авторизация  | MeeMoney';
				break;

				case 'register.php':
					$name = 'Регистрация  | MeeMoney';
				break;

				case '404':
					$name = 'Страница не найдена | MeeMoney';
				break;
				
				default:
					$name = 'Партнёрская программа | MeeMoney';
				break;
			}

			return $name;
		}

	}