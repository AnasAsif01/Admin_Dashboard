<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = getproducts($conn);
    print_r($users);
}

function getproducts($conn)
{
    $select_query = "SELECT * FROM user WHERE Status =-1 ";
    $result = mysqli_query($conn, $select_query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode(array('data'=>$users));
}

?>