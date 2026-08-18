<?php
include("admin_header.php");
include("connect.php");

$query = "SELECT * FROM tbl_user";
$res_user = mysqli_query($con,$query);
$count_user = mysqli_num_rows($res_user);

$query = "SELECT * FROM tbl_package";
$res_package = mysqli_query($con,$query);
$count_package = mysqli_num_rows($res_package);

$query = "SELECT * FROM tbl_gallery";
$res_gallery = mysqli_query($con,$query);
$count_gallery = mysqli_num_rows($res_gallery);

$query = "SELECT * FROM tbl_destination";
$res_destination = mysqli_query($con,$query);
$count_destination = mysqli_num_rows($res_destination);

$query = "SELECT * FROM tbl_booking";
$res_booking = mysqli_query($con,$query);
$count_booking = mysqli_num_rows($res_booking);
?>

<div class="page-heading">
    <h3>Profile Statistics</h3>
</div>

<div class="slider mb-5">
    <div id="carouselExampleAutoplayingIndicators" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleAutoplayingIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleAutoplayingIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleAutoplayingIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./images/image2.png" class="d-block" style="height: 400px;width: 100%;" alt="First slide">
            </div>
            <div class="carousel-item">
                <img src="./images/login-bg.png" class="d-block" style="height: 400px;width: 100%;" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img src="./images/image.png" class="d-block w-100" style="height: 400px;width: 100%;" alt="Third slide">
            </div>
        </div>

        <!-- Previous/Next Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplayingIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplayingIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="row">
    <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon dark-blue mb-2">
                            <i class="fa-solid fa-dollar-sign" style="color: rgb(255, 255, 255);"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Total Revenue</h6>
                        <h6 class="font-extrabold mb-0">112.000</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon mb-2" style="background-color: #4361ee;">
                            <i class="fa-solid fa-layer-group" style="color: rgb(255, 255, 255);"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Total Packages Added</h6>
                        <h6 class="font-extrabold mb-0"><?php echo $count_package ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon mb-2" style="background-color: #10b981;">
                            <i class="fa-solid fa-calendar-check" style="color: rgb(255, 255, 255);"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Total Bookings Done</h6>
                        <h6 class="font-extrabold mb-0"><?php echo $count_booking ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon mb-2" style="background-color: #f43f5e;">
                            <i class="fa-solid fa-location-dot" style="color: rgb(255, 255, 255);"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Total Destinations</h6>
                        <h6 class="font-extrabold mb-0"><?php echo $count_destination ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon mb-2" style="background-color: #f59e0b;">
                            <i class="fa-solid fa-users" style="color: rgb(255, 255, 255);"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Total Users Active</h6>
                        <h6 class="font-extrabold mb-0"><?php echo $count_user ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon mb-2" style="background-color: #db2777;">
                            <i class="fa-solid fa-images" style="color: rgb(255, 255, 255);"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Gallery Size</h6>
                        <h6 class="font-extrabold mb-0"><?php echo $count_gallery ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Profile Visit</h4>
            </div>
            <div class="card-body">
                <div id="chart-profile-visit"></div>
            </div>
        </div>
    </div>
</div>

<!-- pie chart -->
<div class="card">
    <div class="card-header">
        <h4>Visitors Profile</h4>
    </div>
    <div class="card-body">
        <div id="chart-visitors-profile"></div>
    </div>
</div>
<?php
include("admin_footer.php");
?>