<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include('admin_header.php');
include('connect.php');

if (isset($_POST['btnAdd'])) {
    $temp_name = $_FILES['txt_gallery_pic']['tmp_name'];
    $name = $_FILES['txt_gallery_pic']['name'];
    $name = "uploads/" . $name;

    if (empty($name)) {
        echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Upload File!!',
                });
            </script>";
    } else {
        $query = "INSERT INTO `tbl_gallery` (`id`, `image`) VALUES (NULL, '$name')";

        $res = mysqli_query($con, $query);

        if ($res > 0) {
            move_uploaded_file($temp_name, $name);    //from -> to
            echo "<script>window.location.href='admin_show_gallery.php'</script>";
        }
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <h1>Gallery Management</h1>
    <p class="lead">Add travel related location images for <b>AtlasGo</b></p>

    <div class="row">
        <div class="col new-destination">
            <div class="card">
                <div class="card-body">
                    <b>
                        <h3 class="">Add New Image</h3>
                    </b>
                    <br>
                    <h5 class="card-title">Picture</h5>
                    <div class="mb-5">
                        <input class="form-control" type="file" id="formFile" name="txt_gallery_pic">
                    </div>

                    <button type="submit" class="btn btn-success" name="btnAdd">Save Image</button>
                    <a href="admin_show_gallery.php" class="btn btn-warning">Back</a>
                </div>
            </div>
        </div>
    </div>

</form>


<?php
include('admin_footer.php');
?>