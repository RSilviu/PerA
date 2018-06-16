<?php
include "../routes.php";
if (! isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] !== SIGNUP_ROUTE) {
    die();
}
include '../db/conn.php';

$password = $_POST['Password'];
$password_again = $_POST['PasswordAgain'];
if ($password !== $password_again) {
    die('pwds not equal!');
}
$secret = password_hash($password, PASSWORD_DEFAULT);
if (! $secret) {
    die('pwd hash error!');
}
$data = [$_POST['Username'], $_POST['Email'], $secret];
$insert = 'INSERT INTO users VALUES (NULL,?,?,?)';
try {
    $pdo->prepare($insert)->execute($data);
    header('Location: '.LOGIN_ROUTE);
    die();
} catch (PDOException $e) {
    if ($e->errorInfo[1] === 1062) {
        echo 'This email is in use';
    }else {
        echo 'Oops, error: '.$e->getMessage();
    }
}
