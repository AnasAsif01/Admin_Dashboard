<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vendorid=$_POST['vendorid'];
    $userproduct = getproducts($conn, $vendorid);
    print_r($userproduct);
}

function getproducts($conn, $vendorid)
{
    $select_query = "SELECT * FROM product WHERE vendorid='$vendorid'";
    $result = mysqli_query($conn, $select_query);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode(array('data' => $products));
}

?>