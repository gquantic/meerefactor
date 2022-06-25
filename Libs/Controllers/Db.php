<?php
namespace Libs\Controllers;

use Libs\Traits;

/**
 * Класс базы данных
 */
class Db
{
    use Traits\Db, Traits\Offer;

    /**
     * @param $userLogin - логин пользователя
     * @param $requireAuth - Нужна ли авторизация?
     */
    public function __construct($userLogin, $requireAuth = false)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        
        if ($requireAuth !== false) {
            self::authCheck();
        }

        $_SESSION['last_url'] = $_SERVER['REQUEST_URI'];

        $userData = self::userSelect();
        if($userData['blocked'] == 1 && $_SERVER['REQUEST_URI'] != '/banned.php'){
           header("Location: /banned.php");
        }
    }

    /**
     * Выделение пользователя
     *
     * @return array|false|null
     */
    public static function userSelect()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        return mysqli_fetch_assoc(self::query("SELECT * FROM `users` WHERE `email`='".$_SESSION['email']."'"));
    }

    /**
     * Проверка типа пользователя и редирект
     *
     * @return void
     */
    public static function typeCheck()
    {
        session_start();

        if(isset($_SESSION['auth']) && $_SESSION['email'] != ''):
            $user = self::userSelect();

            if($user['type'] == 'webmaster'):
                header("Location: /webmaster/");
            elseif($user['type'] == 'advertiser'):
                header("Location: /advertiser/");
            elseif($user['type'] == 'admin'):
                header("Location: /admin/");
            endif;
        endif;
    }

    /**
     * Проверка авторизации пользователя
     *
     * @return void
     */
    function authCheck()
    {
        if (!isset($_SESION)) {
            session_start();
        }

        #if($_SESSION['auth'] == true && $_SESSION['email'] != '') self::typeCheck();

        if(isset($_COOKIE['utoken'])):
            $userData = mysqli_fetch_assoc(self::query("SELECT * FROM `users` WHERE `id`='".$_COOKIE['uid']."'"));

            if($_COOKIE['utoken'] == $userData['token']):
                $_SESSION['auth'] = true;
                $_SESSION['email'] = $userData['email'];
                $_SESSION['type'] = $userData['type'];

                #self::typeCheck();
            else:
                setcookie("utoken", "0", time()-3000);
                setcookie("email", "0", time()-3000);
            endif;
        endif;
        
        if (!isset($_SESSION['email']) && !isset($_COOKIE['utoken'])) {
            Header("Location: /login.php");
        }
    }

    /**
     * Генерации строки
     *
     * @param $length - длина
     * @return string
     */
    public static function generate($length): string
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
        $code = "";

        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
        }

        return $code;
    }

    /* Выбор из БД записей в опред. период времени */
    function exportWithDate($from, $dc, $d,$m,$y)
    {
        return $this->query("SELECT * FROM `$from` WHERE `$dc` LIKE '$y-$m-$d'");
    }

    /**
     * Выбор из БД записей в определенный день недели
     *
     * @param $from - из
     * @param $dc - дата
     * @param $day - сколько дней назад
     * @return bool mysqli_result
     */
    function exportInPeriod($from, $dc, $day)
    {
        return $this->query("SELECT * FROM `$from` WHERE `$dc` LIKE '".date('Y-m-d', time() - (86400 * $day))." %%:%%:%%'");
    }

    /**
     * Трансляция из кириллицы в латиницу
     *
     * @param $s - выражение
     * @return array|string|string[]
     */
    function translate($s)
    {
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
    function countEcho($userQuery)
    {
        $query = $this->query($userQuery);
        return mysqli_num_rows($query);
    }

    /**
     * Загрузка изображения на сервер
     *
     * @param $fileName
     * @param $path
     * @param bool $uploadDir
     * @return string
     */
    function uploadImage($fileName, $path, bool $uploadDir = false)
    {
        /* Генерация имени файла:
            >> ID пользователя + дата + рандомное число от 1111 до 9999 + расширение файла
        */

        $uploadDir !== false ? $uploadDir : $_SERVER['DOCUMENT_ROOT'] . '/upload/offers/';

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

    /**
     * Отправка письма
     *
     * @param $to - кому
     * @param $subject - тема
     * @param $message - сообщение
     * @return void
     */
    function sendMail($to, $subject, $message)
    {
        /* Для отправки HTML-почты вы можете установить шапку Content-type. */
        $headers= "MIME-Version: 1.0\r\n";

        /* дополнительные шапки */
        $headers .= "From: Поддержка MeeMoney <suppor@meemoney.ru>\r\n";
        $headers .= "Cc: suppor@meemoney.ru\r\n";
        $headers .= "Bcc: suppor@meemoney.rum\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        mail($to, $subject, $message, $headers);
    }
}