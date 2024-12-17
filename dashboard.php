<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>POS for Siddiqie</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <style>
        .card-label {
            display: block;
            cursor: pointer;
        }

        .card-label input[type="checkbox"]:checked+.card {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>
</head>

<body>
<?php
// Check if the user is logged in via cookies
if (!isset($_COOKIE['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

$user_id = $_COOKIE['user_id'];
$username = $_COOKIE['username'];
$role = $_COOKIE['role'];
?>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block mx-auto">SIDDIQIE</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>

        </div><!-- End Logo -->

        <div class="main mt-3 ms-3">
            <p id="datetime"></p>
        </div>

        <div class="main ms-auto me-3">
            <i class="ri ri-account-circle-fill"></i>
            <span><?php echo $username; ?></span>
        </div>



    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapse show" href="dashboard.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="take_order.php">
                    <i class="bi bi-bell-fill"></i>
                    <span>Take Order</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="orders.php">
                    <i class="bi bi-list-ul"></i>
                    <span>Orders</span>
                </a>
            </li>
            
            <?php if ($role == 'admin' || $role == 'manager'): ?>
            <li class="nav-heading">Catalogs</li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-box-seam"></i><span>Menus</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="view_menu.php">
                            <i class="bi bi-circle"></i><span>View List Menu</span>
                        </a>
                    </li>
                    <li>
                        <a href="menu.php">
                            <i class="bi bi-circle"></i><span>Create Menu</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->
            

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-card-list"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="view_category.php">
                            <i class="bi bi-circle"></i><span>View List Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="category.php">
                            <i class="bi bi-circle"></i><span>Create Category</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->
            <?php endif; ?>

            <li class="nav-heading">Users</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="logout.php">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </a>
            </li><!-- End Logout Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
        </div><!-- End Page Title -->

        <p>id: <?php echo $user_id; ?><br></p>
        <p>username: <?php echo $username; ?><br></p>
        <p>role: <?php echo $role; ?><br></p>

        <section class="section">
            <div class="row">
                <div class="col-lg-2">
                    <label class="card-label">
                        <input type="checkbox" name="card-selection[]" value="card1" class="d-none">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Card 1</h5>
                                <p>Content for card 1.</p>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const now = new Date();
            const options = {
                weekday: 'long',
                day: 'numeric',
                month: 'short',
                year: 'numeric'
            };
            const formattedDate = new Intl.DateTimeFormat('en-GB', options).format(now);
            document.getElementById("datetime").textContent = formattedDate;
        });
    </script>
    <script>
        const checkboxes = document.querySelectorAll('input[name="card-selection[]"]');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                console.log("Card value:", checkbox.value, "Checked state:", checkbox.checked);
            });
        });
    </script>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>