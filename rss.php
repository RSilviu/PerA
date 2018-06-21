<?php
include "authCheck.php";
$personId = $_GET['id'];
include 'db/conn.php';
$rss = '<?xml version="1.0" ?>
<rss version="2.0">
<channel>
    <title>PerA</title>
    <link>http://localhost:8080/PerA/</link>
    <description>Personal Web Assistant</description>';
$select = 'SELECT name, description FROM activities WHERE userId = ?';
$stmt = $pdo->prepare($select);
$stmt->execute([$personId]);
while ($activity = $stmt->fetch()) {
    $actName = $activity['name'];
    $actDesc = $activity['description'];
    $rss .= "
<item>
     <title>$actName</title>
     <link>others.php#$personId</link>
     <description>$actDesc</description>
</item>";
}
$rss .= '
</channel>
</rss>';

header('Content-Type: application/rss+xml');
echo $rss;


