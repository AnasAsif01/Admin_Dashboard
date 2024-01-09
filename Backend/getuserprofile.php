<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    $userprofile = getprofile($conn, $userid);
    print_r($userprofile);
}

function getprofile($conn, $userid)
{
    $select_query = "SELECT * FROM user WHERE userid = $userid";
    $result = mysqli_query($conn, $select_query);
    $profile = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return json_encode($profile);
}

?>