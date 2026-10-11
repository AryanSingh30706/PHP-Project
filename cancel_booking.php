<?php
session_start();
include 'connect.php';

// Check if user is logged in
if (!isset($_SESSION['userid'])) {
    echo "<script>
            alert('Please log in first.');
            window.location.href='login.php';
          </script>";
    exit();
}

$bid = isset($_GET['bid']) ? intval($_GET['bid']) : 0;
$userid = intval($_SESSION['userid']);

if ($bid > 0) {
    // Check if the booking exists, belongs to the logged-in user, and is not already completed
    $checkQuery = "SELECT * FROM tbl_booking WHERE bid = $bid AND uid = $userid";
    $checkRes = mysqli_query($con, $checkQuery);

    if ($checkRes && mysqli_num_rows($checkRes) > 0) {
        $booking = mysqli_fetch_assoc($checkRes);
        $status = strtolower(trim($booking['payment_status']));

        // Prevent cancelling completed bookings as a safeguard
        if ($status == 'completed') {
            echo "<script>
                    alert('Completed bookings cannot be cancelled directly. Please contact support.');
                    window.location.href='booking.php';
                  </script>";
            exit();
        }

        // Execute deletion for pending/office pay bookings
        $deleteQuery = "DELETE FROM tbl_booking WHERE bid = $bid AND uid = $userid";
        
        if (mysqli_query($con, $deleteQuery)) {
            echo "<script>
                    alert('Booking #$bid has been cancelled successfully.');
                    window.location.href='booking.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error cancelling booking: " . mysqli_error($con) . "');
                    window.location.href='booking.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Invalid booking request or unauthorized action.');
                window.location.href='booking.php';
              </script>";
    }
} else {
    header("Location: booking.php");
    exit();
}
?>
