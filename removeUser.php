<?php
session_start();
if (! isset($_SERVER['HTTP_REFERER'])) {
    die();
}
include "routes.php";
/*$referer = $_SERVER['HTTP_REFERER'];
if (! ($referer === OTHERS_ROUTE)) {
    die();
}*/
$followerId = $_SESSION['uid'];
$followedId = $_REQUEST['id'];
include "db/conn.php";
$delete = 'DELETE FROM following where followerId = ? and followedId = ?';
try {
    $pdo->prepare($delete)->execute([$followerId, $followedId]);
    header('Location: '.OTHERS_ROUTE);
    exit();
} catch (PDOException $e) {
    die($e->getMessage());
}
