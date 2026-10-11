<?php
include('header.php');

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

include 'connect.php';

$bid = isset($_GET['bid']) ? intval($_GET['bid']) : 0;

$query = "SELECT b.*, p.pname, p.pic FROM tbl_booking b 
          JOIN tbl_package p ON b.pid = p.pid 
          WHERE b.bid = $bid AND b.uid = " . intval($_SESSION['userid']);
$res = mysqli_query($con, $query);

if (!$res || mysqli_num_rows($res) == 0) {
    echo "<script>window.location.href='home.php';</script>";
    exit();
}

$booking = mysqli_fetch_assoc($res);
?>

<div style="background-color: #303954; border: 0px solid transparent; width: 100%; height: 100px;"></div>

<div class="container my-5 d-flex justify-content-center" style="min-height: 70vh;">
    <div class="card p-4 shadow-sm text-center" style="max-width: 550px; width: 100%; border-radius: 20px; border: 1px solid #e2e8f0; background: #fff;">
        <div class="text-primary mb-3">
            <span style="font-size: 3.5rem;">🏢</span>
        </div>
        <h2 class="fw-bold text-dark">Office Payment Reserved!</h2>
        <p class="text-muted mb-4">Your booking reference is active. Please visit our branch office to complete payment and collect your confirmed ticket.</p>

        <div class="bg-light p-3 rounded text-start mb-4 border">
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Booking Reference:</span>
                <strong>#<?php echo $booking['bid']; ?></strong>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Package:</span>
                <strong><?php echo htmlspecialchars($booking['pname']); ?></strong>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Travel Date:</span>
                <strong><?php echo date('d M, Y', strtotime($booking['bdate'])); ?></strong>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Travelers Add-ons:</span>
                <strong><?php echo $booking['no_of_adults']; ?> Extra Adults / <?php echo $booking['no_of_kids']; ?> Kids</strong>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold">Amount Payable at Counter:</span>
                <span class="fs-4 fw-bold text-primary">₹<?php echo number_format($booking['total_price'], 2); ?></span>
            </div>
        </div>

        <!-- Branch Address -->
        <div class="p-3 mb-4 rounded text-start" style="background-color: #f0f9ff; border: 1px solid #bae6fd;">
            <h6 class="fw-bold text-primary mb-2">📍 AtlasGo Head Office</h6>
            <p class="mb-1 text-secondary" style="font-size: 0.9rem;">102, Atlas Tower, Ring Road, Surat, Gujarat - 395007</p>
            <p class="mb-1 text-secondary" style="font-size: 0.9rem;"><strong>Working Hours:</strong> Mon - Sat (10:00 AM - 7:00 PM)</p>
            <p class="mb-0 text-secondary" style="font-size: 0.9rem;"><strong>Contact:</strong> +91 98765 43210 / support@atlasgo.com</p>
        </div>

        <div class="d-grid gap-2">
            <!-- <button onclick="window.print()" class="btn btn-outline-primary py-2 fw-bold" style="border-radius: 10px;">🖨️ Print Details</button> -->
            <a href="booking.php" class="btn btn-primary py-2 fw-bold" style="border-radius: 10px;">View My Bookings</a>
            <a href="home.php" class="btn btn-outline-secondary py-2" style="border-radius: 10px;">Return to Home</a>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>