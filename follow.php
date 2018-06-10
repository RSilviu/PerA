<?php
$person_id = $_REQUEST['id'];
$person_name = $_REQUEST['name'];
$client_id = 1;
if ($person_id == $client_id) {
    echo "You're an idiot";
    exit();
}
include "db/conn.php";
$insert = 'INSERT INTO following VALUES (?,?)';
try {
    $pdo->prepare($insert)->execute([$client_id, $person_id]);
    echo "$person_name has been added";
} catch (PDOException $e) {
    die($e->getMessage());
}
