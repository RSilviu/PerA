<?php
session_start();
$client_id = $_SESSION['uid'];

include 'db/conn.php';
$activities = [];
$select = 'SELECT * from activities where userId = ?';
$stmt = $pdo->prepare($select);
$stmt->execute([$client_id]);
while ($activity = $stmt->fetch()) {
    $activities[] = $activity;
}
echo json_encode($activities);