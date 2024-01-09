<?php
require("connection.php");
$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST['task'];
    $priority = $_POST['priority'];

    $sql = "INSERT INTO todolist (task, priority) VALUES ('$task', '$priority')";

    if (mysqli_query($conn, $sql)) {
        
        header("Location: http://localhost/Admin-Dashboard-main/Frontend/index.php");
        exit(); 
    } else {
        $response['success'] = false;
        $response['message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

echo json_encode($response);
?>
