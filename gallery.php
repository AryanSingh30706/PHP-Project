<?php
include('header.php');
include('connect.php');

$query = "SELECT * FROM `tbl_gallery`";
$res = mysqli_query($con, $query);

$count = 0;
$count = mysqli_num_rows($res);

$gallery = array();

if ($count > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $gallery[] = $row;
    }
}
?>

<style>
    /* ==========================================
   Gallery Section - Fixed Uniform Cards
   ========================================== */

    .gallery-area {
        position: relative;
    }

    /* 1. Force exact fixed size for every card frame */
    .gallery-card {
        position: relative !important;
        width: 100% !important;
        height: 260px !important;
        /* Fixed height for all cards */
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    /* 2. Inner layout containers */
    .gallery-card .box-img,
    .gallery-card .box-img a {
        display: block !important;
        width: 100% !important;
        height: 100% !important;
        position: relative !important;
    }

    /* 3. Universal image fit (No stretching or distortion) */
    .gallery-card .box-img img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        /* Crops image cleanly to fill frame */
        object-position: center !important;
        transition: transform 0.4s ease;
    }

    /* 4. Smooth image zoom on hover */
    .gallery-card:hover .box-img img {
        transform: scale(1.08);
    }

    /* 5. Centered Magnifying Glass Button (Fixed icon display & position) */
    .gallery-card .icon-btn {
        position: absolute !important;
        top: 50% !important;
        left: 50% !important;
        transform: translate(-50%, -50%) scale(0.8) !important;

        width: 55px !important;
        height: 55px !important;
        background-color: rgba(255, 255, 255, 0.95) !important;
        color: #1b3d54 !important;
        border-radius: 50% !important;

        /* Flexbox centering for the inner icon */
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 20px !important;

        /* Hidden by default, smooth hover appearance */
        opacity: 0 !important;
        visibility: hidden !important;
        z-index: 5 !important;
        transition: all 0.3s ease-in-out !important;
    }

    /* Ensure Font Awesome icon renders inline inside button */
    .gallery-card .icon-btn i {
        display: block !important;
        line-height: 1 !important;
    }

    /* 6. Reveal button on hover */
    .gallery-card:hover .icon-btn {
        opacity: 1 !important;
        visibility: visible !important;
        transform: translate(-50%, -50%) scale(1) !important;
    }

    /* 7. Dark overlay tint on hover */
    .gallery-card .box-img a::after {
        content: '' !important;
        position: absolute !important;
        inset: 0 !important;
        background: rgba(0, 0, 0, 0.3) !important;
        opacity: 0 !important;
        transition: opacity 0.3s ease !important;
        z-index: 1 !important;
    }

    .gallery-card:hover .box-img a::after {
        opacity: 1 !important;
    }
</style>

<body>
    <div style="
    background-color: #303954;
    border: 0px solid transparent;
    width: 100%;
    height: 100px;">
    </div>

    <!-- Page Title / Inner Hero Banner -->
    <div class="breadcumb-wrapper mt-5" data-bg-src="images/gallery_back.png" style="padding: 180px 0 100px; background-size: cover; background-position: center; position: relative; border-radius: 20px; margin: 20px; overflow: hidden; border: 1px solid transparent;">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title text-white fw-bold mb-3"></i>AtlasGo - Gallery</h1>
                <ul class="breadcumb-menu list-inline text-white">
                    <li class="list-inline-item"><a href="home.php" class="text-white">Home</a></li>
                    <li class="list-inline-item me-2">/</li>
                    <li class="list-inline-item active text-white-50">Gallery</li>
                </ul>
            </div>
        </div>
    </div>
</body>

<div>
    <div class="gallery-area" style="margin-top: 150px;">
        <div class="container th-container">
            <div class="title-area text-center">
                <span class="sub-title">Make Your Tour Memorable</span>
                <h2 class="sec-title">Recent Gallery</h2>
            </div>
            <div class="row g-4 justify-content-center align-items-center">

                <?php foreach ($gallery as $g) {
                ?>

                    <!-- Gallery Card 1 -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="gallery-card">
                            <div class="box-img global-img">
                                <a href="<?php echo $g['image']; ?>" class="popup-image">
                                    <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div>
                                    <img src="<?php echo $g['image']; ?>" alt="gallery image">
                                </a>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>