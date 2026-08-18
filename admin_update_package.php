<?php
include("admin_header.php");
include("connect.php");

$id = $_GET['id'];
$query = "SELECT * FROM tbl_package WHERE pid = $id";
$r = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($r);

if (isset($_POST['btnAdd'])) {
    $pack_name = $_POST['txt_pack_name'];
    $pack_name = strtoupper($pack_name);

    $dest_name = $_POST['txt_dest_name'];

    $tmp_pack_pic = $_FILES['txt_pack_pic']['tmp_name'];
    $name = $_FILES['txt_pack_pic']['name'];
    $name = "uploads/" . $name;

    $pack_type = $_POST['txt_pack_type'];
    $pack_price = $_POST['txt_pack_price'];
    $desc = $_POST['txt_desc'];
    $people = $_POST['txt_people'];
    $start_date = $_POST['start_date'];
    $start_time = $_POST['start_time'];
    $error = "";


    // for image
    if (empty($name)) {
        $name = $row['dpic'];
    } else {
        $name = "uploads/" . $name;                //uploads/abc.jpg     
    }

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
        $query = "UPDATE `tbl_package` SET `pname` = '$pack_name', `pic` = '$name', `type` = '$pack_type', `price` = '$pack_price', `description` = '$desc', `no_of_people` = '$people', `date` = '$start_date', `time` = '$start_time' WHERE `tbl_package`.`pid` = $id";

        $res = mysqli_query($con, $query);
        if ($res > 0) {
            move_uploaded_file($tmp_pack_pic, $name);
            echo "<script>window.location.href='admin_show_package.php'</script>";
        }
    }
}

?>

<form action="" method="post">
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
                    <input class="form-control form-control-lg  mb-4" type="text" name="$txt_pack_name" value="<?php echo $row['pname'] ?>">
                </div>
            </div>

            <div class="row did-image">
                <div class="col-6">
                    <h5 class="card-title">Destination</h5>
                    <input class="form-control form-control mb-4" name="$txt_dest_name" type="number" value="<?php echo $row['did'] ?>">
                </div>
                <div class="col-6">
                    <h5 class="card-title">Destination Picture</h5>
                    <div class="mb-5">
                        <input class="form-control" type="file" name="$txt_pack_pic" id="formFile" value="<?php echo $row['pic'] ?>">
                    </div>
                </div>
            </div>

            <div class="row type-price">
                <div class="col-6">
                    <h5 class="card-title">Type of Package</h5>
                    <select name="$txt_pack_type" id="" class="form-control form-control-lg mb-4">
                        <option value="#">Select package type</option>
                        <option value="domestic">Domestic</option>
                        <option value="international">International</option>
                    </select>
                </div>
                <div class="col-6">
                    <h5 class="card-title">Package Price</h5>
                    <input class="form-control form-control-lg mb-4" name="$txt_pack_price" type="number" value="<?php echo $row['price'] ?>">
                </div>
            </div>

            <div class="row description">
                <div class="col">
                    <h5 class="card-title">Description</h5>
                    <div class="form-floating">
                        <textarea class="form-control mb-5" name="$txt_desc" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?php echo htmlspecialchars($row['description']); ?></textarea>
                    </div>
                </div>
            </div>

            <div class="row people-date-time">
                <div class="col-5">
                    <h5 class="card-title">Number of People</h5>
                    <input class="form-control form-control-lg mb-4" name="$txt_people" type="number" value="<?php echo $row['no_of_people'] ?>">
                </div>
                <div class="col-3">
                    <h5 class="card-title">Starting Date</h5>
                    <input class="form-control form-control-lg mb-4" name="$start_date" type="date" value="<?php echo $row['date'] ?>">
                </div>
                <div class="col-3">
                    <h5 class="card-title">Starting Time</h5>
                    <input class="form-control form-control-lg mb-4" name="$start_time" type="time" value="<?php echo $row['time'] ?>">
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-success " name="btnAdd" style="height: 50px;width: 250px">Update Package</button>
                </div>
            </div>

        </div>
    </div>

</form>

<?php
include("admin_footer.php");
?>