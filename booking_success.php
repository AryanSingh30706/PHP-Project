<?php
include('header.php');

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

include 'connect.php';

$bid = isset($_GET['bid']) ? intval($_GET['bid']) : 0;
$txnid = isset($_GET['txnid']) ? htmlspecialchars($_GET['txnid']) : 'N/A';

// Fetch booking & package details including base capacity
$query = "SELECT b.*, p.pname, p.pic, p.no_of_people 
          FROM tbl_booking b 
          JOIN tbl_package p ON b.pid = p.pid 
          WHERE b.bid = $bid AND b.uid = " . intval($_SESSION['userid']);
$res = mysqli_query($con, $query);

if (!$res || mysqli_num_rows($res) == 0) {
    echo "<script>window.location.href='home.php';</script>";
    exit();
}

$booking = mysqli_fetch_assoc($res);

// Calculate dynamic total travelers
$baseAdults = isset($booking['no_of_people']) && intval($booking['no_of_people']) > 0 ? intval($booking['no_of_people']) : 2;
$extraAdults = intval($booking['no_of_adults']);
$kids = intval($booking['no_of_kids']);
$totalAdults = $baseAdults + $extraAdults;

$isPAO = ($booking['payment_mode'] == 'PAO');
?>

<div style="
    background-color: #303954;
    border: 0px solid transparent;
    width: 100%;
    height: 100px;">
</div>

<div class="container my-5 d-flex justify-content-center" style="min-height: 70vh;">
    <div class="card p-4 shadow-sm text-center" style="max-width: 550px; width: 100%; border-radius: 20px; border: 1px solid #e2e8f0; background: #fff;">

        <!-- Icon -->
        <div class="<?php echo $isPAO ? 'text-primary' : 'text-success'; ?> mb-3">
            <?php if ($isPAO): ?>
                <span style="font-size: 3.5rem;">🏢</span>
            <?php else: ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l4.992-5.5a.75.75 0 0 0-.014-1.051z" />
                </svg>
            <?php endif; ?>
        </div>

        <!-- Header -->
        <h2 class="fw-bold text-dark"><?php echo $isPAO ? 'Office Booking Reserved!' : 'Booking Confirmed!'; ?></h2>
        <p class="text-muted mb-4">
            <?php echo $isPAO ? 'Your booking reservation is active. Please complete your payment at our branch office.' : 'Thank you for choosing AtlasGo. Here is your digital booking receipt.'; ?>
        </p>

        <!-- Receipt Card -->
        <div class="bg-light p-3 rounded text-start mb-4 border">
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Transaction ID:</span>
                <strong><?php echo $isPAO ? 'N/A (Pay at Counter)' : $txnid; ?></strong>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Booking Reference:</span>
                <strong>#<?php echo $booking['bid']; ?></strong>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Package Name:</span>
                <strong><?php echo htmlspecialchars($booking['pname']); ?></strong>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Travel Date:</span>
                <strong><?php echo date('d M, Y', strtotime($booking['bdate'])); ?></strong>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Travelers Breakdown:</span>
                <strong>
                    👥 <?php echo $totalAdults; ?> Adults
                    <?php if ($extraAdults > 0): ?><small class="text-muted">(<?php echo $baseAdults; ?> Base + <?php echo $extraAdults; ?> Extra)</small><?php endif; ?>
                    <?php if ($kids > 0): ?> | <?php echo $kids; ?> Kids<?php endif; ?>
                </strong>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Payment Mode:</span>
                <strong class="text-uppercase"><?php echo ($booking['payment_mode'] == 'PAO') ? 'Pay at Office' : htmlspecialchars($booking['payment_mode']); ?></strong>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold"><?php echo $isPAO ? 'Amount Payable at Office:' : 'Total Paid:'; ?></span>
                <span class="fs-4 fw-bold <?php echo $isPAO ? 'text-primary' : 'text-success'; ?>">
                    ₹<?php echo number_format($booking['total_price'], 2); ?>
                </span>
            </div>
        </div>

        <!-- Office Directions (If PAO Selected) -->
        <?php if ($isPAO): ?>
            <div class="p-3 mb-4 rounded text-start" style="background-color: #f0f9ff; border: 1px solid #bae6fd;">
                <h6 class="fw-bold text-primary mb-2">📍 AtlasGo Office Counter</h6>
                <p class="mb-1 text-secondary" style="font-size: 0.88rem;">102, Atlas Tower, Ring Road, Surat, Gujarat - 395007</p>
                <p class="mb-1 text-secondary" style="font-size: 0.88rem;"><strong>Working Hours:</strong> Mon - Sat (10:00 AM - 7:00 PM)</p>
                <p class="mb-0 text-secondary" style="font-size: 0.88rem;"><strong>Contact:</strong> +91 98765 43210 / support@atlasgo.com</p>
            </div>
        <?php endif; ?>

        <!-- Action Buttons -->
        <div class="d-grid gap-2">
            <!-- <button onclick="window.print()" class="btn btn-outline-primary py-2 fw-bold" style="border-radius: 10px;">🖨️ Print Receipt</button> -->
            <a href="booking.php" class="btn btn-primary py-2 fw-bold" style="border-radius: 10px;">View My Bookings</a>
            <a href="home.php" class="btn btn-outline-secondary py-2" style="border-radius: 10px;">Return to Home</a>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>