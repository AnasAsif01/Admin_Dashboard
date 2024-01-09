<?php
$hostname = "localhost";
$username = "root";
$password = "";

$dbname = "chatapp";
$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("" . $conn->connect_error);
}
?>