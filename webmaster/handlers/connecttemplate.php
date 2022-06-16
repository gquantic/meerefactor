<?php
    session_start();
    
    include "../../libs/db.php";
    $db = new Db(0,0);
    
    $ud = $db->userSelect();
    
    $tempid = $_POST['tempid'];
    $offer = $_POST['game'];
    
    $temp = $db->fQuery("SELECT * FROM `templates` WHERE `id`='$tempid'");
    
    if($temp['web_id'] != $ud['id']): 
        header("Location: /"); 
        exit(); 
    endif;
    
    $cons = $db->query("SELECT * FROM `ofconnect` WHERE `webid`='".$ud['id']."' AND `offid`='$offer'");
    if(mysqli_num_rows($cons) > 0):
        header("Location: /"); 
        exit();
    endif;
    
    $db->query("INSERT INTO `ofconnect` (`offid`, `webid`, `tempid`) VALUES ('$offer', '".$ud['id']."', '$tempid')");
    
    $location = "/webmaster/viewoffer.php?id=".$offer;
    header("Location: ".$location);
?>