<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password']) && isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $login_result = perform_login($conn, $email, $password);
    
    if ($login_result) {
        $response = new stdClass();
        $response->success = true;
        $response->email = $email;
        $response->password = $password;
        $response->userid = $login_result['userid'];
        $response->role=$login_result['Role'];
        $response->Name=$login_result['Name'];
        $json_string = json_encode($response);
        http_response_code(200);
        echo $json_string;
     
    } else {
        $response = new stdClass();
        $response->success = false;
        $response->error = "Incorrect email or password Or User Not Registered";
        $json_string = json_encode($response);
        http_response_code(401);
        echo $json_string;
     
    }
}

function perform_login($conn, $email, $password)
{
    $select_query = "SELECT `Role`,`userid`,`Name` , `password` FROM user WHERE email = '$email' AND (ROLE=1 OR ROLE=-1) AND Password='$password'";
    $stmt = $conn->query($select_query);  

    if (!$stmt) {
        return array('success' => false, 'message' => 'Prepare failed: ' . $conn->error);
    }

   

    if ($stmt->num_rows > 0) {
        $user = $stmt->fetch_assoc();
        $password1 = $user['password'];

        if ($password == $password1) {
            return array('success' => true, 'userid' => $user['userid'],'Role'=> $user['Role'],'Name' => $user['Name']);
        } else {
            return false;
        }
    } else {
      return false;
    }
}
?>