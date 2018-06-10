<?php
$search_term = $_REQUEST['search'];
$response = [];
include "db/conn.php";
$query = 'select id, name from users where name like ?';
try {
    $stmt = $pdo->prepare($query);
    $stmt->execute(["%$search_term%"]);
    while ($row = $stmt->fetch()) {
        $response[$row['id']] = $row['name'];
//        $response .= '<li><a href="people.php?id=$id">'.$row['name'].'</a></li>';
    }
    echo json_encode($response);
} catch (PDOException $e) {
    die($e->getMessage());
}