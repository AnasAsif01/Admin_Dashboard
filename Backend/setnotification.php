<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = updatenotification($conn);
    print_r($message);
}

function updatenotification($conn)
{
    $update_query = "UPDATE product SET notification=0; UPDATE user SET notification=0;";
    $result = mysqli_multi_query($conn, $update_query);
    if ($result) {
        return json_encode(array('message' => 'Notification has been updated'));
    } else {
        return json_encode(array('error' => 'Failed to update notification'));
    }
}
?>