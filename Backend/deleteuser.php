<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    
    $message = deleteuser($conn, $userid);
    print_r($message);
}

function deleteuser($conn, $userid)
{
    $select_query = "DELETE FROM user WHERE userid = $userid";
    $result = mysqli_query($conn, $select_query);
    if ($result) {
        $data = [
            'message' => "success",
        ];
    } else {
        $data = [
            'message' => "error",
        ];
    }

    return json_encode($data);
}
?>