<?php
require("connection.php");

 $select_query = "SELECT COUNT(*) as pendingRequests FROM user WHERE Status=0";
$result = mysqli_query($conn, $select_query);
$row = mysqli_fetch_assoc($result);
$pendingRequests = $row['pendingRequests'];
mysqli_free_result($result);
mysqli_close($conn);
header('Content-Type: application/json');
echo json_encode(array('pendingRequests' => $pendingRequests));
?>