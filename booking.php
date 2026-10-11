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
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        padding: 1.25rem 1.25rem;
        border-bottom: 2px solid #e2e8f0;
    }

    .booking-table tbody td {
        padding: 1.25rem 1.25rem;
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
        width: 100px !important;
        min-width: 100px !important;
        height: 100px !important;
        min-height: 100px !important;
        max-height: 100px !important;
        object-fit: cover !important;
        border-radius: 8px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        flex-shrink: 0 !important;
        /* Prevents image stretching when package title wraps */
    }

    .pkg-name {
        font-weight: 700;
        color: #1e293b;
        font-size: 1rem;
        margin-bottom: 0.1rem;
    }

    .travelers-info {
        font-size: 0.82rem;
        color: #64748b;
    }

    /* Modern Status Badges */
    .status-badge {
        display: inline-block;
        padding: 0.4rem 0.9rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.72rem;
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

    /* Action Buttons Styling */
    .btn-action-pay {
        display: inline-block;
        padding: 6px 14px;
        background: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%);
        color: #ffffff !important;
        font-weight: 700;
        font-size: 0.8rem;
        border-radius: 8px;
        text-decoration: none;
        box-shadow: 0 2px 8px rgba(37, 99, 235, 0.2);
        transition: all 0.2s ease;
    }

    .btn-action-pay:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }

    .btn-action-receipt {
        display: inline-block;
        width: 100%;
        text-align: center;
        padding: 6px 14px;
        background-color: #f1f5f9;
        color: #334155 !important;
        font-weight: 700;
        font-size: 0.8rem;
        border-radius: 8px;
        border: 1px solid #cbd5e1;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .btn-action-receipt:hover {
        background-color: #e2e8f0;
        color: #0f172a !important;
    }

    .btn-action-cancel {
        display: inline-block;
        padding: 6px 12px;
        background-color: #fef2f2;
        color: #dc2626 !important;
        font-weight: 600;
        font-size: 0.8rem;
        border-radius: 8px;
        border: 1px solid #fecaca;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .btn-action-cancel:hover {
        background-color: #fee2e2;
        color: #b91c1c !important;
    }
</style>

<body>

    <div style="background-color: #303954; border: 0px solid transparent; width: 100%; height: 100px;"></div>

    <!-- Hero Banner -->
    <div class="breadcumb-wrapper mt-5" data-bg-src="images/booking_back.avif" style="padding: 180px 0 100px; background-size: cover; background-position: center; position: relative; border-radius: 20px; margin: 20px; overflow: hidden; border: 1px solid transparent;">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title text-white fw-bold mb-3">AtlasGo - Destinations</h1>
                <ul class="breadcumb-menu list-inline text-white">
                    <li class="list-inline-item"><a href="home.php" class="text-white">Home</a></li>
                    <li class="list-inline-item me-2">/</li>
                    <li class="list-inline-item active text-white-50">Your Bookings</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bookings Table Section -->
    <div class="container mt-5 mb-5" style="min-height: 60vh;">
        <h3 class="fw-bold mb-4" style="color: #0f172a;">Booking History</h3>

        <div class="booking-card">
            <div class="table-responsive">
                <table class="booking-table">
                    <thead>
                        <tr>
                            <th style="width: 2%;text-align: center;">ID</th>
                            <th style="width: 35%;text-align: center;">Package Details</th>
                            <th style="width: 15%;text-align: center;">Booking Date</th>
                            <th style="width: 13%;text-align: center;">Total Price</th>
                            <th style="width: 12%;text-align: center;">Payment Mode</th>
                            <th style="width: 8%; text-align: center;">Status</th>
                            <th style="width: 10%; text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT b.bid, b.bdate, b.payment_mode, b.payment_status, b.no_of_kids, b.no_of_adults, b.total_price, 
                                         p.pname, p.pic, p.no_of_people, p.price AS base_price 
                                  FROM tbl_booking b 
                                  JOIN tbl_package p ON b.pid = p.pid 
                                  WHERE b.uid = '$userid' 
                                  ORDER BY b.bid DESC";

                        $result = mysqli_query($con, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            $i = 1;

                            while ($row = mysqli_fetch_assoc($result)) {
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

                                $displayStatus = !empty($row['payment_status']) ? htmlspecialchars($row['payment_status']) : 'Unknown';

                                $baseAdults = isset($row['no_of_people']) && intval($row['no_of_people']) > 0 ? intval($row['no_of_people']) : 2;
                                $extraAdults = isset($row['no_of_adults']) ? intval($row['no_of_adults']) : 0;
                                $kids = isset($row['no_of_kids']) ? intval($row['no_of_kids']) : 0;
                                $totalAdults = $baseAdults + $extraAdults;

                                if ($extraAdults > 0) {
                                    $adultText = "👥 <strong>{$totalAdults} Adults</strong> ({$baseAdults} Base + {$extraAdults} Extra)";
                                } else {
                                    $adultText = "👥 <strong>{$baseAdults} Adult" . ($baseAdults > 1 ? "s" : "") . "</strong> (Default Base Package)";
                                }

                                $kidsText = ($kids > 0) ? " &#124;  <strong>{$kids} Kids</strong>" : " &#124;  No Kids";

                                $totalPrice = isset($row['total_price']) && floatval($row['total_price']) > 0 ? floatval($row['total_price']) : floatval($row['base_price']);

                                echo "<tr>";

                                // ID
                                echo "<td class='fw-bold' style='color: #94a3b8;'>#" . $i++ . "</td>";

                                // Package Details
                                echo "<td>
                                        <div class='d-flex align-items-center'>
                                            <img src='" . htmlspecialchars($row['pic']) . "' alt='Destination' class='dest-img me-3'>
                                            <div>
                                                <div class='pkg-name'>" . htmlspecialchars($row['pname']) . "</div>
                                                <div class='travelers-info'>" . $adultText . $kidsText . "</div>
                                            </div>
                                        </div>
                                      </td>";

                                // Booking Date
                                echo "<td><i class='fa-regular fa-calendar me-2' style='color: #94a3b8;'></i>" . date('d M, Y', strtotime($row['bdate'])) . "</td>";

                                // Total Price
                                echo "<td class='fw-bold text-success'>₹" . number_format($totalPrice, 2) . "</td>";

                                // Payment Mode
                                echo "<td class='text-uppercase fw-bold' style='color: #64748b; font-size: 0.85rem;'><i class='fa-solid fa-wallet me-2' style='color: #94a3b8;'></i>" . htmlspecialchars($row['payment_mode']) . "</td>";

                                // Status Badge
                                echo "<td class='text-center'><span class='status-badge " . $badgeClass . "'>" . $displayStatus . "</span></td>";

                                // Action Buttons
                                echo "<td class='text-end' style='white-space: nowrap;'>";
                                if ($status == 'completed') {
                                    echo "<a href='booking_success.php?bid=" . $row['bid'] . "' class='btn-action-receipt'>Receipt</a>";
                                } else {
                                    echo "<a href='checkout.php?bid=" . $row['bid'] . "' class='btn-action-pay me-1'>Pay Now</a>";
                                    echo "<a href='cancel_booking.php?bid=" . $row['bid'] . "' class='btn-action-cancel' onclick=\"return confirm('Are you sure you want to cancel this booking?')\">Cancel</a>";
                                }
                                echo "</td>";

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr>
                                    <td colspan='7' class='text-center py-5'>
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

<?php include('footer.php'); ?>