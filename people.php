<?php
$person_id = $_REQUEST['id'];
$person_name = $_REQUEST['name'];
include "db/conn.php";
$client_id = 1;
$inGroup = false;
$query = 'select * from following where followerId = ? and followedId = ?';
try {
    $stmt = $pdo->prepare($query);
    $stmt->execute([$client_id, $person_id]);
    if ($stmt->fetch()) {    // user already in group, we follow this user's activities
        $inGroup = true;
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

