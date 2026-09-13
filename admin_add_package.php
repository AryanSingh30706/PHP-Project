<?php
include("admin_header.php");
include("connect.php");
$query = "select * from tbl_destination";
$res = mysqli_query($con, $query);

$count = 0;
$count = mysqli_num_rows($res);

$dest = array();
if ($count > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $dest[] = $row;
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

if (isset($_POST['btnAdd'])) {
    $pack_name = mysqli_real_escape_string($con, $_POST['txt_pack_name']);
    $pack_name = strtoupper($pack_name);

    $dest_name = $_POST['txt_dest_name'];

    $tmp_pack_pic = $_FILES['txt_pack_pic']['tmp_name'];
    $name = $_FILES['txt_pack_pic']['name'];
    $name = "uploads/" . $name;

    $pack_type = $_POST['txt_pack_type'];
    $pack_price = $_POST['txt_pack_price'];
    $desc = mysqli_real_escape_string($con, $_POST['txt_desc']);
    $people = $_POST['txt_people'];
    $start_date = $_POST['start_date'];
    $start_time = $_POST['start_time'];
    $error = "";


    if (empty(trim($pack_name))) {
        $error = "Enter Package name";
    } else if (empty(trim($dest_name))) {
        $error = $error . "Enter Destination name";
    } else if (empty(trim($name))) {
        $error = $error . "Select Destination picture";
    } else if (empty(trim($pack_type))) {
        $error = $error . "Enter Package type";
    } elseif (empty(trim($pack_price))) {
        $error = $error . "Enter Package price";
    } else if (empty(trim($desc))) {
        $error = $error . "Enter Description";
    } else if (empty(trim($people))) {
        $error = $error . "Enter number of people";
    } elseif (empty(trim($start_date))) {
        $error = $error . "Enter Start Date";
    } else if (empty(trim($start_time))) {
        $error = $error . "Enter Start Time";
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
        $query = "INSERT INTO `tbl_package` (`pid`, `pname`, `did`, `pic`, `type`, `price`, `description`, `no_of_people`, `date`, `time`) VALUES (NULL, '$pack_name', '$dest_name', '$name', '$pack_type', '$pack_price', '$desc', '$people', '$start_date', '$start_time')";

        $res = mysqli_query($con, $query);
        if ($res > 0) {
            move_uploaded_file($tmp_pack_pic, $name);
            echo "<script>window.location.href='admin_show_package.php'</script>";
        }
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <h1>Package Management</h1>
    <p class="lead">Create, View and Manage tour packages for <b>AtlasGo</b></p>

    <div class="card">
        <div class="card-body">
            <b>
                <h3 class="">Add New Tour Package</h3>
            </b>
            <br>

            <div class="row id-name">
                <div class="col">
                    <h5 class="card-title">Package Name</h5>
                    <input class="form-control form-control-lg  mb-4" name="txt_pack_name" type="text">
                </div>
            </div>

            <div class="row did-image">
                <div class="col-6">
                    <h5 class="card-title">Destination</h5>
                    <select name="txt_dest_name" id="" class="form-control form-control-lg mb-4">
                        <option value="#">Select Destination</option>
                        <?php
                        foreach ($dest as $d): ?>
                            <option value="<?= $d['did'] ?>"><?= $d['dname'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-6">
                    <h5 class="card-title">Destination Picture</h5>
                    <div class="mb-5">
                        <input class="form-control" type="file" name="txt_pack_pic" id="formFile">
                    </div>
                </div>
            </div>

            <div class="row type-price">
                <div class="col-6">
                    <h5 class="card-title">Type of Package</h5>
                    <select name="txt_pack_type" id="" class="form-control form-control-lg mb-4">
                        <option value="#">Select package type</option>
                        <option value="Domestic">Domestic</option>
                        <option value="International">International</option>
                    </select>
                </div>
                <div class="col-6">
                    <h5 class="card-title">Package Price</h5>
                    <input class="form-control form-control-lg  mb-4" name="txt_pack_price" type="number">
                </div>
            </div>

            <div class="row description">
                <div class="col">
                    <h5 class="card-title">Description</h5>
                    <div class="form-floating">
                        <textarea class="form-control mb-5" name="txt_desc" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    </div>
                </div>
            </div>

            <div class="row people-date-time">
                <div class="col-5">
                    <h5 class="card-title">Number of People</h5>
                    <input class="form-control form-control-lg mb-4" name="txt_people" type="number">
                </div>
                <div class="col-3">
                    <h5 class="card-title">Starting Date</h5>
                    <input class="form-control form-control-lg mb-4" name="start_date" type="date">
                </div>
                <div class="col-3">
                    <h5 class="card-title">Starting Time</h5>
                    <input class="form-control form-control-lg mb-4" type="time" name="start_time">
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-success " name="btnAdd">Create Package</button>
                    <a href="admin_show_package.php" class="btn btn-warning">Back</a>
                </div>
            </div>

        </div>
    </div>

</form>

<?php
include("admin_footer.php");
?>