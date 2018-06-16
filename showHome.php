<?php
session_start();
$client_id = $_SESSION['uid'];

include 'db/conn.php';
$activities = [];
$result = '';
$select = 'SELECT a.id as act_id, a.name as act_name, description, periodicity, p.name as place_name, lat, lng FROM activities a join places p on a.place_id = p.id WHERE userId = ?';
$stmt = $pdo->prepare($select);
$stmt->execute([$client_id]);
while ($activity = $stmt->fetch()) {
    $activities[] = $activity;
}
echo json_encode($activities);