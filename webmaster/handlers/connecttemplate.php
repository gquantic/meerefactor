<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

    use Libs\Controllers\Db;

    $ud = Db::userSelect();
    
    $tempid = $_POST['tempid'];
    $offer = $_POST['game'];
    
    $temp = Db::fQuery("SELECT * FROM `templates` WHERE `id`='$tempid'");
    
    if($temp['web_id'] != $ud['id']): 
        header("Location: /"); 
        exit(); 
    endif;
    
    $cons = Db::query("SELECT * FROM `ofconnect` WHERE `webid`='".$ud['id']."' AND `offid`='$offer'");
    if(mysqli_num_rows($cons) > 0):
        header("Location: /"); 
        exit();
    endif;
    
    Db::query("INSERT INTO `ofconnect` (`offid`, `webid`, `tempid`) VALUES ('$offer', '".$ud['id']."', '$tempid')");
    
    $location = "/webmaster/viewoffer?id=".$offer;
    header("Location: ".$location);
?>