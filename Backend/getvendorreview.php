<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vendorid = $_POST['vendorid'];
    $reviewdata = getvendorreview($conn, $vendorid);
    print_r($reviewdata);
}

function getvendorreview($conn, $vendorid)
{
    $select_query = "SELECT user.name,review.review,review.feedback,review.reviewid FROM review  join user
     on user.userid=review.userid WHERE vendorid='$vendorid' ";
    $result = mysqli_query($conn, $select_query);
    $reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return json_encode(array('data' => $reviews));
}
?>
