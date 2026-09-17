<?php
include('admin_header.php');
include('connect.php');

// 1. UPDATE LOGIC MOVED TO TOP (So it updates before displaying the table)
if (isset($_POST['btn_update'])) {
    $status = $_POST['status'];
    $bid = $_POST['bid']; // Fetched from the hidden input

    $query = "UPDATE `tbl_booking` SET `payment_status` = '$status' WHERE `bid` = '$bid'";
    $res = mysqli_query($con, $query);

    if ($res) {
        echo "<script>alert('Payment Status Updated!!')</script>";
    } else {
        echo "<script>alert('Something went wrong!!')</script>";
    }
}

// 2. FETCH DATA
$query = "SELECT b.*,p.pname,u.user_name FROM `tbl_booking` as b, tbl_package as p,tbl_user as u WHERE b.pid=p.pid AND b.uid=u.user_id";
$res = mysqli_query($con, $query);

$count = mysqli_num_rows($res);

$user = array();
if ($count > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $user[] = $row;
    }
}
?>

<div class="container">
    <div class="card">
        <div class="card-body" style="display: flex;justify-content: space-between;align-items: center;">
            <h2>Total Bookings</h2>
            <!-- <a href="admin_add_destination.php" class="btn btn-primary"><i class="fa-solid fa-plus fa-sm" style="color: rgb(255, 255, 255);"></i> Add New Destination</a> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-primary table-hover">
                    <thead>
                        <tr>
                            <th scope="col">BID</th>
                            <th scope="col">PACK. NAME</th>
                            <th scope="col">Username</th>
                            <th scope="col">B_DATE</th>
                            <th scope="col">PAYMENT MODE</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">KIDS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($user as $u) {
                        ?>
                            <tr class="">
                                <td scope="row"><?php echo $i++  ?></td>
                                <td><?php echo $u['pname'] ?></td>
                                <td><?php echo $u['user_name'] ?></td>
                                <td><?php echo $u['bdate'] ?></td>
                                <td><?php echo $u['payment_mode'] ?></td>
                                <td>
                                    <form action="" method="post" class="d-flex align-items-center">
                                        <input type="hidden" name="bid" value="<?php echo $u['bid']; ?>">

                                        <?php
                                        // 1. Determine the color based on the status (converted to lowercase to be safe)
                                        $status_color = 'gray'; // Default color
                                        $current_status = strtolower($u['payment_status']);

                                        if ($current_status == 'pending') {
                                            $status_color = 'red'; // Red
                                        } elseif ($current_status == 'processing') {
                                            $status_color = 'yellow'; // Yellow/Orange
                                        } elseif ($current_status == 'completed') {
                                            $status_color = 'green'; // Green
                                        }
                                        ?>

                                        <!-- 2. Display the colored dot -->
                                        <span style="display: inline-block; width: 12px; height: 12px; border-radius: 50%; background-color: <?php echo $status_color; ?>; margin-right: 8px;"></span>

                                        <!-- 3. The Select Box -->
                                        <select name="status" class="form-control me-2" style="width:120px;">
                                            <option value="<?php echo $u['payment_status'] ?>" hidden selected><?php echo $u['payment_status'] ?></option>
                                            <option value="Pending">Pending</option>
                                            <option value="Processing">Processing</option>
                                            <option value="Completed">Completed</option>
                                        </select>

                                        <!-- 4. Update Button -->
                                        <button type="submit" name="btn_update" class="btn btn-warning ms-1"><i class="fa-solid fa-arrow-up-from-bracket"></i></button>
                                    </form>
                                </td>
                                <td><?php echo $u['no_of_kids'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include('admin_footer.php');
?>