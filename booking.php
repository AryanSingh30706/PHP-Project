<?php
include('header.php');
include('connect.php');

if (!isset($_SESSION['userid'])) {
    echo "<script>
            alert('Please log in to view your bookings...');
            window.location.href='login.php';
          </script>";
    exit();
} else {
    $userid = $_SESSION['userid'];
}

?>

<style>
    /* Premium Table Styling */
    .booking-card {
        border-radius: 16px;
        border: none;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
        background: #fff;
        overflow: hidden;
    }

    .booking-table {
        margin-bottom: 0;
        width: 100%;
        border-collapse: collapse;
    }

    .booking-table thead th {
        background-color: #f8fafc;
        color: #475569;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        padding: 1.25rem 1.5rem;
        border-bottom: 2px solid #e2e8f0;
    }

    .booking-table tbody td {
        padding: 1.25rem 1.5rem;
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
        color: #64748b;
        font-size: 0.95rem;
    }

    .booking-table tbody tr {
        transition: background-color 0.2s ease;
    }

    .booking-table tbody tr:hover {
        background-color: #fbfcfd;
    }

    .dest-img {
        width: 90px;
        height: 65px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .pkg-name {
        font-weight: 700;
        color: #1e293b;
        font-size: 1.05rem;
        margin-bottom: 0.2rem;
    }

    /* Modern Status Badges */
    .status-badge {
        display: inline-block;
        padding: 0.4rem 1rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-completed {
        background-color: #dcfce7;
        color: #166534;
    }

    .status-processing {
        background-color: #dbeafe;
        color: #1e40af;
    }

    .status-pending {
        background-color: #fef3c7;
        color: #92400e;
    }

    .status-default {
        background-color: #f1f5f9;
        color: #475569;
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
    <div class="breadcumb-wrapper mt-5" data-bg-src="images/booking_back.avif" style="padding: 180px 0 100px; background-size: cover; background-position: center; position: relative; border-radius: 20px; margin: 20px; overflow: hidden; border: 1px solid transparent;">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title text-white fw-bold mb-3"></i>AtlasGo - Destinations</h1>
                <ul class="breadcumb-menu list-inline text-white">
                    <li class="list-inline-item"><a href="home.php" class="text-white">Home</a></li>
                    <li class="list-inline-item me-2">/</li>
                    <li class="list-inline-item active text-white-50">Your Bookings</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Beautiful Bookings Table Section -->
    <div class="container mt-5 mb-5">
        <h3 class="fw-bold mb-4" style="color: #0f172a;">Booking History</h3>

        <div class="booking-card">
            <div class="table-responsive">
                <table class="booking-table">
                    <thead>
                        <tr>
                            <th style="width: 10%;">ID</th>
                            <th style="width: 45%;">Package Details</th>
                            <th style="width: 15%;">Booking Date</th>
                            <th style="width: 15%;">Payment Mode</th>
                            <th style="width: 15%; text-align: center;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch bookings for the logged-in user by joining tbl_booking and tbl_package
                        $query = "SELECT b.bid, b.bdate, b.payment_mode, b.payment_status, p.pname, p.pic 
                                  FROM tbl_booking b 
                                  JOIN tbl_package p ON b.pid = p.pid 
                                  WHERE b.uid = '$userid' 
                                  ORDER BY b.bid DESC";

                        // Notice: using $con to match your database connection variable
                        $result = mysqli_query($con, $query);

                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;

                            while ($row = mysqli_fetch_assoc($result)) {
                                // Assign beautiful badge classes based on status
                                $status = trim(strtolower($row['payment_status']));
                                if ($status == 'completed') {
                                    $badgeClass = 'status-completed';
                                } elseif ($status == 'processing') {
                                    $badgeClass = 'status-processing';
                                } elseif ($status == 'pending') {
                                    $badgeClass = 'status-pending';
                                } else {
                                    $badgeClass = 'status-default';
                                }

                                // Ensure status text is not empty
                                $displayStatus = !empty($row['payment_status']) ? htmlspecialchars($row['payment_status']) : 'Unknown';

                                echo "<tr>";

                                // Booking ID
                                echo "<td class='fw-bold' style='color: #94a3b8;'>#" . $i++ . "</td>";

                                // Package Details (Image + Name)
                                echo "<td>
                                        <div class='d-flex align-items-center'>
                                            <img src='" . htmlspecialchars($row['pic']) . "' alt='Destination' class='dest-img me-3'>
                                            <div>
                                                <div class='pkg-name'>" . htmlspecialchars($row['pname']) . "</div>
                                            </div>
                                        </div>
                                      </td>";

                                // Date
                                echo "<td><i class='fa-regular fa-calendar me-2' style='color: #94a3b8;'></i>" . date('d M, Y', strtotime($row['bdate'])) . "</td>";

                                // Payment Mode
                                echo "<td class='text-uppercase fw-bold' style='color: #64748b; font-size: 0.85rem;'><i class='fa-solid fa-wallet me-2' style='color: #94a3b8;'></i>" . htmlspecialchars($row['payment_mode']) . "</td>";

                                // Status Badge
                                echo "<td class='text-center'><span class='status-badge " . $badgeClass . "'>" . $displayStatus . "</span></td>";

                                echo "</tr>";
                            }
                        } else {
                            // Display message if user has no bookings
                            echo "<tr>
                                    <td colspan='5' class='text-center py-5'>
                                        <h5 style='color: #64748b;'>No bookings found.</h5>
                                        <p class='text-muted mb-4'>Looks like you haven't booked any packages yet.</p>
                                        <a href='packages.php' class='btn btn-primary px-4 py-2 rounded-pill' style='background-color: #3b82f6; border: none; font-weight: 600;'>Start Exploring</a>
                                    </td>
                                  </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<?php
include('footer.php');
?>