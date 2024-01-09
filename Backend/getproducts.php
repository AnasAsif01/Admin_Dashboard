<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userproduct = getproducts($conn);
    print_r($userproduct);
}

function getproducts($conn)
{
    $select_query = "SELECT * FROM product";
    $result = mysqli_query($conn, $select_query);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode(array('data'=>$products));
}

?>