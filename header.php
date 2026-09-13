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
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AtlasGo - Travel & Tour Booking Agency</title>
    <meta name="author" content="AtlasGo">
    <meta name="description" content="AtlasGo - Travel & Tour Booking Agency">
    <meta name="keywords" content="AtlasGo - Travel & Tour Booking Agency">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;family=Manrope:wght@200..800&amp;family=Montez&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="magic-cursor relative z-10">
        <div class="cursor"></div>
        <div class="cursor-follower"></div>
    </div>

    <div id="preloader" class="preloader"><button class="th-btn preloaderCls">Cancel Preloader</button>
        <div class="preloader-inner"><img src="assets/img/logo3.svg" alt=""></div>
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
                                    src="assets/img/blog/recent-post-1-1.jpg" alt="Blog Image"></a></div>
                        <div class="media-body">
                            <div class="recent-post-meta"><a href="#"><i class="far fa-calendar"></i>24 Jun ,
                                    2026</a></div>
                            <h4 class="post-title"><a class="text-inherit" href="#">Where Vision Meets
                                    Concrete Reality</a></h4>
                        </div>
                    </div>
                    <div class="recent-post">
                        <div class="media-img"><a href="#"><img
                                    src="assets/img/blog/recent-post-1-2.jpg" alt="Blog Image"></a></div>
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
                        <div class="icon"><img src="assets/img/icon/phone.svg" alt="img"></div>
                        <div class="details">
                            <p><a href="tel:+01234567890" class="info-box_link">+91 85214 74528    (India)</a></p>
                            <p><a href="tel:+09876543210" class="info-box_link">+1 (555) 234-5678  (USA)</a></p>
                        </div>
                    </div>
                    <div class="info-box_text">
                        <div class="icon"><img src="assets/img/icon/envelope.svg" alt="img"></div>
                        <div class="details">
                            <p><a href="mailto:mailinfo00@tourm.com" class="info-box_link">atlasgo@gmail.com</a></p>
                            <p><a href="mailto:support24@tourm.com" class="info-box_link">supportatlasgo24@gmail.com</a></p>
                        </div>
                    </div>
                    <div class="info-box_text">
                        <div class="icon"><img src="assets/img/icon/location-dot.svg" alt="img"></div>
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
    <div class="th-menu-wrapper onepage-nav">
        <div class="th-menu-area text-center"><button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo"><a href="home-travel.html"><img src="assets/img/logo2.svg" alt="Tourm"></a></div>
            <div class="th-mobile-menu">
                <ul>
                    <li><a class="active" href="home.php">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li class="menu-item-has-children"><a href="#">Destination</a>
                        <ul class="sub-menu">
                            <li><a href="destination.html">Destination</a></li>
                            <li><a href="destination-details.html">Destination Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#">Service</a>
                        <ul class="sub-menu">
                            <li><a href="service.html">Services</a></li>
                            <li><a href="service-details.html">Service Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#">Activities</a>
                        <ul class="sub-menu">
                            <li><a href="activities.html">activities</a></li>
                            <li><a href="activities-details.html">activities Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li class="menu-item-has-children"><a href="#">Shop</a>
                                <ul class="sub-menu">
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="shop-details.html">Shop Details</a></li>
                                    <li><a href="cart.html">Cart Page</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                </ul>
                            </li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li><a href="tour.html">Our Tour</a></li>
                            <li><a href="tour-details.html">Tour Details</a></li>
                            <li><a href="tour-guide.html">Tour Guider</a></li>
                            <li><a href="tour-guider-details.html">Tour Guider Details</a></li>
                            <li><a href="faq.html">Faq Page</a></li>
                            <li><a href="price.html">Price Package</a></li>
                            <li><a href="error.html">Error Page</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact us</a></li>
                </ul>
            </div>
        </div>
    </div>
    <header class="th-header header-layout3 header-absolute">
        <div class="sticky-wrapper">
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
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

                                    <li><a href="login.php">Login</a></li>

                                    <li class="menu-item-has-children"><a href="#">Profile</a>
                                        <ul class="sub-menu">
                                            <li><a style="color: red;font-weight: bold;" href="logout.php">Logout</a></li>
                                            <!-- <li><a href="blog-details.html">Blog Details</a></li> -->
                                        </ul>
                                    </li>
                                    <li><a href="contact.php">Contact us</a></li>
                                </ul>
                            </nav><button type="button" class="th-menu-toggle d-block d-xl-none"><i
                                    class="far fa-bars"></i></button>
                        </div>
                    </div>
                </div>
                <div class="header-right-button"><a href="#" class="simple-btn sideMenuToggler"><img
                            src="assets/img/icon/menu.svg" alt=""></a></div>
            </div>
        </div>
    </header>