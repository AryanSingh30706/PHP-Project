<?php
include("admin_header.php");
include("connect.php");

// FIXED: Added intval() to prevent SQL injection hacks from the URL
$id = intval($_GET['id']);
$query = "SELECT * FROM tbl_package WHERE pid = $id";
$r = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($r);

if (isset($_POST['btnAdd'])) {
    $pack_name = strtoupper($_POST['txt_pack_name']);
    $dest_name = $_POST['txt_dest_name'];

    $tmp_pack_pic = isset($_FILES['txt_pack_pic']['tmp_name']) ? $_FILES['txt_pack_pic']['tmp_name'] : '';
    $name = isset($_FILES['txt_pack_pic']['name']) ? $_FILES['txt_pack_pic']['name'] : '';

    $pack_type = $_POST['txt_pack_type'];
    $pack_price = $_POST['txt_pack_price'];
    $desc = $_POST['txt_desc'];
    $people = $_POST['txt_people'];
    $start_date = $_POST['start_date'];
    $start_time = $_POST['start_time'];
    $error = "";

    // Handle image upload logic
    if (empty($name)) {
        $name = $row['pic'];
    } else {
        $name = "uploads/" . $name;
    }

    // Validation
    if (empty(trim($pack_name))) {
        $error = "Enter Package name";
    } else if (empty(trim($dest_name))) {
        $error = "Enter Destination name";
    } else if (empty(trim($pack_type)) || $pack_type == '#') { // FIXED: checks if default '#' is selected
        $error = "Enter Package type";
    } elseif (empty(trim($pack_price))) {
        $error = "Enter Package price";
    } else if (empty(trim($desc))) {
        $error = "Enter Description";
    } else if (empty(trim($people))) {
        $error = "Enter number of people";
    } elseif (empty(trim($start_date))) {
        $error = "Enter Start Date";
    } else if (empty(trim($start_time))) {
        $error = "Enter Start Time";
    }

    if (!empty($error)) {
        echo "<script>
                Swal.fire({ 
                icon: 'error',
                title: 'Oops...',
                text: '" . $error . "',
                });
            </script>";
    } else {
        $query = "UPDATE `tbl_package` SET `pname` = '$pack_name', `pic` = '$name', `type` = '$pack_type', `price` = '$pack_price', `description` = '$desc', `no_of_people` = '$people', `date` = '$start_date', `time` = '$start_time' WHERE `tbl_package`.`pid` = $id";

        $res = mysqli_query($con, $query);
        if ($res) {
            if (!empty($tmp_pack_pic)) {
                move_uploaded_file($tmp_pack_pic, $name);
            }
            echo "<script>window.location.href='admin_show_package.php'</script>";
        } else {
            echo "<script>alert('Error updating database');</script>";
        }
    }
}

function get_val($field, $row)
{
    return isset($_POST[$field]) ? htmlspecialchars($_POST[$field]) : htmlspecialchars($row);
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <h1>Package Management</h1>
    <p class="lead">Create, View and Manage tour packages for <b>AtlasGo</b></p>

    <div class="card">
        <div class="card-body">
            <b>
                <h3 class="">Update Tour Package</h3>
            </b>
            <br>

            <div class="row id-name">
                <div class="col">
                    <h5 class="card-title">Package Name</h5>
                    <!-- FIXED: Actually using the get_val function now -->
                    <input class="form-control form-control-lg mb-4" type="text" name="txt_pack_name" value="<?php echo get_val('txt_pack_name', $row['pname']); ?>">
                </div>
            </div>

            <div class="row did-image">
                <div class="col-6">
                    <h5 class="card-title">Destination ID</h5>
                    <!-- FIXED -->
                    <input class="form-control form-control mb-4" name="txt_dest_name" type="number" value="<?php echo get_val('txt_dest_name', $row['did']); ?>">
                </div>
                <div class="col-6">
                    <h5 class="card-title">Destination Picture</h5>
                    <div class="mb-5">
                        <input class="form-control" type="file" name="txt_pack_pic" id="formFile">
                        <small>Current Image: <?php echo $row['pic']; ?></small>
                    </div>
                </div>
            </div>

            <div class="row type-price">
                <div class="col-6">
                    <h5 class="card-title">Type of Package</h5>
                    <?php
                    // Get the value and make it lowercase with no extra spaces for a safe comparison
                    $raw_type = isset($_POST['txt_pack_type']) ? $_POST['txt_pack_type'] : (isset($row['type']) ? $row['type'] : '');
                    $safe_type = strtolower(trim($raw_type));
                    ?>
                    <select name="txt_pack_type" id="" class="form-control form-control-lg mb-4">
                        <option value="#" <?php if (empty($safe_type) || $safe_type == '#') echo 'selected'; ?>>Select package type</option>
                        <option value="Domestic" <?php if ($safe_type == 'domestic') echo 'selected'; ?>>Domestic</option>
                        <option value="International" <?php if ($safe_type == 'international') echo 'selected'; ?>>International</option>
                    </select>
                </div>
                <div class="col-6">
                    <h5 class="card-title">Package Price</h5>
                    <!-- FIXED -->
                    <input class="form-control form-control-lg mb-4" name="txt_pack_price" type="number" value="<?php echo get_val('txt_pack_price', $row['price']); ?>">
                </div>
            </div>

            <div class="row description">
                <div class="col">
                    <h5 class="card-title">Description</h5>
                    <div class="form-floating">
                        <!-- FIXED -->
                        <textarea class="form-control mb-5" name="txt_desc" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?php echo get_val('txt_desc', $row['description']); ?></textarea>
                    </div>
                </div>
            </div>

            <!-- FIXED: Grid columns changed to 4-4-4 so they equal 12. Button moved to its own 12-col row. -->
            <div class="row people-date-time">
                <div class="col-4">
                    <h5 class="card-title">Number of People</h5>
                    <input class="form-control form-control-lg mb-4" name="txt_people" type="number" value="<?php echo get_val('txt_people', $row['no_of_people']); ?>">
                </div>
                <div class="col-4">
                    <h5 class="card-title">Starting Date</h5>
                    <input
                        class="form-control form-control-lg mb-4"
                        name="start_date"
                        type="date"
                        value="<?php echo get_val('start_date', $row['date']); ?>"
                        min="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="col-4">
                    <h5 class="card-title">Starting Time</h5>
                    <input class="form-control form-control-lg mb-4" name="start_time" type="time" value="<?php echo get_val('start_time', $row['time']); ?>">
                </div>
                <div class="col-12 mt-2">
                    <button type="submit" class="btn btn-success" name="btnAdd">Save Destination</button>
                    <a href="admin_show_package.php" class="btn btn-warning">Back</a>
                </div>
            </div>

        </div>
    </div>
</form>

<?php
include("admin_footer.php");
?>