<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = getusers($conn);
    print_r($users);
}

function getusers($conn)
{
    $select_query = "SELECT * FROM user WHERE notification=1";
    $result = mysqli_query($conn, $select_query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode(array('data'=>$users));
}

?>