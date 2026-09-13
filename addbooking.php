<?php
include('header.php');
if (!isset($_SESSION['userid'])) {
    echo "<script>
            alert('Please log in to confirm your booking.');
            window.location.href='login.php';
          </script>";
    exit();
} else {
    $userid = $_SESSION['userid'];
}
$id = $_GET['id'];
include 'connect.php';
$query = "SELECT * FROM tbl_package WHERE pid=$id";
$res = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($res);
?>

<style>
    /* Fixed Info Display Row */
    .info-display-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f8fafc;
        padding: 16px 20px;
        border-radius: 12px;
        margin-bottom: 22px;
        border: 1px solid #e2e8f0;
    }

    .info-block {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .info-icon {
        font-size: 1.4rem;
    }

    .info-text {
        display: flex;
        flex-direction: column;
    }

    .info-text small {
        font-size: 0.7rem;
        color: #64748b;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 0.5px;
        margin-bottom: 2px;
    }

    .info-text strong {
        font-size: 0.95rem;
        color: #0f172a;
        font-weight: 700;
    }

    .info-divider {
        width: 1px;
        height: 30px;
        background-color: #cbd5e1;
    }

    /* Container */
    .booking-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 60px 20px;
        font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f7f6;
    }

    /* Main Card - MADE BROADER */
    .booking-card-modern {
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        width: 100%;
        max-width: 550px;
        /* INCREASED from 460px for a more spacious layout */
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #f8fafc;
    }

    .booking-card-modern:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.12);
    }

    /* Image Header - MADE SLIGHTLY TALLER TO MATCH WIDTH */
    .card-header-img {
        position: relative;
        height: 270px;
        /* INCREASED from 240px to maintain beautiful proportions */
        width: 100%;
    }

    .card-header-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Inner shadow to blend image into the white card */
    .card-header-img::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 45px;
        background: linear-gradient(to top, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0));
    }

    /* Floating Badge */
    .badge-overlay {
        position: absolute;
        top: 24px;
        right: 24px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(8px);
        color: #0284c7;
        padding: 8px 18px;
        border-radius: 30px;
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        z-index: 2;
    }

    /* Card Body - ADDED MORE BREATHING ROOM */
    .card-body-modern {
        padding: 15px 45px 45px 45px;
        /* Wider padding to match the broader card */
    }

    /* Title and Price Layout */
    .title-price-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }

    .title-wrapper {
        flex: 1;
    }

    .pkg-title {
        margin: 0;
        font-size: 1.6rem;
        /* Slightly larger text */
        color: #0f172a;
        font-weight: 800;
        line-height: 1.2;
    }

    .pkg-id {
        color: #64748b;
        font-size: 0.85rem;
        margin-top: 6px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .pkg-price {
        color: #059669;
        font-size: 2.1rem;
        font-weight: 800;
        display: flex;
        align-items: flex-start;
        line-height: 1;
    }

    .pkg-price .currency {
        font-size: 1.05rem;
        margin-top: 4px;
        font-weight: 700;
        margin-right: 2px;
    }

    .pkg-price .decimals {
        font-size: 1.05rem;
        margin-top: 4px;
        font-weight: 700;
    }

    /* Form Styles */
    .modern-form .input-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .modern-form .input-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 22px;
    }

    .modern-form label {
        font-size: 0.8rem;
        color: #64748b;
        font-weight: 700;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Apply soft-fill style to BOTH inputs and selects */
    .modern-form input,
    .modern-form select {
        background: #f1f5f9;
        border: 2px solid transparent;
        border-radius: 12px;
        padding: 14px 16px;
        font-size: 1.05rem;
        color: #0f172a;
        font-weight: 500;
        font-family: inherit;
        transition: all 0.25s ease;
        box-sizing: border-box;
        width: 100%;
        cursor: pointer;
        appearance: none;
        /* Removes default ugly browser styling */

        /* Adds a custom, clean dropdown arrow */
        background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%2364748b%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E");
        background-repeat: no-repeat;
        background-position: right 16px top 50%;
        background-size: 12px auto;
    }

    /* Soft focus effect for BOTH inputs and selects */
    .modern-form input:focus,
    .modern-form select:focus {
        background: #ffffff;
        border-color: #0ea5e9;
        box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.15);
        outline: none;
    }

    /* Gradient Button */
    .btn-modern {
        width: 100%;
        padding: 18px;
        /* Slightly taller button */
        background: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%);
        border: none;
        color: #ffffff;
        font-weight: 800;
        font-size: 1.15rem;
        border-radius: 12px;
        cursor: pointer;
        box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2);
        transition: all 0.3s ease;
        margin-top: 15px;
        letter-spacing: 0.5px;
    }

    .btn-modern:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(37, 99, 235, 0.3);
        background: linear-gradient(135deg, #0284c7 0%, #1d4ed8 100%);
    }

    .btn-modern:active {
        transform: translateY(1px);
        box-shadow: 0 5px 10px rgba(37, 99, 235, 0.2);
    }

    /* Mobile Responsiveness */
    @media (max-width: 600px) {
        .modern-form .input-row {
            grid-template-columns: 1fr;
            /* Stacks date and time fields on very small screens */
            gap: 0;
        }

        .card-body-modern {
            padding: 15px 25px 30px 25px;
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
    <div class="breadcumb-wrapper mt-5" data-bg-src="images/package_back.avif" style="padding: 180px 0 100px; background-size: cover; background-position: center; position: relative; border-radius: 20px; margin: 20px; overflow: hidden; border: 1px solid transparent;">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title text-white fw-bold mb-3"></i>AtlasGo - Packages</h1>
                <ul class="breadcumb-menu list-inline text-white">
                    <li class="list-inline-item"><a href="home.php" class="text-white">Home</a></li>
                    <li class="list-inline-item me-2">/</li>
                    <li class="list-inline-item"><a href="packages.php" class="text-white">Packages</a></li>
                    <li class="list-inline-item me-2">/</li>
                    <li class="list-inline-item text-white-50">Bookings</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col-12" style="width: 700px;">

                <div class="card" style="padding: 8px;margin-top: 20px;">
                    <img style="height: 500px;border: 1px solid none;border-radius: 15px;" src="<?= $row['pic'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Package: <?= $row['pname'] ?> - <?= $row['type'] ?></h4>
                        <h6 class="card-title">Price: <?= $row['price'] ?></h6>
                        <form action="" method="post">
                            <input class="form-control form-control-lg mb-4" type="date" name="txtdate">
                            <input class="form-control form-control-lg mb-4" type="time" name="txttime">
                            <input class="form-control form-control-lg mb-4" type="number" name="txtnokids">

                            <button type="submit" class="btn btn-primary" name="btnsubmit">Confirm Booking</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div> -->

    <!-- Main Booking Section -->
    <div class="booking-wrapper">
        <div class="booking-card-modern">

            <!-- Image Header with Floating Badge -->
            <div class="card-header-img">
                <img src="<?php echo $row['pic'] ?>">
                <span class="badge-overlay"><?php echo $row['type'] ?></span>
            </div>

            <div class="card-body-modern">

                <!-- Title & Price Row -->
                <div class="title-price-row">
                    <div class="title-wrapper">
                        <h2 class="pkg-title"><?php echo $row['pname'] ?></h2>
                        <div class="pkg-id">Package ID: #<?php echo $row['pid'] ?></div>
                    </div>
                    <div class="pkg-price">
                        <span class="currency">₹</span><?php echo $row['price'] ?><span class="decimals">.00</span>
                    </div>
                </div>

                <!-- Modern Booking Form -->
                <form action="" method="post" class="modern-form">

                    <div class="info-display-row">
                        <div class="info-block">
                            <span class="info-icon">📅</span>
                            <div class="info-text">
                                <small>Date</small>
                                <!-- Tip: Replace with $row['date'] -->
                                <strong><?php echo $row['date'] ?></strong>
                            </div>
                        </div>

                        <div class="info-divider"></div>

                        <div class="info-block">
                            <span class="info-icon">⏰</span>
                            <div class="info-text">
                                <small>Time [24 Hrs]</small>
                                <strong><?php echo $row['time'] ?></strong>
                            </div>
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="txtnokids">Number of Kids</label>
                        <input type="number" id="txtnokids" name="txtnokids" min="0" value="0" required>
                    </div>

                    <!-- Payment Mode Selection -->
                    <div class="input-group">
                        <label for="payment_mode">Payment Mode</label>
                        <select id="payment_mode" name="payment_mode" required>
                            <option value="" disabled selected>Choose a payment method...</option>
                            <option value="UPI">UPI</option>
                            <option value="Net Banking">Net banking</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-modern" name="btnsubmit">
                        Confirm Booking
                    </button>
                </form>

            </div>
        </div>
    </div>

</body>


<?php
include('footer.php');
?>

<?php
if (isset($_POST['btnsubmit'])) {
    $date = $row['date'];
    $kids = $_POST['txtnokids'];
    $mode = $_POST['payment_mode'];

    $query = "INSERT INTO `tbl_booking` (`bid`, `pid`, `uid`, `bdate`, `payment_mode`, `payment_status`, `no_of_kids`) VALUES 
                                        (NULL, '$id', '$userid', '$date', '$mode', 'pending', '$kids')";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo "<script>alert('Your Package is booking successfully!!!')
        window.location.href='home.php'</script>";
    } else {
        echo "<script>alert('Something went wrong retry')</script>";
    }
} ?>