<?php
require("connection.php");

$vendorid = $_POST['vendorid'];

$select_query = "SELECT c.name AS name, COUNT(p.productid) AS number_of_products FROM category c LEFT JOIN product p ON c.id = p.category WHERE p.vendorid = '$vendorid' GROUP BY c.name;";
$result = mysqli_query($conn, $select_query);
$rows = array();
if(mysqli_num_rows($result)>0)
{


while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
mysqli_free_result($result);
mysqli_close($conn);
}
else{
    $rows=0;
}
header('Content-Type: application/json');
echo json_encode($rows);
?>
