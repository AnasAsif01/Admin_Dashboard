<?php
require("connection.php");

$vendorid = $_POST['vendorid'];

$select_query = "SELECT COUNT(*) as totalProducts FROM product WHERE vendorid = '$vendorid'";
$result = mysqli_query($conn, $select_query);
$row = mysqli_fetch_assoc($result);
$totalProducts = $row['totalProducts'];
mysqli_free_result($result);
mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode(array('totalProducts' => $totalProducts));
?>
