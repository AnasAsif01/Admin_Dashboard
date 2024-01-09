<?php
require("connection.php");

$vendorid = $_POST['vendorid'];

$select_query = "SELECT  paymentmode, COUNT(*) AS percentage FROM paymentmethod WHERE vendorid = '$vendorid' GROUP BY  paymentmode;";
$result = mysqli_query($conn, $select_query);

if(mysqli_num_rows($result)>0)
{

$rows = array();
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
