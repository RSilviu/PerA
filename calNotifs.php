<?php
$clientId = $_SESSION['uid'];
include 'db/conn.php';
$select = 'SELECT day, hour, count(id) as matches 
from activities 
WHERE userId IN ( SELECT followedId FROM following WHERE followerId = ? )
GROUP BY day, hour';
$stmt = $pdo->prepare($select);
$stmt->execute([$clientId]);
$matches = [];
while ($match = $stmt->fetch()) {
    $matchCount = $match['matches'];
    if ($matchCount > 1) {
        $matches[] = $matchCount.' activities on '.$match['day'].' at '.$match['hour'];
    }
}
if (empty($matches)) {
    $matches = '<p>No calendar matches found in the group.</p>';
} else {
    $matches = '<p>In the group, there are '.implode(', ', $matches).'.</p>';
}
echo $matches;




