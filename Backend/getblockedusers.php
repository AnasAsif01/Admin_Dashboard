<?php
require("connection.php");

$select_query = "SELECT COUNT(*) as blockedUsers FROM user WHERE Status=-1";
$result = mysqli_query($conn, $select_query);
$row = mysqli_fetch_assoc($result);
$blockedUsers = $row['blockedUsers'];
mysqli_free_result($result);
mysqli_close($conn);
header('Content-Type: application/json');
echo json_encode(array('blockedUsers' => $blockedUsers));
?>