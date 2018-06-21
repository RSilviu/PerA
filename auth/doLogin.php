<?php
session_start();
if (! isset($_SERVER['HTTP_REFERER'])) {
    die();
}
include "../routes.php";
$referer = $_SERVER['HTTP_REFERER'];
if (! ($referer === LOGIN_ROUTE)) {
    die();
}
//include "../routes.php";
include '../db/conn.php';

$select = 'SELECT * FROM users WHERE email = ?';
$stmt = $pdo->prepare($select);
$stmt->execute([$_POST['Email']]);
$user = $stmt->fetch();

if ($user && password_verify($_POST['Password'], $user['secret']))
{
    $_SESSION['uid'] = $user['id'];
    $_SESSION['username'] = $user['name'];
    header('Location: '.HOME_ROUTE);
    exit;
}
echo '<h1>Invalid auth!</h1>';
