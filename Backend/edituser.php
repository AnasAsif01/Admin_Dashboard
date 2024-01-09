<?php
require("connection.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $userid = $_POST['userid'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Update product table
  $sql = "UPDATE user SET name='$name', email='$email', password='$password' WHERE userid=$userid";
  $result = mysqli_query($conn, $sql);
  if($result) {
    $response['success'] = true;
    $response['message'] = "User updated successfully";
  } else {
    $response['success'] = false;
    $response['message'] = "Error updating User";
  }
}

echo json_encode($response);
?>