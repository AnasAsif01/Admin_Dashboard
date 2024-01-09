<?php
require("connection.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $vendorid = $_POST['vendorid'];
  $name = $_POST['addname'];
  $description = $_POST['adddescription'];
  $new_image = $_FILES['addimage']['name'];
  $category=$_POST['selectedCategory'];

  // Add product table
  $sql = "INSERT product SET vendorid='$vendorid', name='$name', description='$description', image='$new_image',
  category='$category'";
  $result = mysqli_query($conn, $sql);

  // Save image file
  move_uploaded_file($_FILES["addimage"]["tmp_name"], "../Frontend/assets/img/productimages/".$new_image);

  if($result) {
    $response['success'] = true;
    $response['message'] = "Product Added successfully";
  } else {
    $response['success'] = false;
    $response['message'] = "Error Adding product";
  }
}

echo json_encode($response);
?>
