<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vendorid = $_POST['vendorid'];
    $reviewdata = getvendorreview($conn, $vendorid);
    print_r($reviewdata);
}

function getvendorreview($conn, $vendorid)
{
    $select_query = "SELECT pr.name, u.Name, s.price, s.Status
    FROM sale s JOIN product pr ON s.productid = pr.productid
    JOIN user u ON s.customerid = u.userid WHERE s.vendorid='$vendorid' ";
    $result = mysqli_query($conn, $select_query);
    $reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode(array('data' => $reviews));
}
?>
