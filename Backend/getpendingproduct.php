<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vendorid=$_POST['vendorid'];
    $users = getusers($conn,$vendorid);
    print_r($users);
}

function getusers($conn,$vendorid)
{
    $select_query = "SELECT  * FROM product WHERE vendorid='$vendorid' and notification=1 LIMIT 5";
    $result = mysqli_query($conn, $select_query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode(array('data'=>$users));
}

?>