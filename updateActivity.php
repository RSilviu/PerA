<?php
session_start();
if (! isset($_SERVER['HTTP_REFERER'])) {
    die();
}
include "routes.php";
/*$referer = $_SERVER['HTTP_REFERER'];
if (! ($referer === HOME_ROUTE)) {
    die();
}*/
$activityId = $_REQUEST['id'];
$type = $_REQUEST['type'];
$name = $_REQUEST['name'];
$desc = $_REQUEST['description'];

$placeName = $_REQUEST['place'];
$placeId = $_REQUEST['place_id'];
$lat = $_REQUEST['lat'];
$lng = $_REQUEST['lng'];

$day = $_REQUEST['day'];
$hour = $_REQUEST['hour'];

$periodicity = $_REQUEST['periodicity'];

include "db/conn.php";
try {
    $values = [ $placeId, $placeName, $lat, $lng, $placeId, $placeName, $lat, $lng ];
    $stmt = 'INSERT INTO places VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE id = ?, name = ?, lat = ?, lng = ?';
    $pdo->prepare($stmt)->execute($values);

    $update = 'UPDATE activities SET type = ?, name = ?, description = ?, place_id = ?, day = ?, hour = ?, periodicity = ? where id = ?';
    $values = [ $type, $name, $desc, $placeId, $day, $hour, $periodicity, $activityId ];
    $pdo->prepare($update)->execute($values);

    header('Location: '.HOME_ROUTE);
    exit();
} catch (PDOException $e) {
    die($e->getMessage());
}
