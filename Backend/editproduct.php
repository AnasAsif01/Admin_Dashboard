<?php
require("connection.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $productid = $_POST['productid'];
  $name = $_POST['addname'];
  $description = $_POST['adddescription'];
  $new_image = $_FILES['addimage']['name'];

  // Update product table
  $sql = "UPDATE product SET name='$name', description='$description', image='$new_image' WHERE productid=$productid";
  $result = mysqli_query($conn, $sql);

  // Save image file
  move_uploaded_file($_FILES["addimage"]["tmp_name"], "../Frontend/assets/img/productimages/".$new_image);

  if($result) {
    $response['success'] = true;
    $response['message'] = "Product updated successfully";
  } else {
    $response['success'] = false;
    $response['message'] = "Error updating product";
  }
}

echo json_encode($response);
?>