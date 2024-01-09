<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $vendorid = $_POST['vendorid'];
  $role = $_POST['role'];
  $name = $_POST['name'];
  $_SESSION['vendorid'] = $vendorid;
  $_SESSION['role'] = $role;
  $_SESSION['name'] = $name;
}
?>