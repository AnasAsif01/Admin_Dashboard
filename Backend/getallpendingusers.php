<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = getActiveUsersInfo($conn);
    echo json_encode($response);
}

function getActiveUsersInfo($conn)
{
    $select_query = "SELECT * FROM user WHERE Status = 0";
    $result = mysqli_query($conn, $select_query);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $usersCount = count($users);

    return array('data' => $users, 'recordsTotal' => $usersCount, 'recordsFiltered' => $usersCount);
}
?>
