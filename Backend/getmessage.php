<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userid1']) && isset($_POST['userid2'])) {
    $userid1 = $_POST['userid1'];
    $userid2 = $_POST['userid2'];

    $lastMessageId = isset($_POST['lastMessageId']) ? $_POST['lastMessageId'] : 0;

    $usermessage = getusermessage($conn, $userid1, $userid2, $lastMessageId);
    print_r($usermessage);
}

function getusermessage($conn, $userid1, $userid2, $lastMessageId)
{
    $select_queryr = "SELECT * FROM chat WHERE (userid1='$userid1' AND userid2='$userid2' AND id > $lastMessageId) ORDER BY chat_datetime ASC";
    $select_queryl = "SELECT * FROM chat WHERE (userid1='$userid2' AND userid2='$userid1' AND id > $lastMessageId) ORDER BY chat_datetime ASC";

    $stmt = mysqli_query($conn, $select_queryr);
    $stmt1 = mysqli_query($conn, $select_queryl);

    $usermessager = array();
    $usermessagel = array();

    while ($row = mysqli_fetch_assoc($stmt)) {
        $usermessager[] = $row;
    }

    $stmt->close();

    while ($row = mysqli_fetch_assoc($stmt1)) {
        $usermessagel[] = $row;
    }

    $stmt1->close();
    $completemessage = array();
    $completemessage[] = $usermessager;
    $completemessage[] = $usermessagel;
    $data = [
        'leftmessage' => $usermessagel,
        'rightmessage' => $usermessager
    ];
    return json_encode($data);
}
?>