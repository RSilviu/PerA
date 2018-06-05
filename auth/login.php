<?php
include '../db/conn.php';

$select = 'SELECT * FROM users WHERE email = ?';
$stmt = $pdo->prepare($select);
$stmt->execute([$_POST['Email']]);
$user = $stmt->fetch();

if ($user && password_verify($_POST['Password'], $user['secret']))
{
    header('Location: http://localhost:8080/PerA/home.html');
    exit;
}
echo "Invalid auth!";
