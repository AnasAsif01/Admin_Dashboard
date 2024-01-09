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
    <title>Admin-Dashboard-Main - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=97380e22c8933e9aa79cbc2390b9f15a">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/css/styles.min.css?h=413916ed51937c8850ea4534340ab7f8">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        ul li a {
            color: white;
            text-decoration: none;
            font-size: small;
        }

        .dropdown-menu li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body id="page-top">
    <?php
    session_start();

    if ($_SESSION['role'] != 0) {
        $role = $_SESSION['role'];
        echo "<input type='hidden' id='role' value='$role'>";
        ?>

            <div id="wrapper">
                <!-- Side Menu -->
                <?php
                if ($_SESSION['role'] == -1) {
                    include('connection.php');
                    $select_query = "SELECT COUNT(*) as pendingRequests FROM user WHERE Status=0";
                    $result = mysqli_query($conn, $select_query);
                    $row = mysqli_fetch_assoc($result);
                    $pendingRequests = $row['pendingRequests'];
                    $select_query = "SELECT COUNT(*) as blockedUsers FROM user WHERE Status=-1";
                    $result = mysqli_query($conn, $select_query);
                    $row = mysqli_fetch_assoc($result);
                    $blockedUsers = $row['blockedUsers'];
                    $select_query = "SELECT COUNT(*) as totalUsers FROM user WHERE Role=1";
                    $result = mysqli_query($conn, $select_query);
                    $row = mysqli_fetch_assoc($result);
                    $totalUsers = $row['totalUsers'];
                    $select_query = "SELECT COUNT(*) as totalProducts FROM product";
                    $result = mysqli_query($conn, $select_query);
                    $row = mysqli_fetch_assoc($result);
                    $totalProducts = $row['totalProducts'];
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
                                            href="http://localhost/Admin_Dashboard/Frontend/profile.php"><i
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

                                    <!-- <li class="nav-item"><a class="nav-link"
                                    href="http://localhost/Admin_Dashboard/Frontend/login.php"><i
                                        class="far fa-user-circle"></i><span>Login</span></a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="http://localhost/Admin_Dashboard/Frontend/login.php"><i
                                        class="fas fa-user-circle"></i><span>Register</span></a></li> -->
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
                                            href="http://localhost/Admin_Dashboard/Frontend/profile.php?userid=<?php echo $_SESSION['vendorid'] ?>"><i
                                                class="fas fa-user"></i><span>Profile</span></a></li>

                                    <div class="dropdown">
                                        <li class="nav-items dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-table p-3" style="text-align: right;"></i><span>Info</span>
                                            </a>
                                        </li>
                                        <ul class="dropdown-menu bg-primary p-2 ">
                                            <li><a href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=8"><span>Total
                                                        Sale</span> </a></li>
                                            <li><a href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=9"><span>Total
                                                        Listed Items</span> </a></li>
                                            <li><a href="http://localhost/Admin_Dashboard/Frontend/reviews.php"><span>Vendor
                                                        Reviews</span> </a></li>
                                        </ul>
                                    </div>

                                    <!-- <li class="nav-item"><a class="nav-link"
                                    href="http://localhost/Admin_Dashboard/Frontend/login.php"><i
                                        class="far fa-user-circle"></i><span>Login</span></a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="http://localhost/Admin_Dashboard/Frontend/login.php"><i
                                        class="fas fa-user-circle"></i><span>Register</span></a></li> -->
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
                <!-- Side Menu end -->

                <div class="d-flex flex-column" id="content-wrapper">
                    <div id="content">
                        <!-- Above Menu Start -->
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
                                                <div class="nav-item dropdown no-arrow"><a href='//localhost/Admin_Dashboard/Frontend/profile.php' class="dropdown-toggle nav-link"
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
                        <!-- Above Menu end -->

                        <div class="container-fluid">
                            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                                <h3 class="text-dark mb-0">Admin-Dashboard-Main</h3><a
                                    class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i
                                        class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
                            </div>
                            <div class="row">
                                <?php
                                if ($_SESSION['role'] == 1) {
                                    include('connection.php');

                                    $vendorid = $_SESSION['vendorid'];
                                    echo "<input type='hidden' id='vendorid' value='$vendorid'>";
                                    $select_query = "SELECT COUNT(*) as totalProducts FROM product WHERE vendorid = '$vendorid'";
                                    $result = mysqli_query($conn, $select_query);
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $totalProducts = $row['totalProducts'];
                                    } else {
                                        $totalProducts = 0;
                                    }

                                    $select_query = "SELECT SUM(price) as totalSales FROM sale WHERE vendorid = '$vendorid'";
                                    $result = mysqli_query($conn, $select_query);
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $totalSales = $row['totalSales'];
                                        if ($totalSales == '' || $totalSales == null) {
                                            $totalSales = '0 Rs';
                                        }
                                    } else {
                                        $totalSales = 0;
                                    }

                                    $select_query = "SELECT ROUND(AVG(review), 2) as avgRating FROM review WHERE vendorid = '$vendorid'";
                                    $result = mysqli_query($conn, $select_query);
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $avgRating = $row['avgRating'];
                                        if ($avgRating == '' || $avgRating == null) {
                                            $avgRating = 'None';
                                        }
                                    } else {
                                        $avgRating = 'None';
                                    }


                                    ?>
                                        <div class="container row">
                                            <div class="col-md-6 col-xl-3 mb-4">
                                                <div class="card shadow border-start-success py-2" style="background-color:green;">
                                                    <div class="card-body">
                                                        <div class="row align-items-center no-gutters">
                                                            <div class="col me-2">
                                                                <div
                                                                    class="text-uppercase text-success fw-bold text-xs mb-1 text-white">
                                                                    <span>Total Listed Items</span>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="text-dark fw-bold h5 mb-0 text-white"
                                                                            id="productbyvendor">
                                                                            <?php echo $totalProducts ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto"> <a
                                                                    href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=9">
                                                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Total Sales -->

                                            <div class="col-md-6 col-xl-3 mb-4">
                                                <div class="card shadow border-start-primary py-2" style="background-color:blue;">
                                                    <div class="card-body">
                                                        <div class="row align-items-center no-gutters">
                                                            <div class="col me-2">
                                                                <div
                                                                    class="text-uppercase text-primary fw-bold text-xs mb-1 text-white">
                                                                    <span>Total
                                                                        Sales</span>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="text-dark fw-bold h5 mb-0 text-white"
                                                                            id="vendorsales">
                                                                            <?php echo $totalSales ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto"><a
                                                                    href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=8"><i
                                                                        class="fa fa-users fa-2x text-gray-300"></i></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-3 mb-4">
                                                <div class="card shadow border-start-info py-2 bg-warning">
                                                    <div class="card-body">
                                                        <div class="row align-items-center no-gutters">
                                                            <div class="col me-2">
                                                                <div class="text-uppercase text-info fw-bold text-xs mb-1 text-white">
                                                                    <span>Reviews
                                                                    </span>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="text-dark fw-bold h5 mb-0 text-white"
                                                                            id="vendorreviews">
                                                                            <?php echo $avgRating ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto"><a
                                                                    href="http://localhost/Admin_Dashboard/Frontend/reviews.php">
                                                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Total Views -->
                                            <div class="col-md-6 col-xl-3 mb-4">
                                                <div class="card shadow border-start-warning py-2" style="background-color:red;">
                                                    <div class="card-body">
                                                        <div class="row align-items-center no-gutters">
                                                            <div class="col me-2">
                                                                <div
                                                                    class="text-uppercase text-warning fw-bold text-xs mb-1 text-white">
                                                                    <span>Total Views</span>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="text-dark fw-bold h5 mb-0 text-white"
                                                                            id="vendorviews"> 100
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto"> <a href="http://localhost/Admin_Dashboard/Frontend/views.php"><i
                                                                        class="fas fa-comments fa-2x text-gray-300"></i></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Charts and others for vendor -->
                                        <div class="row">
                                            <div class="col-lg-7 col-xl-8">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header d-flex justify-content-between align-items-center">
                                                        <h6 class="text-primary fw-bold m-0">Product Prices</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="chart-area">
                                                            <div class="container">
                                                                <canvas id="vendorproductchart"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-xl-4">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header d-flex justify-content-between align-items-center">
                                                        <h6 class="text-primary fw-bold m-0">Vendor Product in Categories</h6>
                                                    </div>
                                                    <div class="card-body">
                                                    <div class="chart-area">
            <canvas id="vendorcategorychart"></canvas>
        </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End: Chart -->
                                        <div class="row">
                                            <div class="col-lg-6 mb-4">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="text-primary fw-bold m-0">Payment Sources</h6>
                                                    </div>
                                                    <div class="card-body" id="progressBarContainer">
                                                    </div>
                                                </div>
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3 messagebox1" id="messagebox1">
                                                        <h6 class="text-primary fw-bold m-0">Order Messages</h6>
                                                    </div>
                                                    <ul class="list-group list-group-flush" id="orderList"></ul>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-lg-6 mb-4">
                                                        <div class="card text-white bg-primary shadow">
                                                            <div class="card-body">
                                                                <p class="m-0">Paypal</p>
                                                                <p class="text-white-50 small m-0">Secure payments, guaranteed with
                                                                    complete analysis.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-4">
                                                        <div class="card text-white bg-success shadow">
                                                            <div class="card-body">
                                                                <p class="m-0">Credit and Debit Cards</p>
                                                                <p class="text-white-50 small m-0">Swipe your worries away with our
                                                                    payment solution.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                          
                                        
                                                    <div class="col-lg-6 mb-4">
                                                        <div class="card text-white bg-danger shadow">
                                                            <div class="card-body">
                                                                <p class="m-0">Google Pay</p>
                                                                <p class="text-white-50 small m-0">Secure payments, without any hassle.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-4">
                                                        <div class="card text-white bg-secondary shadow">
                                                            <div class="card-body">
                                                                <p class="m-0">Direct Debit</p>
                                                                <p class="text-white-50 small m-0">Hassle-free payments is the way to
                                                                    go.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Chat Dialog -->
                                        <div class="d-flex justify-content-center" style>
                                            <dialog id="favDialog" class="border rounded border-primary">
                                                <div class="container py-5">
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="">
                                                            <div class="card" id="chat1" style="border-radius: 15px;">
                                                                <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0"
                                                                    style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                                                                    <i class="fas fa-angle-left"></i>
                                                                    <p class="mb-0 fw-bold">Live chat</p>
                                                                    <i class="fas fa-times"></i>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="d-flex flex-row justify-content-start mb-4">
                                                                        <div class="ms-3" style="border-radius: 15px;">
                                                                            <div class="bg-image">
                                                                                <a href="#!">
                                                                                    <div class="mask"></div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group  me-3 ">
                                                                    <input type="text" class="form-control" id="usermessage" rows="4"
                                                                        placeholder="Type your message"></input>
                                                                    <button type="button" id="send-button"
                                                                        class="btn btn-primary">Send</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="p-3">
                                                    <button type="button" onclick="closechat()" class="btn btn-danger">Close</button>
                                                </div>
                                            </dialog>
                                        </div>
                                        <!-- Sales Person Graphs -->
                                        <?php
                                } else if ($_SESSION['role'] == -1) {
                                    ?>
                                                <div class="col-md-6 col-xl-3 mb-4">
                                                    <div class="card shadow border-start-primary py-2" style="background-color:blue;">
                                                        <div class="card-body">
                                                            <div class="row align-items-center no-gutters">
                                                                <div class="col me-2">
                                                                    <div class="text-uppercase text-primary fw-bold text-xs mb-1 text-white">
                                                                        <span>Total
                                                                            Vendors</span>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="text-dark fw-bold h5 mb-0 text-white" id="totalusers">
                                                                        <?php echo $totalUsers ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto"><a
                                                                        href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=0"><i
                                                                            class="fa fa-users fa-2x text-gray-300"></i></a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xl-3 mb-4">
                                                    <div class="card shadow border-start-success py-2" style="background-color:green;">
                                                        <div class="card-body">
                                                            <div class="row align-items-center no-gutters">
                                                                <div class="col me-2">
                                                                    <div class="text-uppercase text-success fw-bold text-xs mb-1 text-white">
                                                                        <span>Total Listed Items</span>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="text-dark fw-bold h5 mb-0 text-white"
                                                                                id="totalproducts">
                                                                        <?php echo $totalProducts ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto"> <a
                                                                        href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=1">
                                                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xl-3 mb-4">
                                                    <div class="card shadow border-start-info py-2" style="background-color:red;">
                                                        <div class="card-body">
                                                            <div class="row align-items-center no-gutters">
                                                                <div class="col me-2">
                                                                    <div class="text-uppercase text-info fw-bold text-xs mb-1 text-white">
                                                                        <span>Block
                                                                            Users</span>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="text-dark fw-bold h5 mb-0 text-white" id="blockedusers">
                                                                        <?php echo $blockedUsers ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto"><a
                                                                        href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=2">
                                                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xl-3 mb-4">
                                                    <div class="card shadow border-start-warning bg-warning py-2">
                                                        <div class="card-body">
                                                            <div class="row align-items-center no-gutters">
                                                                <div class="col me-2">
                                                                    <div class="text-uppercase text-warning fw-bold text-xs mb-1 text-white">
                                                                        <span>Pending Requests</span>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="text-dark fw-bold h5 mb-0 text-white"
                                                                                id="pendingrequests">
                                                                        <?php echo $pendingRequests ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto"> <a
                                                                        href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=3"><i
                                                                            class="fas fa-comments fa-2x text-gray-300"></i></a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Charts and others -->
                                            <div class="row">
                                                <div class="col-lg-7 col-xl-8">
                                                    <div class="card shadow mb-4">
                                                        <div class="card-header d-flex justify-content-between align-items-center">
                                                            <h6 class="text-primary fw-bold m-0">Earnings Overview</h6>
                                                            <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                                                                    aria-expanded="false" data-bs-toggle="dropdown" type="button"><i
                                                                        class="fas fa-ellipsis-v text-gray-400"></i></button>
                                                                <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                                                    <p class="text-center dropdown-header">dropdown header:</p><a
                                                                        class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item"
                                                                        href="#">&nbsp;Another action</a>
                                                                    <div class="dropdown-divider"></div><a class="dropdown-item"
                                                                        href="#">&nbsp;Something else here</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="chart-area"><canvas
                                                                    data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Earnings&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;0&quot;,&quot;10000&quot;,&quot;5000&quot;,&quot;15000&quot;,&quot;10000&quot;,&quot;20000&quot;,&quot;15000&quot;,&quot;25000&quot;],&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}]}}}"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-xl-4">
                                                    <div class="card shadow mb-4">
                                                        <div class="card-header d-flex justify-content-between align-items-center">
                                                            <h6 class="text-primary fw-bold m-0">Revenue Sources</h6>
                                                            <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                                                                    aria-expanded="false" data-bs-toggle="dropdown" type="button"><i
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css" rel="stylesheet">

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
                        <li class="nav-item"><a class="nav-link"
                                href="http://localhost/Admin_Dashboard/Frontend/index.php"><i
                                    class="fas fa-tachometer-alt"></i><span>Admin-Dashboard-Main</span></a></li>
                        <li class="nav-item"><a class="nav-link active"
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
                        <li class="nav-item"><a class="nav-link"
                                href="http://localhost/Admin_Dashboard/Frontend/index.php"><i
                                    class="fas fa-tachometer-alt"></i><span>Admin-Dashboard-Main</span></a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="http://localhost/Admin_Dashboard/Frontend/profile.php?userid=1"><i
                                    class="fas fa-user"></i><span>Profile</span></a></li>
                        <div class="dropdown active">
                            <li class="nav-items dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-table p-3" style="text-align: right;"></i><span>Info</span>
                                </a>
                            </li>
                            <ul class="dropdown-menu bg-primary p-2">
                                <li><a href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=8"><span class="text-white">Total
                                            Sales</span> </a></li>
                                <li><a href="http://localhost/Admin_Dashboard/Frontend/table.php?tabletype=9"><span class="text-white">Total
                                            Listed Items</span> </a></li>
                                <li><a href="http://localhost/Admin_Dashboard/Frontend/reviews.php"><span class="text-white">Vendor
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
        <!-- Side Menu end -->

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <!-- Above Menu Start -->
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
                <!-- Above Menu end -->
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Reviews</h3><a
                            class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i
                                class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
                    </div>
                    <div class="row">
                        <?php
                        if (isset($_SESSION['vendorid'])) {
                            $vendorID = $_SESSION['vendorid'];
                            echo "<input type='hidden' id='vendorid' value='$vendorID'>";
                            ?>
                            <div class="container">
                                <div class="row" id="reviewCards">
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <?php
                        } ?>
                    </div>
                </div>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="./javascript/review.js"></script>
    <script src="./javascript/logout.js"></script>
