<?php
require("connection.php");

$vendorid = $_POST['vendorid'];

$select_query = "SELECT name, Price FROM product WHERE vendorid = '$vendorid'";
$result = mysqli_query($conn, $select_query);
$rows = array();
while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
mysqli_free_result($result);
mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode($rows);
?>
