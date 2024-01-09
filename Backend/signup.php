<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['role'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $check_query = "SELECT * FROM user WHERE Email='$email'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "EmailExists";
    } else {
        $insert_query = "INSERT INTO user (`Name`, `Email`, `Password`, `Role`) VALUE ('$name','$email','$password','$role')";
        $result = mysqli_query($conn, $insert_query);
    }
    
}
?>
