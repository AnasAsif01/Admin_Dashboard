<?php
require("connection.php");

$vendorid = $_POST['vendorid'];

$select_query = "SELECT SUM(price) as totalSales FROM sale WHERE vendorid = '$vendorid'";
$result = mysqli_query($conn, $select_query);
$row = mysqli_fetch_assoc($result);
$totalSales = $row['totalSales'];
mysqli_free_result($result);
mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode(array('totalSales' => $totalSales));

?>
