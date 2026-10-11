<?php
include('header.php');

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

include 'connect.php';

$bid = isset($_GET['bid']) ? intval($_GET['bid']) : 0;

// Fetch booking & package details
$query = "SELECT b.*, p.pname, p.pic FROM tbl_booking b 
          JOIN tbl_package p ON b.pid = p.pid 
          WHERE b.bid = $bid AND b.uid = " . intval($_SESSION['userid']);
$res = mysqli_query($con, $query);

if (!$res || mysqli_num_rows($res) == 0) {
    echo "<script>alert('Invalid Booking ID'); window.location.href='home.php';</script>";
    exit();
}

$booking = mysqli_fetch_assoc($res);

// If the selected mode is Pay at Office, redirect immediately to office_pay_info.php
if ($booking['payment_mode'] == 'PAO') {
    echo "<script>window.location.href='office_pay_info.php?bid=" . $bid . "';</script>";
    exit();
}

// Process simulated payment
if (isset($_POST['btnpay'])) {
    $txn_id = "TXN" . rand(10000000, 99999999);
    $updateQuery = "UPDATE tbl_booking SET payment_status = 'Completed' WHERE bid = $bid";

    if (mysqli_query($con, $updateQuery)) {
        echo "<script>
                alert('Payment Successful!');
                window.location.href='booking_success.php?bid=" . $bid . "&txnid=" . $txn_id . "';
              </script>";
        exit();
    } else {
        echo "<script>alert('Payment processing failed. Retry.');</script>";
    }
}
?>

<div style="
    background-color: #303954;
    border: 0px solid transparent;
    width: 100%;
    height: 100px;">
</div>

<div class="booking-wrapper" style="min-height: 80vh; display: flex; align-items: center; justify-content: center; background: #f4f7f6; padding: 40px 20px;">
    <div class="card p-4 shadow-lg" style="max-width: 500px; width: 100%; border-radius: 20px; border: none; background: #ffffff;">
        <div class="text-center mb-3">
            <span style="font-size: 2.5rem;">💳</span>
            <h3 class="fw-bold text-dark mt-2">AtlasGo Payment Gateway</h3>
            <p class="text-muted mb-0">Package: <strong><?php echo htmlspecialchars($booking['pname']); ?></strong></p>
            <small class="text-secondary">Booking ID: #<?php echo $booking['bid']; ?></small>
        </div>

        <div class="bg-light p-3 rounded-3 mb-4 text-center border">
            <small class="text-uppercase text-muted fw-bold d-block mb-1">Total Amount Payable</small>
            <h2 class="text-success fw-bold m-0">₹<?php echo number_format($booking['total_price'], 2); ?></h2>
        </div>

        <form method="post">
            <?php if ($booking['payment_mode'] == 'UPI'): ?>
                <div class="text-center mb-3">
                    <label class="form-label fw-bold text-secondary">Scan QR Code or Enter UPI ID</label>
                    <div class="mb-3 p-2 bg-white rounded border d-inline-block">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=upi://pay?pa=atlasgo@upi&pn=AtlasGo&am=<?php echo $booking['total_price']; ?>" alt="UPI QR" class="img-fluid">
                    </div>
                    <input type="text" class="form-control text-center py-2" placeholder="e.g. username@upi" required style="border-radius: 10px;">
                </div>

            <?php elseif ($booking['payment_mode'] == 'Credit / Debit Card'): ?>
                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary">Card Number</label>
                    <input type="text" class="form-control py-2" placeholder="4532 •••• •••• 8921" maxlength="16" required style="border-radius: 10px;">
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label class="form-label fw-bold text-secondary">Expiry Date</label>
                        <input type="text" class="form-control py-2" placeholder="MM/YY" maxlength="5" required style="border-radius: 10px;">
                    </div>
                    <div class="col-6">
                        <label class="form-label fw-bold text-secondary">CVV</label>
                        <input type="password" class="form-control py-2" placeholder="123" maxlength="3" required style="border-radius: 10px;">
                    </div>
                </div>

            <?php elseif ($booking['payment_mode'] == 'Net Banking'): ?>
                <div class="mb-4">
                    <label class="form-label fw-bold text-secondary">Select Net Banking Bank</label>
                    <select class="form-select py-2" required style="border-radius: 10px;">
                        <option value="" disabled selected>Choose Bank...</option>
                        <option>State Bank of India (SBI)</option>
                        <option>HDFC Bank</option>
                        <option>ICICI Bank</option>
                        <option>Axis Bank</option>
                        <option>Bank of Baroda</option>
                    </select>
                </div>

            <?php else: ?>
                <div class="alert alert-info text-center">
                    <p class="mb-2">You selected <strong>Pay at Office</strong> for this booking.</p>
                    <a href="office_pay_info.php?bid=<?php echo $booking['bid']; ?>" class="btn btn-sm btn-primary">View Office Payment Details</a>
                </div>
            <?php endif; ?>

            <?php if ($booking['payment_mode'] != 'PAO'): ?>
                <button type="submit" name="btnpay" class="btn btn-primary w-100 py-3 fw-bold mt-2" style="border-radius: 12px; background: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%); border: none;">
                    Pay ₹<?php echo number_format($booking['total_price'], 2); ?> Now
                </button>
            <?php endif; ?>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>