<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vendorid = $_POST['vendorid'];
    $response = getProductsInfo($conn, $vendorid);
    echo json_encode($response);
}

function getProductsInfo($conn, $vendorid)
{
    $select_query = "SELECT * FROM product WHERE vendorid='$vendorid'";
    $result = mysqli_query($conn, $select_query);

    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $productsCount = count($products);

    return array('data' => $products, 'recordsTotal' => $productsCount, 'recordsFiltered' => $productsCount);
}
?>
