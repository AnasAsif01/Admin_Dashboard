<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productid = $_POST['productid'];
    $productdata = getproductdata($conn, $productid);
    print_r($productdata);
}

function getproductdata($conn, $productid)
{
    $select_query = "SELECT * FROM product WHERE productid='$productid'";
    $result = mysqli_query($conn, $select_query);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode(array('data' => $products));
}
?>
