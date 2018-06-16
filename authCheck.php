<?php
/*if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}*/
session_start();
include 'routes.php';
if (! isset($_SESSION['uid'])) {
    header('Location: '.LOGIN_ROUTE);
    die();
}
