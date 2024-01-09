<?php
require("connection.php");

$select_query = "SELECT COUNT(*) as totalUsers FROM user WHERE Role=1";
$result = mysqli_query($conn, $select_query);
$row = mysqli_fetch_assoc($result);
$totalUsers = $row['totalUsers'];
mysqli_free_result($result);
mysqli_close($conn);
header('Content-Type: application/json');
echo json_encode(array('totalUsers' => $totalUsers));
?>