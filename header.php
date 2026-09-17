<?php
session_start();
$islogin = false;
$username = "Guest";
if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] != NULL) {
    $username = $_SESSION['username'];
    $islogin = true;
}
?>

<!doctype html>
<html class="no-js" lang="zxx">
<!-- Mirrored from html.themeholy.com/tourm/demo/home-agency.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Aug 2024 08:57:01 GMT -->

<head>
    <meta charset="utf-8">
    <style>
        .mobile-nav {
            position: fixed;
            top: 0;
            right: -100%;
            width: 270px;
            height: 100%;
            background: #fff;
            z-index: 99999;
            transition: 0.3s;
            padding: 70px 20px 20px;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.2);
        }

        .mobile-nav.active {
            right: 0;
        }

        .mobile-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mobile-nav ul li {
            border-bottom: 1px solid #eee;
        }

        .mobile-nav ul li a {
            display: block;
            padding: 15px 5px;
            color: #222;
            font-size: 17px;
            text-decoration: none;
            font-weight: 500;
        }

        .mobile-nav ul li a:hover {
            color: #0d6efd;
        }

        .close-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            border: none;
            background: none;
            font-size: 30px;
            cursor: pointer;
        }

        @media (min-width:1200px) {
            .mobile-nav {
                display: none;
            }
        }


        /* Mobile Menu */
.th-menu-wrapper{
    position: fixed;
    top: 0;
    right: -100%;
    width: 280px;
    height: 100%;
    background: #fff;
    z-index: 99999;
    transition: 0.3s ease;
    box-shadow: -5px 0 20px rgba(0,0,0,.15);
}

.th-menu-wrapper.active{
    right: 0;
}

.th-mobile-menu ul{
    list-style: none;
    margin: 30px 0 0;
    padding: 0;
}

.th-mobile-menu ul li{
    border-bottom: 1px solid #ececec;
}

.th-mobile-menu ul li a{
    display: block;
    padding: 15px 10px;
    color: #222;
    font-size: 17px;
    font-weight: 600;
    text-decoration: none;
}

.th-mobile-menu ul li a:hover{
    color: #0d6efd;
}

@media(min-width:1200px){
    .th-menu-wrapper{
        display:none;
    }
}
    </style>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AtlasGo - Travel & Tour Booking Agency</title>
    <meta name="author" content="AtlasGo">
    <meta name="description" content="AtlasGo - Travel & Tour Booking Agency">
    <meta name="keywords" content="AtlasGo - Travel & Tour Booking Agency">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="57x57" href="assets1/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets1/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets1/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets1/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets1/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets1/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets1/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets1/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets1/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets1/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets1/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets1/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets1/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets1/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets1/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;family=Manrope:wght@200..800&amp;family=Montez&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets1/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets1/css/magnific-popup.min.css">
    <link rel="stylesheet" href="assets1/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets1/css/style.css">
    <style>
        @media (min-width: 1200px) {
            .th-header .main-menu>ul>li>a {
                padding-left: 14px !important;
                padding-right: 14px !important;
            }

            .th-header .main-menu>ul>li {
                margin: 0 5px !important;
            }
        }

        /* Remove horizontal line on capsule hover */
        .th-header .main-menu>ul>li.profile-capsule>a::before {
            display: none !important;
            content: none !important;
        }

        .th-header .main-menu>ul>li.profile-capsule>a:hover {
            text-decoration: none !important;
        }
    </style>
</head>

