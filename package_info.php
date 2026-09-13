<?php
include('header.php');
include('connect.php');
$id = $_GET['id'];

$query = "SELECT * FROM `tbl_package` WHERE `pid` = $id";
$res = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($res);
?>

<style>
    /* 1. Wrapper (Updated to allow scrolling if description gets massive) */
    .roomy-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        /* Changed to min-height */
        width: 100%;
        margin: 0;
        padding: 50px 20px;
        /* Added more top/bottom padding for breathing room */
        box-sizing: border-box;
        background-color: #f4f7f6;
        font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
    }

    /* 2. Horizontal Card Layout (Updated to grow automatically) */
    .roomy-card {
        display: flex;
        flex-direction: row;
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
        width: 100%;
        max-width: 1050px;
        min-height: 500px;
        /* Gives a large base size */
        height: auto;
        /* Allows card to stretch downward */
        overflow: hidden;
    }

    /* 3. Left Image Pane */
    .roomy-image-pane {
        flex: 0 0 42%;
        position: relative;
        /* Flexbox automatically stretches this to match the right side's height */
    }

    /* 4. The Image */
    .r-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        display: block;
    }

    /* 5. The Badge */
    .r-badge {
        position: absolute;
        top: 25px;
        left: 25px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(4px);
        color: #0ea5e9;
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        z-index: 10;
    }

    /* 6. Right Content Pane (UPDATED TO GUARANTEE SPACIOUSNESS) */
    .roomy-content-pane {
        flex: 1;
        padding: 50px 55px;
        /* Generous outer padding */
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 32px;
        /* MAGIC SPACING: Always forces 32px between sections */
    }

    /* 7. Header elements */
    .r-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
        margin: 0;
        /* Reset margins since gap handles spacing */
    }

    .r-title {
        margin: 0 0 8px 0;
        font-size: 1.85rem;
        color: #0f172a;
        font-weight: 800;
        line-height: 1.25;
        text-transform: uppercase;
        /* Matching your screenshot */
    }

    .r-subtitle {
        display: block;
        color: #64748b;
        font-size: 1rem;
        font-weight: 500;
    }

    .r-price {
        font-size: 2.2rem;
        /* Made slightly larger */
        font-weight: 800;
        color: #059669;
        text-align: right;
        line-height: 1.1;
    }

    .r-price span {
        display: block;
        font-size: 0.9rem;
        color: #94a3b8;
        font-weight: 600;
        margin-top: 4px;
    }

    /* 8. Description (Updated to show full text) */
    .r-description {
        color: #475569;
        font-size: 1.05rem;
        line-height: 1.8;
        /* Increased line height for readability */
        margin: 0;
    }

    /* 9. Logistics Row */
    .r-logistics {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f8fafc;
        padding: 24px 30px;
        /* Slightly thicker padding */
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        margin: 0;
    }

    .r-log-item {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .r-icon {
        font-size: 1.5rem;
    }

    .r-log-text {
        display: flex;
        flex-direction: column;
    }

    .r-log-text small {
        font-size: 0.75rem;
        color: #64748b;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }

    .r-log-text strong {
        font-size: 1.05rem;
        color: #0f172a;
    }

    .r-divider {
        width: 1px;
        height: 40px;
        /* Made divider slightly taller */
        background-color: #cbd5e1;
    }

    /* 10. Action Button */
    .r-btn-confirm {
        width: 100%;
        display: block;
        box-sizing: border-box;
        text-decoration: none;
        padding: 20px;
        /* Generous button padding */
        background: #0ea5e9;
        color: #ffffff !important;
        border: none;
        border-radius: 12px;
        font-size: 1.15rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 6px 20px rgba(14, 165, 233, 0.25);
        margin: 0;
    }

    .r-btn-confirm:hover {
        background: #0284c7;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(14, 165, 233, 0.35);
    }

    /* 11. Mobile View adjustments */
    @media (max-width: 850px) {
        .roomy-card {
            flex-direction: column;
            height: auto;
        }

        .roomy-image-pane {
            flex: none;
            height: 250px;
        }

        .roomy-content-pane {
            padding: 30px 25px;
            gap: 25px;
        }

        .r-logistics {
            padding: 15px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .r-divider {
            display: none;
        }
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
    <div class="breadcumb-wrapper mt-5" data-bg-src="images/package_info_back.avif" style="padding: 180px 0 100px; background-size: cover; background-position: center; position: relative; border-radius: 20px; margin: 20px; overflow: hidden; border: 1px solid transparent;">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title text-white fw-bold mb-3"></i>AtlasGo - Packages Info</h1>
                <ul class="breadcumb-menu list-inline text-white">
                    <li class="list-inline-item"><a href="home.php" class="text-white">Home</a></li>
                    <li class="list-inline-item me-2">/</li>
                    <li class="list-inline-item"><a href="packages.php" class="text-white">Package</a></li>
                    <li class="list-inline-item me-2">/</li>
                    <li class="list-inline-item text-white-50">Package Info</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="roomy-wrapper">
        <div class="roomy-card">

            <!-- Left Side: Image -->
            <div class="roomy-image-pane">
                <img src="<?php echo $row['pic']; ?>" alt="Package Image" class="r-img">
                <span class="r-badge"><?php echo $row['type']; ?></span>
            </div>

            <!-- Right Side: Content -->
            <div class="roomy-content-pane">

                <!-- Header (Title & Price) -->
                <div class="r-header">
                    <div class="r-title-wrapper">
                        <h2 class="r-title"><?php echo $row['pname'] ?></h2>
                        <!-- <span class="r-subtitle">Ubud, Indonesia</span> -->
                    </div>
                    <div class="r-price">₹<?php echo $row['price'] ?><span>/ total</span></div>
                </div>

                <!-- Description -->
                <p class="r-description">
                    <?php echo $row['description'] ?>
                </p>

                <!-- Spacious Logistics Row -->
                <div class="r-logistics">
                    <div class="r-log-item">
                        <span class="r-icon">📅</span>
                        <div class="r-log-text">
                            <small>Date</small>
                            <strong><?php echo $row['date'] ?></strong>
                        </div>
                    </div>
                    <div class="r-divider"></div>
                    <div class="r-log-item">
                        <span class="r-icon">⏰</span>
                        <div class="r-log-text">
                            <small>Time [24 hrs]</small>
                            <strong><?php echo $row['time'] ?></strong>
                        </div>
                    </div>
                    <div class="r-divider"></div>
                    <div class="r-log-item">
                        <span class="r-icon">👥</span>
                        <div class="r-log-text">
                            <small>People</small>
                            <strong><?php echo $row['no_of_people'] ?></strong>
                        </div>
                    </div>
                </div>

                <!-- Action Link formatted as a button -->
                <a class="r-btn-confirm text-center" href="addbooking.php?id=<?php echo $row['pid'] ?>" style="display: block; text-decoration: none; box-sizing: border-box;">Start Booking Procedure</a>

            </div>
        </div>
    </div>
</body>

<?php
include('footer.php');
?>