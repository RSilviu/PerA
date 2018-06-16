<?php
session_start();
if (! isset($_SERVER['HTTP_REFERER'])) {
    die();
}
include "routes.php";
$referer = $_SERVER['HTTP_REFERER'];
if (! ($referer === HOME_ROUTE || $referer === ACTIVITIES_ROUTE || $referer === OTHERS_ROUTE)) {
    die();
}
$person_id = $_REQUEST['id'];
$person_name = $_REQUEST['name'];
include "db/conn.php";
$client_id = $_SESSION['uid'];
$inGroup = false;
$query = 'select * from following where followerId = ? and followedId = ?';
try {
    $stmt = $pdo->prepare($query);
    $stmt->execute([$client_id, $person_id]);
    if ($stmt->fetch()) {    // user already in group, we follow this user's activities
        $inGroup = true;
    }
    if ($person_id == $client_id) {
        $inGroup = -1;
    }
        //        $response = "<h2>You follow this user's activity</h2>";
//    } else {    // user not from the group
        /*$response .= "<h2>$person_name is not part of your group</h2>";
        $response .= '<br><br>';
        $response .= '<form action="#">'.'<input type="button" value="Add to group">'.'</form>';*/
    $response = json_encode(['id' => $person_id, 'name' => $person_name, 'inGroup' => $inGroup]);
    echo $response;
} catch (PDOException $e) {
    die($e->getMessage());
}