<body>
    <div class="magic-cursor relative z-10">
        <div class="cursor"></div>
        <div class="cursor-follower"></div>
    </div>

    <div id="preloader" class="preloader"><button class="th-btn preloaderCls">Cancel Preloader</button>
        <div class="preloader-inner"><img src="./images/logo_main.png" style="width: 100px;" alt=""></div>
        <div id="loader" class="th-preloader">
            <div class="animation-preloader">
                <div class="txt-loading"><span preloader-text="A" class="characters">A </span><span preloader-text="t"
                        class="characters">t </span><span preloader-text="l" class="characters">l </span><span
                        preloader-text="a" class="characters">a </span><span preloader-text="s"
                        class="characters">s </span><span preloader-text="G"
                        class="characters">G </span><span preloader-text="o"
                        class="characters">o</span></div>
            </div>
        </div>
    </div>
    <div class="sidemenu-wrapper sidemenu-info">
        <div class="sidemenu-content"><button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget">
                <div class="th-widget-about">
                    <div class="about-logo"><a href="home-travel.html"><img style="width: 200px;" src="./images/AtlasGo_Footer.png" alt="AtlasGo"></a>
                    </div>
                    <p class="about-text">Your trusted travel partner for handpicked tours and memorable vacations. From flight arrangements to guided excursions, we take care of the details so you can enjoy the journey</p>
                    </p>
                    <div class="th-social"><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a> <a
                            href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a> <a
                            href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a> <a
                            href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a></div>
                </div>
            </div>
            <div class="widget">
                <h3 class="widget_title">Recent Posts</h3>
                <div class="recent-post-wrap">
                    <div class="recent-post">
                        <div class="media-img"><a href="#"><img
                                    src="assets1/img/blog/recent-post-1-1.jpg" alt="Blog Image"></a></div>
                        <div class="media-body">
                            <div class="recent-post-meta"><a href="#"><i class="far fa-calendar"></i>24 Jun ,
                                    2026</a></div>
                            <h4 class="post-title"><a class="text-inherit" href="#">Where Vision Meets
                                    Concrete Reality</a></h4>
                        </div>
                    </div>
                    <div class="recent-post">
                        <div class="media-img"><a href="#"><img
                                    src="assets1/img/blog/recent-post-1-2.jpg" alt="Blog Image"></a></div>
                        <div class="media-body">
                            <div class="recent-post-meta"><a href="#"><i class="far fa-calendar"></i>22 Jun ,
                                    2026</a></div>
                            <h4 class="post-title"><a class="text-inherit" href="#">Raising the Bar in
                                    Construction.</a></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget">
                <h3 class="widget_title">Get In Touch</h3>
                <div class="th-widget-contact">
                    <div class="info-box_text">
                        <div class="icon"><img src="assets1/img/icon/phone.svg" alt="img"></div>
                        <div class="details">
                            <p><a href="tel:+01234567890" class="info-box_link">+91 85214 74528 (India)</a></p>
                            <p><a href="tel:+09876543210" class="info-box_link">+1 (555) 234-5678 (USA)</a></p>
                        </div>
                    </div>
                    <div class="info-box_text">
                        <div class="icon"><img src="assets1/img/icon/envelope.svg" alt="img"></div>
                        <div class="details">
                            <p><a href="mailto:mailinfo00@tourm.com" class="info-box_link">atlasgo@gmail.com</a></p>
                            <p><a href="mailto:support24@tourm.com" class="info-box_link">supportatlasgo24@gmail.com</a></p>
                        </div>
                    </div>
                    <div class="info-box_text">
                        <div class="icon"><img src="assets1/img/icon/location-dot.svg" alt="img"></div>
                        <div class="details">
                            <p>789 Inner Lane, Holy park, California, USA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-search-box"><button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#"><input type="text" placeholder="What are you looking for?"> <button type="submit"><i
                    class="fal fa-search"></i></button></form>
    </div>
    <!--========== MOBILE MENU ==========-->
    <div class="th-menu-wrapper" id="mobileMenu">
        <div class="th-menu-area text-center">

            <!-- Close Button -->
            <button class="th-menu-toggle" id="closeMenu">
                <i class="fal fa-times"></i>
            </button>

            <!-- Logo -->
            <div class="mobile-logo">
                <a href="home.php">
                    <img src="./images/AtlasGo.png" alt="AtlasGo" style="height:55px;">
                </a>
            </div>

            <!-- Navigation -->
            <div class="th-mobile-menu">
                <ul>

                    <li><a href="home.php">Home</a></li>

                    <li><a href="about_us.php">About Us</a></li>

                    <li><a href="destination.php">Destinations</a></li>

                    <li><a href="packages.php">Packages</a></li>

                    <li><a href="booking.php">My Bookings</a></li>

                    <li><a href="gallery.php">Gallery</a></li>

                    <li><a href="contact.php">Contact Us</a></li>

                    <?php if ($islogin) { ?>
                        <li><a href="login.php">Change User</a></li>
                        <li><a href="logout.php" style="color:red;font-weight:bold;">Logout (<?php echo htmlspecialchars($username); ?>)</a></li>
                    <?php } else { ?>
                        <li><a href="login.php">Login</a></li>
                    <?php } ?>

                </ul>
            </div>

        </div>
    </div>
    <header class="th-header header-layout3 header-absolute">
        <div class="sticky-wrapper">
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between flex-nowrap">
                        <div class="col-auto">
                            <nav class="main-menu d-none d-xl-block">
                                <ul>
                                    <li><a class="active"
                                            href="home.php">Home</a>
                                    </li>
                                    <li><a href="about_us.php">About Us</a></li>
                                    <li><a href="destination.php">Destinations</a>
                                        <!-- <ul class="sub-menu">
                                            <li><a href="destination.html">Domestic(India) Destinations</a></li>
                                            <li><a href="destination-details.html">International Destinations</a></li>
                                        </ul> -->
                                    </li>
                                    <li><a href="packages.php">Packages</a>
                                        <!-- <ul class="sub-menu">
                                            <li><a href="service.html">Services</a></li>
                                            <li><a href="service-details.html">Service Details</a></li>
                                        </ul> -->
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-auto">
                            <div class="header-logo"><a href="home.php"><img style="height: 60px;width: 210px;" src="./images/AtlasGo.png"
                                        alt="AtlasGo"></a></div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-xl-block">
                                <ul>

                                    <li><a href="booking.php">My Bookings</a></li>

                                    <li><a href="gallery.php">Gallery</a></li>

                                    <?php if ($islogin) { ?>
                                        <li class="menu-item-has-children profile-capsule">
                                            <a href="#" style="display: inline-flex; align-items: center; transform: translateY(6px); background: var(--theme-color); border-radius: 30px; padding: 4px 16px 4px 4px !important; margin-top: auto; margin-bottom: auto; color: white; gap: 8px; border: 1px solid var(--theme-color); text-decoration: none;">
                                                <img src="assets1/img/icon/user.svg" alt="User" style="width: 32px; height: 32px; border-radius: 50%; border: 2px solid white; background: #f0f0f0; padding: 4px; object-fit: contain;">
                                                <span style="font-size: 15px; font-weight: 500; text-transform: none; letter-spacing: 0.5px; line-height: 1;"><?php echo htmlspecialchars($username); ?></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li><a href="login.php">Change User</a></li>
                                                <li><a style="color: red;font-weight: bold;" href="logout.php">Logout</a></li>
                                            </ul>
                                        </li>
                                    <?php } else { ?>
                                        <li><a href="login.php">Login</a></li>
                                    <?php } ?>
                                    <li><a href="contact.php">Contact us</a></li>
                                </ul>
                            </nav><button type="button" class="th-menu-toggle d-block d-xl-none" id="menuBtn">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="header-right-button"> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button></div>
            </div>
        </div>
    </header>

    <div id="mobileMenu" class="mobile-nav">
        <button class="close-btn" id="closeMenu">&times;</button>

        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="about_us.php">About Us</a></li>
            <li><a href="destination.php">Destinations</a></li>
            <li><a href="packages.php">Packages</a></li>
            <li><a href="booking.php">My Bookings</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="contact.php">Contact Us</a></li>

            <?php if ($islogin) { ?>
                <li><a href="logout.php">Logout (<?php echo $username; ?>)</a></li>
            <?php } else { ?>
                <li><a href="login.php">Login</a></li>
            <?php } ?>
        </ul>
    </div>