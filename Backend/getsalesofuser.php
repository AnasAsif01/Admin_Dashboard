<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vendorid = $_POST['vendorid'];
    $userproduct = getsales($conn, $vendorid);
    print_r($userproduct);
}

function getsales($conn, $vendorid)
{
    $select_query = "SELECT p.productid, p.name, p.description, p.image, COUNT(s.productid) as productcount, MAX(s.price) as price FROM product p LEFT JOIN sale s ON p.productid = s.productid WHERE s.vendorid = '$vendorid' GROUP BY p.productid, p.name, p.description, p.image;";
    $result = mysqli_query($conn, $select_query);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode(array('data' => $products));
}
?>
