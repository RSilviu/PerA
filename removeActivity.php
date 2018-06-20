<?php
session_start();
if (! isset($_SERVER['HTTP_REFERER'])) {
    die();
}
include "routes.php";
$referer = $_SERVER['HTTP_REFERER'];
if (! ($referer === HOME_ROUTE)) {
    die();
}
$activityId = $_REQUEST['act_id'];
include "db/conn.php";
$delete = 'DELETE FROM activities where id = ?';
try {
    $pdo->prepare($delete)->execute([$activityId]);
    echo "activity #$activityId has been added";
} catch (PDOException $e) {
    die($e->getMessage());
}
