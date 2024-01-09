<?php
require("connection.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message']) && isset($_POST['userid1']) && isset($_POST['userid2'])) {
    $usermessage = $_POST['message'];
    $userid1 = intval($_POST['userid1']);
    $userid2 = intval($_POST['userid2']);
    $current_time = date('Y-m-d H:i:s');

    $insert_query = "INSERT INTO chat (`userid1`,`userid2`,`message`,`chat_datetime`) VALUE ('$userid1','$userid2','$usermessage','$current_time')";
    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        $response = new stdClass();
        $response->success = true;
        $response->message = "Message Sent";
        $json_string = json_encode($response);
        echo $json_string;
    } else {
        $response = new stdClass();
        $response->success = true;
        $response->message = "Message not send";
        $json_string = json_encode($response);
        echo $json_string;
    }
}
?>