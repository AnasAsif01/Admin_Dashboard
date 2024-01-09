<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = getUsersInfo($conn);
    echo json_encode($response);
}

function getUsersInfo($conn)
{
    $select_query = "SELECT * FROM user";
    $result = mysqli_query($conn, $select_query);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $usersCount = count($users);

    return array('data' => $users, 'recordsTotal' => $usersCount, 'recordsFiltered' => $usersCount);
}
?>
