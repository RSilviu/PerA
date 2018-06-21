<?php
$clientId = $_SESSION['uid'];
include 'db/conn.php';
$select = 'SELECT id, name FROM users WHERE id IN ( SELECT followedId FROM following WHERE followerId = ? )';
$stmt = $pdo->prepare($select);
$stmt->execute([$clientId]);
$content = '';
while ($user = $stmt->fetch()) {
    $userId = $user['id'];
    $removeUrl = REMOVE_USER_ROUTE.'?id='.$userId;
    $rssUrl = RSS_ROUTE.'?id='.$userId;
    $content .= '<li id="'.$userId.'">'.$user['name'].'<a class="removeLink" href="'.$removeUrl.'">Remove</a>
<a class="rssLink" target="_blank" href="'.$rssUrl.'">View RSS</a></li>';
}
if ($content == '') {
    $content = '<p>No results.</p>';
} else {
    $content = '<ul id="people">'.$content.'</ul>';
}
echo $content;
