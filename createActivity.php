<?php
session_start();
include "routes.php";
if (! isset($_SERVER['HTTP_REFERER'])) { // || $_SERVER['HTTP_REFERER'] !== ACTIVITY_ROUTE) {
    die();
}
$userId = $_SESSION['uid'];
$type = $_POST['type'];
$name = $_POST['name'];
$desc = $_POST['description'];

$placeName = $_POST['place'];
$placeId = $_POST['place_id'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];

/*$startDate = str_replace('T', ' ', $_POST['startDate']);
$endDate = str_replace('T', ' ', $_POST['endDate']);*/
//$tzMinutes = $_POST['tz_minutes'];
//$startDate = $_POST['startDate'];
//$endDate = $_POST['endDate'];
$day = $_POST['day'];
$hour = $_POST['hour'];

$periodicity = $_POST['periodicity'];

/*echo 'before'.'<br><br>';
echo 'startDate: '.$startDate.'<br>';
echo 'endDate: '.$endDate.'<br><br>';*/


include 'db/conn.php';

//echo 'tz used by server: '.date_default_timezone_get().'<br><br>';
//$tzName = timezone_name_from_abbr('', $tzMinutes*60);
//date_default_timezone_set('Europe/Bucharest');

//$startDate = (new DateTime($startDate))->getTimestamp();
//$endDate = (new DateTime($endDate))->getTimestamp();

try {
    $values = [ $placeId, $placeName, $lat, $lng, $placeId, $placeName, $lat, $lng ];
    $stmt = 'INSERT INTO places VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE id = ?, name = ?, lat = ?, lng = ?';
    $pdo->prepare($stmt)->execute($values);

    $insert = 'INSERT INTO activities VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?)';
    $values = [ $userId, $type, $name, $desc, $placeId, $day, $hour, $periodicity ];
    $pdo->prepare($insert)->execute($values);

    header('Location: '.ACTIVITIES_ROUTE);
} catch (PDOException $e) {
    die($e->getMessage() . ' at line '.$e->getLine());
}

/*echo 'after'.'<br><br>';

echo 'type: '.$type.'<br>';
echo 'name: '.$name.'<br>';
echo 'desc: '.$desc.'<br>';

echo 'place: '.$placeName.'<br>';
echo 'place_id: '.$placeId.'<br>';
echo 'lat: '.$lat.'<br>';
echo 'lng: '.$lng.'<br>';

echo 'startDate: '.(new DateTime("@$startDate"))->format('Y-m-d H:i').'<br>';
echo 'endDate: '.(new DateTime("@$endDate"))->format('Y-m-d H:i').'<br>';
echo 'periodicity: '.$periodicity.'<br>';*/