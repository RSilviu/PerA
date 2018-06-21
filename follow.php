<?php
session_start();
if (! isset($_SERVER['HTTP_REFERER'])) {
    die();
}
include "routes.php";
$referer = $_SERVER['HTTP_REFERER'];
if (! ($referer === HOME_ROUTE || $referer === ACTIVITIES_ROUTE || $referer === OTHERS_ROUTE)) {
    die();
}
$person_id = $_REQUEST['id'];
$person_name = $_REQUEST['name'];
$client_id = $_SESSION['uid'];
/*if ($person_id == $client_id) {
    echo "This is you";
    exit();
}*/
include "db/conn.php";
$insert = 'INSERT INTO following VALUES (?,?)';
try {
    $pdo->prepare($insert)->execute([$client_id, $person_id]);
    header('Location: '.OTHERS_ROUTE);
} catch (PDOException $e) {
    die($e->getMessage());
}
