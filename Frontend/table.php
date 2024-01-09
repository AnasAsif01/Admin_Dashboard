<?php
$totallisteditems = 10;
$blockedusers = 2;
$pendingrequests = 4;
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin-Dashboard-main - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=97380e22c8933e9aa79cbc2390b9f15a">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/css/styles.min.css?h=413916ed51937c8850ea4534340ab7f8">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css">

        <style>
        ul li a{
            color:white;
            text-decoration:none;
            font-size:small;
        }
        .dropdown-menu li {
        margin-bottom: 10px;
    }

    </style>
</head>

<body id="page-top">
    
    <?php
    session_start();
    ?>
    <?php

$role = $_SESSION['role'];
$vendorid = $_SESSION['vendorid'];
echo "<input type='hidden' id='role' value='$role'>";
echo "<input type='hidden' id='vendorid' value='$vendorid'>";
?>
    <div id="wrapper">
         <!-- Side Menu -->
         <?php
            if ($_SESSION['role'] == -1) {
                ?>

                <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
                    <div class="container-fluid d-flex flex-column p-0"><a
                            class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                            <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
                        </a>
                        <hr class="sidebar-divider my-0">
                        <ul class="navbar-nav text-light" id="accordionSidebar">
                            <li class="nav-item"><a class="nav-link active"
                                    href="http://localhost/Admin_Dashboard/Frontend/index.php"><i
                                        class="fas fa-tachometer-alt"></i><span>Admin-Dashboard-Main</span></a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="http://localhost/Admin_Dashboard/Frontend/profile.php?userid=1"><i
                                        class="fas fa-user"></i><span>Profile</span></a></li>

                            <div class="dropdown">
                                <li class="nav-items dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-table p-3" style="text-align: right;"></i><span>Info</span>
                                    </a>
                                </li>
                                <ul class="dropdown-menu bg-primary p-2 ">
                                    <li><a href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=0"><span>Total
                                                User</span> </a></li>
                                    <li><a href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=1"><span>Total
                                                Listed Items</span> </a></li>
                                    <li><a href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=2"><span>Block
                                                Users</span> </a></li>
                                    <li><a href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=3"><span>Pending
                                                Requests</span> </a></li>
                                </ul>
                            </div>

                            <li class="nav-item"><a class="nav-link"
                                    href="http://localhost/Admin_Dashboard/Frontend/login.php"><i
                                        class="far fa-user-circle"></i><span>Login</span></a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="http://localhost/Admin_Dashboard/Frontend/login.php"><i
                                        class="fas fa-user-circle"></i><span>Register</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="http://localhost/Admin_Dashboard/Frontend/login.php"
                                    onclick="logout()"><i class="fas fa-user"></i><span>Logout</span></a></li>
                        </ul>
                        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                                id="sidebarToggle" type="button"></button></div>
                    </div>
                </nav>

                <?php
            } else {
                ?>

                <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
                    <div class="container-fluid d-flex flex-column p-0"><a
                            class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                            <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
                        </a>
                        <hr class="sidebar-divider my-0">
                        <ul class="navbar-nav text-light" id="accordionSidebar">
                            <li class="nav-item"><a class="nav-link active"
                                    href="http://localhost/Admin_Dashboard/Frontend/index.php"><i
                                        class="fas fa-tachometer-alt"></i><span>Admin-Dashboard-Main</span></a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="http://localhost/Admin_Dashboard/Frontend/profile.php?userid=1"><i
                                        class="fas fa-user"></i><span>Profile</span></a></li>

                            <div class="dropdown">
                                <li class="nav-items dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-table p-3" style="text-align: right;"></i><span>Info</span>
                                    </a>
                                </li>
                                <ul class="dropdown-menu bg-primary p-2 ">
                                    <li><a href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=8"><span>Total
                                                Sales</span> </a></li>
                                    <li><a href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=9"><span>Total
                                                Listed Items</span> </a></li>
                                    <li><a href="http://localhost/Admin_Dashboard/Frontend/reviews.php"><span>Vendor
                                                Reviews</span> </a></li>
                                </ul>
                            </div>

                            <li class="nav-item"><a class="nav-link"
                                    href="http://localhost/Admin_Dashboard/Frontend/login.php"><i
                                        class="far fa-user-circle"></i><span>Login</span></a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="http://localhost/Admin_Dashboard/Frontend/login.php"><i
                                        class="fas fa-user-circle"></i><span>Register</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="http://localhost/Admin_Dashboard/Frontend/login.php"
                                    onclick="logout()"><i class="fas fa-user"></i><span>Logout</span></a></li>
                        </ul>
                        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                                id="sidebarToggle" type="button"></button></div>
                    </div>
                </nav>
                <?php
            }
            ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            <?php
                    if ($_SESSION['role'] == -1) {
                        ?>
                        <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light">
                            <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3"
                                    id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                                <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                                    <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                                            placeholder="Search for ..."><button class="btn btn-primary py-0" type="button"><i
                                                class="fas fa-search"></i></button></div>
                                </form>
                                <ul class="navbar-nav flex-nowrap ms-auto">
                                    <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                            aria-expanded="false" data-bs-toggle="dropdown" href="#"><i
                                                class="fas fa-search"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in"
                                            aria-labelledby="searchDropdown">
                                            <form class="me-auto navbar-search w-100">
                                                <div class="input-group"><input class="bg-light form-control border-0 small"
                                                        type="text" placeholder="Search for ...">
                                                    <div class="input-group-append"><button class="btn btn-primary py-0"
                                                            type="button"><i class="fas fa-search"></i></button></div>
                                                </div>
                                            </form>
                                        </div>
                                    </li>

                                    <!-- Alerts for Products and Users -->
                                    <li class="nav-item dropdown no-arrow mx-1">
                                        <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                                    class="badge bg-danger badge-counter" id="notificationcount"></span>
                                                <i class="fas fa-bell fa-fw" onclick="setnotification()"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-list   animated--grow-in notificationsid"
                                                id="">
                                                <h6 class="dropdown-header">alerts center</h6>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                    <div class="me-3">
                                                        <div class="bg-primary icon-circle"><i
                                                                class="fas fa-file-alt text-white"></i></div>
                                                    </div>
                                                    <div>
                                                        <p>A new monthly report is ready to download!</p>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                    <div class="me-3">
                                                        <div class="bg-success icon-circle"><i
                                                                class="fas fa-donate text-white"></i></div>
                                                    </div>
                                                    <div>
                                                        <p>$290.29 has been deposited into your account!</p>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                                    Alerts</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown no-arrow mx-1">
                                        <div class="shadow dropdown-list dropdown-menu dropdown-menu-end"
                                            aria-labelledby="alertsDropdown"></div>
                                    </li>
                                    <div class="d-none d-sm-block topbar-divider"></div>
                                    <li class="nav-item dropdown no-arrow">
                                        <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                                    class="d-none d-lg-inline me-2 text-gray-600 small">
                                                    <?php echo $_SESSION['name'] ?>
                                                </span></a>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <?php
                    } else {
                        ?>
                        <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light">
                            <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3"
                                    id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                                <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                                    <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                                            placeholder="Search for ..."><button class="btn btn-primary py-0" type="button"><i
                                                class="fas fa-search"></i></button></div>
                                </form>
                                <ul class="navbar-nav flex-nowrap ms-auto">
                                    <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                            aria-expanded="false" data-bs-toggle="dropdown" href="#"><i
                                                class="fas fa-search"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in"
                                            aria-labelledby="searchDropdown">
                                            <form class="me-auto navbar-search w-100">
                                                <div class="input-group"><input class="bg-light form-control border-0 small"
                                                        type="text" placeholder="Search for ...">
                                                    <div class="input-group-append"><button class="btn btn-primary py-0"
                                                            type="button"><i class="fas fa-search"></i></button></div>
                                                </div>
                                            </form>
                                        </div>
                                    </li>

                                    <!-- Alerts for Products and Users -->
                                    <li class="nav-item dropdown no-arrow mx-1">
                                        <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                                    class="badge bg-danger badge-counter" id="notificationcount"></span>
                                                <i class="fas fa-bell fa-fw" onclick="setnotification()"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-list   animated--grow-in notificationsid"
                                                id="">
                                                <h6 class="dropdown-header">alerts center</h6>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                    <div class="me-3">
                                                        <div class="bg-primary icon-circle"><i
                                                                class="fas fa-file-alt text-white"></i></div>
                                                    </div>
                                                    <div>
                                                        <p>A new monthly report is ready to download!</p>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                    <div class="me-3">
                                                        <div class="bg-success icon-circle"><i
                                                                class="fas fa-donate text-white"></i></div>
                                                    </div>
                                                    <div>
                                                        <p>$290.29 has been deposited into your account!</p>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                                    Alerts</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown no-arrow mx-1">
                                        <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                                    class="badge bg-danger badge-counter " id="notificationcount2">0</span><i
                                                    class="fas fa-envelope fa-fw"></i></a>
                                            <div
                                                class="dropdown-menu dropdown-menu-end usermsg dropdown-list animated--grow-in">
                                            </div>
                                        </div>
                                        <div class="shadow dropdown-list dropdown-menu dropdown-menu-end"
                                            aria-labelledby="alertsDropdown"></div>
                                    </li>
                                    <div class="d-none d-sm-block topbar-divider"></div>
                                    <li class="nav-item dropdown no-arrow">
                                        <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                                    class="d-none d-lg-inline me-2 text-gray-600 small">
                                                    <?php echo $_SESSION['name'] ?>
                                                </span></a>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <?php
                    }
                    ?>
                <?php
                if ($_SESSION['role']==-1) {
                    ?>
                    <div class="container">
                        <div class="card card-outline border-left-primary">
                            <div class="row p-3 ms-5">
                                <div class="col-md-3">
                                    <div class="button-container">
                                        <a href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=0"
                                            class="btn btn-secondary">Show All Users</a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="button-container">
                                        <a href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=2"
                                            class="btn btn-primary">Show Blocked Users</a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="button-container">
                                        <a href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=3"
                                            class="btn btn-success">Show Pending Users</a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="button-container">
                                        <a href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=1"
                                            class="btn btn-info">Show All Products</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="container">
                                <div class="">
                                    <div class="table-responsive mt-5">
                                        <table class="table" id="myTable">
                                            <thead style="background-color: aqua; border-radius: 10px;" class="mt-5">
                                                <tr>
                                                    <th style="background-color: #4e73df; color:white">Image</th>
                                                    <th style="background-color: #4e73df; color:white;">Name</th>
                                                    <th style="background-color: #4e73df; color:white;">Description</th>
                                                    <th style="background-color: #4e73df; color:white;">Price</th>
                                                    <th style="background-color: #4e73df; color:white;">Operations</th>
                                                </tr>
                                            </thead>
                                            <tbody id='tablebody'>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                } else {
                    $vendorID = $_SESSION['vendorid'];
                    echo "<input type='hidden' id='vendorid' value='$vendorID'>";
                    ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 tabcol2">
                                    <div class="card  card-primary border border-info border-left-info shadow p-3 mb-5 bg-white rounded">
                                        <div class="card-body">
                                            <form id="addproductform" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="addname" class="form-label">Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Name"
                                                        id="addname" name="addname" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="adddescription" class="form-label">Description</label>
                                                    <input type="text" class="form-control" placeholder="Enter Description"
                                                        id="adddescription" name="adddescription" required>
                                                </div>
                                                <div class="mb-3 form-group">
                                                    <label for="addimage" class="form-label">Image Upload</label>
                                                    <input type="file" class="form-control" placeholder="Upload Image"
                                                        id="addimage" name="addimage" required>
                                                </div>
                                                <div class="mb-3 form-group">
        <label for="categoryDropdown" class="form-label">Select a Category</label>
        <select id="categoryDropdown" class="form-control" name="selectedCategory">
            <option value="" selected>Select a category</option>

            <?php
            include('connection.php');
            $sql = 'select * from category';
            $result = mysqli_query($conn, $sql);

            while ($category = mysqli_fetch_assoc($result)) {
                echo '<option value="' .$category['id'] . '">' . $category['name']. '</option>';
            }
            ?>
        </select>
    </div>
                                                <div class="d-flex justify-content-between">
                                                    <button type="button" class="btn btn-secondary" id="addcanceldialog"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="button" id="addsubmitbutton"
                                                        class="btn btn-primary">Confirm</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 tabcol">
                                    <div class="card">
                                        <div class="card-body card-primary border border-success border-left-success shadow p-3 mb-5 bg-white rounded">
                                            <div class="table-responsive mt-5">
                                                <table class="table" id="vendorproducttable">
                                                    <thead style="background-color: aqua; border-radius: 10px;"
                                                        class="mt-5">
                                                        <tr>
                                                            <th style="background-color: #4e73df; color:white">Image</th>
                                                            <th style="background-color: #4e73df; color:white;">Name</th>
                                                            <th style="background-color: #4e73df; color:white;">Description
                                                            </th>
                                                            <th style="background-color: #4e73df; color:white;">Price</th>
                                                            <th style="background-color: #4e73df; color:white;">Operations
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id='tablebody'>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php
                } ?>
                </div>

                <!-- Edit Product Form -->
                <div class="d-flex justify-content-center" style>
                    <dialog id="favDialog" class="border border-secondary rounded">
                        <form id="editproductform" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control border border-primary" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control border border-primary" id="description"
                                    name="description">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image Upload</label>
                                <input type="file" class="form-control border border-primary" id="image" name="image">
                            </div>
                     
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" id="canceldialog"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="button" id="submitbutton" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </dialog>
                </div>

                <div class="d-flex justify-content-center" style>
                    <dialog id="userdialog" class="border border-secondary rounded">
                        <form id="edituserform" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control border border-primary" id="username" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control border border-primary" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control border border-primary" id="password"
                                    name="password">
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" id="canceldialoguser"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="button" id="submitbuttonuser" class="btn btn-primary"
                                    onclick="submituserform()">Confirm</button>
                            </div>
                        </form>
                    </dialog>
                </div>
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Copyright © Brand 2023</span></div>
                    </div>
                </footer>
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
        <script src="assets/js/script.min.js?h=bdf36300aae20ed8ebca7e88738d5267"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="//cdn.jsdelivr.net/jquery.toast/jquery.toast.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.js"></script>
        <script src="./javascript/addproduct.js"></script>
        <script src="./javascript/table.js"></script>
        <script src="./javascript/logout.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>

</body>

</html>
