<?php
include 'admin_header.php';
$id = $_GET['id'];
include 'connect.php';
$query = "SELECT * FROM tbl_destination WHERE did = $id";
$r = mysqli_query($con, $query); 
$row = mysqli_fetch_assoc($r);

if (isset($_POST['btnAdd'])) {
    $dest_name = $_POST['txt_dest_name'];
    $tmp_name = $_FILES['txt_dest_pic']['tmp_name'];
    $name = $_FILES['txt_dest_pic']['name'];    //abc.jpeg

    if (empty($name)) {
        $name = $row['dpic'];
    } else {
        $name = "uploads/" . $name;                //uploads/abc.jpg     
    }
 

    if (empty(trim($dest_name))) {
        echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Enter Destination Name!!',
                });
            </script>";
    } else if (empty($name)) {
        echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Upload File!!',
                });
            </script>";
    } else {
        $query = "UPDATE `tbl_destination` SET `dname` = '$dest_name', `dpic` = '$name' WHERE `tbl_destination`.`did` = $id";
    
        $res = mysqli_query($con, $query);
        if ($res > 0) {
            move_uploaded_file($tmp_name, $name);    //from -> to
            echo "<script>window.location.href='admin_show_destination.php'</script>";
        } 
    }
}

// $query = "UPDATE `tbl_destination` SET `dname` = 'names', `dpic` = 'uploads/us1.avif' WHERE `tbl_destination`.`did` = 16";
?>
<form action="" method="post" enctype="multipart/form-data">
    <h1>Destination Management</h1>
    <p class="lead">Add, Update, or remove travel locations for <b>AtlasGo</b></p>

    <div class="row">
        <div class="col new-destination">
            <div class="card">
                <div class="card-body">
                    <b>
                        <h3 class="">Update Existing Destination</h3>
                    </b>
                    <br>

                    <h5 class="card-title">Destination Name</h5>
                    <input class="form-control form-control-lg  mb-4" value="<?php echo $row['dname'] ?>" name="txt_dest_name" type="text" aria-label=".form-control-lg example">

                    <h5 class="card-title">Destination Picture</h5>
                    <div class="mb-5">
                        <input class="form-control" type="file" id="formFile" name="txt_dest_pic">
                        <img class="img-thumbnail" src="<?php echo $row['dpic'] ?>" style="height: 100px;width: 100px;" alt="">
                    </div>

                    <button type="submit" class="btn btn-success" name="btnAdd">Save Destination</button>
                    <a href="admin_show_destination.php" class="btn btn-warning">Back</a>
                </div>
            </div>
        </div>
    </div>

</form>

<?php
include 'admin_footer.php'
?>