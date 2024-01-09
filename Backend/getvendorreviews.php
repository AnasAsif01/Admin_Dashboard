<?php
require("connection.php");

$vendorid = $_POST['vendorid'];

$select_query = "SELECT ROUND(AVG(review), 2) as avgRating FROM review WHERE vendorid = '$vendorid'";
$result = mysqli_query($conn, $select_query);
$row = mysqli_fetch_assoc($result);
$avgRating = $row['avgRating'];
mysqli_free_result($result);
mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode(array('avgRating' => $avgRating));


?>
