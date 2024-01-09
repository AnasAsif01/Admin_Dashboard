<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    
    $chats = getchats($conn, $userid);
    print_r($chats);
}

function getchats($conn, $userid)
{
    $select_query = "SELECT DISTINCT userid FROM (SELECT userid2 AS userid
        FROM chat
        WHERE userid1 = '$userid'
        UNION ALL
        SELECT userid1 AS userid
        FROM chat
        WHERE userid2 = '$userid'
    ) AS subquery;";
    $result = mysqli_fetch_all(mysqli_query($conn, $select_query), MYSQLI_ASSOC);
    
    if ($result) {
        $data = array();
        foreach ($result as $row) {
            $userid2 = $row['userid'];
            $message_query = "SELECT message FROM chat WHERE message IS NOT NULL AND ( (userid1 = '$userid2' AND userid2 = '$userid') OR (userid1 = '$userid' AND userid2 = '$userid2') ) ORDER BY chat_datetime DESC LIMIT 1;";
            $message_result = mysqli_query($conn, $message_query);
            $message_row = mysqli_fetch_assoc($message_result);
            $message = $message_row['message'];
    
            $username_query = "SELECT Name FROM user WHERE userid='$userid2'";
            $username_result = mysqli_query($conn, $username_query);
            $username_row = mysqli_fetch_assoc($username_result);
            $username = $username_row['Name'];
    
            $data[] = array(
                'userid2' => $userid2,
                'username' => $username,
                'message' => $message
            );
        }
    } else {
        $data = "No results found";
    }
    
    return json_encode($data);
}

?>