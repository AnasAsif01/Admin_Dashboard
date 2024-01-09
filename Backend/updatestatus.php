<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    
    $message = updatestatus($conn, $userid);
    print_r($message);
}

function updatestatus($conn, $userid)
{
    $select_query = "Update user set Status='1' WHERE userid = $userid";
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