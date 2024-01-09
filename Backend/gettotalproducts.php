<?php
require("connection.php");

$select_query = "SELECT COUNT(*) as totalProducts FROM product";
$result = mysqli_query($conn, $select_query);
$row = mysqli_fetch_assoc($result);
$totalProducts = $row['totalProducts'];
mysqli_free_result($result);
mysqli_close($conn);
header('Content-Type: application/json');
echo json_encode(array('totalProducts' => $totalProducts));
?>