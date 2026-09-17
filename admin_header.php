<?php
session_start();

/* ---------- LOGIN CHECK ---------- */
$isadmin = false;
if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] != NULL) {
    $isadmin = true;
}

if (!$isadmin) {
    header("location:login.php");
    exit();
}

/* ---------- ACTIVE PAGE ---------- */
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasGo Admin Dashboard</title>

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="shortcut icon" href="./images/Firefly.png">

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/compiled/css/app.css">
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="./assets/compiled/css/iconly.css">
</head>

<body>

<script src="assets/static/js/initTheme.js"></script>

<div id="app">

    <!-- Sidebar -->
    <div id="sidebar">
        <div class="sidebar-wrapper active">

            <!-- Logo -->
            <div class="sidebar-header position-relative">
                <div class="d-flex justify-content-between align-items-center">

                    <div class="logo">
                        <a href="admin_home.php">
                            <img src="./images/logo-removedbg.png"
                                style="height:40px;width:130px;" alt="AtlasGo Logo">
                        </a>
                    </div>

                    <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                        <div class="form-check form-switch fs-6">
                            <input class="form-check-input me-0"
                                type="checkbox"
                                id="toggle-dark"
                                style="cursor:pointer">
                        </div>
                    </div>

                    <div class="sidebar-toggler x">
                        <a href="#" class="sidebar-hide d-xl-none d-block">
                            <i class="bi bi-x-lg"></i>
                        </a>
                    </div>

                </div>
            </div>

            <!-- Menu -->
            <div class="sidebar-menu">
                <ul class="menu">

                    <li class="sidebar-title">Menu</li>

                    <!-- Dashboard -->
                    <li class="sidebar-item <?= ($current_page=="admin_home.php") ? "active" : "" ?>">
                        <a href="admin_home.php" class="sidebar-link">
                            <i class="bi bi-speedometer2"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Category -->
                    <li class="sidebar-item <?= ($current_page=="admin_category.php") ? "active" : "" ?>">
                        <a href="admin_category.php" class="sidebar-link">
                            <i class="bi bi-collection"></i>
                            <span>Category</span>
                        </a>
                    </li>

                    <!-- Destination -->
                    <li class="sidebar-item <?= ($current_page=="admin_show_destination.php") ? "active" : "" ?>">
                        <a href="admin_show_destination.php" class="sidebar-link">
                            <i class="bi bi-globe2"></i>
                            <span>Destinations</span>
                        </a>
                    </li>

                    <!-- Package -->
                    <li class="sidebar-item <?= ($current_page=="admin_show_package.php") ? "active" : "" ?>">
                        <a href="admin_show_package.php" class="sidebar-link">
                            <i class="bi bi-map"></i>
                            <span>Packages</span>
                        </a>
                    </li>

                    <!-- Users -->
                    <li class="sidebar-item <?= ($current_page=="admin_show_user.php") ? "active" : "" ?>">
                        <a href="admin_show_user.php" class="sidebar-link">
                            <i class="bi bi-people"></i>
                            <span>Users</span>
                        </a>
                    </li>

                    <!-- Gallery -->
                    <li class="sidebar-item <?= ($current_page=="admin_show_gallery.php") ? "active" : "" ?>">
                        <a href="admin_show_gallery.php" class="sidebar-link">
                            <i class="bi bi-images"></i>
                            <span>Gallery</span>
                        </a>
                    </li>

                    <!-- Bookings -->
                    <li class="sidebar-item <?= ($current_page=="admin_show_booking.php") ? "active" : "" ?>">
                        <a href="admin_show_booking.php" class="sidebar-link">
                            <i class="bi bi-calendar-check"></i>
                            <span>Bookings</span>
                        </a>
                    </li>

                    <!-- Logout -->
                    <li class="sidebar-item <?= ($current_page=="logout.php") ? "active" : "" ?>">
                        <a href="logout.php" class="sidebar-link">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </a>
                    </li>

                </ul>

                <!-- Admin Profile -->
                <div class="card mt-4 mx-3">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">

                            <div class="avatar avatar-xl">
                                <img src="./assets/compiled/jpg/1.jpg" alt="Admin">
                            </div>

                            <div class="ms-3">
                                <h5 class="font-bold mb-0">Admin</h5>
                                <small class="text-muted">admin@atlasgo.com</small>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>