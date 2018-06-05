<?php
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

} catch (PDOException $e) {
    $existingkey = "Integrity constraint violation: 1062 Duplicate entry";
    if (strpos($e->getMessage(), $existingkey) !== FALSE) {
        die($existingkey);
        // Take some action if there is a key constraint violation, i.e. duplicate name
    } else {
        throw $e;
    }
}
