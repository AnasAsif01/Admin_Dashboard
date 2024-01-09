<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['role'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $insert_query = "INSERT INTO user (`Name`,`Email`,`Password`,`Role`) VALUE ('$name','$email','$password','$role')";
    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        echo $name . ' ' . $email . ' ' . $password . ' ' . $role . ' ';
    } else {
        echo "Signup Not Successfull.";
    }
}
?>