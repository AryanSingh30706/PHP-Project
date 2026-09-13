<?php
include('header.php');
include('connect.php');

$query1 = "SELECT * FROM `tbl_destination` WHERE `type` LIKE 'domestic'";
$res = mysqli_query($con, $query1);

$count1 = 0;
$count1 = mysqli_num_rows($res);

$dom = array();
if ($count1 > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $dom[] = $row;
    }
}

$query2 = "SELECT * FROM `tbl_destination` WHERE `type` LIKE 'international'";
$res = mysqli_query($con, $query2);

$count2 = 0;
$count2 = mysqli_num_rows($res);

$inter = array();
if ($count2 > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $inter[] = $row;
    }
}
?>

<style>
    .destination-card {
        height: 380px;
        position: relative;
        border-radius: 30px !important;
        /* Adjust pixel value here */
        overflow: hidden;
        /* Ensures child elements stay within the rounded border */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .destination-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25) !important;
    }

    /* Constrained Image Wrapper */
    .card-img-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .card-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
    }

    .destination-card:hover .card-img-wrapper img {
        transform: scale(1.08);
    }

    /* Custom Overlay Class (Replacing Bootstrap's broken overlay context) */
    .card-custom-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 2;
        background: linear-gradient(180deg,
                rgba(0, 0, 0, 0) 25%,
                rgba(0, 0, 0, 0.5) 60%,
                rgba(0, 0, 0, 0.9) 100%);
    }

    .tracking-wide {
        letter-spacing: 1.5px;
    }

    /* Button & Hover Effects */
    .btn-primary-custom {
        background-color: #ffffff;
        color: #0f172a;
        border: none;
        border-radius: 10px;
        transition: background-color 0.2s ease, color 0.2s ease;
    }

    .destination-card:hover .btn-primary-custom {
        background-color: #0284c7;
        color: #ffffff;
    }

    .btn-primary-custom svg {
        transition: transform 0.2s ease;
    }

    .destination-card:hover .btn-primary-custom svg {
        transform: translateX(4px);
    }
</style>

<body>
    <!-- <div class="he_ad" style="width: 100%;height: 20px;background-color: ;"></div> -->

    <div style="
    background-color: #303954;
    border: 0px solid transparent;
    width: 100%;
    height: 100px;">
    </div>

    <!-- Page Title / Inner Hero Banner -->
    <div class="breadcumb-wrapper mt-5" data-bg-src="images/back.avif" style="padding: 180px 0 100px; background-size: cover; background-position: center; position: relative; border-radius: 20px; margin: 20px; overflow: hidden; border: 1px solid transparent;">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title text-white fw-bold mb-3"></i>AtlasGo - Destinations</h1>
                <ul class="breadcumb-menu list-inline text-white">
                    <li class="list-inline-item"><a href="home.php" class="text-white">Home</a></li>
                    <li class="list-inline-item me-2">/</li>
                    <li class="list-inline-item active text-white-50">Destination</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Page Title / Inner Hero Banner
    <div class="breadcumb-wrapper " data-bg-src="images/back.avif" style="padding: 180px 0 100px; background-size: cover; background-position: center; position: relative; border-radius: 20px; margin: 20px; overflow: hidden; border: 1px solid transparent;">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title text-white fw-bold mb-3"><i class="fa-solid fa-circle-info me-2"></i>AtlasGo - Destinations</h1>
                <ul class="breadcumb-menu list-inline text-white">
                    <li class="list-inline-item"><a href="home.php" class="text-white">Home</a></li>
                    <li class="list-inline-item me-2">/</li>
                    <li class="list-inline-item active text-white-50">Destination</li>
                </ul>
            </div>
        </div>
    </div> -->

    <!-- Main Package Categories Section -->
    <section class="space position-relative overflow-hidden my-5" id="packages-sec">
        <div class="container">

            <!-- Section Title Header -->
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="title-area text-center mb-5">
                        <span class="sub-title">Choose Your Destination</span>
                        <h2 class="sec-title">Explore Travel Categories</h2>
                        <p class="sec-text">Select a travel region to browse popular destinations, local highlights, and curated travel guides.</p>
                    </div>
                </div>
            </div>

            <!-- Two Category Cards (Domestic & International) -->
            <div class="row gy-4 justify-content-center">

                <div>
                    <h2 class="sec-title">Domestic Destinations: </h2>
                    <div class="container my-5">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">


                            <?php if ($count1 > 0) {
                                $i = 1;
                                foreach ($dom as $d) {
                            ?>
                                    <div class="col">
                                        <div class="card destination-card border-0 shadow-sm rounded-5 overflow-hidden">
                                            <div class="card-img-wrapper">
                                                <img src="<?php echo $d['dpic'] ?>">
                                                <span class="badge position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill bg-white text-dark shadow-sm"><?php echo $i++ ?></span>
                                            </div>
                                            <div class="card-custom-overlay d-flex flex-column justify-content-end p-4">
                                                <!-- <span class="text-warning fw-bold text-uppercase small tracking-wide">Indonesia</span> -->
                                                <h3 class="card-title text-white fw-bold mb-1"><?php echo $d['dname'] ?></h3>

                                                <?php
                                                $ids = $d['did'];
                                                $q = "SELECT * from tbl_package WHERE did=$ids";
                                                $res = mysqli_query($con, $q);
                                                $c = mysqli_num_rows($res);

                                                // $dest_name = $d['dname'];

                                                ?>
                                                <p class="text-white-50 mb-3"><?= $c ?> Packages Available</p>
                                                <button class="btn btn-primary-custom w-100 fw-semibold py-2 d-flex align-items-center justify-content-center gap-2">
                                                    <a class="btn" href="package_filter.php?did=<?php echo $d['did']; ?>&dname=<?php echo $d['dname'] ?>"><span>Show Packages</span></a>
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                        <polyline points="12 5 19 12 12 19"></polyline>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                            <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>


                <div>
                    <h2 class="sec-title">International Destinations: </h2>
                    <div class="container my-5">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">


                            <?php if ($count2 > 0) { // Changed $count1 to $count2
                                $i = 1;
                                foreach ($inter as $int) {
                            ?>
                                    <div class="col">
                                        <div class="card destination-card border-0 shadow-sm rounded-5 overflow-hidden">
                                            <div class="card-img-wrapper">
                                                <img src="<?php echo $int['dpic'] ?>">
                                                <span class="badge position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill bg-white text-dark shadow-sm"><?php echo $i++ ?></span>
                                            </div>
                                            <div class="card-custom-overlay d-flex flex-column justify-content-end p-4">
                                                <h3 class="card-title text-white fw-bold mb-1"><?php echo $int['dname'] ?></h3>

                                                <?php
                                                // Changed $d['did'] to $int['did']
                                                $ids = $int['did'];
                                                $q = "SELECT * from tbl_package WHERE did=$ids";
                                                $res = mysqli_query($con, $q);
                                                $c = mysqli_num_rows($res);
                                                ?>

                                                <p class="text-white-50 mb-3"><?= $c ?> Packages Available</p>
                                                <button class="btn btn-primary-custom w-100 fw-semibold py-2 d-flex align-items-center justify-content-center gap-2">
                                                    <!-- Added the missing &dname= parameter here -->
                                                    <a class="btn" href="package_filter.php?did=<?php echo $int['did']; ?>&dname=<?php echo urlencode($int['dname']); ?>"><span>Show Packages</span></a>
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                        <polyline points="12 5 19 12 12 19"></polyline>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                            <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>

</body>


<?php
include('footer.php');
?>