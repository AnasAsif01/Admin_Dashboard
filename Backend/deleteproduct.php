<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productid'])) {
    $productid = $_POST['productid'];
    
    $message = deleteproduct($conn, $productid);
    print_r($message);
}

function deleteproduct($conn, $productid)
{
    $select_query = "DELETE FROM product WHERE productid = $productid";
    $result = mysqli_query($conn, $select_query);
    if ($result) {
        $data = [
            'message' => "success",
        ];
    } else {
        $data = [
            'message' => "error",
        ];
    }

    return json_encode($data);
}

?>