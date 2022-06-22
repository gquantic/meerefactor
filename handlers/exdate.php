<?php

$from = $_POST['from'];
$dc   = $_POST['dc'];
$d    = $_POST['d'];
$m    = $_POST['m'];
$y    = $_POST['y'];

include '/libs/coDb.phpers/Db.php';
$db = new Db('0', '0');

echo mysqli_num_rows($db->exportWithDate($from, $dc, $d, $m, $y));