</body>

</html>                              class="fas fa-ellipsis-v text-gray-400"></i></button>
                                                                <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                                                    <p class="text-center dropdown-header">dropdown header:</p><a
                                                                        class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item"
                                                                        href="#">&nbsp;Another action</a>
                                                                    <div class="dropdown-divider"></div><a class="dropdown-item"
                                                                        href="#">&nbsp;Something else here</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="chart-area"><canvas
                                                                    data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Direct&quot;,&quot;Social&quot;,&quot;Referral&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;50&quot;,&quot;30&quot;,&quot;15&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}"></canvas>
                                                            </div>
                                                            <div class="text-center small mt-4"><span class="me-2"><i
                                                                        class="fas fa-circle text-primary"></i>&nbsp;Direct</span><span
                                                                    class="me-2"><i
                                                                        class="fas fa-circle text-success"></i>&nbsp;Social</span><span
                                                                    class="me-2"><i class="fas fa-circle text-info"></i>&nbsp;Refferal</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End: Chart -->

                                            <div class="card shadow mb-4 col-md-10">
                                                <div class="card-header py-3">
                                                    <h6 class="text-primary fw-bold m-0">User Comments</h6>
                                                </div>

                               

                                                <?php
                                                $sql = "select * from usercomments LIMIT 5";
                                                $res = mysqli_query($conn, $sql);

                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    // Set color based on your logic
                                                    $color = 'black'; // You might want to replace this with your actual color logic
                                                    ?>
                    <div class="list-group-item border rounded mb-3" style="background-color: #f8f9fa; padding: 15px;">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <h5 class="mb-0" style="vertical-align: middle; color: <?php echo $color; ?>;">
                                    <strong><?php echo $row['user']; ?></strong>
                                </h5>
                            </div>
                            <div class="col-auto" style="margin: 20px;">
                                <p style="margin: 0; font-size: 1.1rem;"><?php echo $row['comment']; ?></p>
                            </div>
                        </div>
                    </div>
            <?php
             }
            ?>


                                            </div>
                                        </div>
                                    </div>
                            <?php
                                } ?>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2023</span></div>
                </div>
            </footer>
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
            </div>
    <?php } else {
        header('Location: login.php');
        exit(); // It's a good practice to exit after a header redirect to ensure no further code is executed
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="assets/js/script.min.js?h=bdf36300aae20ed8ebca7e88738d5267"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>
    <script src="./javascript/index.js"></script>
    <script src="./javascript/notification3.js"></script>
    <script src="./javascript/logout.js"></script>
    <script src="./javascript/barchart.js"></script>
    <script src="./javascript/piechart2.js"></script>
    <script src="./javascript/paymentmode.js"></script>
    <script src="./javascript/chat3.js"></script>
</body>

</html>