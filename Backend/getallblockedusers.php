<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = getInactiveUsersInfo($conn);
    echo json_encode($response);
}

function getInactiveUsersInfo($conn)
{
    $select_query = "SELECT * FROM user WHERE Status = -1";
    $result = mysqli_query($conn, $select_query);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $usersCount = count($users);

    return array('data' => $users, 'recordsTotal' => $usersCount, 'recordsFiltered' => $usersCount);
}
?>
